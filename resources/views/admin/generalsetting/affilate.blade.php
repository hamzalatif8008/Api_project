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
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Affilate Informations</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Payment Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Affilate Informations
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-affilateup')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')    
                                          {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="disable/enable_about_page">Affilate Service:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$gs->is_affilate == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$gs->is_affilate == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-gs-isaffilate',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-gs-isaffilate',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone11">Affilate Bonus(%) *</label>
                                            <div class="col-sm-6">
                                              <input name="affilate_charge" id="phone11" class="form-control" placeholder="Affilate Charge(%)" type="text" value="{{$data->affilate_charge}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_logo">Current Banner Image</label>
                                            <div class="col-sm-6">
                                              
                                                <img id="adminimg" src="{{asset('assets/images/'.$data->affilate_banner)}}" alt="No Image Found" style="width: auto; max-height: 450px;">
                                              </div>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="bimg">Setup New Banner Image</label>
                                            <div class="col-sm-6">
                                              <input type="file" name="affilate_banner" id="bimg">
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