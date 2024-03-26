<?php

use App\Http\Controllers\files_requestController;
use App\Models\files_request;
use Illuminate\Support\Facades\Route;

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

// Common Resource Routes:
// index - Show all files
// show - Show single file
// create - Show form to create new file
// store - Store new file
// edit - Show form to edit file
// update - Update file
// destroy - Delete file


// home page
Route::get('/', [files_requestController::class, 'index']);

// document management
Route::get('/document-management', [files_requestController::class, 'document']);

// files management for every department.
Route::get('/document-management/{department}', [files_requestController::class, 'show']);


Route::view('legalcontract', 'legalcontract')->name('legalcontract');
Route::view('reports', 'reports')->name('reports');
