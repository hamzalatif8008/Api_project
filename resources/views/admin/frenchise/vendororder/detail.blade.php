@extends('layouts.frenchise')

@section('styles')
<style type="text/css">
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-top: none;
}
.add-product-box {
    box-shadow: none;
}
.add-product-1
{
    padding-bottom: 30px;
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
                                                    <h2>Vendor Details <a href="{{ route('frenchise-order-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Details
                                                </div>
                                            </div>
                                              @include('includes.frenchise-notification')
                                        </div>   
                                    </div>
                                        <hr>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Customer ID#</strong></td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Name:</strong></td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Email:</strong></td>
                                <td>{{$user->email}}</td>
                            </tr>
                             @if($user->phone != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Phone:</strong></td>
                                <td>{{$user->phone}}</td>
                            </tr>
                            @endif
                            @if($user->fax != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Fax:</strong></td>
                                <td>{{$user->fax}}</td>
                            </tr>
                            @endif
                            @if($user->address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Address:</strong></td>
                                <td>{{$user->address}}</td>
                            </tr>
                            @endif
                            @if($user->city != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>City:</strong></td>
                                <td>{{$user->city}}</td>
                            </tr>
                            @endif
                            @if($user->zip != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Zip:</strong></td>
                                <td>{{$user->zip}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Name:</strong></td>
                                <td>{{$user->owner_name}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Phone Number:</strong></td>
                                <td>{{$user->shop_number}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Shop Address:</strong></td>
                                <td>{{$user->shop_address}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Registration Number:</strong></td>
                                <td>{{$user->reg_number}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vendor Message :</strong></td>
                                <td>{{$user->shop_message}}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Total Product(s) :</strong></td>
                                <td>{{ $user->products()->count() }}</td>
                            </tr>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Joined:</strong></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>
                                @if($user->is_vendor == 1)
                        <td width="30%" style="text-align: right;"><a href="javascript:;" data-href="{{route('frenchise-vendor-st',['id1'=>$user->id,'id2'=>1])}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-success product-btn"><i class="fa fa-check"></i> Accept</a></td>
                                                                                                              
                         <td><a href="javascript:;" data-href="{{route('frenchise-vendor-st',['id1'=>$user->id,'id2'=>0])}}" data-toggle="modal" data-target="#confirm-delete1" class="btn btn-danger product-btn"><i class="fa fa-times"></i> Reject</a></td>
                                @endif


                            </tbody>
                        </table>
                                    </div>
                                    <div class="text-center">
                                                      <input type="hidden" value="{{$user->email}}"><a style="cursor: pointer;" data-toggle="modal" data-target="#emailModal1" class="btn btn-primary email1"><i class="fa fa-send"></i> Contact Vendor</a>
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
</script>

@endsection

