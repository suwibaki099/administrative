<?php

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

// home page
Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

Route::view('index', 'index')->name('index');

// document management
Route::get('/document-management', function() {
    return view('document', [
        'files' => files_request::all()
    ]);
});

Route::view('legalcontract', 'legalcontract')->name('legalcontract');
Route::view('reports', 'reports')->name('reports');
