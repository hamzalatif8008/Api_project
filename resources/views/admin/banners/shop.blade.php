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
                                                    <h2>Top Banners</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Top Banners
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
      <a href="#home" role="tab" data-toggle="tab"> {{$slug}} </a>
      </li>
      
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="home">
 <form class="form-horizontal" action="{{route('admin-banner-topup1')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        @if($slug == "Shop Banner")
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t4">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top4l" id="t4" placeholder="https://www.google.com"   type="url">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="http://fulldubai.com/SiteImages/noimage.png" alt="Photo" id="adminimg3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile3" class="hidden" name="top4" value="">
                                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                        @elseif($slug == "Fastival Banner")
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t4">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top5l" id="t4" placeholder="https://www.google.com"   type="url">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="http://fulldubai.com/SiteImages/noimage.png" alt="Photo" id="adminimg4">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile4" class="hidden" name="top5" value="">
                                                <button type="button" id="uploadTrigger4" onclick="uploadclick4()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                        @endif
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
        function uploadclick3(){
            $("#uploadFile3").click();
            $("#uploadFile3").change(function(event) {
                readURL3(this);
                $("#uploadTrigger3").html($("#uploadFile3").val());
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
                readURL4(this);
                $("#uploadTrigger4").html($("#uploadFile4").val());
            });

        }

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection

