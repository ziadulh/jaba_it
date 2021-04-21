<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\PaymentLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $data= PaymentLog::with('student')->with('student.info')->with('fee')->find($id);
          
        $pdf = PDF::loadView('admin.PDF.myPDF', array('data' => $data))->setPaper('a4', 'landscape');
    
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
