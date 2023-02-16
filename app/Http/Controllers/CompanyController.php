<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\contact_person;
use App\Models\note_taking;
use Illuminate\Http\Request;

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
            "company" => company::with('Note_taking')->orderBy('company_name')->filter(request(['search']))->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_add_company', [
            "title" => "Contacts",
            "active" => "Contacts"
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
            'company_name' => 'required|min:3|max:255',
            'company_country' => 'required|min:2|max:255',
            'agent_type' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        Company::create($validateData);

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('view_by.company',[
            "title" => "company_contact",
            "active" => "company_contact",
            "contacts" => contact_person::where('company_id', $id)->orderBy('created_at', 'DESC')
            ->paginate(9),
            "company" => company::with('contact_person')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('forms.form_edit_company', [
            "title" => "Contacts",
            "active" => "Contacts",
            "Company" => company::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Company = company::findOrFail($id);
        $rules = [
            'company_name' => 'required|min:3|max:255',
            'company_country' => 'required|min:2|max:255',
            'agent_type' => 'required'
        ];
        $validateData = $request->validate($rules);

        company::where('id', $Company->id)
                ->update($validateData);

        return redirect('/companies')->with('success', 'New company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);

        return redirect('/companies')->with('success', 'Company has been deleted');
    }
}
