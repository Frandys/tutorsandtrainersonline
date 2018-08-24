<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Country;
use App\Model\Disciplines;
use App\Model\QualifiedLevel;
use App\model\TutorProfile;
use App\User;
use Illuminate\Http\Request;
use View;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        $levels = QualifiedLevel::with('childrenLevels')->get();
        $disciplines = Disciplines::all();
        $countrys = Country::all();
        return View::make('web.index', compact('categories', 'disciplines', 'countrys', 'levels'));
    }

    public function TutorAlls()
    {
//        $usersMeta = User::whereHas('roles', function ($q) {
//            $q->whereIn('slug', ['tutor']);
//        })
//       ->with(['Country', 'TutorProfile', 'Categories', 'OrganisationsWork','QualifiedLevel','Disciplines'])
//            ->whereHas('Disciplines', function($query) {
//            $query->where('name', 'like', "%B%");
//        })
//            ->get();


        $usersMeta = TutorProfile::with(array('User' => function ($query) {
            $query->select('id', 'email', 'first_name', 'last_name', 'photo');
        }, 'Disciplines', 'Country', 'Categories', 'QualifiedLevel'))->select('id', 'user_id', 'country_id', 'discipline_id', 'about')
            ->orWhereHas('Disciplines', function ($query) {
                $query->where('name', 'B');
            })
            ->orWhereHas('Country', function ($query) {
                $query->Where('name', 'indaia');
            })
            ->orWhereHas('Categories', function ($query) {
                $query->Where('name', 'Animal Caret');
            })
            ->orWhereHas('QualifiedLevel', function ($query) {
                $query->Where('level', 'Animal Caret');
            })
            ->paginate(10)->toArray();

        print_r(json_decode(json_encode($usersMeta)));
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
