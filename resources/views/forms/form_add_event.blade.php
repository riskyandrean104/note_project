@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Event</h1>
                </div>
            </div>
        </div>
    </section>
    <form action="/events" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name"
                    placeholder="Enter event_name" name="event_name" required value="{{ old('event_name') }}">
            </div>
            @error('event_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
            <a href="/notes/create" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
