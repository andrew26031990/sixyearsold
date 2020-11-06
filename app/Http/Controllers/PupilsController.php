<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePupilsRequest;
use App\Http\Requests\UpdatePupilsRequest;
use App\Models\Pupils;
use App\Repositories\CountriesRepository;
use App\Repositories\GroupsRepository;
use App\Repositories\PupilsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Response;

class PupilsController extends AppBaseController
{
    /** @var  PupilsRepository */
    private $pupilsRepository;

    private $groupsRepository;

    private $countriesRepository;

    public function __construct(PupilsRepository $pupilsRepo, GroupsRepository $groupsRepo, CountriesRepository $countriesRepo)
    {
        $this->pupilsRepository = $pupilsRepo;
        $this->groupsRepository = $groupsRepo;
        $this->countriesRepository = $countriesRepo;
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
        return view('pupils.create')->with(['groups'=>$this->groupsRepository->all(), 'countries'=>$this->countriesRepository->all()]);
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
        ]);
        $pupils->save();
        Flash::success('Pupils saved successfully.');
        Log::info('Pupil added');
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

        if (empty($pupils)) {
            Flash::error('Pupils not found');

            return redirect(route('pupils.index'));
        }

        return view('pupils.edit')->with(['pupils' => $pupils, 'groups' => $this->groupsRepository->all(), 'countries'=>$this->countriesRepository->all()]);
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
