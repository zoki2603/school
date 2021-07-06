<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function viewAssignSubject()
    {
        // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }
    public function assignSubjectAdd()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }
    public function assignSubjectStore(Request $request)
    {
        $subjectCount = count($request->subject_id);
        if ($subjectCount != NULL) {
            for ($i = 0; $i < $subjectCount; $i++) {
                $assign_subjct = new AssignSubject();
                $assign_subjct->class_id = $request->class_id;
                $assign_subjct->subject_id = $request->subject_id[$i];
                $assign_subjct->full_mark = $request->full_mark[$i];
                $assign_subjct->pass_mark = $request->pass_mark[$i];
                $assign_subjct->subjective_mark = $request->subjective_mark[$i];
                $assign_subjct->save();
            }
        }
        $notification  = [
            'message' => 'Assign Inserted Successfully!',
            'type-alert' => 'success'
        ];
        return redirect()->route('assign.subject.view')->with($notification);
    }
    public function assignSubjectEdit($id)
    {
        $data['editData'] = AssignSubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }
    public function assignSubjectUpdate(Request $request, $id)
    {
        if ($request->subject_id == NULL) {
            $notification = [
                'message' => 'Sorry You do not selected any Subject',
                'type-alert' => 'error',
            ];
            return redirect()->route('assign.subject.edit', $id)->with($notification);
        } else {
        }
        $countSubject = count($request->subject_id);
        AssignSubject::where('class_id', $id)->delete();
        for ($i = 0; $i < $countSubject; $i++) {
            $assign_subjct = new AssignSubject();
            $assign_subjct->class_id = $request->class_id;
            $assign_subjct->subject_id = $request->subject_id[$i];
            $assign_subjct->full_mark = $request->full_mark[$i];
            $assign_subjct->pass_mark = $request->pass_mark[$i];
            $assign_subjct->subjective_mark = $request->subjective_mark[$i];
            $assign_subjct->save();
        }
        $notification  = [
            'message' => 'Assign Updated Successfully!',
            'type-alert' => 'success'
        ];
        return redirect()->route('assign.subject.view')->with($notification);
    }
    public function assignSubjectDetails($id)
    {
        $data['detailsData'] = AssignSubject::where('class_id', $id)->orderBy('subject_id')->get();
        return view('backend.setup.assign_subject.details_assign_subject', $data);
    }
}
