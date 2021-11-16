@extends('layouts.frenchise')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard data-table area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Vendor Products</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Products</p>
                                                </div>
                                            </div>
                                              @include('includes.frenchise-notification')
                                        </div>   
                                    </div>
                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
        


                                      <div class="row">
                                        <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>

                                                    <th style="width: 150px;">Vendor</th>
                                                    <th style="width: 150px;">Product Title</th>
                                                    <th style="width: 100px;">Price</th>
                                                    <th style="width: 150px;">Stock</th>
                                                    <th style="width: 150px;">Type</th>
                                                    <th style="width: 130px;">Status</th>
                                                    <th style="width: 370px;">Actions</th></tr>
                                              </thead>

                                              <tbody>
                                              @foreach($prods as $prod)    
                                                        <tr>
                                                      @php
                                                    
                                                        $name = str_replace(" ","-",$prod->name);
                                                      @endphp
                                                      <td>
                                                      {{$lang->shop_name}}: <a style=" color:{{$gs->colors == null ? '#337ab7':$gs->colors}};" href="{{route('front.vendor',str_replace(' ', '-',($prod->user->shop_name)))}}" target="_blank">{{$prod->user->shop_name}}</a>  
                                                      <a href="{{route('frenchise-vendor-dashboard',$prod->user()->first()->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> {{$prod->user()->first()->shop_name}}</a>
                                                       </td>
                                                      <td><a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" target="_blank">{{strlen($prod->name) > 50 ? substr($prod->name, 0, 50) : $prod->name}}</a><small style="display: block; color: #777;">ID: {{sprintf("%'.08d", $prod->id)}}</small></td>
                                                      <td> {{$sign->sign}}{{round(($prod->cprice * $sign->value), 2)}} </td>
                                                      <td>
                                                          @php
                                                          $stck = (string)$prod->stock;
                                                          @endphp
                                                          @if($stck == "0")
                                                          {{"Out Of Stock"}}
                                                          @elseif($stck == null)
                                                          {{"Unlimited"}}
                                                          @else
                                                          {{$prod->stock}}
                                                          @endif
                                                      </td>
                                                      <td>
                                                        {{$prod->type == 0 ? "Physical" : ($prod->type == 1 ? "Digital" : "License")}}
                                                      </td>
                                                      <td>                                                        <span class="dropdown">
                                            <button class="btn btn-{{$prod->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$prod->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('frenchise-prod-st',['id1'=>$prod->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('frenchise-prod-st',['id1'=>$prod->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td>

                                                        <a href="{{route('frenchise-prod-edit',$prod->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a style="cursor: pointer; background-color: #0165cb;" class="btn btn-info product-btn view-gallery" data-toggle="modal" data-target="#myModal">
                                                          <input type="hidden" value="{{$prod->id}}">
                                                          <i class="fa fa-eye"></i> Gallery
                                                        </a>
                                                        <a href="javascript:;" data-href="{{route('frenchise-prod-delete',$prod->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i></a>
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
                    <!-- Ending of Dashboard data-table area -->
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
                    <p class="text-center">You are about to delete this Product. Everything will be deleted under this Product.</p>
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
<div id="myModal" class="modal fade gallery" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Image Gallery</h4>
      </div>
      <div class="modal-body">
        <div class="gallery-btn-area text-center">
          <form  method="POST" enctype="multipart/form-data" id="form-gallery">
            {{ csrf_field() }}
            <input style="display: none;" type="file" accept="image/*" id="gallery" name="gallery[]" multiple/>
          <input type="hidden" name="product_id" value="" id="pid">
          </form>
            <a style="cursor: pointer;" class="btn btn-info gallery-btn mr-5" id="prod_gallery"><i class="fa fa-download"></i> Upload Images</a>
            <a style="cursor: pointer; background: #009432;" class="btn btn-info gallery-btn mr-5" data-dismiss="modal"><i class="fa fa-check" ></i> Done</a>
            <p style="font-size: 11px;">You can upload multiple images.</p>
        </div>

        <div class="gallery-wrap">
                <div class="row">
                </div>
        </div>
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
      $(document).on("click", ".view-gallery" , function(){
        var pid = $(this).parent().find('input[type=hidden]').val();
        $('#pid').val(pid);
        $('.gallery-wrap .row').html('');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/gallery')}}",
                    data:{id:pid},
                    success:function(data){
                      if(data[0] == 0)
                      {
      $('.gallery-wrap .row').html('<h3 class="text-center">No Images Found.</h3>');
     }
                     
                      else {
      
                          var arr = $.map(data[1], function(el) {
                          return el });
                          for(var k in arr)
                          {
        $('.gallery-wrap .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+'{{asset('assets/images/gallery').'/'}}'+arr[k]['photo']+'" alt="gallery image">'+
                                  '<div class="gallery-close">'+
                                  '<input type="hidden" value="'+arr[k]['id']+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
                          }                         
                       }
 
                    }
                  });
      });



  $(document).on('click', '#prod_gallery' ,function() {
    $('#gallery').click();
  });
  
  $("#gallery").change(function(){
    var pid = $("#pid").val();
    var total_file = document.getElementById("gallery").files.length;
    $("#form-gallery").submit();  
   });
    </script>
    <script type="text/javascript">
  $(document).on('submit', '#form-gallery' ,function() {
  $.ajax({
                    url:"{{URL::to('/json/addgallery')}}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    if(data != 0)
    {
                          var arr = $.map(data, function(el) {
                          return el });
                          for(var k in arr)
                          {
        $('.gallery-wrap .row').append('<div class="col-sm-4">'+
                                  '<div class="gallery__img">'+
                                  '<img src="'+'{{asset('assets/images/gallery').'/'}}'+data[k]['photo']+'" alt="gallery image">'+
                                  '<div class="gallery-close">'+
                                  '<input type="hidden" value="'+data[k]['id']+'">'+
                                  '<i class="fa fa-close"></i>'+
                                  '</div>'+
                                  '</div>'+
                                  '</div>');
                          }          
    }
                     
                       }

  });
  return false;
 }); 

    </script>
<script type="text/javascript">
    $(document).on('click', '.gallery-close' ,function() {
    var pid = $(this).find('input[type=hidden]').val();
    $(this).parent().parent().remove();
              $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/removegallery')}}",
                    data:{id:pid}
                  });
  });
</script>
@endsection