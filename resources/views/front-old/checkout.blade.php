@extends('layouts.front')
@section('content')
 <!-- Starting of checkOut area -->
    <div class="section-padding product-checkOut-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="signIn-title">{{$lang->odetails}}</h2>
                    <hr/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{$lang->cproduct}}</th>
                                    <th>{{$lang->cupice}}</th>
                                    <th>{{$lang->cquantity}}</th>
                                    <th width="30%">{{$lang->cst}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                    <td><a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}" target="_blank">{{ $product['item']['name'] }}</a></td>
                                    <td>{{ round($product['item']['cprice'] * $curr->value , 2) }}</td>
                                    <td>{{ $product['qty'] }}  {{ $product['item']['measure'] }}</td>
                                    <td>
                                        @if($gs->sign == 0)
                                        {{$curr->sign}}{{ round($product['price'] * $curr->value , 2) }}
                                        @else
                                        {{ round($product['price'] * $curr->value , 2) }}{{$curr->sign}}
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>

                                <tr id="shipshow" {!!$shipping_cost == 0 ? 'style="display:none;"' : ''!!}>
                                    <th colspan="3">{{$lang->ship}}:</th>
                                    <th>
                                        @if($gs->sign == 0)
                                        {{$curr->sign}}<span id="ship-cost">{{round($shipping_cost * $curr->value,2)}}</span>
                                        @else
                                        <span id="ship-cost">{{round($shipping_cost * $curr->value,2)}}</span>{{$curr->sign}}
                                        @endif
                                    </th>
                                </tr>
                                @if($gs->tax != 0)
                                <tr id="taxshow">
                                    <th colspan="3">{{$lang->tax}}:</th>
                                    <th>
                                        {{$gs->tax}}%
                                    </th>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="3"><h3>{{$lang->vt}}:</h3></td>
                                    <td class="coupon-td">
                                        <h3>
                                            @if($gs->sign == 0)
                                            {{$curr->sign}}<span id="total-cost">{{round($totalPrice  * $curr->value ,2)}}</span>
                                            @else
                                            <span id="total-cost">{{round($totalPrice * $curr->value,2)}}</span>{{$curr->sign}}
                                            @endif
                                        </h3>
                                        <div class="coupon-click" id="coupon-click1">
                                            <p>{{$lang->cpn}} <span>*</span></p>
                                        </div>
                                    </td>
                                </tr>


                                <tr id="discount" style="display: none;">
                                    <th colspan="3">{{$lang->ds}}(<span id="sign"></span>):</th>
                                    <th>
                                        @if($gs->sign == 0)
                                        {{$curr->sign}}<span id="ds"></span>
                                        @else
                                        <span id="ds"></span>{{$curr->sign}}
                                        @endif
                                    </th>
                                </tr>
                                <tr id="ftotal" style="display: none;">
                                    <td colspan="3"><h3>{{$lang->ft}}:</h3></td>
                                    <td class="coupon-td">
                                        <h3>
                                            @if($gs->sign == 0)
                                            {{$curr->sign}}<span id="ft"></span>
                                            @else
                                            <span id="ft"></span>{{$curr->sign}}
                                            @endif
                                        </h3>
                                        <div class="coupon-click" id="coupon-click2" style="display: none;">
                                            <p>{{$lang->cpn}} <span>*</span></p>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

<div class="col-lg-4 col-lg-offset-8 col-md-4 col-md-offset-8 col-sm-5 col-sm-offset-7">
                    <div class="coupon-code text-right">
                        <form id="coupon">
                            <div class="form-group coupon-group">
                                <input class="form-control" type="text" id="code" placeholder="{{$lang->ecpn}}" required="" autocomplete="off">
                                <input type="hidden" id="">
                                <button class="btn btn-md order-btn" type="submit">{{$lang->acpn}}</button>
                             </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="billing-details-area">
                     <h2 class="signIn-title">{{$lang->bdetails}}</h2>
                     <hr/>
                        <form action="" method="post" id="payment_form">
                                    {{csrf_field()}}
                                            <div class="form-group" {!!$digital == 1 ? 'style="display:none;"' : ''!!}>
                                                <select class="form-control" onchange="sHipping(this)" id="shipop" name="shipping" required="">
                                                    <option value="shipto" selected="">{{$lang->ships}}</option>
                                                    <option value="pickup">{{$lang->pickup}}</option>
                                                </select>
                                            </div>

                                        <div id="pick" style="display:none;">
                                            <div class="form-group">
                                                <select class="form-control" name="pickup_location">
                                                    <option value="">{{$lang->pickups}}</option>
                                                    @foreach($pickups as $pickup)
                                                    <option value="{{$pickup->location}}">{{$pickup->location}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                            @if(Auth::guard('user')->check())
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->fname}} <span>*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::guard('user')->user()->name}}" placeholder="{{$lang->fname}}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->doph}}  <span>*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{Auth::guard('user')->user()->phone}}" placeholder="{{$lang->doph}} " required="">
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->doeml}} <span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{Auth::guard('user')->user()->email}}" placeholder="{{$lang->doeml}} " required="">
                                </div>

                                <div class="form-group">
                                    <label for="shipping_addresss">{{$lang->doad}}  <span>*</span></label>
                                    <textarea placeholder="{{$lang->doad}} " class="form-control" name="address" id="shipping_addresss" cols="30" rows="2" style="resize: vertical;">{{Auth::guard('user')->user()->address}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->doct}}  <span>*</span></label>
                                    <input type="text" class="form-control" name="city" value="{{Auth::guard('user')->user()->city}}" placeholder="{{$lang->doct}} " required="">
                                </div>

                            <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->ctry}}  <span>*</span></label>
                                    <select class="form-control" required="" name="customer_country">
                                        <option value="" selected="selected">{{$lang->sctry}}</option>
                                        @include('includes.countries')
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->suph}}  <span>*</span></label>
                                    <input type="text" class="form-control" name="zip" value="{{Auth::guard('user')->user()->zip}}" placeholder="Postal Code" required="">
                                </div>

                                <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
                            @else
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->fname}} <span>*</span></label>
                                    <input type="text" class="form-control" name="name" value="" placeholder="{{$lang->fname}}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->doph}}  <span>*</span></label>
                                    <input type="text" class="form-control" name="phone" value="" placeholder="{{$lang->doph}} " required="">
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->doeml}}  <span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="" placeholder="{{$lang->doeml}} " required="">
                                </div>

                                <div class="form-group">
                                    <label for="shipping_addresss">{{$lang->doad}}  <span>*</span></label>
                                    <textarea placeholder="{{$lang->doad}} " class="form-control" name="address" id="shipping_addresss" cols="30" rows="2" style="resize: vertical;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->doct}}  <span>*</span></label>
                                    <input type="text" class="form-control" name="city" value="" placeholder="{{$lang->doct}} " required="">
                                </div>
                            <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->ctry}}  <span>*</span></label>
                                    <select class="form-control" required="" name="customer_country">
                                        <option value="" selected="selected">{{$lang->sctry}}</option>
                                        @include('includes.countries')
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->suph}}  <span>*</span></label>
                                    <input type="text" class="form-control" name="zip" value="" placeholder="Postal Code" required="">
                                </div>
                                <input type="hidden" name="user_id" value="0">
                            @endif
                            <div class="form-group">
                                <label>{{$lang->cup}} <span>*</span></label>
                                <select name="method" onchange="meThods(this)" class="form-control" required="">
                                    <option value="" selected="">{{$lang->cup}}</option>
                                    @if($gs->pcheck != 0)
                                        <option value="Paypal">{{$lang->pp}}</option>
                                    @endif
                                    @if($gs->scheck != 0)
                                        <option value="Stripe">{{$lang->app}}</option>
                                    @endif
                                    @if($gs->ccheck != 0)
                                        <option value="Cash">{{$lang->dolpl}}</option>
                                    @endif
                                    @foreach($gateways as $gt)
                                    <option  value="{{$gt->id}}">
                                        {{$gt->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="gateway" style="display: none;">

                                <div class="form-group gtext" id="gshow" style="display: none;">

                                </div>

                                <div class="form-group">
                                    <label for="shippingFull_name">{{$lang->tid}} <span>*</span></label>
                                    <input type="text" class="form-control" name="txn_id4" placeholder="{{$lang->tid}}">
                                </div>
                            </div>
                            <div id="stripes" style="display: none;">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="card" placeholder="Card">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cvv" placeholder="Cvv">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="month" placeholder="Month">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="year" placeholder="Year">
                                </div>
                            </div>
                            <input type="hidden" id="shipping-cost" name="shipping_cost" value="{{round($shipping_cost * $curr->value,2)}}">
                            <input type="hidden" name="dp" value="{{$digital}}">
                            <input type="hidden" name="tax" value="{{$gs->tax}}">
                            <input type="hidden" name="totalQty" value="{{$totalQty}}">
                            <input type="hidden" name="total" id="grandtotal" value="{{round($totalPrice * $curr->value,2)}}">
                            <input type="hidden" name="coupon_code" id="coupon_code" value="">
                            <input type="hidden" name="coupon_discount" id="coupon_discount" value="">
                            <input type="hidden" name="coupon_id" id="coupon_id" value="">
                            <div id="paypals">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="no_note" value="1">
                                <input type="hidden" name="lc" value="UK">
                                <input type="hidden" name="currency_code" value="{{$curr->name}}">
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
                            </div>
                 </div>
            </div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" {!!$shipping_cost == 0 ? 'style="margin-top:39px;"' : ''!!}>

                                    <div class="shipping-title" {!!$shipping_cost == 0 ? 'style="display:none;"' : ''!!}>
                                        <label id="ship-diff">
                                            <input class="shippingCheck" type="checkbox" value="check"> {{$lang->shipss}}
                                        </label>
                                        <label id="pick-info" style="display: none;">
                                           {{$lang->pickupss}}
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="shipping-details-area" style="display: none;">
                                        <div class="form-group">
                                            <label for="shippingFull_name">{{$lang->fname}}  <span>*</span></label>
                                            <input class="form-control" type="text" name="shipping_name" id="shippingFull_name" placeholder="{{$lang->fname}} ">
                                        </div>
                                        <div class="form-group">
                                            <label for="shipingPhone_number">{{$lang->doph}}  <span>*</span></label>
                                            <input class="form-control" type="number" name="shipping_email" id="shipingPhone_number" placeholder="{{$lang->doph}} ">
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_email">{{$lang->doeml}}  <span>*</span></label>
                                            <input class="form-control" type="email" name="shipping_phone" id="ship_email" placeholder="{{$lang->doeml}} ">
                                        </div>
                                        <div class="form-group">
                                            <label for="shipping_address">{{$lang->doad}}  <span>*</span></label>
                                            <textarea placeholder="{{$lang->doad}} " class="form-control" name="shipping_address" id="shipping_address" cols="30" rows="2" style="resize: vertical;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="shippingFull_name">{{$lang->ctry}}  <span>*</span></label>
                                            <select class="form-control" name="shipping_country"> 
                                                <option value="" selected="selected">{{$lang->sctry}}</option> 
                                                @include('includes.countries')
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="shipping_city">{{$lang->doct}}  <span>*</span></label>
                                            <input class="form-control" type="text" name="shipping_city" id="shipping_city" placeholder="{{$lang->doct}} ">
                                        </div>
                                        <div class="form-group">
                                            <label for="shippingPostal_code">{{$lang->suph}}  <span>*</span></label>
                                            <input class="form-control" type="text" name="shipping_zip" id="shippingPostal_code" placeholder="{{$lang->suph}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="order_notes">{{$lang->onotes}} <span>*</span></label>
                                        <textarea class="form-control order-notes" name="order_notes" id="order_notes" cols="30" rows="5" style="resize: vertical;"></textarea>
                                    </div>


                                <div class="row text-center">
                                    <div class="form-group">
                                        <input class="btn btn-md order-btn" type="submit" value="{{$lang->onow}}">
                                    </div>
                                    
                                </div>
                                </form>
                </div>
                </div>
            </div>
        </div>
      <!-- Ending of product shipping form -->

@endsection

@section('scripts')
<script type="text/javascript">
    $("#coupon").submit( function () {
        val = $("#code").val();
        total = $("#grandtotal").val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/coupon')}}",
                    data:{code:val, total:total},
                    success:function(data){
                        if(data == 0)
                        {
                            $.notify("{{$gs->no_coupon}}","error");
                            $("#code").val("");
                        }
                        else if(data == 2)
                        {
                            $.notify("{{$gs->coupon_already}}","error");
                            $("#code").val("");
                        }
                        else
                        {
                            $("#coupon_code").val(data[1]);
                            $("#coupon_id").val(data[3]);
                            $("#coupon_discount").val(data[2]);
                            $("#discount").show("slow");
                            $("#ds").html(data[2]);
                            $("#ftotal").show("slow");
                            $("#sign").html(data[4]);
                            var x = $("#shipop").val();
                            var y = data[0];
                            $("#ft").html(y.toFixed(2));
                            $("#grandtotal").val(y);
                            $.notify("{{$gs->coupon_found}}","success");
                            $("#code").val("");
                            $("#coupon-click1").hide();
                            $("#coupon-click2").show();

                        }
                      }
              }); 
        return false;
    });
</script>

    <script type="text/javascript">
        function meThods(val) {
            var action1 = "{{route('payment.submit')}}";
            var action2 = "{{route('stripe.submit')}}";
            var action3 = "{{route('cash.submit')}}";
            var action6 = "{{route('gateway.submit')}}";
             if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#stripes").hide();
                $("#gateway").hide();
            }
            else if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#stripes").show();
                $("#gateway").hide();
            }
            else if (val.value == "Cash") {
                $("#payment_form").attr("action", action3);
                $("#stripes").hide();
                $("#gateway").hide();
            }
            else if (val.value == "") {
                $("#payment_form").attr("action", '');
                $("#gateway").hide();
                $("#stripes").hide(); 
            }
            else {
                $("#payment_form").attr("action", action6);
                var id = val.value;
                $(".gtext").hide();
                $("#gateway").show();
                $("#stripes").hide();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/transhow')}}",
                    data:{id:id},
                    success:function(data){
                             $("#gshow").html(data);  
                             $("#gshow").show();    
                      }
              });   
                           
            }
        }

        function sHipping(val) {
            var shipcost = parseFloat($("#ship-cost").html());
            var totalcost = parseFloat($("#total-cost").html());
            var finalcost = parseFloat($("#ft").html());
            var total = 0;
            var ft = 0;
            var ck = $("#ft").html();
            if (val.value == "shipto") {
                if(ck == "")
                {
                    total = shipcost + totalcost;
                    ft = shipcost + finalcost;
                    $("#pick").hide();
                    $("#ship-diff").show();
                    $("#pick-info").hide();
                    $("#shipshow").show();
                    $("#shipping-cost").html(shipcost);
                    $("#total-cost").html(total);
                    $("#ft").html(ft);
                    $("#grandtotal").val(total);
                    $("#shipto").find("input").prop('required',true);
                    $("#pick").find("select").prop('required',false);
                }
                else
                {
                    total = shipcost + totalcost;
                    ft = shipcost + finalcost;
                    $("#pick").hide();
                    $("#ship-diff").show();
                    $("#pick-info").hide();
                    $("#shipshow").show();
                    $("#shipping-cost").html(shipcost);
                    $("#total-cost").html(total);
                    $("#ft").html(ft);
                    $("#grandtotal").val(ft);
                    $("#shipto").find("input").prop('required',true);
                    $("#pick").find("select").prop('required',false);
                }
            }

            if (val.value == "pickup") {
                if(ck == "")
                {
                    total = totalcost - shipcost;
                    ft =  finalcost - shipcost;
                    $("#pick").show();
                    $("#pick-info").show();
                    $("#ship-diff").hide();
                    $("#shipshow").hide();
                    $("#shipping-cost").html('0');
                    $("#total-cost").html(total.toFixed(2));
                    $("#ft").html(ft.toFixed(2));
                    $("#grandtotal").val(total.toFixed(2));
                    $("#shipto").find("input").prop('required',false);
                    $("#pick").find("select").prop('required',true);
                }
                else
                {
                    total = totalcost - shipcost;
                    ft =  finalcost - shipcost;
                    $("#pick").show();
                    $("#pick-info").show();
                    $("#ship-diff").hide();
                    $("#shipshow").hide();
                    $("#shipping-cost").html('0');
                    $("#total-cost").html(total.toFixed(2));
                    $("#ft").html(ft.toFixed(2));
                    $("#grandtotal").val(ft.toFixed(2));
                    $("#shipto").find("input").prop('required',false);
                    $("#pick").find("select").prop('required',true);                    
                }
            }
        }
            $(document).on('click','#coupon-click1',function(){
                $('.coupon-code form').slideToggle();
            });
            $(document).on('click','#coupon-click2',function(){
                $('.coupon-code form').slideToggle();
            });
    </script>
@if(isset($checked))
<script type="text/javascript">
    $(window).on('load',function(){
        $('#checkoutModal').modal('show');
    });

</script>
@endif
@endsection