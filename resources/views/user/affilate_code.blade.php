@extends('layouts.user')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Office Address -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Affilate Code</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Affilate Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Affilate Code</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <form class="form-horizontal" action="{{route('user-shop-shipup')}}" method="POST">
                        @include('includes.form-success')
                                          @include('includes.form-error')    
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Your Affilate Link *<span>This is your affilate link just copy the link and paste anywhere you want.</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" name="shipping_cost" id="street_address" placeholder="Shipping Cost" class="form-control" required="" value="{{ url('/').'/?reff='.$user->affilate_code}}" readonly="">

                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Affiliate Banner <span>This is your affilate banner Preview.</span></label>
                                            <div class="col-sm-6">
                                                <a href="{{ url('/').'/?reff='.$user->affilate_code}}" target="_blank"><img src="{{asset('assets/images/'.$gs->affilate_banner)}}"></a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Affiliate Banner HTML Code <span>This is your affilate banner html code just copy the code and paste anywhere you want.</span></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="v6" placeholder="Message" rows="5" readonly=""><a href="{{ url('/').'/?reff='.$user->affilate_code}}" target="_blank"><img src="{{asset('assets/images/'.$gs->affilate_banner)}}"></a></textarea>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Office Address -->
                </div>
            </div>
        </div>
    </div>
@endsection