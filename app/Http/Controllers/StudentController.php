<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', ['students' => $students]);
                        // or
        // return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create file
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // submitted form add students

        $student = new Student();

        $student->name = $request->name;

        $student->course = $request->course;

        // validation

        $rule = [
            'name' => 'required',
            'course' => 'required',
            'image' => 'required'
        ];

        $validation = Validator::make($request->all(), $rule);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = date('d_m_Y_i_s') . '.' . $extension;
            $file->move('uploads/students', $filename);

            $student->image = $filename;
        }

        $student->save();

        session()->flash('message', 'Student Added Successfully.');
        session()->flash('type', 'success');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edit student
        $student = Student::find($id);

        if (empty($student)) {
            session()->flash('message', 'No Students Found.');

            session()->flash('type', 'danger');

            return redirect()->back();
        }

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update student
        $student = Student::find($id);

        $student->name = $request->name;

        $student->course = $request->course;

        // validation

        $rule = [
            'name' => 'required',
            'course' => 'required'
        ];

        $validation = Validator::make($request->all(), $rule);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        if ($request->hasFile('image')) {
            $destination = 'uploads/students/' . $student->image;

            if (File::exists($destination)) {
                File::delete($destination);
                // unlink($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = date('d_m_Y_i_s') . '.' . $extension;
            $file->move('uploads/students', $filename);

            $student->image = $filename;
        }

        $student->update();

        session()->flash('message', 'Student Updated Successfully.');
        session()->flash('type', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete student
        $student = Student::find($id);

        $destination = 'uploads/students/' . $student->image;

        if (File::exists($destination)) {
            File::delete($destination);
            // unlink($destination);
        }

        $student->delete();

        session()->flash('message', 'Student Deleted Successfully.');
        session()->flash('type', 'success');

        return redirect()->back();
    }
}
