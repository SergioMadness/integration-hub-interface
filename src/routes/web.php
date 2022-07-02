<?php

Route::group(['namespace' => 'professionalweb\IntegrationHub\VInterface\Http\Controllers', 'middleware' => ['web']], static function () {
    Route::get('/flows', 'FlowController@index')->name('InterfaceHub::flow.index');
    Route::match(['GET', 'POST'], '/flows/{id?}', 'FlowController@edit')->name('InterfaceHub::flow.edit');
    Route::any('/flows/{id}', 'FlowController@delete')->name('InterfaceHub::flow.delete');
});