<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailverificationController;
use App\Http\Controllers\CopmlaintController;
use App\Mail\ComplaintWelcomeEmail;
use App\Models\Complaint;
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

Route::prefix('cms/admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('cms.login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix("cms/admin")->middleware(["auth:admin", "verified"])->group(function () {
    // Route::get('index',[AdminController::class,'index'])->name("")
    Route::view('/', 'cms.start')->name("cms.home");
    Route::resource("admins", AdminController::class);
    Route::get('complaints/index', [CopmlaintController::class, 'index'])->name('complaints.index');
    Route::put('/complaints/{id}/closed', [CopmlaintController::class, 'closed'])->name('complaints.closed');
    Route::get('complaints/edit/{id}', [CopmlaintController::class, 'edit'])->name('complaints.edit');
    Route::put('complaints/update/{id}', [CopmlaintController::class, 'update'])->name('complaints.update');
});
Route::prefix("request")->group(function () {
    // Route::resource("/complaints",CopmlaintController::class);
    Route::post('complaints/store', [CopmlaintController::class, 'store'])->name('complaints.store');
    Route::get('complaints/create', [CopmlaintController::class, 'create'])->name('complaints.create');
    Route::get('complaints/finish', [CopmlaintController::class, 'finish'])->name('complaints.finish');
    Route::get('complaints/search',[CopmlaintController::class,'search'])->name("complaints.search");
});
Route::prefix("email")->middleware("auth:admin")->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
    Route::get('verify', [EmailverificationController::class, 'notice'])->name("verification.notice");
    Route::get('verification-notification', [EmailverificationController::class, 'send'])->middleware('throttle:6,1')->name("verification.send");
    Route::get('verify/{id}/{hash}', [EmailverificationController::class, 'verify'])->name('verification.verify');
});
Route::view("/sarik",'cms.request.search');
