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
            "event" => event::orderBy('event_name')->filter(request(['search']))->paginate(9)
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
        return view('view_by.notes_event',[
            "notes" => note_taking::with('event')->where([['user_id', auth()->user()->id],['event_id', $id]])->orderBy('created_at', 'DESC')
            ->filter(request(['search']))->paginate(5),
            "events" => event::findOrFail($id)->load('note_taking')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('forms.form_edit_event',[
            "event" => event::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateeventRequest  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeventRequest $request, $id)
    {
        $Event = event::findOrFail($id);
        $rules = [
            'event_name' => 'required'
        ];
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;

        event::where('id', $Event->id)
                    ->update($validateData);

        return redirect('/contacts')->with('success', 'New contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        event::destroy($id);

        return redirect('/contacts')->with('success', 'Event has been deleted');
    }
}
