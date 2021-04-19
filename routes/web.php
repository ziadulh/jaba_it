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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

	Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
	Route::as('admin')->resource('students', App\Http\Controllers\Admin\StudentController::class);
	Route::post('students/publish', [App\Http\Controllers\Admin\StudentController::class, 'publish'])->name('admin.students.publish');
	Route::as('admin')->resource('fees_management', App\Http\Controllers\Admin\FeesManagementController::class);
	Route::post('fees_management/publish', [App\Http\Controllers\Admin\FeesManagementController::class, 'publish'])->name('admin.fee.publish');
	Route::as('admin')->resource('payment', App\Http\Controllers\Admin\PaymentController::class);
	Route::post('payment/get_student', [App\Http\Controllers\Admin\PaymentController::class, 'get_student'])->name('admin.payment.get_student');

});

