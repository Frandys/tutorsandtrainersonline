<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ValidationRequest;

use App\Model\Category;
use App\model\Jobs;
use App\Model\QualifiedLevel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('admin.jobs_view');
    }


    public function viewJobs()
    {
        $jobs = Jobs::with(['Tutor', 'Employer'])->get();

        return Datatables::of($jobs)
            ->addColumn('actions', function ($userd) {
                return '<a   href="#" data-index="' . $userd->id . '" id="job_del"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-trash"></i></a><a  href="job/' . encrypt($userd->id) . '/edit"   class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a>';
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make();
    }

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $jobs = Jobs::with(['Tutor', 'Employer', 'Categories', 'QualifiedLevels'])->find(decrypt($id));
       $categories = Category::with('children')->get();
       $levels = QualifiedLevel::with('childrenLevels')->get();
        return view::make('admin.job_edit',compact('jobs','categories','levels'));
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
            $validation = Validator::make($request->all(), ValidationRequest::$jobPost);
            if ($validation->fails()) {
                $errors = $validation->messages();
                return Redirect::back()->with('errors', $errors);
            }

            $jobs =   Jobs::find(decrypt($id));
            $jobs->title = $data['title'];
            $jobs->rate = $data['rate'];
            $jobs->type = $data['type'];
            $jobs->categories_id = $data['specialist'];
            $jobs->qualified_levels_id = $data['qualified_levels'];
            $jobs->status = '0';
            $jobs->save();
            Session::flash('success', Config::get('message.options.UPDATE_SUCCESS'));
            return Redirect::back();
        } catch (Exception $ex) {
            return View::make('errors.exception')->with('Message', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobs::destroy($id);

    }
}
