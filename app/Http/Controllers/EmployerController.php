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

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::with('userJobsMeta')->where('employer_id', \Sentinel::getUser()->id)->get();
        $status = '0';

        $categories = Category::with('children')->get();
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::with('childrenDisciplines')->get();
        return view('web/employer_dashboard',compact('jobs','status','categories','levels','disciplines'));
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
        $usersMeta = json_decode(json_encode(User::with(['CountryEmployer', 'EmployerProfile'])->find(decrypt($id))));
        return View('web.employer_edit', compact('usersMeta'));
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
