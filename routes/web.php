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

// Route::get('/', function () {
//     return view('welcome');
// }); 

Auth::routes();

Route::get('/home', 'HomeController@index');
// Route::get('/home', 'HomeController@newSong');
Route::post('/submit-song', 'HomeController@submitSong');
Route::get('/update', 'HomeController@getUpdatePassword');
Route::post('/update', 'HomeController@postUpdatePassword');

 

Route::group(['middleware' => ['guest']], function(){
	
	Route::get('/', 'VideoController@welcome');
	Route::get('/songs', 'VideoController@lyrics');
	Route::get('/add-lyrics', 'EmailController@getSubmitSong');
	Route::post('/add-lyrics', 'EmailController@sendMail');
	Route::get('/artistes', 'VideoController@artisteBio');
	Route::get('/artiste/{slug}', 'VideoController@singleArtisteBio');
	Route::get('privacy', 'MainController@privacy');
	// Route::get('contact-us', 'MainController@contact');
	Route::get('about-us', 'MainController@about');

	Route::post('/queries',[
        'uses' => '\App\Http\Controllers\SearchController@search', 
        'as'   => 'queries.search',
    ]);

	/**
	* The URL is something like this without the artiste for singlesong
	*/
	Route::get('artiste/{slugName}/{slugSong}', 'VideoController@getSingleSong');

 // ADMIN
    Route::get('admin/login', 'Admin\Auth\LoginController@getLoginForm');
    Route::get('admin', 'Admin\Auth\LoginController@getLoginForm');
    Route::post('admin/authenticate', 'Admin\Auth\LoginController@authenticate');
    Route::post('admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');
  	Route::post('admin/password/reset', 'Admin\Auth\ResetPasswordController@reset');
    Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::get('admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');

});


Route::group(['middleware' => ['admin']], function(){


	Route::get('admin/home', function() {
		return view('admin.welcome');
	});

	Route::get('admin/password-update', 'Admin\AdminFrontController@getUpdatePassword');
	Route::post('admin/password-update', 'Admin\AdminFrontController@postUpdatePassword');

	Route::get('admin/new-artiste', 'ArtisteController@addArtiste');
	Route::post('admin/new-artiste', 'ArtisteController@postArtiste');
	Route::get('admin/submission', 'ArtisteController@getSubmission');
	Route::get('admin/artistes', 'ArtisteController@getArtiste');
	// Route::post('admin/newadminartiste', 'Admin\AdminFrontController@postArtiste');
	Route::get('admin/artistes/{id}', 'ArtisteController@getSingleArtiste');
	Route::get('admin/artiste/{id}', 'ArtisteController@editSingleArtiste');
	Route::post('admin/artiste/{id}', 'ArtisteController@updateSingleArtiste');

	Route::get('admin/approve-artiste', 'ApproveController@getApprove');
	Route::post('admin/approve-artiste', 'ApproveController@postApprove');
	Route::get('admin/approved-submission', 'ApproveController@getSubmission');

	/**
	*Add Program, Department and Faculty
	*/

	/**
	*	End of Adding New Members for Students and Staff.
	*/

    Route::post('admin/logout', 'Admin\Auth\LoginController@getLogout');

});