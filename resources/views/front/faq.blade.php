@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->faqs}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->

<!-- Starting of faq area -->
        <div class="container">
            <div class="section-padding">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="styled-faq">
                            <h3  dir="{{$lang->rtl == 1 ? 'rtl':''}}">{{$lang->maq}}</h3>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$fq->id}}">
                                        <h4  dir="{{$lang->rtl == 1 ? 'rtl':''}}" class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$fq->id}}" aria-expanded="true" aria-controls="collapse{{$fq->id}}">
                                                <span>{{$fq->title}}</span>
                                                <i class="fa fa-plus"></i>
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$fq->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$fq->id}}">
                                        <div class="panel-body"  dir="{{$lang->rtl == 1 ? 'rtl':''}}">
                                        {!! $fq->text !!}
                                        </div>
                                    </div>
                                </div>
                                @foreach($faqs as $faq)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$faq->id}}">
                                        <h4 dir="{{$lang->rtl == 1 ? 'rtl':''}}" class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                                <span>{{$faq->title}}</span>
                                                <i class="fa fa-plus"></i>
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
                                        <div class="panel-body"  dir="{{$lang->rtl == 1 ? 'rtl':''}}">
                                        {!! $faq->text !!}
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of faq area -->
@endsection