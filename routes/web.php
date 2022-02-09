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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);


Route::middleware('auth')->group(function () {

    Route::group([
        'namespace' => 'User',
        'prefix' => 'user',
    ], function () {
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
        });

    });

});

Route::group([
    'middleware' => 'set_locale',
], function () {
    Route::get('locale/{locale}', 'PageController@changeLocale')->name('locale');

    Route::get('/', 'PageController@main')->name('main');

    Route::get('/{category_slug}', 'CategoryController@showCategory')->name('showCategory');

    Route::get('/{category_slug}/{subcategory_slug}', 'SubcategoryController@showSubcategory')->name('showSubcategory');

    Route::get('/{category_slug}/{subcategory_slug}/{product_slug}', 'ProductController@showProduct')->name('showProduct');
});


