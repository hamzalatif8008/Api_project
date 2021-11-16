@extends('layouts.front') 
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{strtoupper($page->title)}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->

      <div class="section-padding">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  dir="{{$lang->rtl == 1 ? 'rtl':''}}">
                        {!! $page->text !!}
                       </div>
                   </div>
               </div>
           </div>
@endsection
 

 