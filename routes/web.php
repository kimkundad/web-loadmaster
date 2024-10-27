<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\NewConController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\LogisticsController;

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

    Route::resource('/admin/MyUser', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);

    Route::resource('/admin/news', NewConController::class);
    Route::post('/api/api_post_status_news', [App\Http\Controllers\NewConController::class, 'api_post_status_news']);
    Route::get('api/del_news/{id}', [App\Http\Controllers\NewConController::class, 'del_news']);

    Route::post('api/upload_img', [NewConController::class, 'upload_img']);

    Route::get('admin/contact/', [App\Http\Controllers\ContactController::class, 'index']);
    Route::post('/api/api_post_status_contact', [App\Http\Controllers\ContactController::class, 'api_post_status_contact']);

    Route::resource('/admin/size', SizeController::class);
    Route::get('api/del_size/{id}', [App\Http\Controllers\SizeController::class, 'del_size']);
    Route::post('/api/api_post_status_size', [App\Http\Controllers\SizeController::class, 'api_post_status_size']);

    Route::resource('/admin/logis', LogisticsController::class);
    Route::get('api/del_logis/{id}', [App\Http\Controllers\LogisticsController::class, 'del_logis']);
    Route::post('/api/api_post_status_logis', [App\Http\Controllers\LogisticsController::class, 'api_post_status_logis']);

});

Route::get('/image-proxy', function (Request $request) {
    $imageUrl = $request->query('url');
    $content = file_get_contents($imageUrl);
    return response($content)->header('Content-Type', 'image/jpeg');
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
