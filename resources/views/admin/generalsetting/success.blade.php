@extends('layouts.admin')

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
                                                    <h2>Success Messages</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Generel Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Success Messages
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-successmup')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')      
                                        {{csrf_field()}}



                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Cart Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cart_success" placeholder=" Enter Your Input" value="{{$data->cart_success}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Out Of Stock Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cart_error" placeholder=" Enter Your Input" value="{{$data->cart_error}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Wishlist Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_success" placeholder=" Enter Your Input" value="{{$data->wish_success}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Already Added To Wishlist Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_error" placeholder=" Enter Your Input" value="{{$data->wish_error}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Wishlist Remove Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_remove" placeholder=" Enter Your Input" value="{{$data->wish_remove}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Compare Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_success" placeholder=" Enter Your Input" value="{{$data->compare_success}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Already Added To Compare Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_error" placeholder=" Enter Your Input" value="{{$data->compare_error}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Remove Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_remove" placeholder=" Enter Your Input" value="{{$data->compare_remove}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Invalid Input Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="invalid" placeholder=" Enter Your Input" value="{{$data->invalid}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Size Change Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="size_change" placeholder=" Enter Your Input" value="{{$data->size_change}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Color Change Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="color_change" placeholder=" Enter Your Input" value="{{$data->color_change}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Coupon Found Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="coupon_found" placeholder=" Enter Your Input" value="{{$data->coupon_found}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Coupon Found Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="no_coupon" placeholder=" Enter Your Input" value="{{$data->no_coupon}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Coupon Already Applied Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="coupon_already" placeholder=" Enter Your Input" value="{{$data->coupon_already}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Order Success Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <textarea name="order_title" id="street_address" class="form-control" rows="5" placeholder="Order Success Title" style="resize: vertical;">{{$data->order_title}}</textarea>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Order Success Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <textarea name="order_text" id="street_address" class="form-control" rows="5" placeholder="Order Success Text" style="resize: vertical;">{{$data->order_text}}</textarea>
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
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
@endsection