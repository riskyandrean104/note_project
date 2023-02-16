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
    <form action="/companies/{{ $Company->id }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    placeholder="Enter company_name" name="company_name" required
                    value="{{ old('company_name', $Company->company_name) }}">
                @error('company_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="company_country">Country</label>
                <input type="text" class="form-control @error('company_country') is-invalid @enderror"
                    id="company_country" placeholder="Enter company_country" name="company_country" required
                    value="{{ old('company_country', $Company->company_country) }}">
                @error('company_country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="agent_type">Agent Type</label>
                <select class="form-control js-example-basic-single" id="agent_type" name="agent_type" style="width: 100%;">
                    <option value="" disabled selected>Select an Option</option>
                    <option value="TA">Travel Agent</option>
                    <option value="TO">Tour Operator</option>
                </select>
            </div>

            <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
            <a href="/companies" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
