<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Maatwebsite\Excel\Facades\Excel;

Route::group(['prefix' => '/'], function () {
    Route::get('/', ['as' => 'homePage', 'uses' => 'Web\HomeController@index']);
    Route::get('/about-us', ['as' => 'aboutPage', 'uses' => 'Web\HomeController@about']);
    Route::get('/services', ['as' => 'servicePage', 'uses' => 'Web\HomeController@services']);
    Route::get('/services/{id}', ['as' => 'serviceDetailsPage', 'uses' => 'Web\HomeController@servicesdetails']);
    Route::get('/products', ['as' => 'allProductPage', 'uses' => 'Web\HomeController@allproducts']);
    Route::get('/products/{id}', ['as' => 'productPage', 'uses' => 'Web\HomeController@products']);
    Route::get('/product-details/{id}', ['as' => 'productDetailsPage', 'uses' => 'Web\HomeController@detailsproducts']);
    Route::get('/gellary', ['as' => 'gellaryPage', 'uses' => 'Web\HomeController@gellary']);
    Route::get('/news/{id}', ['as' => 'newsPage', 'uses' => 'Web\HomeController@news']);
    Route::get('/contact-us', ['as' => 'contactPage', 'uses' => 'Web\HomeController@contact']);
    Route::post('/contact', 'Web\HomeController@contactstore')->name('contact.store');
    Route::get('/blog-details/{id}', ['as' => 'blogDetailsPage', 'uses' => 'Web\HomeController@blogdetails']);


});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    /***  web group ***/
    Route::group(['prefix' => 'web', 'as' => 'web.'], function () {
        Route::resource('gallery', 'Web\GalleryController');
        Route::resource('slider', 'Web\SliderController');
        Route::resource('wProduct', 'Web\WProductController');
        Route::resource('review', 'Web\ReviewController');
        Route::resource('about', 'Web\AboutController');
        Route::resource('contact', 'Web\ContactController');
        Route::resource('industry', 'Web\IndustryController');
        Route::resource('contactUs', 'Web\ContactUsController');
        Route::resource('client-logo', 'Web\ClientLogoController');
        Route::resource('service', 'Web\ServiceController');
        Route::resource('blog', 'Web\BlogController');
        Route::resource('subscribe', 'Web\SubscribeController');
    });

    /***  settings group ***/
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        /*** for users ***/
        Route::get('/index', ['as' => 'index', 'uses' => 'Settings\UserController@index']);
        Route::resource('users', 'Settings\UserController');
        Route::resource('units', 'Settings\UnitController');
        Route::get('published-units', 'Settings\UnitController@published_units');
        Route::get('unit-info/{id}', 'Settings\UnitController@unit_info');
        Route::resource('roles', 'Settings\RoleController');
        Route::resource('company', 'Settings\CompanyController');
        Route::resource('category', 'Settings\CategoryController');
    });


    /*** user profile ***/
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', ['as' => 'my-profile', 'uses' => 'ProfileController@index']);
        Route::post('/update-password', ['as' => 'update-password', 'uses' => 'ProfileController@update_password']);
        Route::put('/update-profile/{id}', ['as' => 'update-profile', 'uses' => 'ProfileController@update']);
    });
});
/* For Auth */
Auth::routes(['register' => false]);
Route::get('/admin', 'DashboardController@index')->name('admin');
