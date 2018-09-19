<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Model\Category;
use App\Model\Country;
use App\Model\Disciplines;
use App\model\Jobs;
use App\Model\Language;
use App\Model\QualifiedLevel;
use App\model\TutorProfile;
use App\Model\UserJobs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use View;

class TutorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer', ['except' => ['index']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::with('childrenDisciplines')->get();
        $countrys = Country::all();

        $usersMeta = TutorProfile::with(array('User' => function ($query) {
            $query->select('id', 'email', 'first_name', 'last_name', 'photo');
        }, 'Disciplines', 'Country', 'Categories', 'QualifiedLevel'))->select('id', 'user_id', 'uuid', 'country_id', 'about');
      if(!empty(input::get('disciplines'))) {
          $usersMeta = $usersMeta->WhereHas('Disciplines', function ($query) {
              $query->whereIn('name', !empty(input::get('disciplines')) ? input::get('disciplines') : []);
          });
      }

        if(!empty(input::get('location'))) {
            $usersMeta = $usersMeta->WhereHas('Country', function ($query) {
                $query->whereIn('name', !empty(input::get('location')) ? input::get('location') : []);
            });
        }

        if(!empty(input::get('specialist'))) {
            $usersMeta = $usersMeta->WhereHas('Categories', function ($query) {
                $query->whereIn('name', !empty(input::get('specialist')) ? input::get('specialist') : []);
            });
        }

        if(!empty(input::get('level'))) {
            $usersMeta = $usersMeta->WhereHas('QualifiedLevel', function ($query) {
                $query->whereIn('level', !empty(input::get('level')) ? input::get('level') : []);
            });
        }

        if(!empty(input::get('subcat'))) {
            $usersMeta = $usersMeta->WhereHas('Categories', function ($query) {
                $query->where('sub_category_id', decrypt(input::get('subcat')));
            });
        }

        $usersMeta = $usersMeta->paginate(10)->toArray();
        $user = \Sentinel::check();
//        if (empty($user)) {
//            \Session::put('CheckRediraction', $_SERVER['REQUEST_URI']);
//        }
        return View('web.tutor_lists', compact('usersMeta', 'categories', 'disciplines', 'countrys', 'levels'));
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
     */
    public function store(Request $request)
    {
        try {
            $data = $request->input();
            $validation = \Validator::make($data, ValidationRequest::$jobPost);
            if ($validation->fails()) {
                $errors = $validation->messages();
                return Response::json(['errors' => $validation->errors()]);

            }
            $ckeJob = Jobs::where('tutor_id', $data['tutor_id'])->where('employer_id', \Sentinel::getUser()->id)->first();

            if (!empty($ckeJob)) {
                return Response::json(['success' => '2', 'message' => Config::get('message.options.JOBSUBMTD')]);
            }
            $jobs = new Jobs;
            $jobs->tutor_id = $data['tutor_id'];
            $jobs->employer_id = \Sentinel::getUser()->id;
            $jobs->title = $data['title'];
            $jobs->rate = $data['rate'];
            $jobs->type = $data['type'];
            $jobs->categories_id = $data['specialist'];
            $jobs->qualified_levels_id = $data['qualified_levels'];
            $jobs->sub_disciplines_id = $data['type_levels'];
            $jobs->status = '0';
            $jobs->save();

            if ($jobs) {
                $uj = New UserJobs;
                $uj->user_id = $data['tutor_id'];
                $uj->job_id = $jobs->id;
                $uj->save();
                return Response::json(['success' => '1', 'message' => Config::get('message.options.JOB_SUBMITED')]);
            }

        } catch (Exception $ex) {
            return View::make('errors.exception')->with('Message', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork', 'QualifiedLevel'])->find(decrypt($id))));
        $array = array();
        $ttrLan = json_decode(json_encode(Language::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->language_id) : $array)->get()));
        $ttrLocaWill = json_decode(json_encode(Country::whereIn('id', $usersMeta->tutor_profile->language_id != '' ? unserialize($usersMeta->tutor_profile->travel_location) : $array)->get()));
        $categories = Category::with('children')->get();
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::with('childrenDisciplines')->get();
        return View('web.tutor_view', compact('usersMeta', 'ttrLan', 'categories', 'ttrLocaWill', 'levels', 'disciplines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
