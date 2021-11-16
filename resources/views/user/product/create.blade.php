@extends('layouts.user')

@section('styles')

<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">
    .colorpicker-alpha {display:none !important;}
    .colorpicker{ min-width:128px !important;}
    .colorpicker-color {display:none !important;}
    .add-product-box .form-horizontal .form-group:last-child {margin-bottom: 20px; }
    .nav-tabs a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
        content: '';
    }
</style>


@endsection

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
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Add Product <a href="{{ route('user-prod-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Products <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Add
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <hr>
<div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#physical" role="tab" data-toggle="tab"> Physical</a>
      </li>
      {{--  <li><a href="#digital" role="tab" data-toggle="tab"> Digital</a>
      </li>
      <li><a href="#license" role="tab" data-toggle="tab"> License</a>
      </li>  --}}
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="physical">
                                        <form class="form-horizontal" action="{{route('user-prod-store')}}" method="POST" enctype="multipart/form-data" id="form1">
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="name" id="blood_group_display_name" placeholder="Enter Product Name" required="" type="text" >
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check10" name="pccheck" value="1"> 
                                              <label for="check10">Allow Product Condition</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg2" style="display: none;">
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="product_condition">Product Condition*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="product_condition" name="product_condition">
                                                  <option value="2">New</option>
                                                  <option value="1">Used</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="cat">Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="cat" name="category_id" required="">
                                                  <option value="">Select Category</option>
                                              @foreach($cats as $cat)
                                                  <option value="{{$cat->id}}" >{{$cat->cat_name}}</option>
                                              @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group">Sub Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="subcategory_id" id="subcat" disabled="true">
                                                  <option value="" >Select Sub Category</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group">Child Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="childcategory_id" id="childcat"  disabled="true">
                                                  <option value="" >Select Child Category</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Current Featured Image*</label>
                                            <div class="col-sm-6">
                                             <img id="adminimg" src="" alt="" style="width: 400px; height: 300px;">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Select Image *</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                              <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Product Gallery Images *<span></span></label>
                                            <div class="col-sm-6">
                                            <input style="display: none;" type="file" accept="image/*" id="uploadgallery1" name="gallery[]" multiple/>
                                            <div class="margin-top">
                                              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i> Set Gallery</a>
                                            </div>
                                            </div>
                                          </div>
                                        <hr>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check11" name="shcheck" value="1"> 
                                              <label for="check11">Allow Estimated Shipping Time</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg3"  style="display: none;">
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="ship_time">Product Estimated Shipping Time*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="ship" id="ship_time" placeholder="Estimated Shipping Time" value="" type="text">
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check2" name="scheck" value="1"> 
                                              <label for="check2">Allow Product Sizes</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg" style="display: none;">
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Sizes* <span>(Write your own size Separated by Comma[,])</span></label>
                                            <div class="col-sm-6">
                                              <ul id="size">
                                                <li>X</li>
                                                <Li>XL</Li>
                                                <li>XXL</li>
                                                <li>M</li>
                                                <li>L</li>
                                                <li>S</li>
                                              </ul>
                                            </div>
                                          </div>
                                          <br>
                                        </div>


                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check3" name="colcheck" value="1"> 
                                              <label for="check3">Allow Product Colors</label>
                                              </div>
                                            </div>          
                                        </div> 

                                        <div id="fimg1" style="display: none;">
                                          <div class="color-area" id="q1">
                                           <div class="form-group  single-color">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Colors* <span>(Choose Your Favourite Color.)</span></label>
                                            <div class="col-sm-6">
                  <div class="input-group colorpicker-component">
                <input type="text" name="color[]" value="#000000"  class="form-control colorpick" />
                    <span class="input-group-addon"><i></i></span>
                                          <span class="ui-close1" id="parentclose">X</span>
                      </div>
                                            </div>
                                          </div>   
                                          </div>

                                          <br>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-4">
                                  <button class="btn btn-default featured-btn" type="button" id="add-color"><i class="fa fa-plus"></i> Add More Color</button>
                                </div>
                              </div>
                              <br>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_description">Product Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="description" id="profile_description" rows="5" style="resize: vertical;" placeholder="Enter Profile Description" ></textarea>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Current Price* <span>(In {{$sign->name}})</span></label>
                                            <div class="col-sm-3">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="cprice" id="pages"  placeholder="e.g 20" required="" type="text">
                                              <label><span>Current Price*</span></label>
                                            </div>
                                            <div class="col-sm-3">
                                              <input class="form-control" id="tot_amount" placeholder="e.g 20" type="text" disabled>
                                              <label><span>Actuall Price after {{$gs->percentage_commission}} tax including *</span></label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Previous Price* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="pprice" id="pages" placeholder="e.g 25"  type="text">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Stock* <span>(Leave Empty will Show Always Available)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="stock" id="blood_group_display_name" placeholder="e.g 15"  type="text">
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check50" name="mescheck" value="1">

                                              <label for="check50">Allow Product Measurement</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg50" style="display: none;">  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="product_measure">Product Measurement*</label>
                                            <div class="col-sm-3">
                                      <select class="form-control" id="product_measure">
                                                  <option value="">None</option>
                                                  <option value="Gram">Gram</option>
                                                  <option value="Kilogram">Kilogram</option>
                                                  <option value="Litre">Litre</option>
                                                  <option value="Pound">Pound</option>
                                                  <option value="Custom">Custom</option>
                                      </select>
                                            </div>
                                            <div class="col-sm-3" id="measure" style="display: none;">
                                              <input class="form-control" name="measure" id="measurement" placeholder="Enter Unit"  type="text">
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="placeholder">Youtube Video URL* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="youtube" id="placeholder" placeholder="Enter Youtube Video URL"  type="url">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="policy">Product Buy/Return Policy*</label>
                                            <div class="col-xs-12 col-sm-6"> 
                                              <textarea class="form-control" name="policy" id="policy" rows="5" style="resize: vertical;" placeholder="Enter Profile Description"></textarea>
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check12" name="secheck" value="1">

                                              <label for="check12">Allow Product SEO</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg4" style="display: none;">  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="metaTags">Product Meta Tags*<span>(Write meta tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="metaTags">
                                                    </ul>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="meta_description">Meta Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5" style="resize: vertical;" placeholder="Enter Meta Description"></textarea>
                                            </div>
                                          </div>
                                          <br>
                                        </div>

                          <div class="profile-filup-description-box margin-bottom-30 row">
                            <div class="col-sm-6 col-sm-offset-4">
                            <h2 class="text-center">Feature Tags</h2>
                            <div class="qualification" id="q">

                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Keyword: </label>
                                        <input class="form-control" name="features[]" placeholder="Keyword" type="text" value="">
                                      </div>
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Choose Your Color: </label>
                                              <div  class="input-group colorpicker-component">
                                  <input type="text" name="colors[]" value="#000000"  class="form-control colorpick" />
                                    <span class="input-group-addon"><i></i></span>
                                    <span class="ui-close" id="parentclose">X</span>
                                    </div>
                                      </div>
                                </div>
                                
                              </div>
    </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for=""></label>
                                <div class="col-sm-12 text-center">
                                  <button class="btn btn-default featured-btn" type="button" name="add-field-btn" id="add-field-btn"><i class="fa fa-plus"></i> Add More Field</button>
                                </div>
                              </div>
                              </div>
                          </div>
                          <br>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Product Tags* <span>(Write your product tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="myTags">

                                                    </ul>
                                                </div>
                                            </div>
            <input type="hidden" name="type" value="0">
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                            </div>

                                        </form>
      </div>
      <div class="tab-pane fade" id="digital">
                                        <form class="form-horizontal" action="{{route('user-prod-store1')}}" method="POST" enctype="multipart/form-data"  id="form2">

                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="name" id="blood_group_display_name" placeholder="Enter Product Name" required="" type="text" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="cat1">Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="cat1" name="category_id" required="">
                                                  <option value="">Select Category</option>
                                              @foreach($cats as $cat)
                                                  <option value="{{$cat->id}}" >{{$cat->cat_name}}</option>
                                              @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="subcat1">Sub Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="subcategory_id" id="subcat1" disabled="true">
                                                  <option value="" >Select Sub Category</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="childcat1">Child Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="childcategory_id" id="childcat1"  disabled="true" >
                                                  <option value="" >Select Child Category</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="type_check">Select Upload Type*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="type_check" id="type_check">
                                                  <option value="1" >Upload By File</option>
                                                  <option value="2" >Upload By Link</option>
                                              </select>
                                            </div>
                                          </div>
                                        <div class="form-group" id="file">
                                      <label class="control-label col-sm-4" for="edit_profile_photo">Select File</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile2" class="hidden" name="file" value="">
                                                <button type="button" id="uploadTrigger2" onclick="uploadclick2()" class="form-control"><i class="fa fa-download"></i> Upload File</button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="link" style="display: none;">
                                            <label class="control-label col-sm-4" for="edit_link">Link*</label>
                                            <div class="col-sm-6">
                                              <textarea class="form-control" name="link" id="edit_link" rows="3" style="resize: vertical;" placeholder="Enter File Link" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Featured Image*</label>
                                            <div class="col-sm-6">
                                             <img id="adminimg1" src="" alt="" style="width: 400px; height: 300px;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile1" class="hidden" name="photo" value="">
                                                <button type="button" id="uploadTrigger1" onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Product Gallery Images *<span></span></label>
                                            <div class="col-sm-6">
                                            <input style="display: none;" type="file" accept="image/*" id="uploadgallery2" name="gallery[]" multiple/>
                                            <div class="margin-top">
                                              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Set Gallery</a>
                                            </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="digital_description">Product Description*</label>
                                            <div class="col-sm-6">
                                              <textarea class="form-control" name="description" id="digital_description" rows="5" style="resize: vertical; width: 555px; height: 250px;" placeholder="Enter Profile Description" ></textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Current Price* <span>(In {{$sign->name}})</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="cprice" id="blood_group_display_name" placeholder="e.g 20" required="" type="text" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Previous Price* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="pprice" id="blood_group_display_name" placeholder="e.g 25"  type="text" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="placeholder">Youtube Video URL* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="youtube" id="placeholder" placeholder="Enter Youtube Video URL"  type="text">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="digital_policy">Product Buy/Return Policy*</label>
                                            <div class="col-xs-12 col-sm-6"> 
                                              <textarea class="form-control" name="policy" id="digital_policy" rows="5" style="resize: vertical; width: 555px; height: 250px;" placeholder="Enter Policy" ></textarea>
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check122" name="secheck" value="1">

                                              <label for="check122">Allow Product SEO</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg44" style="display: none;">  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="metaTags">Product Meta Tags*<span>(Write meta tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="metaTags1">
                                                    </ul>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="meta_description">Meta Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5" style="resize: vertical;" placeholder="Enter Meta Description"></textarea>
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                          <div class="profile-filup-description-box margin-bottom-30 row">
                            <div class="col-sm-6 col-sm-offset-4">
                            <h2 class="text-center">Feature Tags</h2>
                            <div class="qualification2" id="q2">

                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Keyword: </label>
                                        <input class="form-control" name="features[]" placeholder="Keyword" type="text" value="">
                                      </div>
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Choose Your Color: </label>
                                              <div  class="input-group colorpicker-component">
                                  <input type="text" name="colors[]" value="#000000"  class="form-control colorpick" />
                                    <span class="input-group-addon"><i></i></span>
                                    <span class="ui-close2" id="parentclose">X</span>
                                    </div>
                                      </div>
                                </div>
                                
                              </div>
    </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for=""></label>
                                <div class="col-sm-12 text-center">
                                  <button class="btn btn-default featured-btn" type="button" name="add-field-btn2" id="add-field-btn2"><i class="fa fa-plus"></i> Add More Field</button>
                                </div>
                              </div>
                              </div>
                          </div>
                          <br>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Product Tags* <span>(Write your product tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="myTags1">

                                                    </ul>
                                                </div>
                                            </div>
            <input type="hidden" name="type" value="1">
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                            </div>
                                        </form>
      </div>
      <div class="tab-pane fade" id="license">
                                        <form class="form-horizontal" action="{{route('user-prod-store2')}}" method="POST" enctype="multipart/form-data"  id="form3">

                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="name" id="blood_group_display_name" placeholder="Enter Product Name" required="" type="text" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="cat2">Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="cat2" name="category_id" required="">
                                                  <option value="">Select Category</option>
                                              @foreach($cats as $cat)
                                                  <option value="{{$cat->id}}" >{{$cat->cat_name}}</option>
                                              @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="subcat2">Sub Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="subcategory_id" id="subcat2" disabled="true">
                                                  <option value="" >Select Sub Category</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="childcat2">Child Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="childcategory_id" id="childcat2"  disabled="true" >
                                                  <option value="" >Select Child Category</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="type_check1">Select Upload Type*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="type_check1" id="type_check1">
                                                  <option value="1" >Upload By File</option>
                                                  <option value="2" >Upload By Link</option>
                                              </select>
                                            </div>
                                          </div>
                                        <div class="form-group" id="file1">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select File</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile4" class="hidden" name="file" value="">
                                                <button type="button" id="uploadTrigger4" onclick="uploadclick4()" class="form-control"><i class="fa fa-download"></i> Upload File</button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="link1" style="display: none;">
                                            <label class="control-label col-sm-4" for="edit_link1">Link*</label>
                                            <div class="col-sm-6">
                                              <textarea class="form-control" name="link" id="edit_link1" rows="3" style="resize: vertical;" placeholder="Enter File Link" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Featured Image*</label>
                                            <div class="col-sm-6">
                                             <img id="adminimg3" src="" alt="" style="width: 400px; height: 300px;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile3" class="hidden" name="photo" value="">
                                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Product Gallery Images *<span></span></label>
                                            <div class="col-sm-6">
                                            <input style="display: none;" type="file" accept="image/*" id="uploadgallery3" name="gallery[]" multiple/>
                                            <div class="margin-top">
                                              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal3"><i class="fa fa-plus"></i> Set Gallery</a>
                                            </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="digital_description">Product Description*</label>
                                            <div class="col-sm-6">
                                              <textarea class="form-control" name="description" id="license_description" rows="5" style="resize: vertical; width: 555px; height: 250px;" placeholder="Enter Profile Description" ></textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Current Price* <span>(In {{$sign->name}})</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="cprice" id="blood_group_display_name" placeholder="e.g 20" required="" type="text" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Previous Price* <span>(In {{$sign->name}}, Leave Blank if not Required)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="pprice" id="blood_group_display_name" placeholder="e.g 25"  type="text" >
                                            </div>
                                          </div>
                          <div class="profile-filup-description-box margin-bottom-30 row">
                            <div class="col-sm-6 col-sm-offset-4">
                            <h2 class="text-center">Product License</h2>
                            <div class="qualification4" id="q4">

                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-xs-12 col-sm-6">
                                        <label> License Key: </label>
                                        <input class="form-control" name="license[]" placeholder="License Key" type="text" value="" required="">
                                      </div>
                                      <div class="col-xs-12 col-sm-6">
                                        <label> License Quantity: </label>                                              
                                  <input type="number" name="license_qty[]" value="1"  class="form-control" min="1" />
                                  <span class="ui-close4" id="parentclose">X</span>
                                      </div>
                                </div>
                              </div>
    </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for=""></label>
                                <div class="col-sm-12 text-center">
                                  <button class="btn btn-default featured-btn" type="button" name="add-field-btn4" id="add-field-btn4"><i class="fa fa-plus"></i> Add More Field</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="placeholder">Youtube Video URL* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="youtube" id="placeholder" placeholder="Enter Youtube Video URL"  type="text">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="license_policy">Product Buy/Return Policy*</label>
                                            <div class="col-xs-12 col-sm-6"> 
                                              <textarea class="form-control" name="policy" id="license_policy" rows="5" style="resize: vertical; width: 555px; height: 250px;" placeholder="Enter Policy" ></textarea>
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check1222" name="secheck" value="1">

                                              <label for="check1222">Allow Product SEO</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg444" style="display: none;">  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="metaTags">Product Meta Tags*<span>(Write meta tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="metaTags2">
                                                    </ul>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="meta_description">Meta Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5" style="resize: vertical;" placeholder="Enter Meta Description"></textarea>
                                            </div>
                                          </div>
                                          <br>
                                        </div>

                          <div class="profile-filup-description-box margin-bottom-30 row">
                            <div class="col-sm-6 col-sm-offset-4">
                            <h2 class="text-center">Feature Tags</h2>
                            <div class="qualification3" id="q3">

                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Keyword: </label>
                                        <input class="form-control" name="features[]" placeholder="Keyword" type="text" value="">
                                      </div>
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Choose Your Color: </label>
                                              <div  class="input-group colorpicker-component">
                                  <input type="text" name="colors[]" value="#000000"  class="form-control colorpick" />
                                    <span class="input-group-addon"><i></i></span>
                                    <span class="ui-close3" id="parentclose">X</span>
                                    </div>
                                      </div>
                                </div>
                                
                              </div>
    </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for=""></label>
                                <div class="col-sm-12 text-center">
                                  <button class="btn btn-default featured-btn" type="button" name="add-field-btn3" id="add-field-btn3"><i class="fa fa-plus"></i> Add More Field</button>
                                </div>
                              </div>
                              </div>
                          </div>
                          <br>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Product Tags* <span>(Write your product tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="myTags2">

                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Platform * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="platform" id="blood_group_display_name" placeholder="Enter Platform" type="text" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Region * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="region" id="blood_group_display_name" placeholder="Enter Region" type="text" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Type * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="licence_type" id="blood_group_display_name" placeholder="Enter Type" type="text" >
                                                </div>
                                            </div>
                                            <input type="hidden" name="type" value="2">
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                            </div>
                                        </form>
      </div>
    </div>

</div>

                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>
<!-- Gallry Modal1 -->
<div id="myModal1" class="modal fade gallery" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Image Gallery</h4>
      </div>
      <div class="modal-body">
        <div class="gallery-btn-area text-center">
            <a style="cursor: pointer;" class="btn btn-info gallery-btn mr-5" id="prod_gallery1"><i class="fa fa-download"></i> Upload Images</a>
            <a style="cursor: pointer; background: #009432;" class="btn btn-info gallery-btn mr-5" data-dismiss="modal"><i class="fa fa-check" ></i> Done</a>
            <p style="font-size: 11px;">You can upload multiple images.</p>
        </div>

        <div class="gallery-wrap" id="gallery-wrap1">
                <div class="row">
                </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="myModal2" class="modal fade gallery" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Image Gallery</h4>
      </div>
      <div class="modal-body">
        <div class="gallery-btn-area text-center">
            <a style="cursor: pointer;" class="btn btn-info gallery-btn mr-5" id="prod_gallery2"><i class="fa fa-download"></i> Upload Images</a>
            <a style="cursor: pointer; background: #009432;" class="btn btn-info gallery-btn mr-5" data-dismiss="modal"><i class="fa fa-check" ></i> Done</a>
            <p style="font-size: 11px;">You can upload multiple images.</p>
        </div>

        <div class="gallery-wrap" id="gallery-wrap2">
                <div class="row">
                </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="myModal3" class="modal fade gallery" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Image Gallery</h4>
      </div>
      <div class="modal-body">
        <div class="gallery-btn-area text-center">
            <a style="cursor: pointer;" class="btn btn-info gallery-btn mr-5" id="prod_gallery3"><i class="fa fa-download"></i> Upload Images</a>
            <a style="cursor: pointer; background: #009432;" class="btn btn-info gallery-btn mr-5" data-dismiss="modal"><i class="fa fa-check" ></i> Done</a>
            <p style="font-size: 11px;">You can upload multiple images.</p>
        </div>

        <div class="gallery-wrap" id="gallery-wrap3">
                <div class="row">
                </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<style type="text/css">
  .nicEdit-main {
    width: 100% !important;
    min-height: 114px !important;
  }
</style>
<script type="text/javascript">
    $('.colorpicker-component').colorpicker();
    $('.colorpick').colorpicker();
</script>
<script type="text/javascript">
$("#check2").change(function() {
    if(this.checked) {
        $("#fimg").show();
    }
    else
    {
        $("#fimg").hide();

    }
});
</script>
    <script language=Javascript>
     
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode != 46 && charCode > 31
              && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      
   </script>

<script type="text/javascript">
$("#type_check").change(function() {
    var val = $(this).val();
    if(val == 1)
    {
      $('#link').hide();
      $('#file').show();
    }
    else{
      $('#link').show();
      $('#file').hide();      
    }
});
$("#type_check1").change(function() {
    var val = $(this).val();
    if(val == 1)
    {
      $('#link1').hide();
      $('#file1').show();
    }
    else{
      $('#link1').show();
      $('#file1').hide();      
    }
});
$("#check3").change(function() {
    if(this.checked) {
        $("#fimg1").show();
    }
    else
    {
        $("#fimg1").hide();

    }
});
$("#check10").change(function() {
    if(this.checked) {
        $("#fimg2").show();
    }
    else
    {
        $("#fimg2").hide();

    }
});
$("#check11").change(function() {
    if(this.checked) {
        $("#fimg3").show();
    }
    else
    {
        $("#fimg3").hide();

    }
});
$("#check12").change(function() {
    if(this.checked) {
        $("#fimg4").show();
    }
    else
    {
        $("#fimg4").hide();

    }
});
$("#check122").change(function() {
    if(this.checked) {
        $("#fimg44").show();
    }
    else
    {
        $("#fimg44").hide();

    }
});
$("#check1222").change(function() {
    if(this.checked) {
        $("#fimg444").show();
    }
    else
    {
        $("#fimg444").hide();

    }
});
$("#check50").change(function() {
    if(this.checked) {
        $("#fimg50").show();
    }
    else
    {
        $("#fimg50").hide();

    }
});
$("#product_measure").change(function() {
    var val = $(this).val();
    $('#measurement').val(val);
    if(val == "Custom")
    {
    $('#measurement').val('');
      $('#measure').show();
    }
    else{
      $('#link').show();
      $('#measure').hide();      
    }
});
</script>

<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('digital_description');
            new nicEditor().panelInstance('digital_policy');
            new nicEditor().panelInstance('license_description');
            new nicEditor().panelInstance('license_policy');
            new nicEditor().panelInstance('profile_description');
            new nicEditor().panelInstance('policy');
            $('.nicEdit-panelContain').parent().width('100%');
            $('.nicEdit-panelContain').parent().next().width('98%');
        });
  //]]>




</script>

<script type="text/javascript">
  
  function uploadclick(){
    $("#uploadFile").click();
    $("#uploadFile").change(function(event) {


         // readURL(this);
        //$("#uploadTrigger").html($("#uploadFile").val());
        const fi = document.getElementById('uploadFile');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file > 100) {
					alert(
					"File too Big, please select a file less than 100kb");
				}  else {
					  readURL(this);
            $("#uploadTrigger").html($("#uploadFile").val());
				}
			}
		}
    });  		
}



  function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#adminimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
}

  function uploadclick1(){
      $("#uploadFile1").click();
      $("#uploadFile1").change(function(event) {
        const fi = document.getElementById('uploadFile1');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file > 100) {
					alert(
					"File too Big, please select a file less than 100kb");
				}  else {
					   readURL1(this);
            $("#uploadTrigger1").html($("#uploadFile1").val());
				}
			}
		}
    });
}

  function readURL1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#adminimg1').attr('src', e.target.result);
                }
      reader.readAsDataURL(input.files[0]);
    }
}

        function uploadclick2(){
            $("#uploadFile2").click();
            $("#uploadFile2").change(function(event) {
               const fi = document.getElementById('uploadFile2');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file > 100) {
					alert(
					"File too Big, please select a file less than 100kb");
				}  else {
                readURL2(this);
                $("#uploadTrigger2").html($("#uploadFile2").val());
				}
			}
		}
            
            });

        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

  function uploadclick3(){
      $("#uploadFile3").click();
      $("#uploadFile3").change(function(event) {
         const fi = document.getElementById('uploadFile3');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file > 100) {
					alert(
					"File too Big, please select a file less than 100kb");
				}  else {
            readURL3(this);
            $("#uploadTrigger3").html($("#uploadFile3").val());
				}
			}
		}
     
      });

}

  function readURL3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#adminimg3').attr('src', e.target.result);
                }
      reader.readAsDataURL(input.files[0]);
    }
}

        function uploadclick4(){
            $("#uploadFile4").click();
            $("#uploadFile4").change(function(event) {
              const fi = document.getElementById('uploadFile4');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file > 100) {
					alert(
					"File too Big, please select a file less than 100kb");
				}  else {
                readURL4(this);
                $("#uploadTrigger4").html($("#uploadFile4").val());
				}
			}
		}

            });

        }

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

<script type="text/javascript">

  $('#cat, #cat1, #cat2').on('change', function() {
    var cat = $(this).val();

      $('#subcat, #subcat1, #subcat2').html('<option >Select Sub Category</option>');
      $('#subcat, #subcat1, #subcat2').attr('disabled', true);  
      $('#childcat, #childcat1, #childcat2').html('<option >Select Child Category</option>');
      $('#childcat, #childcat1, #childcat2').attr('disabled', true);   
    
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/subcats')}}",
            data:{id:cat},
            success:function(data){
                  $('#subcat, #subcat1, #subcat2').html('<option value="" >Select Sub Category</option>');

                   for(var k in data)
                    {
                      $('#subcat, #subcat1, #subcat2').append('<option  value="'+data[k]['id']+'">'+data[k]['sub_name']+'</option>');                      
                    } 
                    if(data != "")
                    {
                     $('#subcat, #subcat1, #subcat2').attr('disabled', false);                        
                    }
                
                }
              
      });      
    
});

  $('#subcat, #subcat1, #subcat2').on('change', function() {
    var subcat = $(this).val();

      $('#childcat, #childcat1, #childcat2').html('<option >Select Child Category</option>'); 
      $('#childcat, #childcat1, #childcat2').attr('disabled', true);  
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/childcats')}}",
            data:{id:subcat},
            success:function(data){
                  $('#childcat, #childcat1, #childcat2').html('<option  value="">Select Child Category</option>');

                   for(var k in data)
                    {
                      $('#childcat, #childcat1, #childcat2').append('<option  value="'+data[k]['id']+'">'+data[k]['child_name']+'</option>');                      
                    } 
                    if(data != "")
                    {
                      $('#childcat, #childcat1, #childcat2').attr('disabled', false); 
                    }              
                }
              
      });      
    


});
</script>
  
<script type="text/javascript">
      $(document).on('click','#add-color',function() {

        $(".color-area").append('<div class="form-group single-color">'+
                ' <label class="control-label col-sm-4" for="blood_group_display_name">'+
                 ' Product Colors* <span>(Choose Your Favourite Color.)</span></label>'+
                  '<div class="col-sm-6">'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="color[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                   '<span class="ui-close1">X</span>'+
                      '</div>'+
                   '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close1' ,function() {
    $(this.parentNode.parentNode.parentNode).hide();
    $(this.parentNode.parentNode.parentNode).remove();
    if (isEmpty($('#q1'))) {

        $(".color-area").append('<div class="form-group single-color">'+
                ' <label class="control-label col-sm-4" for="blood_group_display_name">'+
                 ' Product Colors* <span>(Choose Your Favourite Color.)</span></label>'+
                  '<div class="col-sm-6">'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="color[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                   '<span class="ui-close1">X</span>'+
                      '</div>'+
                   '</div>'+
                 '</div>');

            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();
    }
  });
</script>


<script type="text/javascript">
      $(document).on('click','#add-field-btn',function() {
        $(".qualification").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> Keyword: </label>'+
'<input type="text" class="form-control" name="features[]" placeholder="Keyword" required="">'+
                   '</div>'+                
                   '<div class="col-xs-12 col-sm-6">'+
                   '<label> Choose Your Color: </label>'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                  '<span class="ui-close">X</span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close' ,function() {
    $(this.parentNode.parentNode.parentNode.parentNode).hide();
    $(this.parentNode.parentNode.parentNode.parentNode).remove();
    if (isEmpty($('#q'))) {
        $(".qualification").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> Keyword: </label>'+
'<input type="text" class="form-control" name="features[]" placeholder="Keyword">'+
                   '</div>'+                
                   '<div class="col-xs-12 col-sm-6">'+
                   '<label> Choose Your Color: </label>'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                  '<span class="ui-close">X</span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();
    }
  });
</script>

<script type="text/javascript">
      $(document).on('click','#add-field-btn2',function() {
        $(".qualification2").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> Keyword: </label>'+
'<input type="text" class="form-control" name="features[]" placeholder="Keyword" required="">'+
                   '</div>'+                
                   '<div class="col-xs-12 col-sm-6">'+
                   '<label> Choose Your Color: </label>'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                  '<span class="ui-close2">X</span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close2' ,function() {
    $(this.parentNode.parentNode.parentNode.parentNode).hide();
    $(this.parentNode.parentNode.parentNode.parentNode).remove();
    if (isEmpty($('#q2'))) {

        $(".qualification2").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> Keyword: </label>'+
'<input type="text" class="form-control" name="features[]" placeholder="Keyword">'+
                   '</div>'+                
                   '<div class="col-xs-12 col-sm-6">'+
                   '<label> Choose Your Color: </label>'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                  '<span class="ui-close2">X</span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();
    }
  });
</script>

<script type="text/javascript">
      $(document).on('click','#add-field-btn3',function() {
        $(".qualification3").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> Keyword: </label>'+
'<input type="text" class="form-control" name="features[]" placeholder="Keyword" required="">'+
                   '</div>'+                
                   '<div class="col-xs-12 col-sm-6">'+
                   '<label> Choose Your Color: </label>'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                  '<span class="ui-close3">X</span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close3' ,function() {
    $(this.parentNode.parentNode.parentNode.parentNode).hide();
    $(this.parentNode.parentNode.parentNode.parentNode).remove();
    if (isEmpty($('#q3'))) {
        $(".qualification3").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> Keyword: </label>'+
'<input type="text" class="form-control" name="features[]" placeholder="Keyword">'+
                   '</div>'+                
                   '<div class="col-xs-12 col-sm-6">'+
                   '<label> Choose Your Color: </label>'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                  '<span class="ui-close3">X</span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();
    }
  });
</script>

<script type="text/javascript">
      $(document).on('click','#add-field-btn4',function() {
        $(".qualification4").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> License Key: </label>'+
'<input type="text" class="form-control" name="license[]" placeholder="License Key" required="">'+
                   '</div>'+               
                   '<div class="col-xs-12 col-sm-6">'+
                 '<label> License Quantity: </label>'+
                '<input type="number" name="license_qty[]" value="1"  class="form-control" min="1">'+
                  '<span class="ui-close4">X</span>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close4' ,function() {
    $(this.parentNode.parentNode.parentNode).hide();
    $(this.parentNode.parentNode.parentNode).remove();
    if (isEmpty($('#q4'))) {
        $(".qualification4").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-12 col-sm-6">'+
                 '<label> License Key: </label>'+
'<input type="text" class="form-control" name="license[]" placeholder="License Key" required="">'+
                   '</div>'+               
                   '<div class="col-xs-12 col-sm-6">'+
                 '<label> License Quantity: </label>'+
                '<input type="number" name="license_qty[]" value="1"  class="form-control" min="1">'+
                  '<span class="ui-close4">X</span>'+
                    '</div>'+
                    '</div>'+
                  '</div>'+
                 '</div>');

    }
  });
</script>


<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>    
<script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#size").tagit({
          fieldName: "size[]",
          allowSpaces: true 
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#myTags, #myTags1, #myTags2").tagit({
          fieldName: "tags[]",
          allowSpaces: true 
        });
    });

    $(document).ready(function() {
        $("#metaTags, #metaTags1, #metaTags2").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
        });
    });

// Gallery Section

  $(document).on('click', '.close1' ,function() {
    var id = $(this).find('input[type=hidden]').val();
    $('#galval1'+id).remove();
    $(this).parent().parent().remove();
  });

  $(document).on('click', '#prod_gallery1' ,function() {
    $('#uploadgallery1').click();
     $('#gallery-wrap1 .row').html('');
    $('#form1').find('.removegal1').val(0);
  });

  $("#uploadgallery1").change(function(){
     var total_file=document.getElementById("uploadgallery1").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#gallery-wrap1 .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+URL.createObjectURL(event.target.files[i])+'" alt="gallery image">'+
                                  '<div class="gallery-close close1">'+
                                  '<input type="hidden" value="'+i+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
      $('#form1').append('<input type="hidden" name="galval[]" id="galval1'+i+'" class="removegal1" value="'+i+'">')
     }

  });

  $(document).on('click', '.close2' ,function() {
    var id = $(this).find('input[type=hidden]').val();
    $('#galval2'+id).remove();
    $(this).parent().parent().remove();
  });

  $(document).on('click', '#prod_gallery2' ,function() {
    $('#uploadgallery2').click();
     $('#gallery-wrap2 .row').html('');
    $('#form2').find('.removegal2').val(0);
  });
  
  $("#uploadgallery2").change(function(){
     var total_file=document.getElementById("uploadgallery2").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#gallery-wrap2 .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+URL.createObjectURL(event.target.files[i])+'" alt="gallery image">'+
                                  '<div class="gallery-close close2">'+
                                  '<input type="hidden" value="'+i+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
      $('#form2').append('<input type="hidden" name="galval[]" id="galval2'+i+'" class="removegal2" value="'+i+'">')
     }

  });

  $(document).on('click', '.close3' ,function() {
    var id = $(this).find('input[type=hidden]').val();
    $('#galval3'+id).remove();
    $(this).parent().parent().remove();
  });

  $(document).on('click', '#prod_gallery3' ,function() {
    $('#uploadgallery3').click();
    $('#gallery-wrap3 .row').html('');
    $('#form3').find('.removegal3').val(0);
  });
  
  $("#uploadgallery3").change(function(){
     var total_file=document.getElementById("uploadgallery3").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#gallery-wrap3 .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+URL.createObjectURL(event.target.files[i])+'" alt="gallery image">'+
                                  '<div class="gallery-close close3">'+
                                  '<input type="hidden" value="'+i+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
      $('#form3').append('<input type="hidden" name="galval[]" id="galval3'+i+'" class="removegal3" value="'+i+'">')
     }

  });

</script>

    <script>
        $(document).ready(function() {
            $('#pages').change(function(ev) {
                var total = $('#pages').val();
                var tot_price = (total/100)*({{$gs->percentage_commission}});
                var tot_price1 = parseFloat(total) + parseFloat(tot_price)  ;
               // {{--  var tot_price = total + (total * 0.18);  --}}
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price1;
            });
        });
    </script>
@endsection