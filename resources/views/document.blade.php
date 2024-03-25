@extends('layouts.master')

@section('title', 'Default')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>My Document</h3>
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
                <div class="btn btn-primary"><i data-feather="home"> </i>Home </div>
              </li>
              <li>
                <div class="btn btn-light"><i data-feather="folder"></i>All </div>
              </li>
              <li>
                <div class="btn btn-light"><i data-feather="clock"></i>Recent </div>
              </li>
              <li>
                <div class="btn btn-light"><i data-feather="star"></i>Starred </div>
              </li>
              <li>
                <div class="btn btn-light"><i data-feather="alert-circle"></i>Recovery </div>
              </li>
              <li>
                <div class="btn btn-light"><i data-feather="trash-2"></i>Deleted </div>
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
              <form class="form-inline" action="#" method="get">
                <div class="form-group mb-0"> <i class="fa fa-search"></i>
                  <input class="form-control-plaintext" type="text" placeholder="Search...">
                </div>
              </form>
              <div class="media-body text-end">
                <button class="btn btn-primary" type="submit">Add Folder</button>
                <button class="btn btn-outline-primary" type="submit" data-bs-toggle="modal" data-bs-target="#tooltipmodal"><i data-feather="upload"></i>Upload</button>
              </div>
            </div>
          </div>
          <div class="card-body file-manager">
            <h4 class="mb-3">All Files</h4>
            <h6 class="mt-4">Folders</h6>
            <ul class="folder">
              <li class="folder-box">
                <div class="media">
                  <i class="fa fa-folder f-36 txt-warning"></i>
                  <a href="#" class="media-body ms-3 sidebar-title">
                    <h6 class="mb-0">Project Managament</h6>
                    <p>0 files</p>
                  </a>
                </div>
              </li>
              <li class="folder-box">
                <div class="media">
                  <i class="fa fa-folder f-36 txt-warning"></i>
                  <div class="media-body ms-3">
                    <h6 class="mb-0">Financial</h6>
                    <p>0 files</p>
                  </div>
                </div>
              </li>
            </ul>
            <h6 class="mt-4">Files</h6>
            <ul class="files">
              <li class="file-box">
                <div class="file-top"> <i class="fa fa-file-archive-o txt-secondary"></i><i class="fa fa-ellipsis-v f-14 ellips"></i></div>
                <div class="file-bottom">
                  <h6>Project.zip </h6>
                  <p class="mb-1">1.90 GB</p>
                  <p> <b>last open : </b>1 hour ago</p>
                </div>
              </li>
              <li class="file-box">
                <div class="file-top"> <i class="fa fa-file-excel-o txt-success"></i><i class="fa fa-ellipsis-v f-14 ellips"></i></div>
                <div class="file-bottom">
                  <h6>Backend.xls</h6>
                  <p class="mb-1">2.00 GB</p>
                  <p> <b>last open : </b>1 hour ago</p>
                </div>
              </li>
              <li class="file-box">
                <div class="file-top"> <i class="fa fa-file-text-o txt-info"></i><i class="fa fa-ellipsis-v f-14 ellips"></i></div>
                <div class="file-bottom">
                  <h6>requirements.txt </h6>
                  <p class="mb-1">0.90 KB</p>
                  <p> <b>last open : </b>1 hour ago</p>
                </div>
              </li>
              <li class="file-box">
                <div class="file-top"> <i class="fa fa-file-text-o txt-primary"></i><i class="fa fa-ellipsis-v f-14 ellips"></i></div>
                <div class="file-bottom">
                  <h6>Logo.psd </h6>
                  <p class="mb-1">2.0 MB</p>
                  <p> <b>last open : </b>1 hour ago</p>
                </div>
              </li>
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