@extends('students.layouts')

@section('title')
    Laravel | CRUD
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-0 m-0">Laravel 8 CRUD
                            <a class="btn btn-primary float-end" href="{{ url('add-students') }}">Add Students</a>
                        </h4>
                    </div>

                    @if(session('noStudent'))

                        @if(session('message'))
                            <div class="text-center mt-3 alert alert-{{ session('type') }}">{{ session('message') }}</div>
                        @endif

                    @else

                    <div class="card-body">
                        @if(session('message'))
                            <div class="text-center alert alert-{{ session('type') }}">{{ session('message') }}</div>
                        @endif
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>

                                        <td>{{ $student->name }}</td>

                                        <td>{{ $student->course }}</td>

                                        <td><img src="{{ asset('uploads/students/' . $student->image) }}" alt="image" class="" width="100px" height="70px"></td>

                                        <td><a href="{{ url('edit-student/' . $student->id) }}" class="btn btn-primary btn-sm">Edit</a></td>

                                        <td>
                                            {{-- <a href="{{ url('delete-student/' . $student->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}

                                                {{-- or --}}

                                            <form action="{{ url('delete-student/' . $student->id) }}" method="post">

                                                {{ csrf_field() }}

                                                {{-- or --}}

                                                {{-- @csrf --}}

                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection
