@extends('layouts.front') 
@section('content')
<style type="text/css">
	.container{
		margin-bottom: 30px;
	}
	#widthmodal{
		width: 80% !important;
		margin:0 auto; 
	}
	@media(max-width: 991px){
	#widthmodal{
		width: 100% !important;
	}	
	}
</style>
<div class="container">
	
<div class="modal-content" id="widthmodal">
<div class="modal-header" style="margin-right:10px;">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="row" style="margin: 15px;">
<div class="login-tab">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#login111z">Vendor</a></li>
<li><a data-toggle="tab" href="#signup111z">Frenchise</a></li>
</ul>
<div class="tab-content">
<div id="login111z" class="tab-pane fade in active">
<div class="login-title text-center">
<h3><!-- {{$lang->signin}} -->Apply Vendor</h3>
</div>
<div class="login-form">
<form action="" method="POST">
<div class="form-group">
<label for="">Name</label>
<input type="text"  class="form-control" placeholder="Name" required>
</div>
<div class="form-group">
<label for="login_email11">Email Address</label>
<input type="email" name="email" class="form-control" placeholder="Email Address" required>
</div>
<div class="form-group">
<label for="">Phone Number</label>
<input type="number" name="" class="form-control" placeholder="Phone Number" required>
</div>
<div class="form-group">
<label for="shippingFull_name">Province  <span>*</span></label>
<select class="form-control" id="prov" required="" name="province">
@php
$countries = App\Models\Country::groupBy('admin_name')->get();
@endphp
@foreach($countries as $country)
<option value="{{$country->admin_name}}">{{$country->admin_name}}</option>
@endforeach
</select>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Padd11">City <span>*</span></label>
<select class="form-control" id="city"  required="" name="city" disabled="">
<option value="">Select City</option>
</select>
</div>
<input type="hidden" name="package" value="1">
<button type="submit" class="btn btn-default btn-block">Apply</button>
</form>
</div>
</div>
<div id="signup111z" class="tab-pane fade">
	<div class="login-title text-center">
<h3><!-- {{$lang->signin}} -->Apply Frenchise</h3>
</div>
<div class="login-form">
<form action="" method="POST">
<div class="form-group">
<label for="">Name</label>
<input type="text"  class="form-control" placeholder="Name" required>
</div>
<div class="form-group">
<label for="login_email11">Email Address</label>
<input type="email" name="email" class="form-control" placeholder="Email Address" required>
</div>
<div class="form-group">
<label for="">Phone Number</label>
<input type="number" name="" class="form-control" placeholder="Phone Number" required>
</div>
<div class="form-group">
<label for="shippingFull_name">Province  <span>*</span></label>
<select class="form-control" id="prov" required="" name="province">
@php
$countries = App\Models\Country::groupBy('admin_name')->get();
@endphp
@foreach($countries as $country)
<option value="{{$country->admin_name}}">{{$country->admin_name}}</option>
@endforeach
</select>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Padd11">City <span>*</span></label>
<select class="form-control" id="city"  required="" name="city" disabled="">
<option value="">Select City</option>
</select>
</div>
<input type="hidden" name="package" value="1">
<button type="submit" class="btn btn-default btn-block">Apply</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection

