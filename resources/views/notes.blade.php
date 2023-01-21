@extends('layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Notes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/form_notes">
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
                                Add Note
                            </button>
                        </a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-5 col-sm-3">
            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                @foreach ($note_taking as $note_taking)
                    <div class="list-group list-group-flush border-bottom scrollarea">
                        <a href="/notes/{{ $note_taking->id }}" class="list-group-item list-group-item-action py-3 lh-sm"
                            aria-current="true">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <h5 class="mb-1">{{ $note_taking->title }}</h5>
                                <small>Last Update : {{ $note_taking->updated_at->diffForHumans() }}</small>
                            </div>
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <small> <b>Event :</b>{{ $note_taking->event }}</small>
                            </div>
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <small> <b>Company :</b> {{ $note_taking->company->company_name }}</small>
                            </div>
                            <div class="col-10 mb-1 small justify-content-between">{!! Str::substr($note_taking->body, 0, 100) !!}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection()
