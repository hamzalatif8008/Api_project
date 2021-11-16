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
                                                    <h2>Payment Informations</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Payment Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Payment Informations
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-paymentsup')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')    
                                          {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Jazz Cash:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->guest_checkout == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->guest_checkout == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-guest',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-guest',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Easypaisa:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->pcheck == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->pcheck == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-paypal',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-paypal',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Bank Account Number:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->scheck == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->scheck == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-stripe',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-stripe',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Cash On Delivery:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->ccheck == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->ccheck == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-cod',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-cod',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone1">Paypal Business Email  *</label>
                                            <div class="col-sm-6">
                                              <input name="pb" id="phone1" class="form-control" placeholder="Enter Paypal Business Email" type="text" value="{{$data->pb}}">
                                            </div>
                                          </div>



                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone2">JazzCash Key  *</label>
                                            <div class="col-sm-6">
                                              <input name="sk" id="phone2" class="form-control" placeholder="Enter Stripe Key" type="text" value="{{$data->sk}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone3">Easypaisa Key  *</label>
                                            <div class="col-sm-6">
                                              <input name="ss" id="phone3" class="form-control" placeholder="Enter Stripe Secret Key" type="text" value="{{$data->ss}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="website_title">Currency Format *</label>
                                            <div class="col-sm-6">
                                              <select id="website_title" class="form-control" name="sign">
                                                <option value="0" {{$data->sign == 0 ? 'selected':''}}>Before Price</option>
                                                <option value="1" {{$data->sign == 1 ? 'selected':''}}>After Price</option>
                                              </select>

                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone9">Withdraw Fee *<span>Withdraw Fee(Withdraw Amount + Withdraw Fee)</span></label>
                                            <div class="col-sm-6">
                                              <input name="withdraw_fee" id="phone9" class="form-control" placeholder="Withdraw Fee" type="text" value="{{$data->withdraw_fee}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone4">Withdraw Charge(%) *<span>Withdraw Charge(Withdraw Amount + Withdraw Charge(%))</span></label>
                                            <div class="col-sm-6">
                                              <input name="withdraw_charge" id="phone4" class="form-control" placeholder="Withdraw Charge" type="text" value="{{$data->withdraw_charge}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone5">Fixed Commission *<span>Fixed Commission Charge(Product Price + Commission)</span></label>
                                            <div class="col-sm-6">
                                              <input name="fixed_commission" id="phone5" class="form-control" placeholder="Fixed Commission" type="text" value="{{$data->fixed_commission}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone6">Percentage Commission(%) *<span>Percentage Commission Charge(Product Price + Commission(%))</span></label>
                                            <div class="col-sm-6">
                                              <input name="percentage_commission" id="phone6" class="form-control" placeholder="Percentage Commission" type="text" value="{{$data->percentage_commission}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone7">Tax(%) *<span>Tax Fee(Product Price + Tax(%))</span></label>
                                            <div class="col-sm-6">
                                              <input name="tax" id="phone7" class="form-control" placeholder="Tax" type="text" value="{{$data->tax}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Multiple Shipping *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="multiple_ship" value="1" {{$data->multiple_ship==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone8">Shipping Cost *<span>(Total Amount + Shipping Cost)</span></label>
                                            <div class="col-sm-6">
                                              <input name="ship" id="phone8" class="form-control" placeholder="Shipping Cost" type="text" value="{{$data->ship}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Shipping Information For Vendor *</label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                  <input type="checkbox" name="ship_info" value="1" {{$data->ship_info==1?"checked":""}}>
                                                  <span class="slider round"></span>
                                                </label>
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
                    <!-- Ending of Dashboard Office Address -->
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