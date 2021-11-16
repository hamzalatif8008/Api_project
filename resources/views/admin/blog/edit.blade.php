@extends('layouts.admin')
@section('styles')
<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">
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
                                                    <h2>Update Blog <a href="{{ route('admin-blog-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Blog <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-blog-update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_title">Title*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="title" id="edit_title" placeholder="Enter Title " required="" type="text" value="{{$blog->title}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Image*</label>
                                            <div class="col-sm-6">
     
                                              <img style="width: 100%; max-height: 500px;" id="adminimg" src="{{ $blog->photo ? asset('assets/images/'.$blog->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Featured Image</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Add Blog Photo</button>
                                              <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_description">Details*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="details" id="edit_profile_description" rows="10" style="resize: vertical;" placeholder="Enter Profile Description">{{$blog->details}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_language">Source*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="source" id="edit_language" placeholder="Enter Source" required="" type="text" value="{{$blog->source}}">
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check12" name="secheck" value="1"  {{ ($blog->meta_tag != null || $blog->meta_description != null) ? 'checked':'' }}>

                                              <label for="check12">Allow Blog SEO</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg4" {!! ($blog->meta_tag == null || $blog->meta_description == null) ? "style='display: none;'":"" !!}>  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="metaTags">Blog Meta Tags*<span>(Write meta tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="metaTags">
                                                        @if(!empty($metatags))
                                                            @foreach($metatags as $tag)
                                                                <li>{{$tag}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="meta_description">Meta Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5" style="resize: vertical;" placeholder="Enter Meta Description">{{$blog->meta_description}}</textarea>
                                            </div>
                                          </div>
                                          <br>
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

<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('edit_profile_description');
        });
  //]]>
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

</script>
<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>    
<script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$("#check12").change(function() {
    if(this.checked) {
        $("#fimg4").show();
    }
    else
    {
        $("#fimg4").hide();

    }
});
    $(document).ready(function() {
        $("#metaTags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
        });
    });
</script>
@endsection