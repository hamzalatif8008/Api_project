@extends('layouts.customer')
@section('content')      

        <div class="right-side">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard header items area -->
                        <div class="panel panel-default admin">
                            <div class="panel-heading admin-title">
                                <div class="product__header" style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                
                                                    <h2 style="font-size: 25px;">User Dashboard</h2>
                                               
                                                </div>
                                            </div>
                                              @include('includes.customer-notification')
                                        </div>   
                                    </div></div>
                            <div class="panel-body dashboard-body">
                                <div class="dashboard-header-area">
                                    <div class="row">
                                        @include('includes.form-success')
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('customer-wishlist')}}" class="title-stats title-red">
                                                <div class="icon"><i class="fa fa-heart fa-5x"></i></div>
                                                <div class="number">{{count($wishes)}}</div>
                                                <h4>{{$lang->favorite_product}}</h4>
                                                <span class="title-view-btn">{{$lang->view_all}}</span>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('customer-order-index')}}" class="title-stats title-cyan">
                                                <div class="icon"><i class="fa fa-truck fa-5x"></i></div>
                                                <div class="number">{{count($orders)}}</div>
                                                <h4>{{$lang->purchased_item}}</h4>
                                                <span class="title-view-btn">{{$lang->view_all}}</span>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('customer-vendor-status',['status' => 'completed'])}}" class="title-stats title-green">
                                                <div class="icon"><i class="fa fa-check fa-5x"></i></div>
                                                <div class="number">{{($complete)}}</div>
                                                <h4>{{$lang->order_completed}}</h4>
                                                <span class="title-view-btn">{{$lang->view_all}}</span>
                                            </a>
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ending of Dashboard header items area -->


                    </div>
                </div>
            </div>
        </div>

@endsection