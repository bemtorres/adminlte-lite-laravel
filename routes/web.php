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
    return view('home');
});
// Route::get('recuperar', function () {
//     return view('recuperar');
// });

// Route::get('login', function () {

//     return view('home');
// });
// Route::get('home', function () {
//     return view('home');
// });
// Route::get('perfil', function () {
//     return view('perfil');
// });

// Route::get('cambiarClave', function () {
//     return view('perfil-clave');
// });


// Route::get('usuarios', function () {
    
//     return view('listarUsuarios');
// });
Route::get('home', ['as' => 'cerrarSesion', function () {
    
    return view('index');
}]);