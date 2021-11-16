@extends('layouts.admin')

@section('styles')

    <link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

@endsection

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Website Title -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Festival Section</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Festival Section
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('admin-gs-fesinfoup')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="title">Title *</label>
                                            <div class="col-sm-6">
                                                <input name="fes_title" id="title" class="form-control" placeholder="Title" required="" type="text" value="{{$data->fes_title}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="heading">Festival Detail *</label>
                                            <div class="col-sm-6">
                                                <input name="fes_detail" id="heading" class="form-control" placeholder="Heading" required="" type="text" value="{{$data->fes_detail}}">
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
                    <!-- Ending of Dashboard Website Title -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>

    <script type="text/javascript">
        var dateToday = new Date();
        $(function() {
            $( "#date" ).datepicker({
                showButtonPanel: true,
                minDate: dateToday
            });
        });
    </script>
@endsection