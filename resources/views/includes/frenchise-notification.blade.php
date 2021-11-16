    @php
      $vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get()->pluck('id');
      $vendororder = App\Models\Vendororder::whereIn('user_id',$vendor)->groupBy()->get()->pluck('order_id');

        $user_notf = App\Models\FrenchiseNotification::whereIn('user_id',$vendor)->where('user_id','!=',null)->orWhere('vendor_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get();
        $order_notf = App\Models\FrenchiseNotification::whereIn('order_id',$vendororder)->where('order_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get();
        $product_notf = App\Models\FrenchiseNotification::where('product_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get();
        $conv_notf = App\Models\FrenchiseNotification::where('conversation_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get();
      @endphp                                      

                                            <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
                                                <div class="profile-info dropdown">
                                                    <div class="profile-comments">
                                                        <a class="dropdown-toggle" id="conv_notf" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{asset('assets/admin/img/message.png')}}" alt="list image">
                                                            <span id="notf_conv">{{ $conv_notf->count() }}</span>
                                                        </a>

                                                        <div class="profile-notifi-content dropdown-menu">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="profile-wishlist" style="padding-left: 0;">
                                                        <a class="dropdown-toggle" id="user_notf" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{asset('assets/admin/img/flag.png')}}" alt="flag image">
                                                            <span id="notf_user">{{ $user_notf->count() }}</span>
                                                        </a>

                                                        <div class="profile-wishlist-content dropdown-menu">
                                                                                                                        
                                                        </div>
                                                    </div>

                                                    <div class="profile-notifi">
                                                        <a class="dropdown-toggle" id="order_notf" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{asset('assets/admin/img/notification.png')}}" alt="notification image">
                                                            <span id="notf_order">{{ $order_notf->count() }}</span>
                                                        </a>

                                                        <div class="profile-notifi-content dropdown-menu">
                                                          
                                                        </div>
                                                    </div>

                                                    <div class="profile-comments">
                                                        <a class="dropdown-toggle" id="product_notf" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{asset('assets/admin/img/list.png')}}" alt="list image">
                                                            <span id="notf_product">{{ $product_notf->count() }}</span>
                                                        </a>

                                                        <div class="profile-comments-content dropdown-menu">
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="view-profile">
                                                        <div class="profile__img dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <img src="{{ Auth::guard('frenchise')->user()->photo ? asset('assets/images/'.Auth::guard('frenchise')->user()->photo):asset('assets/images/noimage.png') }}" alt="profile image"> <span>{{Auth::guard('frenchise')->user()->name}}</span> <i class="fa fa-angle-down"></i>
                                                        </div>
                                                        <div class="profile-content dropdown-menu">
                                                            <h5>Welcome!</h5>
                                                            <a style="margin-left: 4px;" href="{{route('frenchise-profile')}}"><i class="fa fa-user"></i>Edit Profile</a>
                                                            <a href="{{route('frenchise-password-reset')}}"><i class="fa fa-fw fa-cog"></i>Change Password</a>
                                                            <a href="{{route('frenchise-logout')}}"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>