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
                                                    <h2>Facebook Login</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Social Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Facebook Login
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-social-ufacebook')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')    
                                          {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page"> Facebook Login:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$socialdata->fcheck == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$socialdata->fcheck == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-social-facebookup',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-social-facebookup',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">App ID *<span>Get Your App ID from developers.facebook.com</span></label>
                                            <div class="col-sm-6">
                                              <input name="fclient_id" id="phone" class="form-control" placeholder="Enter App ID" type="text" value="{{$socialdata->fclient_id}}">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="sid">App Secret *<span>Get Your App Secret from developers.facebook.com</span></label>
                                            <div class="col-sm-6">
                                              <input name="fclient_secret" id="sid" class="form-control" placeholder="Enter App Secret" type="text" value="{{$socialdata->fclient_secret}}">
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="sid">Website URL *</label>
                                            <div class="col-sm-6">
                                              <input id="sid" class="form-control" placeholder="Website URL" type="text" value="{{url('/')}}" readonly>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="url">Valid OAuth Redirect URI *<span>Copy this url and paste it to your Valid OAuth Redirect URI in developers.facebook.com.</span></label>
                                            <div class="col-sm-6">
                                              @php
                                              $url = url('/auth/facebook/callback');
                                              $url = preg_replace("/^http:/i", "https:", $url);
                                              @endphp
                                              <input name="fredirect" id="url" class="form-control" placeholder="Enter Site URL" type="text" value="{{$url}}" readonly>
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
