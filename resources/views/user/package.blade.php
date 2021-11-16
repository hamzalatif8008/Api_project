@extends('layouts.user')

@section('styles')
<style type="text/css">
    .table-wrap {
    background-color: #ffffff;
    padding: 20px 0;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }
    .pr-15 {
    padding-right: 15px !important;
    }
    .pl-15 {
    padding-right: 15px !important;
    }
    .mb-30 {
        margin-bottom: 30px;
    }
    /*----------Starting of Pricing table area----------*/
    .single-pricing-table {
        background-color: #ffffff;
        text-align: center;
        padding: 15px;
        border: 1px solid #0165cbc2;
        border-top: 5px solid #0165cbc2;
        border-bottom: 5px solid #0165cbc2;
        border-radius: 5px;
        color: #555555;
        -webkit-transition: all .4s ease;
        transition: all .4s ease;
    }
    .pricing-heading {font-size: 16px;}
    .pricing-heading h2 {  
        color: #000000; 
        -webkit-transition: all .4s ease; 
        transition: all .4s ease;
        font-size: 25px;
    }
    .pricing-count {
        font-weight: 300;
        color: #ffffff;
        background-color: #0165cbc2;
        width: 130px;
        position: relative;
        z-index: 1;
        left: 48%;
        margin-left: -60px;
        -webkit-transition: all .4s ease;
        transition: all .4s ease;
        margin-top: 50px;
        margin-bottom: 50px;
        line-height: 1.6;
    }
    .pricing-count:before {
        position: absolute;
        width: 0;
        height: 0;
        border-left: 65px solid transparent;
        border-right: 65px solid transparent;
        border-bottom: 25px solid #0165cbc2;
        content: "";
        top: -25px;
        left: 0;
        -webkit-transition: all .4s ease;
        transition: all .4s ease;
    }
    .pricing-count:after {
        position: absolute;
        width: 0;
        height: 0;
        border-left: 65px solid transparent;
        border-right: 65px solid transparent;
        border-top: 25px solid #0165cbc2;
        content: "";
        bottom: -25px;
        left: 0;
        -webkit-transition: all .4s ease;
        transition: all .4s ease;
    }
    .pricing-number {
        font-weight: 800;
        font-size: 40px;
        margin-bottom: 0;
        padding-top: 5px;
    }
    .pricing-number span {font-size: 30px;}
    .single-pricing-table:hover .pricing-count {
        color: #0165cbc2; 
        background-color: #ffffff;
    }
    .single-pricing-table:hover .renew {
        color: #ffffff;
    }
    .single-pricing-table:hover .pricing-count:before {
        border-left: 65px solid transparent; 
        border-right: 65px solid transparent; 
        border-bottom: 25px solid #ffffff;
    } 
    .single-pricing-table:hover .pricing-count:after { 
        border-left: 65px solid transparent; 
        border-right: 65px solid transparent; 
        border-top: 25px solid #ffffff;
    }
    .single-pricing-table:hover {
        background-color: #0165cbc2; 
        color: #ffffff;
    }
    .single-pricing-table .boxed-btn {
        background-color: #0165cbc2;
        border: 1px solid #ffffff;
        padding: 10px 40px;
        border-radius: 50px;
        display: inline-block;
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
        -webkit-transition: all .4s ease;
        transition: all .4s ease;
    } 
    .single-pricing-table:hover 
    .pricing-heading h2 {color: #ffffff;}
    .single-pricing-table .boxed-btn:hover {
        background-color: #ffffff; 
        color: #0165cbc2;
    }
    .pricing-list, .pricing-list p {
        height: 68px;
        line-height: 1.3;
        font-size: 14px;
    }
    .pricing-list ol, .pricing-list ul
    {
        padding: 0;
        list-style-position: inside;
        text-align: center;
    }
    /*----------Ending of Pricing table area----------*/

</style>
@endsection

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
                                                    <h2>Subscription Plans</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Subscription Plans</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                    <div class="table-wrap pl-15 pr-15">
                        <div class="row">
                            @foreach($subs as $sub)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-pricing-table mb-30">

                                    <div class="pricing-heading">
                                        <h2>{{ $sub->title }}</h2>
                                    </div>
                                    <div class="pricing-count">
                                        @if($sub->price  == 0)
                                            <p class="pricing-number"><span>Free</span></p>
                                        @else
                                        <p class="pricing-number"><span>{{ $sub->currency }}</span>{{ $sub->price }}</p>
                                        @endif
                                        <p>{{ $sub->days }} Day(s)</p>
                                    </div>
                                    <div class="pricing-list">
                                        {!! $sub->details !!}
                                    </div>
                                    @if(!empty($package))
                                        @if($package->subscription_id == $sub->id)
                                            <a href="javascript:;" class="boxed-btn hvr-shutter-out-horizontal">Current Plan</a>
                                            <br>
                                            @if(Carbon\Carbon::now()->format('Y-m-d') > $user->date)
                                            <small>Expired on: {{ date('d/m/Y',strtotime($user->date)) }}</small>
                                            @else
                                            <small>Ends on: {{ date('d/m/Y',strtotime($user->date)) }}</small>
                                            @endif
                                             <a href="{{route('user-vendor-request',$sub->id)}}" class="renew"><u>Renew</u></a>
                                        @else
                                            <a href="{{route('user-vendor-request',$sub->id)}}" class="boxed-btn hvr-shutter-out-horizontal">Select</a>
                                            <br><small>&nbsp;</small>
                                        @endif
                                    @else
                                        <a href="{{route('user-vendor-request',$sub->id)}}" class="boxed-btn hvr-shutter-out-horizontal">Select</a>
                                        <br><small>&nbsp;</small>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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