<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




//Route::get('customers', 'CustomerController@postCustomers');







Route::get('/', 'HomeController@index');

Route::get('user', function () {
    return view('auth.login');
});
 
    
Route::auth();

  
Route::resource('mail', 'MailController');

  Route::resource('user_register', 'RegisterController');
  
  Route::resource('customers', 'CustomerController');
  
  Route::resource('admin', 'AdminController');
  
  Route::resource('products', 'ProductsController');
         

Route::get('home', 'HomeController@index');

Route::resource('postal', 'postalscontroller');

    
    //Route::get('admin', ['middleware' => ['auth','admin'], 
    //'as' => 'admin', 'uses' => 'admincontroller@index']);
    
/*Route::get('admin', ['middleware' => ['auth', 'admin'], function() {
    
 
    return view('hello');
}]);
    
