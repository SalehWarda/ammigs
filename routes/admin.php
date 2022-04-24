<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CoverController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GamesController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{

    Route::get('/login',[LoginController::class, 'getLogin'])->name('getLogin');
    Route::post('/login',[LoginController::class, 'login'])->name('login');

    Route::group(['prefix'=>'admin'],function (){


        Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');



        Route::group(['prefix' => 'cover'],function (){

            Route::post('/media/delete', [CoverController::class, 'removeImage'])->name('admin.covers.removeImage');

            Route::get('/',[CoverController::class, 'index'])->name('admin.covers');
            Route::get('/create',[CoverController::class, 'create'])->name('admin.covers.create');
            Route::post('/store',[CoverController::class, 'store'])->name('admin.covers.store');
            Route::get('/edit/{id}',[CoverController::class, 'edit'])->name('admin.covers.edit');
            Route::patch('/update',[CoverController::class, 'update'])->name('admin.covers.update');
            Route::delete('/delete',[CoverController::class, 'destroy'])->name('admin.covers.delete');

        });



        Route::group(['prefix' => 'products'],function (){

            Route::post('/media/delete', [CoverController::class, 'removeImage'])->name('admin.products.removeImage');

            Route::get('/',[ProductController::class, 'index'])->name('admin.products');
            Route::get('/create',[ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/store',[ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('admin.products.edit');
            Route::patch('/update',[ProductController::class, 'update'])->name('admin.products.update');
            Route::delete('/delete',[ProductController::class, 'destroy'])->name('admin.products.delete');

        });




//         Route::group(['prefix' => 'games'],function (){
//
//             Route::post('/media/delete', [GamesController::class, 'removeImage'])->name('admin.games.removeImage');
//
//            Route::get('/',[GamesController::class, 'index'])->name('admin.games');
//            Route::get('/create',[GamesController::class, 'create'])->name('admin.games.create');
//            Route::post('/store',[GamesController::class, 'store'])->name('admin.games.store');
//            Route::get('/edit/{id}',[GamesController::class, 'edit'])->name('admin.games.edit');
//            Route::patch('/update',[GamesController::class, 'update'])->name('admin.games.update');
//            Route::delete('/delete',[GamesController::class, 'destroy'])->name('admin.games.delete');
//
//        });

       Route::group(['prefix' => 'about'],function (){

             Route::post('/media/delete', [DashboardController::class, 'removeImage'])->name('admin.about.removeImage');

            Route::get('/',[DashboardController::class, 'about'])->name('admin.about');
            Route::patch('/update',[DashboardController::class, 'updateAbout'])->name('admin.about.update');

        });

       Route::group(['prefix' => 'contacts'],function (){


            Route::get('/',[DashboardController::class, 'contacts'])->name('admin.contacts');
            Route::patch('/update',[DashboardController::class, 'updateContacts'])->name('admin.contacts.update');

        });









    });


});

