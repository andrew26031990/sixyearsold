<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use App\Models\Groups;
use App\Models\Pupils;
use App\Models\Regions;
use App\Models\Teachers;
use App\Repositories\DistrictsRepository;
use App\Repositories\PupilsRepository;
use App\Repositories\RegionsRepository;
use App\Repositories\TeachersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts_count = Districts::count();
        $pupils_count = Pupils::count();
        $regions_count = Regions::count();
        $teachers_count = Teachers::count();
        $groups_count = Groups::count();
        $regions = Regions::all();
        return view('home')->with('data',
            ['districts_count' => $districts_count,
                'pupils_count' => $pupils_count,
                'regions_count' => $regions_count,
                'teachers_count' => $teachers_count,
                'groups_count'=>$groups_count,
                ])->with(['regions'=>$regions]);
    }

    public function getStatistics(){
        $id = $_GET['id'];
        $type = $_GET['type'];
        $countPupils = 0;
        $countTeachers = 0;
        $countGroups = 0;
        if($type == 'institution'){
            $countPupils = DB::table('pupils')->join('groups', 'pupils.group_id', '=', 'groups.id')->where('groups.institution_id', $id)->count();
            $countTeachers = DB::table('teachers')->where('teachers.institution_id', $id)->count();
            $countGroups = DB::table('groups')->where('groups.institution_id', $id)->count();
        }elseif($type == 'district'){
            $countPupils = DB::table('pupils')->join('groups', 'pupils.group_id', '=', 'groups.id')->where('groups.district_id', $id)->count();
            $countTeachers = DB::table('teachers')->where('teachers.district_id', $id)->count();
            $countGroups = DB::table('groups')->where('groups.district_id', $id)->count();
        }elseif($type == 'region'){
            $countPupils = DB::table('pupils')->join('groups', 'pupils.group_id', '=', 'groups.id')->where('groups.region_id', $id)->count();
            $countTeachers = DB::table('teachers')->where('teachers.region_id', $id)->count();
            $countGroups = DB::table('groups')->where('groups.region_id', $id)->count();
        }

        $msg = array(
            'countPupils' => $countPupils,
            'countTeachers' => $countTeachers,
            'countGroups' => $countGroups,
        );

        return $msg;
    }
}
