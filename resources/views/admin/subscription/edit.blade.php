@extends('layouts.admin')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Update Subscription Plan<a href="{{ route('admin-subscription-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Subscriptions <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-subscription-edit',$subs->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="title">Title*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="title" id="title" placeholder="Enter Subscription Title " required="" type="text" value="{{ $subs->title }}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="currency">Currency Symbol*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="currency" id="currency" placeholder="Enter Subscription Currency " required="" type="text" value="{{ $subs->currency }}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="currency_code">Currency Code*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="currency_code" id="currency_code" placeholder="Enter Subscription Currency Code" required="" type="text" value="{{ $subs->currency_code }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="price">Cost*<span>(Entering 0 will Show This Plan is Free)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="price" id="price" placeholder="Enter Subscription Cost " type="text" value="{{ $subs->price }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="days">Days*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="days" id="days" placeholder="Enter Subscription Days " required="" type="text" value="{{ $subs->days }}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="limit">Product Limitations*</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="limit" id="limit" required="">
                                                <option value="">Select an Option</option>
                                                <option value="0" {{ $subs->allowed_products == 0 ? "selected" : "" }}>Unlimited</option>
                                                <option value="1" {{ $subs->allowed_products != 0 ? "selected" : "" }}>Limited</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group" id="limits" {!! $subs->allowed_products == 0 ? 'style="display: none;"' : '' !!}>
                                            <label class="control-label col-sm-4" for="allowed_products">Allowed Products*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="allowed_products" id="allowed_products" placeholder="Enter Subscription Allowed Products " type="text" value="{{ $subs->allowed_products }}" {{ $subs->allowed_products != 0 ? "required" : "" }}>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="details">Details*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="details" id="details" rows="5" style="resize: vertical;" placeholder="Enter Subscription Details">{{ $subs->details }}</textarea>
                                            </div>
                                          </div>                                          <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')



<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('details');
        });
  //]]>

$("#limit").change(function() {
  val = $(this).val();
    if(val == 1) {
        $("#limits").show();
        $("#allowed_products").prop("required", true);
        $("#allowed_products").val("");
    }
    else
    {
        $("#limits").hide();
        $("#allowed_products").prop("required", false);
        $("#allowed_products").val("0");

    }
});
</script>

@endsection

