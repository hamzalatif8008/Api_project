@extends('layouts.user')

@section('styles')

<style type="text/css">
    .add-product-box .form-horizontal .form-group:last-child {
    margin-bottom: 20px;
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
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Withdraw Now <a href="{{ route('user-wwt-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> My Wiithdraws <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Withdraw Now</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <form class="form-horizontal" action="{{route('user-wwt-store')}}" method="POST" enctype="multipart/form-data">
                        @include('includes.form-success')
                                          @include('includes.form-error')
                                          {{csrf_field()}}
  
                                <div class="item form-group">
                                    <label class="control-label col-sm-4" for="name">Withdraw Method *

                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="methods" id="withmethod" required>
                                            <option value="">Select Withdraw Method</option>
                                            <option value="Paypal">Paypal</option>
                                            <option value="Skrill">Skrill</option>
                                            <option value="Payoneer">Payoneer</option>
                                            <option value="Bank">Bank</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-sm-4" for="name">Withdraw Amount *

                                    </label>
                                    <div class="col-sm-6">
                                        <input name="amount" placeholder="Withdraw Amount" value="{{ old('amount') }}" class="form-control"  type="text" required>
                                    </div>
                                </div>

                                <div id="paypal" style="display: none;">

                                    <div class="item form-group">
                                        <label class="control-label col-sm-4" for="name">Enter Account Email *

                                        </label>
                                        <div class="col-sm-6">
                                            <input name="acc_email" value="{{ old('email') }}" placeholder="Enter Account Email" class="form-control" type="email">
                                        </div>
                                    </div>

                                </div>
                                <div id="bank" style="display: none;">

                                    <div class="item form-group">
                                        <label class="control-label col-sm-4" for="name">Enter IBAN/Account No *

                                        </label>
                                        <div class="col-sm-6">
                                            <input name="iban" value="{{ old('iban') }}" placeholder="Enter IBAN/Account No" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-sm-4" for="name">Enter IBAN/Account No *

                                        </label>
                                        <div class="col-sm-6">
                                            <input name="acc_name" value="{{ old('accname') }}" placeholder="Enter Account Name" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-sm-4" for="name">Enter IBAN/Account No *

                                        </label>
                                        <div class="col-sm-6">
                                            <input name="address" value="{{ old('address') }}" placeholder="Enter Address" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-sm-4" for="name">Enter IBAN/Account No *

                                        </label>
                                        <div class="col-sm-6">
                                            <input name="swift" value="{{ old('swift') }}" placeholder="Enter Swift Code" class="form-control" type="text">
                                        </div>
                                    </div>

                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-sm-4" for="name">Additional Reference(Optional) *

                                    </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="reference" rows="6" placeholder="Additional Referance(Optional)">{{ old('reference') }}</textarea>
                                    </div>
                                </div>

                                <div id="resp" class="col-md-8 col-md-offset-4">

                                    @if($gs->withdraw_fee > 0)
                                        <span class="help-block">
                                <strong>Withdraw Fee {{$sign->sign}}{{ round($gs->withdraw_fee * $sign->value , 2) }} and {{ $gs->withdraw_charge }}% will deduct from your account.</strong>
                            </span>
                                    @endif
                                </div>

                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Withdraw</button>
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
  

    $("#withmethod").change(function(){
        var method = $(this).val();
        if(method == "Bank"){

            $("#bank").show();
            $("#bank").find('input, select').attr('required',true);

            $("#paypal").hide();
            $("#paypal").find('input').attr('required',false);

        }
        if(method != "Bank"){
            $("#bank").hide();
            $("#bank").find('input, select').attr('required',false);

            $("#paypal").show();
            $("#paypal").find('input').attr('required',true);
        }
        if(method == ""){
            $("#bank").hide();
            $("#paypal").hide();
        }

    })

</script>

@endsection

