<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function studentRoleView()
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        return view('backend.student.roll_generate.roll_generate_view', $data);
    }
    public function getStudent(Request $request)
    {
        $allData = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        // dd($allData->toArray());
        return response()->json($allData);
    }
    public function generateRolleStore(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                AssignStudent::where('class_id', $class_id)->where('year_id', $year_id)->where('student_id', $request->student_id[$i])
                    ->update(['roll' => $request->roll[$i]]);
            }
        } else {
            $notification = [
                'message' => 'Sorry there no Student',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        $notification = [
            'message' => 'Well Done Roll Generate Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('role.generate.view')->with($notification);
    }
}
