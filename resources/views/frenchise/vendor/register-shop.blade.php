@extends('layouts.frenchise')

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
                                                    <h2>Add Vendor<a href="{{ route('frenchise-dashboard') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchise <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor  <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Add</p>
                                                </div>
                                            </div>
                                                @include('includes.frenchise-notification')
                                               
                                        </div>   
                                    </div>
                                     @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <form class="form-horizontal" action="{{route('shop.registration')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="option">Select Vendor Type *</label>
                                        <div class="col-sm-6">
                                            <select name="v_type" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="1">Wholesaler</option>
                                                <option value="2">Unit</option>
                                                <option value="3">Factory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_email11">{{$lang->doeml}} <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" placeholder="{{$lang->doeml}}" type="email" name="email" id="reg_email11" required>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_name11">Owner Name <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" placeholder="Owner Name" type="text" name="owner_name" id="reg_name11" required>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_Pnumber11">{{$lang->shop_number}} <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control yourphone" placeholder="{{$lang->shop_number}}" type="text" name="shop_number" id="reg_Pnumber11" data-mask="0000-0000000" required>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_email11">{{$lang->vshop_name}} <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" placeholder="{{$lang->vshop_name}}" type="text" name="shop_name" id="reg_name11" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="shippingFull_name">Province  <span>*</span></label>
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
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_Padd11">Vendor City <span>*</span></label>
                                        <div class="col-sm-6">
                                       <select class="form-control" id="city"  required="" name="city" disabled="">
                                            <option value="">Select City</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_Padd11">Shop Address <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" placeholder="{{$lang->doad}}" type="text" name="shop_address" id="reg_Padd11" required>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="reg_password11">{{$lang->sup}} <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" placeholder="{{$lang->sup}}" type="password" name="password" id="reg_password11" required>
                                        </div>
                                    </div>
                                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                        <label class="control-label col-sm-4" for="confirm_password11">{{$lang->sucp}} <span>*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" placeholder="{{$lang->sucp}}" type="password" name="password_confirmation" id="confirm_password11" required>
                                        </div>
                                    </div>
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
@endsection
