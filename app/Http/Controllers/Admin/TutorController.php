<?php

namespace App\Http\Controllers\Admin {

    use App\Http\Requests\ValidationRequest;
    use App\Model\Activations;
    use App\Model\Category;
    use App\Model\CategoryUser;
    use App\Model\Country;
    use App\Model\Course;
    use App\Model\Discipline;
    use App\model\Educations;
    use App\Model\Language;
    use App\Model\Organisations;
    use App\Model\Skill;
    use App\Model\Specialization;
    use App\model\TutorProfile;
    use App\model\WorkExperience;
    use App\User;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use View;
    use Yajra\DataTables\DataTables;

    /**
     * @property  dataTable
     */
    class TutorController extends Controller
    {
        private $dataTable;

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

            return View::make('admin.tutors_view');
        }


        /**
         * @return mixed
         * @throws \Exception
         */
        public function viewTutors()
        {
            $users = User::whereHas('roles', function ($q) {
                $q->whereIn('slug', ['tutor']);
            })->get();

            return Datatables::of($users)
                ->addColumn(/**
                 * @param $userd
                 * @return string
                 */
                    'actions', function ($userd) {
                    $UsrActCkh = Activations::where('user_id', $userd->id)->first();
                    return empty($UsrActCkh) || $UsrActCkh['completed'] == '0' ? '<button type="button" id="activateTutor" value=' . encrypt($userd->id) . ' class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-lock"></i></button><a   href="href="tutor/' . encrypt($userd->id) . '/edit"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a><a  href="tutor/' . encrypt($userd->id) . '"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-eye"></i></a>' : '<button type="button" id="activateTutor" value=' . encrypt($userd->id) . ' class="btn btn-square btn-option3 btn-icon wdth g_btn"><i class="fa fa-unlock"></i></button><a  href="tutor/' . encrypt($userd->id) . '/edit"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a><a href="tutor/' . encrypt($userd->id) . '"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-eye"></i></a>';
                })
                ->rawColumns(['actions'])
                ->addIndexColumn()
                ->make();


        }

        /**
         * @param Request $request
         * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
         */
        public function activateTutor(Request $request)
        {
            $data = $request->input();

            $user = \Sentinel::findById(decrypt($data['id']));

            $UsrActCkh = Activations::where('user_id', decrypt($data['id']))->first();
            if (empty($UsrActCkh) || $UsrActCkh['completed'] == '0') {
                $ActCode = \Activation::create($user);
                \Activation::complete($user, $ActCode['code']);
            } else {
                \Activation::remove($user);
            }

            return Response(array('success' => '1', 'errors' => ''));


        }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork'])->find(decrypt($id))));
            $array = array();
            $ttrLan = json_decode(json_encode(Language::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->language_id) : $array)->get()));
            $ttrLocaWill = json_decode(json_encode(Country::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->travel_location) : $array)->get()));
            $categories = Category::with('children')->get();
            return View('admin.tutor_view', compact('usersMeta', 'ttrLan', 'categories', 'ttrLocaWill'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork'])->find(decrypt($id))));
            $categorieUser = empty($usersMeta->categories) ? json_decode(json_encode(array(array('id' => '0', 'name' => '', 'pivot' => array('level' => '')))), false) : $usersMeta->categories;
            $organisations = empty($usersMeta->organisations_work) ? json_decode(json_encode(array(array('id' => '0', 'registration' => '', 'company_name' => ''))), false) : $usersMeta->organisations_work;
            $categories = Category::with('children')->get();
            return View('admin.tutors_edit', compact('usersMeta', 'categories', 'categorieUser', 'organisations'));

        }


        private function GetTutor($id, $view)
        {

        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            try {
                $data = $request->input();
                $validation = Validator::make($request->all(), ValidationRequest::$userValid);
                if ($validation->fails()) {
                    $errors = $validation->messages();
                    return Redirect::back()->with('errors', $errors);
                }

                $user = User::find(decrypt($id));
                $user->first_name = $data['first_name'];
                $user->last_name = $data['last_name'];
                $user->phone = $data['phone'];

                //Check User Photo
                if (!empty($request->file())) {
                    $file = $request->file();
                    if (isset($file['photo'])) {
                        $namefile = $this->UploadFile($file, 'users', $user->photo);
                        $user->photo = $namefile;

                    }
                }
                if ($user->save()) {
                    $tutrPro = $user->TutorProfile()->whereUserId(decrypt($id))->first();
                    $tutrPro->city = $data['city'];
                    $tutrPro->state = $data['state'];
                    $tutrPro->country_id = $data['country'];
                    $tutrPro->address = $data['address'];
                    $tutrPro->zip = $data['zip'];
                    $tutrPro->about = $data['about'];
                    $tutrPro->driving_license = $data['driving_license'];
                    $tutrPro->work_in_uk = $data['work_in_uk'];
                    $tutrPro->certificates = $data['certificates'];
                    $tutrPro->dbs_cert = $data['dbs_cert'];
                    $tutrPro->internet_update_service = $data['internet_update_service'];
                    $tutrPro->disabilities = $data['disabilities'];
                    $tutrPro->medical_conditions = $data['medical_conditions'];
                    $tutrPro->level_of_fluency = $data['level_of_fluency'];
                    $tutrPro->willing_travel = $data['willing_travel'];
                    $tutrPro->travel_location = $data['willing_travel'] == '1' && isset($data['travel_location']) ? serialize($data['travel_location']) : '';
                    $tutrPro->speak_languages = $data['speak_languages'];
                    $tutrPro->language_id = $data['speak_languages'] == '1' && isset($data['language']) ? serialize($data['language']) : '';
                    //Check User Photo
                    if (!empty($request->file())) {
                        $file = $request->file();
                        if (isset($file['resume'])) {
                            $namefile = $this->UploadFile($file, 'resume', $user->photo);
                            $tutrPro->resume = $namefile;
                        }
                    }

                    $tutrPro->save();
                }

                if ($data['certificates_id']) {
                    CategoryUser::whereUserId(decrypt($id))->delete();
                    $sync_data = array();
                    for ($i = 0; $i < count($data['certificates_id']); $i++) {
                        $sync_data[$data['certificates_categorie'][$i]] = array('level' => $data['certificates_level'][$i]);
                    }
                    $user->Categories()->attach($sync_data);
                }

                if ($data['work_id']) {
                    for ($i = 0; $i < count($data['work_id']); $i++) {
                        $user->OrganisationsWork()->whereUserId(decrypt($id))->delete();
                        for ($i = 0; $i < count($data['work_id']); $i++) {
                            $user->OrganisationsWork()->save(
                                new Organisations([
                                    'company_name' => $data['company_name'][$i],
                                    'registration' => $data['organization_registration'][$i],
                                ]));
                        }
                    }
                }


                die;
//          $user->TutorProfile()->update(['address'=>'myadder']);
            } catch (Exception $ex) {
                return View::make('errors.exception')->with('Message', $ex->getMessage());
            }
        }


        private function UploadFile($file, $path, $name)
        {

            $time = time();
            $namefile = $time . '.' . $file[$path]->getClientOriginalExtension();
            $destinationPath = 'images/' . $path;
            $file[$path]->move($destinationPath, $namefile);
            //Delete old image
            $profileImg = $destinationPath . '/' . $name;

            if (\File::exists(public_path($profileImg))) {
                \File::delete(public_path($profileImg));
            }
            return $namefile;
        }


        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public
        function destroy($id)
        {
            //
        }
    }
}

//