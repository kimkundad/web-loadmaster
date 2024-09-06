<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/news', [App\Http\Controllers\HomeController::class, 'news'])->name('news');

Route::get('/blog_detail', [App\Http\Controllers\HomeController::class, 'blog_detail'])->name('blog_detail');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/terms_and_conditions', [App\Http\Controllers\HomeController::class, 'terms_and_conditions'])->name('terms_and_conditions');

Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');

Route::get('/terms_of_use', [App\Http\Controllers\HomeController::class, 'terms_of_use'])->name('terms_of_use');

Route::get('/track', [App\Http\Controllers\HomeController::class, 'track'])->name('track');

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::resource('/admin/customer', CustomerController::class);
    Route::resource('/admin/branch', BranchController::class);
    ///admin/branch BranchController
    Route::resource('/admin/myorder', OrderController::class);
    Route::resource('/admin/driver', DriverController::class);

});


//การนำเอาไฟล์ที่อัพโหลดมาใช้งานใน Application
Route::get('/images/{file}', function ($file) {
    $url = Storage::disk('do_spaces')->temporaryUrl(
        $file,
        now()->addMinutes(5)
    );
    if ($url) {
        return Redirect::to($url);
    }
    return abort(404);
})->where('file', '.+');
