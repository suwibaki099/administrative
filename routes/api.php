<?php

use App\Models\Contract_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// api for document request
Route::get('/docu_request', function (Request $request_document) {
    return response()->json([
        "department" => $request_document->department,
        "name" => $request_document->name,
        "timestamp" => time(),
        "document_name" => $request_document->document_name
    ]);
});

// api for contract request
Route::get('/contract_request', function (Request $request_contract) {

    if ($request_contract->content && $request_contract->department && $request_contract->name && $request_contract->contract_name) {
        //create a table in database
        Contract_request::create([
            "department" => $request_contract->department,
            "name" => $request_contract->name,
            "timestamp" => time(),
            "status" => 'pending',
            "contract_name" => $request_contract->contract_name,
            "content" => $request_contract->content
        ]);

        return response()->json([
            "department" => $request_contract->department,
            "name" => $request_contract->name,
            "timestamp" => time(),
            "contract_name" => $request_contract->contract_name,
            "content" => $request_contract->content
        ]);
    }

    return response()->json([
        "message" => 'Error!',
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
