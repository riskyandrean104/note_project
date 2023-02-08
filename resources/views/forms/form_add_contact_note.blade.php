@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/company/create">
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
                                Add Company
                            </button>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <form action="/contact" method="post">
        @csrf
        <div class="form-group">
            <label for="company_id">Company</label>
            <select class="form-control js-example-basic-single" id="company_id" name="company_id" style="width: 100%;">
                @foreach ($company as $Company)
                    @if (old('company_id') == $Company->id)
                        <option value="{{ $Company->id }}" selected>{{ $Company->company_name }}</option>
                    @else
                        <option value="{{ $Company->id }}">{{ $Company->company_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('company_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="card-body">
            <div class="form-group">
                <label for="contact_name">Contact_name</label>
                <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name"
                    placeholder="Enter contact_name" name="contact_name" required value="{{ old('contact_name') }}">
            </div>
            @error('contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="phone_number">Phone_number</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                    placeholder="Enter phone_number" name="phone_number" required value="{{ old('phone_number') }}">
            </div>
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Enter email" name="email" required value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
            <a href="/notes/create" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
