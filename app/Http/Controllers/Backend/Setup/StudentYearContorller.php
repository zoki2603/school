<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearContorller extends Controller
{
    public function viewYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }
    public function StudentYearAdd()
    {
        return view('backend.setup.year.add_year');
    }
    public function studentYearStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);
        $data  = new StudentYear();
        $data->name  = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Year Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function studentYearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }
    public function studentYearUpdate(Request $request, $id)
    {
        $data = StudentYear::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,' . $data->id
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('student.year.view')->with($notification);
    }
    public function studentYearDelete($id)
    {
        $user = StudentYear::find($id)->delete();
        $notification = [
            'message' => 'Year Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('student.year.view')->with($notification);
    }
}
