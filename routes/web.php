<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('admin.dashboard'));
});

Route::group(['prefix' => 'admin'], function() {

	Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
	Route::as('admin')->resource('students', App\Http\Controllers\Admin\StudentController::class);
	Route::post('students/publish', [App\Http\Controllers\Admin\StudentController::class, 'publish'])->name('admin.students.publish');
	Route::as('admin')->resource('fees_management', App\Http\Controllers\Admin\FeesManagementController::class);
	Route::post('fees_management/publish', [App\Http\Controllers\Admin\FeesManagementController::class, 'publish'])->name('admin.fee.publish');
	Route::as('admin')->resource('payment', App\Http\Controllers\Admin\PaymentController::class);
	Route::post('payment/get_student', [App\Http\Controllers\Admin\PaymentController::class, 'get_student'])->name('admin.payment.get_student');
	Route::get('generate-pdf/{id}', [App\Http\Controllers\Admin\PDFController::class, 'generatePDF'])->name('admin.generatePDF');

});

Route::get('test1',[App\Http\Controllers\Admin\PaymentController::class, 'test1'])->name('test1');

Route::post('get_session', [App\Http\Controllers\Admin\PaymentController::class, 'get_session'])->name('get_session');
Route::post('ipnss', [App\Http\Controllers\Admin\PaymentController::class, 'ipnss'])->name('ipnss');
Route::post('ipn', [App\Http\Controllers\Admin\PaymentController::class, 'ipn'])->name('ipn');


// SSLCOMMERZ Start
Route::get('/example1', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::get('test23', function()
{
	return \Illuminate\Support\Facades\DB::table('ad')->get();
});
