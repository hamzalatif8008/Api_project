@extends('layouts.admin')
@section('styles')
<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Contact Page Content -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Contact Us Page</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Menu Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Contact Us Page
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-ps-contact-submit')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')     
                                        {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_contact_page"> Contact Page:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$pagedata->c_status == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$pagedata->c_status == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-ps-contactup',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-ps-contactup',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Title *</label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contact_title" placeholder="Title" value="{{$pagedata->contact_title}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_desc">Contact Description *</label>
                                            <div class="col-sm-6">
                                              <textarea name="contact_text" id="contact_desc" class="form-control" style="resize: vertical;" rows="5" placeholder="Enter Contact Us Page Description">{{$pagedata->contact_text}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_us_email_address">Contact Us Email Address * <span>Separate by Comma(,) for Multiple Email</span></label>
                                            <div class="col-sm-6">
                                              <textarea name="contact_email" id="contact_us_email_address" class="form-control" style="resize: vertical;" rows="5" placeholder="Enter Contact Us Email Address">{{$pagedata->contact_email}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Form Success Text *</label>
                                            <div class="col-sm-6">
                                              <textarea name="contact_success" id="contact_form_success_text" class="form-control" style="resize: vertical;" rows="5" placeholder="Enter Contact Form Success Text">{{$pagedata->contact_success}}</textarea>
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
                    <!-- Ending of Dashboard FAQ Page -->
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('scripts')

<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('contact_desc');
            new nicEditor().panelInstance('contact_us_email_address');
        });
  //]]>
</script>
@endsection