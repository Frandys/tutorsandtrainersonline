<?php

namespace App\Http\Controllers\Admin;

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
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('admin.employes_view');
    }

    public function viewEmployer()
    {
        $users = User::whereHas('roles', function ($q) {
            $q->whereIn('slug', ['employer']);
        })->get();

        return Datatables::of($users)
            ->addColumn(/**
             * @param $userd
             * @return string
             */
                'actions', function ($userd) {
                $UsrActCkh = Activations::where('user_id', $userd->id)->first();
                return empty($UsrActCkh) || $UsrActCkh['completed'] == '0' ? '<button type="button" id="activateTutor" value=' . encrypt($userd->id) . ' class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-lock"></i></button><a   href="href="employer/' . encrypt($userd->id) . '/edit"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a><a  href="employer/' . encrypt($userd->id) . '"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-eye"></i></a>' : '<button type="button" id="activateTutor" value=' . encrypt($userd->id) . ' class="btn btn-square btn-option3 btn-icon wdth g_btn"><i class="fa fa-unlock"></i></button><a  href="employer/' . encrypt($userd->id) . '/edit"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a><a href="employer/' . encrypt($userd->id) . '"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-eye"></i></a>';
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
        $usersMeta = json_decode(json_encode(User::with(['CountryEmployer', 'EmployerProfile'])->find(decrypt($id))));
        return View('admin.employer_view',compact('usersMeta'));

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
        return View('admin.employer_edit',compact('usersMeta'));

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
