@extends('layouts.admin')

@section('styles')

<style type="text/css">
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
                                                    <h2>New Updates</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> New Updates 
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <hr>
<div class="container">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="active">
          <a href="#home" role="tab" data-toggle="tab">Slider</a>
      </li>
      <li><a href="#profile" role="tab" data-toggle="tab"> Banner</a>
      </li>
      <li><a href="#messages" role="tab" data-toggle="tab"> Video </a>
      </li>
      <li><a href="#settings" role="tab" data-toggle="tab"> Tag</a>
      </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="home">
 <form class="form-horizontal" action="{{route('admin-newupdate-slider')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        {{--  <div class="form-group">
                                            <label class="control-label col-sm-4" for="t1">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top1l" id="t1" placeholder="https://www.google.com" required="" value="" type="text">
                                            </div>
                                        </div>  --}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Slider Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->mainslider ? asset('assets/images/'.$ad->mainslider):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile" class="hidden" name="mainslider" value="{{$ad->mainslider}}">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x610) or Square Sized Image</p>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Slider Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->mainslider1 ? asset('assets/images/'.$ad->mainslider1):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile1" class="hidden" name="mainslider1" value="{{$ad->mainslider1}}">
                                                <button type="button" id="uploadTrigger1" onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x610) or Square Sized Image</p>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Slider Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->mainslider2 ? asset('assets/images/'.$ad->mainslider2):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile2" class="hidden" name="mainslider2" value="{{$ad->mainslider2}}">
                                                <button type="button" id="uploadTrigger2" onclick="uploadclick2()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x610) or Square Sized Image</p>
                                            </div>
                                        </div>

                                      
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="profile">
 <form class="form-horizontal" action="{{route('admin-newupdate-slider')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{--  <div class="form-group">
                                            <label class="control-label col-sm-4" for="t2">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top2l" id="t2" placeholder="https://www.google.com" required="" value="" type="text">
                                            </div>
                                        </div>  --}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->sidebanner ? asset('assets/images/'.$ad->sidebanner):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile3" class="hidden" name="sidebanner" value="{{$ad->sidebanner}}">
                                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->sidebanner1 ? asset('assets/images/'.$ad->sidebanner1):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile4" class="hidden" name="sidebanner1" value="{{$ad->sidebanner1}}">
                                                <button type="button" id="uploadTrigger4" onclick="uploadclick4()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->sidebanner2 ? asset('assets/images/'.$ad->sidebanner2):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile5" class="hidden" name="sidebanner2" value="{{$ad->sidebanner2}}">
                                                <button type="button" id="uploadTrigger5" onclick="uploadclick5()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="messages">
 <form class="form-horizontal" action="{{route('admin-newupdate-slider')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                      <div class="form-group">
                                            <label class="control-label col-sm-4" for="t3">Slider Youtube Video URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="video" id="t3" placeholder="https://www.youtube.com" required="" value="{{$ad->video}}" type="url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo"> Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->videobanner1 ? asset('assets/images/'.$ad->videobanner1):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg7">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile7" class="hidden" name="videobanner1" value="{{$ad->videobanner1}}">
                                                <button type="button" id="uploadTrigger7" onclick="uploadclick7()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t3">Youtube Video URL1 *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="video1" id="t3" placeholder="https://www.youtube.com" required="" value="{{$ad->video1}}" type="url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo"> Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->videobanner2 ? asset('assets/images/'.$ad->videobanner2):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg8">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile8" class="hidden" name="videobanner2" value="{{$ad->videobanner2}}">
                                                <button type="button" id="uploadTrigger8" onclick="uploadclick8()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t3">Youtube Video URL2 *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="video2" id="t3" placeholder="https://www.youtube.com" required="" value="{{$ad->video2}}" type="url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo"> Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->videobanner3 ? asset('assets/images/'.$ad->videobanner3):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg9">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile9" class="hidden" name="videobanner3" value="{{$ad->videobanner3}}">
                                                <button type="button" id="uploadTrigger9" onclick="uploadclick9()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t3">Youtube Video URL3 *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="video3" id="t3" placeholder="https://www.youtube.com" required="" value="{{$ad->video3}}" type="url">
                                            </div>
                                        </div>


                                        {{--  <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Video*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->video ? asset('assets/images/'.$ad->video):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile6" class="hidden" name="video" value="{{$ad->video}}">
                                                <button type="button" id="uploadTrigger6" onclick="uploadclick6()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>  --}}
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="settings">
 <form class="form-horizontal" action="{{route('admin-newupdate-slider')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{--  <div class="form-group">
                                            <label class="control-label col-sm-4" for="t4">Tag *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="tag" id="t4" placeholder="https://www.google.com" required="" value="{{$ad->tag}}" type="text">
                                            </div>
                                        </div>  --}}
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Tag *</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->tag ? asset('assets/images/'.$ad->tag):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile6" class="hidden" name="tag" value="{{$ad->tag}}">
                                                <button type="button" id="uploadTrigger6" onclick="uploadclick6()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
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
        function uploadclick1(){
            $("#uploadFile1").click();
            $("#uploadFile1").change(function(event) {
                readURL1(this);
                $("#uploadTrigger1").html($("#uploadFile1").val());
            });

        }
        function uploadclick2(){
            $("#uploadFile2").click();
            $("#uploadFile2").change(function(event) {
                readURL2(this);
                $("#uploadTrigger2").html($("#uploadFile2").val());
            });

        }
        function uploadclick3(){
            $("#uploadFile3").click();
            $("#uploadFile3").change(function(event) {
                readURL3(this);
                $("#uploadTrigger3").html($("#uploadFile3").val());
            });

        }
        function uploadclick4(){
            $("#uploadFile4").click();
            $("#uploadFile4").change(function(event) {
                readURL(this);
                $("#uploadTrigger4").html($("#uploadFile4").val());
            });

        }
        function uploadclick5(){
            $("#uploadFile5").click();
            $("#uploadFile5").change(function(event) {
                readURL(this);
                $("#uploadTrigger5").html($("#uploadFile5").val());
            });

        }
        function uploadclick6(){
            $("#uploadFile6").click();
            $("#uploadFile6").change(function(event) {
                readURL(this);
                $("#uploadTrigger6").html($("#uploadFile6").val());
            });

        }
         function uploadclick7(){
            $("#uploadFile7").click();
            $("#uploadFile7").change(function(event) {
                readURL7(this);
                $("#uploadTrigger7").html($("#uploadFile7").val());
            });

        }
        function uploadclick8(){
            $("#uploadFile8").click();
            $("#uploadFile8").change(function(event) {
                readURL8(this);
                $("#uploadTrigger8").html($("#uploadFile8").val());
            });

        }
        function uploadclick9(){
            $("#uploadFile9").click();
            $("#uploadFile9").change(function(event) {
                readURL9(this);
                $("#uploadTrigger9").html($("#uploadFile9").val());
            });

        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
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

      

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
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

         function readURL7(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg7').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
          function readURL8(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg8').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL9(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg9').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection

