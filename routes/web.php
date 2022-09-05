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

use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {

    Route::group([
        'namespace' => 'User',
        'prefix' => 'user',
    ], function () {
        Route::get('/orders/{order_id}', 'HomeUserController@show')->name('userOrdersShow');
        Route::get('/home', 'HomeUserController@index')->name('userHome');
    });

    Route::group([
        'middleware' => 'is_admin',
    ], function () {

        Route::group([
            'namespace' => 'Admin',
            'prefix' => 'admin',
        ], function () {
            Route::get('/home', 'HomeAdminController@index')->name('adminHome');

            Route::resource('/users', 'UserController');

            Route::resource('/categories', 'CategoryController');

            Route::resource('/subcategories', 'SubcategoryController');

            Route::resource('/products', 'ProductController');

            Route::resource('/orders', 'OrderController');

            Route::resource('/features', 'FeatureController');

            Route::resource('/messages', 'MessageController');

            Route::resource('/requisites', 'RequisiteController');
        });

    });

});



Route::group([
    'middleware' => 'set_locale',
], function () {
    Route::group([
        'prefix' => 'basket',
    ], function () {
        Route::post('/add/{product_id}', 'BasketController@basketAdd')->name('basketAdd');

        Route::get('/', 'BasketController@basket')->name('basket');

        Route::post('/remove/{product_id}', 'BasketController@basketRemove')->name('basketRemove');

        Route::get('/check', 'BasketController@orderCheck')->name('orderCheck');

        Route::post('/confirm', 'BasketController@orderConfirm')->name('orderConfirm');
    });

    Auth::routes([
        'reset' => false,
        'confirm' => false,
        'verify' => false,
    ]);

    Route::get('locale/{locale}', 'PageController@changeLocale')->name('locale');

    Route::get('/', 'PageController@main')->name('main');

    Route::get('/dostavka-i-oplata', 'PageController@delivery')->name('delivery');

    Route::get('/contacts', 'PageController@contacts')->name('contacts');

    Route::post('/search', 'PageController@search')->name('search');

    Route::get('/{category_slug}', 'CategoryController@showCategory')->name('showCategory');

    Route::get('/price-up/{category_slug}', 'CategoryController@showCategoryByPriceUp')->name('showCategoryByPriceUp');

    Route::get('/price-down/{category_slug}', 'CategoryController@showCategoryByPriceDown')->name('showCategoryByPriceDown');

    Route::get('/name-a/{category_slug}', 'CategoryController@showCategoryByNameA')->name('showCategoryByNameA');

    Route::get('/name-z/{category_slug}', 'CategoryController@showCategoryByNameZ')->name('showCategoryByNameZ');

    Route::get('/{category_slug}/{subcategory_slug}', 'SubcategoryController@showSubcategory')->name('showSubcategory');

    Route::get('/price-up/{category_slug}/{subcategory_slug}', 'SubcategoryController@showSubcategoryByPriceUp')->name('showSubcategoryByPriceUp');

    Route::get('/price-down/{category_slug}/{subcategory_slug}', 'SubcategoryController@showSubcategoryByPriceDown')->name('showSubcategoryByPriceDown');

    Route::get('/name-a/{category_slug}/{subcategory_slug}', 'SubcategoryController@showSubcategoryByNameA')->name('showSubcategoryByNameA');

    Route::get('/name-z/{category_slug}/{subcategory_slug}', 'SubcategoryController@showSubcategoryByNameZ')->name('showSubcategoryByNameZ');

    Route::get('/{category_slug}/{subcategory_slug}/{product_slug}', 'ProductController@showProduct')->name('showProduct');
});



