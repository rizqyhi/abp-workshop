<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function sendFile($filename)
    {
        $path = storage_path('app/public/avatars/'.$filename);
        // return response()->file($path);

        $file = Storage::disk('public')->get('avatars/'.$filename);
        $image = Image::make($path)->pixelate(12);

        return $image->response();
    }
}
