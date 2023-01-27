<?php

use App\Models\Post;
use App\Models\company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DetailNoteController;
use App\Http\Controllers\NoteTakingController;
use App\Http\Controllers\FormInputNoteController;
use App\Http\Controllers\FormInputContactController;

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
Route::get('/form_notes', [NoteTakingController::class, 'create']);
Route::get('/form_notes/{id}/edit', [NoteTakingController::class, 'edit']);
Route::post('/', [LoginController::Class, 'authenticate']);
Route::post('/logout', [LoginController::Class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/contacts', [CompanyController::class, 'index']);
Route::get('/form_contacts', [CompanyController::class, 'create']);
Route::post('/form_contacts', [CompanyController::class, 'store']);


Route::resource('/detail_note', DetailNoteController::class);