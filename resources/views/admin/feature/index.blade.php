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
                                    <div class="add-product-header">
                                        <h2>Service Section</h2>
                                    </div>
                                    <hr>
<div class="container">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="active">
          <a href="#home" role="tab" data-toggle="tab"> Shipping Section</a>
      </li>
      <li><a href="#profile" role="tab" data-toggle="tab"> Payment Section</a>
      </li>
      <li><a href="#messages" role="tab" data-toggle="tab"> Policy Section</a>
      </li>
      <li><a href="#settings" role="tab" data-toggle="tab"> Help Section</a>
      </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="home">
                                    <form class="form-horizontal" action="{{route('admin-gs-featureup')}}" method="POST" enctype="multipart/form-data">
                                        @include('includes.form-error')
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name">Title *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="ship_title" id="admin_name" placeholder="Shipping Title" required="" value="{{$data->ship_title}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name1">Text *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="ship_text" id="admin_name1" placeholder="Shipping Text" required="" value="{{$data->ship_text}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Image*</label>
                                            <div class="col-sm-6">

                                                <img id="adminimg" src="{{asset('assets/images/'.$data->ship_image)}}" alt="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile" class="hidden" name="ship_image" value="">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>

                                      
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="profile">
                                    <form class="form-horizontal" action="{{route('admin-gs-featureup')}}" method="POST" enctype="multipart/form-data">
                                         @include('includes.form-error')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name2">Title *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="pay_title" id="admin_name2" placeholder="Payment Title" required="" value="{{$data->pay_title}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name3">Text *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="pay_text" id="admin_name3" placeholder="Payment Text" required="" value="{{$data->pay_text}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Image*</label>
                                            <div class="col-sm-6">

                                                <img id="adminimg1" src="{{asset('assets/images/'.$data->pay_image)}}" alt="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile1" class="hidden" name="pay_image" value="">
                                                <button type="button" id="uploadTrigger1" onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="messages">
                                    <form class="form-horizontal" action="{{route('admin-gs-featureup')}}" method="POST" enctype="multipart/form-data">
                                        @include('includes.form-error')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name4">Title *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="ret_title" id="admin_name4" placeholder="Return Title" required="" value="{{$data->ret_title}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name5">Text *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="ret_text" id="admin_name5" placeholder="Return Text" required="" value="{{$data->ret_text}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Image*</label>
                                            <div class="col-sm-6">

                                                <img id="adminimg2" src="{{asset('assets/images/'.$data->ret_image)}}" alt="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile2" class="hidden" name="ret_image" value="">
                                                <button type="button" id="uploadTrigger2" onclick="uploadclick2()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="settings">
                                    <form class="form-horizontal" action="{{route('admin-gs-featureup')}}" method="POST" enctype="multipart/form-data">
                                        @include('includes.form-error')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name6">Title *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="help_title" id="admin_name6" placeholder="Help Title" required="" value="{{$data->help_title}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name7">Text *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="help_text" id="admin_name7" placeholder="Help Text" required="" value="{{$data->help_text}}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Image*</label>
                                            <div class="col-sm-6">

                                                <img id="adminimg3" src="{{asset('assets/images/'.$data->help_image)}}" alt="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile3" class="hidden" name="help_image" value="">
                                                <button type="button" id="uploadTrigger3" onclick="uploadclick3()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button>
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
                    $('#adminimg2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
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
    </script>

@endsection

