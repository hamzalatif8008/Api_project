@extends('layouts.admin')

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
                                                    <h2>Vendors</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors List</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
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
                                                    <th>Vendor</th>
                                                    <th>Owner Name</th> 
                                                    <th>Mobile Number</th>
                                                    <th>Type</th> 
                                                    <th>Status</th>
                                                    <th>Vendor Products</th>
                                                    <th>Vendor Orders</th>
                                                    <th>Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody> 
                                                @foreach($users as $user)                                                    
                                              <tr role="row" class="odd">
                                                  <td>{{$lang->shop_name}}: <a style=" color:{{$gs->colors == null ? '#337ab7':$gs->colors}};" href="{{route('front.vendor',str_replace(' ', '-',($user->shop_name)))}}" target="_blank">{{$user->shop_name}}</a>  
                                                      <a href="{{route('admin-frenchise-vendor-dashboard',$user->id)}}" target="_blank" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> Dashboard:{{$user->shop_name}}</a></td>
                                                     <td>{{$user->owner_name}}</td> 
                                                      <td>{{$user->shop_number}}</td> 
                                                      @if($user->v_type == 0)
                                                        <td>Vendor</td> 
                                                      @elseif ($user->v_type == 1)
                                                        <td>Wholesaler</td> 
                                                      @elseif ($user->v_type == 2)
                                                        <td>Unit</td>
                                                      @elseif ($user->v_type == 3)
                                                        <td>Factory</td>
                                                      @endif
                                                      <td>
                                                        <span class="dropdown">
                                            <button class="btn btn-{{$user->is_vendor == 2 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$user->is_vendor == 2 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                             <li><a href="{{route('admin-frenchise-vendor_active-status',['id1'=>$user->id,'id2'=>2])}}">Active</a></li>
                                                            <li><a href="{{route('admin-frenchise-vendor_active-status',['id1'=>$user->id,'id2'=>1])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td> 
                                                          <a href="{{route('admin-frenchise-vendor-prod-index',['id'=>$user->id])}}" class="btn btn-info product-btn"><i class="fa fa-edit"></i>All Products</a>
                                                          <a href="{{route('admin-frenchise-vendor-prod-deactive',['id'=>$user->id])}}" class="btn btn-info product-btn"><i class="fa fa-edit"></i>Deactivated Products</a>
                                                      </td> 
                                                      <td> 
                                                           <a href="{{route('admin-frenchise-vendor-order-index',['id'=>$user->id])}}" class="btn btn-info product-btn"><i class="fa fa-angle-right"></i> All Orders</a>
                                                            <a href="{{route('admin-frenchise-vendor-order-status',['id'=>$user->id,'status' => 'pending'])}}" class="btn btn-info product-btn"><i class="fa fa-angle-right"></i> Pending Orders</a>
                                                            <a href="{{route('admin-frenchise-vendor-order-status',['id'=>$user->id,'status' => 'processing'])}}" class="btn btn-info product-btn"><i class="fa fa-angle-right"></i> Processing Orders</a>
                                                            <a href="{{route('admin-frenchise-vendor-order-status',['id'=>$user->id,'status' => 'completed'])}}" class="btn btn-info product-btn"><i class="fa fa-angle-right"></i> Completed Orders</a>
                                                            <a href="{{route('admin-frenchise-vendor-order-status',['id'=>$user->id,'status' => 'declined'])}}" class="btn btn-info product-btn"><i class="fa fa-angle-right"></i> Declined Orders</a>
                                                      </td> 
                                                    
                                                    <td>
                                                        <input type="hidden" value="{{$user->email}}">
                                                     <a href="{{route('admin-vendor-show',$user->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                                                      <a href="{{route('admin-vendor-edit',$user->id)}}" class="btn btn-info product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                       <a style="cursor: pointer;" class="btn btn-info product-btn feature" data-toggle="modal" data-target="#feature">
                                                          <input type="hidden" id="hidden" value="{{$user->id}}">
                                                          <i class="fa fa-star"></i> Highlight
                                                        </a>
                                                      <a style="cursor: pointer; background-color: #0165cbc9;" class="btn btn-success product-btn email1"  data-toggle="modal" data-target="#emailModal1"><i class="fa fa-send"></i> Send Message</a>
                                                      <a href="javascript:;" data-href="{{route('admin-vendor-delete',$user->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>

                                                      </td>
                                                  </tr>
                                                  @endforeach
                                                  </tbody>
                                          </table></div></div>
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
    
        <div class="modal fade" id="feature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
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
                    <p class="text-center">You are about to delete this Vendor. Everything will be deleted under this Vendor.</p>
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Accept Vendor</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are about to accept this Vendor.</p>
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success btn-ok">Accept</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Reject Vendor</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are about to reject this Vendor.</p>
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Reject</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
    $(document).on("click", ".feature" , function(){    
        var max = '';
        var pid = $(this).parent().find('input[id=hidden]').val();
        $("#feature .modal-content").html('');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/vendor_feature')}}",
                    data:{id:pid},
                    success:function(data){
                      data[0] = data[0] == 1 ? "checked":"";
                      data[1] = data[1] == 1 ? "checked":"";
                      data[2] = data[2] == 1 ? "checked":"";
                      data[3] = data[3] == 1 ? "checked":"";
                      data[4] = data[4] == 1 ? "checked":"";
                      data[7] = data[7] == 1 ? "checked":"";
                      {{--  data[8] = data[8] == 1 ? "selected":"";  --}}
                        $("#feature .modal-content").append(''+
        '<form class="form-horizontal" action="{{url('/')}}/admin/vendor/feature/'+data[5]+'" method="POST">'+
        '{{csrf_field()}}'+
            '<div class="modal-header">'+
              '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                '<h4 class="modal-title text-center" id="myModalLabel2">Vendor Name:'+data[6]+'</h4>'+
                '</div>'+
                '<div class="modal-body">'+
                  '<div class="form-group">'+
                     '<label class="control-label" for="check1"></label>'+
                        '<div class="col-sm-9 col-sm-offset-3">'+
                           '<div class="btn btn-default checkbox1">'+
                              '<input type="checkbox" id="check1" name="brand" value="1" '+data[0]+'>'+ 
                                '<label for="check1">Add Shop to Brand</label>'+
                                  '</div>'+
                                  '</div>'+          
                                  '</div>'+
                                  '<div class="form-group">'+
                                '<label class="control-label" for="check2"></label>'+
                                '<div class="col-sm-9 col-sm-offset-3">'+
                                    '<div class="btn btn-default checkbox1">'+
                                    '<input type="checkbox" id="chec2" name="top" value="1" '+data[1]+'>'+
                                    '<label for="chec2">Add Shop to Top</label>'+
                                  '</div>'+
                                  '</div>'+
                                 '</div>'+
                              '<div class="form-group">'+
                              '<label class="control-label" for="check3"></label>'+
                                '<div class="col-sm-9 col-sm-offset-3">'+
                                  '<div class="btn btn-default checkbox1">'+
                                    '<input type="checkbox" id="chec3" name="top_by_category" value="1" '+data[2]+'>'+
                                      '<label for="chec3">Add Shop to Top By Category</label>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="control-label" for="check4"></label>'+
                                          '<div class="col-sm-9 col-sm-offset-3">'+
                                            '<div class="btn btn-default checkbox1">'+
                                              '<input type="checkbox" id="check4" name="nav_shop" value="1" '+data[3]+'>'+
                                                '<label for="check4">Add Shop to Nav Shop</label>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="control-label" for="check7"></label>'+
                                          '<div class="col-sm-9 col-sm-offset-3">'+
                                            '<div class="btn btn-default checkbox1">'+
                                              '<input type="checkbox" id="check7" name="coming_shop" value="1" '+data[7]+'>'+
                                                '<label for="check7">Add to Latest Update In Coming Soon Section</label>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        {{--  '<div class="form-group">'+
                                        '<label class="control-label" for="check8"></label>'+
                                          '<div class="col-sm-9 col-sm-offset-3">'+
                                            '<button class="btn btn-success product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown">'+'{{($user->wholesaler == 0) ? "Select Type" :(($user->wholesaler == 1)? "Unit":"Factory")}}'+
                                            '<span class="caret"></span>'+'</button>'+
                                              '<ul class="dropdown-menu">'+
                                             '<li><input type="radio" id="check7" name="wholesaler" value="1" '+data[8]+'>Wholesaller</li>'+
                                             '<li><input type="radio" id="check7" name="wholesaler" value="2" '+data[8]+'>Unit</li>'+
                                             '<li><input type="radio" id="check7" name="wholesaler" value="3" '+data[8]+'>Factory</li>'+
                                             '</ul>'+
                                             ' </span>'+
                                                '<label for="check8">Add Shop to A Type</label>'+
                                                    '</button>'+
                                                '</div>'+
                                            '</div>'+  --}}
                                        {{--  '<div class="form-group">'+
                                        '<label class="control-label" for="check8"></label>'+
                                          '<div class="col-sm-9 col-sm-offset-3">'+
                                            '<div class="btn btn-default checkbox1">'+
                                              '<input type="checkbox" id="check8" name="wholesaler" value="1" '+data[8]+'>'+
                                                '<label for="check8">Add Shop to A Wholesaler</label>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+  --}}
                                            '<div class="form-group">'+
                                              '<label class="control-label" for="check5"></label>'+
                                                '<div class="col-sm-9 col-sm-offset-3">'+
                                                  '<div class="btn btn-default checkbox1">'+
                                                    '<input type="checkbox" id="check5" name="top_rated" value="1" '+data[4]+'>'+
                                        '<label for="check5">Add Shop to Top Rated</label>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            
                '</div>'+
                '<div class="modal-footer" style="text-align: center;">'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>'+
                  '<button type="submit" class="btn btn-primary btn-ok">Update</button>'+'</div>'+
                  '</form>'
                  );            
              }
            });
    });
    </script>
<script type="text/javascript">
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#confirm-delete1').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#confirm-delete2').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });

</script>

@endsection