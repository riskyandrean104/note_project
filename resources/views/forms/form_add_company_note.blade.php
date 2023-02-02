@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Company</h1>
                </div>
            </div>
        </div>
    </section>
    <form action="/company" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    placeholder="Enter company_name" name="company_name" required value="{{ old('company_name') }}">
            </div>
            @error('company_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="company_country">Country</label>
                <input type="text" class="form-control @error('company_country') is-invalid @enderror" id="company_country"
                    placeholder="Enter company_country" name="company_country" required value="{{ old('company_country') }}">
            </div>
            @error('company_country')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
            <a href="/contact/create" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
