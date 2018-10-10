<?php

namespace App\DataTables;

use App\Models\TrabalhoPortfolio;
use Form;
use Yajra\Datatables\Services\DataTable;

class TrabalhoPortfolioDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('titulo', function ($model) {
                return '<a href="/trabalhoPortfolios/'.$model->id.'/edit">'.$model->titulo.'</a>';
            })
            ->addColumn('action', 'trabalho_portfolios.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $trabalhoPortfolios = TrabalhoPortfolio::query();
        return $this->applyScopes($trabalhoPortfolios);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'reload',
                ],
                'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'],
                
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],
            'descricao' => ['name' => 'descricao', 'data' => 'descricao', "visible"=>false],
            'tags' => ['name' => 'categorias', 'data' => 'listaCategorias', 'searchable' => false, 'filterable'=>false, 'orderable' => false],
            'updated_at' => ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Atualizado em'],
            'lastSync' => ['name' => 'lastSync', 'data' => 'lastSync', 'title' => 'Sincronizado com Behance em', 'searchable' => false, 'filterable'=>false, 'orderable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'trabalhoPortfolios';
    }
}
