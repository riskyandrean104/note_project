@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-4">
                    <h1>{{ $events->event_name }} Notes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <form action="/events/{{ $events->id }}">
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
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($notes as $Notes)
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><b>{{ $Notes->title }}</b></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                            {!! $Notes->body !!}
                            <div class="card-footer">
                                Company : {{ $Notes->company->company_name }} |
                                Contact Name : {{ $Notes->contact_person->contact_name }} |
                                Event : {{ $Notes->event->event_name }}
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $notes->links() }}
                    </ul>
                </nav>
            </div>
        </div>
        <a href="/notes" class="btn btn-secondary">Cancel</a>
    </section>
@endsection()
