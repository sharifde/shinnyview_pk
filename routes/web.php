<?php


use Spatie\Sitemap\SitemapGenerator;

Route::get('/clear-cache', function () {

    $exitCode = Artisan::call('cache:clear');
    // $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');


    //  Artisan::call('jwt:secret');

    // php artisan jwt:secret


    return '<h1>Cache facade value cleared</h1>';
});

Route::get("/sitemap.xml", function () {
    return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
});

Route::get('/config-clear', function () {
    Artisan::call('config:clear');
    return 'Configuration cache cleared!';
});

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/search-property', 'HomeController@searchProperty')->name('search-property');
Route::get('/search-property', 'HomeController@searchProperty')->name('search-property');

// main menu
Route::get('/{type}/{id}/properties', 'HomeController@getTypePropertiesListing')->name('type-properties');  // sale  // type residential/commercial
Route::get('/sale/{id}/{type}/{sid}/{subtype}', 'HomeController@getSalePropertiesListing')->name('sale-properties');  // sale  // type residential/commercial
Route::get('/rent/{id}/{type}/{sid}/{subtype}', 'HomeController@getRentPropertiesListing')->name('rent-properties');  // rent  // type residential/commercial
Route::get('/lease/{id}/{type}', 'HomeController@getLeasePropertiesListing')->name('lease-properties');  // lease  // type residential/commercial
Route::get('/city/{id}/{name}', 'HomeController@getCityPropertiesListing')->name('city-properties');  // lease  // type residential/commercial

Route::get('/for-sale/{id}/properties', 'HomeController@getTypePropertiesListing')->name('for-sale');  // sale  // type

// Route::get('/residential/{filter}', 'HomeController@searchProperty');
// Route::get('/commercial/{filter}', 'HomeController@searchProperty');
// Route::get('/city/{filter}', 'HomeController@searchProperty');

Route::get('/property/{id}/{ptype}/{stype}/{city}/{slug}', 'HomeController@viewProperty')->name('view-property')->middleware(['propertystatus']);

Route::get('/viewbyadminproperty/{id}/{ptype}/{stype}/{city}/{slug}', 'HomeController@viewPropertybyAdmin')->name('view-propertybyadmin');

Route::get('/{id}/properties', 'HomeController@getDealerProperties')->name('dealer-single');
Route::get('/properties/list', 'HomeController@getPropertiesListings')->name('properties-listing');
Route::get('/search-properties', 'HomeController@searchProperties')->name('search-properties');

Route::get('/autocomplete/getAutocomplete/', 'HomeController@getAutocomplete')->name('Autocomplte.getAutocomplte');

Route::get('/autocomplete/getAutocompletehome/', 'HomeController@getAutocompletehome')->name('Autocomplte.getAutocompltehome');
// Boost projects
Route::get('/boost-properties', 'HomeController@getBoostProperties')->name('boost-properties');
// Featured projects
Route::get('/featured-properties', 'HomeController@getFeaturedProperties')->name('featured-properties');
// active projects
Route::get('/active-projects', 'ProjectsController@getActiveProjects')->name('active-projects');
Route::get('/project-single/{id}', 'ProjectsController@getProjectSingle')->name('project-single');
// upcoming projects
Route::get('/upcoming-projects', 'ProjectsController@getUpcomingProjects')->name('upcoming-projects');
// packages
Route::get('/packages', 'PackagesController@index')->name('packages');
Route::get('/packages-details', 'PackagesController@packagedetail')->name('packages-details');
// pricing
Route::get('/pricing', 'PricingController@getPricing')->name('pricing');


Route::get('/search-filter-property', 'HomeController@searchFitlerProperty')->name('search-filter-property');
Route::get('/register', 'AuthController@register')->name('register');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/forgot', 'AuthController@forgot')->name('forgot');
Route::post('subscribe', 'AuthController@subscribe')->name('subscribe');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/application-house-plots', 'HomeController@application_house')->name('application.house_plot');
Route::get('/application-for-investment', 'HomeController@application_investment')->name('application.invest');
Route::get('/dealer-signup', 'AuthController@dealer_signup')->name('dealer.signup');
Route::post('/store-dealer', 'AuthController@storeDealer')->name('store.dealer');
Route::post('/verification-code', 'AuthController@sendVerificationCode')->name('dealer.verfication_code');

// Individual Client
Route::get('/client-signup', 'AuthController@client_signup')->name('client.signup');
Route::post('/store-client', 'AuthController@storeClient')->name('store.client');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
});
////////////////////////Admin///////////////////////////////////////
Route::group(['prefix' => 'admin', 'middleware' => ['role:1']], function () {
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('users/agent', 'Admin\UserController@agent')->name('user.agent');
    Route::get('users/private', 'Admin\UserController@privateSeller')->name('user.private');
    Route::get('users/edit/{id}', 'Admin\UserController@edit')->name('edit.user');
    Route::get('users/add', 'Admin\UserController@addAgent')->name('add.user');
    Route::post('users/add-info', 'Admin\UserController@addNewAgent')->name('add.new.agent');
    Route::post('users/seller/update', 'Admin\UserController@updatePrivateSeller')->name('update.seller');
    Route::post('users/agent/update', 'Admin\UserController@updateAgent')->name('update.agent');
    Route::post('users/status', 'Admin\UserController@updateStatus')->name('update.status');
    Route::post('users/delete', 'Admin\UserController@Destory')->name('user.destory');
    Route::get('appliation-investment-form', 'Admin\ApplicationController@investmentData')->name('application.investment');
    Route::get('appliation-house-form', 'Admin\ApplicationController@houseData')->name('application.house');
    Route::get('properties/list', 'Admin\PropertyController@getProperties')->name('admin.properties');
    Route::get('property/edit/{id}', 'Admin\PropertyController@edit')->name('admin.edit.property');
    Route::post('property/admin/update', 'Admin\PropertyController@update')->name('property.update.admin');
    Route::post('property/destory', 'Admin\PropertyController@destory')->name('admin.destory.property');
    Route::post('property/featured_boost/status', 'Admin\PropertyController@updateFeaturedAndBoostStatus')->name('admin.chagne_featured_boost.property');
    Route::post('property/status', 'Admin\PropertyController@updateStatus')->name('admin.status.property');
    Route::get('seo/{id}', 'Admin\SeoController@getSeoPage')->name('admin.get.seo');
    Route::post('update/seo', 'Admin\SeoController@updateSeoDetails')->name('admin.update.seo.details');
    Route::post('load-admin-cities', 'Admin\PropertyController@loadCity')->name('province.admin.city');
    Route::post('load-admin-address', 'Admin\PropertyController@loadAddress')->name('city.admin.address');
    // prjects
    Route::get('new-project', 'Admin\ProjectController@getAddNewProject')->name('admin.new.project');
    Route::post('add-new-project', 'Admin\ProjectController@addNewProject')->name('admin.add.new.project');
    Route::get('projects-list', 'Admin\ProjectController@getProjectsList')->name('admin.projects.list');
    Route::get('project/details', 'Admin\ProjectController@projectDetails')->name('admin.projects.details');
    Route::post('project/status', 'Admin\ProjectController@updateProjectStatus')->name('update.project.status');
    Route::get('project/edit/{id}', 'Admin\ProjectController@getEditProject')->name('edit.project');
    Route::post('project/basics/update', 'Admin\ProjectController@updateProjectBasics')->name('update.project.basic');
    Route::post('project/images/update', 'Admin\ProjectController@updateProjectImages')->name('update.project.images');
    Route::post('project/features/update', 'Admin\ProjectController@updateProjectFeatures')->name('update.project.features');
    Route::post('project/floor-plan/add', 'Admin\ProjectController@addFloorPlan')->name('add.project.floor.plan');
    Route::post('project/payment-plan/add', 'Admin\ProjectController@addPaymentPlan')->name('add.project.payment.plan');
    Route::post('/delete-gallery-image', 'Admin\ProjectController@deleteGalleryImage');
    Route::post('/add-new-feature', 'Admin\ProjectController@addNewFeature');
    Route::post('/delete-feature', 'Admin\ProjectController@deleteFeature');
    Route::post('/add-new-floor', 'Admin\ProjectController@addNewFloor');
    Route::post('/delete-project-floor', 'Admin\ProjectController@deleteProjectFloor');
    Route::post('/delete-project-payment-plan', 'Admin\ProjectController@deleteProjectPaymentPlan');
    Route::post('/delete-entire-project', 'Admin\ProjectController@deleteEntireProject');
    Route::post('project/video/update', 'Admin\ProjectController@updateProjectVideo')->name('update.project.video');
    Route::post('/delete-project-video', 'Admin\ProjectController@deleteProjectVideo');
    // prime dealer
    Route::get('new-prime-dealer', 'Admin\PrimeDealerController@getAddNewDealer')->name('new.prime.dealer');
    Route::post('add-new-dealer', 'Admin\PrimeDealerController@addNewDealer')->name('add.new.dealer');
    Route::get('dealers-list', 'Admin\PrimeDealerController@getDealersList')->name('admin.dealers.list');
    Route::get('dealer/details', 'Admin\PrimeDealerController@dealerDetails')->name('admin.dealers.details');
    Route::get('dealer/edit/{id}', 'Admin\PrimeDealerController@getEditDealer')->name('edit.dealer');
    Route::post('dealer/update', 'Admin\PrimeDealerController@updateDealerDetails')->name('update.dealer.details');
    Route::post('dealer/status', 'Admin\PrimeDealerController@updateDealerStatus')->name('update.dealer.status');
    Route::post('/delete-dealer', 'Admin\PrimeDealerController@deleteDealer');

    // Advertisment
    Route::get('new-advertisment', 'Admin\AdvertismentController@getAddNewAdvertisment')->name('new.advertisment');
    Route::post('add-new-advertisment', 'Admin\AdvertismentController@addNewAdvertisment')->name('add.new.advertisment');
    Route::get('advertisment-list', 'Admin\AdvertismentController@getadvertismentList')->name('admin.advertisment.list');
    Route::get('adv/details', 'Admin\AdvertismentController@advDetails')->name('admin.advs.details');
    Route::get('advertisment/edit/{id}', 'Admin\AdvertismentController@getEditAdvertisment')->name('edit.advertisment');
    Route::post('advertisment/update', 'Admin\AdvertismentController@updateAdvertismentDetails')->name('update.advertisment.details');
    Route::post('advs/status', 'Admin\AdvertismentController@updateAdvsStatus')->name('update.advs.status');
    Route::post('/delete-advertisment', 'Admin\AdvertismentController@deleteAdvertisment');

    // change password
    Route::get('/change-password', 'Admin\UserController@getChangePassword')->name('change-password');
    Route::post('/update-password', 'Admin\UserController@updatePassword')->name('update.password');

    // advert plan
    Route::get('/get-advert-plans', 'Admin\AdvertPlanController@get')->name('advert-plan');
    Route::post('/add-advert-plan', 'Admin\AdvertPlanController@addNewAdvertPlan')->name('add.new.advert.plan');
    Route::get('/advert-plan/listing', 'Admin\AdvertPlanController@getListing')->name('advert.plan.list');
    Route::get('plan/details', 'Admin\AdvertPlanController@getListingDetails')->name('admin.plan.details');
    Route::post('plan/status', 'Admin\AdvertPlanController@updatePlanStatus')->name('update.plan.status');
    Route::get('plan/edit/{id}', 'Admin\AdvertPlanController@getEditPlan')->name('edit.plan');
    Route::post('plan/update', 'Admin\AdvertPlanController@updateDetails')->name('update.plan.details');
    Route::post('/delete-advert', 'Admin\AdvertPlanController@deleteAdvert');

    // package Request
    Route::get('/package/request', 'Admin\PackagePlanController@getrequest')->name('package.request');
    Route::get('packageplan/requestdetails', 'Admin\PackagePlanController@getrequestDetails')->name('admin.packageplan.requestdetails');
    Route::post('packageplan/statusrequest', 'Admin\PackagePlanController@updatePackagePlanStatusrequest')->name('update.packageplanrequest.status');
    Route::post('packageplan/statusrequestapprove', 'Admin\PackagePlanController@updatePackagePlanStatusrequestapprove')->name('update.packageplanrequest.approve');
    Route::post('packageplan/statusrequestispaid', 'Admin\PackagePlanController@updatePackagePlanStatusrequestispaid')->name('update.packageplanrequest.statusispaid');
    Route::post('/delete-package-request', 'Admin\PackagePlanController@deletePackagerequest');

    // package plan
    Route::get('/add-package-plan', 'Admin\PackagePlanController@index')->name('add.package.plan');
    Route::post('/save-package-plan', 'Admin\PackagePlanController@savePackagePlan')->name('save.package.plan');
    Route::get('/package-plan/listing', 'Admin\PackagePlanController@getListing')->name('package.plan.list');
    Route::get('packageplan/details', 'Admin\PackagePlanController@getListingDetails')->name('admin.packageplan.details');
    Route::post('packageplan/status', 'Admin\PackagePlanController@updatePackagePlanStatus')->name('update.packageplan.status');
    Route::get('packageplan/edit/{id}', 'Admin\PackagePlanController@getEditPlan')->name('editpackage.plan');
    Route::post('packageplan/update', 'Admin\PackagePlanController@updateDetails')->name('update.packageplan.details');
    Route::post('/delete-package', 'Admin\PackagePlanController@deletePackage');
});
////////////////////////AGENT//////////////////////////////////////////////////
Route::group(['prefix' => 'agent', 'middleware' => ['role:2']], function () {
    Route::get('property/paymentMehtod', 'Agent\PropertyController@paymentMehtod')->name('payments');
    Route::get('property/paymentdetails', 'Agent\PropertyController@paymentdetails')->name('paymentdetails');
    Route::get('property/advertbuy', 'Agent\PropertyController@advertbuy')->name('advertbuy');
    Route::get('property/packagebuy', 'Agent\PropertyController@packagebuy')->name('packagebuy');
    Route::post('property/packagestore', 'Agent\PropertyController@packagestore')->name('packagestore');
    Route::get('dashboard', 'Agent\DashboardController@index')->name('agent.dashboard');
    Route::get('property/index', 'Agent\PropertyController@index')->name('properties');
    Route::get('property/create', 'Agent\PropertyController@create')->name('create_property');
    Route::post('property/store', 'Agent\PropertyController@store')->name('store_property');
    Route::get('property/edit/{id}', 'Agent\PropertyController@edit')->name('edit.property');
    Route::post('property/update', 'Agent\PropertyController@update')->name('update.property');
    Route::post('profile/destory', 'Agent\PropertyController@destory')->name('destory.property');
    Route::post('load-cities', 'Agent\PropertyController@loadCity')->name('province.city');
    Route::post('load-address', 'Agent\PropertyController@loadAddress')->name('city.address');
    Route::post('property/featured_boost/status', 'Agent\PropertyController@updateFeaturedAndBoostStatus')->name('chagne_featured_boost.property');
    Route::post('property/status', 'Agent\PropertyController@updateStatus')->name('status.property');
    Route::get('update/profile', 'Agent\DashboardController@profile')->name('edit.profile');
    Route::post('profile/update', 'Agent\DashboardController@profileUpdate')->name('profile.update');
});
Route::get('property/{id}', 'HomeController@propertyDetail')->name('property');
Route::get('/about-us', 'HomeController@aboutUs')->name('about');
Route::get('/complaint-policy', 'HomeController@complaint_policy')->name('complaint.policy');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('privacy');
Route::get('/refund-policy', 'HomeController@refundPolicy')->name('refund');
Route::get('/terms-conditions', 'HomeController@termsConditions')->name('terms.conditions');
Route::get('property/search/cities', 'HomeController@getCities')->name('property.cities');
Route::get('/contact-us', 'HomeController@contact_us')->name('contact.us');

// Route::get('my-captcha', 'HomeController@myCaptcha')->name('myCaptcha');
// Route::post('my-captcha', 'HomeController@myCaptchaPost')->name('myCaptcha.post');
// Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');
