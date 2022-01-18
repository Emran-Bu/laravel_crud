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
                    
                    @if(session('message'))
                        <div class="text-center alert alert-{{ session('type') }}">{{ session('message') }}</div>
                    @endif

                    <form action="{{ url('add-students') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <label for="">Student Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @endError" placeholder="Name..." value="{{ old('name') }}">
                            @error('name')
                                <span class="fst-italic text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Student Course</label>
                            <input type="text" name="course" class="form-control @error('course') is-invalid @endError" placeholder="Course..." value="{{ old('course') }}">
                            @error('course')
                                <span class="text-danger fst-italic">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Student Profile Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @endError">
                            @error('image')
                                <span class="text-danger fst-italic">
                                    {{ $message }}
                                </span>
                            @enderror
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
