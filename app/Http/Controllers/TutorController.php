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
use App\model\Jobs;
use App\Model\Language;
use App\Model\Organisations;
use App\Model\QualifiedLevel;
use App\Model\Skill;
use App\Model\Specialization;
use App\model\TutorProfile;
use App\Model\UserJobs;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
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

    public function SwapUser(Request $request)
    {
        $data = $request->input();
        if(empty($data['tutor_assign'])) {
            return Response::json(['errors' => 'Please select tutor']);
        }
        $job = Jobs::find(decrypt($data['tutor_id']));
        $job->userJobs()->sync($data['tutor_assign']);
        return Response::json(['success' => '1', 'message' => 'Swap Successfully']);
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

    public function GetSwap($id)
    {
        $jobs = Jobs::find(decrypt($id));
        $qualifiedLevels[] = QualifiedLevel::find($jobs['qualified_levels_id'])->level;
        $categoriesGet[] = Category::find($jobs['category_id'])->name;
        $disciplinesGet[] = Disciplines::find($jobs['sub_disciplines_id'])->name;

        $usersMeta = TutorProfile::with(array('User' => function ($query) {
            $query->select('id', 'email', 'first_name', 'last_name', 'photo');
        }, 'Disciplines','Categories', 'QualifiedLevel'))->select('id', 'user_id', 'uuid', 'country_id', 'about');

        if (!empty($disciplinesGet)) {
            $usersMeta = $usersMeta->OrWhereHas('Disciplines', function ($query) use ($disciplinesGet) {
                $query->whereIn('name', $disciplinesGet);
            });
        }

        if (!empty($categoriesGet)) {
            $usersMeta = $usersMeta->OrWhereHas('Categories', function ($query) use ($categoriesGet) {
                $query->whereIn('name', $categoriesGet);
            });
        }

        if (!empty($qualifiedLevels)) {
            $usersMeta = $usersMeta->OrWhereHas('QualifiedLevel', function ($query) use ($qualifiedLevels) {
                $query->whereIn('level', $qualifiedLevels);
            });
        }
        $usersMetas = $usersMeta->get();

        foreach ($usersMetas as $usersMeta) {
            if($usersMeta['user']->id != \Sentinel::check()->id) {
           $data[] = [
               "label"=>$usersMeta["user"]->first_name,
               "value"=>$usersMeta["user"]->id,
           ];

            }
        }
        return  json_encode($data);
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
        $countries = Country::with('children')->get();
        $countryUser[] = '';
        if (isset($usersMeta->country['0'])) {
            foreach ($usersMeta->country as $countryUse) {
                $countryUser[] = $countryUse->id;
            }
        }
        return View('web.tutor_edit', compact('usersMeta', 'categories', 'categorieUser', 'organisations', 'levels', 'disciplines', 'countries', 'countryUser'));

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
