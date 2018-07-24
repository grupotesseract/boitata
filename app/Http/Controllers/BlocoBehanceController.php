<?php

namespace App\Http\Controllers;

use App\DataTables\BlocoBehanceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBlocoBehanceRequest;
use App\Http\Requests\UpdateBlocoBehanceRequest;
use App\Repositories\BlocoBehanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BlocoBehanceController extends AppBaseController
{
    /** @var  BlocoBehanceRepository */
    private $blocoBehanceRepository;

    public function __construct(BlocoBehanceRepository $blocoBehanceRepo)
    {
        $this->blocoBehanceRepository = $blocoBehanceRepo;
    }

    /**
     * Display a listing of the BlocoBehance.
     *
     * @param BlocoBehanceDataTable $blocoBehanceDataTable
     * @return Response
     */
    public function index(BlocoBehanceDataTable $blocoBehanceDataTable)
    {
        return $blocoBehanceDataTable->render('bloco_behances.index');
    }

    /**
     * Show the form for creating a new BlocoBehance.
     *
     * @return Response
     */
    public function create()
    {
        return view('bloco_behances.create');
    }

    /**
     * Store a newly created BlocoBehance in storage.
     *
     * @param CreateBlocoBehanceRequest $request
     *
     * @return Response
     */
    public function store(CreateBlocoBehanceRequest $request)
    {
        $input = $request->all();

        $blocoBehance = $this->blocoBehanceRepository->create($input);

        Flash::success('Bloco Behance saved successfully.');

        return redirect(route('blocoBehances.index'));
    }

    /**
     * Display the specified BlocoBehance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blocoBehance = $this->blocoBehanceRepository->findWithoutFail($id);

        if (empty($blocoBehance)) {
            Flash::error('Bloco Behance not found');

            return redirect(route('blocoBehances.index'));
        }

        return view('bloco_behances.show')->with('blocoBehance', $blocoBehance);
    }

    /**
     * Show the form for editing the specified BlocoBehance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blocoBehance = $this->blocoBehanceRepository->findWithoutFail($id);

        if (empty($blocoBehance)) {
            Flash::error('Bloco Behance not found');

            return redirect(route('blocoBehances.index'));
        }

        return view('bloco_behances.edit')->with('blocoBehance', $blocoBehance);
    }

    /**
     * Update the specified BlocoBehance in storage.
     *
     * @param  int              $id
     * @param UpdateBlocoBehanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlocoBehanceRequest $request)
    {
        $blocoBehance = $this->blocoBehanceRepository->findWithoutFail($id);

        if (empty($blocoBehance)) {
            Flash::error('Bloco Behance not found');

            return redirect(route('blocoBehances.index'));
        }

        $blocoBehance = $this->blocoBehanceRepository->update($request->all(), $id);

        Flash::success('Bloco Behance updated successfully.');

        return redirect(route('blocoBehances.index'));
    }

    /**
     * Remove the specified BlocoBehance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blocoBehance = $this->blocoBehanceRepository->findWithoutFail($id);

        if (empty($blocoBehance)) {
            Flash::error('Bloco Behance not found');

            return redirect(route('blocoBehances.index'));
        }

        $this->blocoBehanceRepository->delete($id);

        Flash::success('Bloco Behance deleted successfully.');

        return redirect(route('blocoBehances.index'));
    }
}
