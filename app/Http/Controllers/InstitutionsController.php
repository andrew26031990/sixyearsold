<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstitutionsRequest;
use App\Http\Requests\UpdateInstitutionsRequest;
use App\Repositories\InstitutionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InstitutionsController extends AppBaseController
{
    /** @var  InstitutionsRepository */
    private $institutionsRepository;

    public function __construct(InstitutionsRepository $institutionsRepo)
    {
        $this->institutionsRepository = $institutionsRepo;
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
        $institutions = $this->institutionsRepository->paginate(10);

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
        return view('institutions.create');
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

        Flash::success('Institutions saved successfully.');

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
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error('Institutions not found');

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
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        return view('institutions.edit')->with('institutions', $institutions);
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
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        $institutions = $this->institutionsRepository->update($request->all(), $id);

        Flash::success('Institutions updated successfully.');

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
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        $this->institutionsRepository->delete($id);

        Flash::success('Institutions deleted successfully.');

        return redirect(route('institutions.index'));
    }
}
