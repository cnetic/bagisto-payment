<?php
// Route::get('admin/configuration/{slug?}/{slug2?}', 'Webkul\Admin\Http\Controllers\ConfigurationController@index')
// ->defaults('_config', [   'view' => 'admin::configuration.index'])
// ->name('admin.configuration.index');
// //->where('slug2', '^(?!paymentmethods).*$');

// Route::get('admin/configuration/{slug?}/{slug2?}', 'CNetic\Payment\Http\Controllers\ConfigurationController@index')
// ->defaults('_config', ['view' => 'admin::configuration.index'])
// ->where('slug2', '^(paymentmethods).*$')
// ->name('admin.configuration.index');


Route::group(['middleware' => ['web']], function () {

  Route::prefix('admin')->group(function () {

    Route::get('configuration/sales/paymentmethods', 'CNetic\Payment\Http\Controllers\ConfigurationController@index')->defaults('_config', [
      'view' => 'cnetic-payment::configuration.index'
      ])
      ->name('admin.configuration.index');

    // Route::get('configuration/{slug?}/{slug2?}', 'Webkul\Admin\Http\Controllers\ConfigurationController@index')->defaults('_config', [
    //   'view' => 'admin::configuration.index'
    //   ])->name('admin.configuration.index');
    });

});
