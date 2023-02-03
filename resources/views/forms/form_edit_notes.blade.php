@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Note</h1>
                </div>
            </div>
        </div>
    </section>
    <form action="/notes/{{ $note_taking->id }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Enter Note Title" name="title" required value="{{ old('title', $note_taking->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="event">Event</label>
                <select class="form-control js-example-basic-single" id="event" name="event" style="width: 100%;">
                    @foreach ($event as $Event)
                        @if (old('event', $note_taking->event) == $Event->event_name)
                            <option value="{{ $Event->event_name }}" selected>{{ $Event->event_name }}</option>
                        @else
                            <option value="{{ $Event->event_name }}">{{ $Event->event_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <select class="form-control select2" id="contact" name="contact" style="width: 100%;">
                    <option value="">-Select Contact-</option>
                    @foreach ($contact as $Contact)
                        @if (old('contact', $note_taking->contact) == $Contact->contact_name)
                            <option value="{{ $Contact->contact_name }}" data-company="{{ $Contact->company }}">{{ $Contact->contact_name }}</option>
                        @else
                            <option value="{{ $Contact->contact_name }}" data-company="{{ $Contact->company }}">{{ $Contact->contact_name }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="company" class="mt-3">Company</label>
                <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company"
                    value="{{ old('company', $Contact->company) }}" readonly>
            </div>
            <div class="form-group">
                <label for="body">Note</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $note_taking->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
        </div>
        <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
        <a href="/notes" class="btn btn-secondary">Cancel</a>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        $(document).ready(function() {
            $('#contact').on('change', function() {
                const selected = $(this).find('option:selected');
                const cmp = selected.data('company');
                console.log(cmp);

                $("#company").val(cmp);
            });
        });
    </script>
@endsection
