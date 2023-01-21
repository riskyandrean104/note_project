@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Company</h1>
                </div>
            </div>
        </div>
    </section>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Company Name</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Company Address">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone_number</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Company Phone Number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Company Email">
            </div>
        </div>
        <button type="button" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
        <a href="/notes" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
