@extends('layouts.master')

@section('title', $files->department . ' - File Details')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{ $files->department  }} - Files </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item"><a href="/document-management">Documents</a></li>
<li class="breadcrumb-item active">files</li>
@endsection

@section('breadcrumb-title')

@section('content')



@endsection

@section('script')
@endsection