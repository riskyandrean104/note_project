@extends('layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @foreach ($event as $Event)
                    <div class="col-sm-6">
                        <h1>List Notes</h1>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection()
