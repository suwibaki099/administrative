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

    // get the department name
      if($files){
          $department = "No Contract found";
        }
      foreach ($files as $file) {
          if ($file) {
            $department = $file->department;
            break;
          } 
        }
        
@endphp

@extends('layouts.master')

@section('title', $department . ' - Files')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{ $department }} - Files </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item"><a href="/document-management">Documents</a></li>
<li class="breadcrumb-item active">files</li>
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
      background-color: rgb(179, 170, 162);
    }

    .hov {
      font-size: 20px;
    }
    .hov:hover {
      color: #ff7569;
    }
  </style>
    <div class="row">
      <div class="col-xl-3 box-col-6 pe-0">
        <div class="file-sidebar">
          <div class="card">
            <div class="card-body">
              <ul>
                <li>
                    <a href="/document-management"><div class="btn btn-light"><i data-feather="folder"></i>All</div></a>
                </li>
                <li>
                  <div class="btn btn-primary"><i data-feather="folder"></i>Files</div>
                </li>
                <li>
                  <a href="/archive"><div class="btn btn-light"><i data-feather="archive"></i>archive</div></a>
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
                <div class="media-body text-end">
                  <button class="btn btn-outline-primary" type="submit" data-bs-toggle="modal" data-bs-target="#tooltipmodal"><i data-feather="upload"></i>Upload</button>
                </div>
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
                    <a @if(auth()->user()->role == 'Admin') href="{{ $file->file ? asset($file->file) : asset('assets/'. $file->id .'/'. $file->name .'') }}" target="_blank" @else data-bs-toggle="modal" data-bs-target="#accessDenied" type="button" @endif>
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
                          <li><a class="dropdown-item color" href="#"><i class="fa fa-send-o (alias) hov"></i></a></li>
                          <li><a class="dropdown-item" href="/archive/{{$file->id}}"><i class="fa fa-file-archive-o hov"></i></a></li>
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
                    <div class="modal-header">
                      <h5 class="modal-title">Upload File</h5>
                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Form for file upload -->
                      <form class="d-inline-flex" id="uploadForm" action="/upload" method="POST" enctype="multipart/form-data">
                          @csrf
                          <!-- Input for file selection -->
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-2">
                                  <label for="first_name" class="col-form-label text-md-right">Department</label>
                                  <select class="form-select form-control-info-fill" name="department" >
                                    <option value="Administrative" selected>{{$department}}</option>
                                  </select>
                              </div>
                              @error('department')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                              @enderror
                          </div>
                          <div class="col-12">
                            <div class="mb-2">
                                <label for="first_name" class="col-form-label text-md-right">File</label>
                                <input type="file" id="first_name" name="file" class="form-control" required="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather="upload"></i> Upload</button>
                          </div>
                          <!-- Button to submit the form -->
                      </form>
                  </div>
                </div>
              </div>
            </div>
    {{-- end of modal --}}
    {{-- modal for access dinied --}}
<div class="modal fade" id="accessDenied" tabindex="-1" role="dialog" aria-labelledby="tooltipmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
          <h2 style="color: red;"><center>Unauthorized!</center></h2>
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
@endsection