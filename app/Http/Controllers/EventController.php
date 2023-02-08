<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\note_taking;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events', [
            "event" => event::where('user_id', auth()->user()->id)->orderBy('event_name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.form_add_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreeventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreeventRequest $request)
    {
        $validateData = $request->validate([
            'event_name' => 'required|min:5|max:255',
        ]);
        $validateData['user_id'] = auth()->user()->id;

        event::create($validateData);

        return redirect('/notes/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notes = note_taking::with('event')->where([['user_id', auth()->user()->id],['event_id', $id]])->orderBy('created_at', 'DESC')
        ->filter(request(['search']))->paginate(5);
        return view('view_by.notes_event',[
            "notes" => $notes,
            "events" => event::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeventRequest  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeventRequest $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }
}
