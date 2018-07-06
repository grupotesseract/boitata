<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\FotoRepository;
use App\Repositories\EditorialRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEditorialRequest;
use App\Http\Requests\UpdateEditorialRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class EditorialController extends AppBaseController
{
    /** @var  EditorialRepository */
    private $editorialRepository;
    private $fotosRepository;

    public function __construct(EditorialRepository $editorialRepo, FotoRepository $fotoRepo)
    {
        $this->fotosRepository = $fotoRepo;
        $this->editorialRepository = $editorialRepo;
    }

    /**
     * Display a listing of the Editorial.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->editorialRepository->pushCriteria(new RequestCriteria($request));
        $primeiroEditorial = \App\Models\Editorial::primeiro()->first();
        $segundoEditorial = \App\Models\Editorial::segundo()->first();

        return view('editorials.index')
            ->with('primeiroEditorial', $primeiroEditorial)
            ->with('segundoEditorial', $segundoEditorial);

    }

    /**
     * Show the form for creating a new Editorial.
     *
     * @return Response
     */
    public function create()
    {
        return view('editorials.create');
    }

    /**
     * Store a newly created Editorial in storage.
     *
     * @param CreateEditorialRequest $request
     *
     * @return Response
     */
    public function store(CreateEditorialRequest $request)
    {
        $input = $request->all();

        $editorial = $this->editorialRepository->create($input);

        //Criando foto e associando ao TrabalhoRecente
        $foto = $this->fotosRepository->uploadAndCreate($request);
        $editorial->foto()->save($foto);

        //Upload p/ Cloudinary e delete local 
        $publicId = "editorial_".time();
        $retorno = $this->fotosRepository->sendToCloudinary($foto, $publicId);
        $this->fotosRepository->deleteLocal($foto->id);

        $editorial->categorias()->sync($request->categorias);

        Flash::success('Editorial criado com sucesso.');

        return redirect(route('editorials.index'));
    }

    /**
     * Display the specified Editorial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        return view('editorials.show')->with('editorial', $editorial);
    }

    /**
     * Show the form for editing the specified Editorial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        return view('editorials.edit')->with('editorial', $editorial);
    }

    /**
     * Update the specified Editorial in storage.
     *
     * @param  int              $id
     * @param UpdateEditorialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEditorialRequest $request)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');
            return redirect(route('editorials.index'));
        }

        $editorial = $this->editorialRepository->update($request->all(), $id);

        //se existir um file 
        if ($request->file) {

            //se ja tiver uma foto delete
            if ($editorial->foto) {
                $editorial->foto->delete();
            }

            //Criando foto e associando ao Editorial
            $foto = $this->fotosRepository->uploadAndCreate($request);
            $editorial->foto()->save($foto);

            //Upload p/ Cloudinary e delete local 
            $publicId = "editorial_".time();
            $retorno = $this->fotosRepository->sendToCloudinary($foto, $publicId);
            $this->fotosRepository->deleteLocal($foto->id);
        }

        $editorial->categorias()->sync($request->categorias);

        Flash::success('Editorial updated successfully.');

        return redirect(route('editorials.index'));
    }

    /**
     * Remove the specified Editorial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        $this->editorialRepository->delete($id);

        Flash::success('Editorial deleted successfully.');

        return redirect(route('editorials.index'));
    }
}
