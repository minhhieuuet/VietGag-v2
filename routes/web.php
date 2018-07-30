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
	use App\User;
	use App\Notifications\UserNotification;



	Route::get('/', 'homeController@index');
	Route::get('hot', 'homeController@index');

	Route::get('new', 'homeController@new');
	Route::get('category/{id}','homeController@category');
	Route::get('post/{id}','postViewController@index');
	Route::get('prev/{id}','postViewController@getPrev');
	// Search
	Route::get('search','searchController@index');	
	// Login logout

	Route::get('user/login', [ 'as' => 'login', 'uses' =>'homeController@login']);
	Route::post('loginPost','homeController@loginPost')->name('loginPost');
	Route::get('register','homeController@register');
	Route::post('register','homeController@registerPost')->name('register');
	Route::get('logout','HomeController@logout')->name('userLogout');
	// User Upload 
	Route::resource('upload','userUploadController')->middleware('auth');
	//Comment
	Route::resource('comment','commentController');
	//Api
	Route::resource('api','apiController');

	// ajax
	Route::post('checkemail','homeController@emailCheck');
	// User notification
		Route::get('markAsReadNotification',function(){
			Auth::user()->unreadNotifications->markAsRead();
		});
// Admin
Route::get('admin/login','adminLoginController@index');
Route::post('admin/login','adminLoginController@authLogin');	
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
		// Dashboard
		Route::get('/','dashboardController@index');
		// User profile
		Route::resource('profile','profileController');
		// approve user post
		Route::resource('approve','approveController');
		Route::get('accept/{id}','approveController@accept');
		
		// Table list
		Route::group(['prefix'=>'table'],function(){
		Route::resource('post','postsController');
		Route::resource('category','categoriesController');
		
		});
		// User
		Route::resource('user','userListController');

		// Notification
		Route::get('markAsReadNotification',function(){
			Auth::user()->unreadNotifications->markAsRead();
		});
		//Admin logout
		Route::get('logout',function(){
			return redirect('')->with(Auth::logout());
		})->name('logout');
	

});	


Route::get('/home', 'HomeController@index')->name('home');
