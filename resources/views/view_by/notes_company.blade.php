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
                <div class="col-sm-6 mt-4">
                    <h1>{{ $company->company_name }} Notes</h1>
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
                                Event : {{ $Notes->event->event_name }} |
                                Last update : {{ $Notes->created_at }}
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
    </section>
@endsection()
