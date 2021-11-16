@extends('layouts.frenchise')

@section('content')


<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard add-product-1 area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Frenchise Profile</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Admin Profile</p>
                                                </div>
                                            </div>
                                              @include('includes.frenchise-notification')
                                        </div>   
                                    </div>
                                    <div class="row" style="">
                                    
                                        <div>
                                            <label class="control-label col-sm-2" style="margin-left:0px;" for="admin_current_photo"> Owner Name *</label>
                                            <div class="col-sm-4">
                                            <b><p>{{$frenchise->owner_name}}</p></b>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="control-label col-sm-2" for="admin_current_photo"> Frenchise Location *</label>
                                            <div class="col-sm-4">
                                           <b><p>{{$frenchise->frenchise_address}}</p></b>
                                             </div>
                                        </div>
                                    </div>
                                        <form class="form-horizontal" action="{{route('frenchise-profile-update')}}" method="POST" enctype="multipart/form-data">
                                            @include('includes.form-error')
                                            @include('includes.form-success')      
                                          {{csrf_field()}}
                                          

                                            <div class="form-group">
                                            <label class="control-label col-sm-4" for="admin_current_photo">Current Photo *</label>
                                            <div class="col-sm-2">
                                              <img width="130px" height="90px" id="adminimg" src="{{ Auth::guard('frenchise')->user()->photo ? asset('assets/images/'.Auth::guard('frenchise')->user()->photo):''}} " alt="">
                                          </div>
                                          <div class="col-sm-4">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                        <button  type="button" id="uploadTrigger" onclick="uploadclick()" class="btn btn-block add-product_btn adminImg-btn"><i class="fa fa-upload"></i> Change Photo</button>
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
                    <!-- Ending of Dashboard add-product-1 area -->
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
