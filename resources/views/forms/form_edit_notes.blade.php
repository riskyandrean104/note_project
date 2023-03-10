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
                <label for="event_id">Event</label>
                <select name="event_id" id="event_id" class="form-control js-example-basic-single">
                    <option value="" disabled selected> </option>
                    @foreach ($event as $Event)
                        @if (old('event_id', $note_taking->event_id) == $Event->id)
                            <option value="{{ $Event->id }}" selected>{{ $Event->event_name }}</option>
                        @else
                            <option value="{{ $Event->id }}">{{ $Event->event_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control js-example-basic-single">
                    <option value="" disabled selected></option>
                    @foreach ($company as $Company)
                        @if (old('company_id', $note_taking->company_id) == $Company->id)
                            <option value="{{ $Company->id }}" selected>{{ $Company->company_name }}</option>
                        @else
                        <option value="{{ $Company->id }}">{{ $Company->company_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-3 form-group">
                <label for="contact_id">Contact</label>
                <select name="contact_id" id="contact_id" class="form-control js-example-basic-single">
                    <option value="{{ $note_taking->contact_id }}">{{ old($note_taking->contact_id) }}</option>
                </select>
            </div>

            <div class="mt-3 form-group">
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
            $('.js-example-basic-single').select2({
                placeholder: 'Select an option',
                allowClear: true
            });
        });

        $(document).ready(function() {
            $('#company_id').on('change', function() {
                var companyID = $(this).val();
                // console.log(companyID);
                if (companyID) {
                    $.ajax({
                        url: '/notes/' + companyID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#contact_id').empty();
                                $('#contact_id').focus;
                                $('#contact_id').append(
                                    '<option value="">-- Select Contact --</option>');
                                $.each(data, function(key, value) {
                                    $('#contact_id').append(
                                        '<option value="' +
                                        value.id + '">' + value.contact_name +
                                        '</option>');
                                });
                            } else {
                                $('#contact_id').empty();
                            }
                        }
                    });
                } else {
                    $('#contact_id').empty();
                }
            });
        });
    </script>
@endsection
