<?php

use App\Http\Controllers\Admin\c_borang;
use App\Http\Controllers\Admin\c_lkps_penilaian;

Route::get('indicator-by-type',[c_borang::class,'getTipeIndicator']);
Route::get('get-value-indicator',[c_borang::class,'getNilaiIndikator']);
ROute::post('lkps/change/nilai',[c_lkps_penilaian   ::class,'changeNilai']);
Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('products', 'ProductsApiController');
});
