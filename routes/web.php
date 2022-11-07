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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('/ttt', function(){
    \Artisan::call('migrate:fresh');
    \Artisan::call('db:seed CountrySeeder');
    \Artisan::call('db:seed');
});

Route::get('stt', function(){
    \Artisan::call('storage:link');
});

Route::get('/donate', [App\Http\Controllers\ContributorController::class, 'donate'])->name('donate');
Route::prefix('volunteers')->group(function(){
    Route::get('/', [App\Http\Controllers\VolunteerController::class, 'index'])->name('volunteers');
    Route::post('/sort/{field}', [App\Http\Controllers\VolunteerController::class, 'sort']);
    Route::post('/search/{query}', [App\Http\Controllers\VolunteerController::class, 'search']);
    Route::post('/search/city/{query}', [App\Http\Controllers\VolunteerController::class, 'searchCity']);
    Route::post('/order', [App\Http\Controllers\VolunteerController::class, 'order']);
});
Route::prefix('contributors')->group(function(){
    Route::get('/', [App\Http\Controllers\ContributorController::class, 'index'])->name('contributors');
    Route::post('/payment', [App\Http\Controllers\ContributorController::class, 'payment'])->name('contributors.payment');
    Route::post('/payment/fail', [App\Http\Controllers\ContributorController::class, 'paymentFail'])->name('contributors.payment.fail');
    Route::post('/', [App\Http\Controllers\ContributorController::class, 'store'])->name('contributors.store');
    Route::post('/sort/{field}', [App\Http\Controllers\ContributorController::class, 'sort']);
    Route::post('/search/{query}', [App\Http\Controllers\ContributorController::class, 'search']);
    Route::post('/search/city/{query}', [App\Http\Controllers\ContributorController::class, 'searchCity']);
});
Route::get('/certificate/{id}', [App\Http\Controllers\CertificateController::class, 'show'])->name('certificate.show');
Route::view('/verification', 'verification')->name('verification');
Route::post('/certificate/check', [App\Http\Controllers\VerificationController::class, 'check']);
Route::view('/for-volunteers', 'for_volunteers')->name('for.volunteers');
Route::get('/payment/success', [App\Http\Controllers\ContributorController::class, 'paymentSuccess']);

Route::prefix('admin')->name('admin.')->middleware('auth')->middleware('is.admin')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');

    Route::get('volunteers/orders', [App\Http\Controllers\Admin\VolunteersController::class, 'orders'])->name('volunteers.orders');
    Route::get('volunteers/blocks', [App\Http\Controllers\Admin\VolunteersController::class, 'block'])->name('volunteers.block');
    Route::post('volunteers/unblock/{id}', [App\Http\Controllers\Admin\VolunteersController::class, 'unblock'])->name('volunteers.unblock');

    /*
     * Сортировка для волонтеров
     */
    Route::post('/volunteers/sort/{field}', [App\Http\Controllers\Admin\VolunteersController::class, 'sort']);
    Route::post('/volunteers/search/{query}', [App\Http\Controllers\Admin\VolunteersController::class, 'search']);
    Route::post('/volunteers/search/city/{query}', [App\Http\Controllers\Admin\VolunteersController::class, 'searchCity']);
    Route::resource('volunteers', App\Http\Controllers\Admin\VolunteersController::class);

    /*
     * Сортировка для жертвователей
     */
    Route::post('/sort/{field}', [App\Http\Controllers\Admin\IndexController::class, 'sort']);
    Route::post('/search/{query}', [App\Http\Controllers\Admin\IndexController::class, 'search']);
    Route::post('/search/city/{query}', [App\Http\Controllers\Admin\IndexController::class, 'searchCity']);
});

Auth::routes();

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
    Route::get('/contributors', [App\Http\Controllers\ProfileController::class, 'contributors'])->name('contributors');
    Route::get('/certificate', [App\Http\Controllers\ProfileController::class, 'certificate'])->name('certificate');
    Route::get('/contributor/certificate', [App\Http\Controllers\ProfileController::class, 'contributorCertificate'])->name('contributor.certificate');
    Route::get('/statistic', [App\Http\Controllers\ProfileController::class, 'statistic'])->name('statistic');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
});

Route::get('/download/certificate/{id}', [App\Http\Controllers\CertificateController::class, 'download'])->name('certificate.download');


Route::get('logout', function (){
    \Auth::logout();
    return to_route('login');
});
