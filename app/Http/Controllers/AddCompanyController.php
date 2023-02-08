<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\note_taking;
use Illuminate\Http\Request;

class AddCompanyController extends Controller
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
        return view('forms.form_add_company_note');
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
            'company_name' => 'required|min:5|max:255',
            'company_country' => 'required|min:5|max:255'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        Company::create($validateData);

        return redirect('/contact/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notes = note_taking::with('company')->where([['user_id', auth()->user()->id],['company_id', $id]])->orderBy('created_at', 'DESC')
        ->filter(request(['search']))->paginate(5);
        return view('view_by.notes_company',[
            "title" => "company_notes",
            "active" => "company_notes",
            "notes" => $notes,
            "company" => company::findOrFail($id)
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
