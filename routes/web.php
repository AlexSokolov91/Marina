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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/price', 'App\Http\Controllers\IndexController@price')->name('price');

Route::group(['middleware' => ['auth']], function () {
    /**
     * Company
     */
    Route::group(['prefix' => 'admin-panel', 'as' => 'admin-management.'], function () {
        Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')->name('index');

        // services
        Route::group(['prefix' => 'service'], function () {
            Route::get('/', 'App\Http\Controllers\Admin\ServiceController@index')->name('service');
            Route::get('create', 'App\Http\Controllers\Admin\ServiceController@create')->name('service-create');
            Route::delete('/delete/{service}', 'App\Http\Controllers\Admin\ServiceController@delete')->name('service-delete');
            Route::post('store', 'App\Http\Controllers\Admin\ServiceController@store')->name('service-store');
            Route::get('edit/{service}', 'App\Http\Controllers\Admin\ServiceController@edit')->name('service-edit');
            Route::put('update/{service}', 'App\Http\Controllers\Admin\ServiceController@update')->name('service-update');
        });

        // our works
        Route::group(['prefix' => 'our-work'], function () {
            Route::get('/', 'App\Http\Controllers\Admin\OurWorkController@index')->name('our-work');
            Route::post('upload', 'App\Http\Controllers\Admin\OurWorkController@upload')->name('our-work-upload');
            Route::delete('/delete/{id}', 'App\Http\Controllers\Admin\OurWorkController@delete')->name('our-work-delete');
        });

     // employee categories
        Route::group(['prefix' => 'employee-categories'], function () {
            Route::get('/', 'App\Http\Controllers\Admin\EmployeeCategoryController@index')->name('employee-category');
            Route::get('create', 'App\Http\Controllers\Admin\EmployeeCategoryController@create')->name('employee-category-create');
            Route::post('store', 'App\Http\Controllers\Admin\EmployeeCategoryController@store')->name('employee-category-store');
            Route::get('edit/{employeeCategory}', 'App\Http\Controllers\Admin\EmployeeCategoryController@edit')->name('employee-category-edit');
            Route::put('update/{employeeCategory}', 'App\Http\Controllers\Admin\EmployeeCategoryController@update')->name('employee-category-update');
            Route::delete('delete/{employeeCategory}', 'App\Http\Controllers\Admin\EmployeeCategoryController@delete')->name('employee-category-delete');
        });

        // employee
        Route::group(['prefix' => 'employee'], function () {
            Route::get('/', 'App\Http\Controllers\Admin\EmployeeController@index')->name('employee');
            Route::get('create', 'App\Http\Controllers\Admin\EmployeeController@create')->name('employee-create');
            Route::get('edit/{employee}', 'App\Http\Controllers\Admin\EmployeeController@edit')->name('employee-edit');
            Route::put('update/{employee}', 'App\Http\Controllers\Admin\EmployeeController@update')->name('employee-update');
            Route::post('store', 'App\Http\Controllers\Admin\EmployeeController@store')->name('employee-store');
            Route::delete('delete/{employee}', 'App\Http\Controllers\Admin\EmployeeController@delete')->name('employee-delete');
        });

    });
});

require __DIR__ . '/auth.php';
