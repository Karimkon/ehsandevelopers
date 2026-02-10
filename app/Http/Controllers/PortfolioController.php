<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;

class PortfolioController extends Controller
{
    public function show(PortfolioItem $portfolio)
    {
        return view('site.portfolio.show', ['item' => $portfolio]);
    }
}
