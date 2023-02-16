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
                        @if (old('company_id', $Contact->company_id) === $Company->id)
                            <option value="{{ $Company->id }}">{{ $Company->company_name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('company_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="contact_name">Contact_name</label>
                    <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name"
                        placeholder="Enter contact_name" name="contact_name" required
                        value="{{ old('contact_name', $Contact->contact_name) }}">
                    @error('contact_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        placeholder="Enter title" name="title" required
                        value="{{ old('title', $Contact->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone_number</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                        placeholder="Enter phone_number" name="phone_number"
                        value="{{ old('phone_number', $Contact->phone_number) }}">
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Enter email" name="email" required value="{{ old('email', $Contact->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
                <a href="/contacts" class="btn btn-secondary">Cancel</a>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: 'Select an option',
                allowClear: true
            });
        });
    </script>
@endsection
