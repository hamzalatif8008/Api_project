@extends('layouts.front')
<style type="text/css">
.review-carousel .owl-next,
.review-carousel .owl-prev {
background: black;
border: 1px solid black;
color: #ffffff; 
display: inline-block;
font-size: 16px;
margin: 0 5px;
height: 30px;
width: 30px;
text-align: center;
line-height: 40px;
border-radius: 100%;
-webkit-transition: all .4s ease;
transition: all .4s ease;
position: absolute;
left: 0;
top: 50%;
-webkit-transform: translateY(-50%);
transform: translateY(-50%);
display: none;
}
.review-carousel .owl-next {
left: auto;
right: 0;
padding-top: 6px;
padding-left: 1px;
}

.review-carousel .owl-prev {
right: auto;
left: 0;
padding-top: 6px;
}
#featured-caea .owl-next,
#featured-caea .owl-prev {

display: none;
}
.featured-carousel .owl-next {
display: none;
}
.featured-carousel .owl-prev {
display: none;
}
/*
.review-carousel .owl-next:hover,
.review-carousel .owl-prev:hover {
background: white !important;
border-color: #E7AB3C !important;
color: black;
display: block;
} */
.review-carousel:hover .owl-next,
.review-carousel:hover .owl-prev {
display: block;
}
.comingsliderimg{
height: 600px;
}
.comingsliderimg2{
height: 600px;
}
@media(max-width: 767px){
.comingsliderimg{
height: 200px;
}
.comingsliderimg2{
height: 300px;
}
}
element.style {
display: inline;
}
.scrollup {
background-color: #0057ff;
}
.scrollup {
padding-top: 6px !important;
}
</style>
@section('content')

<div class="container-fluid" style="margin-bottom: 5px;">
    <div class="row">
    
       <iframe class="video ytplayer" width="100%" height="600" type="text/html" src="https://www.youtube.com/embed/{{$newupdate->video_id}}" frameborder="0" allowfullscreen="true"></iframe>  
       
    </div>
</div>
<div class="container-fluid" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-lg-4 text-center" style="margin-top: 10px;">
            <a href="{{$newupdate->video1}}" data-fancybox>
      <img style="width: 100%;height: 300px;" src="{{asset('assets/images/'.$newupdate->videobanner1)}}" />
      <i class="fa fa-youtube-play" style="position: absolute;top:45%;left:0;right:0;font-size: 40px;color:black;"></i>
  </a>
        </div>
        <div class="col-lg-4 text-center" style="margin-top: 10px;">
            <a href="{{$newupdate->video2}}" data-fancybox>
      <img style="width: 100%;height: 300px;" src="{{asset('assets/images/'.$newupdate->videobanner2)}}" />
      <i class="fa fa-youtube-play" style="position: absolute;top:45%;left:0;right:0;font-size: 40px;color:black;"></i>
  </a>
        </div>
        <div class="col-lg-4 text-center" style="margin-top: 10px;">
            <a href="{{$newupdate->video3}}" data-fancybox>
      <img style="width: 100%;height: 300px;" src="{{asset('assets/images/'.$newupdate->videobanner3)}}" />
      <i class="fa fa-youtube-play" style="position: absolute;top:45%;left:0;right:0;font-size: 40px;color:black;"></i>
  </a>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="owl-carousel review-carousel" style="margin-top: 5px;padding-bottom: 5px;">
                <img class="comingsliderimg2" src="{{asset('assets/images/'.$newupdate->sidebanner)}}"  alt="">
                <img class="comingsliderimg2" src="{{asset('assets/images/'.$newupdate->sidebanner1)}}"  alt="">
                <img class="comingsliderimg2" src="{{asset('assets/images/'.$newupdate->sidebanner2)}}"  alt="">
                
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
            <div class="owl-carousel review-carousel" >
            <img src="{{asset('assets/images/'.$newupdate->mainslider)}}" class="comingsliderimg"  alt="">
            <img src="{{asset('assets/images/'.$newupdate->mainslider1)}}" class="comingsliderimg"  alt="">
            <img src="{{asset('assets/images/'.$newupdate->mainslider2)}}" class="comingsliderimg"  alt="">
            {{--  <img src="{{asset('assets/front/images/FAIZAN/BANNERS/vendor banner.jpg')}}" class="comingsliderimg"  alt="">
            <img src="{{asset('assets/front/images/FAIZAN/BANNERS/vendor offer.jpg')}}" class="comingsliderimg"  alt="">  --}}
            
        </div>          
        </div>
    </div>
</div>
 
{{--  <div class="owl-carousel featured-carousel" id="featured-caea" style="margin-top: 5px;padding-bottom: 5px;">
    @foreach($vendors as $vendor)
    <img class="comingsliderimg3" src="{{asset('assets/images/'.$vendor->photo)}}"  alt="">  
    @endforeach        
</div>  --}}

@endsection

@section('scripts')
  <script type="text/javascript">
     var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

 function onYouTubeIframeAPIReady() {
     document.querySelectorAll('.ytplayer').forEach((item) => {
         new YT.Player(item, {
             events: {
                 'onReady': (event) => {
                     event.target.playVideo();
                     event.target.mute();
                 }
             }
         })
     })
 }

  </script>
@endsection