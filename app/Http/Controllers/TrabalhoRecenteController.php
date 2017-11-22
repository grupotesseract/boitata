<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateTrabalhoRecenteRequest;
use App\Http\Requests\UpdateTrabalhoRecenteRequest;
use App\Repositories\FotoRepository;
use App\Repositories\TrabalhoRecenteRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrabalhoRecenteController extends AppBaseController
{
    /** @var  TrabalhoRecenteRepository */
    private $trabalhoRecenteRepository;
    private $fotosRepository;

    public function __construct(TrabalhoRecenteRepository $trabalhoRecenteRepo, FotoRepository $fotoRepo)
    {
        $this->trabalhoRecenteRepository = $trabalhoRecenteRepo;
        $this->fotosRepository = $fotoRepo;
    }

    /**
     * Display a listing of the TrabalhoRecente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trabalhoRecenteRepository->pushCriteria(new RequestCriteria($request));
        $trabalhoRecentes = $this->trabalhoRecenteRepository->all();

        return view('trabalho_recentes.index')
            ->with('trabalhoRecentes', $trabalhoRecentes);
    }

    /**
     * Show the form for creating a new TrabalhoRecente.
     *
     * @return Response
     */
    public function create()
    {
        return view('trabalho_recentes.create');
    }

    /**
     * Store a newly created TrabalhoRecente in storage.
     *
     * @param CreateTrabalhoRecenteRequest $request
     *
     * @return Response
     */
    public function store(CreateTrabalhoRecenteRequest $request)
    {
        $input = $request->all();

        dd($input, $this->fotosRepository);

        $trabalhoRecente = $this->trabalhoRecenteRepository->create($input);

        Flash::success('Trabalho Recente saved successfully.');

        return redirect(route('trabalhoRecentes.index'));
    }

    /**
     * Display the specified TrabalhoRecente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trabalhoRecente = $this->trabalhoRecenteRepository->findWithoutFail($id);

        if (empty($trabalhoRecente)) {
            Flash::error('Trabalho Recente not found');

            return redirect(route('trabalhoRecentes.index'));
        }

        return view('trabalho_recentes.show')->with('trabalhoRecente', $trabalhoRecente);
    }

    /**
     * Show the form for editing the specified TrabalhoRecente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trabalhoRecente = $this->trabalhoRecenteRepository->findWithoutFail($id);

        if (empty($trabalhoRecente)) {
            Flash::error('Trabalho Recente not found');

            return redirect(route('trabalhoRecentes.index'));
        }

        return view('trabalho_recentes.edit')->with('trabalhoRecente', $trabalhoRecente);
    }

    /**
     * Update the specified TrabalhoRecente in storage.
     *
     * @param  int              $id
     * @param UpdateTrabalhoRecenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrabalhoRecenteRequest $request)
    {
        $trabalhoRecente = $this->trabalhoRecenteRepository->findWithoutFail($id);

        if (empty($trabalhoRecente)) {
            Flash::error('Trabalho Recente not found');

            return redirect(route('trabalhoRecentes.index'));
        }

        $trabalhoRecente = $this->trabalhoRecenteRepository->update($request->all(), $id);

        Flash::success('Trabalho Recente updated successfully.');

        return redirect(route('trabalhoRecentes.index'));
    }

    /**
     * Remove the specified TrabalhoRecente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trabalhoRecente = $this->trabalhoRecenteRepository->findWithoutFail($id);

        if (empty($trabalhoRecente)) {
            Flash::error('Trabalho Recente not found');

            return redirect(route('trabalhoRecentes.index'));
        }

        $this->trabalhoRecenteRepository->delete($id);

        Flash::success('Trabalho Recente deleted successfully.');

        return redirect(route('trabalhoRecentes.index'));
    }
}
