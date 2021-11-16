@extends('layouts.admin')
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
                                                    <h2>Edit Customer <a href="{{ route('admin-user-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customers <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customers List <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Edit</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <form class="form-horizontal" action="{{route('admin-user-edit',$user->id)}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="admin_current_photo">Current Photo *</label>
                                                <div class="col-sm-2">
                                                                                @if($user->is_provider == 1)
                                    <img style="width: 100%; height: auto;" src="{{ $user->photo ? $user->photo:asset('assets/images/noimage.png')}}" alt="profile image">
                                    @else
                                    <img  style="width: 100%; height: auto;" id="adminimg" src="{{ $user->photo ? asset('assets/images/'.$user->photo):asset('assets/images/noimage.png')}}" alt="profile image">
                                    @endif

                                                </div>
                                                @if($user->is_provider != 1)
                                                <div class="col-sm-4">
                                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                    <button  type="button" id="uploadTrigger" onclick="uploadclick()" class="btn btn-block add-product_btn adminImg-btn"><i class="fa fa-upload"></i> Change Photo</button>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_fname">Full Name *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="name" id="dash_fname" placeholder="Full Name" value="{{$user->name}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_lname">Email Address *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="email" name="email" id="dash_lname" placeholder="Email Address" value="{{$user->email}}" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_email">Address *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="address" id="dash_email" placeholder="Address" value="Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_phone">Phone Number *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="phone" id="dash_phone" placeholder="Phone Number" value="{{$user->phone}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_city">City *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="city" id="dash_city" placeholder="City" value="{{$user->city}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_fax">Fax *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="fax" id="dash_fax" placeholder="Fax" value="{{$user->fax}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="dash_zip">Postal Code *</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="zip" id="dash_zip" placeholder="Postal Code" value="{{$user->zip}}">
                                                </div>
                                            </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update</button>
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
    <!-- Ending of Account Dashboard area -->
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