<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
        @else
        <meta name="keywords" content="{{ $seo->meta_keys }}">
        @endif 
        <meta name="author" content="ItPlanet">
        <link rel="stylesheet" href="">
        <title>{{$gs->title}}</title>
        <link href="{{asset('assets/user/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/user/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/user/css/themify-icon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/user/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/user/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
        <link href="{{asset('assets/user/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/user/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
        <!-- due to tab dropdown -->
        <!-- <link href="{{asset('assets/user/css/style.css')}}" rel="stylesheet"> -->
        <link href="{{asset('assets/user/css/responsive.css')}}" rel="stylesheet">
<!--         <link href="{{asset('assets/mega/css/bootsnav.css')}}" rel="stylesheet">
        <link href="{{asset('assets/mega/css/modern-megamenu.css')}}" rel="stylesheet">
        <link href="{{asset('assets/mega/css/modern-megamenu-responsive.css')}}" rel="stylesheet"> -->
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">
        <!-- Font Awesome CSS -->
        <!-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        </style> -->
        <!-- <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
</style> -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
</style>
        <link rel="stylesheet" href="{{asset('assets/front/css/all.css')}}">
        
        @include('styles.design')
        @yield('styles')
        <style type="text/css">
        .navbar .dropdown-menu div[class*="col"] {
        margin-bottom:1rem;
        }
        .navbar .dropdown-menu {
        border-top:3px solid #E7AB3C !important;
        background-color:#F5F5F5 !important;
        }
        
        
        /* remove the padding from the navbar so the dropdown hover state is not broken */
        .navbar {
        padding-top:0px;
        }
        .navbar {
        padding-top:20px;
        }
        /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
        .navbar .nav-item {
        padding:.4rem .5rem;
        margin:0 .90rem;
        font-size: 15px;
        font-weight: 600;
        }
        @media(max-width: 1050px){
         .navbar .nav-item {
        padding:.2rem .3rem;
        margin:0 .50rem;
        font-size: 8px;
        }   
        }
        .navbar .nav-item .nav-link{
        color: #e7ab3c;
        }
        .navbar .dropdown {position:static;}
        .navbar .dropdown-menu {
        width: 100%;
        top:65px;
        display:block;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.3s linear;
        }
        /* shows the dropdown menu on hover */
        .navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
        display:block;
        visibility: visible;
        opacity: 1;
        /*   transition: visibility 0s, opacity 2s fadeIn; */
        animation: fadeIn 1s ease-in both;
        }
        @keyframes fadeIn {
        from {
        opacity: 0;
        transform: translate3d(0, -20%, 0);
        }
        to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        }
        }
        .navbar .dropdown-menu {
        border: 1px solid rgba(0,0,0,.15);
        background-color: #fff;
        }
        #navlink2{
        color: white;
        }
        #navlink2:hover{
        color: #e7ab3c;
        }
        
        </style>
        <style type="text/css">
        .home-service-wrapper {
        box-shadow: 0 0 5px #fff;
        }
        </style>
        
        
        
    </head>
    <body>
        @if($gs->is_loader == 1)
        <div id="cover"></div>
        @endif
        @if($gs->is_subscribe == 1)
        @if(isset($visited))
        <div style="display:none">
            <img src="{{asset('assets/images/'.$gs->subscribe_image)}}">
        </div>
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
        <!-- mbl header new -->
        <div class="container-fluid smallscreen-index" style="margin-top: 5px;">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-4">
                    @if($gs->reg_vendor == 1)
                    <span class="btn btn-block newtopnew-btn">
                        @if(Auth::guard('customer')->check())
                        <a  href="{{route('customer-dashboard')}}">{{$lang->sale}}</a>
                        @else
                        <a style="cursor: pointer;color: white !important;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
                        @endif
                    </span>
                    @endif
                </div>
                                <div class="col-md-3 col-sm-4 col-xs-4 text-center">
                    <a href="{{route('comingsoon')}}"><img src="{{asset('assets/images/'.$gs->gif)}}" style="width: 100%;" alt=""></a>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4">
                    <span class="btn btn-block newtopnew-btn">
                        <a style="cursor: pointer;color: white !important;" href="{{route('frenchise-frenchise-login')}}">Franchise</a>
                        <!-- <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal"> -->
                    </span>
                </div>
                <div class="col-md-12 col-sm-3 col-xs-3">
                    <a href="{{route('front.index')}}">
                        <img src="{{asset('assets/img/png animated logo/oie_trans.gif')}}" class="newtopnew-logo" alt="logo">
                    </a>
                </div>
                <div class="col-md-12 col-sm-9 col-xs-9">
                    <div class="header-middle-right-wrap ">
                        <ul style="float: right;">
                            <li>
                                <a href="{{route('front.compare')}}" style="cursor: pointer;" class="no-wish"><img src="{{ asset('assets/images/fav_icon copy.png') }}"  style="height: 13px;"/> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span></a>
                            </li>
                            
                            <li>
                                
                                @if(Auth::guard('customer')->check())
                                
                                <a href="{{route('customer-wishlists')}}"><i class="fa fa-heart"></i></a>
                                @else
                                
                                <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal"><img src="{{ asset('assets/images/fav_icon.png') }}" style="height: 13px;"/></a>
                                @endif
                            </li>
                            <li class="myCart"><a href="javascript:void(0)"> <img src="{{ asset('assets/images/cart_icon.png') }}" style="height: 13px;"/> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
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
                                    <a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
                                    @if(Auth::guard('customer')->check())
                                    <a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
                                    @else
                                    <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        
                        <li class="myCart1"><a href="javascript:void(0)"> <img src="{{ asset('assets/images/cart_icon.png') }}" style="height: 13px;"/></a> <span class="cart-quantity1">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
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
                                <a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
                                @if(Auth::guard('customer')->check())
                                <a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
                                @else
                                <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li>
                        @if(Auth::guard('customer')->check())
                        <a style="text-transform: uppercase" href="{{route('customer-dashboard')}}">
                            <img src="{{ asset('assets/images/user_icon.png') }}" style="height: 13px;"/> <span>{{$lang->fh}}</span>
                        </a>
                        @else
                        <a style="text-transform: uppercase" href="{{route('customer-login')}}">
                            <img src="{{ asset('assets/images/user_icon.png') }}" style="height: 13px;"/>
                        </a>
                        @endif
                    </li>
                    <!--<li class="circle-li"><a href="{{route('front.compare')}}"><i class="fa fa-exchange"></i></a> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>-->
                    <!--</li>-->
                    @if($gs->reg_vendor == 1)
                    <!--                        <li class="sell-btn">-->
                    <!--@if(Auth::guard('customer')->check())-->
                    <!--<a href="{{route('customer-dashboard')}}">{{$lang->sale}}</a>-->
                    <!--@else-->
                    <!--<a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>-->
                    <!--@endif-->
                    <!--                        </li>-->
                    @endif
                    <li class="mobile-search"><a href="javascript:void(0)"><i class="fa fa-search" style="font-size: 12px;"></i></a></li>
                </ul>
            </div>
        </div>
        
    </div>
</div>

<div class="container-fluid smallscreen-index" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-sm-10 col-xs-10">
             <div class="header-bottom-left-wrap ">
                <h5><i class="fa fa-bars"></i> Shop by Category <i class="fa fa-angle-down"></i></h5>
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
                        
                        <li><a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{ $subcategory->sub_name}} <i class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-right' : ''}}"></i></a>
                        @if(count($subcategory->childs) > 0)
                        <ul>
                            <li>{{$subcategory->sub_name}}</li>
                            @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                            <li><a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{ $childcategory->child_name }}</a></li>
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
    <div class="mobileMenuActive"></div>
        </div>
        <div class="col-sm-2 col-xs-2 text-right" style="padding-top: 8px;">
            <div class="dropdown ">
                <button class="dropbtn btn-block "><i class="fa fa-bars"></i></button>
                <div class="dropdown-content">
                    <ul>
                        <li><a class="scndlinkdrp" href="{{route('front.index')}}"><i class="fa fa-home"></i> &nbsp Home</a></li>
                        <li><a class="scndlinkdrp" href="{{route('top-shops',['slug' =>'top shops'])}}"><i class="fa fa-shopping-bag"></i> &nbsp Shop</a></li>
                        <li><a class="scndlinkdrp" href="{{route('front.brand',['slug' =>'all brand'])}}"><i class="fa fa-tag"></i> &nbsp Brands</a></li>
                        <li><a class="scndlinkdrp" href=""><i class="fa fa-birthday-cake"></i> &nbsp Festivals</a></li>
                        <li><a class="scndlinkdrp" href="{{route('front.category',['slug'=>'groceries'])}}"><i class="fa fa-shopping-basket"></i> &nbsp Grocery</a></li>
                        <li><a class="scndlinkdrp" href="{{route('front.pages',['id'=>'about'])}}"><i class="fa fa-info-circle"></i> &nbsp About</a></li>
                        <li><a class="scndlinkdrp" href="{{route('advancesearch')}}"><i class="fa fa-search"></i> &nbsp Advance Search</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid smallscreen-index" style="margin-bottom: 5px;">
    <div class="row">
        <div class="col-sm-4 col-xs-4">
            <select class="mblselecou" name="" id="">
                <option class="oopuyt" value="">Country</option>
                <option class="oopuyt" value="">Pakistan</option>
                <option class="oopuyt" value="">India</option>
                <option class="oopuyt" value="">Turkey</option>
            </select>
        </div>
        <div class="col-sm-4 col-xs-4">
            <select class="mblselecou" name="" id="">
                <option style="" value="">Province</option>
            </select>
        </div>
        <div class="col-sm-4  col-xs-4">
            <select class="mblselecou" name="" id="">
                <option value="">City</option>
            </select>
        </div>
    </div>
</div> 
</div>
</div>
<div class="col-lg-12">
<div class="header-search-box mobile">
<div class="search-close">
    <i class="fa fa-times"></i>
</div>
<form action="{{route('front.search')}}" method="GET">
    <input type="text" class="ss"  name="product" placeholder="{{$lang->ec}}" required>
    <button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
</div>
<!--  Starting of header area   -->
<header class="header-wrap bigscreen-index">
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
        <li><a><i class="fa fa-user-secret "></i>NTN:8360621-8</a></li>
    </ul>
</div>
</div>
</div>
@else
<div class="row">
<div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
<div class="header-top-left-wrap">
    <ul>
        @if($gs->email != null)
        <li id="front-top-mail"><a style="padding-left: 0;"><i class="fa fa-envelope"></i> {{$gs->email}}</a></li>
        @endif
        @if($gs->phone != null)
        <li><a><i class="fa fa-phone"></i> {{$gs->phone}}</a></li>
        @endif
        <li><a><i class="fa fa-user-secret "></i>NTN:8360621-8</a></li>
    </ul>
</div>
</div>
<div class="col-lg-6 col-md-7 col-sm-7 col-xs-12 text-right">
<a href="{{route('comingsoon')}}"><img src="{{asset('assets/images/'.$gs->gif)}}" class="comingsoongif" alt=""></a>
 
<span class="sell-btn">

    <a style="cursor: pointer;" href="{{route('user-login')}}">Buyer</a>
    
</span>
@if($gs->reg_vendor == 1)
<span class="sell-btn">
    @if(Auth::guard('customer')->check())
    <a href="{{route('customer-dashboard')}}">{{$lang->sale}}</a>
    @else
    <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
    @endif
</span>
@endif
<span class="sell-btn">
    <a href="{{route('frenchise-frenchise-login')}}">Franchise</a>
    <!-- <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal"> -->
</span>
</div>
</div>
@endif
</div>
</div>
<div class="header-middle-area bigscreen-index">
<div class="container">
<div class="row">
@if($lang->rtl == 1)
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
<div class="header-middle-right-wrap text-left">
    <ul>
        <li class="myCart"><a href="{{route('front.compare')}}"> <img src="{{ asset('assets/images/fav_icon copy.png') }}" class="mycarttypeicons" /> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>
                            </a></li>
        <li>
            @if(Auth::guard('customer')->check())
            <a href="{{route('customer-wishlists')}}"><span>{{$lang->wishlists}}</span> <i class="fa fa-heart"></i></a>
            @else
            <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal"><span>{{$lang->wishlists}}</span> <img src="{{ asset('assets/images/fav_icon.png') }}" class="mycarttypeicons" /></a>
            @endif
        </li>
        <li>
            @if(Auth::guard('customer')->check())
            <a style="text-transform: uppercase" href="{{route('customer-dashboard')}}">
                <img src="{{ asset('assets/images/user_icon.png') }}" class="mycarttypeicons" />
            </a>
            @else
            <a style="text-transform: uppercase" href="{{route('user-login')}}">
                <img src="{{ asset('assets/images/user_icon.png') }}" class="mycarttypeicons"/>
            </a>
            @endif
        </li>
        <li class="myCart"><a href="javascript:void(0)"> <img src="{{ asset('assets/images/cart_icon.png') }}" class="mycarttypeicons"/></a> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
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
                <a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
                @if(Auth::guard('customer')->check())
                <a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
                @else
                <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
                @endif
            </div>
        </div>
    </li>
    <li>
        @if(Auth::guard('customer')->check())
        <a style="text-transform: uppercase" href="{{route('customer-dashboard')}}">
            <img src="{{ asset('assets/images/user_icon.png') }}" class="mycarttypeicons"/>
        </a>
        @else
        <a style="text-transform: uppercase" href="{{route('user-login')}}">
            <img src="{{ asset('assets/images/user_icon.png') }}" class="mycarttypeicons" />
        </a>
        @endif
    </li>
    <li class="myCart"><a href="javascript:void(0)"> <img src="{{ asset('assets/images/cart_icon.png') }}" class="mycarttypeicons" /></a> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
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
            <a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
            @if(Auth::guard('customer')->check())
            <a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
            @else
            <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
            @endif
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
        <a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
        @if(Auth::guard('customer')->check())
        <a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
        @else
        <a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
        @endif
    </div>
</div>
</li>
<li class="circle-li"><a href="{{route('front.compare')}}"><i class="fa fa-exchange"></i></a> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>
</li>
@if($gs->reg_vendor == 1)
<li class="sell-btn">
@if(Auth::guard('customer')->check())
<a href="{{route('customer-dashboard')}}">{{$lang->sale}}</a>
@else
<a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
@endif
</li>
@endif
<li class="mobile-search"><a href="javascript:void(0)"><i class="fa fa-search"></i></a></li>
</ul>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<div class="header-middle-left-wrap">
<div class="logo">
<a href="{{route('front.index')}}">
<img style="float: left;" src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
</a>
@if($gs->reg_vendor == 1)
<span class="sell-btn">
@if(Auth::guard('customer')->check())
<a href="{{route('customer-dashboard')}}">{{$lang->sale}}</a>
@else
<a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>
@endif
</span>
@endif
</div>
</div>
</div>
@else
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<div class="header-middle-left-wrap">
<div class="logo">
<a href="{{route('front.index')}}">
<img  src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
</a>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<div class="header-middle-right-wrap text-right">
<ul>
    <li class="myCart"><a href="{{route('front.compare')}}"> <img src="{{ asset('assets/images/fav_icon copy.png') }}" class="mycarttypeicons"/> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>
                            </a></li>
<li>
@if(Auth::guard('customer')->check())
<a href="{{route('customer-wishlists')}}"><i class="fa fa-heart"></i></a>
@else
<a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal"><img src="{{ asset('assets/images/fav_icon.png') }}" class="mycarttypeicons"/></a>
@endif
</li>
<li class="myCart"><a href="javascript:void(0)"> <img src="{{ asset('assets/images/cart_icon.png') }}" class="mycarttypeicons"/> <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
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
<a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
@if(Auth::guard('customer')->check())
<a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
@else
<a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
@endif
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
<a href="{{route('front.cart')}}" class="">{{$lang->vdn}}</a>
@if(Auth::guard('customer')->check())
<a href="{{route('front.checkout')}}" class="">{{$lang->gt}}</a>
@else
<a style="cursor: pointer;" class="no-wish" data-toggle="modal" data-target="#loginModal">{{$lang->gt}}</a>
@endif
</div>
</div>
</li>
<li>
@if(Auth::guard('customer')->check())
<a style="text-transform: uppercase" href="{{route('customer-dashboard')}}">
<img src="{{ asset('assets/images/user_icon.png') }}" class="mycarttypeicons"/> <span style="font-size: 10px;">{{$lang->fh}}</span>
</a>
@else
<a style="text-transform: uppercase" href="{{route('user-login')}}">
<img src="{{ asset('assets/images/user_icon.png') }}" class="mycarttypeicons"/>
</a>
@endif
</li>
<!--<li class="circle-li"><a href="{{route('front.compare')}}"><i class="fa fa-exchange"></i></a> <span class="compare-quantity">{{ Session::has('compare') ? count(Session::get('compare')->items) : '0' }}</span>-->
<!--</li>-->
@if($gs->reg_vendor == 1)
<!--                        <li class="sell-btn">-->
<!--@if(Auth::guard('customer')->check())-->
<!--<a href="{{route('customer-dashboard')}}">{{$lang->sale}}</a>-->
<!--@else-->
<!--<a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal">{{$lang->sale}}</a>-->
<!--@endif-->
<!--                        </li>-->
@endif
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
<div class="container-fluid">
<div class="row no-gutters">
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
 
<div class="mobileSlickMenuActive"></div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
<div class="header-bottom-left-wrap">
@else
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
<div class="header-bottom-left-wrap">
<h5 style="color:#E7AB3C;"><i class="fa fa-map-marker"></i>&nbsp Countries<i class="fa fa-angle-down"></i></h5>
<ul style="margin-top: 18px;">
<li><a href="{{route('countrieslist',['slug'=>'pakistan'])}}">
<img style="height: 20px;width: 20px;margin-top: -2px;" src="{{asset('assets/download.jpg')}}" alt="">Pakistan
<i class="fa fa-angle-right"></i>
</a>

<ul>
<li>Pakistan</li>
<li><a href="{{route('provinceslist',['slug'=>'punjab'])}}">Punjab<i class="fa fa-angle-right"></i></a>
<ul>
<li>Punjab</li> 
<li><a href="{{route('citieslist',['slug'=>'faisalabad'])}}">Faisalabad</a></li>
</ul>
</li>
</ul>
</li>
</ul>
</div>
</div>
<div class="mobileMenuActive"></div>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
<div class="header-bottom-left-wrap">
<h5 style="color:#E7AB3C;"><i class="fa fa-bars"></i>Categories <i class="fa fa-angle-down"></i></h5>
<ul style="margin-top: 18px;">
@foreach($categories as $category)
<li><a href="{{route('front.category',$category->cat_slug)}}">
@if($category->photo != null)
<img style="height: 20px;width: 20px;margin-top: -7px;" src="{{asset('assets/images/'.$category->photo)}}" alt="">
@else
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endif
{{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-right':''}}"></i>
</a>
@if(count($category->subs) > 0)
<ul>
<li>{{ $category->cat_name }}</li>
@foreach($category->subs()->where('status','=',1)->get() as $subcategory)
<li><a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{ $subcategory->sub_name}} <i class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-right' : ''}}"></i></a>
@if(count($subcategory->childs) > 0)
<ul>
<li>{{$subcategory->sub_name}}</li>
@foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
<li><a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{ $childcategory->child_name }}</a></li>
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

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
<!-- <div class="header-menu-wrap">
<ul>
<li><a href="http://127.0.0.1:8000/category/womens-fashion">Brands</a>
<ul>
<li>
<div class="row"></div>
</li>
</ul>
</li>
<li><a href="http://127.0.0.1:8000/category/womens-fashion">Women's Fashion</a></li>
<li><a href="http://127.0.0.1:8000/category/electronic-devices">Electronics</a></li>
<li><a href="http://127.0.0.1:8000/category/watches-jewellery">Watches & Jewellery</a></li>
</ul>
</div> -->
<nav class="navbar navbar-expand-lg ">
<!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
-->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link"   href="{{route('front.index')}}"><i  class="fa fa-home navbarhomwn"></i></a>
</li>
<li class="nav-item dropdown">
<a class="nav-link" href="#" >
<i class="fa fa-shopping-bag" style="font-size: 12px;"></i>&nbspShops &nbsp <i class="fa fa-angle-down"></i>
</a>
<div class="dropdown-menu " aria-labelledby="navbarDropdown">
<div class="container-fluid">
<div class="row">
<div style="width: 100%;background-color: #E7AB3C;padding-top: 15px;padding-bottom: 15px;" class="col-lg-12 col-md-12 text-center">
<span style="color: rgba(255,255,255,0.5);font-size: 20px;"  class="text-uppercase font-weight-bolder"><a class="alltopshopsanchornav" href="{{route('top-shops',['slug' =>'top shops'])}}"> All Top Shops</a></span> 
</div>
<!-- all top shops on nave bar start-->
@foreach($nav_shop as $brand)
<div class="col-md-2 imgshopoverly">
<a  href="{{route('front.vendor',str_replace(' ', '-',($brand->shop_name)))}}">
<img src="{{asset('assets/images/'.$brand->logo)}}" style="width: 100%;height: 160px;"  alt="" class="img-fluid">
<div class="text-center shopoverly">
<p class="overlypshop">{{$brand->shop_name}}</p>
<!-- <i class="fa fa-link shopoverlylinkfa"></i> -->
<img src="{{asset('assets/images/'.$brand->logo)}}" class="shopoverlyimgnew" alt="">
<h6 style="color:white;">{{count($brand->products()->get())}} products</h6> 

<div class="ratings"> 
 <div><p class="productDetails-reviews">
<div class="ratings" style="margin-top: -30px !important;" dir="ltr">
    <div class="empty-stars"></div>
    <div class="full-stars" style="width:{{$brand->shopratings($brand->id)}}%"></div>
</div>
</div>
</div>
</div>
</p> 
</a>
</div>
@endforeach
<!-- all top shops on nave bar start-->
<!-- /.col-md-4  -->
</div>
</div>
<!--  /.container  -->
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link" href="#" >
<i class="fa fa-tag " style="font-size: 12px;"></i>&nbsp
Brands&nbsp <i class="fa fa-angle-down"></i>
</a>
<div class="dropdown-menu " aria-labelledby="navbarDropdown">
<div class="container-fluid">
<div class="row">
<div style="width: 100%;background-color: #E7AB3C;padding-top: 15px;padding-bottom: 15px;" class="col-lg-12 col-md-12 text-center">
<span style="color: rgba(255,255,255,0.5);font-size: 20px;"  class="text-uppercase font-weight-bolder"><a class="alltopshopsanchornav" href="{{route('front.brand',['slug' =>'all brand'])}}">All Brands</span>
</div>
<!-- all brands  on nave bar start-->
@foreach($nav_brand as $brand)
<div class="col-md-3 imgbrandoverly">
<a href="{{route('front.vendor',str_replace(' ', '-',($brand->shop_name)))}}">
<img src="{{asset('assets/images/'.$brand->logo)}}"   alt="" class="img-fluid img-brandsoverly">
<div class="text-center brandoverly">
    <p class="overlypbrand">{{$brand->shop_name}}</p>
    <a href="{{route('front.vendor',str_replace(' ', '-',($brand->shop_name)))}}" class=" btn overlybtnbrand">View &nbsp <i class="fa fa-arrow-right"></i></a>
</div>
</a>
</div>
@endforeach
<!-- all brands  on nave bar start-->
<!-- <div class="col-md-3 imgbrandoverly">
<a href="">
<img src="{{asset('assets/img/logo-carousel/clo1.png')}}"   alt="" class="img-fluid img-brandsoverly">
<div class="text-center brandoverly">
    <p class="overlypbrand">Brand Name</p>
    <a class=" btn overlybtnbrand">View &nbsp <i class="fa fa-arrow-right"></i></a>
</div>
</a>
</div> -->
<!-- /.col-md-4  -->
<!-- </div>
</div> -->
<!--  /.container  -->
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link" href="#" >
<i class="fa fa-birthday-cake" style="font-size: 12px;"></i>&nbsp
Festivels &nbsp <i class="fa fa-angle-down"></i>
</a>
<div class="dropdown-menu " aria-labelledby="navbarDropdown">
<div class="container-fluid">
<div class="row">
<!-- <div class="col-lg-12 col-md-12 ">
<ul class="festivalnav1 ">
<li><a href="{{route('front.festival',['ptype' =>'festival'])}}"> --><!-- {{$gs->fes_title}} --><!-- eid ul fitar</a></li>
</ul>
</div> -->
<div style="width: 100%;background-color: #E7AB3C;padding-top: 15px;padding-bottom: 15px;" class="col-lg-12 col-md-12 text-center">
<span style="color: rgba(255,255,255,0.5);font-size: 20px;"  class="text-uppercase font-weight-bolder"><a class="alltopshopsanchornav">{{$gs->fes_title}}</a></span>
</div>
@foreach($fastiv_product as $produ)
@php
$name = str_replace(" ","-",$produ->name);
@endphp
<a href="{{route('front.product',['id' => $produ->id, 'slug' => $name])}}">
<div class="col-lg-2" >
<img src="{{asset('assets/images/'.$produ->photo)}}" class="festivalimgs img-fluid" alt="">
</div>
</a>
@endforeach
</div>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="{{route('front.category',['slug'=>'groceries'])}}"><i class="fa fa-shopping-basket" style="font-size: 12px;"></i>&nbsp Groceries</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{route('front.pages',['id'=>'about'])}}"><i class="fa fa-info-circle" style="font-size: 12px;"></i>&nbspAbout</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{route('advancesearch')}}"><i class="fa fa-search" style="font-size: 12px;"></i>&nbsp Advance Search</a>
</li>
</ul>
</div>
</nav>
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
<!-- Start Contact Area -->
<section class="subscription-area" style="margin-top: 0px;">
<div class="container">
<div class="row justify-content-between">
<div class="col-lg-5">
<div class="subscribe-content">
<h3 class="subscriptionh3">Subscribe for our Newsletter</h3>
<p class="subscriptionp1">We won’t send any kind of spam</p>
</div>
</div>
<div class="col-lg-6">
<div id="mc_embed_signup">
<form  action="{{route('front.subscribe.submit')}}" method="POST" class="subscription relative">
{{csrf_field()}}
<input type="email" name="email" placeholder="Email address"  required>
<div style="position: absolute; left: -5000px;">
</div>
<button class="subcribe-btn hover d-inline-flex align-items-center"><span class="mr-10">Get Started</span>&nbsp &nbsp &nbsp<span class="fa fa-long-arrow-right"></span></button>
<div class="info"></div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- End Subscription Area -->
<footer class="footer-wrap" style="margin-top: 0px;background-color: #232F3E;">
<div class="footer-top-wrap">
<div class="container">
<div class="row">
@if($lang->rtl == 1)
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="single-footer-wrap contact">
<h4 class="footer-title text-right">{{$lang->contact}}</h4>
<ul>
@if($gs->street != null)
<!--<li><a><i class="fa fa-map-marker" aria-hidden="true"></i>-->
<!--    <span>{{$gs->street}}</span>-->
<!--</a></li>-->
@endif
@if($gs->phone != null)
<!--<li><a href="tel:{{$gs->phone}}"><i class="fa fa-phone" aria-hidden="true"></i>-->
<!--    <span>{{$gs->phone}}</span>-->
<!--</a></li>-->
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
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="single-footer-wrap information">
<h4 class="footer-title text-right">{{$lang->fl}}</h4>
<ul>
@foreach($pages as $pg)
<li><a href="{{Route('front.pages',['id'=>$pg->slug])}}"><i class="fa fa-angle-double-right"></i> &nbsp;{{$pg->title}}</a></li>
@endforeach
<li><a href="{{route('advancesearch')}}"><i class="fa fa-hand-o-right"></i> &nbsp;Advance Search</a></li>
@if($ps->f_status == 1)
<li><a href="{{route('front.faq')}}"><i class="fa fa-hand-o-right"></i> &nbsp;{{$lang->faq}}</a></li>
@endif
@if($ps->c_status == 1)
<li><a href="{{route('front.contact')}}"><i class="fa fa-hand-o-right"></i> &nbsp;{{$lang->contact}}</a></li>
@endif
</ul>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="single-footer-wrap">
<h4 class="footer-title text-right">{{$lang->about}}</h4>
<p dir="rtl">
{{$gs->about}}
</p>
</div>
</div>
@else
<div class="col-lg-3 col-md-3 col-sm-6 footer-logo-div">
<div class="single-footer-wrap" >
<img src="{{asset('assets/img/png animated logo/oie_trans.gif')}}" class="img-fluid footer-logo" alt="">
<p>Experience our easily accessible online stores to get all of your favorite products and services in an economical capacity which help you to formulate your life easier and make you recognized. It is the first company of its kind in Pakistan to offer 100% guaranteed original stuff.  We are dedicated to providing our best to meet your satisfaction.</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
<div class="single-footer-wrap information">
<h4 class="footer-title">{{$lang->fl}}</h4>
<ul>
@foreach($pages as $pg)
<li><a href="{{Route('front.pages',['id'=>$pg->slug])}}"><i class="fa fa-angle-double-right"></i> &nbsp;{{$pg->title}}</a></li>
@endforeach
<li><a href="{{route('advancesearch')}}"><i class="fa fa-hand-o-right"></i> &nbsp;Advance Search</a></li>
@if($ps->f_status == 1)
<li><a href="{{route('front.faq')}}"><i class="fa fa-hand-o-right"></i> &nbsp;{{$lang->faq}}</a></li>
@endif
@if($ps->c_status == 1)
<li><a href="{{route('front.contact')}}"><i class="fa fa-hand-o-right"></i> &nbsp;{{$lang->contact}}</a></li>
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
<img  width="40" src="{{asset('assets/images/'.$lblog->photo)}}" alt="footer image">
<span><a  href="{{route('front.blogshow',$lblog->id)}}">{{strlen($lblog->title) > 30 ? substr($lblog->title,0,30)."..." : $lblog->title}}</a></span>
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
<!--<li><a><i class="fa fa-map-marker" aria-hidden="true"></i>-->
<!--    <span>{{$gs->street}}</span>-->
<!--</a></li>-->
@endif
@if($gs->phone != null)
<!--<li><a href="tel:{{$gs->phone}}"><i class="fa fa-phone" aria-hidden="true"></i>-->
<!--    <span>{{$gs->phone}}</span>-->
<!--</a></li>-->
@endif
@if($gs->email != null)
<li><a href="mailto:{{$gs->email}}"><i class="fa fa-envelope footercontactfa1" aria-hidden="true"></i>
<span>{{$gs->email}}</span>
</a></li>
@endif
@if($gs->site != null)
<li><a href="{{$gs->site}}"><i class="fa fa-globe footercontactfa1" style="margin-top: 10px;" aria-hidden="true"></i>
<span>{{$gs->site}}</span>
</a></li>
@endif
</ul>
@if($lang->rtl == 1)
<div class="footer-social-links text-left">
<ul>
@if($sl->f_status == 1)
<li><a class="facebook" href="{{$sl->facebook}}">
<i class="fa fa-facebook footercontactfa2"></i>
</a></li>
@endif
@if($sl->g_status == 1)
<li><a class="google" href="{{$sl->gplus}}">
<i class="fa fa-google footercontactfa3"></i>
</a></li>
@endif
@if($sl->t_status == 1)
<li><a class="twitter" href="{{$sl->twitter}}">
<i class="fa fa-twitter footercontactfa4"></i>
</a></li>
@endif
@if($sl->l_status == 1)
<li><a class="tumblr" href="{{$sl->linkedin}}">
<i class="fa fa-linkedin footercontactfa5"></i>
</a></li>
@endif
@if($sl->l_status == 1)
<li><a class="insta" href="{{$sl->linkedin}}">
<i class="fa fa-instagram footercontactfa6"></i>
</a></li>
@endif
@if($sl->l_status == 1)
<li><a class="whatsapp" href="{{$sl->linkedin}}">
<i class="fa fa-whatsapp footercontactfa7"></i>
</a></li>
@endif

</ul>
</div>
@else
<div class="footer-social-links">
<ul>
@if($sl->f_status == 1)
<li><a class="facebook" href="{{$sl->facebook}}">
<i class="fa fa-facebook footercontactfa2"></i>
</a></li>
@endif
@if($sl->g_status == 1)
<li><a class="google" href="{{$sl->gplus}}">
<i class="fa fa-google footercontactfa3"></i>
</a></li>
@endif
@if($sl->t_status == 1)
<li><a class="twitter" href="{{$sl->twitter}}">
<i class="fa fa-twitter footercontactfa4"></i>
</a></li>
@endif
@if($sl->l_status == 1)
<li><a class="tumblr" href="{{$sl->linkedin}}">
<i class="fa fa-linkedin footercontactfa5"></i>
</a></li>
@endif
@if($sl->l_status == 1)
<li><a class="insta" href="{{$sl->linkedin}}">
<i class="fa fa-instagram footercontactfa6"></i>
</a></li>
@endif
@if($sl->l_status == 1)
<li><a class="whatsapp" href="https://web.whatsapp.com/">
<i class="fa fa-whatsapp footercontactfa7"></i>
</a></li>
@endif
<li><a class="youtube" href="https://www.youtube.com/channel/UCF18uJhakrkVmdQGTUiMlkQ">
<i class="fa fa-youtube-play footercontactfa8"></i>
</a></li>
</ul>
<div style="margin-top: 10px !important;">
<img src="{{asset('assets/nnnn.png')}}" alt="">
</div>
</div>
@endif
</div>
</div>
@endif
</div>
</div>
</div>
</footer>
<div class="container-fluid newareafrenchisefooter">
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
<h4>All &nbsp<span style="color:#E7AB3C;">Frenchises</span></h4>
<?php
$cities = App\Models\Country::get()->pluck('city');
$fcities = App\Models\Frenchise::whereIn('city',$cities)->groupBy('city')->get()->pluck('city');
?>
<?php $count=0;?>
@foreach($fcities as $city)
<ul>
<li><a class="newaraefootasp" href="{{route('front.frenchisealllist',['slug'=>$city])}}">{{$city}} <span class="newaraefootaspan">({{count(App\Models\Frenchise::where('city',$city)->get())}})</span></a></li>
<?php if ($count == 72):?>
</div>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
<ul style="margin-top: 55px;">
<?php endif; $count++;?>
</ul>
</ul>
@endforeach
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<h4 class=""> <span style="color:#E7AB3C;">planetsid <i class="fa fa-globe"></i> </span> &nbsp How PlanetSid Works</h4>
<p class="newaraefootaspan">2021, the era of e-commerce business all over the world, PlanetSid is a very diverse entity and non-typical platform  for a successful business that not only gives entrepreneurs a chance to grow their business, but also a significant and reliable business platform for investors to invest their money and get shares. We assure full cooperation and trust to all sectors associated with us.
 The platform is completed by a three-party partnership. 1:Vendor 2: Franchiser 3: Buyer
15% of the total sale will be shared with the selected franchiser from a specific area. In addition, 7% at the beginning of the sale, 3% per annum after deducting tax,  and on the completion of the contract time, which is 10-15 years, 5% additional benefit will be given.
The franchisor will make a profit in two directions.<br> 
&nbsp&nbsp<b>•</b>	When a shop is registered on our online store. <br>
&nbsp&nbsp<b>•</b>  When a sale is generated on our platform.<br> 
In both cases, the franchisor will benefit.
There are four categories of partnerships which are Bronze, Silver, Gold, and Diamond respectively. You can choose any of these categories according to your capital.
From Bronze to diamond, depending on the duration of the contract, along with the increase in investment, the profit rate will also increase every month and the on completion of the contract.
To place an order on our online shopping store, you will need to create your account. You will receive your parcel from our courier services within about seven days of placing your order with us. If you have received the parcel, but you are not satisfied with your decision, you can return your order to our online store within three days and place a new order. If something in your parcel turns out to be broken, you must provide proof within 3 hours of receiving it. This will cover your loss in the form of a discount coupon.
</p>
<h4 class="">Tension-free order delivery </h4>
<p class="newaraefootaspan">Planetsid makes delivery hassle-free from placing an order to delivery on your doorstep without any discrimination of big and small city.</p>
<h4 class="">Promotions, deals, discounts</h4>
<p class="newaraefootaspan">Our online shopping store proposes regular shopping as well as a variety of offers in the coming days. This offer will be from our vendors. Also, we offer Flash sales from our platform. You can also shop for your interests on a low budget.
There is your business, joining hands with us expands the scope of buyers of your products and the profits they make. We are proud to work with shareholders.</p>
<h4 class="">Digital business with the collaboration of verified vendors </h4>
<p class="newaraefootaspan">In the era of digital business, Planetsid is committed to secure transactions. Here vendors and buyers can make direct treaties with each other and deal with complete confidence.
In collaboration with Verified vendors, our physical stores are located in Faisalabad, Gujranwala, and Islamabad which will soon be available in every city of Pakistan.</p>
<h4 class="">Payment methods</h4>
<p class="newaraefootaspan">Easy payment methods have been introduced for the convenience of our valued customers. To avoid any difficulty in payments, modern techniques have been used such as Easypaisa, JazzCash Credit Card, and Cash On Delivery facilities are also provided.</p>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<h4 >Planetsid online shopping store adopted to new modern requirements</h4>
<p class="newaraefootaspan">Planetsid.com is one of the emerging companies in the world of e-commerce in the Pakistani market. It is a continuous chain of online shopping stores in the region.  Our mission is to provide an easy, secure and, reliable platform for the customer in the competitive environment.	
Planetsid.com has all the features of the best online shopping store in 2021. Our customer care and sales representatives struggle hard and use the latest technology to make it easy for our customers.
Whether you shop online using our website or purchase needs through the mobile app are guaranteed very easy and smooth shopping.
</p>
<h4 class="">How planetsid have different working  nature from other online shopping stores</h4>
<p class="newaraefootaspan">Planetsid company works with unlimited products in a wide range of categories. Whether you want Electronics or Home Appliances, Women's Clothing or Men’s Clothing, tools or furniture, online fashion or beauty products Whatever you are looking for it may be services or products, there is something for everyone here.</p>
<h4 class="">Order tracking</h4>
<p class="newaraefootaspan">You can track your package from your device. Also, if you are not satisfied with your order and want to exchange after receiving the order, then take advantage of our easy and simple exchange policy of 10-15 days almost.</p>
<h4 class="">Modern Gadgets</h4>
<p class="newaraefootaspan">Smart Watches, Shisha-vapes.</p>
<h4 class="">Latest Laptops</h4>
<p class="newaraefootaspan">HP Laptops, Dell Laptops, Lenovo Laptops, Apple Laptops.</p>
<h4 class="">Electronics</h4>
<p class="newaraefootaspan">Haier Electronics, LG Electronics, Panasonic Electronics, Westpoint Electronics.</p>
<h4 class="">Mobiles And mobile accessories</h4>
<p class="newaraefootaspan">Huawei Mobiles, Lenovo Mobiles, Oppo mobiles, Mobile’s, Nokia Mobiles, Vivo mobile, Samsung Mobiles, Apple iPhone.</p>
<h4 class="">Men’s clothing</h4>
<p class="newaraefootaspan">Men’s suiting, Men’s T-shirts, Men’s shalwar kurta, Men’s official.</p>
<h4 class="">Women's clothing</h4>
<p class="newaraefootaspan">Limelight Lawn collection 2021, Gul Ahmed Lawn collection 2021, Maria B Lawn collection 2021, Modern suiting.</p>
<h4 class="">Brands outlet Online store</h4>
<p class="newaraefootaspan">Loreal cosmetics, Nokia handsets store, Rivaj cosmetics store.</p>
<h4 class="">Home Appliances</h4>
<p class="newaraefootaspan"> Gree AC, water dispensers,  Dawlance water dispensers, Deep freezers, generators, Air conditioners, Haier refrigerators.</p>
</div>
</div>
<div class="row" style="margin-top: 20px;">
@if($lang->rtl == 1)
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<div class="footer-copyright-area">
<a class="privaypolicylinks" href="">conditions of use </a> <a class="privaypolicylinks" href="{{route('privacypolicy')}}">privacy policy</a> &copy {!!$gs->footer!!}
</div>
</div>
@else
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<div class="footer-copyright-area">
<a href="" class="privaypolicylinks">conditions of use </a> <a class="privaypolicylinks" href="{{route('privacypolicy')}}">privacy policy</a> &copy {!!$gs->footer!!}
</div>
</div>
@endif
</div>
</div>
</div>
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
<li class="active"><a data-toggle="tab" href="#login1z">{{$lang->signin}}</a></li>
<li><a data-toggle="tab" href="#signup1z">{{$lang->signup}}</a></li>
</ul>
<div class="tab-content">
<div id="login1z" class="tab-pane fade in active">
<div class="login-title text-center">
<h3>{{$lang->signin}}</h3>
</div>
<div class="login-form">
<form action="{{route('customer-login-submit')}}" method="POST">
{{csrf_field()}}
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="login_email1">{{$lang->doeml}}</label>
<input type="email" name="email" class="form-control" id="login_email1" placeholder="{{$lang->doeml}}" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="login_pwd1">{{$lang->sup}}</label>
<input type="password" name="password" class="form-control" id="login_pwd1" placeholder="{{$lang->sup}}" required>
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
<div id="signup1z" class="tab-pane fade">
<div class="login-title text-center">
<h3>{{$lang->signup}}</h3>
</div>
@include('includes.form-error')
<div class="login-form">
<form action="{{route('user-register-submit')}}" method="POST">
{{csrf_field()}}
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_email1">{{$lang->doeml}} <span>*</span></label>
<input class="form-control" placeholder="{{$lang->doeml}}" type="email" name="email" id="reg_email1" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_name1">{{$lang->fname}} <span>*</span></label>
<input class="form-control" placeholder="{{$lang->fname}}" type="text" name="name" id="reg_name1" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Pnumber1">{{$lang->doph}} <span>*</span></label>
<input class="form-control" placeholder="{{$lang->doph}}" type="text" name="phone" id="reg_Pnumber1" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Padd1">{{$lang->doad}} <span>*</span></label>
<input class="form-control" placeholder="{{$lang->doad}}" type="text" name="address" id="reg_Padd1" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_password1">{{$lang->sup}} <span>*</span></label>
<input class="form-control" placeholder="{{$lang->sup}}" type="password" name="password" id="reg_password1" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="confirm_password1">{{$lang->sucp}} <span>*</span></label>
<input class="form-control" placeholder="{{$lang->sucp}}" type="password" name="password_confirmation" id="confirm_password1" required>
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
<li class="active"><a data-toggle="tab" href="#login111z">{{$lang->signin}}</a></li>
<li><a data-toggle="tab" href="#signup111z">{{$lang->vendor_registration}}</a></li>
</ul>
<div class="tab-content">
<div id="login111z" class="tab-pane fade in active">
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
<div id="signup111z" class="tab-pane fade">
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
<label for="reg_name11">Owner Name<span>*</span></label>
<input class="form-control" placeholder="{{$lang->fname}}" type="text" name="owner_name" id="reg_name11" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Pnumber11">Vendor Contact Number <span>*</span></label>
<input class="form-control" placeholder="{{$lang->doph}}" type="text" name="shop_number" id="reg_Pnumber11" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_email11">Shop Name<span>*</span></label>
<input class="form-control" placeholder="{{$lang->vshop_name}}" type="text" name="shop_name" id="reg_shopname11" required>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Padd11">Vendor Address <span>*</span></label>
<input class="form-control" placeholder="{{$lang->doad}}" type="text" name="shop_address"  required>
</div>
<div class="form-group">
<label for="shippingFull_name">Province  <span>*</span></label>
<select class="form-control" id="prov" required="" name="province">
@php
$countries = App\Models\Country::groupBy('admin_name')->get();
@endphp
@foreach($countries as $country)
<option value="{{$country->admin_name}}">{{$country->admin_name}}</option>
@endforeach
</select>
</div>
<div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
<label for="reg_Padd11">Vendor City <span>*</span></label>
<select class="form-control" id="city"  required="" name="city" disabled="">
<option value="">Select City</option>
</select>
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
@if(isset($checked))
<!-- Starting of Product View Modal -->
<div class="modal fade" id="checkoutModal"  data-keyboard="false" data-backdrop="static" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header" style="margin-right:10px;">
<a href="{{ url()->previous() }}" class="close">&times;</a>
</div>
<div class="modal-body">
<div class="row" style="margin: 15px;">
<div class="login-tab">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#login11z">{{$lang->signin}}</a></li>
<li><a data-toggle="tab" href="#signup11z">{{$lang->signup}}</a></li>
</ul>
<div class="tab-content">
<div id="login11z" class="tab-pane fade in active">
<div class="login-title text-center">
<h3>{{$lang->signin}}</h3>
</div>
<div class="alert alert-danger validation">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<p class="text-center">{{ $lang->digital_login }}</p>
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
<div id="signup11z" class="tab-pane fade">
<div class="login-title text-center">
<h3>{{$lang->signup}}</h3>
</div>
@include('includes.form-error')
<div class="login-form">
<form action="{{route('user-register-submit')}}" method="POST">
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
<input class="form-control" placeholder="{{$lang->doad}}" type="text" name="address"  required>
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
@endif
@if(isset($vendor))
@if(Auth::guard('customer')->check())
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
<input type="hidden" name="email" value="{{Auth::guard('customer')->user()->email}}">
<input type="hidden" name="name" value="{{Auth::guard('customer')->user()->name}}">
<input type="hidden" name="user_id" value="{{Auth::guard('customer')->user()->id}}">
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
<i class="fa fa-hand-o-up " style="font-size: 29px;"></i>
</a>
<!-- Ending of Scroll to Top Area -->
<!-- jQuary Library -->
<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/user/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.canvasjs.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/user/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/user/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/user/js/notify.js')}}"></script>
<script src="{{asset('assets/user/js/main.js')}}"></script>
<script src="{{asset('assets/user/js/user-main.js')}}"></script>
<script src="{{asset('assets/front/js/all.js')}}"></script>
<!-- <script src="{{asset('assets/mega/js/bootsnav.js')}}"></script>
<script src="{{asset('assets/mega/js/modern-megamenu.js')}}"></script> -->
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
$(document).on("click", ".no-wish" , function(){
return false;
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
$('.container-fluid').html('<h2 class="text-center">{{$lang->no_compare}}</h2>')
}
}
});
});
$(document).on("click", ".clear-btn" , function(){
$('.compare-content-wrap').hide('slow');
$('.container-fluid').html('<h2 class="text-center">{{$lang->no_compare}}</h2>');
$('.compare-quantity').html('0');
$.ajax({
type: "GET",
url:"{{URL::to('/json/clearcompare')}}",
});
return false;
});
$(document).on("click", "#product_email" , function(){
$(".modal-backdrop, .modal.vendor").css('background-color','rgba(0,0,0,0)');
});
</script>
<script type="text/javascript">
$.removeClass('.modal-dialogue');
</script>
<script>
$(document).ready(function() {
// executes when HTML-Document is loaded and DOM is ready
// breakpoint and up
$(window).resize(function(){
if ($(window).width() >= 980){
// when you hover a toggle show its dropdown menu
$(".navbar .dropdown-toggle").hover(function () {
$(this).parent().toggleClass("show");
$(this).parent().find(".dropdown-menu").toggleClass("show");
});
// hide the menu when the mouse leaves the dropdown
$( ".navbar .dropdown-menu" ).mouseleave(function() {
$(this).removeClass("show");
});
// do something here
}
});
// document ready
});
</script>
@if($gs->is_talkto == 1)
<!--Start of Tawk.to Script-->
{!! $gs->talkto !!}
<!--End of Tawk.to Script-->
@endif
<script type="text/javascript">
$('#prov').on('change', function() {
var prov = $(this).val();
if (prov == "")
{
$('#city').html('<option value="">Select City</option>');
$('#city').prop('disabled', true);
}
else
{
$.ajax({
type: "GET",
url:"{{URL::to('json/city')}}",
data:{admin_name:prov},
success:function(data){
$('#city').html('<option value="">Select City</option>');
for(var k in data)
{
$('#city').append('<option value="'+data[k]['city']+'">'+data[k]['city']+'</option>');
}
$('#city').prop('disabled', false);
}
});
}
});
</script>
@yield('scripts')
</body>
</html>