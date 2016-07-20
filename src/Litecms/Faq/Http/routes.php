<?php

// Admin web routes  for faq
Route::group(['prefix' => trans_setlocale() . '/admin/faq'], function () {
    Route::resource('faq', 'Litecms\Faq\Http\Controllers\FaqAdminController');
});

// Admin API routes  for faq
Route::group(['prefix' => trans_setlocale() . 'api/v1/admin/faq'], function () {
    Route::resource('faq', 'Litecms\Faq\Http\Controllers\FaqAdminApiController');
});

// User web routes for faq
Route::group(['prefix' => trans_setlocale() . '/user/faq'], function () {
    Route::resource('faq', 'Litecms\Faq\Http\Controllers\FaqUserController');
});

// User API routes for faq
Route::group(['prefix' => trans_setlocale() . 'api/v1/user/faq'], function () {
    Route::resource('faq', 'Litecms\Faq\Http\Controllers\FaqUserApiController');
});

// Public web routes for faq
Route::group(['prefix' => trans_setlocale() . '/faqs'], function () {
    Route::get('faq', 'Litecms\Faq\Http\Controllers\FaqController@index');
    Route::get('faq/{slug?}', 'Litecms\Faq\Http\Controllers\FaqController@show');
});

// Public API routes for faq
Route::group(['prefix' => trans_setlocale() . 'api/v1/faqs'], function () {
    Route::get('/', 'Litecms\Faq\Http\Controllers\FaqApiController@index');
    Route::get('/{slug?}', 'Litecms\Faq\Http\Controllers\FaqApiController@show');
});

// Admin web routes  for category
Route::group(['prefix' => trans_setlocale() . '/admin/faq'], function () {
    Route::resource('category', 'Litecms\Faq\Http\Controllers\CategoryAdminController');
});

// Admin API routes  for category
Route::group(['prefix' => trans_setlocale() . 'api/v1/admin/faq'], function () {
    Route::resource('category', 'Litecms\Faq\Http\Controllers\CategoryAdminApiController');
});

// User web routes for category
Route::group(['prefix' => trans_setlocale() . '/user/faq'], function () {
    Route::resource('category', 'Litecms\Faq\Http\Controllers\CategoryUserController');
});

// User API routes for category
Route::group(['prefix' => trans_setlocale() . 'api/v1/user/faq'], function () {
    Route::resource('category', 'Litecms\Faq\Http\Controllers\CategoryUserApiController');
});

// Public web routes for category
Route::group(['prefix' => trans_setlocale() . '/faq'], function () {
    Route::get('/', 'Litecms\Faq\Http\Controllers\CategoryController@index');
    Route::get('/{slug?}', 'Litecms\Faq\Http\Controllers\CategoryController@show');
});

// Public API routes for category
Route::group(['prefix' => trans_setlocale() . 'api/v1/faqs'], function () {
    Route::get('/', 'Litecms\Faq\Http\Controllers\CategoryApiController@index');
    Route::get('/{slug?}', 'Litecms\Faq\Http\Controllers\CategoryApiController@show');
});
