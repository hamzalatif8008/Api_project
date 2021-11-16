@extends('layouts.admin')

@section('styles')


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
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Update Slider <a href="{{ route('admin-sl-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Sliders <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-sl-edit',$ad->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}



                                            <div class="panel panel-default" style="margin: 20px 20px;">
                                                <div class="panel-heading text-center" style="background-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};color: #ffffff;"><h3>Title</h3></div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-2">
                                                            <label class="control-label" for="edit_language">Text*</label>

                                                            <textarea class="form-control" name="title" id="edit_language" rows="5" style="resize: vertical;" placeholder="Enter  Title Text"> {{$ad->title}}</textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-2" style="padding: 0;">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="title_size">Font Size*<span style="display: inline; font-size: 16px;"> (px)</span></label>
                                                                <input class="form-control" type="number" name="title_size" value="{{$ad->title_size}}" min="1">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="title_color">Font Color*</label>

                                                                <div  class="input-group colorpicker-component" >
                                                                    <input type="text" name="title_color" value="{{$ad->title_color}}" class="form-control colorpick"/>
                                                                    <span class="input-group-addon"><i></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="title_anime">Animation*</label>

                                                                <select class="form-control" id="title_anime" name="title_anime">
                                                                    <option value="fadeIn" {{$ad->title_anime == 'fadeIn' ? 'selected':''}}>fadeIn</option>
                                                                    <option value="fadeInDown" {{$ad->title_anime == 'fadeInDown' ? 'selected':''}}>fadeInDown</option>
                                                                    <option value="fadeInLeft" {{$ad->title_anime == 'fadeInLeft' ? 'selected':''}}>fadeInLeft</option>
                                                                    <option value="fadeInRight" {{$ad->title_anime == 'fadeInRight' ? 'selected':''}}>fadeInRight</option>
                                                                    <option value="fadeInUp" {{$ad->title_anime == 'fadeInUp' ? 'selected':''}}>fadeInUp</option>
                                                                    <option value="flip" {{$ad->title_anime == 'flip' ? 'selected':''}}>flip</option>
                                                                    <option value="flipInX" {{$ad->title_anime == 'flipInX' ? 'selected':''}}>flipInX</option>
                                                                    <option value="flipInY" {{$ad->title_anime == 'flipInY' ? 'selected':''}}>flipInY</option>
                                                                    <option value="slideInUp" {{$ad->title_anime == 'slideInUp' ? 'selected':''}}>slideInUp</option>
                                                                    <option value="slideInDown" {{$ad->title_anime == 'slideInDown' ? 'selected':''}}>slideInDown</option>
                                                                    <option value="slideInLeft" {{$ad->title_anime == 'slideInLeft' ? 'selected':''}}>slideInLeft</option>
                                                                    <option value="slideInRight" {{$ad->title_anime == 'slideInRight' ? 'selected':''}}>slideInRight</option>
                                                                    <option value="rollIn" {{$ad->title_anime == 'rollIn' ? 'selected':''}}>rollIn</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>


                                            <div class="panel panel-default" style="margin: 20px 20px;">
                                                <div class="panel-heading text-center" style="background-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};color: #ffffff;"><h3>Description</h3></div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-2">
                                                            <label class="control-label" for="edit_language">Text*</label>

                                                            <textarea class="form-control" name="description" id="edit_profile_description" rows="5" style="resize: vertical;" placeholder="Enter Description">{{$ad->description}}</textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-2" style="padding: 0;">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="title_size">Font Size*<span style="display: inline; font-size: 16px;"> (px)</span></label>
                                                                <input class="form-control" type="number" name="desc_size" min="1" value="{{$ad->desc_size}}">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="title_color">Font Color*</label>

                                                                <div  class="input-group colorpicker-component" >
                                                                    <input type="text" name="desc_color" value="{{$ad->desc_color}}" class="form-control colorpick"/>
                                                                    <span class="input-group-addon"><i></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label class="control-label col-sm-4" for="desc_anime">Animation*</label>

                                                                <select class="form-control" id="desc_anime" name="desc_anime">
                                                                    <option value="fadeIn" {{$ad->desc_anime == 'fadeIn' ? 'selected':''}}>fadeIn</option>
                                                                    <option value="fadeInDown" {{$ad->desc_anime == 'fadeInDown' ? 'selected':''}}>fadeInDown</option>
                                                                    <option value="fadeInLeft" {{$ad->desc_anime == 'fadeInLeft' ? 'selected':''}}>fadeInLeft</option>
                                                                    <option value="fadeInRight" {{$ad->desc_anime == 'fadeInRight' ? 'selected':''}}>fadeInRight</option>
                                                                    <option value="fadeInUp" {{$ad->desc_anime == 'fadeInUp' ? 'selected':''}}>fadeInUp</option>
                                                                    <option value="flip" {{$ad->desc_anime == 'flip' ? 'selected':''}}>flip</option>
                                                                    <option value="flipInX" {{$ad->desc_anime == 'flipInX' ? 'selected':''}}>flipInX</option>
                                                                    <option value="flipInY" {{$ad->desc_anime == 'flipInY' ? 'selected':''}}>flipInY</option>
                                                                    <option value="slideInUp" {{$ad->desc_anime == 'slideInUp' ? 'selected':''}}>slideInUp</option>
                                                                    <option value="slideInDown" {{$ad->desc_anime == 'slideInDown' ? 'selected':''}}>slideInDown</option>
                                                                    <option value="slideInLeft" {{$ad->desc_anime == 'slideInLeft' ? 'selected':''}}>slideInLeft</option>
                                                                    <option value="slideInRight" {{$ad->desc_anime == 'slideInRight' ? 'selected':''}}>slideInRight</option>
                                                                    <option value="rollIn" {{$ad->desc_anime == 'rollIn' ? 'selected':''}}>rollIn</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Slider Image*</label>
                                            <div class="col-sm-6">
     
                                            <img src="{{ $ad->photo ? asset('assets/images/'.$ad->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Blog's Photo" style="height: 150px; width: 200px" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Choose New Slider Image</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Edit Slider Photo</button>
                                              <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="position">Position*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="position" name="position">
                                                  <option value="slide_style_left" {{ $ad->position == 'slide_style_left' ? 'selected':'' }}>Left</option>
                                                  <option value="slide_style_center" {{ $ad->position == 'slide_style_center' ? 'selected':'' }}>Center</option>
                                                  <option value="slide_style_right" {{ $ad->position == 'slide_style_right' ? 'selected':'' }}>Right</option>
                                            </select>
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

@endsection

@section('scripts')


<script type="text/javascript">
  
  function uploadclick(){
    $("#uploadFile").click();
    $("#uploadFile").change(function(event) {
          readURL(this);
        $("#uploadTrigger").html($("#uploadFile").val());
    });

}

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#adminimg').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

</script>

@endsection

