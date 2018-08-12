<?php

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
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    Route::get('/', 'DashboardController@index')->name('index');

    Route::get('/setting', 'SettingController@index')->name('setting.index');
    Route::post('/setting/store', 'SettingController@store')->name('setting.store');
    Route::post('/setting/setwebhook', 'SettingController@setwebhook')->name('setting.setwebhook');
    Route::post('/setting/getwebhookinfo', 'SettingController@getwebhookinfo')->name('setting.getwebhookinfo');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::post('632998725:AAFLzkS1sA8O8NJj5sZlBezHBHT7u6ph9do', function(){
    Telegram::commandsHandler(true);
});
