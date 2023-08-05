<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\YearModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //   $courselist =  Course::with('getYear')->get();
    //   return view('admin.admission_course.index', compact('courselist'));

    $coursname  = Course::with('year')->get();
    $year       = YearModel::with('course')->get();

    return view('admin.admission_course.index', compact('coursname', 'year'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addyear  = YearModel::orderBy('year_name','ASC')->get();
        return view('admin.admission_course.create', compact('addyear'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'year_id' => 'required'
        ],[
            'course_name' => 'Admission Course is Required',
            'year_id' => 'Select Admission Year is Required'
        ]);

        Course::insert([
            'course_name'   => $request->course_name,
            'year_id'       => $request->year_id
        ]);
        $notification = array(
            'message' => 'Admission Course Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('course.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $course_id)
    {
        // $editcourse = Course::findOrFail($id);
        // $edityear  = YearModel::findOrFail($id);
        // return view('admin.admission_course.edit', compact('editcourse', 'edityear'));

        $courseedit = Course::findOrFail($course_id);
        return view('admin.admission_course.edit', compact('courseedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
