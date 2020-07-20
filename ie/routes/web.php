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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', "loginController@show_login_page")->name('login');
Route::post('/login', "loginController@my_login");
Route::get('/register', "loginController@show_register_page")->name('register');
Route::post('/register', "loginController@my_register");
Route::get('/forgot', "loginController@show_forgot_page")->name('forgot');
Route::get('/account', "loginController@show_account_page")->name('main');

Route::get('/add_commercial', "commercialController@show_add_commercial_page")->name('add_commercial');
Route::post('/commercial_cat_ajax', "commercialController@com_cat_ajax");
Route::post('/add_commercial', "commercialController@com_store")->name('add_commercial');
Route::get('/mycommercials', "commercialController@show_mycommercial_page")->name('show_my_com');
Route::post('/mycommercials', "commercialController@delete_com");
Route::get('/edit_commercial', 'commercialController@show_edit_form')->name('com-edit');
Route::post('/edit_commercial', 'commercialController@edit_com');

Route::get('/view_profile', 'userController@view_profile')->name('view_profile');
Route::get('/edit_profile', 'userController@edit_profile')->name('edit_profile');
Route::post('/edit_profile', 'userController@edit_me');
Route::get('/del_acc', 'userController@show_delete_account')->name('delete_account');
Route::post('/del_acc', 'userController@delete_the_account');
Route::get('/exit', 'userController@logout_me')->name('logout');

Route::get('/all_commercials', 'commercialController@commercials_of_people')->name('see_commercials');
Route::get('/commercial_view', 'commercialController@commercial_view')->name('com_view');
Route::post('/rate_increment', 'commercialController@rate_increment_ajax');

Route::get('/cmc_mngmt', "managmentController@index")->name('mgm_main');
Route::get('/cmc_categories', "managmentController@show_category_page")->name('mgm_category');
Route::get('/cmc_users', "managmentController@show_users_page")->name('mgm_users');
