<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistrictsRequest;
use App\Http\Requests\UpdateDistrictsRequest;
use App\Repositories\DistrictsRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RegionsRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class DistrictsController extends AppBaseController
{
    /** @var  DistrictsRepository */
    private $districtsRepository;

    private $regionsRepository;

    public function __construct(DistrictsRepository $districtsRepo, RegionsRepository $regionsRepo)
    {
        $this->districtsRepository = $districtsRepo;
        $this->regionsRepository = $regionsRepo;
    }

    /**
     * Display a listing of the Districts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $districts = DB::table('districts')->
        join('regions', 'districts.region_id', '=', 'regions.id')->
        select('regions.name as r_name', 'districts.*')->paginate(10);
        return view('districts.index')
            ->with('districts', $districts);
    }

    /**
     * Show the form for creating a new Districts.
     *
     * @return Response
     */
    public function create()
    {
        return view('districts.create')->with('regions', $this->regionsRepository->all());
    }

    /**
     * Store a newly created Districts in storage.
     *
     * @param CreateDistrictsRequest $request
     *
     * @return Response
     */
    public function store(CreateDistrictsRequest $request)
    {
        $input = $request->all();

        $districts = $this->districtsRepository->create($input);

        Flash::success(__('message.district_saved_successfully'));

        return redirect(route('districts.index'));
    }

    /**
     * Display the specified Districts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $districts = DB::table('districts')->
        join('regions', 'districts.region_id', '=', 'regions.id')->where('districts.id', $id)->
        select('regions.name as r_name', 'districts.*')->first();
        if (empty($districts)) {
            Flash::error(__('message.district_not_found'));

            return redirect(route('districts.index'));
        }

        return view('districts.show')->with('districts', $districts);
    }

    /**
     * Show the form for editing the specified Districts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $districts = $this->districtsRepository->find($id);

        if (empty($districts)) {
            Flash::error(__('message.district_not_found'));

            return redirect(route('districts.index'));
        }

        return view('districts.edit')->with(['districts' => $districts, 'regions' => $this->regionsRepository->all()]);
    }

    /**
     * Update the specified Districts in storage.
     *
     * @param int $id
     * @param UpdateDistrictsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistrictsRequest $request)
    {
        $districts = $this->districtsRepository->find($id);

        if (empty($districts)) {
            Flash::error(__('message.district_not_found'));

            return redirect(route('districts.index'));
        }

        $districts = $this->districtsRepository->update($request->all(), $id);

        Flash::success(__('message.district_updated_successfully'));

        return redirect(route('districts.index'));
    }

    /**
     * Remove the specified Districts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $districts = $this->districtsRepository->find($id);

        if (empty($districts)) {
            Flash::error(__('message.district_not_found'));

            return redirect(route('districts.index'));
        }

        try{
            $this->districtsRepository->delete($id);
            Flash::success(__('message.district_deleted_successfully'));
        }catch (\Exception $exception){
            Flash::error(__('message.unable_to_delete_district').$exception->getMessage());
        }

        return redirect(route('districts.index'));
    }

    public function getDistricts(){
        $id = $_GET['id'];
        $districts = DB::table('districts')->where('region_id', '=', $id)->get();
        $html = '<option value="">Выберите район</option>';
        foreach ($districts as $district){
            $html .=
                '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
        return $html;
    }
}
