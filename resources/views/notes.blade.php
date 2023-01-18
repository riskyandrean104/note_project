@extends('layouts.main')

@section('container')

    <h1 class="mb-5">
        {{ $title }}
    </h1>
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
                Company : <a href="/company/{{ $note_taking->company->company_name }}" class="test-decoration-none">{{ $note_taking->company->company_name }}</a>
            </h6>
            {!! Str::substr($note_taking->body, 0, 100) !!}
            <p>Created : {{ $note_taking->created_at }} Last Update : {{ $note_taking->updated_at }}</p>
            <a href="">Read Full Note</a>
        </article>
    @endforeach
@endsection()
