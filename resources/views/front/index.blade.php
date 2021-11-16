@extends('layouts.front')
@section('content')
<style type="text/css"> 
@media only screen and (max-width: 767px) {
@php
$title_size = $sls->title_size*.5;
$desc_size = $sls->desc_size*.5;
if ($desc_size <12){
$desc_size = 12;
}
if ($title_size <12){
$title_size = 12;
}
@endphp 
.slider-title-style{{$sls->id}} {
font-size: {{$title_size}}px !important;
}
.slider-text-style{{$sls->id}} {
font-size: {{$desc_size}}px !important;
}
@php
foreach ($sliders as $slider){
$title_size = $slider->title_size*.5;
$desc_size = $slider->desc_size*.5;
if ($desc_size <12){
$desc_size = 12;
}
if ($title_size <12){
$title_size = 12;
}
echo "
.slider-title-style".$slider->id."{
font-size:".$title_size."px!important;
}
.slider-text-style".$slider->id."{
font-size:".$desc_size."px!important;
}
";
}
@endphp
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
.slider-title-style{{$sls->id}} {
font-size: {{$sls->title_size*.7}}px !important;
}
.slider-text-style{{$sls->id}} {
font-size: {{$sls->desc_size*.7}}px !important;
}
@php
foreach ($sliders as $slider){
$title_size = $slider->title_size*.7;
$desc_size = $slider->desc_size*.7;
echo "
.slider-title-style".$slider->id."{
font-size:".$title_size."px!important;
}
.slider-text-style".$slider->id."{
font-size:".$desc_size."px!important;
}
";
}
@endphp
}
@media only screen and (min-width: 992px) {
.slider-title-style{{$sls->id}} {
font-size: {{$sls->title_size}}px !important;
}
.slider-text-style{{$sls->id}} {
font-size: {{$sls->desc_size}}px !important;
}
@php
foreach ($sliders as $slider){
echo "
.slider-title-style".$slider->id."{
font-size:".$slider->title_size."px!important;
}
.slider-text-style".$slider->id."{
font-size:".$slider->desc_size."px!important;
}
";
}
@endphp
}
</style>
@if($gs->slider == 1)
<!--  Starting of homepage carousel area   -->
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line slider-height" data-ride="carousel" data-pause="hover" data-interval="5000" >
    @php
    $i=1;
    @endphp
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
        @foreach($sliders as $sld)
        <li data-target="#bootstrap-touch-slider" data-slide-to="{{$i++}}" class=""></li>
        @endforeach
    </ol>
    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
        <!-- Third Slide -->
        <div class="item active">
            <!-- Slide Background -->
            <img src="{{asset('assets/images/'.$sls->photo)}}" alt="Bootstrap Touch Slider" class="slide-image" >
            <div class="bs-slider-overlay"></div>
            <div class="container">
                <div class="row">
                    @if($lang->rtl == 1)
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_left" {!! $sls->position == 'slide_style_left' ? 'style="text-align:right !important;"':'' !!}>
                        <h1 data-animation="animated {{$sls->title_anime}}" class="">{!! $sls->title !!}</h1>
                        <p data-animation="animated {{$sls->desc_anime}}" class="">{!! $sls->description !!}</p>
                    </div>
                    @else
                    <div class="slide-text {{$sls->position}}">
                        <h1 data-animation="animated {{$sls->title_anime}}" class="slider-title-style{{$sls->id}}" style="color: {{$sls->title_color}};">{!! $sls->title !!}</h1>
                        <p data-animation="animated {{$sls->desc_anime}}" class="slider-text-style{{$sls->id}}" style="color: {{$sls->desc_color}};">{!! $sls->description !!}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End of Slide -->
        @foreach($sliders as $slider)
        <div class="item">
            <!-- Slide Background -->
            <img src="{{asset('assets/images/'.$slider->photo)}}" alt="Bootstrap Touch Slider" class="slide-image">
            <div class="bs-slider-overlay"></div>
            <!-- Slide Text Layer -->
            <div class="slide-text {{$slider->position}}">
                <h1 data-animation="animated {{$slider->title_anime}}" class="slider-title-style{{$slider->id}}" style="color: {{$slider->title_color}};">{!! $slider->title!!}</h1>
                <p data-animation="animated {{$slider->desc_anime}}" class="slider-text-style{{$slider->id}}" style="color: {{$slider->desc_color}};">{!! $slider->description !!}</p>
            </div>
        </div>
        @endforeach
        <!-- End of Slide -->
        </div><!-- End of Wrapper For Slides -->
        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--  Ending of homepage carousel area   -->
    @endif
    @if($gs->category  == 1)
    @php
    $len = count($services);
    $ck = 0;
    $ser =0;
    @endphp
    <!--  Starting of home service area   -->
    <div class="home-service-wrapper" data-wow-duration="1s" data-wow-delay="1s">
        <div class="container">
            @foreach($services->chunk(4) as $chunk)
            <div class="row">
                @foreach($chunk as $service)
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-service-area">
                        <div class="service-icon-img text-center">
                            <img src="{{asset('assets/images/'.$service->photo)}}" alt="service icon">
                        </div>
                        <div class="service-icon-text">
                            <h5>{{$service->title}}</h5>
                            <p>{{$service->text}}</p>
                        </div>
                    </div>
                </div>
                @php
                if ($ser == $len - 1) {
                $ck = 1;
                }
                $ser++;
                @endphp
                @endforeach
            </div>
            @if($ck == 0)
            <br>
            @endif
            @endforeach
        </div>
    </div> 
    <!--  Ending of home service area   -->
    @endif
      <!-- cat new carousel -->
       
    <div class="owl-carousel reviewcat-carouselsss" style="margin-top: 5px !important;margin-bottom: 15px !important;">
        <div class="newsideportionmain">
            <h5>Shop top Categories</h5>
            <div class="row">
                @foreach ($category as $cat)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="{{route('front.category',['slug' => $cat->cat_name])}}">
                        <img src="{{asset('assets/images/'.$cat->photo)}}" class="newsideportionmainimg" alt="">
                        <p class="newsideportionmainp">{{$cat->cat_name}}</p>
                    </a>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <a href="{{route('top-shops',['slug' =>'top shops'])}}">
                        <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                    </a>
                </div>
                
                
            </div>
        </div>
         @foreach($fcategory as $cat)
            <div class="newsideportionmain">
                <h5>{{$cat->cat_name}}</h5>
                <div class="row">
                    @foreach($cat->subs()->where('status','=',1)->take(4)->get() as $subcategory)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="{{route('front.subcategory',$subcategory->sub_slug)}}">
                            <img src="{{asset('assets/images/'.$subcategory->photo)}}" class="newsideportionmainimg" alt="">
                            <p class="newsideportionmainp">{{$subcategory->sub_name}}</p>
                        </a>
                    </div>
                    @endforeach
                    <div class="col-lg-12">
                        <a href="{{route('front.category',$cat->cat_slug)}}">
                            <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
<!--     cat new carousel --> 

    @if($gs->bl == 1)
    <!-- Starting of client logo area -->
    {{--  <section class="section-padding client-logo-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="link-desshop">Top Shops</h2>
                    <a class="btn viewallcat-btn"  href="{{route('top-shops',['slug' =>'top shops'])}}">View all <span class="fa fa-arrow-right"></span></a>
                </div>
            </div>
            
        </div>
    </section>  --}}
    {{--  Slider3  --}}
    @if($gs->hv == 1)
    {{--  <!--  Starting of featured product area   -->
    <div class="section-padding featured-product-wrap wow fadeInUp" style="margin-top: 5px !important;margin-bottom: 5px !important;">
        <div class="container-fluid">
            <div class="row">
                
                 
                <div class="col-lg-12">
                    <div class="product-type-tab">
                        
                        <div class="tab-content">
                            <div id="bestSeller" class="tab-pane active">
                                <div class="owl-carousel review-carouselsss">
                                    
                                    @foreach($brands->chunk(5) as $brandz)
                                    
                                    @foreach($brandz as $brand)
                                    <a href="{{$brand->url}}">
                                    <div class="newstylebrandns">
                                        <h4 class="newstylebrandnsht">Brand Name</h4>
                                        <img class="shopsimg-back" src="{{asset('assets/images/'.$brand->photo)}}" alt="client logo">
                                        <p class="newstylebrandnsbl">shop now</p>
                                    </div>
                                </a> 
                                    @endforeach
                                    
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->   --}}
    <!--  Ending of featured product area   -->
    @endif
    {{--  End Slider3  --}}
    <!-- Ending of client logo area -->
    @endif
<!--     <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Wholesalers </h2>
            <a class="btn viewallcat-btn"  href="">View all <span class="fa fa-arrow-right"></span></a>
        </div>
    </div>
</div>
<div class="owl-carousel reviewcat-carouselsss" style="margin-bottom: 15px !important;margin-top: 5px !important;">
        <div class="newsideportionmain1">
            <h5>Faisalabad</h5>
            <div class="row">
                @foreach ($category as $cat)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                    <a href="{{route('front.allproduct',['ptype' => $cat->cat_name])}}">
                        <img src="{{asset('assets/images/'.$cat->photo)}}" class="newsideportionmainimg1" alt="">
                        
                    </a>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <a href="{{route('top-shops',['slug' =>'top shops'])}}">
                        <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                    </a>
                </div>
                
                
            </div>
        </div>
         @foreach($fcategory as $cat)
            <div class="newsideportionmain1">
                <h5>{{$cat->cat_name}}</h5>
                <div class="row">
                    @foreach($cat->subs()->where('status','=',1)->take(4)->get() as $subcategory)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="{{route('front.subcategory',$subcategory->sub_slug)}}">
                            <img src="{{asset('assets/images/'.$subcategory->photo)}}" class="newsideportionmainimg" alt="">
                           
                        </a>
                    </div>
                    @endforeach
                    <div class="col-lg-12">
                        <a href="{{route('front.category',$cat->cat_slug)}}">
                            <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
    </div> -->
<!--     cat new carousel --> 
    
    <br>
    <section id="extraData">
    </section>
    @endsection
    @section('scripts')
    <script>
    $(window).on('load',function() {
    setTimeout(function(){
    $('#extraData').load('{{route('front.extraIndex')}}');
    }, 10);
    });
    //---------Countdown-----------
    $('#clock').countdown('{{$gs->count_date}}', function(event) {
    $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
    });
    </script>
    @endsection