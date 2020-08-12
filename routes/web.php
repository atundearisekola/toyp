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

Route::get('/', ['uses'=>'IndexedController@ShowIndex', 
  'as' => 'welcome']);
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('/gallery', ['uses'=>'IndexedController@ShowGallery', 
  'as' => 'gallery']);
Route::get('/gala/night', ['uses'=>'IndexedController@ShowGala', 
  'as' => 'gala']);
Route::get('/about', ['uses'=>'IndexedController@ShowAbout', 
  'as' => 'about']);
    
 Route::post('extract/nominees', ['uses'=>'AdminController@ExtractToCVS', 
  'as' => 'extract.nominee']);
Route::get('admin/view/user/{id}', ['uses'=>'AdminController@ShowUser',
  'as' => 'admin.user']);
Route::get('new/nominees', ['uses'=>'AdminController@ShowNominees', 
  'as' => 'admin.nominee']);
 Route::post('new/nominees', ['uses'=>'AdminController@DisplayNominees', 
  'as' => 'new.nominee']);
 Route::get('active/nominees', ['uses'=>'AdminController@ShowActiveNominees', 
  'as' => 'active.nominee']);
 Route::post('active/ominees', ['uses'=>'AdminController@DisplayActiveNominees', 
  'as' => 'display.activenominee']);
Route::get('admin/category', ['uses'=>'AdminController@ShowCategory', 
	'as' => 'category']);
Route::post('admin/addcategory', ['uses'=>'AdminController@AddCategory',
            'as' => 'add.cate']);
 Route::get('delete/category/{id}', ['uses'=>'AdminController@DeleteCategory',
  'as' => 'delete.cate']);
 Route::post('admin/update', ['uses'=>'AdminController@UpdateCategory',
            'as' => 'update.cate']);
 Route::post('nominate/nominee', ['uses'=>'IndexedController@Nominate',
            'as' => 'nominate']);
 Route::get('set/time', ['uses'=>'AdminController@ShowTimer', 
  'as' => 'timer']);
 Route::post('update/event', ['uses'=>'AdminController@SetEvent',
            'as' => 'settime']);
 Route::post('set/time', ['uses'=>'AdminController@UpdateEvent',
            'as' => 'update.time']);
  Route::get('delete/event/{id}', ['uses'=>'AdminController@DeleteEvent',
  'as' => 'delete.event']);
  Route::get('activate/event/{id}', ['uses'=>'AdminController@ActivateEvent',
  'as' => 'activate.event']);
 Route::get('view/nominees', ['uses'=>'IndexedController@ShowNominees', 
  'as' => 'nominee']);
 Route::post('view/nominees', ['uses'=>'IndexedController@DisplayNominees', 
  'as' => 'view.nominee']);
 Route::get('view/user/{id}', ['uses'=>'IndexedController@ShowUser',
  'as' => 'user']);
 Route::get('past/honories', ['uses'=>'IndexedController@ShowPastHonories', 
  'as' => 'honories']);
  Route::post('past/honories', ['uses'=>'IndexedController@DisplayPastHonories', 
  'as' => 'view.honories']);
  Route::post('honor/nominee', ['uses'=>'AdminController@HonorNominee', 
  'as' => 'honor.nominee']);
  Route::get('confirm/user/{id}', ['uses'=>'AdminController@ConfirmUser',
  'as' => 'confirm.user']);
   Route::get('remove/user/{id}', ['uses'=>'AdminController@RemoveUser',
  'as' => 'remove.user']);
    Route::post('vote/nominees', ['uses'=>'IndexedController@VoteNominees', 
  'as' => 'vote.nominee']);
    Route::post('add/gallery', ['uses'=>'AdminController@AddGallery',
            'as' => 'add.gallery']);
    Route::get('remove/gallery/{id}', ['uses'=>'AdminController@RemoveGallery',
  'as' => 'remove.gallery']);
    Route::get('admin/gallery', ['uses'=>'AdminController@ShowGallery', 
  'as' => 'show.gallery']);
    Route::post('contact/admin', ['uses'=>'IndexedController@Contact', 
  'as' => 'contactmail']);

     Route::post('active/nominees', ['uses'=>'AdminController@DisplayPastActiveNominees', 
  'as' => 'display.activepnominee']);






           

         



Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('adminlogin');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/admin/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('adminregister');
  Route::post('/register', 'AdminAuth\RegisterController@register');
  Route::get('/branch/register', 'BranchadminAuth\RegisterController@showRegistrationForm')->name('pickerregister');
  Route::post('/branch/register', 'BranchadminAuth\RegisterController@register');


  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('adminpassword.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('adminpassword.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('adminpassword.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  
});




