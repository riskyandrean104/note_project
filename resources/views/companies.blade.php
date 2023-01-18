@extends('layouts.main')

@section('container')
    @foreach ($company as $company)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
                <h5 class="card-title">{{ $company->company_name }}</h5>
                <p class="card-text">
                    Company Address : {{ $company->address }} |
                    Phone Number : {{ $company->phone_number }} |
                    Company Email : {{ $company->email }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @endforeach
    {{-- @foreach ($company as $company)
        <article class="mb-3 border-bottom">
            <h5>
                {{ $company->company_name }}
            </h5>
            <p>
                Company Address : {{ $company->address }}
            </p>
            <p>
                Phone Number : {{ $company->phone_number }}
            </p>
            <p>
                Company Email : {{ $company->email }}
            </p>
        </article>
    @endforeach --}}
@endsection()
