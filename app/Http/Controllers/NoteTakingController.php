<?php

namespace App\Http\Controllers;

use App\Models\note_taking;
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
            "note_taking" => note_taking::with(['company', 'user'])->latest()->get()
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
    public function edit(note_taking $note_taking)
    {
        //
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
        //
    }
}
