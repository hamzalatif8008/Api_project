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
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Pending Withdraws <a href="{{ route('admin-vendor-wtt') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customers <i class="fa fa-angle-right" style="margin: 0 2px;"></i> WIthdraws <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Pending Withdraws
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <hr>
                  <div >
                                          @include('includes.form-error')
                                          @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>

                                <th>Name</th>
                                <th width="10%">Email</th>
                                <th>Phone</th>
                                <th width="10%">Method</th>
                                <th width="10%">Status</th>
                                <th>Withdraw Date</th>
                                <th>Actions</th>
                                              </thead>

                                              <tbody>
                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td><a href="{{route('admin-user-show',$withdraw->user->id)}}" target="_blank">{{$withdraw->user->name}}</a></td>
                                    <td>{{$withdraw->user->email}}</td>
                                    <td>{{$withdraw->user->phone}}</td>
                                    <td>{{$withdraw->method}}</td>
                                    <td>{{ucfirst($withdraw->status)}}</td>
                                    <td>{{$withdraw->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin-vendor-wttd',$withdraw->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                                        @if($withdraw->status == "pending")
                                        <a href="javascript:;" data-href="{{route('admin-wtt-accept',$withdraw->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-success product-btn"><i class="fa fa-send"></i> Accept</a>
                                        <a href="javascript:;" data-href="{{route('admin-wtt-reject',$withdraw->id)}}" data-toggle="modal" data-target="#confirm-delete1" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Reject</a>
                                        @endif
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
                    <h4 class="modal-title text-center" id="myModalLabel">Accept Withdraw</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are about to accept this Withdraw.</p>
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
                    <h4 class="modal-title text-center" id="myModalLabel">Reject Withdraw</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are about to reject this Withdraw.</p>
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
</script>
@endsection

