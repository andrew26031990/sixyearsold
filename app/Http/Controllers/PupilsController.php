<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePupilsRequest;
use App\Http\Requests\UpdatePupilsRequest;
use App\Models\Pupils;
use App\Repositories\PupilsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Response;

class PupilsController extends AppBaseController
{
    /** @var  PupilsRepository */
    private $pupilsRepository;

    public function __construct(PupilsRepository $pupilsRepo)
    {
        $this->pupilsRepository = $pupilsRepo;
    }

    /**
     * Display a listing of the Pupils.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pupils = $this->pupilsRepository->paginate(10);
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
        return view('pupils.create');
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
        //$pupils = $this->pupilsRepository->create($input);
        $pupils = new Pupils([
            'full_name'=>$request->get('full_name'),
            'birthday'=>$request->get('birthday'),
            'birth_certificate_number'=>$request->get('birth_certificate_number'),
            'birth_certificate_date'=>$request->get('birth_certificate_date'),
            'birth_certificate_file'=>$request->birth_certificate_file->get('originalName'),
            'has_certificate'=>$request->get('has_certificate'),
        ]);
        $pupils->save();
        Flash::success('Pupils saved successfully.');
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

        return view('pupils.edit')->with('pupils', $pupils);
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

        $pupils = $this->pupilsRepository->update($request->all(), $id);

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

        $this->pupilsRepository->delete($id);

        Flash::success('Pupils deleted successfully.');

        return redirect(route('pupils.index'));
    }
}
