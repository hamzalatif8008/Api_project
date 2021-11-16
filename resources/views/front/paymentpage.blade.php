@extends('layouts.front')
@section('content')
<div class="menu" style="margin-top: 10px;margin-bottom: 10px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
						<a  class="showSingle" target="1">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/easy2.png')}}" alt="">
								<h6>Easypaisa</h6>
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
						<a  class="showSingle" target="2">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/jazz1.png')}}" alt="">
								<h6>Jazz Cash</h6>
							</div>
						</a>
					</div> 
					<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
						<a  class="showSingle" target="4">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/hbl.png')}}" alt="">
								    <input id="Key1" name="Key1" type="hidden" value="9hJk4MxUkRe7cudH">                                                                                                                              
                                    <input id="Key2" name="Key2" type="hidden" value="2635443025834838">                                                                                                                                                                              
                                    <form action="https://sandbox.bankalfalah.com/HS/HS/HS" id="HandshakeForm" method="post">                                                                                                      
                                        <input id="HS_RequestHash" name="HS_RequestHash" type="hidden" value="">                                                                                                                      
                                        <input id="HS_IsRedirectionRequest" name="HS_IsRedirectionRequest" type="hidden" value="1">                                                                                                   
                                        <input id="HS_ChannelId" name="HS_ChannelId" type="hidden" value="1001">                                                                                                                      
                                        <input id="HS_ReturnURL" name="HS_ReturnURL" type="hidden" value="https://planetsid.com/alfapayment/{{$order->id}}">                                                                     
                                        <input id="HS_MerchantId" name="HS_MerchantId" type="hidden" value="3162">                                                                                                                     
                                        <input id="HS_StoreId" name="HS_StoreId" type="hidden" value="011925">                                                                                                                     
                                        <input id="HS_MerchantHash" name="HS_MerchantHash" type="hidden" value="OUU362MB1uqOvabSg7KsREd15e+opQs5xXBRMsmPw/EuZIlEb1IyqYaLW6J1b44w">                            
                                        <input id="HS_MerchantUsername" name="HS_MerchantUsername" type="hidden" value="abumub">                                                                                                      
                                        <input id="HS_MerchantPassword" name="HS_MerchantPassword" type="hidden" value="JVthGzAvw6ZvFzk4yqF7CA==">                                                                                    
                                        <input id="HS_TransactionReferenceNumber" name="HS_TransactionReferenceNumber" autocomplete="off" placeholder="Order ID" type="hidden" value="{{$order->id}}">
                                     </form>                                                                                       
                                        <button   class="btn btn-custon-four btn-danger"  id="handshake">Bank</button>                                                                                                
        
								<!-- <h6>Bank Alfalah</h6>  -->
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
                    <a  href="{{route('setcashondelivery',['id'=>$order->id])}}">
							<div class="paymentnewadd text-center">
								<img src="{{asset('assets/front/images/paypage/cashde1.png')}}" alt="">
								<h6>Cash On Delivery</h6>
							</div>
						</a>
					</div> 
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " style="margin-top: 15px !important;">
				<div class="paynew2div">
					<h4>Order Summery</h4>
				<div class="row">  
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left">
						<h2 class="paynew2divh2">Totall Amount</h2>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
						<h2 class="paynew2divh2">{{$order->currency_sign}}:{{$order->pay_amount}}</h2>
					</div>
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
                <div class="col-lg-8">
                    <div id="paymentnewaddhiddiv" >
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
                                <input type="text" name="account" id=""><br>
                                <button class="btn paympagebrn1">Pay Now</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div> 
   
    <div class="container">
                <div class="row">
                 <!-- jazz cash -->
    <div id="div2" class="targetDiv">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="paymentnewaddhiddiv" >
                        <p>Be sure that your jazz cash account is active and has sufficient balance!</p>
                            <form action="{{route('jazzcash')}}">
                                <label for="">Jazz Cash Account Number</label><br>	
                                <input type="text" name="jazz_cash_no" id="jazz_cash_no"><br>
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <button class="btn paympagebrn1">Pay Now</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                                                                                                                                                                                
     
                    
            </div>
        </div>


     <script                                                                                                                                                                                           
       src="https://code.jquery.com/jquery-1.12.4.min.js"                                                                                                                                              
       integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="                                                                                                                                 
       crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->


         <script type="text/javascript">                                                                                                                                                                   
        $(function () {                                                                                                                                                                                        
                                                                                                                                                                                                               
            $("#handshake").click(function (e) {   

                e.preventDefault();                                                                                                                                                                                    
                $("#handshake").attr('disabled', 'disabled');                                                                                                                                                          
                submitRequest("HandshakeForm");                                                                                                                                                                        
                if ($("#HS_IsRedirectionRequest").val() == "1") {   
                                                                                                                                                                   
                    document.getElementById("HandshakeForm").submit();  
                    alert("after submit");                                                                                                                                               
                }                                                                                                                                                                                                      
        else {                                                                                                                                                                                                 
            var myData = {                                                                                                                                                                                     
                HS_MerchantId : $("#HS_MerchantId").val(),                                                                                                                                                     
                HS_StoreId : $("#HS_StoreId").val(),                                                                                                                                                     
                HS_MerchantHash : $("#HS_MerchantHash").val(),                                                                                                                                                 
                HS_MerchantUsername : $("#HS_MerchantUsername").val(),                                                                                                                                         
                HS_MerchantPassword : $("#HS_MerchantPassword").val(),                                                                                                                                         
                HS_IsRedirectionRequest : $("#HS_IsRedirectionRequest").val(),                                                                                                                                 
                HS_ReturnURL : $("#HS_ReturnURL").val(),                                                                                                                                                       
                HS_RequestHash : $("#HS_RequestHash").val(),                                                                                                                                                   
                HS_ChannelId: $("#HS_ChannelId").val(),                                                                                                                                                        
                HS_TransactionReferenceNumber: $("#HS_TransactionReferenceNumber").val(),                                                                                                                      
            }                                                                                                                                                                                                  
                                                                                                                                                                                                               
                                                                                                                                                                                                               
            $.ajax({                                                                                                                                                                                           
                type: 'POST',                                                                                                                                                                                  
                url: 'https://sandbox.bankalfalah.com/HS/HS/HS',                                                                                                                                            
                contentType: "application/x-www-form-urlencoded",                                                                                                                                                
                data: myData,                                                                                                                                                                  
                dataType: "json",                                                                                                                                                                              
                beforeSend: function () {                                                                                                                                                                      
                },                                                                                                                                                                                             
                success: function (r) {                                                                                                                                                                        
                    if (r != '') {                                                                                                                                                                             
                        if (r.success == "true") {                                                                                                                                                              
                            $("#AuthToken").val(r.AuthToken);                                                                                                                                                  
                            $("#ReturnURL").val(r.ReturnURL);                                                                                                                                                  
                            alert('Success: Handshake Successful');                                                                                                                               
                        }                                                                                                                                                                                      
                        else                                                                                                                                                                                      
                        {                                                                                                                                                                                      
                            alert('Error: Handshake Unsuccessful');                                                                                                                                                                                       
                        }                                                                                                                                                                                                             
                    }                                                                                                                                                                                          
                    else                                                                                                                                                                                          
                    {                                                                                                                                                                                          
                        alert('Error: Handshake Unsuccessful');                                                                                                                                                                                            
                    }                                                                                                                                                                                                             
                },                                                                                                                                                                                             
                error: function (error) {                                                                                                                                                                      
                    alert('Error: An error occurred');                                                                                                                                               
                },                                                                                                                                                                                             
                complete: function(data) {                                                                                                                                                                     
                    $("#handshake").removeAttr('disabled', 'disabled');                                                                                                                                        
                }                                                                                                                                                                                              
            });                                                                                                                                                                                                
        }                                                                                                                                                                                                      
                                                                                                                                                                                                               
    });                                                                                                                                                                                                        
                                                                                                                                                                                                               
    $("#run").click(function (e) {                                                                                                                                                                             
        e.preventDefault();                                                                                                                                                                                    
        submitRequest("PageRedirectionForm");                                                                                                                                                                  
        document.getElementById("PageRedirectionForm").submit();                                                                                                                                               
         });                                                                                                                                                                                                        
     });                                                                                                                                                                                                            
                                                                                                                                                                                                               
     function submitRequest(formName) {                                                                                                                                                                             
                                                                                                                                                                                                               
    var mapString = '', hashName = 'RequestHash';                                                                                                                                                              
    if (formName == "HandshakeForm") {                                                                                                                                                                         
        hashName = 'HS_' + hashName;                                                                                                                                                                           
    }                                                                                                                                                                                                          
                                                                                                                                                                                                               
    $("#" + formName+" :input").each(function () {                                                                                                                                                             
        if ($(this).attr('id') != '') {                                                                                                                                                                        
            mapString += $(this).attr('id') + '=' + $(this).val() + '&';                                                                                                                                       
        }                                                                                                                                                                                                      
    });                                                                                                                                                                                                        
                                                                                                                                                                                                               
    $("#" + hashName).val(CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(mapString.substr(0, mapString.length - 1)), CryptoJS.enc.Utf8.parse($("#Key1").val()),                                                  
        {                                                                                                                                                                                                      
            keySize: 128 / 8,                                                                                                                                                                                  
            iv: CryptoJS.enc.Utf8.parse($("#Key2").val()),                                                                                                                                                     
            mode: CryptoJS.mode.CBC,                                                                                                                                                                           
            padding: CryptoJS.pad.Pkcs7                                                                                                                                                                        
        }));                                                                                                                                                                                                   
     }                                                                                                                                                                                                              
                                                                                                                                                                                                               
     </script> 
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