<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// auth routes...
Auth::routes();

// admin routes...
Route::prefix('admin')->middleware(['auth'])->name('admin.')->namespace('Admin')->group(function () {

    // dashboard routes...
    Route::resource('dashboard', 'DashboardController');

    // content routes...
    Route::prefix('content')->name('content.')->group(function () {

        // category routes...
        Route::resource('category', 'ContentCategoryController');

        // post routes...
        Route::resource('category.post', 'ContentPostController');

    });

    // portfolio routes...
    Route::prefix('portfolio')->name('portfolio.')->group(function () {

        // category routes...
        Route::resource('category', 'PortfolioCategoryController');

        // post routes...
        Route::resource('post', 'PortfolioPostController');

    });

    // project routes...
    Route::prefix('project')->name('project.')->group(function () {

        // category routes...
        Route::resource('category', 'ProjectCategoryController');

        // post routes...
        Route::resource('post', 'ProjectPostController');

    });

    // item routes...
    Route::prefix('item')->name('item.')->group(function () {

        // category routes...
        Route::resource('category', 'ItemCategoryController');

        // post routes...
        Route::resource('category.post', 'ItemPostController');

    });

    // blog routes...
    Route::prefix('blog')->name('blog.')->group(function () {

        // category routes...
        Route::resource('category', 'BlogCategoryController');

        // post routes...
        Route::resource('post', 'BlogPostController');


        Route::get('post/{id}/approve', 'BlogPostController@approve')->name('post.approve');

    });

    // client routes...
    Route::resource('client', 'ClientController');

    // team routes...
    Route::resource('team', 'TeamController');

    // download routes...
    Route::resource('download', 'DownloadController');

    // gallery routes...
    Route::resource('gallery', 'GalleryController');

    // slider routes...
    Route::resource('slider', 'SliderController');
    
    // user routes...
    Route::resource('user', 'UserController');
    Route::get('user/{id}/approve', 'UserController@approve')->name('user.approve');

    // settings routes...
    Route::prefix('setting')->name('setting.')->group(function () {

        // site setting routes...
        Route::resource('site', 'SettingSiteController');

        // contact setting routes...
        Route::resource('contact', 'SettingContactController');

        // seo setting routes...
        Route::resource('seo', 'SettingSeoController');

        // user setting routes
        Route::get('profile', 'SettingUserController@profile');
        Route::get('password', 'SettingUserController@password');
    });

    // job routes...
    Route::prefix('job')->name('job.')->group(function () {

        // job list routes...
        Route::resource('list', 'JobListController');

        // job post routes...
        Route::resource('post', 'JobPostController');

        // job application routes...
        Route::resource('application', 'JobApplicationController');

    });

    // registration routes...
    Route::resource('registration', 'RegistrationController');
    Route::get('registration/{id}/approve', 'RegistrationController@approve')->name('registration.approve');
    Route::get('registered-profile', 'RegistrationController@registeredProfile');
    Route::post('registered-profile', 'RegistrationController@updateRegisteredProfile');

    Route::get('sms/{id}', 'SmsController@index')->name('registration.sms');

});
