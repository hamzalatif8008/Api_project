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
                                                    <h2>Edit Email Template <a href="{{ route('admin-mail-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Email Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Email Template <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Edit</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <div class="row" style="padding: 15px">
                                        <div class="col-md-6 col-md-offset-3">
                                        <p>Use the BB codes, it show the data dynamically in your emails.</p>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Meaning</th>
                                                <th>BB Code</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Customer Name</td>
                                                <td>{customer_name}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Amount</td>
                                                <td>{order_amount}</td>
                                            </tr>
                                            <tr>
                                                <td>Admin Name</td>
                                                <td>{admin_name}</td>
                                            </tr>
                                            <tr>
                                                <td>Admin Email</td>
                                                <td>{admin_email}</td>
                                            </tr>
                                            <tr>
                                                <td>Website Title</td>
                                                <td>{website_title}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        <form class="form-horizontal" action="{{route('admin-mail-update',['id'=>$temp->id])}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="blood_group_display_name">Email Type* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                              <input class="form-control" id="blood_group_display_name" value="{{$temp->email_type}}" disabled placeholder="Enter Faq Title Display Name" required="" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="blood_group_display_name">Email Subject* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                              <input class="form-control" name="email_subject" value="{{$temp->email_subject}}" id="blood_group_display_name" placeholder="Enter Faq Title Display Name" required="" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="blood_group_slug">Email Body <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                              <textarea class="form-control" name="email_body" id="edit_profile_description" rows="10" style="resize: vertical;" placeholder="Enter Faq Description">{{$temp->email_body}}</textarea>
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Email Template</button>
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