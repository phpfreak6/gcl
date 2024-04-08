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

/////////////////////////Backend Routes////////////////////////
// Authentication Routes...
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('do_login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('do_register');
Route::get('organization', 'Auth\RegisterController@showOrganizationForm')->name('add_organization');
Route::post('organization', 'Auth\RegisterController@organization')->name('save_organization');
Route::get('contactdetails', 'Auth\RegisterController@showContactForm')->name('add_contact');
Route::post('contact', 'Auth\RegisterController@contact')->name('save_contact');
Route::get('thankyou', function () {
    return view('auth.success');
})->name('thankyou');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', 'HomeController@index')->name('home');   
    Route::get('/', 'GetQuoteController@index')->name('home');

    // User Routes...
    Route::resource('users', 'UserController')->middleware(['can:users']);
    Route::group(['prefix' => 'users'], function () {
        Route::get('/{id}/profile', 'UserController@user_profile')->name('users.user_profile');
        Route::put('/{id}/profile', 'UserController@update_user_profile')->name('users.update_user_profile');
    });

    // Get Quote Routes...
    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/', 'GetQuoteController@index')->name('quotes');
        Route::post('/get-quote', 'GetQuoteController@getQuote')->name('quote.get');
        Route::get('/get-quote', 'GetQuoteController@getQuote')->name('quote.display');
        // Route::post('/get-pallet-quote', 'GetQuoteController@getPalletQuote')->name('quote.palletQuote');
        Route::get('/quote-result', 'GetQuoteController@showResult')->name('quote.result');
        Route::post('/quote/generate-label', 'GetQuoteController@generateLabel');
        Route::post('/quote/generate-summary', 'GetQuoteController@generateQuoteSummary')->name('quote.summary');
        Route::get('/quote/generate-summary', 'GetQuoteController@getQuote')->name('quote.summary');

        Route::get('/quote/get-address', 'GetQuoteController@getQuote')->name('quote.getAddress');
        Route::post('/quote/get-address', 'GetQuoteController@getAddress')->name('quote.getAddress');
        Route::get('/quote/edit-booking', 'GetQuoteController@editBookingView')->name('quote.editBookingView');
        Route::post('/quote/save-booking', 'GetQuoteController@saveBooking')->name('quote.saveBooking');
        Route::post('edit-booking', 'GetQuoteController@editBookingView')->name('quote.editBooking');

        Route::get('/quote/get-label', 'GetQuoteController@getLabel')->name('quote.getLabel');

        Route::get('/postcode/{postcode}', 'GetQuoteController@getPostCode')->name('quote.getPostCode');
    });
    Route::group(['prefix' => 'bookings'], function () {
        Route::get('/', 'BookingController@index')->name('bookings');
    });
    Route::group(['prefix' => 'couriers'], function () {
        Route::get('/add', 'ParentCourierController@showForm')->name('couriers.add');
        Route::get('/add/{id}', 'ParentCourierController@showForm')->name('couriers.edit');
        Route::get('', 'ParentCourierController@index')->name('couriers.index');
        Route::post('', 'ParentCourierController@store')->name('couriers.store');
        Route::get('/{courier}', 'ParentCourierController@show')->name('couriers.show');
        Route::put('/{courier}', 'ParentCourierController@update')->name('couriers.update');
        Route::delete('/{courier}', 'ParentCourierController@destroy')->name('couriers.destroy');
    });
    Route::group(['prefix' => 'courier-services'], function () {
        Route::get('/add', 'CouriersController@create')->name('courier-services.add');
        Route::get('/edit/{id}', 'CouriersController@edit')->name('courier-services.edit');
        Route::get('/{id?}', 'CouriersController@index')->name('courier-services.index');
        Route::post('', 'CouriersController@store')->name('courier-services.store');
        Route::get('/{courier}', 'CouriersController@show')->name('courier-services.show');
        Route::put('/{courier}', 'CouriersController@update')->name('courier-services.update');
        Route::delete('/{courier}', 'CouriersController@destroy')->name('courier-services.destroy');
    });

    // Pickup Routes....
    Route::resource('pickups', 'PickupController')->middleware(['can:pickups']);

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/', 'ReportController@index')->name('report');
        Route::get('/change/{period}', 'ReportController@change')->name('report.change');
    });
});
