<?php

namespace App\Http\Controllers;

use App\Models\note_taking;
use App\Models\company;
use App\Models\contact_person;
use App\Models\event;
use Illuminate\Http\Request;
use App\Http\Requests\Storenote_takingRequest;
use App\Http\Requests\Updatenote_takingRequest;

class NoteTakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notes', [
            "title" => "All Notes",
            "active" => "Notes",
            "note_taking" => note_taking::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')
            ->filter(request(['search', 'company']))->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_add_notes',[
            "event" => event::orderBy('event_name')->get(),
            "company" => company::with('contact_person')->orderBy('company_name')->get()
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
        // dd($request);
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'event_id' => 'required',
            'contact_id' => 'required',
            'company_id' => 'required',
            'body' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        note_taking::create($validateData);

        return redirect('/notes')->with('success', 'New note has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = contact_person::where('company_id', $id)->get();
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note_taking = note_taking::findOrFail($id);
        return view('forms.form_edit_notes',[
            "note_taking" => $note_taking,
            "event" => event::all(),
            "contact" => contact_person::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $note_taking = note_taking::findOrFail($id);
        $rules = [
            'title' => 'required|max:255',
            'event_id' => 'required',
            'contact_id' => 'required',
            'company_id' => 'required',
            'body' => 'required'
        ];
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;

        note_taking::where('id', $note_taking->id)
                    ->update($validateData);

        return redirect('/notes')->with('success', 'New note has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        note_taking::destroy($id);

        return redirect('/notes')->with('success', 'Note has been deleted');
    }
}
