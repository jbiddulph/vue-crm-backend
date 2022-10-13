<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $companies = Company::paginate(15);

        return CompanyResource::collection($companies);
        // return response()->json([
        //     'status' => 'success',
        //     'Companies' => $Companies,
        // ]);
    }

    public function allCompanies()
    {
        $company = Company::all();
        return response()->json([
            'status' => 'success',
            'companies' => $company,
        ]);
    }

    public function allContacts($id)
    {
        $contact = Contact::where('company_id', '=' , $id)->get();
        return response()->json([
            'status' => 'success',
            'contacts' => $contact,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'town_city' => 'required',
            'region_county' => 'required',
            'country_code' => 'required',
            'post_code' => 'required'
        ]);

        $company = Company::create([
            'name' => $request->name,
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
            'message' => 'Company created successfully',
            'company' => $company,
        ]);
    }

    public function show($id)
    {
        $company = Company::find($id);
        return response()->json([
            'status' => 'success',
            'company' => $company,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'town_city' => 'required',
            'region_county' => 'required',
            'country_code' => 'required',
            'post_code' => 'required'
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->town_city = $request->town_city;
        $company->region_county = $request->region_county;
        $company->country_code = $request->country_code;
        $company->post_code = $request->post_code;
        $company->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Company updated successfully',
            'company' => $company,
        ]);
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Company deleted successfully',
            'company' => $company,
        ]);
    }
}
