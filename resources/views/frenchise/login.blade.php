@extends('layouts.front') 
@section('content')
<style type="text/css">
  .container{
    margin-bottom: 30px;
  }
  #widthmodal{
    width: 70% !important;
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
<li class="active"><a data-toggle="tab" href="#login111z">Login</a></li>
<li><a data-toggle="tab" href="#signup111z">Sign Up</a></li>
</ul>
<div class="tab-content">
<div id="login111z" class="tab-pane fade in active">
<div class="login-title text-center">
<h3><!-- {{$lang->signin}} -->Login Frenchise</h3>
</div>
<div class="login-form">
      @include('includes.form-error')
      @include('includes.form-success')
<form action="{{ route('frenchise-login-submit') }}" method="POST">
  {{ csrf_field() }}
<div class="form-group">
<label for="">Email</label>
<input type="email" name="email" class="form-control" placeholder="Type Email Address" required="">
</div>
<div class="form-group">
<label for="login_email11">Password</label>
<input type="password" class="form-control" name="password" placeholder="Type Password" required="">
</div>
<button type="submit" class="btn login-btn btn-block" >LOGIN</button>
</form>
</div>
</div>
<div id="signup111z" class="tab-pane fade">
  <div class="login-title text-center">
<h3><!-- {{$lang->signin}} -->Register Frenchise</h3>
</div>
<div class="login-form">
 <form class="form-horizontal" action="{{route('frenchise-submit')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label for="">Owner Name</label>
<input type="text" class="form-control" name="owner_name" id="v2" placeholder="Owner Name"   required>
</div>
<div class="form-group">
<label for="">Father Name</label>
<input type="text" class="form-control" name="father_name" id="v2" placeholder="Father Name"   required>
</div>
<div class="form-group">
<label for="">CNIC</label>
<input type="text" class="form-control cnic" name="cnic" id="v2" placeholder="CNIC"   required>
</div>
<div class="form-group">
<label for="">Location</label>
<input type="text" class="form-control" name="frenchise_address" id="v4" placeholder="Address"  required>
</div>
<div class="form-group">
<label for="">Location</label>
 <input type="text" class="form-control" name="religion" id="v2" placeholder="Religin"   required>
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
<div class="form-group">
<label for="">Owner Address</label>
 <input type="text" class="form-control" name="address" id="v4" placeholder="Owner Address"  required>
</div>
<div class="form-group">
<label for="">Home Address <span>(This Field is Optional)</label>
 <input type="text" class="form-control" name="home_address" id="v4" placeholder="Home Address">
</div>
<div class="form-group">
<label for="">Bank Account</label>
 <input type="text" class="form-control" name="bank_account_1" id="v4" placeholder="Bank Account"  required>
</div>
<div class="form-group">
<label for="">Bank Account <span>(This Field is Optional)</label>
 <input type="text" class="form-control" name="bank_account_2" id="v4" placeholder="Bank Account"  >
</div>
<div class="form-group">
<label for="">Mobile Number</label>
<input type="text" class="form-control yourphone" name="mobile_number" id="v3" placeholder="Mobile Number" data-mask="0000-0000000"  required>
</div>
<div class="form-group">
<label for="">Mobile Number <span>(This Field is Optional)</label>
 <input type="text" class="form-control yourphone" name="mobile_number_1" id="v3" placeholder="Mobile Number" data-mask="0000-0000000">
</div>
<div class="form-group">
<label for="">Franchise Name</label>
 <input type="text" class="form-control" name="frenchise_name" id="v1" placeholder="Name"   required>
</div>
<div class="form-group">
<label for="">Franchise Mobile Number</label>
   <input type="text" class="form-control yourphone" name="frenchise_mobile_number" id="v3" placeholder="Mobile Number"  data-mask="0000-0000000" required>
</div>
<div class="form-group">
<label for="">Email Address</label>
   <input class="form-control" type="email" name="email" id="dash_lname" placeholder="Email Address"   >
</div>
<div class="form-group">
<label for="">Password</label>
  <input class="form-control" type="password" name="password" id="dash_lname" placeholder="Password" required>
</div>
<div class="form-group">
<label for="">Message <span>(This Field is Optional)</label>
  <textarea class="form-control" id="v6" name="frenchise_message" placeholder="Message" rows="5"> </textarea>
</div>
<div class="form-group">
<label for="">Detail <span>(This Field is Optional)</label>
   <textarea class="form-control" id="v6" name="frenchise_detail" placeholder="Message" rows="5"> </textarea>
</div>
<input type="hidden" name="package" value="1">
 <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
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


@section('scripts')
        <script src="{{ asset('assets/src/jquery.mask.js')}}"></script>
        <script src="{{ asset('assets/dist/jquery.mask.min.js')}}"></script>
        
    <script src="https://unpkg.com/jquery-input-mask-phone-number@1.0.14/dist/jquery-input-mask-phone-number.js"></script>

//phone format
    <script type="text/javascript">
        $(document).ready(function () {
            $('.yourphone').mask('0000-0000000');
        });
    </script>
//----------
//Cnic format
    <script type="text/javascript">
        $(document).ready(function () {
            $('.cnic').mask('00000-0000000-0');
        });
    </script>
//----------

<script type="text/javascript">

  $('#prov').on('change', function() {
    var prov = $(this).val();
       if (prov == "") 
    {
      $('#city').html('<option value="">Select City</option>');
      $('#city').prop('disabled', true);   
    }
    else
    {
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/city')}}",
            data:{admin_name:prov},
            success:function(data){
                  $('#city').html('<option value="">Select City</option>');

                   for(var k in data)
                    {
                      $('#city').append('<option value="'+data[k]['city']+'">'+data[k]['city']+'</option>');                      
                    } 
                  $('#city').prop('disabled', false);                  
                }
              
      });      
    }

});
</script>
<script language=Javascript>
     
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode != 46 && charCode > 31
              && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      
   </script>

@endsection