<?php

namespace App\Http\Controllers;

use App\Models\company;
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
        return view('forms.form_contacts', [
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
            'company_name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required'
        ]);

        Company::create($validateData);

        return redirect('/companies');
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
    public function edit($id)
    {
        $company = company::findOrFail($id);
        return view('forms.form_edit_contacts', [
            "title" => "Contacts",
            "active" => "Contacts",
            "company" => $company
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
        $company = company::findOrFail($id);
        $rules = [
            'company_name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required'
        ];
        $validateData = $request->validate($rules);

        company::where('id', $company->id)
                ->update($validateData);

        return redirect('/companies')->with('success', 'New note has been updated');
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

        return redirect('/companies')->with('success', 'Note has been deleted');
    }
}
