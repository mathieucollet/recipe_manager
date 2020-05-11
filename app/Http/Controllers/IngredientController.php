<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Ingredient::class);

        $ingredients = Auth::user()->ingredients;

        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create', Ingredient::class);

        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(): Redirector
    {
        $this->authorize('create', Ingredient::class);

        $ingredient = Auth::user()->ingredients()->create($this->validatedRequest());

        return redirect($ingredient->home());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Ingredient $ingredient): View
    {
        $this->authorize('view', Ingredient::class);

        return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Ingredient $ingredient): View
    {
        $this->authorize('update', Ingredient::class);

        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient           $ingredient
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Ingredient $ingredient): Redirector
    {
        $this->authorize('update', Ingredient::class);

        $ingredient->update($this->validatedRequest(false));

        return redirect($ingredient->home());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Ingredient $ingredient): Redirector
    {
        $this->authorize('delete', Ingredient::class);
        $redirect = $ingredient->home();
        $ingredient->delete();
        return redirect($redirect);
    }

    private function validatedRequest(bool $create = true)
    {
        return request()->validate(
            [
                'name'  => ($create ? 'required|' : '') . 'string',
                'price' => ($create ? 'required|' : '') . 'numeric',
            ]
        );
    }
}
