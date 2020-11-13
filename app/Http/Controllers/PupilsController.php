<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePupilsRequest;
use App\Http\Requests\UpdatePupilsRequest;
use App\Models\Pupils;
use App\Repositories\CountriesRepository;
use App\Repositories\GroupsRepository;
use App\Repositories\PupilsRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RegionsRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Response;

class PupilsController extends AppBaseController
{
    /** @var  PupilsRepository */
    private $pupilsRepository;

    private $groupsRepository;

    private $countriesRepository;

    private $regionsRepository;

    public function __construct(PupilsRepository $pupilsRepo, GroupsRepository $groupsRepo, CountriesRepository $countriesRepo, RegionsRepository $regionsRepo)
    {
        $this->pupilsRepository = $pupilsRepo;
        $this->groupsRepository = $groupsRepo;
        $this->countriesRepository = $countriesRepo;
        $this->regionsRepository = $regionsRepo;
    }

    /**
     * Display a listing of the Pupils.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
        $pupils = DB::table('pupils')->
        join('groups', 'pupils.group_id', '=', 'groups.id')->
        select('groups.name as g_name', 'pupils.*')->orderBy('pupils.id', 'DESC')->paginate(10);
        return view('pupils.index')
            ->with('pupils', $pupils);
    }

    /**
     * Show the form for creating a new Pupils.
     *
     * @return Response
     */
    public function create()
    {
        return view('pupils.create')->with(['regions'=>$this->regionsRepository->all()]);
    }

    /**
     * Store a newly created Pupils in storage.
     *
     * @param CreatePupilsRequest $request
     *
     * @return Response
     */
    public function store(CreatePupilsRequest $request)
    {
        $input = $request->all();
        $pupils = new Pupils([
            'group_id'=>$request->get('group_id'),
            'full_name'=>$request->get('full_name'),
            'birthday'=>$request->get('birthday'),
            'birth_certificate_number'=>$request->get('birth_certificate_number'),
            'birth_certificate_date'=>$request->get('birth_certificate_date'),
            'birth_certificate_file'=> $this->uploadFile($request, 'uploads/pupils/birth_certificate'), //
            'has_certificate'=>$request->get('has_certificate'),
            'sex'=>$request->get('sex'),
        ]);
        $pupils->save();
        Flash::success('Pupils saved successfully.');
        Log::info(Auth::user()->name.' added '.$request->get('full_name'));
        return redirect(route('pupils.index'));
    }
    /**
     * Display the specified Pupils.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pupils = $this->pupilsRepository->find($id);

        if (empty($pupils)) {
            Flash::error('Pupils not found');

            return redirect(route('pupils.index'));
        }

        return view('pupils.show')->with('pupils', $pupils);
    }

    /**
     * Show the form for editing the specified Pupils.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pupils = $this->pupilsRepository->find($id);
        $groups = DB::table('groups')->
        join('countries', 'countries.id', '=', 'groups.country_id')->
        join('regions', 'regions.id', '=', 'groups.region_id')->
        join('districts', 'districts.id', '=', 'groups.district_id')->
        join('institutions', 'institutions.id', '=', 'groups.institution_id')->
        where('groups.id', $pupils->group_id)->
        get(['countries.name as c_name', 'countries.id as c_id', 'regions.name as r_name', 'regions.id as r_id', 'districts.name as d_name', 'districts.id as d_id', 'institutions.name as i_name', 'institutions.id as i_id', 'groups.name as g_name', 'groups.id as g_id']);
        if (empty($pupils)) {
            Flash::error('Pupils not found');

            return redirect(route('pupils.index'));
        }

        return view('pupils.edit')->with(['pupils' => $pupils, 'groups' => $groups, 'countries'=>$this->countriesRepository->all()]);
    }

    /**
     * Update the specified Pupils in storage.
     *
     * @param int $id
     * @param UpdatePupilsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePupilsRequest $request)
    {
        //dd($request);
        $request->validate([
            'group_id' => 'integer|required_without:-1',
        ]);
        $pupils = $this->pupilsRepository->find($id);

        if (empty($pupils)) {
            Flash::error('Pupils not found');

            return redirect(route('pupils.index'));
        }

        if($request->hasFile('birth_certificate_file')){
            $this->deleteFile('uploads/pupils/birth_certificate/', $pupils->birth_certificate_file);
            $this->pupilsRepository->update(
                array(
                    'group_id' => $request->get('group_id'),
                    'full_name'=>$request->get('full_name'),
                    'birthday'=>$request->get('birthday'),
                    'birth_certificate_number'=>$request->get('birth_certificate_number'),
                    'birth_certificate_file'=>$this->uploadFile($request, 'uploads/pupils/birth_certificate'),
                    'birth_certificate_date'=>$request->get('birth_certificate_date'),
                    'has_certificate'=>$request->get('has_certificate'),
                    'sex'=>$request->get('sex'),
                ),
                $id);
        }else{
            $this->pupilsRepository->update(
                array(
                    'group_id' => $request->get('group_id'),
                    'full_name'=>$request->get('full_name'),
                    'birthday'=>$request->get('birthday'),
                    'birth_certificate_number'=>$request->get('birth_certificate_number'),
                    'birth_certificate_date'=>$request->get('birth_certificate_date'),
                    'has_certificate'=>$request->get('has_certificate'),
                    'sex'=>$request->get('sex'),
                ),
                $id);
        }

        Flash::success('Pupils updated successfully.');

        return redirect(route('pupils.index'));
    }

    /**
     * Remove the specified Pupils from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pupils = $this->pupilsRepository->find($id);

        if (empty($pupils)) {
            Flash::error('Pupils not found');

            return redirect(route('pupils.index'));
        }

        try{
            $this->deleteFile('uploads/pupils/birth_certificate/', $pupils->birth_certificate_file);
            $this->pupilsRepository->delete($id);
            Flash::success('Pupils deleted successfully.');
        }catch (\Exception $exception){
            Flash::error('Невозможно удалить воспитанника: '.$exception->getMessage());
        }

        return redirect(route('pupils.index'));
    }

    public function uploadFile($request, $destinationPath){
        $Validation = $request->validate([
            'birth_certificate_file' => 'required|file|mimes:jpg,jpeg,png|max:2048'
        ]);
        $file = $Validation['birth_certificate_file'];//$request->file('birth_certificate_file');
        $newNameImage = date('Ymdhis').'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $newNameImage);
        return $newNameImage;
    }

    public function deleteFile($path, $file_name){
        if(file_exists($path.$file_name)){
            unlink($path.$file_name);
        }
    }
}
