<?php

namespace App\Http\Controllers\Admin;

use App\Models\cr;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentAcademicInfo;
use App\Http\Controllers\Controller;

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
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'date_of_birth' => 'required|date',
            'present_address' =>'required|max:100',
            'sms_no'=> 'required | max:15',
            'session'=> 'required | max:20',
            'roll'=> 'required | max:9',
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'present_address' => $request->present_address,
            'sms_no' => $request->sms_no,
            'publish' => $request->publish,
        ]);

        $student->student_id = date('Y').$student->id;
        $student->save();

        StudentAcademicInfo::create([
            'student_id' => $student->id,
            'session' => $request->session,
            'class' => $request->class,
            'group' => $request->group,
            'section' => $request->section,
            'roll' => $request->roll,
        ]);

        return redirect(route('admin.students.index'))->with('message', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::with('info')->find($id);
        return view('admin.students.update', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'date_of_birth' => 'required|date',
            'present_address' =>'required|max:100',
            'sms_no'=> 'required | max:15',
            'session'=> 'required | max:20',
            'roll'=> 'required | max:9',
        ]);

        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'present_address' => $request->present_address,
            'sms_no' => $request->sms_no,
            'publish' => $request->publish,
        ]);

        StudentAcademicInfo::where('student_id',$student->id)->first()->update([
            'session' => $request->session,
            'class' => $request->class,
            'group' => $request->group,
            'section' => $request->section,
            'roll' => $request->roll,
        ]);

        return redirect(route('admin.students.index'))->with('message', 'Student info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('admin.students.index'))->with('message', 'Student removed successfully');
    }

    public function publish(Request $request)
    {
        $student = Student::find($request->id);
        $student->publish = !$student->publish;
        $student->save();
        return true;
    }
}
