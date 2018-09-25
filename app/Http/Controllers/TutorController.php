<?php

namespace App\Http\Controllers;

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
use App\Model\UserJobs;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = UserJobs::with('userJobs')->where('user_id', \Sentinel::getUser()->id)->get();

        $status = '0';
        return view('web/tutor_dashboard', compact('jobs', 'status'));
    }

    public function ChangeJobStatus(Request $request)
    {
        $data = $request->input();
        $job = UserJobs::find(decrypt($data['jobid']));
        $job->status = $data['status'];
        $job->save();
        Session::flash('success', Config::get('message.options.UPDATE_SUCCESS'));
        return Redirect::back();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usersMeta = json_decode(json_encode(User::with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork', 'QualifiedLevel', 'Disciplines'])->find(decrypt($id))));
        $categorieUser = empty($usersMeta->categories) ? json_decode(json_encode(array(array('id' => '0', 'name' => '', 'pivot' => array('level' => '')))), false) : $usersMeta->categories;
        $categories = Category::with('children')->get();
        $organisations = empty($usersMeta->organisations_work) ? json_decode(json_encode(array(array('id' => '0', 'registration' => '', 'company_name' => ''))), false) : $usersMeta->organisations_work;
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::with('childrenDisciplines')->get();
        $disciplineArray[] = '';
        if (isset($usersMeta->disciplines['0'])) {
            foreach ($usersMeta->disciplines as $discipline) {
                $disciplineArray[] = $discipline->id;
            }
        }
        return View('web.tutor_edit', compact('usersMeta', 'categories', 'categorieUser', 'organisations', 'levels', 'disciplines', 'disciplineArray'));

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
