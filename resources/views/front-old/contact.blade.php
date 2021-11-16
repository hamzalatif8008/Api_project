@extends('layouts.front')

@section('styles')


@endsection

@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->contact}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->


    <!-- Starting of contact us area -->
    <div class="section-padding contact-area-wrapper">
        <div class="container">
            <div class="row">
                @if($lang->rtl == 1)
                <div class="col-md-4 col-md-offset-1 col-sm-5">
                    <div class="contact-info pt-100">
                            @if($gs->street != null)   
                          <p class="contact-info">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{$gs->street}}
                            </p>
                            @endif

                            @if($gs->phone != null || $gs->fax != null ) 
                            <p class="contact-info">

                                <i class="fa fa-phone" aria-hidden="true"></i>
                                @if($gs->phone != null && $gs->fax != null)
                                <a dir="rtl" href="tel:{{$gs->phone}}">+{{$gs->phone}}</a>
                                <br>
                                <a dir="rtl" href="tel:{{$gs->fax}}">+{{$gs->fax}}</a>
                                @elseif($gs->phone != null)
                            <a dir="rtl" href="tel:{{$gs->phone}}">+{{$gs->phone}}</a>

                                @else($gs->fax != null)
                                <a dir="rtl" href="tel:{{$gs->fax}}">+{{$gs->fax}}</a>
                                @endif

                            </p>
                            @endif

                            @if($gs->site != null || $gs->email != null )
                            <p class="contact-info">                               
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                @if($gs->site != null && $gs->email != null) 
                                <a href="{{$gs->site}}">{{$gs->site}}</a>
                                <br>
                                <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                @elseif($gs->site != null)
                                <a href="{{$gs->site}}">{{$gs->site}}</a>
                                @else
                                <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                @endif                                                                
                            </p>
                            @endif
                    </div>
                </div>
                <div class="col-md-7 col-sm-7">
                        <h3 dir="{{$lang->rtl == 1 ? 'rtl':''}}">{{$ps->contact_title}}</h3>
                        <p  dir="{{$lang->rtl == 1 ? 'rtl':''}}">{!!$ps->contact_text!!}</p>
                    <div class="comments-area">
                        @include('includes.form-success')
                        @include('includes.form-error')
                        <div class="comments-form">
                            <form action="{{route('front.contact.submit')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="name" placeholder="{{$lang->con}}" required="" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="phone" placeholder="{{$lang->cop}}" type="tel">
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <input name="email" placeholder="{{$lang->coe}}" required="" type="email">
                                        </div>
                                </div>
                                    <p><textarea name="text" id="comment" placeholder="{{$lang->cor}}" cols="30" rows="10" style="resize: vertical;" required=""></textarea></p>
                                    <div class="row">
                                        @if($lang->rtl == 1)
                                        <div class="col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-4 col-xs-2 col-xs-offset-4">
                                            <span style="cursor: pointer; float: right;" class="refresh_code"><i class="fa fa-refresh fa-2x" style="margin-top: 10px;"></i></span>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <img id="codeimg" src="{{url('assets/images')}}/capcha_code.png">
                                        </div>
                                        @else
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <img id="codeimg" src="{{url('assets/images')}}/capcha_code.png">
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                            <span style="cursor: pointer;" class="refresh_code"><i class="fa fa-refresh fa-2x" style="margin-top: 10px;"></i></span>
                                        </div>
                                        @endif
                                    </div>
                                    @if($lang->rtl == 1)
                                    <div class="row">
                                    <div class="col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6 col-xs-8 col-xs-offset-4">

                                            <input name="codes" placeholder="{{$lang->enter_code}}" required="" type="text">
                                           <input style="float: {{$lang->rtl == 1 ? 'right':''}};" name="contact_btn" value="{{$lang->sm}}" type="submit">
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-8">

                                            <input name="codes" placeholder="{{$lang->enter_code}}" required="" type="text">
                                           <input  name="contact_btn" value="{{$lang->sm}}" type="submit">
                                        </div>
                                    </div>
                                    @endif

                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-7 col-sm-7">
                        <h3 dir="{{$lang->rtl == 1 ? 'rtl':''}}">{{$ps->contact_title}}</h3>
                        <p  dir="{{$lang->rtl == 1 ? 'rtl':''}}">{!!$ps->contact_text!!}</p>
                    <div class="comments-area">
                        @include('includes.form-success')
                        @include('includes.form-error')
                        <div class="comments-form">
                            <form action="{{route('front.contact.submit')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="name" placeholder="{{$lang->con}}" required="" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="phone" placeholder="{{$lang->cop}}" type="tel">
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <input name="email" placeholder="{{$lang->coe}}" required="" type="email">
                                        </div>
                                </div>
                                    <p><textarea name="text" id="comment" placeholder="{{$lang->cor}}" cols="30" rows="10" style="resize: vertical;" required=""></textarea></p>
                                    <div class="row">
                                        @if($lang->rtl == 1)
                                        <div class="col-md-2 col-md-offset-6 col-sm-2 col-sm-offset-4 col-xs-2 col-xs-offset-4">
                                            <span style="cursor: pointer; float: right;" class="refresh_code"><i class="fa fa-refresh fa-2x" style="margin-top: 10px;"></i></span>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <img id="codeimg" src="{{url('assets/images')}}/capcha_code.png">
                                        </div>
                                        @else
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <img id="codeimg" src="{{url('assets/images')}}/capcha_code.png">
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                            <span style="cursor: pointer;" class="refresh_code"><i class="fa fa-refresh fa-2x" style="margin-top: 10px;"></i></span>
                                        </div>
                                        @endif
                                    </div>
                                    @if($lang->rtl == 1)
                                    <div class="row">
                                    <div class="col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6 col-xs-8 col-xs-offset-4">

                                            <input name="codes" placeholder="{{$lang->enter_code}}" required="" type="text">
                                           <input style="float: {{$lang->rtl == 1 ? 'right':''}};" name="contact_btn" value="{{$lang->sm}}" type="submit">
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-8">

                                            <input name="codes" placeholder="{{$lang->enter_code}}" required="" type="text">
                                           <input  name="contact_btn" value="{{$lang->sm}}" type="submit">
                                        </div>
                                    </div>
                                    @endif

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-5">
                    <div class="contact-info pt-100">
                            @if($gs->street != null)   
                          <p class="contact-info">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{$gs->street}}
                            </p>
                            @endif

                            @if($gs->phone != null || $gs->fax != null ) 
                            <p class="contact-info">

                                 <i class="fa fa-phone" aria-hidden="true"></i>
                                @if($gs->phone != null && $gs->fax != null)
                                <a href="tel:{{$gs->phone}}">+{{$gs->phone}}</a>
                                <br>
                                <a href="tel:{{$gs->fax}}">+{{$gs->fax}}</a>
                                @elseif($gs->phone != null)
                            <a href="tel:{{$gs->phone}}">+{{$gs->phone}}</a>

                                @else($gs->fax != null)
                                <a href="tel:{{$gs->fax}}">+{{$gs->fax}}</a>
                                @endif

                            </p>
                            @endif

                            @if($gs->site != null || $gs->email != null )
                            <p class="contact-info">                               
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                @if($gs->site != null && $gs->email != null) 
                                <a href="{{$gs->site}}">{{$gs->site}}</a>
                                <br>
                                <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                @elseif($gs->site != null)
                                <a href="{{$gs->site}}">{{$gs->site}}</a>
                                @else
                                <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                @endif                                                                
                            </p>
                            @endif
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Ending of contact us area -->

@endsection


@section('scripts')
    <script>
        $('.refresh_code').click(function () {
            $.get('{{url('contact/refresh_code')}}', function(data, status){
                $('#codeimg').attr("src","{{url('assets/images')}}/capcha_code.png?time="+ Math.random());
            });
        })
    </script>
@stop