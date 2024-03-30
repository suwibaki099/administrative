@extends('layouts.master')

@section('title', 'test')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
 {{-- {{ date_default_timezone_set('Asia/Manila') }} --}}
 {{-- {{ $current_time = time() }} --}}
 {{-- {{ date('g:i a', $current_time) }} --}}
<h3>Dashboard </h3>
@endsection


@section('content')
@if (session()->has('message'))
         <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 alert alert-success dark alert-dismissible fade show" role="alert">{{session('message')}}
         </div>
    @endif
<div class="container-fluid">
	<div class="row widget-grid">
		<div class="col-xxl-4 col-sm-6 box-col-6">
			<div class="card profile-box">
				<div class="card-body">
					<div class="media">
						<div class="media-body">
							<div class="greeting-user">
								<h4 class="f-w-600">Welcome to RKIVE </h4>
								<p>{{auth()->user()->name}}, Here whats happing in your account today</p>
								<div class="whatsnew-btn"><a class="btn btn-outline-white">Whats New !</a></div>
							</div>
						</div>
						<div>
							<div class="clockbox">
								<svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
									<g id="face">
										<circle class="circle" cx="300" cy="300" r="253.9"></circle>
										<path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"></path>
										<circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
									</g>
									<g id="hour">
										<path class="hour-hand" d="M300.5 298V142"></path>
										<circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
									</g>
									<g id="minute">
										<path class="minute-hand" d="M300.5 298V67"></path>
										<circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
									</g>
									<g id="second">
										<path class="second-hand" d="M300.5 350V55"></path>
										<circle class="sizing-box" cx="300" cy="300" r="253.9"> </circle>
									</g>
								</svg>
							</div>
							<div class="badge f-10 p-0" id="txt"></div>
						</div>
					</div>
					<div class="cartoon"><img class="img-fluid" src="{{ asset('assets/images/dashboard/cartoon.svg') }}" alt="vector women with leptop"></div>
				</div>
			</div>
		</div>
		<div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
			<div class="row">
				<div class="col-xl-12">
					<div class="card widget-1">
						<div class="card-body">
							<div class="widget-content">
								<div class="widget-round secondary">
									<div class="bg-round">
										<svg class="svg-fill">
											<use href="{{ asset('assets/svg/icon-sprite.svg#cart') }}"> </use>
										</svg>
										<svg class="half-circle svg-fill">
											<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
										</svg>
									</div>
								</div>
								<div>
									<h4>{{ $documents }}</h4><span class="f-light">Total Documents</span>
								</div>
							</div>
							<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+50%</span></div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card widget-1">
							<div class="card-body">
								<div class="widget-content">
									<div class="widget-round primary">
										<div class="bg-round">
											<svg class="svg-fill">
												<use href="{{ asset('assets/svg/icon-sprite.svg#tag') }}"> </use>
											</svg>
											<svg class="half-circle svg-fill">
												<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
											</svg>
										</div>
									</div>
									<div>
										<h4>{{$contract}}</h4><span class="f-light">Total Contracts</span>
									</div>
								</div>
								<div class="font-primary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
			<div class="row">
				<div class="col-xl-12">
					<div class="card widget-1">
						<div class="card-body">
							<div class="widget-content">
								<div class="widget-round warning">
									<div class="bg-round">
										<svg class="svg-fill">
											<use href="{{ asset('assets/svg/icon-sprite.svg#return-box') }}"> </use>
										</svg>
										<svg class="half-circle svg-fill">
											<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
										</svg>
									</div>
								</div>
								<div>
									<h4>{{$approve}}</h4><span class="f-light">Rejected</span>
								</div>
							</div>
							<div class="font-warning f-w-500"><i class="icon-arrow-down icon-rotate me-1"></i><span>-20%</span></div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card widget-1">
							<div class="card-body">
								<div class="widget-content">
									<div class="widget-round success">
										<div class="bg-round">
											<svg class="svg-fill">
												<use href="{{ asset('assets/svg/icon-sprite.svg#rate') }}"> </use>
											</svg>
											<svg class="half-circle svg-fill">
												<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
											</svg>
										</div>
									</div>
									<div>
										<h4>{{$approve}}</h4><span class="f-light">Approved</span>
									</div>
								</div>
								<div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xxl-auto col-xl-12 col-sm-6 box-col-6">
			<div class="row">
				<div class="col-xxl-12 col-xl-6 box-col-12">
					<div class="card widget-1 widget-with-chart">
						<div class="card-body">
							<div>
								<h4 class="mb-1">{{$request}}</h4><span class="f-light">Request </span>
							</div>
							<div class="order-chart">
								<div id="orderchart"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-12 col-xl-6 box-col-12">
					<div class="card widget-1 widget-with-chart">
						<div class="card-body">
							<div>
								<h4 class="mb-1">{{$pending}}</h4><span class="f-light">Pending</span>
							</div>
							<div class="profit-chart">
								<div id="profitchart"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<script type="text/javascript">
</script>

@endsection

@section('script')
<script src="{{ asset('assets/js/clock.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('assets/js/notify/index.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('assets/js/height-equal.js') }}"></script>
<script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
@endsection