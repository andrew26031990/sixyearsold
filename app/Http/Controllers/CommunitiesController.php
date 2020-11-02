<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommunitiesRequest;
use App\Http\Requests\UpdateCommunitiesRequest;
use App\Repositories\CommunitiesRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DistrictsRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class CommunitiesController extends AppBaseController
{
    /** @var  CommunitiesRepository */
    private $communitiesRepository;
    private $districtsRepository;

    public function __construct(CommunitiesRepository $communitiesRepo, DistrictsRepository $districtsRepo)
    {
        $this->communitiesRepository = $communitiesRepo;
        $this->districtsRepository = $districtsRepo;
    }

    /**
     * Display a listing of the Communities.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $communities = DB::table('communities')->
        join('districts', 'communities.district_id', '=', 'districts.id')->
        select('districts.name as d_name', 'communities.*')->paginate(10);

        return view('communities.index')
            ->with('communities', $communities);
    }

    /**
     * Show the form for creating a new Communities.
     *
     * @return Response
     */
    public function create()
    {
        return view('communities.create')->with('districts', $this->districtsRepository->all());
    }

    /**
     * Store a newly created Communities in storage.
     *
     * @param CreateCommunitiesRequest $request
     *
     * @return Response
     */
    public function store(CreateCommunitiesRequest $request)
    {
        $input = $request->all();

        $communities = $this->communitiesRepository->create($input);

        Flash::success('Communities saved successfully.');

        return redirect(route('communities.index'));
    }

    /**
     * Display the specified Communities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $communities = DB::table('communities')->join('districts', 'communities.district_id', '=', 'districts.id')->
        where('communities.id', $id)->
        select('communities.*', 'districts.name as d_name')->first();
        if (empty($communities)) {
            Flash::error('Communities not found');

            return redirect(route('communities.index'));
        }

        return view('communities.show')->with('communities', $communities);
    }

    /**
     * Show the form for editing the specified Communities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $communities = $this->communitiesRepository->find($id);

        if (empty($communities)) {
            Flash::error('Communities not found');

            return redirect(route('communities.index'));
        }

        return view('communities.edit')->with(['communities' => $communities, 'districts' => $this->districtsRepository->all()]);
    }

    /**
     * Update the specified Communities in storage.
     *
     * @param int $id
     * @param UpdateCommunitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommunitiesRequest $request)
    {
        $communities = $this->communitiesRepository->find($id);

        if (empty($communities)) {
            Flash::error('Communities not found');

            return redirect(route('communities.index'));
        }

        $communities = $this->communitiesRepository->update($request->all(), $id);

        Flash::success('Communities updated successfully.');

        return redirect(route('communities.index'));
    }

    /**
     * Remove the specified Communities from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $communities = $this->communitiesRepository->find($id);

        if (empty($communities)) {
            Flash::error('Communities not found');

            return redirect(route('communities.index'));
        }

        $this->communitiesRepository->delete($id);

        Flash::success('Communities deleted successfully.');

        return redirect(route('communities.index'));
    }
}
