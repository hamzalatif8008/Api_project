<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="GeniusOcean">

        <title>{{$gs->title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/print/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/print/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/print/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/print/css/style.css')}}">
  <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 
  <style type="text/css">
@page { size: auto;  margin: 0mm; }
@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 287mm;
  }

html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
  </style>
</head>
<body onload="window.print();">
                                        <div class="invoice-wrap">
                                            <div class="invoice__title">
                                                <div class="row reorder-xs">
                                                    <div class="col-sm-6">
                                                        <div class="invoice__logo text-left">
                                                            <img src="{{asset('assets/images/'.$gs->logo)}}" alt="woo commerce logo">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="invoice__metaInfo">
                                                        <div class="buyer" style="width: 70%;">
                                                            <p>Billing Address</p>
                                                            <strong>{{$order->customer_name}}</strong>
                                                            <address>
                                                                {{$order->customer_address}}<br>
                                                                {{$order->customer_city}}<br>
                                                                {{$order->customer_country}}<br>
                                                            </address>
                                                        </div>

                                                        <div class="invoce__date"  style="width: 20%;">
                                                            <strong>Invoice ID</strong>
                                                            <p>Order Date</p>
                                                            <p>Order ID</p>
                                                        </div>

                                                        <div class="invoce__number"  style="width: 10%;">
                                                            <strong>{{sprintf("%'.08d", $order->id)}}</strong>
                                                            <p>{{date('d-M-Y',strtotime($order->created_at))}}</p>
                                                            <p>{{$order->order_number}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="invoice__table">
                                                        <div class="table-responsive">
                                                          <table class="table table-hover">
                                                            <thead>
                                                              <tr>
                                                                <th>Product</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Line Total</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                    @php
                                    $subtotal = 0;
                                    $tax = 0;
                                    @endphp                                   
                                @foreach($cart->items as $product)
                                    <tr>
                                            <td>{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</td>
                                            <td>{{$order->currency_sign}}{{ round($product['item']['cprice'] * $order->currency_value , 2) }}</td>
                                            <td>{{$product['qty']}} {{ $product['item']['measure'] }}</td>
                                            <td>{{$order->currency_sign}}{{ round($product['price'] * $order->currency_value , 2) }}</td>
                                            @php
                                            $subtotal += round($product['price'] * $order->currency_value, 2);
                                            @endphp

                                    </tr>

                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                <td colspan="3">Subtotal</td>
                                                                <td>{{$order->currency_sign}}{{ round($subtotal, 2) }}</td>
                                                              </tr>
                                                              @if($order->shipping_cost != 0)
                                                              <tr>
                                                                <td colspan="3">Shipping Cost({{$order->currency_sign}})</td>
                                                                <td>{{ round($order->shipping_cost, 2) }}</td>
                                                              </tr>
                                                              @endif
                                                              @if($order->tax != 0)
                                                              <tr>
                                                                <td colspan="3">TAX({{$order->currency_sign}})</td>
                                                                @php 
                                                                $subtotal = $subtotal + $order->shipping_cost;
                                                                $tax = ($subtotal / 100) * $order->tax;
                                                                @endphp
                                                                <td>{{round($tax, 2)}}</td>
                                                              </tr>
                                                              @endif
                                                              @if($order->coupon_discount != null)
                                                              <tr>
                                                                <td colspan="3">Coupon Discount({{$order->currency_sign}})</td>
                                                                <td>{{round($order->coupon_discount, 2)}}</td>
                                                              </tr>
                                                              @endif
                                                              <tr>
                                                                <td colspan="2"></td>
                                                                <td>Total</td>
                                                                <td>{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</td>
                                                              </tr>
                                                            </tfoot>         
                                                          </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="invoice__orderDetails">
                                                        <p><strong>Order Details</strong></p>
@if($order->dp == 0)
                                                        <p>Shipping Method:                                    @if($order->shipping == "pickup")
                                        Pick Up
                                    @else
                                        Ship To Address
                                    @endif</p>
@endif
                                                        <p>Payment Method: {{$order->method}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="invoice__shipping">
                                                    @if($order->dp == 0)
                                                        <p style="text-align: left;"><strong>Shipping Address</strong></p>
                                                        <p style="text-align: left;">{{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}</p>
                                                        <address>
                                                            {{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}<br>
                                                            {{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}<br>
                                                            {{$order->shipping_country == null ? $order->customer_country : $order->shipping_country}}<br>
                                                        </address>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<!-- ./wrapper -->

<script type="text/javascript">
setTimeout(function () {
        window.close();
      }, 500);
</script>
</body>
</html>
