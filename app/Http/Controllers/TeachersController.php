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
use App\Providers\Services\GetDataFromAjax;

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
        return view('teachers.create')->with(['ed_degrees' => $this->ed_degrees->all(),
            'regions'=>$this->regions->all()]);
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
        $teachers = new Teachers([
            'full_name'=>$request->get('full_name'),
            'birthday'=>$request->get('birthday'),
            'education_degree_id'=>$request->get('education_degree_id'),
            'specialization'=>$request->get('specialization'),
            'education_document_name'=>$request->get('education_document_name'),
            'education_document_file'=> $this->uploadFile($request, 'uploads/teachers/education_document'), //
            'education_document_number'=>$request->get('education_document_number'),
            'education_document_date'=>$request->get('education_document_date'),
            'district_id'=>$request->get('district_id'),
            'region_id'=>$request->get('region_id'),
            'institution_id'=>$request->get('institution_id'),
        ]);
        $teachers->save();
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
        $institutions = DB::table('institutions')->where('institutions.id', $teachers->institution_id)->get();
        $districts = DB::table('districts')->where('districts.id', $teachers->district_id)->get();
        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.edit')->with(['teachers' => $teachers, 'ed_degrees' => $this->ed_degrees->all(), 'institutions'=>$institutions,
            'regions'=>$this->regions->all(), 'districts'=>$districts, 'request'=>$request]);
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

        if($request->hasFile('education_document_file')){
            $this->deleteFile('uploads/teachers/education_document/', $teachers->education_document_file);
            $this->teachersRepository->update(
                array(
                    'full_name'=>$request->get('full_name'),
                    'birthday'=>$request->get('birthday'),
                    'education_degree_id'=>$request->get('education_degree_id'),
                    'specialization'=>$request->get('specialization'),
                    'education_document_name' => $request->get('education_document_name'),
                    'education_document_file'=>$this->uploadFile($request, 'uploads/teachers/education_document'),
                    'education_document_date'=>$request->get('education_document_date'),
                    'district_id'=>$request->get('district_id'),
                    'region_id'=>$request->get('region_id'),
                    'institution_id'=>$request->get('institution_id'),
                ),
                $id);
        }else{
            $this->teachersRepository->update(
                array(
                    'full_name'=>$request->get('full_name'),
                    'birthday'=>$request->get('birthday'),
                    'education_degree_id'=>$request->get('education_degree_id'),
                    'specialization'=>$request->get('specialization'),
                    'education_document_name' => $request->get('education_document_name'),
                    'education_document_date'=>$request->get('education_document_date'),
                    'district_id'=>$request->get('district_id'),
                    'region_id'=>$request->get('region_id'),
                    'institution_id'=>$request->get('institution_id'),
                ),
                $id);
        }

        //$teachers = $this->teachersRepository->update($request->all(), $id);

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

        try{
            $this->deleteFile('uploads/teachers/education_document/', $teachers->education_document_file);
            $this->teachersRepository->delete($id);
            Flash::success('Teachers deleted successfully.');
        }catch (\Exception $exception){
            Flash::error('Невозможно удалить учителя'.$exception->getMessage());
        }

        return redirect(route('teachers.index'));
    }

    public function uploadFile($request, $destinationPath){
        $Validation = $request->validate([
            'education_document_file' => 'required|file|mimes:jpg,jpeg,png|max:2048'
        ]);
        $file = $Validation['education_document_file'];//$request->file('education_document_file');
        $newNameImage = date('Ymdhis').'_'.$request->file('education_document_file')->getClientOriginalName();
        $file->move($destinationPath, $newNameImage);
        return $newNameImage;
    }

    public function deleteFile($path, $file_name){
        if(file_exists($path.$file_name)){
            unlink($path.$file_name);
        }
    }
}
