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
<div class="container-fluid">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="active">
          <a href="#home" role="tab" data-toggle="tab"> Front 1</a>
      </li>
      <li><a href="#profile" role="tab" data-toggle="tab"> Front 2</a>
      </li>
      <li><a href="#messages" role="tab" data-toggle="tab"> Category </a>
      </li>
      <li><a href="#settings" role="tab" data-toggle="tab"> Shop </a>
      </li>
      <li><a href="#festival" role="tab" data-toggle="tab"> Festival </a>
      </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="home">
 <form class="form-horizontal" action="{{route('admin-banner-topup')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t1">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top1l" id="t1" placeholder="https://www.google.com"  value="{{$ad->top1l}}" type="url">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->top1 ? asset('assets/images/'.$ad->top1):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile" class="hidden" name="top1" value="">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
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
 <form class="form-horizontal" action="{{route('admin-banner-topup')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t2">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top2l" id="t2" placeholder="https://www.google.com"  value="{{$ad->top2l}}" type="url">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->top2 ? asset('assets/images/'.$ad->top2):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile1" class="hidden" name="top2" value="">
                                                <button type="button" id="uploadTrigger1" onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
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
 <form class="form-horizontal" action="{{route('admin-banner-topup')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="t3">Banner URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="top3l" id="t3" placeholder="https://www.google.com"  value="{{$ad->top3l}}" type="url">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Banner Image*</label>
                                            <div class="col-sm-6">
                                                <img src="{{ $ad->top3 ? asset('assets/images/'.$ad->top3):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile2" class="hidden" name="top3" value="">
                                                <button type="button" id="uploadTrigger2" onclick="uploadclick2()" class="form-control"><i class="fa fa-download"></i> Choose Image</button>
                                                <p class="text-center">Prefered Size: (360x300) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
                                        </div>
                                    </form>
      </div>
      <div class="tab-pane fade" id="settings">

                            
                                        
                                      <div class="row">
                                        <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                        <div class="col-sm-4 add-product-btn text-right" style="float:right !important;">
                                        <a href="{{route('admin-banner-shop',['slug'=>"Shop Banner"])}}" class="add-newProduct-btn">
                                        <i class="fa fa-plus"></i> Add New Image</a>
                                        </div>
                                              <thead>
                                                  <tr>
                                                    <th style="width: 150px;">Image Url</th>
                                                    <th style="width: 150px;">Image</th>
                                                    <th style="width: 370px;">Actions</th>
                                                   </tr>
                                              </thead>

                                              <tbody>
                                        @foreach ($m_banners as $ad)
                                            <tr>
                                                <td>
                                                {{$ad->top4l}}
                                                </td>
                                                <td>
                                                <img src="{{ $ad->top4 ? asset('assets/images/'.$ad->top4):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg3" style="height:100px;width:100px">
                                                </td>
                                                <td>
                                                <a href="{{route('admin-banner-edit', ['id' => $ad->id , 'slug'=>"Shops Banner"])}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="javascript:;" data-href="{{route('admin-banner-delete', ['id' => $ad->id])}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i>Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                                </tbody>
                                          </table>
                                        </div>
                                        </div>
                                      </div>
                                    
      </div>
            <div class="tab-pane fade" id="festival">                                        
                                        <div class="row">
                                        <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper1" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                        <div class="col-sm-4 add-product-btn text-right" style="float:right !important;">
                                        <a href="{{route('admin-banner-shop',['slug'=>"Fastival Banner"])}}" class="add-newProduct-btn">
                                        <i class="fa fa-plus"></i> Add New Image</a>
                                        </div>
                                              <thead>
                                                  <tr>
                                                    <th style="width: 150px;">Image Url</th>
                                                    <th style="width: 150px;">Image</th>
                                                    <th style="width: 370px;">Actions</th>
                                                   </tr>
                                              </thead>

                                              <tbody>
                                        @foreach ($m_banners1 as $ad)
                                            <tr>
                                                <td>
                                                {{$ad->top5l}}
                                                </td>
                                                <td>
                                                <img src="{{ $ad->top5 ? asset('assets/images/'.$ad->top5):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Photo" id="adminimg4" style="height:100px;width:100px">
                                                </td>
                                                <td>
                                                <a href="{{route('admin-banner-edit', ['id' => $ad->id , 'slug'=>"Fastival Banner"])}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="javascript:;" data-href="{{route('admin-banner-delete', ['id' => $ad->id])}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i>Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                                </tbody>
                                          </table>
                                        </div>
                                        </div>
                                      </div>

                                    
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
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

$('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>

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
       
    </script>

@endsection

