<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Repositories\FotoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FotoController extends AppBaseController
{
    /** @var  FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo)
    {
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Display a listing of the Foto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fotoRepository->pushCriteria(new RequestCriteria($request));
        $fotos = $this->fotoRepository->all();

        return view('fotos.index')
            ->with('fotos', $fotos);
    }

    /**
     * Show the form for creating a new Foto.
     *
     * @return Response
     */
    public function create()
    {
        return view('fotos.create');
    }

    /**
     * Store a newly created Foto in storage.
     *
     * @param CreateFotoRequest $request
     *
     * @return Response
     */
    public function store(CreateFotoRequest $request)
    {
        $input = $request->all();

        $foto = $this->fotoRepository->create($input);

        Flash::success('Foto saved successfully.');

        return redirect(route('fotos.index'));
    }

    /**
     * Display the specified Foto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $foto = $this->fotoRepository->findWithoutFail($id);

        if (empty($foto)) {
            Flash::error('Foto not found');

            return redirect(route('fotos.index'));
        }

        return view('fotos.show')->with('foto', $foto);
    }

    /**
     * Show the form for editing the specified Foto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $foto = $this->fotoRepository->findWithoutFail($id);

        if (empty($foto)) {
            Flash::error('Foto not found');

            return redirect(route('fotos.index'));
        }

        return view('fotos.edit')->with('foto', $foto);
    }

    /**
     * Update the specified Foto in storage.
     *
     * @param  int              $id
     * @param UpdateFotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFotoRequest $request)
    {
        $foto = $this->fotoRepository->findWithoutFail($id);

        if (empty($foto)) {
            Flash::error('Foto not found');

            return redirect(route('fotos.index'));
        }

        $foto = $this->fotoRepository->update($request->all(), $id);

        Flash::success('Foto updated successfully.');

        return redirect(route('fotos.index'));
    }

    /**
     * Remove the specified Foto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $foto = $this->fotoRepository->findWithoutFail($id);

        if (empty($foto)) {
            Flash::error('Foto not found');

            return redirect(route('fotos.index'));
        }

        $this->fotoRepository->delete($id);

        Flash::success('Foto deleted successfully.');

        return redirect(route('fotos.index'));
    }
}
