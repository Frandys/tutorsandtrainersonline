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
        try {
            $data = $request->input();
            $validation = Validator::make($request->all(), ValidationRequest::$EmpValid);
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
                if (isset($file['company_logo'])) {
                    $user->photo = $this->UploadFile($file, 'company_logo', $user->photo);
                }
            }

             if ($user->save()) {
                $empPro = $user->EmployerProfile()->whereUserId(decrypt($id))->first();
                 $empPro->company_name = $data['company_name'];
                 $empPro->company_address = $data['company_address'];
                 $empPro->contact_tel = $data['contact_tel'];
                 $empPro->head_office_address = $data['head_office_address'];
                 $empPro->authorised_user = $data['authorised_user'];
                 $empPro->authorised_user_second = $data['authorised_user_second'];
                 $empPro->contact_person = $data['contact_person'];
                 $empPro->head_office_contact_person = $data['head_office_contact_person'];
                 $empPro->contact_person_second = $data['contact_person_second'];
                 $empPro->head_office_contact_person_second = $data['head_office_contact_person_second'];
                 $empPro->dept = $data['dept'];
                 $empPro->dept_second = $data['dept_second'];
                 $empPro->contact_no = $data['contact_no'];
                 $empPro->contact_no_second = $data['contact_no_second'];
                 $empPro->email = $data['email'];
                 $empPro->email_second = $data['email_second'];
                 $empPro->company_vat_reg_no = $data['company_vat_reg_no'];
                 $empPro->company_reg_no = $data['company_reg_no'];
                 $empPro->different_locations = $data['different_locations'];
                 $empPro->city = $data['city'];
                 $empPro->state = $data['state'];
                 $empPro->country_id = $data['country'];
                 $empPro->address = $data['address'];
                 $empPro->zip = $data['zip'];
                 $empPro->address = $data['address'];
                 $empPro->onsite_projector = $data['onsite_projector'];
                 $empPro->wipe_board = $data['wipe_board'];
                 $empPro->flip_chart_and_stand = $data['flip_chart_and_stand'];
                 $empPro->disabilities = $data['disabilities'];
                 $empPro->equipment_available = $data['equipment_available'];
                 $empPro->equipment_available_onsite = $data['equipment_available_onsite'];
                 $empPro->report_name = $data['report_name'];
                 $empPro->report_department = $data['report_department'];
                 $empPro->additional_information = $data['additional_information'];
                 $empPro->additional_details = $data['additional_details'];
                 $empPro->save();
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
    public function destroy($id)
    {
        //
    }
}
