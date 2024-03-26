@extends('layouts.master')

@section('title', 'Contracts')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Contracts Request</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Contracts</li>
@endsection

@section('breadcrumb-title')

@section('content')
<div class="container-fluid">
        <div class="row">
            <!-- HTML (DOM) sourced data  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                    <div class="file-content">
                 <div class="media">
                <div class="media-body text-end mb-4">
                    <div class="btn btn-primary" onclick="getFile()"> <i data-feather="plus-square"></i>Create Contract</div>
                    
                </div>
            </div>
          </div>
                            <table class="display" id="data-source-1" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Office</th>
                                        <th>CV</th>
                                        <th>Status</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>$320,800</td>
                                        <td>Edinburgh</td>
                                        <td class="action"> <a class="pdf" href="sample.pdf') }}" target="_blank"><i
                                                    class="icofont icofont-file-pdf"></i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>$170,750</td>
                                        <td>Tokyo</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>g.winters@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div></div></div>
                </div>
                </div>
            </div>
            <!-- HTML (DOM) sourced data  Ends-->
        </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>   
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">  
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>


@endsection


@section('script')
@endsection
