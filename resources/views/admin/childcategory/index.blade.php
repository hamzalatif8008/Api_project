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
                                                    <h2>Child Category</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i>  Child Category</p>
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
                                                    <th style="width: 150px;">Category</th>
                                                    <th style="width: 150px;">Sub Category</th>
                                                    <th style="width: 150px;">Name</th>
                                                    <th style="width: 150px;">Slug</th>
                                                    <th style="width: 150px;">Status</th>
                                                    <th style="width: 200px;">Actions</th></tr>
                                              </thead>

                                              <tbody>
                                              @foreach($childcats as $cat)    
                                              <tr role="row" class="odd">
                                                      <td>{{$cat->subcategory->category->cat_name}}</td>
                                                      <td>{{$cat->subcategory->sub_name}}</td>
                                                      <td>{{$cat->child_name}}</td>
                                                      <td>{{$cat->child_slug}}</td>
                                                      <td>
                                                        <span class="dropdown">
                                            <button class="btn btn-{{$cat->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$cat->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-childcat-st',['id1'=>$cat->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('admin-childcat-st',['id1'=>$cat->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td>
                                                        <a href="{{route('admin-childcat-edit',$cat->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="javascript:;" data-href="{{route('admin-childcat-delete',$cat->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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
                    <p class="text-center">You are about to delete this Child Category. Everything will be deleted under this Child Category.</p>
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
    
  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a href="{{route('admin-childcat-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Add New Child Category</a>'+
          '</div>');                                                                       
});
</script>

@endsection