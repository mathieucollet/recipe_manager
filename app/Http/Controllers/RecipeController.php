<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Recipe::class);

        $recipes = Auth::user()->recipes;

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Recipe::class);

        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request): Redirector
    {
        $this->authorize('create', Recipe::class);

        $recipe = Auth::user()->recipes()->create($this->validatedRequest());

        return redirect($recipe->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Recipe $recipe): View
    {
        $this->authorize('view', $recipe);

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Recipe $recipe): View
    {
        $this->authorize('update', $recipe);

        return view('recipe.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe               $recipe
     *
     * @return \Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Recipe $recipe): Redirector
    {
        $this->authorize('update', $recipe);

        $recipe->update($this->validatedRequest(false));

        return redirect($recipe->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     *
     * @return \Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Recipe $recipe): Redirector
    {
        $this->authorize('delete', $recipe);
        $redirect = $recipe->home();
        $recipe->delete();
        return redirect($redirect);
    }

    private function validatedRequest(bool $create = true)
    {
        return request()->validate(
            [
                'name'         => ($create ? 'required|' : '') . 'string',
                'description'  => ($create ? 'required|' : '') . 'string',
                'instructions' => ($create ? 'required|' : '') . 'string',
                'time'         => ($create ? 'required|' : '') . 'numeric',
                'difficulty'   => ($create ? 'required|' : '') . 'numeric',
                'shared'       => 'boolean',
            ]
        );
    }
}
