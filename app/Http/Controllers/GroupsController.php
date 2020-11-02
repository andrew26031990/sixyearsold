<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupsRequest;
use App\Http\Requests\UpdateGroupsRequest;
use App\Repositories\CountriesRepository;
use App\Repositories\DistrictsRepository;
use App\Repositories\GroupsRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InstitutionsRepository;
use App\Repositories\RegionsRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class GroupsController extends AppBaseController
{
    /** @var  GroupsRepository */
    private $groupsRepository;

    private $districtsRepository;

    protected $institutionsRepository;

    protected $regionsRepository;

    protected $countriesRepository;


    public function __construct(GroupsRepository $groupsRepo, DistrictsRepository  $districtsRepo, CountriesRepository $countriesRepo, RegionsRepository $regionsRepo, InstitutionsRepository $institutionsRepo)
    {
        $this->groupsRepository = $groupsRepo;
        $this->districtsRepository = $districtsRepo;
        $this->countriesRepository = $countriesRepo;
        $this->regionsRepository = $regionsRepo;
        $this->institutionsRepository = $institutionsRepo;
    }

    /**
     * Display a listing of the Groups.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$groups = $this->groupsRepository->paginate(10);
        $groups = DB::table('groups')->join('institutions', 'groups.institution_id', '=', 'institutions.id')->
        join('countries', 'groups.country_id', '=', 'countries.id')->
        join('regions', 'groups.region_id', '=', 'regions.id')->
        join('districts', 'groups.district_id', '=', 'districts.id')->
        select('countries.name as c_name', 'groups.*', 'institutions.name as i_name', 'regions.name as r_name', 'districts.name as d_name')->paginate(10);
        return view('groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new Groups.
     *
     * @return Response
     */
    public function create()
    {
        return view('groups.create')->with(['districts' => $this->districtsRepository->all(), 'countries' => $this->countriesRepository->all(), 'regions' => $this->regionsRepository->all(), 'institutions' => $this->institutionsRepository->all()]);
    }

    /**
     * Store a newly created Groups in storage.
     *
     * @param CreateGroupsRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupsRequest $request)
    {
        $input = $request->all();

        $groups = $this->groupsRepository->create($input);

        Flash::success('Groups saved successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Display the specified Groups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $groups = DB::table('groups')->join('institutions', 'groups.institution_id', '=', 'institutions.id')->
        join('countries', 'groups.country_id', '=', 'countries.id')->
        join('regions', 'groups.region_id', '=', 'regions.id')->
        join('districts', 'groups.district_id', '=', 'districts.id')->where('groups.id', $id)->
        select('countries.name as c_name', 'groups.*', 'institutions.name as i_name', 'regions.name as r_name', 'districts.name as d_name')->first();

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        return view('groups.show')->with('groups', $groups);
    }

    /**
     * Show the form for editing the specified Groups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        return view('groups.edit')->with(['groups' => $groups, 'districts' => $this->districtsRepository->all(), 'countries' => $this->countriesRepository->all(), 'regions' => $this->regionsRepository->all(), 'institutions' => $this->institutionsRepository->all()]);
    }

    /**
     * Update the specified Groups in storage.
     *
     * @param int $id
     * @param UpdateGroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupsRequest $request)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        $groups = $this->groupsRepository->update($request->all(), $id);

        Flash::success('Groups updated successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified Groups from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        $this->groupsRepository->delete($id);

        Flash::success('Groups deleted successfully.');

        return redirect(route('groups.index'));
    }
}
