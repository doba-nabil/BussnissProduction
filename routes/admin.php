<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
/*******************************************************/
View::creator('backend.layout.navbar', function ($view) {
//    $view->with('eventcount' , \App\Models\Event::count());
});
View::creator('backend.layout.header', function ($view) {
});
/*************** backend routes *************/
Route::get('admin/login', 'Admin\AdminauthController@showLoginFrom')->name('backendLogin');
Route::post('admin/login', 'Admin\AdminauthController@login');
Route::get('admin', 'Admin\AdminauthController@showLoginFrom');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:moderator'], function () {
    /****************** auth routes ****************/
    Route::get('/', 'AdminController@index')->name('backend-home');
    /***********  normal-users route ***********/
    Route::resource('users', 'UserController', ['except' => ['show']]);
    Route::delete('delete_users', 'UserController@delete_users')->name('delete_users');
    /***********  sellers route ***********/
    Route::resource('sellerss', 'SellerController', ['except' => ['show']]);
    Route::delete('delete_sellerss', 'SellerController@delete_sellerss')->name('delete_sellerss');
    /***********  clients route ***********/
    Route::resource('clients', 'ClientController', ['except' => ['show']]);
    Route::delete('delete_clients', 'ClientController@delete_clients')->name('delete_clients');
    /***********  branches route ***********/
    Route::resource('branches', 'BranchController', ['except' => ['show']]);
    Route::delete('delete_branches', 'BranchController@delete_branches')->name('delete_branches');
    /***********  products route ***********/
    Route::resource('productss', 'ProductController', ['except' => ['show']]);
    Route::delete('delete_prodectss', 'ProductController@delete_prodectss')->name('delete_prodectss');
    /***********  service route ***********/
    Route::resource('servicess', 'ServiceController', ['except' => ['show']]);
    Route::delete('delete_servicess', 'ServiceController@delete_servicess')->name('delete_servicess');
    /***********  request route ***********/
    Route::resource('requestss', 'RequestController', ['except' => ['show']]);
    Route::delete('delete_requestss', 'RequestController@delete_requestss')->name('delete_requestss');
    /***********  job route ***********/
    Route::resource('jobss', 'JobController', ['except' => ['show']]);
    Route::delete('delete_jobss', 'JobController@delete_jobss')->name('delete_jobss');
    /***********  categry route ***********/
    Route::resource('categories', 'CategoryController', ['except' => ['show']]);
    Route::delete('delete_categories', 'CategoryController@delete_categories')->name('delete_categories');
    /***********  subcategry route ***********/
    Route::resource('subcategories', 'SubcategoryController', ['except' => ['show']]);
    Route::delete('delete_subcategories', 'SubcategoryController@delete_categories')->name('delete_subcategories');
    /***********  brands route ***********/
    Route::resource('brands', 'BrandController', ['except' => ['show']]);
    Route::delete('delete_brands', 'BrandController@delete_brands')->name('delete_brands');
    /***********  brands route ***********/
    Route::resource('tags', 'TagController', ['except' => ['show']]);
    Route::delete('delete_tags', 'TagController@delete_tags')->name('delete_tags');
    /***********  countries route ***********/
    Route::resource('countries', 'CountryController', ['except' => ['show']]);
    Route::delete('delete_countries', 'CountryController@delete_countries')->name('delete_countries');
    /***********  states route ***********/
    Route::resource('states', 'StateController', ['except' => ['show']]);
    Route::delete('delete_states', 'StateController@delete_states')->name('delete_states');
    /***********  states route ***********/
    Route::resource('cities', 'CityController', ['except' => ['show']]);
    Route::delete('delete_cities', 'CityController@delete_cities')->name('delete_cities');
    /***********  sliders route ***********/
    Route::resource('sliders', 'SliderController', ['except' => ['show']]);
    Route::delete('delete_sliders', 'SliderController@delete_sliders')->name('delete_sliders');
    /***********  zones route ***********/
    Route::resource('zones', 'IndustrialController', ['except' => ['show']]);
    Route::delete('delete_zones', 'IndustrialController@delete_zones')->name('delete_zones');
    /***********  attributes route ***********/
    Route::resource('attributes', 'AttributeController', ['except' => ['show']]);
    Route::delete('delete_attributes', 'AttributeController@delete_attributes')->name('delete_attributes');
    /***********  attributes route ***********/
    Route::resource('attr_values', 'AttributeValueController', ['except' => ['show']]);
    Route::delete('delete_attr_values', 'AttributeValueController@delete_attr_values')->name('delete_attr_values');
    /********** app settings / options ***********/
    Route::get('settings', 'OptionController@edit')->name('settings_page');
    Route::patch('settings_edit', 'OptionController@update')->name('settings_form');
    /********** amoderators***********/
    Route::resource('moderators', 'ModeratorController', ['except' => ['show']]);
    Route::resource('roles','RoleController');
});
/************* ajax select routes ******************/
Route::get('/ajax-states', 'Admin\AdminController@getStates');
Route::get('/ajax-cities', 'Admin\AdminController@getCities');
Route::get('/ajax-subcats', 'Admin\AdminController@getSubcats');
Route::get('/ajax-subsubcats', 'Admin\AdminController@getSubSubcats');
Route::get('/ajax-attributevalues', 'Admin\AdminController@attributevalues');
Route::post('read', 'Admin\AdminController@readNotification');



