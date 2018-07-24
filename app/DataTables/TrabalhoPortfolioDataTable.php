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
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
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
            'ordem' => ['name' => 'ordem', 'data' => 'ordem'],
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],
            'descricao' => ['name' => 'descricao', 'data' => 'descricao', "visible"=>false],
            'url_behance' => ['name' => 'url_behance', 'data' => 'url_behance'],
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
