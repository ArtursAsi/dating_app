<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\GalleryPictureRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Gallery $gallery, User $user)
    {
        return view('auth.gallery.index', compact('gallery', 'user'));
    }

    public function store(GalleryPictureRequest $request, User $user)
    {

        $pictures = $request->file('picture');
        foreach ($pictures as $picture) {
            $pics = $picture->store('/galleries');

            $user->galleries()->create([
                'name' => $pics
            ])->save();
        }
        return redirect(route('gallery.store', $user))->with('gallery',"Picture(s) added successfully !");;
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->name);
        $gallery->delete();

        return redirect()->back();
    }

    public function show(Gallery $gallery, User $user)
    {
        return view('auth.target.gallery', compact('gallery', 'user'));
    }


}
