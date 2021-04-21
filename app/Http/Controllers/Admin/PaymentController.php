<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\PaymentLog;
use Illuminate\Http\Request;
use App\Models\FeesManagement;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = PaymentLog::with('student','fee')->get();
        // dd($pays);
        return view('admin.payment.index',compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees = FeesManagement::select('id','name')->get();
        return view('admin.payment.create',compact('fees'));
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
            'student' => 'required',
            'fees_id' => 'required',
            
        ]);

        PaymentLog::create([
            'student_id' => $request->student,
            'fees_id' => $request->fees_id,
        ]);

        return redirect(route('admin.payment.index'))->with('message', 'Payment completed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_student(Request $request)
    {
        $cls = $request->cls;
        $section = $request->section;
        $student = Student::whereHas('info', function($query) use ($cls,$section){
            $query->where('class',$cls)->where('section',$section);
        })->get();
        return $student;
    }
}
