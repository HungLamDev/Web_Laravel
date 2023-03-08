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

Route::prefix('employer')->middleware('checkLoginUser')->group(function () {
    Route::get('/', 'EmloyerDashboardController@index');

    Route::prefix('job')->group(function () {
        Route::get('', 'EmloyerJobController@index')->name('get_employer.job.index');
        Route::get('create', 'EmloyerJobController@create')->name('get_employer.job.create');
        Route::post('create', 'EmloyerJobController@store');
        Route::get('update/{id}', 'EmloyerJobController@edit')->name('get_employer.job.update');
        Route::post('update/{id}', 'EmloyerJobController@update');
    });
    Route::prefix('company')->group(function () {
        Route::get('', 'EmployerCompanyController@index')->name('get_employer.company.index');
        Route::post('store', 'EmployerCompanyController@store')->name('get_employer.company.store');
    });
    Route::prefix('apply-job')->group(function () {
        Route::get('', 'EmployerApplyJobController@index')->name('get_employer.apply_job.index');
        Route::get('delete/{id}', 'EmployerApplyJobController@delete')->name('get_employer.apply_job.delete');
    });
});
