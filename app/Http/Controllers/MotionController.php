<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMotionRequest;
use App\Http\Requests\UpdateMotionRequest;
use App\Repositories\MotionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MotionController extends AppBaseController
{
    /** @var  MotionRepository */
    private $motionRepository;

    public function __construct(MotionRepository $motionRepo)
    {
        $this->motionRepository = $motionRepo;
    }

    /**
     * Display a listing of the Motion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->motionRepository->pushCriteria(new RequestCriteria($request));
        $motions = $this->motionRepository->all();
        $motion =  \App\Models\Motion::ativo()->get()->first();

        return view('motions.index')
            ->with('motions', $motions)
            ->with('motion', $motion);
    }

    /**
     * Show the form for creating a new Motion.
     *
     * @return Response
     */
    public function create()
    {
        return view('motions.create');
    }

    /**
     * Store a newly created Motion in storage.
     *
     * @param CreateMotionRequest $request
     *
     * @return Response
     */
    public function store(CreateMotionRequest $request)
    {
        $input = $request->all();

        $motion = $this->motionRepository->create($input);

        Flash::success('Motion saved successfully.');

        return redirect(route('motions.index'));
    }

    /**
     * Display the specified Motion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $motion = $this->motionRepository->findWithoutFail($id);

        if (empty($motion)) {
            Flash::error('Motion não encontrado');

            return redirect(route('motions.index'));
        }

        return view('motions.show')->with('motion', $motion);
    }

    /**
     * Show the form for editing the specified Motion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $motion = $this->motionRepository->findWithoutFail($id);

        if (empty($motion)) {
            Flash::error('Motion não encontrado');

            return redirect(route('motions.index'));
        }

        return view('motions.edit')->with('motion', $motion);
    }

    /**
     * Update the specified Motion in storage.
     *
     * @param  int              $id
     * @param UpdateMotionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMotionRequest $request)
    {
        $motion = $this->motionRepository->findWithoutFail($id);

        if (empty($motion)) {
            Flash::error('Motion não encontrado');
            return redirect(route('motions.index'));
        }

        $motion = $this->motionRepository->update($request->all(), $id);
        $motion->categorias()->sync($request->categorias);

        Flash::success('Motion atualizado com sucesso.');
        return redirect(route('motions.index'));
    }

    /**
     * Remove the specified Motion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $motion = $this->motionRepository->findWithoutFail($id);

        if (empty($motion)) {
            Flash::error('Motion não encontrado');

            return redirect(route('motions.index'));
        }

        $this->motionRepository->delete($id);

        Flash::success('Motion deleted successfully.');

        return redirect(route('motions.index'));
    }
}
