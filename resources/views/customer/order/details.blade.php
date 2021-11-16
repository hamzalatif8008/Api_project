@extends('layouts.customer')
        
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
                                    <div class="product__header" style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Order Details <a href="{{ route('customer-order-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a> <a href="{{ route('customer-order-invoice',$order->id) }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-file"></i> Invoice</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Order Details</p>
                                                </div>
                                            </div>
                                              @include('includes.customer-notification')
                                        </div>   
                                    </div>
                        <main>

                                      @include('includes.form-success')

                                    <div class="order-table-wrap">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody><tr class="tr-head">
                                                            <th class="order-th" width="45%">Order ID</th>
                                                            <th width="10%">:</th>
                                                            <th class="order-th" width="45%">{{$order->order_number}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Total Product</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->totalQty}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Total Cost</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Ordered Date</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Payment Method</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->method}}</td>
                                                        </tr>
                        @if($order->method != "Cash On Delivery")
                        @if($order->method=="Stripe")
                                                        <tr>
                                                        <th width="45%">{{$order->method}} Charge ID</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->charge_id}}</td>
                                                        </tr>                        
                        @endif
                                                        <tr>
                                                        <th width="45%">{{$order->method}} Transaction ID</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->txnid}}</td>
                                                        </tr>                         
                        @endif

 
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody><tr class="tr-head">
                                                            <th class="order-th" width="45%">Billing Address</th>
                                                            <th width="10%"></th>
                                                            <th width="45%"></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Name</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Email</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Phone</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Address</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Country</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_country}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">City</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Postal Code</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_zip}}</td>
                                                        </tr>
                            @if($order->coupon_code != null)
                            <tr>
                                <th width="45%">Coupon Code</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$order->coupon_code}}</td>
                            </tr>
                            @endif
                            @if($order->coupon_discount != null)
                            <tr>
                                <th width="45%">Coupon Discount</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$order->coupon_discount}}</td>
                            </tr>
                            @endif
                            @if($order->affilate_user != null)
                            <tr>
                                <th width="45%">Affilate User</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$order->affilate_user}}</td>
                            </tr>
                            @endif
                            @if($order->affilate_charge != null)
                            <tr>
                                <th width="45%">Affilate Charge</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$order->affilate_charge}}</td>
                            </tr>
                            @endif
                                                    </tbody></table>
                                                </div>
                                            </div>
@if($order->dp == 0)
                                            <div class="col-lg-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                            <tr class="tr-head">
                                <th class="order-th" width="45%"><strong>Shipping Address</strong></th>
                                <th width="10%"></th>
                                <td width="45%"></td>
                            </tr>
                            @if($order->shipping == "pickup")
                        <tr>
                                    <th width="45%"><strong>Pickup Location:</strong></th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$order->pickup_location}}</td>
                                </tr>
                            @else
                                <tr>
                                    <th width="45%"><strong>Name:</strong></th>
                                    <th width="10%">:</th>
                <td>{{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Email:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Phone:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Address:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Country:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_country == null ? $order->customer_country : $order->shipping_country}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>City:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Postal Code:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip}}</td>
                                </tr>
                                @endif
                                                    </tbody></table>
                                                </div>
                                            </div>
@endif
                                        </div>
                                    </div>
                                    
<br>
                            <table id="example" class="table">
                                <h4 class="text-center">Products Ordered</h4><hr>
                                <thead>
                                <tr>
                                    <th width="10%">Product ID#</th>
                                    <th>Shop Name</th>
                                    <th>Status</th>
                                    <th>Product Title</th>
                                    <th width="10%">Quantity</th>
                                    <th width="10%">Size</th>
                                    <th width="10%">Color</th>
                                    <th width="10%">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart->items as $key => $product)
                                    <tr>
                                        <input type="hidden" value="{{$key}}">
                                            <td>{{ $product['item']['id'] }}</td>
                                            <td>
                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\Models\User::find($product['item']['user_id']);
                                                @endphp
                                                @if(isset($user))
                                                <a target="_blank" href="{{route('front.vendor',str_replace(' ', '-',($user->shop_name)))}}">{{$user->shop_name}}</a>
                                                
                                                @else
                                                Vendor Removed
                                                @endif
                                                @endif

                                            </td>
                                            <td>
                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\Models\Vendororder::where('order_id','=',$order->id)->where('user_id','=',$product['item']['user_id'])->first();
                                                @endphp
                                                {{$user->status}}
                                                @endif
                                            </td>
                                            <td>
                                                <input type="hidden" value="{{ $product['license'] }}">
                                                <a target="_blank" href="{{route('front.product',['id' => $product['item']['id'], $product['item']['name']])}}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a>
                                                @if($product['license'] != '')
                              <a href="javascript:;" data-toggle="modal" data-target="#confirm-delete" class="btn btn-info product-btn" id="license" style="padding: 5px 12px;"><i class="fa fa-eye"></i> View License</a>
                                                @endif

                                            </td>
                                            <td>{{$product['qty']}} {{ $product['item']['measure'] }}</td>
                                            <td>{{$product['size']}}</td>
                                            <td><span style="width: 40px; height: 20px; display: block; background: {{$product['color']}};"></span></td>
                                            <td>{{$order->currency_sign}}{{ round($product['price'] * $order->currency_value , 2) }}</td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </main>
                        <hr>
                        {{--  <div class="text-center">
                            <input type="hidden" value="{{$order->customer_email}}">
                           
                            <a style="cursor: pointer;" data-toggle="modal" data-target="#emailModal"class="btn btn-success email"><i class="fa fa-send"></i> Send Email</a>
                        </div>  --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>
    <div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">Send Message</h4>
          </div>
          <form id="emailreply"  method="POST">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml" name="email" placeholder="Email"  value="" readonly="">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg" class="form-control" rows="5" placeholder="Message *" required=""></textarea>
                </div>
                <input type="hidden" name="name" value="{{Auth::guard('customer')->user()->name}}">
                <input type="hidden" name="user_id" value="{{Auth::guard('customer')->user()->id}}">
          </div>
          <div class="modal-footer">
            <button type="submit" id="emlsub" class="btn btn-default email-btn">Send</button>
          </div>
           </form>
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
                    <p class="text-center">The Licenes Key is :  <span id="key"></span> <a id="license-edit" style="cursor: pointer;">Edit License</a><a id="license-cancel" style="cursor: pointer; display: none;">Cancel</a></p>
                    <form method="POST" action="{{route('admin-order-license',$order->id)}}" id="edit-license" style="display: none;">
                        {{csrf_field()}}
                        <input type="hidden" name="license_key" id="license-key" value="">
                        <div class="form-group text-center">
                    <input type="text" name="license" placeholder="Enter New License Key" style="width: 40%;" required=""><input type="submit" name="submit" class="btn btn-primary" style="border-radius: 0; padding: 2px; margin-bottom: 2px;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
        $(document).on('click','#license' , function(e){
            var id = $(this).parent().find('input[type=hidden]').val();
            var key = $(this).parent().parent().find('input[type=hidden]').val();
            $('#key').html(id);  
            $('#license-key').val(key);    
    });
        $(document).on('click','#license-edit' , function(e){
            $(this).hide();
            $('#edit-license').show();
            $('#license-cancel').show();
        });
        $(document).on('click','#license-cancel' , function(e){
            $(this).hide();
            $('#edit-license').hide();
            $('#license-edit').show();
        });
    </script>
@endsection