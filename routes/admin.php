<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GamesController;
use App\Http\Controllers\Backend\HomeController;
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

    Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){


        Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');



        Route::group(['prefix' => 'sliders'],function (){

            Route::post('/media/delete', [SliderController::class, 'removeImage'])->name('admin.sliders.removeImage');

            Route::get('/',[SliderController::class, 'index'])->name('admin.sliders');
            Route::get('/create',[SliderController::class, 'create'])->name('admin.sliders.create');
            Route::post('/store',[SliderController::class, 'store'])->name('admin.slider.store');
            Route::get('/edit/{id}',[SliderController::class, 'edit'])->name('admin.sliders.edit');
            Route::patch('/update',[SliderController::class, 'update'])->name('admin.sliders.update');
            Route::delete('/delete',[SliderController::class, 'destroy'])->name('admin.sliders.delete');

        });


         Route::group(['prefix' => 'categories'],function (){


            Route::get('/',[CategoriesController::class, 'index'])->name('admin.categories');
            Route::get('/create',[CategoriesController::class, 'create'])->name('admin.categories.create');
            Route::post('/store',[CategoriesController::class, 'store'])->name('admin.categories.store');
            Route::get('/edit/{id}',[CategoriesController::class, 'edit'])->name('admin.categories.edit');
            Route::patch('/update',[CategoriesController::class, 'update'])->name('admin.categories.update');
            Route::delete('/delete',[CategoriesController::class, 'destroy'])->name('admin.categories.delete');

        });


         Route::group(['prefix' => 'games'],function (){

             Route::post('/media/delete', [GamesController::class, 'removeImage'])->name('admin.games.removeImage');

            Route::get('/',[GamesController::class, 'index'])->name('admin.games');
            Route::get('/create',[GamesController::class, 'create'])->name('admin.games.create');
            Route::post('/store',[GamesController::class, 'store'])->name('admin.games.store');
            Route::get('/edit/{id}',[GamesController::class, 'edit'])->name('admin.games.edit');
            Route::patch('/update',[GamesController::class, 'update'])->name('admin.games.update');
            Route::delete('/delete',[GamesController::class, 'destroy'])->name('admin.games.delete');

        });

       Route::group(['prefix' => 'about'],function (){

             Route::post('/media/delete', [DashboardController::class, 'removeImage'])->name('admin.about.removeImage');

            Route::get('/',[DashboardController::class, 'about'])->name('admin.about');
            Route::patch('/update',[DashboardController::class, 'updateAbout'])->name('admin.about.update');

        });









    });


});

