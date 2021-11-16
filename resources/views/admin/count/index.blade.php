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
                                                    <h2>Countdown Section</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Countdown Section
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('admin-gs-countdownup')}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="title">Title *</label>
                                            <div class="col-sm-6">
                                                <input name="count_title" id="title" class="form-control" placeholder="Title" required="" type="text" value="{{$data->count_title}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="heading">Heading *</label>
                                            <div class="col-sm-6">
                                                <input name="count_heading" id="heading" class="form-control" placeholder="Heading" required="" type="text" value="{{$data->count_heading}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="date">Date *</label>
                                            <div class="col-sm-6">
                                                <input name="count_date" id="date" class="form-control"  required="" type="text" value="{{$data->count_date}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="link">Link *<span>(https://www.google.com/) </span></label>
                                            <div class="col-sm-6">
                                                <input name="count_link" id="link" class="form-control" placeholder="Link" required="" type="text" value="{{$data->count_link}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_logo"> Background Image</label>
                                            <div class="col-sm-6">
                                                <img id="adminimg" src="{{asset('assets/images/'.$data->count_image)}}" alt="No Icon Found" id="adminimg" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="bimg">Setup New Background Image</label>
                                            <div class="col-sm-6">
                                                <input  type="file" name="count_image" id="bimg">
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