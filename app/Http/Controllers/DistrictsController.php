<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistrictsRequest;
use App\Http\Requests\UpdateDistrictsRequest;
use App\Repositories\DistrictsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DistrictsController extends AppBaseController
{
    /** @var  DistrictsRepository */
    private $districtsRepository;

    public function __construct(DistrictsRepository $districtsRepo)
    {
        $this->districtsRepository = $districtsRepo;
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
        $districts = $this->districtsRepository->paginate(10);

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
        return view('districts.create');
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

        Flash::success('Districts saved successfully.');

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
        $districts = $this->districtsRepository->find($id);

        if (empty($districts)) {
            Flash::error('Districts not found');

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
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        return view('districts.edit')->with('districts', $districts);
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
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        $districts = $this->districtsRepository->update($request->all(), $id);

        Flash::success('Districts updated successfully.');

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
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        $this->districtsRepository->delete($id);

        Flash::success('Districts deleted successfully.');

        return redirect(route('districts.index'));
    }
}
