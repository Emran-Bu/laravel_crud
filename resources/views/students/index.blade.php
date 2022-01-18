@extends('students.layouts')

@section('title')
    Laravel | CRUD
@endsection
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laravel 8 CRUD
                            <a class="btn btn-primary float-end" href="{{ url('add-students') }}">Add Students</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
