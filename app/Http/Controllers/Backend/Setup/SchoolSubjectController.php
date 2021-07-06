<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function viewSchoolSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }
    public function schoolSubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }
    public function schoolSubjectStore(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Exam Type Iserted Successfolly!',
            'type-alert' => 'success'
        ];
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function schoolSubjectEdit($id)
    {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }
    public function schoolSubjectUpdate(Request $request, $id)
    {
        $data = SchoolSubject::find($id);
        $validationData = $request->validate([
            'name' => 'required|unique:exam_types,name,' . $data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Exam Type Updated Successfolly!',
            'type-alert' => 'success'
        ];
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function schoolSubjectsDelete($id)
    {
        $user = SchoolSubject::find($id)->delete();
        $notification = [
            'message' => 'Exam Type Deleted Successfolly!',
            'type-alert' => 'success'
        ];
        return redirect()->route('school.subject.view')->with($notification);
    }
}
