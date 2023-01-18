@extends('layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            @foreach ($note_taking as $note_taking)
                <article class="mb-3 border-bottom">
                    <h5>
                        {{ $note_taking->title }}
                    </h5>
                    <h6>
                        Created by : {{ $note_taking->user->name }}
                    </h6>
                    <h6>
                        Schedule : {{ $note_taking->event }}
                    </h6>
                    <h6>
                        Company : <a href="/company/{{ $note_taking->company->company_name }}"
                            class="test-decoration-none">{{ $note_taking->company->company_name }}</a>
                    </h6>
                    {!! Str::substr($note_taking->body, 0, 100) !!}
                    <p>Created : {{ $note_taking->created_at }} Last Update : {{ $note_taking->updated_at }}</p>
                    <a href="">Read Full Note</a>
                </article>
            @endforeach
            {{-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>
    {{-- @foreach ($note_taking as $note_taking)
        <article class="mb-3 border-bottom">
            <h5>
                {{ $note_taking->title }}
            </h5>
            <h6>
                Created by : {{ $note_taking->user->name }}
            </h6>
            <h6>
                Schedule : {{ $note_taking->event }}
            </h6>
            <h6>
                Company : <a href="/company/{{ $note_taking->company->company_name }}"
                    class="test-decoration-none">{{ $note_taking->company->company_name }}</a>
            </h6>
            {!! Str::substr($note_taking->body, 0, 100) !!}
            <p>Created : {{ $note_taking->created_at }} Last Update : {{ $note_taking->updated_at }}</p>
            <a href="">Read Full Note</a>
        </article>
    @endforeach --}}
@endsection()
