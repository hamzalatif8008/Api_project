@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard About Us -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Website Footer</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Generel Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Footer
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-aboutup')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')    
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="about_us_text">About Us Text *</label>
                                            <div class="col-sm-6">
                                              <textarea name="about" id="about_us_text" class="form-control" rows="5" style="resize: vertical;" placeholder="Enter About Us Text" required="">{{$data->about}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Street Address *</label>
                                            <div class="col-sm-6">
                                              <textarea name="street" id="street_address" class="form-control" rows="5" placeholder="Enter Street Address" style="resize: vertical;">{{$data->street}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Phone *</label>
                                            <div class="col-sm-6">
                                              <input name="phone" id="phone" class="form-control" placeholder="Enter Phone" type="text" value="{{$data->phone}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="fax">Fax *</label>
                                            <div class="col-sm-6">
                                              <input name="fax" id="fax" class="form-control" placeholder="Enter Fax" type="text" value="{{$data->fax}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="email">Email *</label>
                                            <div class="col-sm-6">
                                              <input name="email" id="email" class="form-control" placeholder="Enter Email"  type="email" value="{{$data->email}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="site">Website *</label>
                                            <div class="col-sm-6">
                                              <input name="site" id="site" class="form-control" placeholder="Enter Website" type="text" value="{{$data->site}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="footer_text">Copyright Text *</label>
                                            <div class="col-sm-6">
                                              <textarea name="footer" id="footer_text" class="form-control" rows="5" placeholder="Enter Footer Text" style="resize: vertical;" required="">{{$data->footer}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_background_image ">Current Background Image </label>
                                            <div class="col-sm-6">
                                        <img style="width: 100%; max-height: 450px;"  id="adminimg" src="{{ $data->footer_background ? asset('assets/images/'.$data->footer_background):asset('assets/images/noimage.png')}}" alt="" id="adminimg">      
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="setup_new_background">Setup New Background *</label>
                                            <div class="col-sm-6">
                                              <input name="footer_background"  type="file">
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
                    <!-- Ending of Dashboard About Us --> 
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
            new nicEditor().panelInstance('footer_text');
        });
  //]]>
</script>

@endsection
