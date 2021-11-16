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
                                    <div class="add-product-header">
                                        <h2>Bottom Banners</h2>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('admin-banner-bottomup')}}" method="POST" enctype="multipart/form-data">
                                        @include('includes.form-success')
                                        @include('includes.form-error')
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="b1">Bottom 1 URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="bottom1" id="b1" placeholder="https://www.google.com" required="" value="{{$ad->bottom1l}}" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Bottom 1 Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->bottom1 ? asset('assets/images/'.$ad->bottom1):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile" class="hidden" name="bottom1" value="">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (555x185) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="b2">Bottom 2 URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="b2" id="admin_name" placeholder="https://www.google.com" required="" value="{{$ad->bottom2l}}" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Bottom 2 Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->bottom1 ? asset('assets/images/'.$ad->bottom2):'http://fulldubai.com/SiteImages/noimage.png'}}" alt=" Photo" id="adminimg1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile1" class="hidden" name="bottom2" value="">
                                                <button type="button" id="uploadTrigger1" onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (555x185) or Square Sized Image</p>
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
    </script>

@endsection

