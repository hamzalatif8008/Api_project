 	@extends('layouts.front')
@section('content')
<div class="container-fluid howitworksbg" style="background-image:url(' {{asset('assets/front/howitworks.jpg')}}');">
	<div class="row">
		<div class="col-lg-12" style="padding-right: 0px !important;
    padding-left: 0px !important;">
			<div class="innerhowitbg text-center">
				<h3>How PlanetSid Works &nbsp ?</h3>
				<p>Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Optio magnam inventore, officia expedita quisquam.</p>
				<button class="btn btnworkingpage2">Seller</button> <button class="btn btnworkingpage2">Frenchiser</button>
			</div>
		</div>
	</div>
	
</div>

<div class="container-fluid text-center howworkingimgbig"  style="margin-top: 10px;margin-bottom: 10px;">
	<div class="row">
		<div class="col-lg-12">
			<h2 style="margin-top: 20px;margin-bottom:30px;">Planetsid Working Tree</h2>
			<img src="{{asset('assets/front/planetsid work.jpg')}}"  alt="">
		</div>
	</div>
</div>
<div class="container-fluid text-center howworkingimgsmall"  style="margin-top: 10px;margin-bottom: 10px;">
	<div class="row">
		<div class="col-lg-12">
						<h2 style="margin-top: 20px;margin-bottom:30px;">Planetsid Working Tree</h2>
			<img src="{{asset('assets/front/api (1).jpg')}}"alt="">
		</div>
	</div>
</div>
@endsection