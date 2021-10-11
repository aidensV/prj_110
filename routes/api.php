<?php

use App\Http\Controllers\Admin\c_borang;
use App\Http\Controllers\Admin\c_iku;
use App\Http\Controllers\Admin\c_led;
use App\Http\Controllers\Admin\c_lkps_penilaian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('indicator-by-type',[c_borang::class,'getTipeIndicator']);
Route::get('get-value-indicator',[c_borang::class,'getNilaiIndikator']);
ROute::post('lkps/change/nilai',[c_lkps_penilaian   ::class,'changeNilai']);
ROute::post('led/change/nilai',[c_led::class,'changeValue']);
ROute::post('iku/change/nilai',[c_iku::class,'changeValue']);
Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('products', 'ProductsApiController');
});

