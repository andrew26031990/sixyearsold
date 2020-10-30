<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeachersRequest;
use App\Http\Requests\UpdateTeachersRequest;
use App\Models\Districts;
use App\Models\EducationDegrees;
use App\Models\Institutions;
use App\Models\Regions;
use App\Models\Teachers;
use App\Repositories\TeachersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class TeachersController extends AppBaseController
{
    /** @var  TeachersRepository */
    private $teachersRepository;

    protected $ed_degrees;

    protected $institutions;

    protected $regions;

    protected $districts;

    public function __construct(TeachersRepository $teachersRepo, EducationDegrees $ed_degrees, Institutions $institutions, Regions $regions, Districts $districts)
    {
        $this->teachersRepository = $teachersRepo;
        $this->ed_degrees = $ed_degrees;
        $this->institutions = $institutions;
        $this->regions = $regions;
        $this->districts = $districts;
    }

    /**
     * Display a listing of the Teachers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teachers = DB::table('education_degrees')->join('teachers', 'teachers.education_degree_id', '=', 'education_degrees.id')->
        join('institutions', 'teachers.institution_id', '=', 'institutions.id')->
        join('regions', 'teachers.region_id', '=', 'regions.id')->
        join('districts', 'teachers.district_id', '=', 'districts.id')->
        select('education_degrees.name as ed_name', 'teachers.*', 'institutions.name as i_name', 'regions.name as r_name', 'districts.name as d_name')->paginate(10);

        return view('teachers.index')
            ->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new Teachers.
     *
     * @return Response
     */
    public function create()
    {
        return view('teachers.create')->with(['ed_degrees' => $this->ed_degrees->all(), 'institutions'=>$this->institutions->all(),
            'regions'=>$this->regions->all(), 'districts'=>$this->districts->all()]);
    }

    /**
     * Store a newly created Teachers in storage.
     *
     * @param CreateTeachersRequest $request
     *
     * @return Response
     */
    public function store(CreateTeachersRequest $request)
    {
        $input = $request->all();

        $teachers = $this->teachersRepository->create($input);

        Flash::success('Teachers saved successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified Teachers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$teachers = $this->teachersRepository->find($id);

        $teachers = DB::table('education_degrees')->join('teachers', 'teachers.education_degree_id', '=', 'education_degrees.id')->
        join('institutions', 'teachers.institution_id', '=', 'institutions.id')->
        join('regions', 'teachers.region_id', '=', 'regions.id')->
        join('districts', 'teachers.district_id', '=', 'districts.id')->where('teachers.id', $id)->
        select('education_degrees.name as ed_name', 'teachers.*', 'institutions.name as i_name', 'regions.name as r_name', 'districts.name as d_name')->
        get('teachers.id');

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show')->with('teachers', $teachers);
    }

    /**
     * Show the form for editing the specified Teachers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {

        $teachers = $this->teachersRepository->find($id);
        /*$ed_degrees = EducationDegrees::all();
        $institutions = Institutions::all();
        $regions = Regions::all();
        $districts = Districts::all();*/
        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.edit')->with(['teachers' => $teachers, 'ed_degrees' => $this->ed_degrees->all(), 'institutions'=>$this->institutions->all(),
            'regions'=>$this->regions->all(), 'districts'=>$this->districts->all(), 'request'=>$request]);
    }

    /**
     * Update the specified Teachers in storage.
     *
     * @param int $id
     * @param UpdateTeachersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeachersRequest $request)
    {
        $teachers = $this->teachersRepository->find($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        $teachers = $this->teachersRepository->update($request->all(), $id);

        Flash::success('Teachers updated successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified Teachers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teachers = $this->teachersRepository->find($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        $this->teachersRepository->delete($id);

        Flash::success('Teachers deleted successfully.');

        return redirect(route('teachers.index'));
    }
}
