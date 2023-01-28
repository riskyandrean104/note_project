<?php

namespace App\Http\Controllers;

use App\Models\note_taking;
use App\Models\company;
use Illuminate\Http\Request;

class DetailNoteController extends Controller
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
            "note_taking" => note_taking::where('user_id', auth()->user()->id)->latest()
            ->filter(request(['search']))->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_notes',[
            "company" => company::all()
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
            'title' => 'required|max:255',
            'event' => 'required|max:255',
            'company_id' => 'required',
            'body' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        note_taking::create($validateData);

        return redirect('/detail_note')->with('success', 'New note has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function show(note_taking $note_takings)
    {
        //
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
            "company" => company::all()
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
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'event' => 'required|max:255',
            'company_id' => 'required',
            'body' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        note_taking::create($validateData);

        return redirect('/detail_note')->with('success', 'New note has been added');
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

        return redirect('/detail_note')->with('success', 'Note has been deleted');
    }
}
