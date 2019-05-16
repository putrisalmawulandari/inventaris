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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::resources([
        'room'=>'RoomController',
        'type'=>'TypeController',
        'user'=>'UserController',
        'employee'=>'EmployeeController',
        'item'=>'ItemController',
        'maintenance'=>'MaintenanceController',
    ]);

    Route::get('supply/{item}','SupplyController@create')->name('supply.create');
    Route::post('supply/store','SupplyController@store')->name('supply.store');
});

Route::resources([
    'borrow'=>'BorrowController',
    'borrow_detail'=>'BorrowDetailController',
]);

Route::get('borrow/detail/{borrow}','BorrowController@detail')->name('borrow.detail');

//login employee

Route::get('login/emp','EmployeeAuth\LoginController@show')->name('emp.show');
Route::post('login/emp','EmployeeAuth\LoginController@login')->name('emp.login');
Route::post('logout/emp','EmployeeAuth\LoginController@logout')->name('emp.logout');

Route::get('employee/employee/home', 'EmployeeController@home')->name('emp.home');

//report
Route::group(['prefix'=>'report','middleware'=>'auth'],function(){
    Route::get('/createjangka','ReportController@createjangka')->name('report.createjangka');
    Route::post('/jangka/show','ReportController@jangka')->name('report.jangka');
    Route::get('/','ReportController@index')->name('report.index');
    Route::get('/{param}','ReportController@report')->name('report.param');
    Route::get('borrow/report','ReportController@borrow_show')->name('report.borrow');
    Route::get('borrow/report/{borrow}','ReportController@borrow_detail')->name('report.borrow.detail');
});
