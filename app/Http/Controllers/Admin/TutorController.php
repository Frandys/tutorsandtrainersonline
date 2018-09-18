<?php

namespace App\Http\Controllers\Admin {

    use App\Http\Requests\ValidationRequest;
    use App\Model\Activations;
    use App\Model\Category;
    use App\Model\CategoryUser;
    use App\Model\Country;
    use App\Model\Course;
    use App\Model\Discipline;
    use App\Model\Disciplines;
    use App\model\Educations;
    use App\Model\Language;
    use App\Model\Organisations;
    use App\Model\QualifiedLevel;
    use App\Model\Skill;
    use App\Model\Specialization;
    use App\User;
    use Illuminate\Support\Facades\Config;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use View;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Session;

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
                ->addColumn('actions', function ($userd) {
                    $UsrActCkh = Activations::where('user_id', $userd->id)->first();
                    return empty($UsrActCkh) || $UsrActCkh['completed'] == '0' ? '<button type="button" id="activateTutor" value=' . encrypt($userd->id) . ' class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-lock"></i></button><a   href="href="tutor/' . encrypt($userd->id) . '/edit"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a><a  href="tutor/' . encrypt($userd->id) . '"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-eye"></i></a>' : '<button type="button" id="activateTutor" value=' . encrypt($userd->id) . ' class="btn btn-square btn-option3 btn-icon wdth g_btn"><i class="fa fa-unlock"></i></button><a  href="tutor/' . encrypt($userd->id) . '/edit"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a><a href="tutor/' . encrypt($userd->id) . '"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-eye"></i></a>';
                })
                ->rawColumns(['actions'])
                ->addIndexColumn()
                ->make();

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
            $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork','QualifiedLevel'])->find(decrypt($id))));
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
            $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork','QualifiedLevel','Disciplines'])->find(decrypt($id))));
            $categorieUser = empty($usersMeta->categories) ? json_decode(json_encode(array(array('id' => '0', 'name' => '', 'pivot' => array('level' => '')))), false) : $usersMeta->categories;
            $categories = Category::with('children')->get();
            $organisations = empty($usersMeta->organisations_work) ? json_decode(json_encode(array(array('id' => '0', 'registration' => '', 'company_name' => ''))), false) : $usersMeta->organisations_work;
                  $levels = QualifiedLevel::with('childrenLevels')->get();
            $disciplines = Disciplines::with('childrenDisciplines')->get();
            $disciplineArray[] = '';
            if(isset($usersMeta->disciplines['0'])){
                foreach ($usersMeta->disciplines as $discipline){
                    $disciplineArray[] = $discipline->id;
                }
            }
            return View('admin.tutors_edit', compact('usersMeta', 'categories', 'categorieUser', 'organisations','levels','disciplines','disciplineArray'));

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
                        $user->photo = $this->UploadFile($file, 'photo', $user->photo);
                    }
                }

                // convert seconds into a specific format

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
                    $tutrPro->certificate_issued = $data['certificate_issued'];
                    $tutrPro->cert_issued = $data['cert_issued'];
                    $tutrPro->pass_start_date = $data['pass_start_date'];
                   // $tutrPro->pass_expiry_date = $data['pass_expiry_date'];
                    $tutrPro->passport_no = $data['passport_no'];
                    $tutrPro->permit_start_date = $data['permit_start_date'];
                    $tutrPro->permit_expiry_date = $data['permit_expiry_date'];
                    $tutrPro->permit_no = $data['permit_no'];
                    $tutrPro->dbs_certificate_no = $data['dbs_certificate_no'];
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
                        if (isset($file['cv'])) {
                            $tutrPro->cv = $this->UploadFile($file, 'cv', $tutrPro->cv);
                        }
                        if (isset($file['dbs_cert_upload'])) {
                            $tutrPro->dbs_cert_upload = $this->UploadFile($file, 'dbs_cert_upload', $tutrPro->dbs_cert_upload);
                        }
                        if (isset($file['certificates_upload'])) {
                            $tutrPro->certificates_upload = $this->UploadFile($file, 'certificates_upload', $tutrPro->certificates_upload);
                        }
                        if (isset($file['teaching_qual'])) {
                            $tutrPro->teaching_qual = $this->UploadFile($file, 'teaching_qual', $tutrPro->teaching_qual);
                        }
                        if (isset($file['teaching_cert'])) {
                            $tutrPro->teaching_cert = $this->UploadFile($file, 'teaching_cert', $tutrPro->teaching_cert);
                        }
                        if (isset($file['passport'])) {
                            $tutrPro->passport = $this->UploadFile($file, 'passport', $tutrPro->passport);
                        }
                        if (isset($file['work_permit'])) {
                            $tutrPro->work_permit = $this->UploadFile($file, 'work_permit', $tutrPro->work_permit);
                        }
                        if (isset($file['birth_certificate'])) {
                            $tutrPro->birth_certificate = $this->UploadFile($file, 'birth_certificate', $tutrPro->birth_certificate);
                        }
                    }
                    $tutrPro->save();
                }

                $user->Disciplines()->sync(isset($data['disciplines']) ? $data['disciplines'] : []);
                if ($data['certificates_id']) {
                    CategoryUser::whereUserId(decrypt($id))->delete();
                    $sync_data = array();
                    for ($i = 0; $i < count($data['certificates_id']); $i++) {
                        $sync_data[$data['certificates_categorie'][$i]] = array('qualified_levels_id' => $data['certificates_level'][$i]);
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
                Session::flash('success', Config::get('message.options.UPDATE_SUCCESS'));
                return Redirect::back();
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