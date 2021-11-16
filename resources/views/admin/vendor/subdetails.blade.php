@extends('layouts.admin')

@section('styles')
<style type="text/css">
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-top: none;
}
.add-product-box {
    box-shadow: none;
}
.add-product-1
{
    padding-bottom: 30px;
}
</style>
@endsection
        
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
                                                    <h2>Subscription Details <a href="{{ route('admin-vendor-subs') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors Subscriptions<i class="fa fa-angle-right" style="margin: 0 2px;"></i> Subscription Details
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Customer ID#</strong></td>
                                <td>{{$subs->user->id}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Name:</strong></td>
                                <td>{{$subs->user->name}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Email:</strong></td>
                                <td>{{$subs->user->email}}</td>
                            </tr>
                             @if($subs->user->phone != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Phone:</strong></td>
                                <td>{{$subs->user->phone}}</td>
                            </tr>
                            @endif
                            @if($subs->user->fax != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Fax:</strong></td>
                                <td>{{$subs->user->fax}}</td>
                            </tr>
                            @endif
                            @if($subs->user->address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Address:</strong></td>
                                <td>{{$subs->user->address}}</td>
                            </tr>
                            @endif
                            @if($subs->user->city != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>City:</strong></td>
                                <td>{{$subs->user->city}}</td>
                            </tr>
                            @endif
                            @if($subs->user->zip != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Zip:</strong></td>
                                <td>{{$subs->user->zip}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Name:</strong></td>
                                <td>{{$subs->user->owner_name}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Phone Number:</strong></td>
                                <td>{{$subs->user->shop_number}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Shop Address:</strong></td>
                                <td>{{$subs->user->shop_address}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Registration Number:</strong></td>
                                <td>{{$subs->user->reg_number}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Message :</strong></td>
                                <td>{{$subs->user->shop_message}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Subscription Plan:</strong></td>
                                <td>{{$subs->title}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Currency Symbol:</strong></td>
                                <td>{{$subs->currency}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Cost:</strong></td>
                                <td>{{$subs->price}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Duration:</strong></td>
                                <td>{{$subs->days}} Days</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Products Allowed:</strong></td>
                                <td>{{$subs->allowed_products}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Details:</strong></td>
                                <td>{!!$subs->details!!}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Method:</strong></td>
                                <td>{{$subs->method}}</td>
                            </tr>
                            @if($subs->method == "Stripe")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Transaction ID:</strong></td>
                                <td>{{$subs->txnid}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Charge ID:</strong></td>
                                <td>{{$subs->charge_id}}</td>
                            </tr>
                            @elseif($subs->method == "Paypal")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Transaction ID:</strong></td>
                                <td>{{$subs->txnid}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Purchase Time:</strong></td>
                                <td>{{$subs->created_at->diffForHumans()}}</td>
                            </tr>
                            </tbody>
                        </table>
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


@endsection

