<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {

Route::get('configuration/sales/paymentmethods', 'CNetic\Payment\Http\Controllers\ConfigurationController@index')->defaults('_config', [
    'view' => 'admin::configuration.index'
])->name('cnetic.payment.configuration.index');
});
});
