<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\contact_person;
use App\Models\note_taking;
use Illuminate\Http\Request;

class AddContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_add_contact_note', [
            'company' => company::with('note_taking')->orderBy('company_name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'company_id' => 'required',
            'contact_name' => 'required|min:5|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        contact_person::create($validateData);

        return redirect('/notes/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notes = note_taking::with('contact_person')->where([['user_id', auth()->user()->id],['contact_id', $id]])->orderBy('created_at', 'DESC')
        ->filter(request(['search']))->paginate(5);
        return view('view_by.notes_contact',[
            "notes" => $notes,
            "contacts" => contact_person::findOrFail($id)
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
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
