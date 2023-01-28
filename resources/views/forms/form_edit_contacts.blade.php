@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Contact</h1>
                </div>
            </div>
        </div>
    </section>
    <form action="/form_contacts/{{ $company->id }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">Company_name</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    placeholder="Enter company_name" name="company_name" required value="{{ old('company_name', $company->company_name) }}">
            </div>
            @error('company_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    placeholder="Enter address" name="address" required value="{{ old('address', $company->address) }}">
            </div>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="phone_number">Phone_number</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                    placeholder="Enter phone_number" name="phone_number" required value="{{ old('phone_number', $company->phone_number) }}">
            </div>
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Enter email" name="email" required value="{{ old('email', $company->email) }}">
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
            <a href="/contacts" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
