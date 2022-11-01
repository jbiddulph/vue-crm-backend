<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Artwork;
use Illuminate\Http\Request;
use App\Http\Resources\ArtworkResource;
use App\Http\Controllers\Controller;

class ArtworkController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artworks = Artwork::with('contact')->paginate(15);

        return ArtworkResource::collection($artworks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required',
        ]);

        $artwork = Artwork::create([
            'title' => $request->title,
            'contact_id' => $request->contact_id,
            'size' => $request->size,
            'category' => $request->category,
            'artist_notes' => $request->artist_notes,
            'is_featured' => $request->is_featured,
            'is_live' => $request->is_live,
            'on_sale' => $request->on_sale,
            'price' => $request->price,
            'file' => $request->file,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Artwork created successfully',
            'artwork' => $artwork,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artwork = Artwork::find($id);
        return response()->json([
            'status' => 'success',
            'artwork' => new ArtworkResource($artwork->load('contact')),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required',
        ]);

        $artwork = Artwork::find($id);
        $artwork->contact_id = $request->contact_id;
        $artwork->size = $request->size;
        $artwork->category = $request->category;
        $artwork->artist_notes = $request->artist_notes;
        $artwork->is_featured = $request->is_featured;
        $artwork->is_live = $request->is_live;
        $artwork->on_sale = $request->on_sale;
        $artwork->price = $request->price;
        $artwork->file = $request->file;
        $artwork->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Artwork updated successfully',
            'artwork' => $artwork,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artwork = Artwork::find($id);
        $artwork->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Artwork deleted successfully',
            'artwork' => $artwork,
        ]);
    }
}
