@extends('layouts.admin')

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
                                                    <h2>Frenchise Details <a href="{{ route('admin-frenchise-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchises <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchise Details
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Regestration #</strong></td>
                                <td>{{$frenchise->reg_number}}</td>
                            </tr>
                             <tr>
                                <td width="49%" style="text-align: right;"><strong>Owner Name:</strong></td>
                                <td>{{$frenchise->owner_name}}</td>
                            </tr>
                             @if($frenchise->father_name != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Father Name/Husband Name:</strong></td>
                                <td>{{$frenchise->father_name}}</td>
                            </tr>
                            @endif
                            @if($frenchise->cnic != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>CINC:</strong></td>
                                <td>{{$frenchise->cnic}}</td>
                            </tr>
                            @endif
                             @if($frenchise->frenchise_address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Address:</strong></td>
                                <td>{{$frenchise->frenchise_address}}</td>
                            </tr>
                            @endif
                             @if($frenchise->religion != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Religion:</strong></td>
                                <td>{{$frenchise->religion}}</td>
                            </tr>
                            @endif
                            @if($frenchise->city != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>City:</strong></td>
                                <td>{{$frenchise->city}}</td>
                            </tr>
                            @endif
                             @if($frenchise->address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Owner Address:</strong></td>
                                <td>{{$frenchise->address}}</td>
                            </tr>
                            @endif
                            @if($frenchise->home_address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Home Address:</strong></td>
                                <td>{{$frenchise->home_address}}</td>
                            </tr>
                            @endif
                            @if($frenchise->bank_account_1 != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Bank Account:</strong></td>
                                <td>{{$frenchise->bank_account_1}}</td>
                            </tr>
                            @endif
                             @if($frenchise->bank_account_2 != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Bank Account:</strong></td>
                                <td>{{$frenchise->bank_account_2}}</td>
                            </tr>
                            @endif
                            @if($frenchise->mobile_number != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Mobile Number:</strong></td>
                                <td>{{$frenchise->mobile_number}}</td>
                            </tr>
                            @endif
                             @if($frenchise->mobile_number_1 != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Mobile Number:</strong></td>
                                <td>{{$frenchise->mobile_number_1}}</td>
                            </tr>
                            @endif
                            @if($frenchise->submit_amount != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Submit Amount:</strong></td>
                                <td>{{$frenchise->submit_amount}}</td>
                            </tr>
                            @endif
                            @if($frenchise->remaining_amount != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Remaining Amount:</strong></td>
                                <td>{{$frenchise->remaining_amount}}</td>
                            </tr>
                            @endif
                            @if($frenchise->duration != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Duration:</strong></td>
                                <td>{{$frenchise->duration}}</td>
                            </tr>
                            @endif
                            @if($frenchise->partner != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>PartnerShip:</strong></td>
                                <td>{{$frenchise->partner}}</td>
                            </tr>
                            @endif
                              @if($frenchise->percentage != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Percentage:</strong></td>
                                <td>{{$frenchise->percentage}}%</td>
                            </tr>
                            @endif
                            @if($frenchise->monthly_percentage != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Monthly Percentage:</strong></td>
                                <td>{{$frenchise->monthly_percentage}}%</td>
                            </tr>
                            @endif
                            @if($frenchise->yearly_percentage != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Yearly Percentage:</strong></td>
                                <td>{{$frenchise->yearly_percentage}}%</td>
                            </tr>
                            @endif
                            @if($frenchise->completion_percentage != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Completion Percentage:</strong></td>
                                <td>{{$frenchise->completion_percentage}}%</td>
                            </tr>
                            @endif
                             @if($frenchise->vitnes != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Name Of Vitnes:</strong></td>
                                <td>{{$frenchise->vitnes}}</td>
                            </tr>
                            @endif
                              @if($frenchise->father_vitnes != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Father Name/ Huband Name Of Vitnes:</strong></td>
                                <td>{{$frenchise->father_vitnes}}</td>
                            </tr>
                            @endif
                            @if($frenchise->cnic_vitnes != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vitnes CNIC:</strong></td>
                                <td>{{$frenchise->cnic_vitnes}}</td>
                            </tr>
                            @endif
                              @if($frenchise->vitnes_address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vitnes Address:</strong></td>
                                <td>{{$frenchise->vitnes_address}}</td>
                            </tr>
                            @endif
                            @if($frenchise->vitnes_mobile != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vitnes Mobile#:</strong></td>
                                <td>{{$frenchise->vitnes_mobile}}</td>
                            </tr>
                            @endif
                            @if($frenchise->vitnes_mobile_1 != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Vitnes Mobile#:</strong></td>
                                <td>{{$frenchise->vitnes_mobile_1}}</td>
                            </tr>
                            @endif
                             @if($frenchise->frenchise_name != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Frenchise Name:</strong></td>
                                <td>{{$frenchise->frenchise_name}}</td>
                            </tr>
                             @endif
                            @if($frenchise->frenchise_mobile_number != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Frenchise Mobile Number:</strong></td>
                                <td>{{$frenchise->frenchise_mobile_number}}</td>
                            </tr>
                             @endif
                              @if($frenchise->vendor_limit != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Expected Vendor Limit:</strong></td>
                                <td>{{$frenchise->vendor_limit}}</td>
                            </tr>
                            @endif
                             @if($frenchise->email != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Email:</strong></td>
                                <td>{{$frenchise->email}}</td>
                            </tr>
                              @endif
                             @if($frenchise->area != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Area Details :</strong></td>
                                <td>{{$frenchise->area}}</td>
                            </tr>
                             @endif

                             @if($frenchise->frenchise_detail != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Frenchise Details :</strong></td>
                                <td>{{$frenchise->frenchise_detail}}</td>
                            </tr>
                             @endif
                            @if($frenchise->frenchise_message != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Frenchise Message :</strong></td>
                                <td>{{$frenchise->frenchise_message}}</td>
                            </tr>
                             @endif
                           
                            </tbody>
                        </table>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" value="{{$frenchise->email}}"><a style="cursor: pointer;" data-toggle="modal" data-target="#emailModal1" class="btn btn-primary email1"><i class="fa fa-send"></i> Contact Frenchise</a>
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
                    <h4 class="modal-title" id="myModalLabel">Reject Vendor</h4>
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

