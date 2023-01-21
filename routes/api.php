<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('dealer_signup', 'Api\AuthController@dealer_signup');
        Route::post('login', 'Api\AuthController@login');
        Route::post('verify-dealer-email', 'Api\AuthController@sendVerificationCode');
        Route::post('dealer-signup', 'Api\AuthController@storeDealer');

	  Route::post('client-signup', 'Api\AuthController@storeClient');
        Route::post('forgot-password', 'Api\AuthController@forgotPassword');
    });
    
    Route::get('province-city-address', 'Api\PropertyController@getProvince');
    Route::get('property-count', 'Api\PropertyController@propertyPurposeCount');
    Route::post('search-property', 'Api\PropertyController@search');
    Route::post('boost-property', 'Api\PropertyController@boostProperty');
    Route::post('featured-property', 'Api\PropertyController@featuredProperty');
    Route::post('all-cities', 'Api\PropertyController@allCity');

    Route::post('all-projects', 'Api\ManageController@allProjects');
    Route::post('all-advertisemments', 'Api\ManageController@allAdvertisements');
    Route::post('all-prime-dealers', 'Api\ManageController@allPrimeDealers');

    Route::middleware(['api', 'jwt.verify'])->group(function () {

      Route::post('all-packages', 'Api\PropertyController@allPackages');
      Route::post('all-advert-plans', 'Api\PropertyController@allAdvertPackages');
      Route::post('storePackages', 'Api\PropertyController@storePackages');

        Route::prefix('property')->group(function () {
                Route::post('add', 'Api\PropertyController@store');
                Route::post('edit', 'Api\PropertyController@edit');
                Route::post('update', 'Api\PropertyController@update');
                Route::post('destory', 'Api\PropertyController@destory');
                Route::post('boost', 'Api\PropertyController@boost');
                Route::post('feature', 'Api\PropertyController@feature');
         });
         Route::prefix('user')->group(function () {
            Route::post('property-count', 'Api\AuthController@userPropertyCount');
            Route::post('info', 'Api\AuthController@user');
            Route::post('all-property', 'Api\AuthController@userProperty');
            Route::post('update', 'Api\AuthController@updateUser');

     });
    });
    Route::prefix('application')->group(function () {
            Route::post('save-investment', 'Api\ApplicationController@storeFormInvestment');
            Route::post('save-house', 'Api\ApplicationController@storeFormHouse');
            Route::post('email', 'Api\ApplicationController@sendEmail');
    });
});
