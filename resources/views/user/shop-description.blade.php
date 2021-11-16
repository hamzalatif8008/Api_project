@extends('layouts.user')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Office Address -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Shop Information</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Shop Description</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <form class="form-horizontal" action="{{route('user-shop-descup')}}" method="POST">
                                        @include('includes.form-success')      
                                          {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="v2">Shop Name: </label>
                                                <label class="control-label col-sm-4" for="v2"><strong class=" pull-left"><a href="{{route('front.vendor',str_replace(' ', '-',($user->shop_name)))}}" target="_blank">{{$user->shop_name}}</a></strong> </label>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="v2">Owner Name *</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="owner_name" value="{{$user->owner_name}}" id="v2" placeholder="Owner Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="v3">Mobile Number *</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="shop_number" value="{{$user->shop_number}}" id="v3" placeholder="Mobile Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="v4">Address *</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="shop_address" value="{{$user->shop_address}}" id="v4" placeholder="Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="v5">Registration Number *<span>(Optional)</span></label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="reg_number" value="{{$user->reg_number}}" id="v5" placeholder="Registration Number" >
                                                </div>
                                            </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Shop Description *</label>
                                            <div class="col-sm-6">
                                              <textarea name="shop_details" id="street_address" class="form-control" rows="5" placeholder="Enter Street Address" style="resize: vertical;">{{$user->shop_details}}</textarea>
                                            </div>
                                          </div>

                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Office Address -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
@endsection