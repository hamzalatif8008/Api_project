@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Website Logo -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Website Loader</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Generel Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Loader
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-load')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')    
                                          {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page"> Loader:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->is_loader == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->is_loader == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-isloader',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-isloader',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_logo">Current Loader</label>
                                            <div class="col-sm-6">
                                                <div class="col-sm-3" style="padding-left: 0">
                                        <img id="adminimg" src="{{asset('assets/images/'.$data->loader)}}" alt="No Image Found" id="adminimg">
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="loader">Setup New Loader</label>
                                            <div class="col-sm-6" style="padding-top: 8px;">
                                              <input  type="file" name="loader" id="loader">
                                            </div>
                                          </div>
                                            <hr>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-6">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button> 
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Logo -->
                </div>
            </div>
        </div>
    </div>
@endsection