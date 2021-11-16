@extends('layouts.admin')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Email Configuration</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Email Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Email Configuration </p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-mail-configupdate')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page"> SMTP:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->is_smtp == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->is_smtp == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-issmtp',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-issmtp',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">SMTP Host * <span></span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="smtp_host" id="blood_group_display_name" placeholder="SMTP Host" value="{{$config->smtp_host}}" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">SMTP Port* <span></span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="smtp_port" id="blood_group_display_name" placeholder="SMTP Port" value="{{$config->smtp_port}}" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">SMTP Username* <span></span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="smtp_user" id="blood_group_display_name" placeholder="SMTP Username" value="{{$config->smtp_user}}" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">SMTP Password* <span></span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="smtp_pass" id="blood_group_display_name" placeholder="SMTP Password" value="{{$config->smtp_pass}}" type="password">
                                            </div>
                                          </div>
                                            <hr>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">From Email * <span></span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="from_email" id="blood_group_display_name" placeholder="From Email" value="{{$config->from_email}}" type="email" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">From Name* <span></span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="from_name" id="blood_group_display_name" placeholder="From Name" value="{{$config->from_name}}" type="text" required>
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Email Configuration</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<link href="{{asset('assets/summernote.css')}}" rel="stylesheet">

<script src="{{asset('assets/summernote.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#edit_profile_description').summernote();
    });
</script>
@endsection