<?php

namespace App\Http\Controllers;

use App\DataTables\TrabalhoPortfolioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTrabalhoPortfolioRequest;
use App\Http\Requests\UpdateTrabalhoPortfolioRequest;
use App\Repositories\TrabalhoPortfolioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TrabalhoPortfolioController extends AppBaseController
{
    /** @var  TrabalhoPortfolioRepository */
    private $trabalhoPortfolioRepository;

    public function __construct(TrabalhoPortfolioRepository $trabalhoPortfolioRepo)
    {
        $this->trabalhoPortfolioRepository = $trabalhoPortfolioRepo;
    }

    /**
     * Display a listing of TrabalhoPortfolio to site visitor.
     */
    public function listToVisitor()
    {
        $trabalhos = $this->trabalhoPortfolioRepository->all();
        return view('portfolio')->with([
            'trabalhos' => $trabalhos
        ]);
    }

    /**
     * Display a TrabalhoPortfolio to site visitor.
     *
     * @param TrabalhoPortfolioDataTable $trabalhoPortfolioDataTable
     * @return Response
     */
    public function showToVisitor($id)
    {
        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->findWithoutFail($id);
        if (empty($trabalhoPortfolio)) {
            Flash::error('Trabalho do portfólio não encontrado');

            return redirect(route('portfolio.list'));
        }

        return view('portfolio.view')->with([
            'trabalho' => $trabalhoPortfolio
        ]);
    }

    /**
     * Display a listing of the TrabalhoPortfolio.
     *
     * @param TrabalhoPortfolioDataTable $trabalhoPortfolioDataTable
     * @return Response
     */
    public function index(TrabalhoPortfolioDataTable $trabalhoPortfolioDataTable)
    {
        return $trabalhoPortfolioDataTable->render('trabalho_portfolios.index');
    }

    /**
     * Show the form for creating a new TrabalhoPortfolio.
     *
     * @return Response
     */
    public function create()
    {
        return view('trabalho_portfolios.create');
    }

    /**
     * Store a newly created TrabalhoPortfolio in storage.
     *
     * @param CreateTrabalhoPortfolioRequest $request
     *
     * @return Response
     */
    public function store(CreateTrabalhoPortfolioRequest $request)
    {
        $input = $request->all();

        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->create($input);
        Flash::success('Trabalho do portfólio saved successfully.');

        return redirect(route('trabalhoPortfolios.index'));
    }

    /**
     * Display the specified TrabalhoPortfolio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->findWithoutFail($id);

        if (empty($trabalhoPortfolio)) {
            Flash::error('Trabalho do portfólio não encontrado');

            return redirect(route('trabalhoPortfolios.index'));
        }

        return view('trabalho_portfolios.show')->with('trabalhoPortfolio', $trabalhoPortfolio);
    }

    /**
     * Show the form for editing the specified TrabalhoPortfolio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->findWithoutFail($id);

        if (empty($trabalhoPortfolio)) {
            Flash::error('Trabalho do portfólio não encontrado');

            return redirect(route('trabalhoPortfolios.index'));
        }

        return view('trabalho_portfolios.edit')->with('trabalhoPortfolio', $trabalhoPortfolio);
    }

    /**
     * Update the specified TrabalhoPortfolio in storage.
     *
     * @param  int              $id
     * @param UpdateTrabalhoPortfolioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrabalhoPortfolioRequest $request)
    {
        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->findWithoutFail($id);

        if (empty($trabalhoPortfolio)) {
            Flash::error('Trabalho do portfólio não encontrado');

            return redirect(route('trabalhoPortfolios.index'));
        }

        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->update($request->all(), $id);
        $trabalhoPortfolio->categorias()->sync($request->categorias);

        Flash::success('Trabalho do portfólio updated successfully.');

        return redirect(route('trabalhoPortfolios.index'));
    }

    /**
     * Remove the specified TrabalhoPortfolio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->findWithoutFail($id);

        if (empty($trabalhoPortfolio)) {
            Flash::error('Trabalho do portfólio não encontrado');

            return redirect(route('trabalhoPortfolios.index'));
        }

        $this->trabalhoPortfolioRepository->delete($id);

        Flash::success('Trabalho do portfólio deleted successfully.');

        return redirect(route('trabalhoPortfolios.index'));
    }


    /**
     * postResyncTrabalhos - Limpa os TrabalhosPortfolio e Resynca com o Behance
     */
    public function postResyncTrabalhos()
    {
        $this->trabalhoPortfolioRepository->all()->each(function($Trab) {
            $Trab->delete();
        });

        $this->trabalhoPortfolioRepository->createAllFromBehance();

        Flash::success('Trabalhos atualizados com sucesso!.');
        return redirect(route('trabalhoPortfolios.index'));
    }

    /**
     * postGetNovosTrabalhos - Busca por novos TrabalhosPortfolio no Behance
     */
    public function postGetNovosTrabalhos()
    {
        $qnt = $this->trabalhoPortfolioRepository->createNovosFromBehance();

        Flash::success('Trabalhos atualizados com sucesso!.');
        return redirect(route('trabalhoPortfolios.index'));
    }
    

    /**
     * postAtualizarTrabalho - Sync de 1 trabalho com o Behance'
     */
    public function postAtualizarTrabalho($id)
    {
        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->findWithoutFail($id);

        if (empty($trabalhoPortfolio)) {
            Flash::error('Trabalho do portfólio não encontrado');
            return redirect(route('trabalhoPortfolios.index'));
        }

        $trabalhoPortfolio = $this->trabalhoPortfolioRepository->atualizarTrabalhoBehance($trabalhoPortfolio);

        Flash::success('Trabalho atualizado com sucesso!');
        return redirect(route('trabalhoPortfolios.index'));
    }
    
    
}
