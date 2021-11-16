@extends('layouts.user')

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
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Send Email <a href="{{ route('vendor-order-index') }}" class="btn add-newProduct-btn" style="padding: 5px 12px;"  class="print-order-btn">
                                                    <i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i>Send Email</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <form class="form-horizontal" action="{{route('vendor-order-emailsub')}}" method="POST">
                        @include('includes.form-success')
                                          @include('includes.form-error')
                                          {{csrf_field()}}

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_language">To*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="to" id="edit_language" placeholder="Email To Send" type="text" value="{{$email}}" disabled="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_language">Subject*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="subject" id="edit_language" placeholder="Enter Subject" required="" type="text" value="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_description">Message*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="message" id="edit_profile_description" rows="10" style="resize: vertical;" placeholder="Enter  Message"></textarea>
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


