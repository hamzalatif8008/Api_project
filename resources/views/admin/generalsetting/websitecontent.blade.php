@extends('layouts.admin')

@section('styles')

<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">
    .colorpicker-alpha {display:none !important;}
    .colorpicker{ min-width:128px !important;}
    .colorpicker-color {display:none !important;}
</style>

@endsection

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Website Title -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Website Contents</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Generel Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Website Contents
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-contentsup')}}" method="POST" enctype="multipart/form-data">

                                            @include('includes.form-success')      
                                            @include('includes.form-error')    
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="website_title">Website Title *</label>
                                            <div class="col-sm-6">
                                              <input name="title" id="website_title" class="form-control" placeholder="Enter Website Title" required="" type="text" value="{{$data->title}}">
                                            </div>
                                          </div>



                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Popular Tags* <span>(Write your product tags Separated by Comma[,])</span></label>
                                            <div class="col-sm-6">
                                              <ul id="myTags">
                                                @if(!empty($tags))
                                                @foreach($tags as $tag)
                                                <li>{{$tag}}</li>
                                                @endforeach
                                                @endif
                                              </ul>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="website_title">Theme Color *<span>Leaving Empty Will Set The Default Color (Don't Use RGB)</span></label>
                                            <div class="col-sm-6">
                                              <div id="cp2" class="input-group colorpicker-component">
                                  <input id="cp1" type="text" name="colors" value="{{$data->colors}}"  class="form-control"  />
                                    <span class="input-group-addon"><i></i></span>
                                    </div>

                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Product Comments:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->is_comment == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->is_comment == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-comment',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-comment',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_logo">Current Admin Background Image</label>
                                            <div class="col-sm-6">
                                              
                                        <img id="adminimg" src="{{asset('assets/images/'.$data->bimg)}}" alt="No Icon Found" id="adminimg" style="width: 100%; max-height: 450px;">
                                              </div>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="bimg">Setup New Admin Background Image</label>
                                            <div class="col-sm-6">
                                              <input  type="file" name="bimg" id="bimg">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page"> Tawk.to:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->is_talkto == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->is_talkto == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-talkto',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-talkto',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="about_us_text">Tawk.to Widget Code *</label>
                                            <div class="col-sm-6">
                                              <textarea name="talkto" id="about_us_text" class="form-control" rows="12" style="resize: vertical;" placeholder="Enter Tawk.to Widget Code" required="">{{$data->talkto}}</textarea>
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
                    <!-- Ending of Dashboard Website Title -->  
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
            $('#cp1').colorpicker();
            $('#cp2').colorpicker();
    </script>

<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>    
<script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#myTags").tagit({
          fieldName: "tags[]",
          allowSpaces: true 
        });
    });
</script>
@endsection