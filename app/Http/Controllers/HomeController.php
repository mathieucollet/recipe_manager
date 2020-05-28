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
        $searchable = request()->get('search') ?? null;
        if ($searchable) {
            $recipes = Recipe::whereLike(['name', 'description', 'tags.name'], $searchable)->get();
        }
        if (!request()->get('search') || !$recipes) {
            $recipes = Recipe::shared()->get();
        }


        return view('home', compact('recipes', 'searchable'));
    }
}
