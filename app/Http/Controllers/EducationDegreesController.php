<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEducationDegreesRequest;
use App\Http\Requests\UpdateEducationDegreesRequest;
use App\Repositories\EducationDegreesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EducationDegreesController extends AppBaseController
{
    /** @var  EducationDegreesRepository */
    private $educationDegreesRepository;

    public function __construct(EducationDegreesRepository $educationDegreesRepo)
    {
        $this->educationDegreesRepository = $educationDegreesRepo;
    }

    /**
     * Display a listing of the EducationDegrees.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $educationDegrees = $this->educationDegreesRepository->all();

        return view('education_degrees.index')
            ->with('educationDegrees', $educationDegrees);
    }

    /**
     * Show the form for creating a new EducationDegrees.
     *
     * @return Response
     */
    public function create()
    {
        return view('education_degrees.create');
    }

    /**
     * Store a newly created EducationDegrees in storage.
     *
     * @param CreateEducationDegreesRequest $request
     *
     * @return Response
     */
    public function store(CreateEducationDegreesRequest $request)
    {
        $input = $request->all();

        $educationDegrees = $this->educationDegreesRepository->create($input);

        Flash::success(__('message.education_degree_saved_successfully'));

        return redirect(route('educationDegrees.index'));
    }

    /**
     * Display the specified EducationDegrees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $educationDegrees = $this->educationDegreesRepository->find($id);

        if (empty($educationDegrees)) {
            Flash::error(__('message.education_degree_not_found'));

            return redirect(route('educationDegrees.index'));
        }

        return view('education_degrees.show')->with('educationDegrees', $educationDegrees);
    }

    /**
     * Show the form for editing the specified EducationDegrees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $educationDegrees = $this->educationDegreesRepository->find($id);

        if (empty($educationDegrees)) {
            Flash::error(__('message.education_degree_not_found'));

            return redirect(route('educationDegrees.index'));
        }

        return view('education_degrees.edit')->with('educationDegrees', $educationDegrees);
    }

    /**
     * Update the specified EducationDegrees in storage.
     *
     * @param int $id
     * @param UpdateEducationDegreesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEducationDegreesRequest $request)
    {
        $educationDegrees = $this->educationDegreesRepository->find($id);

        if (empty($educationDegrees)) {
            Flash::error(__('message.education_degree_not_found'));

            return redirect(route('educationDegrees.index'));
        }

        $educationDegrees = $this->educationDegreesRepository->update($request->all(), $id);

        Flash::success(__('message.education_degree_updated_successfully'));

        return redirect(route('educationDegrees.index'));
    }

    /**
     * Remove the specified EducationDegrees from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $educationDegrees = $this->educationDegreesRepository->find($id);

        if (empty($educationDegrees)) {
            Flash::error(__('message.education_degree_not_found'));

            return redirect(route('educationDegrees.index'));
        }

        //$this->educationDegreesRepository->delete($id);

        try{
            $this->educationDegreesRepository->delete($id);
            Flash::success(__('message.education_degree_deleted_successfully'));
        }catch (\Exception $exception){
            Flash::error(__('message.unable_to_delete_education_degree').$exception->getMessage());
        }

        //Flash::success('Education Degrees deleted successfully.');

        return redirect(route('educationDegrees.index'));
    }
}
