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
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderDriController;
use App\Http\Controllers\LogisticsDriController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/blog_detail/{id}', [App\Http\Controllers\HomeController::class, 'blog_detail']);

Route::post('/api/add_contact', [App\Http\Controllers\HomeController::class, 'add_contact']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/getOrderByID', [App\Http\Controllers\HomeController::class, 'getOrderByID'])->name('getOrderByID');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/news', [App\Http\Controllers\HomeController::class, 'news'])->name('news');


Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/terms_and_conditions', [App\Http\Controllers\HomeController::class, 'terms_and_conditions'])->name('terms_and_conditions');

Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');

Route::get('/terms_of_use', [App\Http\Controllers\HomeController::class, 'terms_of_use'])->name('terms_of_use');

Route::get('/track', [App\Http\Controllers\HomeController::class, 'track'])->name('track');

Route::get('/generate-pdf', [OrderController::class, 'generatePDF']);

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::resource('/admin/customer', CustomerController::class);
    Route::resource('/admin/branch', BranchController::class);
    ///admin/branch BranchController
    Route::resource('/admin/myorder', OrderController::class);

    Route::get('/drigeneratePDF/{id}', [OrderController::class, 'drigeneratePDF']);

    Route::resource('/admin/driver', DriverController::class);
    Route::post('/api/api_post_status_driver', [App\Http\Controllers\MyUserController::class, 'api_post_status_driver']);
    Route::get('api/del_driver/{id}', [App\Http\Controllers\MyUserController::class, 'del_driver']);

    Route::resource('/admin/MyUser', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);

    Route::resource('/admin/news', NewConController::class);
    Route::post('/api/api_post_status_news', [App\Http\Controllers\NewConController::class, 'api_post_status_news']);
    Route::get('api/del_news/{id}', [App\Http\Controllers\NewConController::class, 'del_news']);

    Route::resource('/admin/holiday', HolidayController::class);
    Route::post('/api/api_post_status_holiday', [App\Http\Controllers\HolidayController::class, 'api_post_status_news']);
    Route::get('api/del_holiday/{id}', [App\Http\Controllers\HolidayController::class, 'del_news']);

    Route::post('api/upload_img', [NewConController::class, 'upload_img']);

    Route::get('admin/contact/', [App\Http\Controllers\ContactController::class, 'index']);
    Route::get('admin/chat/{id}', [App\Http\Controllers\ContactController::class, 'chat']);
    Route::post('admin/storeMessage', [App\Http\Controllers\ContactController::class, 'storeMessage']);
    Route::post('/api/api_post_status_contact', [App\Http\Controllers\ContactController::class, 'api_post_status_contact']);

    Route::resource('/admin/size', SizeController::class);
    Route::get('api/del_size/{id}', [App\Http\Controllers\SizeController::class, 'del_size']);
    Route::post('/api/api_post_status_size', [App\Http\Controllers\SizeController::class, 'api_post_status_size']);

    Route::resource('/admin/logis', LogisticsController::class);
    Route::get('api/del_logis/{id}', [App\Http\Controllers\LogisticsController::class, 'del_logis']);
    Route::post('/api/api_post_status_logis', [App\Http\Controllers\LogisticsController::class, 'api_post_status_logis']);

    Route::resource('/admin/logisDri', LogisticsDriController::class);
    Route::post('/api/api_post_status_status_Per', [App\Http\Controllers\LogisticsDriController::class, 'api_post_status_status_Per']);

    Route::get('admin/setting/', [App\Http\Controllers\SettingController::class, 'index']);
    Route::post('api/post_setting/', [App\Http\Controllers\SettingController::class, 'post_setting']);


});

Route::group(['middleware' => ['UserRole:MasterDriver']], function() {

    Route::get('/admin/dashboardDri', [App\Http\Controllers\DashboardController::class, 'indexDri']);




});


Route::group(['middleware' => ['UserRole:MasterDriver|superadmin|admin']], function() {

    Route::resource('/admin/category', CategoryController::class);
    Route::post('/api/api_post_status_category', [App\Http\Controllers\CategoryController::class, 'api_post_status_category']);
    Route::get('api/del_cat/{id}', [App\Http\Controllers\CategoryController::class, 'del_cat']);

    Route::resource('/admin/driver', DriverController::class);
    Route::post('/api/api_post_status_driver', [App\Http\Controllers\DriverController::class, 'api_post_status_driver']);
    Route::get('api/del_driver/{id}', [App\Http\Controllers\DriverController::class, 'del_driver']);

    Route::resource('/admin/myorderDri', OrderDriController::class);
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
