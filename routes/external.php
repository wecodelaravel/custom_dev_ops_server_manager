<?php
/**
 * Created by PhpStorm.
 * User: phillip.madsen
 * Date: 7/3/2019
 * Time: 12:13 PM
 */

//Route::group([
//    "domain" => "http//www.test.text"
//], function () {
////    Route::get("api/user/")->name("external.user.index");
//    Route::get("api/")->name("external.cs.show");
//    Route::post("/cs/php/config")->name("external.cs.post");
////    Route::put("api/user/{id}")->name("external.user.update");
////    Route::delete("api/user/{id}")->name("external.user.delete");
//});


// PostConfigurationsController@send
Route::post('test/*', ['as' => 'test', 'uses' => 'PostConfigurationsController@test']);

Route::post('cs_configs', ['as' => 'cs_configs', 'uses' => 'PostConfigurationsController@cs_configs']);
Route::get('cs_exists', ['as' => 'cs_exists', 'uses' => 'PostConfigurationsController@cs_exists']);
Route::post('ss_configs', ['as' => 'ss_configs', 'uses' => 'PostConfigurationsController@ss_configs']);

//Upload File to external server

