<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Carbon\Carbon;
use App\Models\contract;
use Illuminate\Http\Request;
use App\Models\files_request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Contract_request;
use App\Models\Document_request;

class files_requestController extends Controller
{
    // show the reports
    public function index()
    {
        // contract request counts
        $document_counts = files_request::all()->count();
        $contract_counts = contract::all()->count();
        $request_count = Contract_request::all()->count();

        $pending_count = Contract_request::where('status', 'pending')->get()->count();
        $approve_count = Contract_request::where('status', 'approve')->get()->count();
        $rejected_count = Contract_request::where('status', 'rejected')->get()->count();
        // end of document count

        // document request counts
        $pending_document = Document_request::where('status', 'pending')->get()->count();
        $approve_document = Document_request::where('status', 'approve')->get()->count();
        $rejected_document = Document_request::where('status', 'rejected')->get()->count();

        return view('index', [
            'documents' => $document_counts,
            'contract' => $contract_counts,
            'request' => $request_count,
            'pending' => $pending_count + $pending_document,
            'approve' => $approve_count + $approve_document,
            'rejected' => $rejected_count + $rejected_document
        ]);
    }

    // show all files or search for a specific one
    public function document()
    {
        return view('document', [
            'files' => files_request::latest()->filter(request(['search']))->get()
        ]);
    }

    // show single files
    public function show($department)
    {
        if ($department) {
            return view('files', [
                'files' => files_request::latest()->filter([$department])->get()
            ]);
        } else {
            return view('files', [
                'files' => files_request::latest()->filter(request(['search2']))->get()
            ]);
        }


        // if ($files) {
        //     return view('files', [
        //         'files' => $files
        //     ]);
        // } else {
        //     abort('404');
        // }
    }

    // show contract table
    public function show_contract()
    {
        return view('legalcontract', [
            'request' => Contract_request::all()
        ]);
    }

    // show document table
    public function document_table()
    {
        return view('document-request', [
            'request' => Document_request::all()
        ]);
    }

    // store the new contract to database
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email_address' => ['required', 'email'],
            'birth_date' => 'required',
            'company' => 'required',
            'header' => 'required',
            'witness' => 'required',
            'content' => 'required'
        ]);

        // generate the contract
        $dt = Carbon::now();

        $templateProcessor = new TemplateProcessor(asset('assets/contract-template/COE-Sample.docx'));
        $templateProcessor->setValue('title', $request->header);
        $templateProcessor->setValue('day', $dt->format('d'));
        $templateProcessor->setValue('month', $dt->format('m'));
        $templateProcessor->setValue('year', $dt->format('Y'));
        $templateProcessor->setValue('number', $request->phone_number);
        $templateProcessor->setValue('content', $request->content);
        $templateProcessor->setValue('employer', 'John Paul Gimena Caballes');
        $templateProcessor->setValue('witness', $request->witness);
        $templateProcessor->setValue('employee',  $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name);
        $templateProcessor->saveAs('assets/contract/' . $request->header . '.docx');
        // end of generating the contract. ' '. ' '

        contract::create($formFields);

        // store the value in files_request
        files_request::create(
            [
                'department' => 'Administrative',
                'extension' => 'docx',
                'name' => $request->header . '.docx',
                'size' => 21234,
                'relative_time' => time()
            ]
        );

        return redirect('/legal-contract')->with('success', 'Contract  has been created!');
    }

    // upload file
    public  function uploadFile(Request $request)
    {
        if ($request->hasFile('file') && $request->department != 'None') {

            files_request::create(
                [
                    'department' =>  $request->department,
                    'file' => $request->file('file')->store('upload', 'public'),
                    'extension' => $request->file('file')->getClientOriginalExtension(),
                    'name' => $request->file('file')->getClientOriginalName(),
                    'size' => $request->file('file')->getSize(),
                    'relative_time' => time()
                ]
            );
            return redirect('/document-management')->with('success', 'Contract has been created!');
        }

        return redirect('/document-management')->with('error', 'field is empty or department selected is None!');
    }

    // download the file or open from public storage and update the relative_time
    public function storageDownloadFile($file_name)
    {
        $file = files_request::where('file', 'upload/' . $file_name)->first();
        $file->relative_time = time();
        $file->save();

        return redirect('/storage/upload/' . $file_name);
    }

    // download the file or open it from public.
    public function downloadFile($id, $file_name)
    {
        $file = files_request::where('id', $id)->first();
        $file->relative_time = time();
        $file->save();

        return redirect('/assets/contract/' . $file_name);
    }

    // archive the documment
    public function archiveDocument($id)
    {
        $record = files_request::find($id);

        // store the data to archive table
        Archive::create(
            [
                'department' => $record->department,
                'file' => $record->file,
                'extension' => $record->extension,
                'name' => $record->name,
                'size' => $record->size,
                'relative_time' => $record->relative_time
            ]
        );

        if ($record) {
            // Delete the record from files_request
            $record->delete();
        }

        return redirect(
            'archive'
        )->with('success', 'Archive has been created!');
    }

    // search archive or show archive
    public function searchArchive()
    {
        return view(
            "archive",
            [
                'files' => Archive::latest()->filter(request(['search']))->get()
            ]
        );
    }

    // un-archive the documents
    public function un_archive($id)
    {
        $record = Archive::find($id);

        // store the data to archive table
        files_request::create(
            [
                'department' => $record->department,
                'file' => $record->file,
                'extension' => $record->extension,
                'name' => $record->name,
                'size' => $record->size,
                'relative_time' => $record->relative_time
            ]
        );

        if ($record) {
            // Delete the record from archive
            $record->delete();
        }

        return redirect('archive')->with('success', 'Unarchive Successfully!');
    }

    // test
    public function test()
    {
        return 'done!';
    }
}
