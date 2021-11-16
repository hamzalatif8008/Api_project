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

                                    <div class="product__header"  style="border-bottom: none;">

                                        <div class="row reorder-xs">

                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">

                                                <div class="product-header-title">

                                                    <h2>Update Category <a href="{{ route('admin-cat-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>

                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i>  Main Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update

                                                </div>

                                            </div>

                                              @include('includes.notification')

                                        </div>   

                                    </div>

                                        <hr>

                                        <form class="form-horizontal" action="{{route('admin-cat-type_update',$cat)}}" method="POST" enctype="multipart/form-data">

                                            {{csrf_field()}}

                                          @include('includes.form-error')

                                          @include('includes.form-success')

                                        




                                          <div class="form-group">

                                            <label class="control-label col-sm-4" for="current_photo">First Photo*</label>

                                            <div class="col-sm-6">

                                              <img width="130px" height="90px" id="adminimg" src="http://fulldubai.com/SiteImages/noimage.png" alt="" id="adminimg">

                                            </div>

                                          </div>
                                          
                                           <div class="form-group">

                                            <label class="control-label col-sm-4" for="current_photo">Second Photo*</label>

                                            <div class="col-sm-6">

                                              <img width="130px" height="90px" id="adminimg1" src="http://fulldubai.com/SiteImages/noimage.png" alt="" id="adminimg1">

                                            </div>

                                          </div>

                                         <div class="form-group">

                                            <label class="control-label col-sm-4" for="current_photo">Third Photo*</label>

                                            <div class="col-sm-6">

                                              <img width="130px" height="90px" id="adminimg2" src="http://fulldubai.com/SiteImages/noimage.png" alt="" id="adminimg2">

                                            </div>

                                          </div>

                                          <div class="form-group">
                                               <label class="control-label col-sm-4" for="profile_photo">Edit First Photo *</label>
                                                <div class="col-sm-6">
                                                  <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                   <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Edit Category Photo</button>
                                                </div>
                                          </div><hr>

                                         <div class="form-group">
                                               <label class="control-label col-sm-4" for="profile_photo">Edit Second Photo *</label>
                                                <div class="col-sm-6">
                                                  <input type="file" id="uploadFile1" class="hidden" name="photo1" value="">
                                                   <button type="button" id="uploadTrigger1" onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Edit Category Photo</button>
                                                </div>
                                          </div><hr>
                                            <div class="form-group">
                                               <label class="control-label col-sm-4" for="profile_photo">Edit Third Photo *</label>
                                                <div class="col-sm-6">
                                                  <input type="file" id="uploadFile2" class="hidden" name="photo2" value="">
                                                   <button type="button" id="uploadTrigger2" onclick="uploadclick2()" class="form-control"><i class="fa fa-download"></i> Edit Category Photo</button>
                                                </div>
                                          </div><hr>

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



</script>



@endsection