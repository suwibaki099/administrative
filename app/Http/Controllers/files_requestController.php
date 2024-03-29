<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\contract;
use Illuminate\Http\Request;
use App\Models\files_request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

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
        return view('legalcontract');
    }

    // show document table
    public function document_table()
    {
        return view('document-request');
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
                'size' => 'Unknown',
                'relative_time' => time()
            ]
        );

        return redirect('/legal-contract')->with('success', 'Contract  has been created!');
    }

    // download the file
    public function downloadFile($id, $file_name)
    {
        // files_request::create(
        //     [

        //     ]
        // );
        return 'test ' . $id . ' test ' . $file_name;
    }

    // test
    public function test()
    {
        // $phpWord = new PhpWord();
        // New section
        // $section = $phpWord->addSection();

        // $textrun = $section->addTextRun();
        // $textrun->addImage(asset('assets/images/user.jpg'));

        // $section->addText(
        //     '"Learn from yesterday, live for today, hope for tomorrow. '
        //         . 'The important thing is not to stop questioning." '
        //         . '(Albert Einstein)'
        // );


        $templateProcessor = new TemplateProcessor(asset('assets/contract-template/COE-Sample.docx'));
        $templateProcessor->setValue('title', 'Example');
        $templateProcessor->setValue('day', '28');
        $templateProcessor->setValue('month', '03');
        $templateProcessor->setValue('year', '2024');
        $templateProcessor->setValue('content', 'niorererererrrrrrrrrrrrrrrrrrrrrrrr');
        $templateProcessor->setValue('employer', 'jandy erick gulpe');
        $templateProcessor->setValue('employee', 'mark angelo gulpe');
        $templateProcessor->saveAs('assets/contract-template/test.docx');
        // $templateProcessor->saveAs(asset('storage\testfile.docx'));

        // $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        // $objWriter->save(storage_path('app/public'));
        // $objWriter->save('test.docx');

        return 'done!';
    }
}
