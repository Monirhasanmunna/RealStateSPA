<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealtorController;
use App\Models\Listing;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



    Route::get('/listing',[ListingController::class,'index'])->name('listing.index');
    Route::get('/create',[ListingController::class,'create'])->name('listing.create')->middleware('auth');
    Route::post('/store',[ListingController::class,'store'])->name('listing.store')->middleware('auth');
    Route::get('/{id}/show',[ListingController::class,'show'])->name('listing.show');
    Route::get('/{id}/edit',[ListingController::class,'edit'])->name('listing.edit')->middleware('auth');
    Route::put('/{id}/update',[ListingController::class,'update'])->name('listing.update')->middleware('auth');
    Route::delete('/{id}/delete',[ListingController::class,'destroy'])->name('listing.destroy')->middleware('auth');


    Route::group(['as'=>'realtor.', 'prefix'=>'realtor','middleware'=>['auth']],function(){
        Route::get('/',[RealtorController::class,'listing'])->name('listing');
        Route::get('/{listing}/show',[RealtorController::class,'show'])->name('listing.show');
    });

require __DIR__.'/auth.php';
