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
                                                    <h2>Update Sub Category <a href="{{ route('admin-subcat-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i>  Sub Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-subcat-update',$subcat->id)}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group">Category*</label>
                                            <div class="col-sm-6"> 
                                              <select  class="form-control" name="category_id" id="edit_blood_group" required="">
                                                  <option value="">Select Category</option>
                                     @foreach($cats as $cat)
                                     <option value="{{$cat->id}}" {{$cat->cat_name == $subcat->category->cat_name?"selected":""}}>{{$cat->cat_name}}</option>
                                     @endforeach
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group_display_name"> Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="sub_name" id="edit_blood_group_display_name" placeholder="Enter Category Name" required="" type="text" value="{{$subcat->sub_name}}" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group_slug">Slug* <span>(In English)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="sub_slug" id="edit_blood_group_slug" placeholder="Enter Category Slug" required="" type="text" value="{{$subcat->sub_slug}}" >
                                            </div>
                                          </div>
 
                                     <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Current Photo*</label>
                                            <div class="col-sm-6">
                                              <img width="130px" height="90px" id="adminimg" src="{{ $subcat->photo ? asset('assets/images/'.$subcat->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Edit Photo *</label>
                                            <div class="col-sm-6">
                                              <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Edit Category Photo</button>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Percentage* <span>(By Category)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="percentage" onkeypress="return isNumberKey(event)" id="blood_group_slug" placeholder="Percentage" required="" type="text" value="{{$subcat->percentage}}">
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