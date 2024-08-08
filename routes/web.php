<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

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
