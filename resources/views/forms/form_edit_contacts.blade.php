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
    <form action="/contacts/{{ $Contact->id }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="company_id">Company</label>
                <select class="form-control js-example-basic-single" id="company_id" name="company_id" style="width: 100%;">
                    @foreach ($company as $Company)
                        @if (old('company_id', $Company->id) == $Company->id)
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
                        placeholder="Enter contact_name" name="contact_name" required value="{{ old('contact_name', $Contact->contact_name) }}">
                </div>
                @error('contact_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="phone_number">Phone_number</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                        placeholder="Enter phone_number" name="phone_number" required value="{{ old('phone_number', $Contact->phone_number) }}">
                </div>
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Enter email" name="email" required value="{{ old('email', $Contact->email) }}">
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
