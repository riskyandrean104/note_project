@extends('detail_note')

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
    <form action="/detail_note/{{ $note_taking->id }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Enter Note Title" name="title" required value="{{ old('title', $note_taking->title) }}">
            </div>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="event">Event</label>
                <input type="text" class="form-control @error('event') is-invalid @enderror" id="event"
                    placeholder="Enter Event Title" name="event" required value="{{ old('event', $note_taking->event) }}">
            </div>
            @error('event')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="company_id">Company</label>
                <select class="form-control select2" id="company_id" name="company_id" style="width: 100%;">
                    @foreach ($company as $company)
                        @if (old('company_id') == $company->id)
                            <option value="{{ $company->id }}" selected>{{ $company->company_name }}</option>
                        @else
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endif
                    @endforeach
                </select>
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
        <a href="/detail_note" class="btn btn-secondary">Cancel</a>
    </form>

    <script>
        document.addEventListener('trix-file-accept', function(e)) {
            e.preventDefault();
        }
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('select2').select2()
        })
    </script>
@endsection
