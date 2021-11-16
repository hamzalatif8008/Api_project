@extends('layouts.admin')
@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Add Frenchise<a href="{{ route('admin-frenchise-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Admin <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchise  <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Add</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <form class="form-horizontal" action="{{route('admin-frenchise-submit')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="admin_current_photo">Profile Photo *</label>
                                                <div class="col-sm-2"> 
                                                 <img  style="width: 100%; height: auto;" id="adminimg" src=" " alt="profile image"> 

                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                    <button  type="button" id="uploadTrigger" onclick="uploadclick()" class="btn btn-block add-product_btn adminImg-btn"><i class="fa fa-upload"></i> Change Photo</button>
                                                </div>
                                             </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v5">Registration Number *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="reg_number" id="v5" placeholder="Registration Number"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">Owner Name *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="owner_name" id="v2" placeholder="Owner Name"   required>
                                                    </div>  
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">Father Name/ Husband Name *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="father_name" id="v2" placeholder="Father Name"   required>
                                                    </div>  
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">CNIC*</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control cnic" name="cnic" id="v2" placeholder="CNIC"   required>
                                                    </div>  
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Location *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="frenchise_address" id="v4" placeholder="Address"  required>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">Religion*</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="religion" id="v2" placeholder="Religin"   required>
                                                    </div>  
                                                </div>

                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v5">Province *</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="prov" required="" name="province">
                                                                @php
                                                                    $countries = App\Models\Country::groupBy('admin_name')->get();
                                                                @endphp 

                                                            @foreach($countries as $country)
                                                                <option value="{{$country->admin_name}}">{{$country->admin_name}}</option> 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v5">City *</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="city"  required="" name="city" disabled="">
                                                            <option value="">Select City</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Owner Address *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="address" id="v4" placeholder="Owner Address"  required>
                                                    </div>
                                                 </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Home Address *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="home_address" id="v4" placeholder="Home Address">
                                                    </div>
                                                 </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Bank Account *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="bank_account_1" id="v4" placeholder="Bank Account"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Bank Account <span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="bank_account_2" id="v4" placeholder="Bank Account"  >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Mobile Number *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="mobile_number" id="v3" placeholder="Mobile Number" data-mask="0000-0000000"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Mobile Number *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="mobile_number_1" id="v3" placeholder="Mobile Number" data-mask="0000-0000000">
                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Submit Amount *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="submit_amount" onkeypress="return isNumberKey(event)" id="v3" placeholder="Submit Amount"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Remaining Amount *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="remaining_amount" onkeypress="return isNumberKey(event)" id="v3" placeholder="Remaining Amount"   required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Duration *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="duration" id="v3" placeholder="Duration"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> PartnerShip *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="partner" onkeypress="return isNumberKey(event)" id="v3" placeholder="PartnerShip"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="percentage" onkeypress="return isNumberKey(event)" id="total" placeholder="Percentage"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *<span>(This Percentage is Monthly)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="monthly_percentage" onkeypress="return isNumberKey(event)" id="monthly" placeholder="Monthly Percentage" max="monthly"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *<span>(This Percentage is Yearly)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="yearly_percentage" onkeypress="return isNumberKey(event)" id="yearly" placeholder="Yearly Percentage"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *<span>(This Percentage is Completion)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="completion_percentage" onkeypress="return isNumberKey(event)" id="completion" placeholder="Completion Percentage"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Name Of Vitnes *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="vitnes" id="v3" placeholder="Name Of Vitnes"   required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Father Name/ Huband Name Of Vitnes *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="father_vitnes" id="v3" placeholder="Father Name/ Huband Name Of Vitnes"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes CNIC *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control cnic" name="cnic_vitnes" id="v3" placeholder="Vitnes CNIC"   required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes Address *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="vitnes_address" id="v3" placeholder="Vitnes Address"   required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes Mobile# *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="vitnes_mobile" id="v3" placeholder="Vitnes Mobile Number" data-mask="0000-0000000"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes Mobile# *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="vitnes_mobile_1" id="v3" placeholder="Mobile Number" data-mask="0000-0000000">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v1">Franchise Name*</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="frenchise_name" id="v1" placeholder="Name"   required>
                                                    </div>
                                                </div>         
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Franchise Mobile Number *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="frenchise_mobile_number" id="v3" placeholder="Mobile Number"  data-mask="0000-0000000" required>
                                                    </div>
                                                </div>
                                         
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Expected Vendor Limit *</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control" name="vendor_limit" onkeypress="return isNumberKey(event)" id="v4" placeholder="Limit" minlength="3" min="100" required>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="dash_lname">Email Address *</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" type="email" name="email" id="dash_lname" placeholder="Email Address"   >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="dash_lname">Password *</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" type="password" name="password" id="dash_lname" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v6">Define Area Limit *</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" id="v6" name="area" placeholder="Message" rows="5" required> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v6">Message *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" id="v6" name="frenchise_message" placeholder="Message" rows="5"> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v6">Detail *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" id="v6" name="frenchise_detail" placeholder="Message" rows="5"> </textarea>
                                                    </div>
                                                </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Account Dashboard area -->
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

        function uploadclick(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                readURL(this);
                $("#uploadTrigger").html($("#uploadFile").val());
            });

        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
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

    <script>
        $(document).ready(function() {
            $('#total').focusout(function(ev) {
                var total = $('#total').val();
                
                    $('#monthly').on('mouseup', function () {
                        $(this).val(Math.min(total, Math.max(total, $(this).val())));
                        });
                
                   $('#yearly').on('mouseup ', function () {
                        $(this).val(Math.min(total - $('#monthly').val(), Math.max(total- $('#monthly').val(), $(this).val())));
                        });

                    $('#completion').on('mouseup', function () {
                        $(this).val(Math.min(total - (parseFloat($('#monthly').val()) + parseFloat($('#yearly').val())), Math.max(total- (parseFloat($('#monthly').val()) + parseFloat($('#yearly').val())), $(this).val())));
                        });

            });     
            
        });
    </script>
@endsection