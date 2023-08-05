<?php

namespace App\Http\Controllers;

use App\Models\YearModel;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissionyear =YearModel::latest()->get();
        return view('admin.admission_year.index', compact('admissionyear'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admission_year.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year_name' => 'required'
        ],[
            'year_name' => 'Admission Year is Required'
        ]);

        YearModel::insert([
            'year_name' => $request->year_name,
        ]);
        $notification = array(
            'message' => 'Admission Year Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('year.index')->with($notification);
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
    public function edit(string $id)
    {
        $yearedit = YearModel::findOrFail($id);
        return view('admin.admission_year.edit', compact('yearedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'year_name' => 'required'
        ],[
            'year_name' => 'Admission Year is Required'
        ]);

        YearModel::findOrFail($id)->update([
            'year_name' => $request->year_name,
        ]);
        $notification = array(
            'message' => 'Admission Year Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('year.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        YearModel::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admission Year Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('year.index')->with($notification);
    }
}
