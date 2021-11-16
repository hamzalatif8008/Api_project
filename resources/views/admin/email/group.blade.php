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
                                                    <h2>Group Email</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Email Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Group Email</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <div class="row" style="padding: 15px">
                                          @include('includes.form-error')
                                          @include('includes.form-success')

                                        </div>
        <form class="form-horizontal" action="{{route('admin-group-submit')}}" method="POST">

                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="user_type">Select User Type* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <select name="type" class="form-control" id="user_type" required="">
                                                    <option value=""> Choose User Type </option>
                                                    <option value="0">Customers</option>
                                                    <option value="1">Vendors</option>
                                                    <option value="2">Subscribers</option>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="blood_group_display_name">Email Subject* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                              <input class="form-control" name="subject" value="" id="blood_group_display_name" placeholder="Enter Subject" required="" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="blood_group_slug">Email Body <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                            <textarea class="form-control" name="body" id="edit_profile_description" rows="10" style="resize: vertical;" placeholder="Write Mail Description"></textarea>
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Send Email</button>
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
        $('#edit_profile_description').summernote({
            height: 250
        });
    });
</script>
@endsection