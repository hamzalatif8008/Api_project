@extends('layouts.user')
@section('styles')

    <style>
        @page { size: auto;  margin: 0mm; }
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
                a[href]:after {
                    content: none !important;
                }

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

            .footer {
                display: block;
                position: fixed;
                bottom: 0;
            }
            .table-row{
                height: 170px;
            }

            .order-date {
                font-size: 24px;
            }
        }



    </style>
@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Order# {{$order->order_number}} [{{$order->status}}]  <a href="{{ route('user-orders') }}" class="btn add-newProduct-btn" style="padding: 5px 12px;"  class="print-order-btn">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </a>  <a class="btn add-newProduct-btn" href="{{route('user-order-print',$order->id)}}" target="_blank" style=" padding: 5px 12px;" class="print-order-btn">
                                                    <i class="fa fa-print"></i> print invoice
                                                </a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Purchased Items <i class="fa fa-angle-right" style="margin: 0 2px;"></i>Purchase Details</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        @include('includes.form-success')
                                        <div class="row">
                                            <div class="col-md-10" style="margin-left: 2.5%;">
                                                <div class="dashboard-content">
                                                    <div class="view-order-page" id="print">
                                                        <p class="order-date">Order Date {{date('d-M-Y',strtotime($order->created_at))}}</p>

@if($order->dp == 1)

                                                        <div class="billing-add-area">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h5>Billing Address</h5>
                                                                    <address>
                                                                        Name: {{$order->customer_name}}<br>
                                                                        Email: {{$order->customer_email}}<br>
                                                                        Phone: {{$order->customer_phone}}<br>
                                                                        Address: {{$order->customer_address}}<br>
                                                                        {{$order->customer_city}}-{{$order->customer_zip}}
                                                                    </address>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>Payment Information</h5>
                                                                    <p>Paid Amount: {{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</p>
                                                                    <p>Payment Method: {{$order->method}}</p>

                                                                    @if($order->method != "Cash On Delivery")
                                                                        @if($order->method=="Stripe")
                                                                            {{$order->method}} Charge ID: <p>{{$order->charge_id}}</p>
                                                                        @endif
                                                                        {{$order->method}} Transaction ID: <p id="ttn">{{$order->txnid}}</p><a id="tid" style="cursor: pointer;">Edit Transaction ID</a> <a style="display: none; cursor: pointer;" id="tc" >Cancel</a>
                                                                        <form id="tform">
                                                                        <input style="display: none; width: 100%;" type="text" id="tin" placeholder="Enter Transaction ID & Press Enter" required="">
                                                                        <input type="hidden" id="oid" value="{{$order->id}}">
                                                                        <button style="margin-top: 5px; display: none;" id="tbtn" type="submit" class="btn btn-default btn-sm">Submit</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

@else
                                                        <div class="shipping-add-area">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if($order->shipping == "shipto")
                                                                        <h5>Shipping Address</h5>
                                                                        <address>
                Name: {{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}<br>
                Email: {{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}}<br>
                Phone: {{$order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone}}<br>
                Address: {{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}<br>
{{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}-{{$order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip}}
                                                                        </address>
                                                                    @else
                                                                        <h5>PickUp Location</h5>
                                                                        <address>
                                                                            Address: {{$order->pickup_location}}<br>
                                                                        </address>
                                                                    @endif

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>Shipping Method</h5>
                                                                    @if($order->shipping == "shipto")
                                                                        <p>Ship To Address</p>
                                                                    @else
                                                                        <p>Pick Up</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="billing-add-area">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h5>Billing Address</h5>
                                                                    <address>
                                                                        Name: {{$order->customer_name}}<br>
                                                                        Email: {{$order->customer_email}}<br>
                                                                        Phone: {{$order->customer_phone}}<br>
                                                                        Address: {{$order->customer_address}}<br>
                                                                        {{$order->customer_city}}-{{$order->customer_zip}}
                                                                    </address>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>Payment Information</h5>
                                                                    <p>Paid Amount: {{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</p>
                                                                    <p>Payment Method: {{$order->method}}</p>

                                                                    @if($order->method != "Cash On Delivery")
                                                                        @if($order->method=="Stripe")
                                                                            {{$order->method}} Charge ID: <p>{{$order->charge_id}}</p>
                                                                        @endif
                                                                        {{$order->method}} Transaction ID: <p id="ttn">{{$order->txnid}}</p><a id="tid" style="cursor: pointer;">Edit Transaction ID</a> <a style="display: none; cursor: pointer;" id="tc" >Cancel</a>
                                                                        <form id="tform">
                                                                        <input style="display: none; width: 100%;" type="text" id="tin" placeholder="Enter Transaction ID & Press Enter" required="">
                                                                        <input type="hidden" id="oid" value="{{$order->id}}">
                                                                        <button style="margin-top: 5px; display: none;" id="tbtn" type="submit" class="btn btn-default btn-sm">Submit</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
@endif
                                                        <br>
                                                        <div class="table-responsive">
                            <table id="example" class="table">
                                <h4 class="text-center">Products Ordered</h4><hr>
                                <thead>
                                <tr>
                                    <th width="10%">ID#</th>
                                    <th>Product Title</th>
                                    <th width="10%">Quantity</th>
                                    <th width="10%">Size</th>
                                    <th width="10%">Color</th>
                                    <th width="20%">Product Price</th>
                                    <th width="10%">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart->items as $product)
                                    <tr>
                                            <td>{{ $product['item']['id'] }}</td>
                                            <td>
                                                <input type="hidden" value="{{ $product['license'] }}">
                                                <a target="_blank" href="{{route('front.product',['id' => $product['item']['id'], $product['item']['name']])}}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a>
                                                @if($product['item']['type'] != 0)
                                                @if($order->payment_status == 'Completed')
                                                    @if($product['item']['file'] != null)
                                                <a href="{{ route('user-order-download',['slug' => $order->order_number , 'id' => $product['item']['id']]) }}" class="btn add-newProduct-btn" style="padding: 5px 12px;"  class="print-order-btn">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                                    @else
                                            <a target="_blank" href="{{ $product['item']['link'] }}" class="btn add-newProduct-btn" style="padding: 5px 12px;"  class="print-order-btn">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                                    @endif
                                                @if($product['license'] != '')
                              <a href="javascript:;" data-toggle="modal" data-target="#confirm-delete" class="btn btn-info product-btn" id="license" style="padding: 5px 12px;"><i class="fa fa-eye"></i> View License</a>                                                
                                                @endif
                                                @endif
                                                @endif
                                            </td>
                                            <td>{{$product['qty']}} {{ $product['item']['measure'] }}</td>
                                            <td>{{$product['size']}}</td>
                                            <td><span style="width: 40px; height: 20px; display: block; border: 10px solid {{$product['color'] == "" ? "white" : $product['color']}};"></span></td>
                                            <td>{{$order->currency_sign}}{{round($product['item']['cprice'] * $order->currency_value,2)}}</td>
                                            <td>{{$order->currency_sign}}{{round($product['price'] * $order->currency_value,2)}}</td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ending of Dashboard data-table area -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">License Key</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Your Licenes Key is :  <span id="key"></span></p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script type="text/javascript">
$('#example').dataTable( {
  "ordering": false,
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'  : true
} );
</script>
    <script type="text/javascript">
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
    $(document).on("click", "#tid" , function(e){
        $(this).hide();
        $("#tc").show();
        $("#tin").show();
        $("#tbtn").show();  
    });
    $(document).on("click", "#tc" , function(e){
        $(this).hide();
        $("#tid").show();
        $("#tin").hide();  
        $("#tbtn").hide();       
    });
    $(document).on("submit", "#tform" , function(e){
        var oid = $("#oid").val();
        var tin = $("#tin").val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/trans')}}",
                    data:{id:oid,tin:tin},
                    success:function(data){
                        $("#ttn").html(data);
                        $("#tin").val("");
                        $("#tid").show();
                        $("#tin").hide(); 
                        $("#tbtn").hide(); 
                        $("#tc").hide(); 
                      }
              });     
        return false;      
    });
    </script>
    <script type="text/javascript">
        $(document).on('click','#license' , function(e){
            var id = $(this).parent().find('input[type=hidden]').val();
            $('#key').html(id);    
    });

    </script>
@endsection
