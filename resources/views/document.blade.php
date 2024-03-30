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

@section('title', 'Document')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>My Document </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Document</li>
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
                <a href="/document-management"><div class="btn btn-primary"><i data-feather="folder"></i>All </div></a>
              </li>
              <li>
                <a href="/files/Contract"><div class="btn btn-light"><i data-feather="folder"></i>Contract</div></a>
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
              <form class="form-inline" action="/document-management/" method="get">
                @csrf
                <div class="form-group mb-0"> <i class="fa fa-search"></i>
                  <input class="form-control-plaintext" name="search" type="text" placeholder="Search...">
                </div>
              </form>
              <div class="media-body text-end">
                <button class="btn btn-outline-primary" type="submit" data-bs-toggle="modal" data-bs-target="#tooltipmodal"><i data-feather="upload"></i>Upload</button>
              </div>
            </div>
          </div>
          <div class="card-body file-manager">
            <h4 class="mb-3">All Files</h4>
            <h6 class="mt-4">Folders</h6>
            <ul class="folder">
              {{-- display the folders --}}
              @unless (count($files) == 0)
                  @php
                      $duplicate_counter=array(); // -> array to store duplicate folder names or department names.

                      foreach ($files as $file) {
                          array_push($duplicate_counter, $file->department); // -> append the department names to array.
                      }
                      // print_r($duplicate_counter); -> can display the array with indeces
                      
                      $counted = array_count_values($duplicate_counter) // -> can count the duplicate 
                  @endphp

                  @foreach ($counted as $key => $value)
                      <li class="folder-box">
                        <div class="media">
                          <i class="fa fa-folder f-36 txt-warning"></i>
                            <div class="media-body ms-3 sidebar-title">
                             <h6 class="mb-0"><a href="/files/{{$key}}">{{ $key }}</a></h6>
                              <p>{{ $value }} files</p>
                            </div>
                        </div>
                      </li>
                  @endforeach
                  
                  @else
                  <h5>No folder</h5> {{-- default  message if there is no data in database --}}
              @endunless
              {{-- end of display the folders --}}
            </ul>
            <h6 class="mt-4">Files</h6>
            <ul class="files">
              {{-- display the files with information --}}
              @unless(count($files) == 0)

              @foreach ($files as $file)
              <li class="file-box index">
                <div class="file-top"> 
                  <a href="{{ $file->file ? asset($file->file) : asset('assets/'. $file->id .'/'. $file->name .'') }}" target="_blank">  {{-- test --}}
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
                        <li><a class="dropdown-item color" href="/test" data-bs-toggle="tooltip" data-bs-placement="top" title="Send to.."><i class="fa fa-send-o (alias) hov"></i></a></li>
                        <li><a class="dropdown-item" href="/archive/{{$file->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i class="fa fa-file-archive-o hov"></i></a></li>
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
                                  <select class="form-select form-control-info-fill" name="department">
                                    <option value="None">Select...</option>
                                    <option value="Administrative">Administrative</option>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/index.js') }}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/icons/icons-notify.js')}}"></script>
<script src="{{asset('assets/js/icons/icon-clipart.js')}}"></script>
@endsection