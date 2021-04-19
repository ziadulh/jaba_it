<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FeesManagement;
use App\Http\Controllers\Controller;

class FeesManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = FeesManagement::all();
        return view('admin.fees.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fees.create');
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
            'name' => 'required|max:20',
            'amount' => 'required|max:8',
            
        ]);

        FeesManagement::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'type' => $request->type,
            'publish' => $request->publish
        ]);

        return redirect(route('admin.fees_management.index'))->with('message', 'Fee created successfully');
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
        $fee = FeesManagement::find($id);
        return view('admin.fees.update', compact('fee'));
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
        $request->validate([
            'name' => 'required|max:20',
            'amount' => 'required|max:8',
            
        ]);

        FeesManagement::find($id)->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'type' => $request->type,
            'publish' => $request->publish
        ]);

        return redirect(route('admin.fees_management.index'))->with('message', 'Fee updated successfully');
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

    public function publish(Request $request)
    {
        $fee = FeesManagement::find($request->id);
        $fee->publish = !$fee->publish;
        $fee->save();
        return true;
    }
}
