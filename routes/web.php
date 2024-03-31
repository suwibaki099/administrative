<?php

use App\Models\files_request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\files_requestController;
use App\Http\Controllers\UserController;

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
// show_table - Show document table
// show_contract - Show contract table
// create - Show form to create new file
// store - Store new file
// edit - Show form to edit file
// update - Update file
// destroy - Delete file

Route::group(['middleware' => 'prevent-back-history'], function () {

    // show login page
    Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

    // Log In User
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);

    // logout
    Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

    // home page
    Route::get('/', [files_requestController::class, 'index'])->middleware('auth');

    // document management
    Route::get('/document-management', [files_requestController::class, 'document'])->middleware('auth');

    // upload file
    Route::post('/upload', [files_requestController::class, 'uploadFile'])->middleware('auth');

    // files management for every department.
    Route::get('/files/{department}', [files_requestController::class, 'show'])->middleware('auth');

    // contract management
    Route::get('/legal-contract', [files_requestController::class, 'show_contract'])->middleware('auth');

    // Create contract and store the data.
    Route::post('/contract', [files_requestController::class, 'store'])->middleware('auth');

    // document request management
    Route::get('/document-request', [files_requestController::class, 'document_table'])->middleware('auth');

    // download the document from public
    Route::get('/assets/{id}/{file_name}', [files_requestController::class, 'downloadFile'])->middleware('auth');

    // download the document from public storage
    Route::get('/upload/{file_name}', [files_requestController::class, 'storageDownloadFile'])->middleware('auth');

    // archive the documents
    Route::get('/archive', [files_requestController::class, 'searchArchive']);
    Route::get('/archive/{id}', [files_requestController::class, 'archiveDocument'])->middleware('auth');

    // un-archive the archived documents 
    Route::get('/unarchive/{id}', [files_requestController::class, 'un_archive'])->middleware('auth');

    // send the documents to another server using ftp
    Route::post('/send', [files_requestController::class, 'send'])->middleware('auth');

    // reject the request for document and contract
    Route::post('/rejected', [files_requestController::class, 'rejected'])->middleware('auth');

    // test
    Route::get('/test', [files_requestController::class, 'test']);
}); // prevent back middleware
