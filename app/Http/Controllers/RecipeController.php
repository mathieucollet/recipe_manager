<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the recipes.
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
     * Show the form for creating a new recipe.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Recipe::class);

        $ingredients = Auth::user()->ingredients;

        return view('recipes.create', compact('ingredients'));
    }

    /**
     * Store a newly created recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(): RedirectResponse
    {
        $this->authorize('create', Recipe::class);

        $recipe = Auth::user()->recipes()->create($this->validatedRequest());

        if ($recipe) {
            $recipe->ingredients()->sync($this->validatedIngredients()['ingredients']);
            $pictures = $this->validatedPictures()['pictures'];
            foreach ($pictures as $picture) {
                $path = $picture->store('recipe_pictures');
                $recipe->pictures()->create(['img_path' => $path]);
            }
        }

        return redirect($recipe->path());
    }

    /**
     * Display the specified recipe.
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
     * Show the form for editing the specified recipe.
     *
     * @param  \App\Recipe  $recipe
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Recipe $recipe): View
    {
        $this->authorize('update', $recipe);

        $ingredients = Auth::user()->ingredients;

        return view('recipes.edit', compact('recipe', 'ingredients'));
    }

    /**
     * Update the specified recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe               $recipe
     *
     * @return \Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Recipe $recipe): RedirectResponse
    {
        $this->authorize('update', $recipe);

        $recipe->update($this->validatedRequest(false));

        if ($recipe) {
            $recipe->ingredients()->sync($this->validatedIngredients()['ingredients']);
            $pictures = $this->validatedPictures()['pictures'];
            foreach ($pictures as $picture) {
                $path = $picture->store('recipe_pictures');
                $recipe->pictures()->create(['img_path' => $path]);
            }
        }

        return redirect($recipe->path());
    }

    /**
     * Remove the specified recipe from storage.
     *
     * @param  \App\Recipe  $recipe
     *
     * @return \Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Recipe $recipe): RedirectResponse
    {
        $this->authorize('delete', $recipe);
        $redirect = $recipe->home();
        $recipe->delete();
        return redirect($redirect);
    }

    /**
     * Mark a recipe for the auth user
     *
     * @param  \App\Recipe  $recipe
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function marking(Recipe $recipe): RedirectResponse
    {
        $this->authorize('marking', $recipe);

        Auth::user()->marks()->toggle($recipe->id);

        return redirect()->back();
    }

    /**
     * Display a listing of the auth user marked recipes
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function marks(): View
    {
        $this->authorize('viewAny', Recipe::class);

        $recipes = Auth::user()->marks;

        return view('recipes.marks', compact('recipes'));
    }

    /**
     * Validate global form request
     *
     * @param  bool  $create
     *
     * @return array
     */
    private function validatedRequest(bool $create = true): array
    {
        return request()->validate(
            [
                'name'         => ($create ? 'required|' : '') . 'string',
                'description'  => ($create ? 'required|' : '') . 'string',
                'instructions' => ($create ? 'required|' : '') . 'string',
                'minutes'      => ($create ? 'required|' : '') . 'integer',
                'difficulty'   => ($create ? 'required|' : '') . 'integer',
                'shared'       => 'boolean',
            ]
        );
    }

    /**
     * Valdiate ingredients request
     *
     * @return array
     */
    private function validatedIngredients(): array
    {
        return request()->validate(
            [
                'ingredients'   => 'required|array',
                'ingredients.*' => 'integer',
            ]
        );
    }

    public function validatedPictures(): array
    {
        return request()->validate(
            [
                'pictures'   => 'required|array',
                'pictures.*' => 'image',
            ]
        );
    }
}
