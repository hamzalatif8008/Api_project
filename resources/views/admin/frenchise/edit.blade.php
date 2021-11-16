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
                                                    <h2>Edit Frenchise <a href="{{ route('admin-frenchise-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchises <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchises List <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Edit</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <form class="form-horizontal" action="{{route('admin-frenchise-update',$frenchise->id)}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="admin_current_photo">Current Photo *</label>
                                                <div class="col-sm-2">
                                                                                @if($frenchise->is_provider == 1)
                                    <img style="width: 100%; height: auto;" src="{{ $frenchise->photo ? $frenchise->photo:asset('assets/images/noimage.png')}}" alt="profile image">
                                    @else
                                    <img  style="width: 100%; height: auto;" id="adminimg" src="{{ $frenchise->photo ? asset('assets/images/'.$frenchise->photo):asset('assets/images/noimage.png')}}" alt="profile image">
                                    @endif

                                                </div>
                                                @if($frenchise->is_provider != 1)
                                                <div class="col-sm-4">
                                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                    <button  type="button" id="uploadTrigger" onclick="uploadclick()" class="btn btn-block add-product_btn adminImg-btn"><i class="fa fa-upload"></i> Change Photo</button>
                                                </div>
                                                @endif
                                            </div>
                                             <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v5">Registration Number *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="reg_number" id="v5" placeholder="Registration Number" value="{{$frenchise->reg_number}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">Owner Name *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="owner_name" id="v2" placeholder="Owner Name" value="{{$frenchise->owner_name}}"  required>
                                                    </div>  
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">Father Name/ Husband Name *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="father_name" id="v2" placeholder="Father Name"  value="{{$frenchise->father_name}}" required>
                                                    </div>  
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">CNIC*</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control cnic" name="cnic" id="v2" placeholder="CNIC" value="{{$frenchise->cnic}}"  required>
                                                    </div>  
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Location *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="frenchise_address" id="v4" placeholder="Address"  value="{{$frenchise->frenchise_address}}"required>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v2">Religion*</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="religion" id="v2" placeholder="Religin" value="{{$frenchise->religion}}"  required>
                                                    </div>  
                                                </div>
                                               <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v5">Province *</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="prov" required="" name="province">
                                                            <option value="{{$frenchise->province}}">{{$frenchise->province}}</option>
                                                            @php
                                                                $countries = App\Models\Country::groupBy('admin_name')->get();
                                                            @endphp 

                                                            @foreach($countries as $country)
                                                                <option>{{$country->admin_name}}</option> 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v5">City *</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="city"  required="" name="city" disabled="">
                                                            <option value="{{$frenchise->city}}">{{$frenchise->city}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Owner Address *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="address" id="v4" placeholder="Owner Address"value="{{$frenchise->address}}" required>
                                                    </div>
                                                 </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Home Address *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="home_address" id="v4" placeholder="Home Address" value="{{$frenchise->home_address}}">
                                                    </div>
                                                 </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Bank Account *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="bank_account_1" id="v4" placeholder="Bank Account" value="{{$frenchise->bank_account_1}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Bank Account <span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="bank_account_2" id="v4" placeholder="Bank Account" value="{{$frenchise->bank_account_2}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Mobile Number *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="mobile_number" id="v3" placeholder="Mobile Number"  value="{{$frenchise->mobile_number}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Mobile Number *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="mobile_number_1" id="v3" placeholder="Mobile Number"value="{{$frenchise->mobile_number_1}}">
                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Submit Amount *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="submit_amount" id="v3" placeholder="Submit Amount" value="{{$frenchise->submit_amount}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Remaining Amount *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="remaining_amount" id="v3" placeholder="Remaining Amount" value="{{$frenchise->remaining_amount}}"  required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Duration *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="duration" id="v3" placeholder="Duration" value="{{$frenchise->duration}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> PartnerShip *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="partner" id="v3" placeholder="PartnerShip" value="{{$frenchise->partner}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="percentage" onkeypress="return isNumberKey(event)"  placeholder="Percentage" id="total" value="{{$frenchise->percentage}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *<span>(This Percentage is Monthly)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="monthly_percentage" onkeypress="return isNumberKey(event)" placeholder="Monthly Percentage" id="monthly" value="{{$frenchise->monthly_percentage}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *<span>(This Percentage is Yearly)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="yearly_percentage" onkeypress="return isNumberKey(event)" placeholder="Yearly Percentage" id="yearly" value="{{$frenchise->yearly_percentage}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Percentage *<span>(This Percentage is Completion)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="completion_percentage" onkeypress="return isNumberKey(event)"  placeholder="Completion Percentage" id="completion" value="{{$frenchise->completion_percentage}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3"> Name Of Vitnes *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="vitnes" id="v3" placeholder="Name Of Vitnes" value="{{$frenchise->vitnes}}"  required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Father Name/ Huband Name Of Vitnes *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="father_vitnes" id="v3" placeholder="Father Name/ Huband Name Of Vitnes"  value="{{$frenchise->father_vitnes}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes CNIC *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control cnic" name="cnic_vitnes" id="v3" placeholder="Vitnes CNIC" value="{{$frenchise->cnic_vitnes}}"  required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes Address *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="vitnes_address" id="v3" placeholder="Vitnes Address"  value="{{$frenchise->vitnes_address}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes Mobile# *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="vitnes_mobile" id="v3" placeholder="Vitnes Mobile Number" value="{{$frenchise->vitnes_mobile}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Vitnes Mobile# *<span>(This Field is Optional)</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="vitnes_mobile_1" id="v3" placeholder="Mobile Number" value="{{$frenchise->vitnes_mobile_1}}"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v1">Franchise Name*</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="frenchise_name" id="v1" placeholder="Name" value="{{$frenchise->frenchise_name}}"  required>
                                                    </div>
                                                </div>         
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v3">Franchise Mobile Number *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control yourphone" name="frenchise_mobile_number" id="v3" placeholder="Mobile Number"  value="{{$frenchise->frenchise_mobile_number}}" required>
                                                    </div>
                                                </div>
                                         
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="v4">Expected Vendor Limit *</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control" name="vendor_limit" id="v4" placeholder="Limit" minlength="3" min="100" value="{{$frenchise->vendor_limit}}" required>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="dash_lname">Email Address *</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" type="email" name="email" id="dash_lname" placeholder="Email Address"  value="{{$frenchise->email}}" >
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Define Area Limit *</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="v6" name="area" placeholder="Area" rows="5" required value="{{$frenchise->area}}">{{ old('area') ?? $frenchise->area }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Message *<span>(This Field is Optional)</span></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="v6" name="frenchise_message" placeholder="Message" rows="5" value="{{$frenchise->frenchise_message}}">{{ old('frenchise_message') ?? $frenchise->frenchise_message }} </textarea>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Detail *<span>(This Field is Optional)</span></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="v6" name="frenchise_detail" placeholder="Message" rows="5"value="{{$frenchise->frenchise_detail}}">{{ old('frenchise_detail') ?? $frenchise->frenchise_detail }} </textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update</button>
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
            $('.yourphone').mask('(000) 000-0000');
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