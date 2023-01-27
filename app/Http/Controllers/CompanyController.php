<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Http\Requests\StorecompanyRequest;
use App\Http\Requests\UpdatecompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies', [
            "title" => "Contacts",
            "active" => "Contacts",
            "company" => company::with('Note_taking')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_contacts', [
            "title" => "Contacts",
            "active" => "Contacts"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecompanyRequest $request)
    {
        $validateData = $request->validate([
            'company_name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|email:dns'
        ]);

        Company::create($validateData);

        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecompanyRequest  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecompanyRequest $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
