      @php
        $conv_notf = App\Models\UserNotification::where('user_id','=',Auth::guard('customer')->user()->id)->where('is_read','=',0)->orderBy('id','desc')->get();

      @endphp                                      

                                            <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                                <div class="profile-info dropdown">

                                                    <div class="profile-comments">
                                                        <a class="dropdown-toggle" id="conv_notf" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{asset('assets/admin/img/message.png')}}" alt="list image">
                                                            <span id="notf_conv">{{ $conv_notf->count() }}</span>
                                                        </a>

                                                        <div class="profile-notifi-content dropdown-menu">
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="view-profile">
                                                        <div class="profile__img dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::guard('customer')->user())
                                    <img src="{{ Auth::guard('customer')->user()->photo ? asset('assets/images/'.Auth::guard('customer')->user()->photo):asset('assets/images/noimage.png')}}" alt="profile image">
                                    {{--  @else
                                    <img src="{{ Auth::guard('customer')->user()->photo ? asset('assets/images/'.Auth::guard('customer')->user()->photo):asset('assets/images/noimage.png') }}" alt="profile image">  --}}
                            @endif <span>{{Auth::guard('customer')->user()->name}}</span> <i class="fa fa-angle-down"></i>
                                                        </div>
                                                        <div class="profile-content dropdown-menu">
                                                            <h5>{{$lang->welcome}}</h5>
                                                            <a style="margin-left: 4px;" href="{{route('customer-profile')}}"><i class="fa fa-user"></i>{{$lang->edit}}</a>
                                                            <a href="{{route('customer-reset')}}"><i class="fa fa-fw fa-cog"></i>{{$lang->reset}}</a>
                                                            <a href="{{route('customer-logout')}}"><i class="fa fa-fw fa-power-off"></i>{{$lang->logout}}</a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>