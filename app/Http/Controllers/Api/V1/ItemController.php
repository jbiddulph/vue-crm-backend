<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    public function index()
    {

        $items = Item::paginate(15);
        return ItemResource::collection($items);

        // $items = Item::all();
        // return response()->json([
        //     'status' => 'success',
        //     'items' => $items,
        // ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'imageUrl' => 'required',
            'status' => 'required',
            'town' => 'required',
            'category' => 'required'
        ]);

        $item = Item::create([
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'imageUrl' => $request->imageUrl,
            'status' => $request->status,
            'town' => $request->town,
            'category' => $request->category,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item created successfully',
            'item' => $item,
        ]);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return response()->json([
            'status' => 'success',
            'item' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'imageUrl' => 'required',
            'status' => 'required',
            'town' => 'required',
            'category' => 'required'
        ]);

        $item = Item::find($id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->latitude = $request->latitude;
        $item->longitude = $request->longitude;
        $item->imageUrl = $request->imageUrl;
        $item->status = $request->status;
        $item->town = $request->town;
        $item->category = $request->category;
        $item->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Todo updated successfully',
            'item' => $item,
        ]);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item deleted successfully',
            'item' => $item,
        ]);
    }
}
