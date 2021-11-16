@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" id="title-overlay-wrap2" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->blogss}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->
<div class="section-padding blog-post-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
            @if(strlen($blog->title) > 50)
              @if($lang->rtl == 1)
              <h2 dir="rtl">{{$blog->title}}</h2>
              @else
              <h2>{{$blog->title}}</h2>
              @endif
            @else
              @if($lang->rtl == 1)
              <h2  dir="rtl">{{$blog->title}}</h2>
              @else
              <h2>{{$blog->title}}</h2>
              @endif
            @endif
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{$blog->created_at->diffForHumans()}}</li>
                                <li>{{$lang->bs}}: {{$blog->source}}</li>
                                <li><i class="fa fa-eye"></i> {{$blog->views}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                  @if($lang->rtl == 1)
                    <div class="col-md-4">
                       <div class="post-sidebar-area">
                           <h2 class="post-heading" dir="rtl">{{$lang->blogsss}}</h2>
                           <ul>
                              @foreach($lblogs as $lblog)
                               <li>
                                   <div class="row post-row">
                                       <div class="col-xs-8">
                                           <p class="post-meta-date">{{date('d M Y',(strtotime($lblog->created_at)))}}</p>
                                           <a href="{{route('front.blogshow',$lblog->id)}}">{{strlen($lblog->title) > 30 ? substr($lblog->title,0,30)."..." : $lblog->title}}</a>
                                       </div>
                                       <div class="col-xs-4">

                                           <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                       </div>
                                   </div>
                               </li>
                               @endforeach
                           </ul>
                       </div>
                   </div>
                    <div class="col-md-8">
                        <p><img src="{{asset('assets/images/'.$blog->photo)}}" alt=""></p>
                        <div class="entry-content" dir="{{$lang->rtl == 1 ? 'rtl':''}}">
                          {!!$blog->details!!}
                        </div>

                       <!--  <div class="social-sharing a2a_kit a2a_kit_size_32" dir="rtl">
                            <a class="facebook a2a_button_facebook" href=""><i class="fa fa-facebook"></i> Share </a>
                            <a class="twitter a2a_button_twitter" href=""><i class="fa fa-twitter"></i> Tweet</a>
                            <a class="pinterest a2a_button_google_plus" href=""><i class="fa fa-pinterest"></i> Pinterest</a>
                            <a class="a2a_dd" href="https://www.addtoany.com/share" style="position: absolute; background-color: rgb(1, 102, 255); "></a>
                        </div> -->
                         <div class="social-sharing a2a_kit a2a_kit_size_32">

                            <a class="facebook a2a_button_facebook" href=""><i class="fa fa-facebook"></i> </a>

                            <a class="twitter a2a_button_twitter" href=""><i class="fa fa-twitter"></i> </a>

                            <a class="whatsapp a2a_button_whatsapp" href=""><i class="fa fa-whatsapp"></i> </a>

                            {{--  <a class="instagram a2a_button_instagram" href=""><i class="fa fa-instagram"></i> </a>

                            <a class="snapchat a2a_button_snapchat" href=""><i class="fa fa-snapchat-square"></i> </a>  --}}

                            <a class="google a2a_button_google_gmail" href=""><i class="fa fa-google"></i> </a>

                            
                            <a class="linkedin a2a_button_linkedin" href=""><i class="fa fa-linkedin"></i> </a>                            

                        </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>

                        <div dir="rtl" class="blog-comments-msg-area">
                            <h2>{{$lang->contacts}}</h2>
                            <hr>
                             @include('includes.form-success') 
                            <form action="{{route('front.contact.submit')}}" method="POST">
                                <input type="hidden" name="to" value="{{$ps->contact_email}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">{{$lang->con}}</label>
                                    <input class="form-control" name="name" placeholder="" required="" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{$lang->coe}}</label>
                                    <input class="form-control" name="email" placeholder="" required="" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">{{$lang->cor}}</label>
                                    <textarea name="message" class="form-control" id="comments-msg" rows="5" style="resize: vertical;" required=""></textarea>
                                </div>
                                    <div class="row">
                                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <span style="cursor: pointer;" class="refresh_code"><i class="fa fa-refresh fa-2x" style="margin-top: 10px;"></i></span>
                                        </div>
                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <img id="codeimg" src="{{url('assets/images')}}/capcha_code.png">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-lg-push-8 col-md-4 col-md-push-8 col-sm-4 col-sm-push-8">

                                            <input class="form-control" name="codes" placeholder="Enter Code" required="" type="text">
                                        </div>
                                    </div>
                                    <br>
                                <div class="form-group">
                                    <button class="btn blog-btn comments" type="submit">{{$lang->sm}}</button>
                                </div>
                            </form>
                        </div>  
                        </div>
                  @else
                    <div class="col-md-8">
                        <p><img src="{{asset('assets/images/'.$blog->photo)}}" alt=""></p>
                        <div class="entry-content" dir="{{$lang->rtl == 1 ? 'rtl':''}}">
                          {!!$blog->details!!}
                        </div>

                      <!--   <div class="social-sharing a2a_kit a2a_kit_size_32">
                            <a class="facebook a2a_button_facebook" href=""><i class="fa fa-facebook"></i> Share </a>
                            <a class="twitter a2a_button_twitter" href=""><i class="fa fa-twitter"></i> Tweet</a>
                            <a class="pinterest a2a_button_google_plus" href=""><i class="fa fa-pinterest"></i> Pinterest</a>
                            <a class="a2a_dd" href="https://www.addtoany.com/share" style="position: absolute; background-color: rgb(1, 102, 255); "></a>
                        </div> -->
                         <div class="social-sharing a2a_kit a2a_kit_size_32">

                            <a class="facebook a2a_button_facebook" href=""><i class="fa fa-facebook"></i> </a>

                            <a class="twitter a2a_button_twitter" href=""><i class="fa fa-twitter"></i> </a>

                            <a class="whatsapp a2a_button_whatsapp" href=""><i class="fa fa-whatsapp"></i> </a>

                            {{--  <a class="instagram a2a_button_instagram" href=""><i class="fa fa-instagram"></i> </a>

                            <a class="snapchat a2a_button_snapchat" href=""><i class="fa fa-snapchat-square"></i> </a>  --}}

                            <a class="google a2a_button_google_gmail" href=""><i class="fa fa-google"></i> </a>

                            
                            <a class="linkedin a2a_button_linkedin" href=""><i class="fa fa-linkedin"></i> </a>                            

                        </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script> 
                        </div>

                    <div class="col-md-4">
                       <div class="post-sidebar-area">
                           <h2 class="post-heading">{{$lang->blogsss}}</h2>
                           <ul style="direction: ltr;">
                              @foreach($lblogs as $lblog)
                               <li>
                                   <div class="row post-row">
                                       <div class="col-xs-4">

                                           <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                       </div>
                                       <div class="col-xs-8">
                                           <p class="post-meta-date">{{date('d M Y',(strtotime($lblog->created_at)))}}</p>
                                           <a href="{{route('front.blogshow',$lblog->id)}}">{{strlen($lblog->title) > 30 ? substr($lblog->title,0,30)."..." : $lblog->title}}</a>
                                       </div>
                                   </div>
                               </li>
                               @endforeach
                           </ul>
                       </div>
                   </div>
                  @endif

                </div>
            </div>
        </div>
@endsection
