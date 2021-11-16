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
                                                    <h2>Add Staff <a href="{{ route('admin-staff-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Staffs <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Add
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-staff-store')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="slider_text _position">Select Staff Role*</label>
                                            <div class="col-sm-6">
                                                <select id="slider_text _position" name="role" class="form-control" required="">
                                                    <option value="">Select Staff Role</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="service_title">Staff Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" id="service_title" placeholder="e.g John Doe" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="service_title1">Staff Email* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="email" id="service_title1" placeholder="{{'e.g JohnVohn@gmail.com'}}" required="">
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Image*</label>
                                            <div class="col-sm-6">
     
                                              <img style="width: 250px; height: auto;" id="adminimg" src="" alt="" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Featured Image</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Add Profile Photo</button>
                                              <p class="text-center">Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>


                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="service_title2">Staff Phone Number* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="phone" id="service_title2" placeholder="e.g 11232321232" required="">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="service_title3">Staff Password* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="password" id="service_title3" required="">
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

</script>

@endsection

