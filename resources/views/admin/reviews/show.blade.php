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
                                                    <h2>Review Details <a href="{{ route('admin-review-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Product Discussion <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Reviews <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Review Details
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>

                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong> Reviewer Name:</strong></td>
                                <td>{{$review->user->name}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Email:</strong></td>
                                <td>{{$review->user->email}}</td>
                            </tr>
                            @if($review->user->phone != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Phone:</strong></td>
                                <td>{{$review->user->phone}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Review:</strong></td>
                                <td>{{$review->review}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Reting:</strong></td>
                                <td><p class="product-reviews" style="margin: 0;">
                                              <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{$review->rating*20}}%"></div>
                                              </div>
                                          </p></td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Reviewed at:</strong></td>
                                <td>{{ date('d-M-Y h:i:s',strtotime($review->review_date))}}</td>
                            </tr>

                            </tbody>
                        </table>
                                    </div>
                                    <div class="text-center">
                                                      <input type="hidden" value="{{$review->user->email}}">
                                                      <a style="cursor: pointer;" data-toggle="modal" data-backdrop="false" data-target="#emailModal1" class="btn btn-primary email1"><i class="fa fa-send email1"></i> Contact Customer</a>
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

