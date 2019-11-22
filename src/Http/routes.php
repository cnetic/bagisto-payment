<?php
Route::get(
    'configuration/{slug}/paymentmethods',
    'CNetic\Payment\Http\Controllers\ConfigurationController@index',
    ['parameters' =>  ['slug' => 'sales', 'slug2' => 'paymentmethods']]
)
->defaults('_config', ['view' => 'admin::configuration.index', 'slugs' => ['slug' => 'sales', 'slug2' => 'paymentmethods']])
->parameter('slug', 'sales')
->name('cnetic.payment.configuration.index');

Route::get('configuration/{slug?}/{slug2?}', 'Webkul\Admin\Http\Controllers\ConfigurationController@index')
->defaults('_config', [   'view' => 'admin::configuration.index'])->name('admin.configuration.index');
