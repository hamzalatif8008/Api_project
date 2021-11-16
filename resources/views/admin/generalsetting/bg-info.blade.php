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
                                                    <h2>Home Page Customization</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Customization
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-bginfoup')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')      
                                          {{csrf_field()}}
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Home Slider *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="slider" value="1" {{$data->slider==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Home Service *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="category" value="1" {{$data->category==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Top Banners *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="sb" value="1" {{$data->sb==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Featured Products *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="hv" value="1" {{$data->hv==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Bottom Banners *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="lb" value="1" {{$data->lb==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> New Arrival Products *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="lp" value="1" {{$data->lp==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Countdown Section *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="pp" value="1" {{$data->pp==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Home Page Video *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="ftp" value="1" {{$data->ftp==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Latest Blogs *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="bs" value="1" {{$data->bs==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Testimonial Section *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="ts" value="1" {{$data->ts==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-8" for="disable/enable_about_page"> Brand Logos *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="bl" value="1" {{$data->bl==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <br>
                                          <br>                                          <br>
                                        </div>

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
