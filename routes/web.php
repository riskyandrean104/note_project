<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteTakingController;
use App\Models\company;
use Illuminate\Support\Str;
use App\Http\Controllers\CompanyController;

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

Route::get('/', function(){
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/notes', [NoteTakingController::class, 'index']);

Route::get('company/{company:company_name}', function (Company $company) {
    return view('notes', [
        'title' => $company->name ,
        'note_taking' => $company->note_taking->load('company', 'user'),
    ]);
});

Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/about', function(){
    return view('about', [
        "title" => "About"
    ]);
});