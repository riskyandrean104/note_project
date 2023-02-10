<?php

namespace App\Http\Controllers;

use App\Models\contact_person;
use App\Models\company;
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
            "contact" => contact_person::with('company')->orderBy('contact_name')->filter(request(['search']))->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_add_contacts', [
            'company' => company::orderBy('company_name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storecontact_personRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecontact_personRequest $request)
    {
        $validateData = $request->validate([
            'company_id' => 'required',
            'contact_name' => 'required|min:5|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        contact_person::create($validateData);

        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Contact = contact_person::findOrFail($id);
        return view('forms.form_edit_contacts',[
            "Contact" => $Contact,
            "company" => company::orderBy('company_name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecontact_personRequest  $request
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecontact_personRequest $request, $id)
    {
        $Contact = contact_person::findOrFail($id);
        $rules = [
            'company_id' => 'required',
            'contact_name' => 'required|min:5|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required'
        ];
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;

        contact_person::where('id', $Contact->id)
                    ->update($validateData);

        return redirect('/contacts')->with('success', 'New contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact_person  $contact_person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contact_person::destroy($id);

        return redirect('/contacts')->with('success', 'Note has been deleted');
    }
}
