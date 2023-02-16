@extends('layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" id=success>
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
                        <a href="/notes/create" method="get">
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
                        <form action="/notes">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg"
                                    placeholder="Type your keywords here" name="search" value="{{ request('search') }}">
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
                @foreach ($note_taking as $Note_taking)
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><b>{{ $Note_taking->title }}</b></h3>
                                <div class="card-tools">
                                    <a href="/notes/{{ $Note_taking->id }}/edit">
                                        <button type="button" class="btn text-end">
                                            <svg fill="#000000" width="16" height="16" viewBox="0 0 16 16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.49 7.3h-1.16v6.35H1.67V3.28H8V2H1.67A1.21 1.21 0 0 0 .5 3.28v10.37a1.21 1.21 0 0 0 1.17 1.25h12.66a1.21 1.21 0 0 0 1.17-1.25z" />
                                                <path
                                                    d="M10.56 2.87 6.22 7.22l-.44.44-.08.08-1.52 3.16a1.08 1.08 0 0 0 1.45 1.45l3.14-1.53.53-.53.43-.43 4.34-4.36.45-.44.25-.25a2.18 2.18 0 0 0 0-3.08 2.17 2.17 0 0 0-1.53-.63 2.19 2.19 0 0 0-1.54.63l-.7.69-.45.44zM5.51 11l1.18-2.43 1.25 1.26zm2-3.36 3.9-3.91 1.3 1.31L8.85 9zm5.68-5.31a.91.91 0 0 1 .65.27.93.93 0 0 1 0 1.31l-.25.24-1.3-1.3.25-.25a.88.88 0 0 1 .69-.25z" />
                                            </svg>
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/notes/{{ $Note_taking->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn text-end"
                                            onclick="return confirm('Are you sure?')">
                                            <svg width="16" height="16" viewBox="0 0 1024 1024" class="icon"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M960 160h-291.2a160 160 0 0 0-313.6 0H64a32 32 0 0 0 0 64h896a32 32 0 0 0 0-64zM512 96a96 96 0 0 1 90.24 64h-180.48A96 96 0 0 1 512 96zM844.16 290.56a32 32 0 0 0-34.88 6.72A32 32 0 0 0 800 320a32 32 0 1 0 64 0 33.6 33.6 0 0 0-9.28-22.72 32 32 0 0 0-10.56-6.72zM832 416a32 32 0 0 0-32 32v96a32 32 0 0 0 64 0v-96a32 32 0 0 0-32-32zM832 640a32 32 0 0 0-32 32v224a32 32 0 0 1-32 32H256a32 32 0 0 1-32-32V320a32 32 0 0 0-64 0v576a96 96 0 0 0 96 96h512a96 96 0 0 0 96-96v-224a32 32 0 0 0-32-32z"
                                                    fill="#231815" />
                                                <path
                                                    d="M384 768V352a32 32 0 0 0-64 0v416a32 32 0 0 0 64 0zM544 768V352a32 32 0 0 0-64 0v416a32 32 0 0 0 64 0zM704 768V352a32 32 0 0 0-64 0v416a32 32 0 0 0 64 0z"
                                                    fill="#231815" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $Note_taking->body !!}
                                <div class="card-footer">
                                    Company : <a
                                        href="/company/{{ $Note_taking->company_id }}">{{ $Note_taking->company->company_name }}
                                    </a> |
                                    Contact Name : <a
                                        href="/contact/{{ $Note_taking->contact_id }}">{{ $Note_taking->contact_person->contact_name }}
                                    </a> |
                                    Event : <a
                                        href="/events/{{ $Note_taking->event_id }}">{{ $Note_taking->event->event_name }}
                                    </a>
                                </div>
                            </div>
                        </div>
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
