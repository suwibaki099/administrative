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
  <div class="row">
    <div class="col-xl-3 box-col-6 pe-0">
      <div class="file-sidebar">
        <div class="card">
          <div class="card-body">
            <ul>
              <li>
                <div class="btn btn-primary"><i data-feather="folder"></i>All </div>
              </li>
              <li>
                <a href="/files/Contract"><div class="btn btn-light"><i data-feather="folder"></i>Contract</div></a>
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
              <li class="file-box">
                <div class="file-top"> 
                  <a href="{{ asset('assets/'. $file->id .'/'. $file->name .'') }}" target="_blank">  {{-- test --}}
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
                  <i class="fa fa-ellipsis-v f-14 ellips"></i></div>
                <div class="file-bottom">
                  <h6>{{ $file->name }}</h6>
                  <p class="mb-1"><b>size : </b>{{ $file->size }}</p>
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
@endsection