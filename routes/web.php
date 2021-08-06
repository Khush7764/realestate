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
/* =============== Customer routes start =============== */

// Property routes
Route::get('/', 'PropertyController@home')->name('home');
Route::get('property', 'PropertyController@propertyList')->name('propertyList');
Route::post('property', 'PropertyController@propertyListPost')->name('propertyListPost');
Route::get('property/{id}', 'PropertyController@propertyDetails')->name('propertyDetails');
Route::post('property/enquiry', 'EnquiryController@enquiry')->name('property.enquiry');

// Profile routes
Route::get('profile', 'LoginController@userProfile')->name('profile')->middleware('auth');
Route::patch('profile', 'LoginController@profile')->name('profile')->middleware('auth');
Route::get('changepassword', 'LoginController@userChangePassword')->name('userChangePassword')->middleware('auth');
Route::patch('changepassword', 'LoginController@changePassword')->name('userChangePassword')->middleware('auth');
/* =============== Customer routes end =============== */

/* =============== Common route start =============== */

// register routes
Route::get('register', 'LoginController@registerPage')->name('register');
Route::post('register', 'LoginController@register')->name('register');
Route::get('email/verify/{id}', 'LoginController@verify')->name('verification.verify');

// login routes
Route::get('login', 'LoginController@loginPage')->name('login');
Route::post('login', 'LoginController@login')->name('login');

// logout routes
Route::get('logout', 'LoginController@logout')->name('logout')->middleware('auth');
/* =============== Common route end =============== */

/* =============== Admin routes start =============== */
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Profile start
    Route::view('profile', 'admin.profile')->name('profile');
    Route::patch('profile', 'LoginController@profile')->name('profile');
    Route::patch('change-password', 'LoginController@changePassword')->name('changepassword');
    // Profile end

    // Property routes start
    Route::post('property/propertyDT', 'PropertyController@propertyDT')->name('property.propertyDT');
    Route::resource('property', 'PropertyController')->except(['create', 'store']);
    // Property routes end

    // Enquiry/message routes start
    Route::get('enquiry', 'EnquiryController@index')->name('enquiry.index');
    Route::post('enquiry/enquiryDT', 'EnquiryController@enquiryDT')->name('enquiry.enquiryDT');
});
/* =============== Admin routes end =============== */
