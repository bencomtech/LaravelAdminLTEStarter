<?php

Route::prefix('home')->group(function () {
    Route::get('', 'HomeController@index')->name('home.index');
});
