<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;
use App\Repositories\CountriesRepository;
use App\Repositories\RegionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class RegionsController extends AppBaseController
{
    /** @var  RegionsRepository */
    private $regionsRepository;

    private $countriesRepository;

    public function __construct(RegionsRepository $regionsRepo, CountriesRepository $countriesRepo)
    {
        $this->regionsRepository = $regionsRepo;
        $this->countriesRepository = $countriesRepo;
    }

    /**
     * Display a listing of the Regions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $regions = DB::table('regions')->
        join('countries', 'regions.country_id', '=', 'countries.id')->
        select('countries.name as c_name', 'regions.*')->paginate(10);
        return view('regions.index')
            ->with('regions', $regions);
    }

    /**
     * Show the form for creating a new Regions.
     *
     * @return Response
     */
    public function create()
    {
        return view('regions.create')->with('countries', $this->countriesRepository->all());
    }

    /**
     * Store a newly created Regions in storage.
     *
     * @param CreateRegionsRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionsRequest $request)
    {
        $input = $request->all();

        $regions = $this->regionsRepository->create($input);

        Flash::success(__('message.region_saved_successfully'));

        return redirect(route('regions.index'));
    }

    /**
     * Display the specified Regions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regions = DB::table('regions')->
        join('countries', 'regions.country_id', '=', 'countries.id')->where('regions.id', $id)->
        select('countries.name as c_name', 'regions.*')->first();
        if (empty($regions)) {
            Flash::error(__('message.region_not_found'));

            return redirect(route('regions.index'));
        }

        return view('regions.show')->with('regions', $regions);
    }

    /**
     * Show the form for editing the specified Regions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            Flash::error(__('message.region_not_found'));

            return redirect(route('regions.index'));
        }

        return view('regions.edit')->with(['regions' => $regions, 'countries' => $this->countriesRepository->all()]);
    }

    /**
     * Update the specified Regions in storage.
     *
     * @param int $id
     * @param UpdateRegionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionsRequest $request)
    {
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            Flash::error(__('message.region_not_found'));

            return redirect(route('regions.index'));
        }

        $regions = $this->regionsRepository->update($request->all(), $id);

        Flash::success(__('message.region_updated_successfully'));

        return redirect(route('regions.index'));
    }

    /**
     * Remove the specified Regions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            Flash::error(__('message.region_not_found'));

            return redirect(route('regions.index'));
        }

        try{
            $this->regionsRepository->delete($id);
            Flash::success(__('message.region_deleted_successfully'));
        }catch (\Exception $exception){
            Flash::error(__('message.unable_to_delete_region').$exception->getMessage());
        }

        return redirect(route('regions.index'));
    }

    public function getRegions(){
        $id = $_GET['id'];
        $regions = DB::table('regions')->where('country_id', '=', $id)->get();
        $html = '<option value="">Выберите регион</option>';
        foreach ($regions as $region){
            $html .=
                '<option value="'.$region->id.'">'.$region->name.'</option>';
        }
        return $html;
    }
}
