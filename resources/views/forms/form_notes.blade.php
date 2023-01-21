@extends('layouts.main')

@section('container')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Note</h1>
                </div>
            </div>
        </div>
    </section>
    <form action="/form_notes" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Note Title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Event</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Event Title">
            </div>
            <div class="form-group">
                <label>Company</label>
                <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
            <div class="card-header">
                <h3 class="card-title">
                    Note
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <textarea id="summernote">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
            </div>
        </div>
        <button type="button" class="btn btn-lg float-right btn-outline-primary">Sumbit</button>
        <a href="/notes" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
