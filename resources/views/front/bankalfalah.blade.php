@extends('layouts.front')
@section('content')
<div class="menu" style="margin-top: 10px;margin-bottom: 15px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
						<a  class="showSingle" target="1">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/alfaa wallet.png')}}" alt="">
								<h6>Alfalah Wallet</h6>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
						<a  class="showSingle" target="2">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/hbl1.png')}}" alt="">
								<h6>Alfalah Account</h6>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
						<a  class="showSingle" target="3">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/crddeb1.png')}}" alt="">
								<h6>Alfalah Credit/Debit Card</h6>
							</div>
						</a>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
<section class="cnt" style="margin-top: 10px;margin-bottom: 10px;">
	<!-- easypaisa -->
<div id="div1"  class="targetDiv">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<button class="btn btnalfalah">Pay now</button>	
			</div>
		</div>
	</div>
</div>
<!-- jazz cash -->
<div id="div2" class="targetDiv">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<button class="btn btnalfalah">Pay now</button>	
			</div>
		</div>
	</div>
</div>
<div id="div3" class="targetDiv">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<button class="btn btnalfalah">Pay now</button>	
			</div>
		</div>
	</div>
</div>

</section>

@endsection
@section('scripts')
<script type="text/javascript">
	jQuery(document).ready(function(){
$(".targetDiv").hide();
});
jQuery(function(){
jQuery('#showall').click(function(){
jQuery('.targetDiv').show('.cnt');
});
jQuery('#hideall').click(function() {
jQuery('.targetDiv').hide('.cnt');
});

jQuery('.showSingle').click(function(){
jQuery('.targetDiv').hide('.cnt');
jQuery('#div'+$(this).attr('target')).slideToggle();
});
});
</script>
@endsection