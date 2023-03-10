@extends('layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Contact by : {{ $company->company_name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <form action="/companies/{{ $company->id }}">
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
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    @foreach ($contacts as $Contact)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="col">
                                        <div class="col">
                                            <h2 class="lead"><b>{{ $Contact->contact_name }}</b></h2>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-globe"></i></span> Phone :
                                                    {{ $Contact->title }}
                                                </li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone :
                                                    {{ $Contact->phone_number }}
                                                </li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-envelope"></i></span> Email :
                                                    {{ $Contact->email }}
                                                </li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span> Company :
                                                    {{ $Contact->company->company_name }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $contacts->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <a href="/companies" class="btn btn-secondary">Back</a>
    </section>
@endsection()
