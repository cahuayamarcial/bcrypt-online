@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('active-dashboard', 'active')
@section('content')
<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-4">
    		<div class="card">
    			<div class="card-header b-t-green card-dash-head">
    				Usuarios registrados
    			</div>
				<div class="card-body card-dash-body">
					<h2 class="m-0">{{ number_format(count($users)) }}</h2>
				</div>
			</div>
    	</div>
    	<div class="col-lg-4">
    		<div class="card">
    			<div class="card-header b-t-green card-dash-head">
    				Textos Encriptados <span class="badge badge-primary pull-right">HOY</span>
    			</div>
				<div class="card-body card-dash-body">
					<h2 class="m-0">{{ number_format(count($nowRecords)) }}</h2>
				</div>
			</div>
    	</div>
    	<div class="col-lg-4">
    		<div class="card">
    			<div class="card-header b-t-green card-dash-head">
    				Textos Encriptados <span class="badge badge-primary pull-right">TOTAL</span>
    			</div>
				<div class="card-body card-dash-body">
					<h2 class="m-0">{{ count($allRecords) }}</h2>
				</div>
			</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-lg-8">
    		<div class="card b-t-orange ">
				<div class="card-body card-dash-body">
					<canvas id="lineUsers" width="200" height="91"></canvas>
				</div>
			</div>
    	</div>
    	<div class="col-lg-4">
    		<div class="card b-t-orange ">
				<div class="card-body card-dash-body">
					<canvas id="pieUsers" width="200" height="200"></canvas>
				</div>
			</div>
    	</div>
    </div>
</div>
@endsection