<?php

// Resource routes  for faq
Route::group(['prefix' => set_route_guard('web').'/faq'], function () {
    Route::resource('faq', 'FaqResourceController');
});

// Public  routes for faq
Route::get('faq/popular/{period?}', 'FaqPublicController@popular');
Route::get('faqs/', 'FaqPublicController@index');
Route::get('faqs/{slug?}', 'FaqPublicController@show');


// Resource routes  for category
Route::group(['prefix' => set_route_guard('web').'/faq'], function () {
    Route::resource('category', 'CategoryResourceController');
});

// Public  routes for category
// Route::get('category/popular/{period?}', 'CategoryPublicController@popular');
// Route::get('faqs/', 'CategoryPublicController@index');
// Route::get('faqs/{slug?}', 'CategoryPublicController@show');

