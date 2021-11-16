@extends('layouts.admin')

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
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Google Login</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Social Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Google Login
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-social-ugoogle')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')      
                                          {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page"> Google Login:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$socialdata->gcheck == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$socialdata->gcheck == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-social-googleup',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-social-googleup',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Client ID *<span>Get Your Client ID from console.cloud.google.com</span></label>
                                            <div class="col-sm-6">
                                              <input name="gclient_id" id="phone" class="form-control" placeholder="Enter Client ID" type="text" value="{{$socialdata->gclient_id}}">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="sid">Client Secret *<span>Get Your Client Secret from console.cloud.google.com</span></label>
                                            <div class="col-sm-6">
                                              <input name="gclient_secret" id="sid" class="form-control" placeholder="Enter Client Secret" type="text" value="{{$socialdata->gclient_secret}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="sid">Website URL *</label>
                                            <div class="col-sm-6">
                                              <input id="sid" class="form-control" placeholder="Website URL" type="text" value="{{url('/')}}" readonly>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="url">Redirect URL *<span>Copy this url and paste it to your Redirect URL in console.cloud.google.com.</span></label>
                                            <div class="col-sm-6">
                                              <input name="gredirect" id="url" class="form-control" placeholder="Enter Redirect URL" type="text" value="{{url('/auth/google/callback')}}" readonly>
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button> 
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
