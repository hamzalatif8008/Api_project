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
                                                    <h2>Update Child Category <a href="{{ route('admin-childcat-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i>  Child Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-childcat-update',$childcat->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                            {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group">Category*</label>
                                            <div class="col-sm-6"> 
                                              <select class="form-control" name="category_id" id="cat" required="">
                                                  <option value="">Select Category</option>
                                     @foreach($cats as $cat)
                                     <option value="{{$cat->id}}" {{$cat->id == $childcat->subcategory->category->id?"selected":""}}>{{$cat->cat_name}}</option>
                                     @endforeach
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group">Sub Category*</label>
                                            <div class="col-sm-6"> 
                                            <select  class="form-control" name="subcategory_id" id="subcat" required="">
                                                  <option value="">Select Sub Category</option>
                                            @foreach($childcat->subcategory->category->subs as $sub)
                                            <option value="{{$sub->id}}" {{$sub->id == $childcat->subcategory->id ? "selected":""}}>{{$sub->sub_name}}</option>
                                            @endforeach
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group_display_name"> Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="child_name" id="edit_blood_group_display_name" placeholder="Enter Category Name" required="" type="text" value="{{$childcat->child_name}}" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group_slug">Slug* <span>(In English)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="child_slug" id="edit_blood_group_slug" placeholder="Enter Category Slug" required="" type="text" value="{{$childcat->child_slug}}" >
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

<script type="text/javascript">

  $('#cat').on('change', function() {
    var cat = $(this).val();
    if (cat == "") 
    {
      $('#subcat').html('<option>Select Sub Category</option>');
      $('#subcat').prop('disabled', true);   
    }
    else
    {
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/subcats')}}",
            data:{id:cat},
            success:function(data){
                  $('#subcat').html('');

                   for(var k in data)
                    {
                      $('#subcat').append('<option value="'+data[k]['id']+'">'+data[k]['sub_name']+'</option>');                      
                    } 
                  $('#subcat').prop('disabled', false);                  
                }              
      });      
    }


});
</script>


@endsection