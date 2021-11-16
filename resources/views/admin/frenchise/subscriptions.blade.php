<?php 
// echo '<pre>';
//  print_r($subs); exit;

?>
       
@extends('layouts.admin')

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
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Vendor Subscriptions</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Subscriptions</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>
                                                    <th>Vendor Name</th>
                                                    <th>Plan</th>
                                                    <th>Method</th>
                                                    <th>Transcation ID</th>
                                                    <th>Purchase Time</th>
                                                    <th>Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                                @foreach($subs as $sub)                                                  
                                              <tr role="row" class="odd">
                                                      <td><a href="{{route('front.vendor',str_replace(' ', '-',($sub->user->shop_name)))}}" target="_blank">{{$sub->user->owner_name}}</a></td>
                                                      <td>{{$sub->title}}</td>
                                                      <td>{{$sub->method}}</td>
                                                      <td>{{ $sub->txnid == null ? 'Free': $sub->txnid}}</td>
                                                      <td>{{$sub->created_at->diffForHumans()}}</td>
                                                      <td>
                                                      <a href="{{route('admin-vendor-sub',$sub->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>      
                                                      </td>
                                                  </tr>
                                                  @endforeach
                                                  </tbody>
                                          </table></div></div>
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
@endsection

