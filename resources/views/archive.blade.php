@php
    function time2str($ts)
    {
        if(!ctype_digit($ts))
            $ts = strtotime($ts);

        $diff = time() - $ts;
        if($diff == 0)
            return 'now';
        elseif($diff > 0)
        {
            $day_diff = floor($diff / 86400);
            if($day_diff == 0)
            {
                if($diff < 60) return 'just now';
                if($diff < 120) return '1 minute ago';
                if($diff < 3600) return floor($diff / 60) . ' minutes ago';
                if($diff < 7200) return '1 hour ago';
                if($diff < 86400) return floor($diff / 3600) . ' hours ago';
            }
            if($day_diff == 1) return 'Yesterday';
            if($day_diff < 7) return $day_diff . ' days ago';
            if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
            if($day_diff < 60) return 'last month';
            return date('F Y', $ts);
        }
        else
        {
            $diff = abs($diff);
            $day_diff = floor($diff / 86400);
            if($day_diff == 0)
            {
                if($diff < 120) return 'in a minute';
                if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
                if($diff < 7200) return 'in an hour';
                if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
            }
            if($day_diff == 1) return 'Tomorrow';
            if($day_diff < 4) return date('l', $ts);
            if($day_diff < 7 + (7 - date('w'))) return 'next week';
            if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
            if(date('n', $ts) == date('n') + 1) return 'next month';
            return date('F Y', $ts);
        }
    }

    function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('b', 'Kb', 'Mb', 'Gb', 'Tb');   

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
@endphp
@extends('layouts.master')

@section('title', 'Archive')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/sweetalert2.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Archive</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item"><a href="/document-management">Documents</a></li>
<li class="breadcrumb-item"><a href="javascript:void();">Archive</a></li>
@endsection

@section('breadcrumb-title')

@section('content')
<div class="container-fluid">
    <style>
      .remove {
        background: none;
        border: none;
        outline: none;
        box-shadow: none;
      }
  
      .dropdown-menu {
      }
      .dropdown-item {
        width: 40px;
      }
  
      .hov {
        font-size: 20px;
      }
      .hov:hover {
        color: #ff7569;
      }
    </style>
    <div class="row">
          {{-- alerts --}}
              @if (session()->has('success'))
              <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 alert alert-success dark alert-dismissible fade show" role="alert"><strong>Great ! </strong> {{session('success')}}
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
  
              @if (session()->has('error'))
              <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Error !...</strong> {{session('error')}}
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          {{--  end of alerts --}}
      <div class="col-xl-3 box-col-6 pe-0">
        <div class="file-sidebar">
          <div class="card">
            <div class="card-body">
              <ul>
                <li>
                  <a href="/document-management"><div class="btn btn-light"><i data-feather="folder"></i>All </div></a>
                </li>
                <li>
                  <a href="/files/Contract"><div class="btn btn-light"><i data-feather="folder"></i>Contract</div></a>
                </li>
                <li>
                  <div class="btn btn-primary"><i data-feather="archive"></i>archive</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-md-12 box-col-12">
        <div class="file-content">
          <div class="card min-vh-100">
            <div class="card-header">
              <div class="media">
                <form class="form-inline" action="/archive/" method="get">
                  <div class="form-group mb-0"> <i class="fa fa-search"></i>
                    <input class="form-control-plaintext" name="search" type="text" placeholder="Search...">
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body file-manager">
              <h4 class="mb-3">All Files</h4>
              <h6 class="mt-4">Files</h6>
              <ul class="files">
                {{-- display the files with information --}}
                @unless(count($files) == 0)
  
                @foreach ($files as $file)
                <li class="file-box index">
                  <div class="file-top"> 
                    <a data-bs-toggle="modal" data-bs-target="#tooltipmodal" type="button">
                        @if($file->extension == 'pdf')
                            <i class="fa fa-file-pdf-o txt-secondary"></i>
                        @elseif($file->extension == 'doc' || $file->extension == 'docx')
                            <i class="fa fa-file-word-o txt-info"></i>
                        @elseif($file->extension == 'xls' || $file->extension == 'xlsx')
                            <i class="fa fa-file-excel-o txt-success"></i>
                        {{-- Add more conditions for other file types --}}
                        @else
                            <i class="fa fa-file-text-o txt-primary"></i> {{-- Default icon for unknown file types --}}
                        @endif
                    </a>
                         <button class="fa fa-ellipsis-v f-14 ellips btn-round remove" data-bs-toggle="dropdown" type="button"></button>
                         <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/unarchive/{{$file->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Unarchive"><i class="fa fa-sign-out hov"></i></a></li>
                        </ul>
                    </div>
                  <div class="file-bottom">
                    <h6>{{ $file->name }}</h6>
                    <p class="mb-1"><b>size : </b>{{ formatBytes($file->size) }}</p>
                    <p> <b>department : </b>{{ $file->department }}</p>
                    <p> <b>last open : </b>{{ time2str($file->relative_time) }}</p>
                  </div>
                </li>
                @endforeach
  
                @else 
                <h5>No files</h5>
                @endunless
                {{-- end of display the files with information --}}
              </ul>
              {{-- modal --}}
              <div class="modal fade" id="tooltipmodal" tabindex="-1" role="dialog" aria-labelledby="tooltipmodal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-body">
                        <h2><center>Access Denied</center></h2>
                    </div>
                  </div>
                </div>
              </div>
      {{-- end of modal --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
@endsection