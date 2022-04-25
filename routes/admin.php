<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CoverController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GamesController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
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

        Route::get('live-status/{id}', [LoginController::class, 'liveStatus']);

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


       Route::group(['prefix' => 'services'],function (){


            Route::get('/',[DashboardController::class, 'services'])->name('admin.services');
            Route::patch('/update',[DashboardController::class, 'updateServices'])->name('admin.services.update');

        });

       Route::group(['prefix' => 'contacts'],function (){


            Route::get('/',[DashboardController::class, 'contacts'])->name('admin.contacts');
            Route::patch('/update',[DashboardController::class, 'updateContacts'])->name('admin.contacts.update');

        });




        Route::group(['prefix'=>'settings'],function (){

            Route::get('/',[SettingController::class,'index'])->name('admin.settings');
            Route::post('/update',[SettingController::class,'update'])->name('admin.settings.update');


            Route::post('/admin/removeImage', [SettingController::class, 'removeImage'])->name('admin.removeImage');


            Route::get('/account',[SettingController::class,'account'])->name('admin.account');

            Route::patch('/update-account',[SettingController::class,'updateAccount'])->name('admin.account_settings.update');

        });


        Route::group(['prefix'=>'users'],function (){

            Route::get('/',[AdminController::class,'index'])->name('admin.users');
            Route::get('/create',[AdminController::class,'create'])->name('admin.users.create');
            Route::post('/store',[AdminController::class,'store'])->name('admin.users.store');
            Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.users.edit');

            Route::post('/update',[AdminController::class,'update'])->name('admin.users.update');
            Route::delete('/delete',[AdminController::class,'destroy'])->name('admin.users.delete');



        });


        Route::group(['prefix'=>'socials'],function (){

            Route::get('/',[DashboardController::class,'socials'])->name('admin.socials');
            Route::get('/create',[DashboardController::class,'socialsCreate'])->name('admin.socials.create');
            Route::post('/store',[DashboardController::class,'socialsStore'])->name('admin.socials.store');
            Route::delete('/delete',[DashboardController::class,'socialsDelete'])->name('admin.socials.delete');



        });








    });


});

