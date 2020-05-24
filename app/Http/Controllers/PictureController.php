<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Picture $picture): RedirectResponse
    {
        $this->authorize('delete', $picture);

        $isImageDeleted = Storage::delete($picture->img_path);
        if ($isImageDeleted) {
            $picture->delete();
        }

        return redirect($picture->recipe->path());
    }
}
