@extends('layouts.user')
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
                                                    <h2>Change Password</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Change Password</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                    <form class="form-horizontal" action="{{route('user-reset-submit')}}" method="POST">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_current_password">{{$lang->cp}} *</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="cpass" id="admin_current_password" placeholder="{{$lang->cp}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_new_password">{{$lang->np}} *</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="newpass" id="admin_new_password" placeholder="{{$lang->np}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_retype_password">{{$lang->rnp}} *</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="renewpass" id="admin_retype_password" placeholder="{{$lang->rnp}}" required>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Change Password</button>
                                        </div>
                                    </form>
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