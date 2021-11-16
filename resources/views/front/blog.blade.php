@extends('layouts.front')
@section('content')


    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->blogs}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->

    <div class="section-padding blog-wrap" style="padding-top: 30px;">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-title pb_50 text-center">

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($blogs as $blogg)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                      <a href="{{route('front.blogshow',$blogg->id)}}" class="blog" style="margin-bottom: 30px;">
                        <div class="blog__img">
                          <img src="{{asset('assets/images/'.$blogg->photo)}}" alt="blog image">
                        </div>
                        <div class="blog__content text-center">
                          <div class="blog__meta1">{{date('jS M, Y', strtotime($blogg->created_at))}}</div>
                          <div class="blog__title">{{strlen($blogg->title) > 80 ? substr($blogg->title,0,80)."...":$blogg->title}}</div>
                          <p>{{substr(strip_tags($blogg->details),0,150)}}</p>
                          <span class="blog__footer"><i class="fa fa-eye"></i> {{$lang->vd}}</span>
                        </div>
                      </a>
                   </div>
                    @endforeach


                     </div>
                    <div class="text-center">
                    {!! $blogs->links() !!}                 
                    </div>
                </div>
            </div>

@endsection