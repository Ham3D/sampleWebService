<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('users', 'UsersController');
});


/**
 * Examples:
 *      /api/v1/user
 *      /api/v1/user/1
 *
 */