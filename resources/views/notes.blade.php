@extends('layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
            </button>
        </div>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Notes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/detail_note/create" method="get">
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
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="/detail_note">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg"
                                    placeholder="Type your keywords here" name="search"
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($note_taking as $note_takings)
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><b>{{ $note_takings->title }}</b></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $note_takings->body !!}
                                <div class="card-footer">
                                    Company : {{ $note_takings->company->company_name }} |
                                    Event : {{ $note_takings->event }} |
                                    Last update : {{ $note_takings->created_at }}
                                </div>
                            </div>
                        </div>
                        <a href="/detail_note/{{ $note_takings->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/detail_note/{{ $note_takings->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                        </form>
                    </div>
                @endforeach
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $note_taking->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection()