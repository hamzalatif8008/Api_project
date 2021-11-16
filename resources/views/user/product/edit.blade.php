@extends('layouts.user')

@section('styles')

<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">
    .colorpicker-alpha {display:none !important;}
    .colorpicker{ min-width:128px !important;}
    .colorpicker-color {display:none !important;}
    .add-product-box .form-horizontal .form-group:last-child {margin-bottom: 20px; }
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
                                                    <h2>Update Product <a href="{{ route('user-prod-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Products <i class="fa fa-angle-right" style="margin: 0 2px;"></i> All Products <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('user-prod-update',$prod->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="name" id="blood_group_display_name" placeholder="Enter Product Name" required="" value="{{$prod->name}}" type="text" >
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check10" name="pccheck" value="1" {{$prod->product_condition != 0 ? "checked":""}}> 
                                              <label for="check10">Allow Product Condition</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg2" {!! $prod->product_condition == 0 ? "style='display: none;'":"" !!}>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="product_condition">Product Condition*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="product_condition" name="product_condition">
                                                  <option value="2" {{$prod->product_condition == 2 
                                                    ? "selected":""}}>New</option>
                                                  <option value="1" {{$prod->product_condition == 1 
                                                    ? "selected":""}}>Used</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="cat">Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="cat" name="category_id" required="" >
                                                  <option value="" >Select Category</option>
                                              @foreach($cats as $cat)
                                                  <option value="{{$cat->id}}" {{$cat->id == $prod->category_id ? "selected":""}} >{{$cat->cat_name}}</option>
                                              @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group">Sub Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="subcategory_id" id="subcat" >
                                                  <option value="" >Select Sub Category</option>
                                                  @if($prod->subcategory_id == null)
                                                  @foreach($prod->category->subs as $sub)
                                                  <option value="{{$sub->id}}" >{{$sub->sub_name}}</option>
                                                  @endforeach
                                                  @else
                                                  @foreach($prod->category->subs as $sub)
                                                  <option value="{{$sub->id}}" {{$sub->id == $prod->subcategory_id ? "selected":""}} >{{$sub->sub_name}}</option>
                                                  @endforeach                                                  
                                                  @endif
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group">Child Category*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" name="childcategory_id" id="childcat" {{$prod->subcategory_id == null ? "disabled":""}} >
                                                  <option value="" >Select Child Category</option>
                                                  @if($prod->subcategory_id != null)
                                                  @if($prod->childcategory_id == null)
                                                  @foreach($prod->subcategory->childs as $child)
                                                  <option value="{{$child->id}}" >{{$child->child_name}}</option>
                                                  @endforeach
                                                  @else
                                                  @foreach($prod->subcategory->childs as $child)
                                                  <option value="{{$child->id}} " {{$child->id == $prod->childcategory_id ? "selected":""}}>{{$child->child_name}}</option>
                                                  @endforeach
                                                  @endif                                               
                                                  @endif
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Current Featured Image*</label>
                                            <div class="col-sm-6">
                                             <img id="adminimg" src="{{asset('assets/images/'.$prod->photo)}}" alt="" style="width: 400px; height: 300px;">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Select Image *</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Edit Featured Image</button>
                                              <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Product Gallery Images *<span></span></label>
                                            <div class="col-sm-6">
                                            <input style="display: none;" type="file" accept="image/*" id="uploadgallery1" name="gallery[]" multiple/>
                                            <div class="margin-top">
                                              <a href="" class="btn btn-primary view-gallery" data-toggle="modal" data-target="#myModal">
                                                <input type="hidden" value="{{$prod->id}}">
                                                <i class="fa fa-eye"></i> View Gallery</a>
                                            </div>
                                            </div>
                                          </div>
                                        <hr>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check11" name="shcheck" value="1" {{$prod->ship != null ? "checked":""}}> 
                                              <label for="check11">Allow Estimated Shipping Time</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg3" {!! $prod->ship == null ? "style='display: none;'":"" !!}>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="ship_time">Product Estimated Shipping Time*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="ship" id="ship_time" placeholder="Estimated Shipping Time" value=" {{ $prod->ship != null ? $prod->ship:"" }}" type="text">
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check2" name="scheck" value="1" {{$prod->size != null ? "checked":""}}> 
                                              <label for="check2">Allow Product Sizes</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg" {!! $prod->size == null ? "style='display: none;'":"" !!}>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Sizes* <span>(Write your own size Separated by Comma[,])</span></label>
                                            <div class="col-sm-6">
                                              <ul id="size">
                                                @if(!empty($size))
                                                @foreach($size as $sz)
                                                <li>{{$sz}}</li>
                                                @endforeach
                                                @else
                                                <li>X</li>
                                                <Li>XL</Li>
                                                <li>XXL</li>
                                                <li>M</li>
                                                <li>L</li>
                                                <li>S</li>
                                                @endif
                                              </ul>
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check3" name="colcheck" value="1" {{$prod->color != null ? "checked":""}}>
                                              <label for="check3">Allow Product Colors</label>
                                              </div>
                                            </div>          
                                        </div> 

                                        <div id="fimg1" {!! $prod->color == null ? "style='display: none;'":"" !!}>
                                          <div class="color-area" id="q1">
                                          @if(!empty($colrs))
                                          @foreach($colrs as $colr)
                                           <div class="form-group  single-color">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Product Colors* <span>(Choose Your Favourite Color.)</span></label>
                                                <div class="col-sm-6">
                                                      <div class="input-group colorpicker-component">
                                                            <input type="text" name="color[]" value="{{$colr}}" class="form-control colorpick"  />
                                                            <span class="input-group-addon"><i></i></span>
                                                            <span class="ui-close1" id="parentclose">X</span>
                                                      </div>
                                                </div>
                                                
                                            </div>
                                          @endforeach
                                          @else
                                           <div class="form-group  single-color">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Colors* <span>(Choose Your Favourite Color.)</span></label>
                                            <div class="col-sm-6">
                  <div class="input-group colorpicker-component">
                <input type="text" name="color[]" value="#000000"    class="form-control colorpick"  />
                    <span class="input-group-addon"><i></i></span>
                    <span class="ui-close1" id="parentclose">X</span>
                      </div>
                                            </div>
                                          
                                          </div> 
                                          @endif  
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
                                              <textarea class="form-control" name="description" id="profile_description" rows="5" style="resize: vertical;" placeholder="Enter Profile Description">{{$prod->description}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Current Price* <span>(In {{$sign->name}})</span></label>
                                            <div class="col-sm-3">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="cprice" id="pages"  placeholder="e.g 20" required=""value="{{round($prod->cprice * $sign->value , 2)}}" type="text">
                                              <label><span>Current Price*</span></label>
                                            </div>
                                            <div class="col-sm-3">
                                              <input class="form-control" id="tot_amount" placeholder="e.g 20" type="text" disabled>
                                              <label><span>Actuall Price after 15% tax including *</span></label>
                                            </div>
                                          </div>
                                          {{--  <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Current Price* <span>(In {{$sign->name}})</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="cprice" id="blood_group_display_name" placeholder="e.g 20" required=""  value="{{round($prod->cprice * $sign->value , 2)}}" type="text">
                                            </div>
                                          </div>  --}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Previous Price* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="pprice" id="blood_group_display_name" placeholder="e.g 25"  value="{{round($prod->pprice * $sign->value , 2)}}"  type="text">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Stock* <span>(Leave Empty will Show Always Available)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" onkeypress="return isNumberKey(event)" name="stock" id="blood_group_display_name" placeholder="e.g 15"  value="{{$prod->stock}}"  type="text">
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check50" name="mescheck" value="1"  {{ ($prod->measure != null) ? 'checked':'' }}>

                                              <label for="check50">Allow Product Measurement</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg50" {!! $prod->measure == null ? "style='display: none;'":"" !!}>  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="product_measure">Product Measurement*</label>
                                            <div class="col-sm-3">
                                      <select class="form-control" id="product_measure">
                                                  <option value="" {{$prod->measure == null ? 'selected':''}}>None</option>
                                                  <option value="Gram" {{$prod->measure == 'Gram' ? 'Gram':''}}>Gram</option>
                                                  <option value="Kilogram" {{$prod->measure == 'Kilogram' ? 'Kilogram':''}}>Kilogram</option>
                                                  <option value="Litre" {{$prod->measure == 'Litre' ? 'Litre':''}}>Litre</option>
                                                  <option value="Pound" {{$prod->measure == 'Pound' ? 'Pound':''}}>Pound</option>
                                                  <option value="Custom" {{ ($prod->measure != null && (!empty($mescheck))) ? 'selected':'' }}>Custom</option>
                                      </select>
                                            </div>

                                            <div class="col-sm-3" id="measure" {!! ($prod->measure != null && (!empty($mescheck))) ? 'selected':'style="display: none;"' !!} >
                                              <input class="form-control" name="measure" id="measurement" placeholder="Enter Unit"  type="text" value="{{$prod->measure}}">
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="placeholder">Youtube Video URL* <span>(Optional)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="youtube" id="placeholder" placeholder="https://www.youtube.com/watch?v=u3MY3vIw4Aw"  type="url" value="{{$prod->youtube}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="policy">Product Buy/Return Policy*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="policy" id="policy" rows="5" style="resize: vertical;" placeholder="Enter Profile Description">{{$prod->policy}}</textarea>
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check12" name="secheck" value="1"  {{ ($prod->meta_tag != null || $prod->meta_description != null) ? 'checked':'' }}>

                                              <label for="check12">Allow Product SEO</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg4" {!! ($prod->meta_tag == null || $prod->meta_description == null) ? "style='display: none;'":"" !!}>  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="metaTags">Product Meta Tags*<span>(Write meta tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="metaTags">
                                                        @if(!empty($metatags))
                                                            @foreach($metatags as $tag)
                                                                <li>{{$tag}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="meta_description">Meta Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5" style="resize: vertical;" placeholder="Enter Meta Description">{{$prod->meta_description}}</textarea>
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                          <div class="profile-filup-description-box margin-bottom-30">
                            <div class="col-sm-6 col-sm-offset-4">
                            <h2 class="text-center">Feature Tags</h2>
                            <div class="qualification" id="q">
                              @if($prod->features!=null && $prod->colors!=null)
                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Keywords: </label>
                                        <input class="form-control" name="features[]" id="title" placeholder="Keywords" type="text" value="{{$ttl}}">
                                      </div>
                                      <div class="col-xs-12 col-sm-6">
                                        <label> Choose Your Color: </label>
                                              <div  class="input-group colorpicker-component">
                                  <input type="text" name="colors[]"   value="{{$dtl}}"  class="form-control colorpick"  />
                                    <span class="input-group-addon"><i></i></span>
                                    <span class="ui-close">X</span>
                                    </div>
                                      </div>
                                </div>
                                
                              </div>
                              @endforeach
                              @else
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
                              @endif

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
                                                        @if(!empty($tags))
                                                            @foreach($tags as $tag)
                                                                <li>{{$tag}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
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
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>
<div id="myModal" class="modal fade gallery" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Image Gallery</h4>
      </div>
      <div class="modal-body">
        <div class="gallery-btn-area text-center">
          <form  method="POST" enctype="multipart/form-data" id="form-gallery">
            {{ csrf_field() }}
            <input style="display: none;" type="file" accept="image/*" id="gallery" name="gallery[]" multiple/>
          <input type="hidden" name="product_id" value="" id="pid">
          </form>
            <a style="cursor: pointer;" class="btn btn-info gallery-btn mr-5" id="prod_gallery"><i class="fa fa-download"></i> Upload Images</a>
            <a style="cursor: pointer; background: #009432;" class="btn btn-info gallery-btn mr-5" data-dismiss="modal"><i class="fa fa-check" ></i> Done</a>
            <p style="font-size: 11px;">You can upload multiple images.</p>
        </div>

        <div class="gallery-wrap">
                <div class="row">

                </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')

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
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </script>
<script type="text/javascript">
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
            new nicEditor().panelInstance('profile_description');
            new nicEditor().panelInstance('policy');
        });
  //]]>
</script>

<script type="text/javascript">
  
  function uploadclick(){
    $("#uploadFile").click();
    $("#uploadFile").change(function(event) {
          readURL(this);
        $("#uploadTrigger").html($("#uploadFile").val());
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
            readURL1(this);
            $("#uploadTrigger1").html($("#uploadFile1").val());
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
                readURL2(this);
                $("#uploadTrigger2").html($("#uploadFile2").val());
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

</script>

<script type="text/javascript">

  $('#cat, #cat1').on('change', function() {
    var cat = $(this).val();

      $('#subcat').html('<option >Select Sub Category</option>');
      $('#subcat').attr('disabled', true);  
      $('#childcat').html('<option >Select Child Category</option>');
      $('#childcat').attr('disabled', true);   
    
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/subcats')}}",
            data:{id:cat},
            success:function(data){
                  $('#subcat').html('<option value="" >Select Sub Category</option>');

                   for(var k in data)
                    {
                      $('#subcat').append('<option  value="'+data[k]['id']+'">'+data[k]['sub_name']+'</option>');                      
                    } 
                    if(data != "")
                    {
                     $('#subcat').attr('disabled', false);                        
                    }
                
                }
              
      });      
    
});

  $('#subcat').on('change', function() {
    var subcat = $(this).val();

      $('#childcat').html('<option >Select Child Category</option>'); 
      $('#childcat').attr('disabled', true);  
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/childcats')}}",
            data:{id:subcat},
            success:function(data){
                  $('#childcat').html('<option  value="">Select Child Category</option>');

                   for(var k in data)
                    {
                      $('#childcat').append('<option  value="'+data[k]['id']+'">'+data[k]['child_name']+'</option>');                      
                    } 
                    if(data != "")
                    {
                      $('#childcat').attr('disabled', false); 
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
        $("#myTags").tagit({
          fieldName: "tags[]",
          allowSpaces: true 
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#metaTags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
        });
    });
</script>
<script type="text/javascript">
    $(document).on("click", ".view-gallery" , function(){
        var pid = $(this).parent().find('input[type=hidden]').val();
        $('#pid').val(pid);
        $('.gallery-wrap .row').html('');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/gallery')}}",
                    data:{id:pid},
                    success:function(data){
                      if(data[0] == 0)
                      {
      $('.gallery-wrap .row').html('<h3 class="text-center">No Images Found.</h3>');
     }
                     
                      else {
      
                          var arr = $.map(data[1], function(el) {
                          return el });
                          for(var k in arr)
                          {
        $('.gallery-wrap .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+'{{asset('assets/images/gallery').'/'}}'+arr[k]['photo']+'" alt="gallery image">'+
                                  '<div class="gallery-close">'+
                                  '<input type="hidden" value="'+arr[k]['id']+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
                          }                         
                       }
 
                    }
                  });
      });



  $(document).on('click', '#prod_gallery' ,function() {
    $('#gallery').click();
  });
  
  $("#gallery").change(function(){
    var pid = $("#pid").val();
    var total_file = document.getElementById("gallery").files.length;
    $("#form-gallery").submit();  
   });
    </script>
    <script type="text/javascript">
  $(document).on('submit', '#form-gallery' ,function() {
  $.ajax({
                    url:"{{URL::to('/json/addgallery')}}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    if(data != 0)
    {
                          var arr = $.map(data, function(el) {
                          return el });
                          for(var k in arr)
                          {
        $('.gallery-wrap .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+'{{asset('assets/images/gallery').'/'}}'+data[k]['photo']+'" alt="gallery image">'+
                                  '<div class="gallery-close">'+
                                  '<input type="hidden" value="'+data[k]['id']+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
                          }          
    }
                     
                       }

  });
  return false;
 }); 

    </script>
<script type="text/javascript">
    $(document).on('click', '.gallery-close' ,function() {
    var pid = $(this).find('input[type=hidden]').val();
    $(this).parent().parent().remove();
              $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/removegallery')}}",
                    data:{id:pid}
                  });
  });
</script>
      <script>
        $(document).ready(function() {
            $('#pages').keyup(function(ev) {
                var total = $('#pages').val();
                var tot_price = (total/100)*({{$gs->percentage_commission}});
                var tot_price1 = parseFloat(total) + parseFloat(tot_price)  ;
               // {{--  var tot_price = total + (total * 0.18);  --}}
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price1;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#pages').ready(function(ev) {
                var total = $('#pages').val();
                var tot_price = (total/100)*({{$gs->percentage_commission}});
                var tot_price1 = parseFloat(total) + parseFloat(tot_price)  ;
               // {{--  var tot_price = total + (total * 0.18);  --}}
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price1;
            });
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
@endsection