<?php

use App\Models\Post;
use App\Models\company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DetailNoteController;
use App\Http\Controllers\AddContactsController;

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

Route::resource('/contact', AddContactsController::class)->middleware('auth');
Route::resource('/contacts', ContactsController::class)->middleware('auth');
Route::resource('/detail_note', DetailNoteController::class)->middleware('auth');