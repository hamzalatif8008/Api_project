@extends('layouts.admin')

@section('styles')

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
                                                    <h2>Update Coupon <a href="{{ route('admin-cp-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Coupon <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-cp-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_title">Title*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="code" id="edit_title" placeholder="Enter Title " required="" type="text" value="{{$data->code}}" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_title">Type*</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="type" required="" id="ps">
                                                <option>Choose a type</option>
                                                <option value="0" {{$data->type == 0 ? "selected":""}}>Discount By Percentage</option>
                                                <option value="1" {{$data->type == 1 ? "selected":""}}>Discount By Amount</option>
                                              </select>
                                            </div>
                                          </div>
                                          @if($data->type == 0)
                                          <div class="form-group" id="pa">
                                            <label class="control-label col-sm-4" for="price" id="pl">Percentage*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="price" id="price" placeholder="Enter Percentage " required="" type="text" value="{{$data->price}}" style="width: 50%; display: inline;"><span style="display: inline; font-size: 16px;" id="pz"> %</span>
                                            </div>
                                          </div>
                                          @endif
                                          @if($data->type == 1)
                                          <div class="form-group" id="pa">
                                            <label class="control-label col-sm-4" for="price" id="pl">Amount*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="price" id="price" placeholder="Enter Amount " required="" type="text" value="{{$data->type == 0 ? $data->price : round(($data->price * $sign->value), 2)}}" style="width: 50%; display: inline;"><span style="display: inline; font-size: 16px;" id="pz"> {{$sign->sign}}</span>
                                            </div>
                                          </div>
                                          @endif
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_title">Quantity*</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" id="time">
                                                <option value="0" {{$data->times == null ? "selected":""}}>Unlimited</option>
                                                <option value="1" {{$data->times != null ? "selected":""}}>Limited</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group" id="times" {!!$data->times == null ? "style='display: none;'":""!!}>
                                            <label class="control-label col-sm-4" for="edit_title">Value*</label>
                                            <div class="col-sm-6">
                                              <input  class="form-control" name="times" id="value" placeholder="Enter Value " type="text" value="{{$data->times}}">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_title">Start Date*</label>
                                            <div class="col-sm-6">
                                              <input  class="form-control" name="start_date" id="from" placeholder="Select a date " required="" type="text" value="{{$data->start_date}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_title">End Date*</label>
                                            <div class="col-sm-6">
                                              <input  class="form-control" name="end_date" id="to" placeholder="Select a date " required="" type="text" value="{{$data->end_date}}">
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
  $(document).on("change", "#time" , function(){
    var val = $(this).val();
    if(val == 1){
    $("#times").show();
    }
    else{
    $("#value").val("");
    $("#times").hide();    
    }
});
</script>

<script type="text/javascript">
    $('#ps').on('change', function() {
      var val = $(this).val();
      if(val == 0)
      {
        $("#pl").html("Percentage*");
        $("#pz").html("%");
        $("#price").attr("placeholder", "Enter Percentage");
        $("#pa").show();
      }
      else if(val == 1){
        $("#pl").html("Amount*");
        $("#pz").html("$");
        $("#price").attr("placeholder", "Enter Amount");
        $("#pa").show();
      }
      else{
      $("#pa").hide();
      $("#price").val("");      
      }
    });
</script>

<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>  

<script type="text/javascript">
    var dateToday = new Date();
    var dates =  $( "#from,#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        minDate: dateToday,
        onSelect: function(selectedDate) {
        var option = this.id == "from" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
          dates.not(this).datepicker("option", option, date);
    }
});
</script>

@endsection