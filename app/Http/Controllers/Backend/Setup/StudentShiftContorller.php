<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftContorller extends Controller
{
    public function viewShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }
    public function studentShiftAdd()
    {
        return view('backend.setup.shift.add_shift');
    }
    public function studentShiftStore(Request $request)
    {
        $validateDate = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function studentShiftEdit($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }
    public function studentShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::find($id);
        $validateDate = $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Student Shift Edit Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function studentShiftDelete($id)
    {
        $user = StudentShift::find($id)->delete();
        $notification = [
            'message' => 'Student Shift Edit Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('student.shift.view')->with($notification);
    }
}
