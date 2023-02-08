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
                <select class="form-control js-example-basic-single" id="event_id" name="event_id" style="width: 100%;">
                    <option hidden>-Select Event-</option>
                    @foreach ($event as $Event)
                        @if (old('event_id', $Event->id) == $Event->id)
                            <option value="{{ $Event->id }}" selected>{{ $Event->event_name }}</option>
                        @else
                            <option value="{{ $Event->id }}">{{ $Event->event_name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('event')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control js-example-basic-single">
                    <option hidden>-Select Company-</option>
                    @foreach ($contact as $Contact)
                        @if (old('company_id', $Contact->company->id) == $Contact->company->id)
                            <option value="{{ $Contact->company->id}}" selected>{{ $Contact->company->company_name }}</option>
                        @else
                            <option value="{{ $Contact->company->id }}">{{ $Contact->company->company_name }}</option>
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
