<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;
use App\Repositories\RegionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RegionsController extends AppBaseController
{
    /** @var  RegionsRepository */
    private $regionsRepository;

    public function __construct(RegionsRepository $regionsRepo)
    {
        $this->regionsRepository = $regionsRepo;
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
        $regions = $this->regionsRepository->all();

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
        return view('regions.create');
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

        Flash::success('Regions saved successfully.');

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
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            Flash::error('Regions not found');

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
            Flash::error('Regions not found');

            return redirect(route('regions.index'));
        }

        return view('regions.edit')->with('regions', $regions);
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
            Flash::error('Regions not found');

            return redirect(route('regions.index'));
        }

        $regions = $this->regionsRepository->update($request->all(), $id);

        Flash::success('Regions updated successfully.');

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
            Flash::error('Regions not found');

            return redirect(route('regions.index'));
        }

        $this->regionsRepository->delete($id);

        Flash::success('Regions deleted successfully.');

        return redirect(route('regions.index'));
    }
}
