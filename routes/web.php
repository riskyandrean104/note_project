<?php

use App\Models\Post;
use App\Models\company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AddCompanyController;
use App\Http\Controllers\NoteTakingController;
use App\Http\Controllers\AddContactsController;
use App\Http\Controllers\ContactPersonController;

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

Route::get('/', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/', [LoginController::Class, 'authenticate']);
Route::post('/logout', [LoginController::Class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/events', EventController::class)->middleware('auth');
Route::resource('/contact', AddContactsController::class)->middleware('auth');
Route::resource('/contacts', ContactPersonController::class)->middleware('auth');
Route::resource('/company', AddCompanyController::class)->middleware('auth');
Route::resource('/companies', CompanyController::class)->middleware('auth');
Route::resource('/notes', NoteTakingController::class)->middleware('auth');