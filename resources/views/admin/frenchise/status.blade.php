@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Office Address -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Vendor Registration Option</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> General Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Registration</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                          @include('includes.form-error')
                                          @include('includes.form-success')      
                                          {{csrf_field()}}

                                        <div class="form-group" style="padding: 20px 0;">

                                            <label class="control-label col-sm-4 text-right" for="Vendor">Select an Option *</label>
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->reg_vendor == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->reg_vendor == 1 ? 'Vendor Registration Activated':'Vendor Registration Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-regvendor',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-regvendor',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                          </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Office Address -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
@endsection