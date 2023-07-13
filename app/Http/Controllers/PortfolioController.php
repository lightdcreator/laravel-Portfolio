<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    //

    public function AllPortfolio()
    {

        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    } // End Method
}
