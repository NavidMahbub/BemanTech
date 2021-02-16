<?php

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

// content routes...
Route::prefix('content')->name('content.')->group(function () {

    // category routes...
    Route::apiResource('category', 'ContentCategoryController');

    // post routes...
    Route::apiResource('category.post', 'ContentPostController');

});

// portfolio routes...
Route::prefix('portfolio')->name('portfolio.')->group(function () {

    // category routes...
    Route::apiResource('category', 'PortfolioCategoryController');

    // post routes...
    Route::apiResource('post', 'PortfolioPostController');

});

// project routes...
Route::prefix('project')->name('project.')->group(function () {

    // category routes...
    Route::apiResource('category', 'ProjectCategoryController');

    // post routes...
    Route::apiResource('post', 'ProjectPostController');

});

// item routes...
Route::prefix('item')->name('item.')->group(function () {

    // category routes...
    Route::apiResource('category', 'ItemCategoryController');

    // post routes...
    Route::apiResource('category.post', 'ItemPostController');

});

// blog routes...
Route::prefix('blog')->name('blog.')->group(function () {

    // category routes...
    Route::apiResource('category', 'BlogCategoryController');

    // post routes...
    Route::apiResource('post', 'BlogPostController');

});

// client routes...
Route::apiResource('client', 'ClientController');

// client routes...
Route::apiResource('user', 'UserController');

// team routes...
Route::apiResource('team', 'TeamController');

// download routes...
Route::apiResource('download', 'DownloadController');

// gallery routes...
Route::apiResource('gallery', 'GalleryController');

// slider routes...
Route::apiResource('slider', 'SliderController');

// settings routes...
Route::prefix('setting')->name('setting.')->group(function () {

    // site setting routes...
    Route::apiResource('site', 'SettingSiteController');

    // contact setting routes...
    Route::apiResource('contact', 'SettingContactController');

    // seo setting routes...
    Route::apiResource('seo', 'SettingSeoController');

    // user setting routes
    Route::get('profile', 'SettingUserController@getProfile');
    Route::post('update-profile', 'SettingUserController@updateProfile');
    Route::post('update-password', 'SettingUserController@updatePassword');

});

// job routes...
Route::prefix('job')->name('job.')->group(function () {

    // job list routes...
    Route::apiResource('list', 'JobListController');

    // job post routes...
    Route::apiResource('post', 'JobPostController');

    // job application routes...
    Route::apiResource('application', 'JobApplicationController');

});

// geo filter routes...
Route::prefix('geo/filter')->name('geo.filter.')->group(function () {

    Route::get('division', 'GeoFilterController@division')->name('division');
    Route::get('district', 'GeoFilterController@district')->name('district');
    Route::get('upazila', 'GeoFilterController@upazila')->name('upazila');
    Route::get('union', 'GeoFilterController@union')->name('union');

});

// registration controller
Route::apiResource('registration', 'RegistrationController');