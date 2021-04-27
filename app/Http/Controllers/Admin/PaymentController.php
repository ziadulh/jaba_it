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

    public function test1()
    {
        return view('test1');
    }

    public function get_session()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "store_id=ziadu6084fe61ec273&store_passwd=ziadu6084fe61ec273@ssl&total_amount=100&currency=BDT&tran_id=REF123&success_url=http://127.0.0.1:8000/&fail_url=http://127.0.0.1:8000/&cancel_url=http://127.0.0.1:8000/&cus_name=Customer Name&cus_email=cust@yahoo.com&cus_add1=Dhaka&cus_add2=Dhaka&cus_city=Dhaka&cus_state=Dhaka&cus_postcode=1000&cus_country=Bangladesh&cus_phone=01711111111&cus_fax=01711111111&shipping_method=YES&ship_name=Customer Name&ship_add1=Dhaka&ship_add2=Dhaka&ship_city=Dhaka&ship_state=Dhaka&ship_postcode=1000&ship_country=Bangladesh&product_name=computer&product_category=Electronic&product_profile=general&multi_card_name=mastercard,visacard,amexcard&value_a=ref001_A&value_b=ref002_B&value_c=ref003_C&value_d=ref004_D");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

    public function ipn(Request $request)
    {
        return $request;
    }

    public function ipnss()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, '<YOUR');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "tran_id=REF123&val_id=1711231900331kHP17lnrr9T8Gt&amount=100&card_type=VISA-Dutch Bangla&store_amount=94&card_no=425272XXXXXX3456&bank_tran_id=1711231900331S0R8atkhAZksmM&status=VALID&tran_date=2017-11-23 18:59:55&currency=BDT&card_issuer=Standard Chartered Bank&card_brand=VISA&card_issuer_country=Bangladesh&card_issuer_country_code=BD&store_id=ziadu6084fe61ec273&verify_sign=8070c0cefed9e629b01100d8a92afda2&verify_key=amount,bank_tran_id,base_fair,card_brand,card_issuer,card_issuer_country,card_issuer_country_code,card_no,card_type,currency,currency_amount,currency_rate,currency_type,risk_level,risk_title,status,store_amount,store_id,tran_date,tran_id,val_id,value_a,value_b,value_c,value_d&cus_fax=01711111111&currency_type=BDT&currency_amount=100.00&currency_rate=1.0000&base_fair=0.00&value_a=ref001_A&value_b=ref002_B&value_c=ref003_C&value_d=ref004_D&risk_level=0&risk_title=Safe");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
}
