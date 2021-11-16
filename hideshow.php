@extends('layouts.front')
@section('content')
<div class="container" style="height: auto;
	padding-bottom: 20px;">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xl-12">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-4 col-xl-12">
					<div class="paymentnewadd text-center" id="show-hidden-menu">
						<img src="{{asset('assets/front/images/paypage/easy1.png')}}" alt="">
						<h6>Easypaisa</h6>
					</div>
				</div>
				<div id="paymentnewaddhiddiv" class="hidden-menu" style="display: none;">
					<p>Experience easy payments – save your Easypaisa account as default method to pay!</p>
					<p>Please ensure your Easypaisa account is Active and has sufficient balance.</p>
					<p>To confirm your payment after providing OTP:</p>
					<ol>
						<li>- USSD prompt for Telenor Customers Only</li>
						<li>  • Unlock your phone and enter 5 digit PIN in the prompt to pay</li>
					</ol>
					<p>OR</p>
						<ol>
							<li>- Approve Payment in your Easypaisa App (Telenor and Other Networks)</li>
							<li>  • Login to Easypaisa App and tap on payment notification to approve</li>
							<li>  • If you miss the notification, go to My Approvals in side menu to confirm</li>
						</ol>
						<form action="">
							<label for="">Easypaisa Account Number</label><br>	
							<input type="text" name="" id=""><br>
							<button class="btn paympagebrn1">Pay Now</button>
						</form>
				</div>
				<!-- jazz cash -->
				<div class="col-lg-2 col-md-2 col-sm-4 col-xl-12">
					<div class="paymentnewadd text-center" id="show-hidden-menujazz">
						<img src="{{asset('assets/front/images/paypage/easy1.png')}}" alt="">
						<h6>Easypaisa</h6>
					</div>
				</div>
				<div id="paymentnewaddhiddiv" class="hidden-menujazz" style="display: none;">
					<p>Experience easy payments – save your Easypaisa account as default method to pay!</p>
					<p>Please ensure your Easypaisa account is Active and has sufficient balance.</p>
					<p>To confirm your payment after providing OTP:</p>
					<ol>
						<li>- USSD prompt for Telenor Customers Only</li>
						<li>  • Unlock your phone and enter 5 digit PIN in the prompt to pay</li>
					</ol>
					<p>OR</p>
						<ol>
							<li>- Approve Payment in your Easypaisa App (Telenor and Other Networks)</li>
							<li>  • Login to Easypaisa App and tap on payment notification to approve</li>
							<li>  • If you miss the notification, go to My Approvals in side menu to confirm</li>
						</ol>
						<form action="">
							<label for="">Easypaisa Account Number</label><br>	
							<input type="text" name="" id=""><br>
							<button class="btn paympagebrn1">Pay Now</button>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div id="show-hidden-menu">Click Me!</div>
<div class="hidden-menu" style="display: none;">
			<ul>
						<li>List item 1</li>
						<li>List item 2</li>
						<li>List item 3</li>
			</ul>
</div> -->
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
$('#show-hidden-menu').click(function() {
$('.hidden-menu').slideToggle("slow");
// Alternative animation for example
// slideToggle("fast");
});
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
$('#show-hidden-menujazz').click(function() {
$('.hidden-menujazz').slideToggle("slow");
// Alternative animation for example
// slideToggle("fast");
});
});
</script>
@endsection