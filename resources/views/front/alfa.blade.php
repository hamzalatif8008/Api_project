@extends('layouts.front')
@section('content')
<div class="menu" style="margin-top: 10px;margin-bottom: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                <div class="row">  
                    <input id="Key1" name="Key1" type="hidden" value="9hJk4MxUkRe7cudH"> 
                    <input id="Key2" name="Key2" type="hidden" value="2635443025834838"> 
                  <form action="https://sandbox.bankalfalah.com/SSO/SSO/SSO" id="PageRedirectionForm" method="post" novalidate="novalidate">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
                        <a  class="showSingle" target="3">
                            <div class="paymentnewadd text-center">
                                <input type="radio"   id="TransactionTypeId" name="TransactionTypeId" value="1" >
                                <img for src="{{asset('assets/front/images/paypage/crddeb.png')}}" alt="">
                                <h6>Alfa Wallet</h6>
                            </div>
                        </a>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
                        <a  class="showSingle" target="3">
                            <div class="paymentnewadd text-center">
                                <input type="radio"  id="TransactionTypeId" name="TransactionTypeId" value="2" >
                                <img for src="{{asset('assets/front/images/paypage/crddeb.png')}}" alt="">
                                <h6>Alfalah Bank Account</h6>
                            </div>
                        </a>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
                        <a  class="showSingle" target="3">
                            <div class="paymentnewadd text-center">
                                <input type="radio"   id="TransactionTypeId" checked="checked" name="TransactionTypeId" value="3" >
                                <img for src="{{asset('assets/front/images/paypage/crddeb.png')}}" alt="">
                                <h6>Credit/Debit Card</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top: 3px !important;">
                        <a  class="showSingle" target="4">
                            <div class="paymentnewadd text-center">
                                                                                               
                            <input id="AuthToken" name="AuthToken" type="text" value="<?php if(isset($_GET['AuthToken'])){echo $_GET['AuthToken'];} ?>">                                                                                                                                
                            <input id="RequestHash" name="RequestHash" type="text" value="">                                                                                                                            
                            <input id="ChannelId" name="ChannelId" type="hidden" value="1001">                                                                                                                            
                            <input id="Currency" name="Currency" type="hidden" value="PKR">                                                                                                                               
                             <input id="IsBIN" name="IsBIN" type="hidden" value="0">                                                                                     
                            <input id="ReturnURL" name="ReturnURL" type="hidden" value="https://planetsid.com/payment/return">                                                                            
                             <input id="MerchantId" name="MerchantId" type="hidden" value="3162">                                                                                                                           
                             <input id="StoreId" name="StoreId" type="hidden" value="011925">                                                                                                                     
                            <input id="MerchantHash" name="MerchantHash" type="hidden" value="OUU362MB1uqOvabSg7KsREd15e+opQs5xXBRMsmPw/EuZIlEb1IyqYaLW6J1b44w">                                  
                            <input id="MerchantUsername" name="MerchantUsername" type="hidden" value="abumub">                                                                                                            
                            <input id="MerchantPassword" name="MerchantPassword" type="hidden" value="JVthGzAvw6ZvFzk4yqF7CA==">                                                                                          
                                                                                                                                                                                                                  
                            <input autocomplete="off" id="TransactionReferenceNumber" name="TransactionReferenceNumber" placeholder="Order ID" type="text" value="{{$order->id}}">                                  
                            <input autocomplete="off"  id="TransactionAmount" name="TransactionAmount" placeholder="Transaction Amount" type="text" value="{{$order->pay_amount}}">                                                             
                            <button type="submit" class="btn btn-custon-four btn-danger" id="run">Confirm</button>                                                                                                            
                         </form>                      
        
                                <!-- <h6>Bank Alfalah</h6>  -->
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
 
</div>
<!-- jazz cash -->
 
 
 
 
 <div class="container">
            <div class="row">

                                                                  
                                                                                                                                                                                                       
     
                    
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

            
@endsection