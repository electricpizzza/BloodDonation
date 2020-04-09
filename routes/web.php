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

use App\BloodRequest;

Route::get('/', function () {
    //$requests = \App\BloodRequest::latest()->paginate(5);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/{user}/setting', 'HomeController@setting')->name('setting');

Route::get('/{user}/planning', 'HomeController@planning')->name('planning');

Route::get('/request/create', 'BloodRequestController@create')->name('request.create');

Route::get('/bloodrequest/{postid}', 'BloodRequestController@index')->name('request.show');

Route::post('/request', 'BloodRequestController@store')->name('request.store');


Route::post('/notifications/{notificationid}/{postid}',  function ($notificationid,$postid)
{
    auth()->user()->notifications()->find($notificationid)->markAsRead();
    return redirect('bloodrequest/'.$postid);
})->name('readNotifications');

Route::post('/messagerie/{blood_request_id}', 'MessagerieController@respond')->name('message.store');

Route::get('/inbox', 'MessagerieController@index')->name('message.show');
