<?php

namespace App\Http\Controllers\Admin {

    use App\Model\Activations;
    use App\Model\Country;
    use App\Model\Course;
    use App\Model\Discipline;
    use App\Model\Language;
    use App\Model\Role;
    use App\Model\RoleUsers;
    use App\Model\Skill;
    use App\Model\Specialization;
    use App\User;
    use Cartalyst\Sentinel\Laravel\Facades\Activation;
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
            $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Educations', 'WorkExperiences'])->find(decrypt($id))));
            $array = array();
            $ttrLan = json_decode(json_encode(Language::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->language_id) : $array)->get()));
            $ttrSkil = json_decode(json_encode(Skill::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->skill_id) :$array)->get()));
            $ttrSpecli = json_decode(json_encode(Specialization::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->specialization_id) : $array)->get()));
            $ttrDicpil = json_decode(json_encode(Discipline::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->discipline_id) : $array)->get()));
            $ttrCorse = json_decode(json_encode(Course::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->course_id) : $array)->get()));

            return View('admin.tutor_view', compact('usersMeta', 'ttrLan', 'ttrSkil', 'ttrSpecli', 'ttrDicpil', 'ttrCorse'));

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {

            $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Educations', 'WorkExperiences'])->find(decrypt($id))));

            return View('admin.tutors_edit', compact('usersMeta'));
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
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
}
