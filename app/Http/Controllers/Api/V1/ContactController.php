<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::with('company')->paginate(50);
        return ContactResource::collection($contacts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'town_city' => 'required',
            'region_county' => 'required',
            'country_code' => 'required',
            'post_code' => 'required'
        ]);

        $contact = Contact::create([
            'company_id' => $request->company_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'town_city' => $request->town_city,
            'region_county' => $request->region_county,
            'country_code' => $request->country_code,
            'post_code' => $request->post_code,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Contact created successfully',
            'contact' => $contact,
        ]);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return response()->json([
            'status' => 'success',
            'contact' => new ContactResource($contact->load('company')),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'town_city' => 'required',
            'region_county' => 'required',
            'country_code' => 'required',
            'post_code' => 'required'
        ]);

        $contact = Contact::find($id);
        $contact->company_id = $request->company_id;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->town_city = $request->town_city;
        $contact->region_county = $request->region_county;
        $contact->country_code = $request->country_code;
        $contact->post_code = $request->post_code;
        $contact->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact updated successfully',
            'contact' => $contact,
        ]);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact deleted successfully',
            'contact' => $contact,
        ]);
    }
}
