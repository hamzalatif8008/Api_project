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
                                                    <h2>Subscribe Popup Form</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Subscribe Popup Form
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-popupup')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page"> Subscribe Popup Form:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{ $gs->is_subscribe == 1 ? 'primary':'danger' }} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{ $gs->is_subscribe == 1 ? 'Activated':'Deactivated' }}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-issubscribe',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-issubscribe',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name">Popup Title *</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="subscribe_title" id="admin_name" placeholder="PopUp Title" required="" value="{{$data->subscribe_title}}" type="text">
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_name1">Popup Text *</label>
                                            <div class="col-sm-6">
                                              <textarea class="form-control" name="subscribe_text" id="admin_name1" rows="5" required="">{{$data->subscribe_text}}</textarea>
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Popup Background Image*</label>
                                            <div class="col-sm-6">
     
                                            <img src="{{ $data->vidimg ? asset('assets/images/'.$data->subscribe_image):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="No Photo" style="height: 350px; width: 520px" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Choose Background Image</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="subscribe_image" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Select Photo</button>
                                              <p class="text-center">Prefered Size: (320x180) or Square Sized Image</p>
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