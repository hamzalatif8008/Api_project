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
                                                    <h2>Frenchise</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Admin <i class="fa fa-angle-right" style="margin: 0 2px;"></i>Frenchise<i class="fa fa-angle-right" style="margin: 0 2px;"></i>List</p>
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
                                                    <th>Frenchise Name</th>
                                                    <th>Owner Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile#</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                                @foreach($frenchises as $frenchise)                                                  
                                              <tr role="row" class="odd">

                                                      <td>
                                                      <a href="{{route('admin-frenchise-dashboard',$frenchise->id)}}" class="btn btn-primary product-btn" target="_blank"><i class="fa fa-eye"></i> View Dashboard  </a><br>
                                                          {{$frenchise->frenchise_name}}</td>
                                                      <td>{{$frenchise->owner_name}}</td>
                                                      <td>{{$frenchise->email}}</td>
                                                      <td>{{$frenchise->mobile_number}}</td>
                                                      <td>{{$frenchise->frenchise_address}}</td>
                                                      <td>
                                                        <span class="dropdown">
                                            <button class="btn btn-{{$frenchise->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$frenchise->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-frenchise-st',['id1'=>$frenchise->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('admin-frenchise-st',['id1'=>$frenchise->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td>
                                                        <input type="hidden" value="{{$frenchise->email}}">
                                                      <a href="{{route('admin-frenchise-show',$frenchise->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i>View Details </a><br>
                                                      <a href="{{route('admin-frenchise-edit',$frenchise->id)}}" class="btn btn-info product-btn"><i class="fa fa-edit"></i>Edit </a><br>
                                                      <a class="btn btn-success product-btn "  data-toggle="modal" data-target="#emailModal1"><i class="fa fa-send"></i>Send Message</a><br>
                                                      <a  href="javascript:;" data-href="{{route('admin-frenchise-delete',$frenchise->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i>Remove </a>

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