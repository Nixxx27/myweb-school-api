<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/nikko', function () use ($router) {
    return "hey its me nikko";
});


/*
|--------------------------------------------------------------------------
| API V1
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => [env('_LANG_HEADER_V1')], 'prefix' => 'api/v1', 'namespace' => 'v1'], function () {

   /*
    |--------------------------------------------------------------------------
    | NEWSFEED
    |--------------------------------------------------------------------------
    */

    Route::get('newsfeeds', 'NewsFeedController@newsfeeds');
    Route::post('newsfeed/store', 'NewsFeedController@store');
    Route::post('newsfeed/update/{id}', 'NewsFeedController@update');
    Route::delete('newsfeed/destroy/{id}', 'NewsFeedController@destroy');


    Route::get('newsfeed/categories', 'NewsFeedController@categories');
    Route::post('newsfeed/category/store', 'NewsFeedController@category_store');
    Route::post('newsfeed/category/update/{id}', 'NewsFeedController@category_update');
    Route::delete('newsfeed/category/destroy/{id}', 'NewsFeedController@category_destroy');


});



// Route::group(['middleware' => ['X-MYWEB_SCHOOL-TOKEN_V1'], 'prefix' => 'api/v1'], function () {

//     Route::get('warehouse2',['as'=> 'warehouse', 'uses' => 'Admin\Reports\WarehouseReports2Controller@index']);
//     Route::get('warehouse2/export',['as'=> 'export', 'uses' => 'Admin\Reports\WarehouseReports2Controller@exportReport']);
//     Route::get('warehouse2/order/{seller_id}/view/{order_id}',['as'=> 'warehouse.detail', 'uses' => 'Admin\Reports\WarehouseReports2Controller@orderDetail']);
//     Route::get('warehouse2/order/{seller_id}/paxslip/{order_id}',['as'=> 'warehouse.paxslip', 'uses' => 'Admin\Reports\WarehouseReports2Controller@paxSlip']);
//     Route::post('warehouse2/order/{order_id}/updatemagento/{seller_ids}',['as' => 'warehouse.magento-order-update-status', 'uses' => 'Admin\Reports\WarehouseReports2Controller@updateAdminStatus']);
//     Route::post('warehouse2/order/{order_id}/updateseller/{seller_id}',['as' => 'warehouse.seller-order-update-status', 'uses' => 'Admin\Reports\WarehouseReports2Controller@updateSellerOrderStatus']);
//     Route::get('warehouse2/order/{seller_id}/invoice/{increment_id}/{order_id}',['as'=> 'warehouse.invoice', 'uses' => 'Admin\Reports\WarehouseReports2Controller@generateInvoice']);


//  });
