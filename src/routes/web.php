<?php

Route::group(['namespace' => 'professionalweb\IntegrationHub\VInterface\Http\Controllers', 'middleware' => ['web', 'web-auth']], static function () {
    // Users
    Route::get('applications', 'ApplicationController@index')->name('InterfaceHUB::applications');
    Route::any('applications/add', 'ApplicationController@edit')->name('InterfaceHUB::applications.add');
    Route::any('applications/{id}', 'ApplicationController@edit')->name('InterfaceHUB::applications.edit');
    Route::get('applications/{id}/delete', 'ApplicationController@delete')->name('InterfaceHUB::applications.delete');
});