<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::paginate(5);

        return response()->json($photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'photo' => 'required|image|max:1024',
            'description' => 'required'
        ]);

        // Upload the photo
        $request->file('photo')->store('photos', 'public');

        // Save to DB
        $photo = Photo::create([
            'filename'    => $request->file('photo')->hashName(),
            'description' => $data['description']
        ]);

        return response()->json($photo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json([
                'message' => 'Photo not found.'
            ], 404);
        }

        return response()->json($photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the photo from DB
        $photo = Photo::find($id);

        // If not exists, return not found message
        if (!$photo) {
            return response()->json([
                'message' => 'Photo not found.'
            ], 404);
        }

        // Validate the request data
        $data = $this->validate($request, [
            'description' => 'required'
        ]);

        // Save updated data
        $photo->description = $data['description'];
        $photo->save();

        return response()->json($photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the photo from DB
        $photo = Photo::find($id);

        // If not exists, return not found message
        if (!$photo) {
            return response()->json([
                'message' => 'Photo not found.'
            ], 404);
        }

        $photo->delete();

        return response('', 204);
    }
}
