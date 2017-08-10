<?php
  /*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
  */
  Route::get(
    '/', 'IndexController@index'
  );

  Route::get('auth/login', 'Auth\LoginController@showLoginForm');
  Route::post('auth/login', 'Auth\LoginController@authorize');
  Route::get('auth/logout', 'Auth\LoginController@logout');
  Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
  Route::post('auth/register', 'Auth\RegisterController@register');
  Auth::routes();
  Route::get('/home', 'HomeController@index');
  Route::get('movil/getMovile', 'MovilController@all');
  Route::post('home/search', ['as' => 'home/search', 'uses' => 'HomeController@buscar']);

  Route::group(
    ['middleware' => 'admin'], function (\Illuminate\Routing\Router $router){
    Route::get(
      'admin/profile', [
                       'middleware' => 'admin', function (){
                         return view('administrators.admin');

                       }]
    );

    Route::resource('movil', 'MovilController');
    Route::post('movil/add', 'MovilController@store');
    Route::post('movil/search', ['as' => 'movil/search', 'uses' => 'MovilController@buscar']);
    Route::post('user/update/{id}', 'UserController@updateUser');
    Route::get('user/edit/{id}',
                [
                  'uses'=>'UserController@editUser',
                  'as'=>'user.edit',
                ]);
    Route::get('user/delete/{id}',
               [
                 'uses'=>'UserController@deleteUser',
                 'as'=>'user.delete',
               ]);
  }
  );

  //rutas para el recurso movie

//una nueva ruta para eliminar registros con el metodo get
  Route::get('movil/destroy/{id}', ['as' => 'movil/destroy', 'uses' => 'MovilController@destroy']);
//ruta para realizar busqueda de registros.


