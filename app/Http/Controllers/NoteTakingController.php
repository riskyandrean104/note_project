<?php

namespace App\Http\Controllers;

use App\Models\note_taking;
use App\Models\company;
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
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_notes',[
            "title" => "Form Input Notes",
            "active" => "Form Input Notes",
            "company" => company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storenote_takingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storenote_takingRequest $request)
    {
        // 

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function show(note_taking $note_taking)
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
        return view('forms.form_notes',[
            "company" => company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatenote_takingRequest  $request
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function update(Updatenote_takingRequest $request, note_taking $note_taking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\note_taking  $note_taking
     * @return \Illuminate\Http\Response
     */
    public function destroy(note_taking $note_taking)
    {
        dd($note_taking->id);
        note_taking::destroy($note_taking->id);

        return redirect('/notes')->with('success', 'Note has been deleted');
    }
}
