@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Note</h1>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/events/create">
                            <button type="button" class="btn text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                                    </path>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg>
                                Add Event
                            </button>
                        </a>
                    </ol>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/contact/create">
                            <button type="button" class="btn text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                                    </path>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg>
                                Add Contact
                            </button>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <form action="/notes" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Enter Note Title" name="title" required value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="event_id">Event</label>
                <select class="form-control js-example-basic-single" id="event_id" name="event_id" style="width: 100%;">
                    @foreach ($event as $Event)
                        @if (old('event_id') == $Event->id)
                            <option value="{{ $Event->id }}" selected>{{ $Event->event_name }}</option>
                        @else
                            <option value="{{ $Event->id }}">{{ $Event->event_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('event_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="contact_id">Contact</label>
                <select class="form-control js-example-basic-single" id="contact_id" name="contact_id" style="width: 100%;">
                    @foreach ($contact as $Contact)
                        @if (old('contact_id') == $Contact->id)
                            <option value="{{ $Contact->id }}" selected>{{ $Contact->contact_name }}</option>
                            <label for="company_id">Company</label>
                            <input type="text" class="form-control @error('company_id') is-invalid @enderror" id="company_id"
                                name="company_id" value="{{ $Contact->company->company_name }}" readonly>
                        @else
                            <option value="{{ $Contact->id }}">{{ $Contact->contact_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-3 form-group">
                <label for="body">Note</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
        </div>
        <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
        <a href="/notes" class="btn btn-secondary">Cancel</a>
    </form>

    <script>
        document.addEventListener('trix-file-accept', function(e)) {
            e.preventDefault();
        }

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
