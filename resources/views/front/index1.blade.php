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
        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line slider-height" data-ride="carousel" data-pause="hover" data-interval="5000">
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
                    <img src="{{asset('assets/images/'.$sls->photo)}}" alt="Bootstrap Touch Slider" class="slide-image">
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
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
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

    @if($gs->sb == 1)
        <!--  Starting of image blog area   -->
        <div class="image-blog-wrap" data-wow-duration="1s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <a href="{{$banner->top1l}}" class="single-image-blog-box">
                            <!--.$banner->top1-->
                            <img id="bn1" src="{{asset('assets/images/home-3-1.jpg')}}" alt="blog image">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <a href="{{$banner->top2l}}" class="single-image-blog-box">
                            <!--.$banner->top2-->
                            <img id="bn2" src="{{asset('assets/images/home-3-1.jpg')}}" alt="blog image">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <a href="{{$banner->top3l}}" class="single-image-blog-box">
                            <!--.$banner->top3-->
                            <img id="bn3" src="{{asset('assets/images/home-3-1.jpg')}}" alt="blog image">
                        </a>
                    </div>
                    <!--<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">-->
                    <!--    <a href="{{$banner->top4l}}" class="single-image-blog-box">-->
                    <!--        <img id="bn4" src="{{asset('assets/images/'.$banner->top4)}}" alt="blog image">-->

                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!--  Ending of image blog area   -->

    @endif

    <section id="extraData">

    </section>
@endsection

@section('scripts')
    <script>
        $(window).on('load',function() {
            setTimeout(function(){

                $('#extraData').load('{{url("category_index/")}}/{{$id}}}');

            }, 500);
        });
        //---------Countdown-----------
        $('#clock').countdown('{{$gs->count_date}}', function(event) {
            $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
        });
    </script>
@endsection