<?php

namespace App\Observers;

use App\Models\TrabalhoPortfolio;

class TrabalhoPortfolioObserver 
{
    /**
     * Listen to the TrabalhoPortfolio deleting event.
     *
     * @param  TrabalhoPortfolio  $trab
     * @return void
     */
    public function deleting(TrabalhoPortfolio $trab)
    {
        $trab->blocosConteudo()->delete();
    }
}
