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

@section('title', 'Contract Request')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/demo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/intlTelInput.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Contract Request </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item"><a href="javascript:void();">Contract Request</a></li>
@endsection

@section('breadcrumb-title')

@section('content')
<style>
body{
    margin: 0;
}
.wrapper textarea {
  resize: none;
  width: 100%;
  height: 59px;
  padding: 15px;
  outline: none;
  font-size: 16px;
  border-color: #bfbfbf;
  border-radius: 5px;
}

textarea:is(:focus, :valid) {
    border-width: 2px;
    padding: 14px;
    border-color: #4671EA;
}
textarea::-webkit-scrollbar{
    width: 0px;
}

.submit {
    border-radius: 5px
}
.submit:hover {
    transform: scale(1.03);
}
</style>
<div class="col-sm-12">

    {{-- alerts --}}
    @if (session()->has('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 alert alert-success dark alert-dismissible fade show" role="alert"><strong>Great ! </strong> {{session('success')}}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{--  end of alerts --}}

    <div class="card">
        <div class="card-header">
            <div class="media">
              <div class="media-body text-end">
              <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#tooltipmodal">Create Contract</button>
            </div>
            </div>
        <div class="card-body">
            <div class="table" >
                <table class="display" id="basic-6">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Contract_name</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request as $data)
                        <tr>
                            <td>
                                @if ($data->status == 'pending')
                                    <span class="badge rounded-pill badge-warning p-2">Pending</span>
                                @elseif($data->status == 'approve')
                                    <span class="badge rounded-pill badge-success p-2">Approve</span>
                                @else
                                    <span class="badge rounded-pill badge-danger p-2">Rejected</span>
                                @endif
                            </td>
                            <td>{{$data->department}}</td>
                            <td>{{$data->name}}</td>
                            <td style="color: green;">{{time2str($data->timestamp)}}</td>
                            <td>{{$data->contract_name}}</td>
                            <td><textarea class="resize" disabled style="padding: 5px;" cols="20" rows="1">{{$data->content}}</textarea></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Contract_name</th>
                            <th>Content</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
<div class="modal fade" id="tooltipmodal" tabindex="-1" role="dialog" aria-labelledby="tooltipmodal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title">Create Contract</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
            <form method="POST" action="/contract" autocomplete="off" class="needs-validation" novalidate="">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="mb-2">
                            <label for="first_name" class="col-form-label text-md-right">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required="" placeholder="Firstname">
                            <div class="invalid-feedback">Please input the first name.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-2">
                            <label for="first_name" class="col-form-label text-md-right">Middle Name</label>
                            <input type="text" id="first_name" name="middle_name" class="form-control" required="" placeholder="Middlename">
                            <div class="invalid-feedback">Please input the middle name.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-2">
                                <label for="last_name" class="col-form-label text-md-right">Lastname</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Lastname" required="">
                                <div class="invalid-feedback">Please input the last name.</div>
                                <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wrapper mb-2">
                            <label for="title" class="col-form-label text-md-right">Address</label>
                            <textarea name="address" class="form-control" id="address" placeholder="Address..." required=""></textarea>
                            <div class="invalid-feedback">Please input the address.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <div class="pt-4">
                                <label for="title" class="col-form-label text-md-right">Phone Number</label>
                                <input type="tel" id="phone" maxlength="11" name="phone_number" class="form-control" placeholder="Number" required="">
                                <div class="invalid-feedback">Please the number.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="title" class="col-form-label text-md-right">Email Address</label>
                            <input type="email" id="title" name="email_address" class="form-control" placeholder="example@gmail.com" required="">
                            <div class="invalid-feedback">Please input the valid email.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="title" class="col-form-label text-md-right">Date of Birth</label>
                            <input class="datepicker-here form-control digits" name="birth_date" type="text" data-language="en">
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="title" class="col-form-label text-md-right">Company</label>
                            <input type="text" id="title" name="company" class="form-control" placeholder="Company/Position" required="">
                            <div class="invalid-feedback">Please input the company.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustom04">Contract Header</label>
                        <input type="text" id="title" name="header" class="form-control" placeholder="Company header" required="">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please input the type of contract.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustom04">Witness</label>
                        <input type="text" id="title" name="witness" class="form-control" placeholder="Witness" required="">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please input the type of contract.</div>
                    </div>
                    <div class="col-12">
                        <div class="wrapper mb-2">
                            <label for="title" class="col-form-label text-md-right">Content</label>
                            <textarea name="content" class="form-control unsize" id="content" placeholder="Type something here..." required=""></textarea>
                            <div class="invalid-feedback">Please input input the content.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning submit" type="reset">Reset</button>
                    <button class="btn btn-primary submit ms-1" type="submit">Submit form</button>
                </div>
        </form>
		</div>
	   </div>
	</div>
 </div>
 
 {{-- end modal --}}
@endsection

@section('script')
<script src="{{asset('assets/js/intlTelInput.js')}}"></script>
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon-clipart.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/height-equal.js')}}"></script>
<script>
    // textarea auto resize address
    const address = document.querySelector("#address");
    address.addEventListener("keyup", e =>{
        let scHeight = e.target.scrollHeight;
        address.style.height= "auto";
        address.style.height= `${scHeight}px`;
    });
    
    // textarea auto resize for content
    const content = document.querySelector("#content");
    content.addEventListener("keyup", e =>{
        let scHeight = e.target.scrollHeight;
        content.style.height= "auto";
        content.style.height= `${scHeight}px`;
    });

    var input = document.querySelector('#phone');
    window.intlTelInput(input,{});
</script>
@endsection