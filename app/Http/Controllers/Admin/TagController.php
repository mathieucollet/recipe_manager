<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Tag::class);

        $tags = Tag::orderBy('name', 'asc')->get();

        $tagsCount = $tags->count();
        if ($tagsCount % 3 == 0) {
            $first = $tagsCount / 3;
            $second = $first * 2;
            $last = $first * 3;
        } else {
            $first = ceil($tagsCount / 3); // 10
            $second = $first * 2;
            $last = $second + ($tagsCount % $first);
        }

        return view('tags.index', compact('tags', 'first', 'second', 'last'));
    }

    /**
     * Store a newly created tag in storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(): RedirectResponse
    {
        $this->authorize('create', Tag::class);

        $tag = Tag::create($this->validatedRequest());

        return redirect($tag->home());
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param  \App\Tag  $tag
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Tag $tag): View
    {
        $this->authorize('update', Tag::class);

        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Tag  $tag
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Tag $tag)
    {
        $this->authorize('update', Tag::class);

        $tag->update($this->validatedRequest());

        return redirect($tag->home());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $this->authorize('delete', Tag::class);
        $redirect = $tag->home();
        $tag->delete();
        return redirect($redirect);
    }

    private function validatedRequest()
    {
        return request()->validate(
            [
                'name' => 'required|string',
            ]
        );
    }
}
