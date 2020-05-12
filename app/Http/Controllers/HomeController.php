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
        if (request()->get('search')) {
            $recipes = Recipe::whereLike(['name', 'description', 'tags.name'], request()->get('search'))->get();
        }
        if (!request()->get('search') || !$recipes) {
            $recipes = Recipe::shared()->get();
        }


        return view('home', compact('recipes'));
    }
}
