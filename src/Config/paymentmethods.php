<?php
return [
    'przelewy24_standard' => [
        'code' => 'przelewy24_standard',
        'title' => 'Przelewy24 Standard',
        'description' => 'shop::app.checkout.onepage.przelewy24',
        'class' => 'CNetic\Przelewy24\Payment\Przelewy24',
        'sandbox' => true,
        'active' => true,
        'business_account' => 'test@webkul.com',
        'sort' => 3
    ]
];
