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
                <select class="form-control js-example-basic-single" id="event_id" name="event_id" height="16px">
                    @foreach ($event as $Event)
                        @if (old('event_id') == $Event->id)
                            <option value="{{ $Event->id }}" selected>{{ $Event->event_name }}</option>
                        @else
                            <option value="{{ $Event->id }}">{{ $Event->event_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('event')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control js-example-basic-single">
                    @foreach ($company as $Company)
                        @if (old('company_id') == $Company->id)
                            <option value="{{ $Company->id }}" selected>{{ $Company->company_name }}</option>
                        @else
                            <option value="{{ $Company->id }}">{{ $Company->company_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-3 form-group">
                <label for="contact_id">Contact</label>
                <select name="contact_id" id="contact_id" class="form-control js-example-basic-single"></select>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
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
                                    console.log(value);
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
