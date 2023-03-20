<?php

use App\Http\Controllers\AboutController as ControllersAboutController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalization as LaravelLocalizationLaravelLocalization;

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


Route::middleware('setting')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about', [ControllersAboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    Route::post('/contact', [ContactController::class, 'send'])->name('send');
    Route::get('/posts/{slug}', [HomeController::class, 'show'])->name('home.show');
});





Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('post', PostController::class);
    Route::get('trash', [PostController::class, 'trash'])->name('post.trash');
    Route::get('force-delete/{id}', [PostController::class, 'delete'])->name('post.force-delete');
    Route::get('restore/{id}', [PostController::class, 'restore'])->name('post.restore');

    Route::get('admin/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('admin/about', [AboutController::class, 'store'])->name('about.store');

    Route::resource('user', UserController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'store'])->name('setting.store');
});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware('auth')->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::resource('post', PostController::class);
            Route::get('trash', [PostController::class, 'trash'])->name('post.trash');
            Route::get('force-delete/{id}', [PostController::class, 'delete'])->name('post.force-delete');
            Route::get('restore/{id}', [PostController::class, 'restore'])->name('post.restore');

            Route::get('admin/about', [AboutController::class, 'index'])->name('about.index');
            Route::post('admin/about', [AboutController::class, 'store'])->name('about.store');

            Route::resource('user', UserController::class);

            Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
            Route::post('setting', [SettingController::class, 'store'])->name('setting.store');
        });
    }
);



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('post', PostController::class);
    Route::get('trash', [PostController::class, 'trash'])->name('post.trash');
    Route::get('force-delete/{id}', [PostController::class, 'delete'])->name('post.force-delete');
    Route::get('restore/{id}', [PostController::class, 'restore'])->name('post.restore');

    Route::get('admin/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('admin/about', [AboutController::class, 'store'])->name('about.store');

    Route::resource('user', UserController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'store'])->name('setting.store');
});










Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
