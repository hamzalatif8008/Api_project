@extends('layouts.front')
@section('content')   

        <!-- Starting of Account Dashboard area -->
    <div class="section-padding featured-product-wrap wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="padding: 20px 0;">
                        {!! $gs->order_title !!}
                        {!! $gs->order_text !!}
                        <a href="{{route('customer-dashboard')}}" style="text-transform: uppercase;" class="button style-10">{{$lang->fh}}</a>
                </div>
            </div>
        </div>
    </div>



@endsection