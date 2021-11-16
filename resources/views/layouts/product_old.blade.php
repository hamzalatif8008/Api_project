<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$product->meta_tag != null ? $product->meta_tag : $pmeta}}">

    <meta name="twitter:card" content="photo" />
    <meta name="twitter:site" content="{{$product->name}}" />
    <meta name="twitter:image" content="{{asset('assets/images/'.$product->photo)}}" />

    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:description" content="{{ $product->meta_description != null ? $product->meta_description : strip_tags($product->description) }}" />
    <meta property="og:image" content="{{asset('assets/images/'.$product->photo)}}" />
    <meta name="author" content="GeniusOcean">
    <title>{{substr($product->name, 0,11)."-"}}{{$gs->title}}</title>
    <!-- Font Awesome CSS -->
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Rubik:300,400,500,700,900');
</style>
    <link rel="stylesheet" href="{{asset('assets/front/css/all.css')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 
        <style type="text/css">
        .form-control {
        box-shadow: inset 0px 0px 0px rgba(0,0,0,.075);            
        }

        </style>
    @include('styles.design') 

    @yield('styles')

</head>
<body>
    @if($gs->is_loader == 1)
    <div id="cover"></div>
    @endif
@if($gs->is_subscribe == 1)
@if(isset($visited)) 

    <!--  Starting of subscribe-pre-loader Area   -->
    <div class="subscribe-preloader-wrap" id="subscriptionForm" style="display: none;">
        <div class="subscribePreloader__thumb" style="background-image: url({{asset('assets/images/'.$gs->subscribe_image)}});">
            <span class="preload-close"><i class="fa fa-close"></i></span>
            <div class="subscribePreloader__text text-center">
                <h1>{{$gs->subscribe_title}}</h1>
                <p>{{$gs->subscribe_text}}</p>
                <form action="{{route('front.subscribe.submit')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="email" name="email" id="" placeholder="{{$lang->supl}}" required="">
                        <button type="submit">{{$lang->s}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  Ending of subscribe-pre-loader Area   -->

@endif
@endif
    <!--  Starting of header area   -->
    <header class="header-wrap">
        <div class="header-support-part">
            <div class="header-top-area">
                <div class="container">
    @if($lang->rtl == 1)

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header-top-right-wrap text-left">
                                <ul>
                                    @if($ps->is_currency == 1)
                                    <li><a style="cursor: pointer;">
                                    @if(Session::has('currency')) 
                                    @php
                                    $cur_name = App\Models\Currency::findOrFail(Session::get('currency'));
                                    @endphp
                                        {{$cur_name->sign}} {{$cur_name->name}}
                                    @else
                                    @php
                                    $cur_name = App\Models\Currency::where('is_default','=',1)->first();
                                    @endphp
                                        {{$cur_name->sign}} {{$cur_name->name}}
                                    @endif
                                    <i class="fa fa-angle-down"></i></a>
                                        <ul style="box-shadow: none;">
                                            @php
                                            $cur_names = App\Models\Currency::all();
                                            @endphp
                                            @foreach($cur_names as $cn)
                                             <li style="width: 100%"><a style="display: block; border-left: none; float: right; padding: 0 15px;" href="{{route('front.curr',$cn->id)}}">
                                                {{$cn->name}}</a>
                                             </li>                                           
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endif

                                    @if($gs->is_language == 1)
                                    <li class="language"><a style="cursor: pointer;"><i class="fa fa-globe"></i>
                                    @if(Session::has('language')) 
                                    @php
                                    $langlang = App\Models\Language::findOrFail(Session::get('language'));
                                    @endphp
                                        {{$langlang->language}}
                                    @else
                                    @php
                                    $langlang = App\Models\Language::findOrFail(1);
                                    @endphp
                                        {{$langlang->language}}
                                    @endif
                                    <i class="fa fa-angle-down"></i></a>
                                        <ul style="box-shadow: none;">
                                            @php
                                            $languages = App\Models\Language::all();
                                            @endphp
                                            @foreach($languages as $ln)
                                             <li style="width: 100%"><a style="display: block; float: right;; padding: 0 15px;" href="{{route('front.lang',$ln->id)}}">
                                                {{$ln->language}}</a>
                                             </li>                                           
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header-top-left-wrap">
                                <ul>
                                    @if($gs->email != null)
                                    <li id="front-top-mail"><a style="padding-right: 0;"><i class="fa fa-envelope"></i> {{$gs->email}}</a></li>
                                    @endif
                                    @if($gs->phone != null)
                                    <li><a><i class="fa fa-phone"></i> {{$gs->phone}}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>


     @else

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header-top-left-wrap">
                                <ul>
                                    @if($gs->email != null)
                                    <li id="front-top-mail"><a style="padding-left: 0;"><i class="fa fa-envelope"></i> {{$gs->email}}</a></li>
                                    @endif
                                    @if($gs->phone != null)
                                    <li><a><i class="fa fa-phone"></i> {{$gs->phone}}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header-top-right-wrap text-right">
                                <ul>
                                    @if($ps->is_currency == 1)
                                    <li><a style="cursor: pointer;">
                                    @if(Session::has('currency')) 
                                    @php
                                    $cur_name = App\Models\Currency::findOrFail(Session::get('currency'));
                                    @endphp
                                        {{$cur_name->sign}} {{$cur_name->name}}
                                    @else
                                    @php
                                    $cur_name = App\Models\Currency::where('is_default','=',1)->first();
                                    @endphp
                                        {{$cur_name->sign}} {{$cur_name->name}}
                                    @endif
                                    <i class="fa fa-angle-down"></i></a>
                                        <ul style="box-shadow: none;">
                                            @php
                                            $cur_names = App\Models\Currency::all();
                                            @endphp
                                            @foreach($cur_names as $cn)
                                             <li style="display: block;"><a style="display: block; border-right: none;" href="{{route('front.curr',$cn->id)}}">
                                                {{$cn->name}}</a>
                                             </li>                                           
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endif

                                    @if($gs->is_language == 1)
                                    <li class="language"><a style="cursor: pointer;"><i class="fa fa-globe"></i>
                                    @if(Session::has('language')) 
                                    @php
                                    $langlang = App\Models\Language::findOrFail(Session::get('language'));
                                    @endphp
                                        {{$langlang->language}}
                                    @else
                                    @php
                                    $langlang = App\Models\Language::findOrFail(1);
                                    @endphp
                                        {{$langlang->language}}
                                    @endif
                                    <i class="fa fa-angle-down"></i></a>
                                        <ul style="box-shadow: none;">
                                            @php
                                            $languages = App\Models\Language::all();
                                            @endphp
                                            @foreach($languages as $ln)
                                             <li><a style="display: block;" href="{{route('front.lang',$ln->id)}}">
                                                {{$ln->language}}</a>
                                             </li>                                           
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

    @endif
                </div>
            </div>
            <div class="header-middle-area">
                <div class="container">
                    <div class="row">

    @if($lang->rtl == 1)
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="header-middle-right-wrap text-left">
                                <ul>
                                <li>
                                @if(Auth::guard('user')->check())
                                    <a href="{{route('user-wishlists')}}"><span>{{$lang->wishlists}}</span> <i class="fa fa-heart"></i></a>
                                @else
                                    <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal"><span>{{$lang->wishlists}}</span> <i class="fa fa-heart"></i></a>
                                @endif
                                </li>
                                    <li>
                                        @if(Auth::guard('user')->check())
                                            <a style="text-transform: uppercase" href="{{route('user-dashboard')}}">
                                                <i class="fa fa-user"></i> <span>{{$lang->fh}}</span>
                                            </a>
                                        @else
                                            <a style="text-transform: uppercase" href="{{route('user-login')}}">
                                                <i class="fa fa-user"></i> <span>{{$lang->signinup}}</span>
                                            </a>
                                        @endif
                                    </li>
                                    <li class="myCart"><a href="javascript:void(0)"> <i class="fa fa-cart-plus"></i></a> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                        <div class="addToMycart">
                                            <div class="cart">
                                            @if(Session::has('cart'))
                                            @foreach(Session::get('cart')->items as $product)
                                            <div class="single-myCart">
                                                <p class="cart-close" onclick="remove({{$product['item']['id']}})"><i class="fa fa-close"></i></p>
                                                <div class="cart-img">
                                                    <img src="{{ asset('assets/images/'.$product['item']['photo']) }}" alt="Product image">
                                                </div>
                                                <div class="cart-info">
                                                    <a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}" style="color: black; padding: 0 0;"><h5>{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</h5></a>
                                                <p>{{$lang->cquantity}}: <span id="cqt{{$product['item']['id']}}">{{$product['qty']}}</span> <span>{{ $product['item']['measure'] }}</span></p>
                                                <p>
                                                @if($gs->sign == 0)
                                                    {{$curr->sign}}<span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>
                                                @else
                                                    <span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>{{$curr->sign}}
                                                @endif
                                                </p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif                                            
                                            </div>
                                            <h5 class="empty">{{ Session::has('cart') ? '' :$lang->h }}</h5>
                                            <hr/>
                                            <h4 class="text-left">{{$lang->vt}}
                                            @if($gs->sign == 0)                                                   
                                             {{$curr->sign}}<span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
                                            @else
                                             <span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>{{$curr->sign}}
                                            @endif
                                         </h4>
                                            <div class="addMyCart-btns">
                                                <a href="{{route('front.cart')}}" class="black-btn">{{$lang->vdn}}</a>
                                                <a href="{{route('front.checkout')}}" class="black-btn">{{$lang->gt}}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="myCart1"><a href="javascript:void(0)"> <i class="fa fa-cart-plus"></i></a> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                        <div class="addToMycart1">
                                            <div class="cart">
                                            @if(Session::has('cart'))
                                            @foreach(Session::get('cart')->items as $product)
                                            <div class="single-myCart">
                                                <p class="cart-close" onclick="remove({{$product['item']['id']}})"><i class="fa fa-close"></i></p>
                                                <div class="cart-img">
                                                    <img src="{{ asset('assets/images/'.$product['item']['photo']) }}" alt="Product image">
                                                </div>
                                                <div class="cart-info">
                                                    <a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}" style="color: black; padding: 0 0;"><h5>{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</h5></a>
                                                <p>{{$lang->cquantity}}: <span id="cqt{{$product['item']['id']}}">{{$product['qty']}}</span> <span>{{ $product['item']['measure'] }}</span></p>
                                                <p>
                                                @if($gs->sign == 0)
                                                    {{$curr->sign}}<span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>
                                                @else
                                                    <span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>{{$curr->sign}}
                                                @endif
                                                </p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif                                            
                                            </div>
                                            <h5 class="empty">{{ Session::has('cart') ? '' :$lang->h }}</h5>
                                            <hr/>
                                            <h4 class="text-left">{{$lang->vt}} 
                                                @if($gs->sign == 0)
                                                {{$curr->sign}}<span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
                                                @else
                                                <span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>{{$curr->sign}}
                                                @endif
                                            </h4>
                                            <div class="addMyCart-btns">
                                                <a href="{{route('front.cart')}}" class="black-btn">{{$lang->vdn}}</a>
                                                <a href="{{route('front.checkout')}}" class="black-btn">{{$lang->gt}}</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="circle-li"><a href="{{route('front.compare')}}"><i class="fa fa-exchange"></i></a> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>
                                    </li>
                                    <li class="sell-btn">
            @if(Auth::guard('user')->check())
            <a href="{{route('user-dashboard')}}">{{$lang->sale}}</a>
            @else
            <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
            @endif
                                    </li>
                                    <li class="mobile-search"><a href="javascript:void(0)"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="header-middle-left-wrap">
                                <div class="logo">
                                    <a href="{{route('front.index')}}">
                                    <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
                                    <span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
    @else
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="header-middle-left-wrap">
                                <div class="logo">
                                    <a href="{{route('front.index')}}">
                                    <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
                                    </a>
                                    <span class="sell-btn">
            @if(Auth::guard('user')->check())
            <a href="{{route('user-dashboard')}}">{{$lang->sale}}</a>
            @else
            <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
            @endif
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="header-middle-right-wrap text-right">
                                <ul>
                                <li>
                                @if(Auth::guard('user')->check())
                                    <a href="{{route('user-wishlists')}}"><i class="fa fa-heart"></i> <span>{{$lang->wishlists}}</span></a>
                                @else
                                    <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal"><img src="{{ asset('assets/images/fav_icon.png') }}" style="height: 26px;"/></a>
                                @endif
                                </li>
                                    <li>
                                        @if(Auth::guard('user')->check())
                                            <a style="text-transform: uppercase" href="{{route('user-dashboard')}}">
                                                <i class="fa fa-user"></i> <span>{{$lang->fh}}</span>
                                            </a>
                                        @else
                                            <a style="text-transform: uppercase" href="{{route('user-login')}}">
                                                <i class="fa fa-user"></i> <span>{{$lang->signinup}}</span>
                                            </a>
                                        @endif
                                    </li>
                                    <li class="myCart"><a href="javascript:void(0)"> <img src="{{ asset('assets/images/cart_icon.png') }}" style="height: 26px;"/></a> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                        <div class="addToMycart">
                                            <div class="cart">
                                            @if(Session::has('cart'))
                                            @foreach(Session::get('cart')->items as $product)
                                            <div class="single-myCart">
                                                <p class="cart-close" onclick="remove({{$product['item']['id']}})"><i class="fa fa-close"></i></p>
                                                <div class="cart-img">
                                                    <img src="{{ asset('assets/images/'.$product['item']['photo']) }}" alt="Product image">
                                                </div>
                                                <div class="cart-info">
                                                    <a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}" style="color: black; padding: 0 0;"><h5>{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</h5></a>
                                                <p>{{$lang->cquantity}}: <span id="cqt{{$product['item']['id']}}">{{$product['qty']}}</span> <span>{{ $product['item']['measure'] }}</span></p>
                                                <p>
                                                @if($gs->sign == 0)
                                                    {{$curr->sign}}<span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>
                                                @else
                                                    <span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>{{$curr->sign}}
                                                @endif
                                                </p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif                                            
                                            </div>
                                            <h5 class="empty">{{ Session::has('cart') ? '' :$lang->h }}</h5>
                                            <hr/>
                                            <h4 class="text-right">{{$lang->vt}}
                                            @if($gs->sign == 0)                                                   
                                             {{$curr->sign}}<span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
                                            @else
                                             <span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>{{$curr->sign}}
                                            @endif
                                         </h4>
                                            <div class="addMyCart-btns">
                                                <a href="{{route('front.cart')}}" class="black-btn">{{$lang->vdn}}</a>
                                                <a href="{{route('front.checkout')}}" class="black-btn">{{$lang->gt}}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="myCart1"><a href="javascript:void(0)"> <i class="fa fa-cart-plus"></i></a> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                        <div class="addToMycart1">
                                            <div class="cart">
                                            @if(Session::has('cart'))
                                            @foreach(Session::get('cart')->items as $product)
                                            <div class="single-myCart">
                                                <p class="cart-close" onclick="remove({{$product['item']['id']}})"><i class="fa fa-close"></i></p>
                                                <div class="cart-img">
                                                    <img src="{{ asset('assets/images/'.$product['item']['photo']) }}" alt="Product image">
                                                </div>
                                                <div class="cart-info">
                                                    <a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}" style="color: black; padding: 0 0;"><h5>{{strlen($product['item']['name']) > 45 ? substr($product['item']['name'],0,45).'...' : $product['item']['name']}}</h5></a>
                                                <p>{{$lang->cquantity}}: <span id="cqt{{$product['item']['id']}}">{{$product['qty']}}</span> <span>{{ $product['item']['measure'] }}</span></p>
                                                <p>
                                                @if($gs->sign == 0)
                                                    {{$curr->sign}}<span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>
                                                @else
                                                    <span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>{{$curr->sign}}
                                                @endif
                                                </p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif                                            
                                            </div>
                                            <h5 class="empty">{{ Session::has('cart') ? '' :$lang->h }}</h5>
                                            <hr/>
                                            <h4 class="text-right">{{$lang->vt}} 
                                                @if($gs->sign == 0)
                                                {{$curr->sign}}<span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
                                                @else
                                                <span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>{{$curr->sign}}
                                                @endif
                                            </h4>
                                            <div class="addMyCart-btns">
                                                <a href="{{route('front.cart')}}" class="black-btn">{{$lang->vdn}}</a>
                                                <a href="{{route('front.checkout')}}" class="black-btn">{{$lang->gt}}</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="circle-li"><a href="{{route('front.compare')}}"><i class="fa fa-exchange"></i></a> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>
                                    </li>
                                    <li class="sell-btn">
            @if(Auth::guard('user')->check())
            <a href="{{route('user-dashboard')}}">{{$lang->sale}}</a>
            @else
            <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
            @endif
                                    </li>
                                    <li class="mobile-search"><a href="javascript:void(0)"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
    @endif


                        <div class="col-lg-12">
                            <div class="header-search-box mobile">
                                    <div class="search-close">
                                    <i class="fa fa-times"></i>
                                </div>
                                <form action="{{route('front.search')}}" method="GET">
                                    <input type="text" class="ss" id="search_product" name="product" placeholder="{{$lang->ec}}" required>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="header-bottom-area">
            <div class="container">
                <div class="row">
        @if($lang->rtl == 1)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                        <div class="header-search-box text-left">
                            <form action="{{route('front.search')}}" method="GET">
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <input type="text" class="ss" id="header_search" name="product" placeholder="{{$lang->ec}}" required>
                            </form>
                        </div>
                        <div class="header-searched-item-list-wrap" style="display: none;">
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
                        <div class="header-menu-wrap">
                            <ul>
                                <li><a href="{{route('front.index')}}">{{$lang->home}}</a></li>
                                <li><a href="{{route('front.blog')}}">{{$lang->blog}}</a></li>
                                @if($ps->f_status == 1)
                                <li><a href="{{route('front.faq')}}">{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                <li><a href="{{route('front.contact')}}">{{$lang->contact}}</a></li>
                                @endif
                                @if(count($pages) > 0)
                    <li><a style="cursor: pointer;">{{$lang->others}} <i class="fa fa-angle-down"></i></a>
                                    <ul>
                                        @foreach($pages as $pg)
                                        <li><a href="{{route('front.page',$pg->slug)}}">{{strtoupper($pg->title)}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mobileSlickMenuActive"></div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                        <div class="header-bottom-left-wrap">
                        <h5><i class="fa fa-angle-down"></i> {{$lang->all_categories}} <i class="fa fa-bars"></i></h5>
                            <ul>
                            @foreach($categories as $category)
                                <li><a href="{{route('front.category',$category->cat_slug)}}">
                                    @if($category->photo != null)
                                    <img src="{{asset('assets/images/'.$category->photo)}}" alt="">
                                    @else
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif
                                    {{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-left':''}}"></i>
                                </a>
                                    @if(count($category->subs) > 0)
                                    <ul>
                                        <li>{{ $category->cat_name }}</li> 
                @foreach($category->subs()->where('status','=',1)->get() as $subcategory)                                                   
                                        <li><a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{$subcategory->sub_name}} <i class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-left' : ''}}"></i></a>
                                        @if(count($subcategory->childs) > 0)
                                            <ul>
                                                <li>{{$subcategory->sub_name}}</li>
                    @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                                                <li><a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{$childcategory->child_name}}</a></li>
                    @endforeach    

                                            </ul>
                                        @endif
                                        </li>
                @endforeach
                                    </ul>
                                </li>
                                    @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mobileMenuActive"></div>
        @else
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                        <div class="header-bottom-left-wrap">
                        <h5><i class="fa fa-bars"></i> {{$lang->all_categories}} <i class="fa fa-angle-down"></i></h5>
                            <ul>
                            @foreach($categories as $category)
                                <li><a href="{{route('front.category',$category->cat_slug)}}">
                                    @if($category->photo != null)
                                    <img src="{{asset('assets/images/'.$category->photo)}}" alt="">
                                    @else
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif
                                    {{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-right':''}}"></i>
                                </a>
                                    @if(count($category->subs) > 0)
                                    <ul>
                                        <li>{{ $category->cat_name }}</li> 
                @foreach($category->subs()->where('status','=',1)->get() as $subcategory)                                                   
                                        <li><a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{$subcategory->sub_name}} <i class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-right' : ''}}"></i></a>
                                        @if(count($subcategory->childs) > 0)
                                            <ul>
                                                <li>{{$subcategory->sub_name}}</li>
                    @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                                                <li><a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{$childcategory->child_name}}</a></li>
                    @endforeach    

                                            </ul>
                                        @endif
                                        </li>
                @endforeach
                                    </ul>
                                </li>
                                    @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mobileMenuActive"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
                        <div class="header-menu-wrap">
                            <ul>
                                <li><a href="{{route('front.index')}}">{{$lang->home}}</a></li>
                                <li><a href="{{route('front.blog')}}">{{$lang->blog}}</a></li>
                                @if($ps->f_status == 1)
                                <li><a href="{{route('front.faq')}}">{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                <li><a href="{{route('front.contact')}}">{{$lang->contact}}</a></li>
                                @endif
                                @if(count($pages) > 0)
                    <li><a style="cursor: pointer;">{{$lang->others}} <i class="fa fa-angle-down"></i></a>
                                    <ul>
                                        @foreach($pages as $pg)
                                        <li><a href="{{route('front.page',$pg->slug)}}">{{strtoupper($pg->title)}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                        <div class="header-search-box text-right">
                            <form action="{{route('front.search')}}" method="GET">
                                <input type="text" class="ss" id="header_search" name="product" placeholder="{{$lang->ec}}" required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="header-searched-item-list-wrap" style="display: none;">
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <div class="mobileSlickMenuActive"></div>
        @endif

                </div>
            </div>
        </div>
    </header>
            @php
            $i=1;
            $j=1;
            @endphp
    <!--  Ending of header area   -->
        @yield('content')



    <!-- Starting of footer area -->
    <footer class="footer-wrap">
        <div class="subscribe-newsletter-wrap">
            <div class="container">
                <div class="row">
                    @if($lang->rtl == 1)
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="subscribe-newsletter-text-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-8">
                                    <div class="subscribe-form">
                                        <form action="{{route('front.subscribe.submit')}}" method="POST">
                                            {{csrf_field()}}
                                            <button type="submit" class="subscribe-btn">{{$lang->s}}</button> 
                                            <input type="email" name="email" id="subscribe_email" placeholder="{{$lang->supl}}" required> 
                                        </form>                                
                                    </div>
                                </div>
                                <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-5 col-xs-4">
                                    <h4>{{$lang->ston}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="subscribe-newsletter-text-area">
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-5">
                                    <h4>{{$lang->ston}}</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-7">
                                    <div class="subscribe-form">
                                        <form action="{{route('front.subscribe.submit')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="email" name="email" id="subscribe_email" placeholder="{{$lang->supl}}" required>
                                            <button type="submit" class="subscribe-btn">{{$lang->s}}</button>  
                                        </form>                                
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="footer-top-wrap">
            <div class="container">
                <div class="row">
                    @if($lang->rtl == 1)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap contact">
                            <h4 class="footer-title text-right">{{$lang->contact}}</h4>
                            <ul>
                            @if($gs->street != null)    
                                <li><a><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{{$gs->street}}</span>
                                </a></li>
                            @endif
                            @if($gs->phone != null) 
                                <li><a href="tel:{{$gs->phone}}"><i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>{{$gs->phone}}</span>
                                </a></li>
                            @endif
                            @if($gs->email != null)
                            <li><a href="mailto:{{$gs->email}}"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>{{$gs->email}}</span>
                                </a></li>
                            @endif
                            @if($gs->site != null)
                                <li><a href="{{$gs->site}}"><i class="fa fa-globe" aria-hidden="true"></i>
                                    <span>{{$gs->site}}</span>
                                </a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap">
                            <h4 class="footer-title text-right">{{$lang->lns}}</h4>
                            <ul>
                            @foreach($lblogs as $lblog)
                                <li>
                                    <img height="30" width="31" src="{{asset('assets/images/'.$lblog->photo)}}" alt="footer image">
                                    <span><a href="{{route('front.blogshow',$lblog->id)}}">{{strlen($lblog->title) > 30 ? substr($lblog->title,0,30)."..." : $lblog->title}}</a></span>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap information">
                            <h4 class="footer-title text-right">{{$lang->fl}}</h4>
                            <ul>
                                    <li><a href="{{route('front.index')}}"><i class="fa fa-angle-double-left"></i> &nbsp;{{$lang->home}}</a></li>
                                @if($ps->f_status == 1)
                                    <li><a href="{{route('front.faq')}}"><i class="fa fa-angle-double-left"></i> &nbsp;{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                    <li><a href="{{route('front.contact')}}"><i class="fa fa-angle-double-left"></i> &nbsp;{{$lang->contact}}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap">
                            <h4 class="footer-title text-right">{{$lang->about}}</h4>
                            <p dir="rtl">
                                {{$gs->about}}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap">
                            <h4 class="footer-title">{{$lang->about}}</h4>
                            <p>
                                {{$gs->about}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap information">
                            <h4 class="footer-title">{{$lang->fl}}</h4>
                            <ul>
                                    <li><a href="{{route('front.index')}}"><i class="fa fa-angle-double-right"></i> &nbsp;{{$lang->home}}</a></li>
                                @if($ps->f_status == 1)
                                    <li><a href="{{route('front.faq')}}"><i class="fa fa-angle-double-right"></i> &nbsp;{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                    <li><a href="{{route('front.contact')}}"><i class="fa fa-angle-double-right"></i> &nbsp;{{$lang->contact}}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap">
                            <h4 class="footer-title">{{$lang->lns}}</h4>
                            <ul>
                            @foreach($lblogs as $lblog)
                                <li>
                                    <img height="30" width="31" src="{{asset('assets/images/'.$lblog->photo)}}" alt="footer image">
                                    <span><a href="{{route('front.blogshow',$lblog->id)}}">{{strlen($lblog->title) > 30 ? substr($lblog->title,0,30)."..." : $lblog->title}}</a></span>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-footer-wrap contact">
                            <h4 class="footer-title">{{$lang->contact}}</h4>
                            <ul>
                            @if($gs->street != null)    
                                <li><a><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{{$gs->street}}</span>
                                </a></li>
                            @endif
                            @if($gs->phone != null) 
                                <li><a href="tel:{{$gs->phone}}"><i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>{{$gs->phone}}</span>
                                </a></li>
                            @endif
                            @if($gs->email != null)
                            <li><a href="mailto:{{$gs->email}}"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>{{$gs->email}}</span>
                                </a></li>
                            @endif
                            @if($gs->site != null)
                                <li><a href="{{$gs->site}}"><i class="fa fa-globe" aria-hidden="true"></i>
                                    <span>{{$gs->site}}</span>
                                </a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="footer-bottom-wrap">
            <div class="container">
                <div class="row">
                    
                    @if($lang->rtl == 1)
                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <div class="footer-social-links">
                            <ul>
                            @if($sl->f_status == 1)
                            <li><a class="facebook" href="{{$sl->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            @endif
                            @if($sl->g_status == 1)
                            <li><a class="google" href="{{$sl->gplus}}">
                                <i class="fa fa-google"></i>
                            </a></li>
                            @endif
                            @if($sl->t_status == 1)
                            <li><a class="twitter" href="{{$sl->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            @endif
                            @if($sl->l_status == 1)
                            <li><a class="tumblr" href="{{$sl->linkedin}}">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <div class="footer-copyright-area">
                            {!!$gs->footer!!}
                        </div>
                    </div>
                    @else
                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <div class="footer-copyright-area">
                            {!!$gs->footer!!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <div class="footer-social-links">
                            <ul>
                            @if($sl->f_status == 1)
                            <li><a class="facebook" href="{{$sl->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            @endif
                            @if($sl->g_status == 1)
                            <li><a class="google" href="{{$sl->gplus}}">
                                <i class="fa fa-google"></i>
                            </a></li>
                            @endif
                            @if($sl->t_status == 1)
                            <li><a class="twitter" href="{{$sl->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            @endif
                            @if($sl->l_status == 1)
                            <li><a class="tumblr" href="{{$sl->linkedin}}">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </footer>
    <!-- Ending of footer area -->

    <!-- Starting of Product View Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        </div>
    </div>
  </div>
  <!-- Ending of Product View Modal -->

    <!-- Starting of Product View Modal -->
    <!-- Starting of Product View Modal -->
    <div class="modal fade" id="loginModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="margin-right:10px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body">
              <div class="row" style="margin: 15px;">
          <div class="login-tab">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#login1">{{$lang->signin}}</a></li>
              <li><a data-toggle="tab" href="#signup1">{{$lang->signup}}</a></li>
            </ul>
            
            <div class="tab-content">
              <div id="login1" class="tab-pane fade in active">
                <div class="login-title text-center">
                  <h3>{{$lang->signin}}</h3>
                </div>

                <div class="login-form">
                  <form action="{{route('user-login-submit')}}" method="POST">
                              {{csrf_field()}}

                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                      <label for="login_email">{{$lang->doeml}}</label>
            <input type="email" name="email" class="form-control" id="login_email" placeholder="{{$lang->doeml}}" required>
                    </div>
                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                      <label for="login_pwd">{{$lang->sup}}</label>
<input type="password" name="password" class="form-control" id="login_pwd" placeholder="{{$lang->sup}}" required>
                    </div>
                    <input type="hidden" name="wish" value="1">
                    <button type="submit" class="btn btn-default btn-block">{{$lang->sie}}</button>
                    @if($sl->fcheck == 1  || $sl->gcheck == 1)
                    <div class="login-social-btn-area">

                        @if($sl->fcheck ==1)
                      <a href="{{route('social-provider','facebook')}}" class="social-btn"><i class="fa fa-facebook"></i> <span>{{ $lang->facebook_login }}</span></a>
                        @endif
                        @if($sl->gcheck ==1)
                      <a href="{{route('social-provider','google')}}" class="social-btn last-child"><i class="fa fa-google"></i> <span>{{ $lang->google_login }}</span></a>
                        @endif
                    </div>
                    @endif
                  </form>
                </div>
              </div>
              <div id="signup1" class="tab-pane fade">
                <div class="login-title text-center">
                  <h3>{{$lang->signup}}</h3>
                </div>
                  @include('includes.form-error')
                <div class="login-form">
                  <form action="{{route('user-register-submit')}}" method="POST">
                      {{csrf_field()}}

                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_email">{{$lang->doeml}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doeml}}" type="email" name="email" id="reg_email" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_name">{{$lang->fname}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->fname}}" type="text" name="name" id="reg_name" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_Pnumber">{{$lang->doph}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doph}}" type="text" name="phone" id="reg_Pnumber" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_Padd">{{$lang->doad}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doad}}" type="text" name="address" id="reg_Padd" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_password">{{$lang->sup}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->sup}}" type="password" name="password" id="reg_password" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="confirm_password">{{$lang->sucp}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->sucp}}" type="password" name="password_confirmation" id="confirm_password" required>
                      </div>
                    <input type="hidden" name="wish" value="1">
                    <button type="submit" class="btn btn-default btn-block">{{$lang->spe}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>    
  
              </div>
          </div>
        </div>
    </div>
  </div>


    <!-- Starting of Product View Modal -->
    <div class="modal fade" id="vendorloginModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="margin-right:10px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body">
              <div class="row" style="margin: 15px;">
          <div class="login-tab">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#login111">{{$lang->signin}}</a></li>
              <li><a data-toggle="tab" href="#signup111">{{$lang->vendor_registration}}</a></li>
            </ul>
            
            <div class="tab-content">
              <div id="login111" class="tab-pane fade in active">
                <div class="login-title text-center">
                  <h3>{{$lang->signin}}</h3>
                </div>

                <div class="login-form">
                  <form action="{{route('user-login-submit')}}" method="POST">
                              {{csrf_field()}}

                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                      <label for="login_email11">{{$lang->doeml}}</label>
                        <input type="email" name="email" class="form-control" id="login_email11" placeholder="{{$lang->doeml}}" required>
                    </div>
                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                      <label for="login_pwd11">{{$lang->sup}}</label>
                        <input type="password" name="password" class="form-control" id="login_pwd11" placeholder="{{$lang->sup}}" required>
                    </div>
                    <input type="hidden" name="package" value="1">
                    <button type="submit" class="btn btn-default btn-block">{{$lang->sie}}</button>
                    @if($sl->fcheck == 1  || $sl->gcheck == 1)
                    <div class="login-social-btn-area">

                        @if($sl->fcheck ==1)
                      <a href="{{route('social-provider','facebook')}}" class="social-btn"><i class="fa fa-facebook"></i> <span>{{ $lang->facebook_login }}</span></a>
                        @endif
                        @if($sl->gcheck ==1)
                      <a href="{{route('social-provider','google')}}" class="social-btn last-child"><i class="fa fa-google"></i> <span>{{ $lang->google_login }}</span></a>
                        @endif
                    </div>
                    @endif
                  </form>

                </div>

              </div>
              <div id="signup111" class="tab-pane fade">
                <div class="login-title text-center">
                  <h3>{{$lang->vendor_registration}}</h3>
                </div>
                  @include('includes.form-error')
                <div class="login-form">
                  <form action="{{route('vendor.registration')}}" method="POST">
                      {{csrf_field()}}
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_email11">{{$lang->doeml}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doeml}}" type="email" name="email" id="reg_email11" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_name11">{{$lang->fname}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->fname}}" type="text" name="name" id="reg_name11" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_Pnumber11">{{$lang->doph}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doph}}" type="text" name="phone" id="reg_Pnumber11" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_Padd11">{{$lang->doad}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doad}}" type="text" name="address" id="reg_Padd11" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_password11">{{$lang->sup}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->sup}}" type="password" name="password" id="reg_password11" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="confirm_password11">{{$lang->sucp}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->sucp}}" type="password" name="password_confirmation" id="confirm_password11" required>
                      </div>
                    <input type="hidden" name="wish" value="1">
                    <button type="submit" class="btn btn-default btn-block">{{$lang->spe}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>    
  
              </div>
          </div>
        </div>
    </div>
  </div>


    <div class="modal vendor" id="emailModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button {!!$lang->rtl == 1 ? 'style="float: left;"' : ''!!} type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 {!!$lang->rtl == 1 ? 'dir="rtl"' : ''!!} class="modal-title" id="myModalLabel">{{$lang->contact_seller}}</h4>
          </div>
          <form id="emailreply1">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="subject" id="subj1" class="form-control" placeholder="{{$lang->vendor_subject}}" required="">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg1" class="form-control" rows="5" placeholder="{{$lang->vendor_message}}" required=""></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button {!!$lang->rtl == 1 ? 'style="float: right;"' : ''!!} type="submit" id="emlsub1" class="btn btn-default email-btn">{{$lang->vendor_send}}</button>
          </div>
           </form>
        </div>
      </div>
    </div>
                    @if(isset($vendor))
          @if(Auth::guard('user')->check())
    <!-- Starting of Product email Modal -->
    <div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" {!! $lang->rtl == 1 ? 'style="float: left;"':'' !!}><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel" {!! $lang->rtl == 1 ? 'dir="rtl"':'' !!}>{{$lang->new_message}}</h4>
          </div>
          <form id="emailreply"  method="POST">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="{{$lang->send_to}} {{$vendor->shop_name}}">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj" class="form-control" placeholder="{{$lang->vendor_subject}}">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg" class="form-control" rows="5" placeholder="{{$lang->vendor_message}}" required=""></textarea>
                </div>
                <input type="hidden" name="email" value="{{Auth::guard('user')->user()->email}}"> 
                <input type="hidden" name="name" value="{{Auth::guard('user')->user()->name}}">
                <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
                <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
          </div>
          <div class="modal-footer">
            <button type="submit" id="emlsub" class="btn btn-default email-btn" {!! $lang->rtl == 1 ? 'style="float: left;"':'' !!}>{{$lang->vendor_send}}</button>
          </div>
           </form>
        </div>
      </div>
    </div>
    @endif
    <!-- Ending of Product email Modal -->

@endif

    <!-- Starting of Scroll to Top Area -->
    <a href="#" class="scrollup">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!-- Ending of Scroll to Top Area -->

    <!-- jQuary Library -->
<script src="{{asset('assets/front/js/all.js')}}"></script>

    {!! $seo->google_analytics !!}

    <script type="text/javascript">
        $(".header-bottom-left-wrap").meanmenu({
            meanMenuClose: '<i class="fa fa-bars"></i>' +   ' {{ $lang->all_categories }} '    + '<i class="fa fa-times"></i>',
            meanMenuOpen: '<i class="fa fa-bars"></i>' +   ' {{ $lang->all_categories }} '    + '<i class="fa fa-angle-down"></i>', 
            meanMenuCloseSize: '14px',
            meanScreenWidth: '767', 
            meanExpandableChildren: true, 
            meanMenuContainer: '.mobileMenuActive', 
            onePage: true
        });
          $('[rel-toggle="tooltip"]').tooltip();
        @if($gs->is_loader == 1)
        setTimeout(function(){
            $('#cover').fadeOut(500);
        },1500)
        @endif
    </script>

                                    @if(Session::has('subscribe'))
                                    <script type="text/javascript">
                                        $.notify("{{ Session::get('subscribe') }}","success");
                                        
                                    </script>
                                    @endif
                                    @foreach($errors->all() as $error)
                                    <script type="text/javascript">
                                        $.notify("{{$error}}","error");
                                        
                                    </script>                                        
                                    @endforeach


 <script type="text/javascript">
     $(".ss").keyup(function() {
        var search = $(this).val();
        if(search == ""){
            $(".header-searched-item-list-wrap").hide();
        }
        else {
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/suggest')}}",
                    data:{search:search},
                    success:function(data){
                        if(!$.isEmptyObject(data))
                        {
                        $(".header-searched-item-list-wrap").show();
                        $(".header-searched-item-list-wrap ul").html("");
                        var arr = $.map(data, function(el) {
                        return el });
                            for(var k in arr)
                            {
                                var x = arr[k]['name'];
                                var p = x.length  > 50 ? x.substring(0,50)+'...' : x;
                                $(".header-searched-item-list-wrap ul").append('<li><a href="{{url('/')}}/product/'+arr[k]['id']+'/'+arr[k]['name']+'">'+p+'</a></li>');
                            }
                        }
                        else{
                            $(".header-searched-item-list-wrap").hide();
                        }
                        }
                  }) 
            
        }
     });
 </script>                                     

<script type="text/javascript">
    function remove(id) {
        $("#del"+id).hide();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/removecart')}}",
                    data:{id:id},
                    success:function(data){
                        $(".empty").html("");
                        $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                        $(".cart-quantity").html(data[2]);
                        $(".cart").html("");
                        if(data[1] == null)
                        {
                            $(".total").html("0.00");
                            $(".cart-quantity").html("0");
                            $(".empty").html("{{$lang->h}}");
                        }

                        var arr = $.map(data[1], function(el) {
                        return el });
                        for(var k in arr)
                        {
                            var x = arr[k]['item']['name'];
                            var p = x.length  > 45 ? x.substring(0,45)+'...' : x;
                            var measure = arr[k]['item']['measure'] != null ? arr[k]['item']['measure'] : "";
                            $(".cart").append(
                            '<div class="single-myCart">'+
            '<p class="cart-close" onclick="remove('+arr[k]['item']['id']+')"><i class="fa fa-close"></i></p>'+
                            '<div class="cart-img">'+
                    '<img src="{{ asset('assets/images/') }}/'+arr[k]['item']['photo']+'" alt="Product image">'+
                            '</div>'+
                            '<div class="cart-info">'+
        '<a href="{{url('/')}}/product/'+arr[k]['item']['id']+'/'+arr[k]['item']['name']+'" style="color: black; padding: 0 0;">'+'<h5>'+p+'</h5></a>'+
                        '<p>{{$lang->cquantity}}: '+arr[k]['qty']+' '+measure+'</p>'+
                        @if($gs->sign == 0)
                        '<p>{{$curr->sign}}'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'</p>'+
                        @else
                        '<p>'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'{{$curr->sign}}</p>'+
                        @endif
                        '</div>'+
                        '</div>');
                        }                            
                                                    
                      }
              }); 

    }
</script>

    <script type="text/javascript">
    $(document).on("click", ".wish-listt" , function(){
        var max = '';
        var pid = $(this).parent().find('input[type=hidden]').val();
        $("#myModal .modal-content").html('');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/quick')}}",
                    data:{id:pid},
                    success:function(data){
                        $("#myModal .modal-content").append(''+
                            '<div class="modal-header">'+
                            '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '<div class="row">'+
                            '<div class="col-md-3 col-sm-12">'+
                            '<div class="product-review-details-img">'+
                '<img src="{{asset('assets/images/')}}/'+data[0]+'" alt="Product image">'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-md-9 col-sm-12">'+
                            '<div class="product-review-details-description">'+
                            '<h3>'+data[1]+'</h3>'+
                            '<p class="modal-product-review">'+
                            '<i class="fa fa-star"></i>'+
                            '</p>'+
                            '<div class="product-price">'+
                            '<div class="single-product-price">'+
                             @if($gs->sign == 0)
                            '{{$curr->sign}}'+data[2]+' <span>{{$curr->sign}}'+data[3]+'</span> '+
                            @else
                            ''+data[2]+'{{$curr->sign}} <span>'+data[3]+'{{$curr->sign}}</span> '+
                            @endif
                            '</div>'+
                            '<div class="product-availability">'+
   
                            '</div>'+
                            ' </div>'+
                            '<div class="product-review-description">'+
                            '<h4>{{$lang->dol}}</h4>'+
                            '<p style="text-align:justify;">'+data[4]+'</p>'+
                            '</div>'+
                            '<div class="product-size">'+
                            '</div>'+
                            '<div class="product-color">'+
                            '</div>'+
                            '<div class="product-quantity">'+
                            '</div>'+
                            '</div>'+   
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                            '</div>');

                            if(data[5] == "0")
                            {
                                if(data[9] == 0)
                                {
                                     $(".product-availability").append(''+
                                    '{{$lang->availability}} '+
                                    '<span style="color:red;">'+
                                    '<i class="fa fa-times-circle-o"></i> '+
                                    '{{$lang->dni}}'+
                                    '</span>'
                                    );                                   
                                }

                            }
                            else
                            {
                                max = data[5] == 'null' ? '': data[5];
                                if(data[9] == 0)
                                {
                                    $(".product-availability").append(''+
                                    '{{$lang->availability}} '+
                                    '<span style="color:green;">'+
                                    '<i class="fa fa-check-square-o"></i> '+
                                    '{{$lang->sbg}}'+
                                    '</span>'
                                    );                                    
                                }
                                $(".product-quantity").append(''+
                                '<form>  <label>{{$lang->dopd}} &nbsp;</label>'+
                    '<input type="number" id="mqty" class="qty" min="1" max="'+max+'" value="1" style="width: 40px;">'+
                                '</form>'+   
                                '<input type="hidden" id="mid" value="'+data[7]+'">'+
                                '<a style="cursor: pointer;" class="addToCart-btn" id="maddcart">{{$lang->hcs}}</a>'
                                );
                            
                            }
                            if(data[6] != null)
                            {
                            $(".product-size").append(
                            '<p>{{$lang->doo}}</p>'
                            );
                            for(var size in data[6])
                            $(".product-size").append(
                            '<span style="cursor:pointer;" class="msize">'+data[6][size]+'</span> '
                            );
                            }
                            if(data[8] != null)
                            {
                            $(".product-color").append(
                            '<p>{{$lang->colors}}</p>'
                            );
                            for(var color in data[8])
                            $(".product-color").append(
                            '<span style="cursor:pointer; background:'+data[8][color]+'" class="mcolor">'+data[8][color]+'</span> '
                            );
                            }                                      
                        }

                      });
        return false;
    });
    </script>
<script>
    $(document).on("click", ".addcart" , function(){
        var pid = $(this).parent().find('input[type=hidden]').val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/addcart')}}",
                    data:{id:pid},
                    success:function(data){
                        if(data == 0)
                        {
                        $.notify("{{$gs->cart_error}}","error");
                        }
                        else
                        {
                        $(".empty").html("");
                        $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                        $(".cart-quantity").html(data[2]);
                        var arr = $.map(data[1], function(el) {
                        return el });
                        $(".cart").html("");
                        for(var k in arr)
                        {
                            var x = arr[k]['item']['name'];
                            var p = x.length  > 45 ? x.substring(0,45)+'...' : x;
                            var measure = arr[k]['item']['measure'] != null ? arr[k]['item']['measure'] : "";
                            $(".cart").append(
                            '<div class="single-myCart">'+
            '<p class="cart-close" onclick="remove('+arr[k]['item']['id']+')"><i class="fa fa-close"></i></p>'+
                            '<div class="cart-img">'+
                    '<img src="{{ asset('assets/images/') }}/'+arr[k]['item']['photo']+'" alt="Product image">'+
                            '</div>'+
                            '<div class="cart-info">'+
        '<a href="{{url('/')}}/product/'+arr[k]['item']['id']+'/'+arr[k]['item']['name']+'" style="color: black; padding: 0 0;">'+'<h5>'+p+'</h5></a>'+
                        '<p>{{$lang->cquantity}}: '+arr[k]['qty']+' '+measure+'</p>'+
                        @if($gs->sign == 0)
                        '<p>{{$curr->sign}}'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'</p>'+
                        @else
                        '<p>'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'{{$curr->sign}}</p>'+
                        @endif
                        '</div>'+
                        '</div>');
                          }
                        $.notify("{{$gs->cart_success}}","success");
                        }
                      }
              }); 
        return false;
    });
    </script>
    <script>
    $(document).on("click", ".removecart" , function(e){
        $(".addToMycart").show();
    });
    </script>
    <script>
    var size = "";
    var colorss = "";
    $(document).on("click", ".msize" , function(){
     $('.msize').removeClass('mselected-size');
     $(this).addClass('mselected-size');
     size = $(this).html();
  });

    $(document).on("click", ".mcolor" , function(){
     $('.mcolor').removeClass('mselected-color');
     $(this).addClass('mselected-color');
     colorss = $(this).html();
  });
     $(document).on("click", "#maddcart" , function(){
        var qty = $("#mqty").val();
        if(qty < 1)
        {
            $.notify("{{$gs->invalid}}","error");
        }
        else
        {
        var pid = $("#mid").val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/addnumcart')}}",
                    data:{id:pid,qty:qty,size:size,color:colorss},
                    success:function(data){
                        if(data == 0)
                        {
                        $.notify("{{$gs->cart_error}}","error");
                        }
                        else{
                        $(".empty").html("");
                        $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                        $(".cart-quantity").html(data[2]);
                        var arr = $.map(data[1], function(el) {
                        return el });
                        $(".cart").html("");
                        for(var k in arr)
                        {
                            var x = arr[k]['item']['name'];
                            var p = x.length  > 45 ? x.substring(0,45)+'...' : x;
                            var measure = arr[k]['item']['measure'] != null ? arr[k]['item']['measure'] : "";
                            $(".cart").append(
                             '<div class="single-myCart">'+
            '<p class="cart-close" onclick="remove('+arr[k]['item']['id']+')"><i class="fa fa-close"></i></p>'+
                            '<div class="cart-img">'+
                    '<img src="{{ asset('assets/images/') }}/'+arr[k]['item']['photo']+'" alt="Product image">'+
                            '</div>'+
                            '<div class="cart-info">'+
        '<a href="{{url('/')}}/product/'+arr[k]['item']['id']+'/'+arr[k]['item']['name']+'" style="color: black; padding: 0 0;">'+'<h5>'+p+'</h5></a>'+
                        '<p>{{$lang->cquantity}}: '+arr[k]['qty']+' '+measure+'</p>'+
                        @if($gs->sign == 0)
                        '<p>{{$curr->sign}}'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'</p>'+
                        @else
                        '<p>'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'{{$curr->sign}}</p>'+
                        @endif
                        '</div>'+
                        '</div>');
                          }
                        $.notify("{{$gs->cart_success}}","success");
                        $("#mqty").val("1");
                        }
                      }
              }); 
        }
     });
    </script>
    <script>
        $(document).on("click", ".lwish" , function(){
            var pid = $(this).parent().find('input[type=hidden]').val();
            window.location = "{{url('user/wishlist/product/')}}/"+pid;
            return false;
        });
    </script>


    <script>
        $(document).on("click", ".uwish" , function(){
            var pid = $(this).parent().find('input[type=hidden]').val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/wish')}}",
                    data:{id:pid},
                    success:function(data){
                        if(data == 1)
                        {
                            $.notify("{{$gs->wish_success}}","success");
                        }
                        else {
                            $.notify("{{$gs->wish_error}}","error");
                        }
                      }
              }); 

            return false;
        });
    </script>

    <script>
        $(document).on("click", ".compare" , function(){
        var pid = $(this).parent().find('input[type=hidden]').val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/compare')}}",
                    data:{id:pid},
                    success:function(data){
                        if(data[0] == 0)
                        {
                            $('.compare-quantity').html(data[1]);
                            $.notify("{{$gs->compare_success}}","success");
                        }
                        else {
                            $.notify("{{$gs->compare_error}}","error");
                        }
                      }
              }); 
        return false;
        });
        $(document).on("click", ".compare-remove" , function(){
            var id = $(this).parent().find('input[type=hidden]').val();
            $(this).parent().parent().hide('slow');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/removecompare')}}",
                    data:{id:id},
                    success:function(data){
                            $.notify("{{$gs->compare_remove}}","success");
                            $('.compare-quantity').html(data[1]);
                        if(data[0] == 1)
                        {
            $('.container-fluid').html('<h2 class="text-center">NO PRODUCTS TO COMPARE.</h2>')
                        }
                    }
                });
        });
        $(document).on("click", ".clear-btn" , function(){
            $('.compare-content-wrap').hide('slow');
            $('.container-fluid').html('<h2 class="text-center">NO PRODUCTS TO COMPARE.</h2>');
            $('.compare-quantity').html('0');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/clearcompare')}}",
                });
            return false;
        });
        $(document).on("click", ".no-wish" , function(){
        return false;
        });
    $(document).on("click", "#product_email" , function(){
        $(".modal-backdrop, .modal.vendor").css('background-color','rgba(0,0,0,0)');
    });
    </script>
<script type="text/javascript">
          $(document).on("submit", "#emailreply" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var email = $(this).find('input[name=email]').val();
          var name = $(this).find('input[name=name]').val();
          var user_id = $(this).find('input[name=user_id]').val();
          var vendor_id = $(this).find('input[name=vendor_id]').val();
          $('#subj').prop('disabled', true);
          $('#msg').prop('disabled', true);
          $('#emlsub').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/vendor/contact')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'email'   : email,
                'name'  : name,
                'user_id'   : user_id,
                'vendor_id'  : vendor_id
                  },
            success: function() {
          $('#subj').prop('disabled', false);
          $('#msg').prop('disabled', false);
          $('#subj').val('');
          $('#msg').val('');
        $('#emlsub').prop('disabled', false);
        $.notify("Message Sent !!","success");
        $('.ti-close').click();
            }
        });          
          return false;
        });
</script>

<script type="text/javascript">
    
          $(document).on("submit", "#emailreply1" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          $('#subj1').prop('disabled', true);
          $('#msg1').prop('disabled', true);
          $('#emlsub1').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/user/admin/user/send/message')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                  },
            success: function( data) {
                console.log(data);
          $('#subj1').prop('disabled', false);
          $('#msg1').prop('disabled', false);
          $('#subj1').val('');
          $('#msg1').val('');
        $('#emlsub1').prop('disabled', false);
        if(data == 0)
        $.notify("Oops Something Goes Wrong !!","error");
        else
        $.notify("Message Sent !!","success");
        $('.ti-close').click();
            }

        });          
          return false;
        });

</script>

    @if($gs->is_talkto == 1)
        <!--Start of Tawk.to Script-->
        {!! $gs->talkto !!}
        <!--End of Tawk.to Script-->
    @endif

    @yield('scripts')

</body>
</html>
