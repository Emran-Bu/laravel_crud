@extends('students.layouts')

@section('title')
    Laravel | CRUD | Create
@endsection

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Student with Image
                        <a class="btn btn-danger float-end" href="{{ url('students') }}">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('add-students') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <label for="">Student Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Student Course</label>
                            <input type="text" name="course" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Student Profile Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group mb-3 d-grid">
                            <input type="submit" class="btn btn-primary" value="Save Button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
