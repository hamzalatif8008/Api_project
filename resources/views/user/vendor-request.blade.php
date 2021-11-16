@extends('layouts.user')
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
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>{{$subs->title}} Plan <a href="{{ route('user-package') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Subscription Plans <i class="fa fa-angle-right" style="margin: 0 2px;"></i> {{$subs->title}} Plan</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                    <form class="form-horizontal" id="subscribe_form" action="{{route('user-vendor-request-submit')}}" method="POST">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Plan:</label>
                                            <p class="control-label col-sm-6" style="text-align: left;">{{$subs->title}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Price:</label>
                                            <p class="control-label col-sm-6" style="text-align: left;">{{$subs->price}}{{$subs->currency}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Durations:</label>
                                            <p class="control-label col-sm-6" style="text-align: left;">{{$subs->days}} Day(s)</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Product(s) Allowed:</label>
                                            <p class="control-label col-sm-6" style="text-align: left;">{{ $subs->allowed_products == 0 ? 'Unlimited':  $subs->allowed_products}}</p>
                                        </div>

                                        @if(!empty($package))
                                            @if($package->subscription_id != $subs->id)
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4"></label>
                                                    <small class="control-label col-sm-6" style="text-align: left;"><b>Note:</b> Your Previous Plan will be deactivated!</small>
                                                </div>
                                            @endif
                                        @endif
                                        @if($user->is_vendor == 0)
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v1">Shop Name *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="shop_name" id="v1" placeholder="Shop Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v2">Owner Name *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="owner_name" id="v2" placeholder="Owner Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v3">Mobile Number *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="shop_number" id="v3" placeholder="Mobile Number" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v4">Address *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="shop_address" id="v4" placeholder="Address" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v5">Registration Number *<span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="reg_number" id="v5" placeholder="Registration Number" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Message *<span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                            <textarea class="form-control" id="v6" name="shop_message" placeholder="Message" rows="5"></textarea>
                                            </div>
                                        </div>
                                        @endif
                                        <input type="hidden" name="subs_id" value="{{ $subs->id }}">
                                        @if($subs->price != 0)
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="option">Select Payment Method *</label>
                                            <div class="col-sm-6">
                                                <select name="method" id="option" onchange="meThods(this)" class="form-control" required="">
                                                    <option value="">Select an option</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Stripe">Stripe</option>
                                                </select>
                                            </div>
                                        </div>
                                            <div id="stripes" style="display: none;">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="scard">Card *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="scard" name="card" placeholder="Card">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="scvv">Cvv *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="scvv" name="cvv" placeholder="Cvv">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="smonth">Month *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="smonth" name="month" placeholder="Month">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="syear">Year *</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="syear" name="year" placeholder="Year">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="paypals">
                                                <input type="hidden" name="cmd" value="_xclick">
                                                <input type="hidden" name="no_note" value="1">
                                                <input type="hidden" name="lc" value="UK">
                                                <input type="hidden" name="currency_code" value="{{strtoupper($subs->currency_code)}}">
                                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
                                            </div>
                                            @endif
                                        <hr/>
                                        <div class="add-product-footer">
                                            @if($subs->price != 0)
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                            @else
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Activate</button>
                                            @endif
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

@if($subs->price != 0)
<script type="text/javascript">
        function meThods(val) {
            var action1 = "{{route('user.paypal.submit')}}";
            var action2 = "{{route('user.stripe.submit')}}";

             if (val.value == "Paypal") {
                $("#subscribe_form").attr("action", action1);
                $("#scard").prop("required", false);
                $("#scvv").prop("required", false);
                $("#smonth").prop("required", false);
                $("#syear").prop("required", false);
                $("#stripes").hide();
            }
            else if (val.value == "Stripe") {
                $("#subscribe_form").attr("action", action2);
                $("#scard").prop("required", true);
                $("#scvv").prop("required", true);
                $("#smonth").prop("required", true);
                $("#syear").prop("required", true);
                $("#stripes").show();
            }
        }    
</script>
@endif

@endsection