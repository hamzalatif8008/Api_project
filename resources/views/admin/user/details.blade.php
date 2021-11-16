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
                                                    <h2>Customer Details <a href="{{ route('admin-user-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customers <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customer Details
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>

                        <table class="table" style="border-color: transparent;">
                            <tbody>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Customer ID#</strong></td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Name:</strong></td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Email:</strong></td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @if($user->phone != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Phone:</strong></td>
                                <td>{{$user->phone}}</td>
                            </tr>
                            @endif
                            @if($user->fax != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Fax:</strong></td>
                                <td>{{$user->fax}}</td>
                            </tr>
                            @endif
                            @if($user->address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Address:</strong></td>
                                <td>{{$user->address}}</td>
                            </tr>
                            @endif
                            @if($user->city != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>City:</strong></td>
                                <td>{{$user->city}}</td>
                            </tr>
                            @endif
                            @if($user->zip != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Zip:</strong></td>
                                <td>{{$user->zip}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Joined:</strong></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>

                            </tbody>
                        </table>

                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" value="{{$user->email}}"><a style="cursor: pointer;" data-toggle="modal" data-target="#emailModal1" class="btn btn-primary email1"><i class="fa fa-send"></i> Contact Customer</a>
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

