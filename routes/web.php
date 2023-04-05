<?php

use App\Http\Controllers\datosController;
use App\Mail\Correo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
    // (new Correo('arturo resendiz', '24911725430', 'arturoresendiz@grupopabsacom', '29_anios', 'Ingenieria', 'wwwcvcom'))->render();
});


Route::post('/post', [datosController::class, 'post'])->name('rh');

