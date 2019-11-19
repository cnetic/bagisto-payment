<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('configuration/{slug?}/{slug2?}', 'CNetic\Payment\Http\Controllers\ConfigurationController@index')
->defaults('_config', ['view' => 'admin::configuration.index'])
->where('slug', 'sales')
->where('slug2', 'paymentmethods')
->name('cnetic.payment.configuration.index');
//->parameter('slug', 'configure')
//->parameter('slug2', 'paymentmethods');
    });
});
