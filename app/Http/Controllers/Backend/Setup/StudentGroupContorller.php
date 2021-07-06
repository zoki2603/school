<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupContorller extends Controller
{
    public function viewGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }
    public function studentGroupAdd()
    {
        return view('backend.setup.group.add_group');
    }
    public function studentGroupStore(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Group Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function studentGroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }
    public function studentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);
        $validationData = $request->validate([
            'name' => 'required|unique:student_groups,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Group Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function studentGroupDelete($id)
    {
        $user = StudentGroup::find($id)->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
