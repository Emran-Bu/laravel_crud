@extends('students.layouts')
{{-- if you not access in public folder write base tag and access in public folder --}}
{{-- <base href="/public"> --}}
@section('title')
Laravel | CRUD | Edit
@endsection

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Student with Image
                        <a class="btn btn-danger float-end" href="{{ url('students') }}">Back</a>
                    </h4>
                </div>

                <div class="card-body">

                    @if(session('message'))
                        <div class="text-center alert alert-{{ session('type') }}">{{ session('message') }}</div>
                    @endif

                    <form action="{{ url('update-student/' . $student->id) }}" method="post" enctype="multipart/form-data">

                        {{-- @csrf --}}

                        {{-- or --}}

                        {{ csrf_field() }}

                        @method('put')

                        <div class="form-group mb-3">
                            <label for="">Student Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @endError" value="{{ $student->name }}">
                            @error('name')
                                <span class="fst-italic text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Student Course</label>
                            <input type="text" name="course" class="form-control @error('course') is-invalid @endError" value="{{ $student->course }}">
                            @error('course')
                                <span class="text-danger fst-italic">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Student Profile Image</label>
                            <input type="file" name="image" class="form-control">

                            <img src="{{ asset('uploads/students/' . $student->image) }}" alt="Image" width="70px" height="70px" class="mt-2">
                        </div>

                        <div class="form-group mb-3 d-grid">
                            <input type="submit" class="btn btn-primary" value="Update Button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
