<?php

namespace App\Http\Controllers;

use App\Models\files_request;
use Illuminate\Http\Request;

class files_requestController extends Controller
{
    // show the reports
    public function index()
    {
        $files = files_request::all();
        $documents_count = 0;

        foreach ($files as $file) {
            $documents_count++;
        }

        return view('index', [
            'documents' => $documents_count
        ]);
    }

    // show all files or document
    public function document()
    {
        return view('document', [
            'files' => files_request::latest()->filter(request(['search']))->get()
        ]);
    }

    // show single files
    public function show($department)
    {
        $files = files_request::where('department', $department)->first();

        if ($files) {
            return view('files', [
                'files' => $files
            ]);
        } else {
            abort('404');
        }
    }

    // show contract table
    public function show_contract() {
        return view('legalcontract');
    }

    // show document table
    public function document_table(){
        return view('document-request');
    }
}
