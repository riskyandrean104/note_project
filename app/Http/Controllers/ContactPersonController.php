<?php

namespace App\Http\Controllers;

use App\Models\contact_person;
use App\Http\Requests\Storecontact_personRequest;
use App\Http\Requests\Updatecontact_personRequest;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts', [
            "contact" => contact_person::with('company')->orderBy('contact_name')->paginate(9)
        ]);
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
     * @param  \App\Http\Requests\Storecontact_personRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecontact_personRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function show(contact_person $contact_person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function edit(contact_person $contact_person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecontact_personRequest  $request
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecontact_personRequest $request, contact_person $contact_person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact_person $contact_person)
    {
        //
    }
}
