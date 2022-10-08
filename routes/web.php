<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', 'HomeController@index')->middleware('continue')->name('home'); // 第一頁
Route::post('/page2', 'Page2Controller@page2')->name('page2');
Route::post('/page3', 'Page3Controller@page3')->name('page3');
Route::post('/page4', 'Page4Controller@page4')->name('page4');
Route::post('/page5', 'Page5Controller@page5')->name('page5');
Route::post('/page6', 'Page6Controller@page6')->name('page6');
Route::post('/finish', 'FinishController@index')->name('finish');

Route::get('/page1', function () {
    $data = @(auth()->user()->results->page1);
    return view('page1', compact('data'));
});

Route::middleware(['auth', 'checkPage'])->group(function () {
    Route::get('/page2', function () {
        $data = @(auth()->user()->results->page2);
        return view('page2', compact('data'));
    });
    Route::get('/page3', function () {
        $data = @(auth()->user()->results->page3);
        return view('page3', compact('data'));
    });
    Route::get('/page4', function () {
        $data = @(auth()->user()->results->page4);
        return view('page4', compact('data'));
    });
    Route::get('/page5', function () {
        $data = @(auth()->user()->results->page5);
        return view('page5', compact('data'));
    });
    Route::get('/finish', function () {
        return view('finish');
    });
});

Route::get('/logout', function () {
    auth()->logout();
});

// clear
Route::get('/artisan-clear', function () {
    try {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('event:clear');
        Artisan::call('optimize:clear');
        Artisan::call('view:clear');

        dd('success!');
    } catch (\Throwable $th) {
        dd('fail!', $th->getMessage());
    }

});
