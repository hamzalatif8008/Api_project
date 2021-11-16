@extends('layouts.frenchise')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Social Links area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Social Links</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i>Social Links</p>
                                                </div>
                                            </div>
                                              @include('includes.frenchise-notification')
                                        </div>   
                                    </div>
                                        <form class="form-horizontal" action="{{route('frenchise-social-update')}}" method="POST">
                                         @include('includes.form-success')      
                                        {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-3" for="facebook">Facebook *</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="f_url" id="facebook" placeholder="http://facebook.com/" type="url" value="{{$socialdata->f_url}}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="f_check" value="1" {{$socialdata->f_check ==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-3" for="google-Plus">Google Plus *</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="g_url" id="google-Plus" placeholder="http://google.com/"  type="url" value="{{$socialdata->g_url}}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="g_check" value="1" {{$socialdata->g_check ==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-3" for="twiter">Twiter *</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="t_url" id="twiter" placeholder="http://twitter.com/"  type="url" value="{{$socialdata->t_url}}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="t_check" value="1" {{$socialdata->t_check ==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-3" for="instagram">Intagram *</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="i_url" id="intagram" placeholder="http://instagram.com/"  type="url" value="{{$socialdata->i_url}}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="i_check" value="1" {{$socialdata->i_check ==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-3" for="linkedin">Linkedin *</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="l_url" id="linkedin" placeholder="http://linkedin.com/"  type="url" value="{{$socialdata->l_url}}">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="l_check" value="1" {{$socialdata->l_check ==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Social Settings</button>   
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Social Links area --> 
                </div>
            </div>
        </div>
    </div>
@endsection