<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstitutionsRequest;
use App\Http\Requests\UpdateInstitutionsRequest;
use App\Models\Countries;
use App\Models\Districts;
use App\Models\Regions;
use App\Repositories\InstitutionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class InstitutionsController extends AppBaseController
{
    /** @var  InstitutionsRepository */
    private $institutionsRepository;

    protected $regions;

    protected $districts;

    protected $countries;

    public function __construct(InstitutionsRepository $institutionsRepo, Regions $regions, Districts $districts, Countries $countries)
    {
        $this->institutionsRepository = $institutionsRepo;
        $this->regions = $regions;
        $this->districts = $districts;
        $this->countries = $countries;
    }

    /**
     * Display a listing of the Institutions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$institutions = $this->institutionsRepository->paginate(10);
        $institutions = DB::table('institutions')->
        join('countries', 'institutions.country_id', '=', 'countries.id')->
        join('regions', 'institutions.region_id', '=', 'regions.id')->
        join('districts', 'institutions.district_id', '=', 'districts.id')->
        select('countries.name as c_name', 'institutions.*', 'regions.name as r_name', 'districts.name as d_name')->paginate(10);

        return view('institutions.index')
            ->with('institutions', $institutions);
    }

    /**
     * Show the form for creating a new Institutions.
     *
     * @return Response
     */
    public function create()
    {
        return view('institutions.create')->with(['countries'=>$this->countries->all(), 'regions'=>$this->regions->all(), 'districts'=>$this->districts->all()]);
    }

    /**
     * Store a newly created Institutions in storage.
     *
     * @param CreateInstitutionsRequest $request
     *
     * @return Response
     */
    public function store(CreateInstitutionsRequest $request)
    {
        $input = $request->all();
        $institutions = $this->institutionsRepository->create($input);

        Flash::success(__('message.institution_saved_successfully'));

        return redirect(route('institutions.index'));
    }

    /**
     * Display the specified Institutions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $institutions = DB::table('institutions')->
        join('countries', 'institutions.country_id', '=', 'countries.id')->
        join('regions', 'institutions.region_id', '=', 'regions.id')->
        join('districts', 'institutions.district_id', '=', 'districts.id')->where('institutions.id', $id)->
        select('countries.name as c_name', 'institutions.*', 'regions.name as r_name', 'districts.name as d_name')->first();

        if (empty($institutions)) {
            Flash::error(__('message.institutions_not_found'));

            return redirect(route('institutions.index'));
        }

        return view('institutions.show')->with('institutions', $institutions);
    }

    /**
     * Show the form for editing the specified Institutions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error(__('message.institutions_not_found'));

            return redirect(route('institutions.index'));
        }

        return view('institutions.edit')->with(['institutions' => $institutions, 'countries'=>$this->countries->all(), 'regions'=>$this->regions->all(), 'districts'=>$this->districts->all()]);
    }

    /**
     * Update the specified Institutions in storage.
     *
     * @param int $id
     * @param UpdateInstitutionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstitutionsRequest $request)
    {
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error(__('message.institutions_not_found'));

            return redirect(route('institutions.index'));
        }

        $institutions = $this->institutionsRepository->update($request->all(), $id);

        Flash::success(__('message.institution_updated_successfully'));

        return redirect(route('institutions.index'));
    }

    /**
     * Remove the specified Institutions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error(__('message.institutions_not_found'));

            return redirect(route('institutions.index'));
        }

        $this->institutionsRepository->delete($id);

        Flash::success(__('message.institution_deleted_successfully'));

        return redirect(route('institutions.index'));
    }

    public function getInstitutions(){
        $id = $_GET['id'];
        $institutions = DB::table('institutions')->where('district_id', '=', $id)->get();
        $html = '<option value="">'.trans('message.choose_organization').'</option>';
        foreach ($institutions as $institution){
            $html .=
                '<option value="'.$institution->id.'">'.$institution->name.'</option>';
        }
        return $html;
    }
}
