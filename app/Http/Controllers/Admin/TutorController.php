<?php
namespace App\Http\Controllers\Admin {

    use App\Model\Role;
    use App\Model\RoleUsers;
    use App\User;
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
//            $users = User::with(['roles' => function ($query) {
//                $query->where('slug', '=', 'tutor');
//            }])->get();
//
//
//            $users = json_decode(json_encode($users));
//            print_r($users);  die;
//
//            foreach ($users as $user){
//
//            print_r($user);
//
//        }
// die;
        //    $query = User::with('roles')->selectRaw('distinct users.*')->get();

          //  print_r($query); die;

          //  die;

            return View::make('admin.tutor_view');
        }

        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function viewTutors()
        {

//            $users = User::with(['roles' => function ($query) {
//                $query->where('slug', '=', 'tutor');
//            }])->get();
//
//
//            return  Datatables::of($users)
//                ->addColumn('action', function ($user) {
//                    return '<a href="#edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>'.$user['roles'].'</a>';
//                })
//                ->make();

            $posts = User::with('roles')->select('users.*');

            return Datatables::of($posts)
                ->editColumn('name', '{!! str_limit($name, 60) !!}')
                ->make(true);
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
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
}
