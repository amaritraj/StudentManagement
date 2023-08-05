<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        //$students = Student::first()->paginate(5); //first thaka 5 ta data show korbe
        return view('admin.student.index', compact('students'));
            // ->with('i', (request()->input('page',1) -1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //dd($request->all());\\
    // $request->validate([]);

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name'          => 'required',
        //     'username'      => 'required',
        //     'email'         => 'required',
        //     'password'      => 'required',
        //     'phone'         => 'required',
        //     'coursename'    => 'required',
        //     'coursefee'     => 'required',
        //     'photo'         => 'required|image|mimes:jpeg,jpg|png|svg|max:2048',
        // ]);

        // $input = $request->all();
        // if ($photo = $request->file('photo')) {
        //     $destinationPath = 'upload/student/';
        //     $profileImage = date('Ymd').".".$photo->getClientOriginalExtension();
        //     $photo->move($destinationPath, $profileImage);
        //     $input['photo'] = "$profileImage";
        // }

        // Student::create($request->all());

        // $notification = array(
        //     'message' => 'Student Add Successfully',
        //     'alert-type' => 'success'
        // );

        // return redirect()->route('admin.student.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.student.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'          => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'phone'         => 'required',
            'coursename'    => 'required',
            'coursefee'     => 'required',
        ]);

        $input = $request->all();

        if ($photo = $request->file('photo')) {
            $destinationPath = 'upload/student/';
            $profileImage = date('Ymd').".".$photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }else{
            unset($input['photo']);
        }

        $student->update($input);

        $notification = array(
            'message' => 'Student Data Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        $notification = array(
            'message' => 'Student Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.index')->with($notification);
    }
}
