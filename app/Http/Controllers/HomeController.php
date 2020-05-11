<?php

namespace App\Http\Controllers;

use App\Recipe;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipes = Recipe::shared()->get();

        return view('home', compact('recipes'));
    }
}
