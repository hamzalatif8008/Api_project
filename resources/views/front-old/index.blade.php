@extends('layouts.home')

@section('content')

    @if($gs->slider == 1)

        <!--  Starting of homepage--2 carousel area   -->
        <div class="homepage-topper-area">
            <div class="container">
                <div class="row">

                    @if($lang->rtl == 1)
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 hidden-xs">

                            <div class="owl-carousel homepage-carousel-area">
                                @foreach($sliders as $sl)
                                    <div class="single-home-carousel-item">
                                        <img src="{{asset('assets/images/'.$sl->photo)}}" alt="Homepage carousel image">
                                        <div class="home-carousel-overlay"></div>
                                        <div class="home-carousel-text">
                                            <h2>{{$sl->title}}</h2>
                                            <p>{{$sl->description}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" style="float: right;">
                            <div class="mainmenu">
                                <ul>
                                    @php
                                        $catnum = 0;
                                    @endphp
                                    @foreach($categories as $category)
                                        <li class="megamenu"><a href="{{route('front.category',$category->cat_slug)}}">{{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-left':''}}"></i></a>
                                            @if(count($category->subs) > 0)
                                                <ul>
                                                    <div class="row">
                                                        <div class="single-megamanu-area">
                                                            <h5>{{ $category->cat_name }}</h5>
                                                            @if(count($category->subs) > 0)
                                                                <ul>
                                                                    @foreach($category->subs()->where('status','=',1)->get() as $subcategory)
                                                                        <li>
                                                                            <a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{$subcategory->sub_name}}<i style="padding-left: 5px;" class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-left' : ''}}"></i></a>
                                                                            @if(count($subcategory->childs) > 0)
                                                                                <ul>
                                                                                    <div class="row">
                                                                                        <div class="single-megamanu-area" style="padding-left: 13px; padding-top: 5px;">
                                                                                            <h5>{{ $subcategory->sub_name }}</h5>
                                                                                            @if(count($subcategory->childs) > 0)
                                                                                                @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                                                                                                    <li>
                                                                                                        <a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{$childcategory->child_name}}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </ul>
                                            @endif
                                        </li>
                                        @php
                                            $catnum++;
                                            if($catnum == 10)
                                            {
                                              break;
                                            }
                                        @endphp
                                    @endforeach
                                    @if(count($categories) > 10)
                                        @foreach($catgories as $category)
                                            <li class="megamenu content"><a href="{{route('front.category',$category->cat_slug)}}">{{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-left':''}}"></i></a>
                                                @if(count($category->subs) > 0)
                                                    <ul>
                                                        <div class="row">
                                                            <div class="single-megamanu-area">

                                                                <h5>{{ $category->cat_name }}</h5>
                                                                @if(count($category->subs) > 0)
                                                                    <ul>
                                                                        @foreach($category->subs()->where('status','=',1)->get() as $subcategory)
                                                                            <li>
                                                                                <a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{$subcategory->sub_name}}<i style="padding-left: 5px;" class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-left' : ''}}"></i></a>
                                                                                @if(count($subcategory->childs) > 0)
                                                                                    <ul>
                                                                                        <div class="row">
                                                                                            <div class="single-megamanu-area" style="padding-left: 13px; padding-top: 5px;">
                                                                                                <h5>{{ $subcategory->sub_name }}</h5>
                                                                                                @if(count($subcategory->childs) > 0)
                                                                                                    @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                                                                                                        <li>
                                                                                                            <a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{$childcategory->child_name}}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                        <li>
                                            <a class="show_hide" href="#">{{$lang->see_more}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>



                    @else

                        <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-9 col-sm-push-3 col-xs-12 col-xs-pull-0 hidden-xs slider-height">

                            <div class="owl-carousel homepage-carousel-area">

                                @foreach($sliders as $sl)
                                    <div class="single-home-carousel-item">
                                        <img src="{{asset('assets/images/'.$sl->photo)}}" alt="Homepage carousel image">
                                        <div class="home-carousel-overlay"></div>
                                        <div class="home-carousel-text">
                                            {!! $sl->title !!}
                                            {!! $sl->description !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-3 col-sm-pull-9 col-xs-12 col-xs-push-0 hidden-xs">
                            <div class="mainmenu">
                                <ul>
                                    @php
                                        $catnum = 0;
                                    @endphp
                                    @foreach($categories as $category)
                                        <li class="megamenu"><a href="{{route('front.category',$category->cat_slug)}}">{{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-right':''}}"></i></a>
                                            @if(count($category->subs) > 0)
                                                <ul>
                                                    <div class="row">
                                                        <div class="single-megamanu-area">
                                                            <h5>{{ $category->cat_name }}</h5>
                                                            @if(count($category->subs) > 0)
                                                                <ul>
                                                                    @foreach($category->subs()->where('status','=',1)->get() as $subcategory)
                                                                        <li>
                                                                            <a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{$subcategory->sub_name}}<i style="padding-right: 5px;" class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-right' : ''}}"></i></a>
                                                                            @if(count($subcategory->childs) > 0)
                                                                                <ul>
                                                                                    <div class="row">
                                                                                        <div class="single-megamanu-area" style="padding-left: 13px; padding-top: 5px;">
                                                                                            <h5>{{ $subcategory->sub_name }}</h5>
                                                                                            @if(count($subcategory->childs) > 0)
                                                                                                @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                                                                                                    <li>
                                                                                                        <a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{$childcategory->child_name}}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </ul>
                                            @endif
                                        </li>
                                        @php
                                            $catnum++;
                                            if($catnum == 10)
                                            {
                                              break;
                                            }
                                        @endphp
                                    @endforeach
                                    @if(count($categories) > 10)
                                        @foreach($catgories as $category)
                                            <li class="megamenu content"><a href="{{route('front.category',$category->cat_slug)}}">{{ $category->cat_name }} <i class="{{count($category->subs) > 0 ? 'fa fa-angle-right':''}}"></i></a>
                                                @if(count($category->subs) > 0)
                                                    <ul>
                                                        <div class="row">
                                                            <div class="single-megamanu-area">
                                                                <h5>{{ $category->cat_name }}</h5>
                                                                @if(count($category->subs) > 0)
                                                                    <ul>
                                                                        @foreach($category->subs()->where('status','=',1)->get() as $subcategory)
                                                                            <li>
                                                                                <a href="{{route('front.subcategory',$subcategory->sub_slug)}}">{{$subcategory->sub_name}}<i style="padding-right: 5px;" class="{{ count($subcategory->childs) > 0 ? 'fa fa-angle-right' : ''}}"></i></a>
                                                                                @if(count($subcategory->childs) > 0)
                                                                                    <ul>
                                                                                        <div class="row">
                                                                                            <div class="single-megamanu-area" style="padding-left: 13px; padding-top: 5px;">
                                                                                                <h5>{{ $subcategory->sub_name }}</h5>
                                                                                                @if(count($subcategory->childs) > 0)
                                                                                                    @foreach($subcategory->childs()->where('status','=',1)->get() as $childcategory)
                                                                                                        <li>
                                                                                                            <a href="{{route('front.childcategory',$childcategory->child_slug)}}">{{$childcategory->child_name}}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                        <li>
                                            <a class="show_hide" href="#">{{$lang->see_more}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--  Ending of homepage--2 carousel area   -->

    @endif

    @if($gs->category  == 1)
        @php
            $len = count($services);
            $ck = 0;
            $ser =0;
        @endphp
        <!--  Starting of home service area   -->
        <div class="home-service-wrapper" data-wow-duration="1s" data-wow-delay="1s">
            <div class="container">
                @foreach($services->chunk(4) as $chunk)
                    <div class="row">
                        @foreach($chunk as $service)
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="single-service-area">
                                    <div class="service-icon-img text-center">
                                        <img src="{{asset('assets/images/'.$service->photo)}}" alt="service icon">
                                    </div>
                                    <div class="service-icon-text">
                                        <h5>{{$service->title}}</h5>
                                        <p>{{$service->text}}</p>
                                    </div>
                                </div>
                            </div>
                            @php
                                if ($ser == $len - 1) {
                                    $ck = 1;
                                }
                                $ser++;
                            @endphp
                        @endforeach
                    </div>
                    @if($ck == 0)
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
        <!--  Ending of home service area   -->
    @endif

    @if($gs->sb == 1)
        <!--  Starting of image blog area   -->
        <div class="image-blog-wrap" data-wow-duration="1s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <a href="{{$banner->top1l}}" class="single-image-blog-box">
                            <img id="bn1" src="{{asset('assets/images/'.$banner->top1)}}" alt="blog image">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <a href="{{$banner->top2l}}" class="single-image-blog-box">
                            <img id="bn2" src="{{asset('assets/images/'.$banner->top2)}}" alt="blog image">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <a href="{{$banner->top3l}}" class="single-image-blog-box">
                            <img id="bn3" src="{{asset('assets/images/'.$banner->top3)}}" alt="blog image">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <a href="{{$banner->top4l}}" class="single-image-blog-box">
                            <img id="bn4" src="{{asset('assets/images/'.$banner->top4)}}" alt="blog image">

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of image blog area   -->

    @endif

    @if($gs->hv == 1)

        <!--  Starting of featured product area   -->
        <div class="section-padding featured-product-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>{{$lang->featured_product}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product-type-tab">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#bestSeller" class="tab-1">{{$lang->bg}}</a></li>
                                <li><a data-toggle="tab" href="#topRate" class="tab-2">{{$lang->lm}}</a></li>
                                <li><a data-toggle="tab" href="#hotSale" class="tab-3">{{$lang->rds}}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="bestSeller" class="tab-pane active">
                                    <div class="row">
                                        @php
                                            $i=1;
                                            $j=1;
                                            $m = 0;
                                        @endphp
                                        @foreach($fproducts as $prod)
                                {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>
                            </div>

                            @endif
                                {{-- LOOP ENDS --}}
                                        @endforeach
                                    </div>
                                </div>
                                <div id="topRate" class="tab-pane">

                                    <div class="row" style="display: none;">
                                        @php
                                            $i=1000;
                                            $j=1000;
                                            $m = 0;
                                        @endphp
                                        @foreach($beproducts as $prod)
                                {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>
                            </div>

                            @endif
                                {{-- LOOP ENDS --}}
                                        @endforeach
                                    </div>
                                </div>
                                <div id="hotSale" class="tab-pane fade">

                                    <div class="row" style="display: none;">
                                        @php
                                            $i=2000;
                                            $j=2000;
                                            $m = 0;
                                        @endphp
                                        @foreach($tproducts as $prod)
                                {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>
                            </div>

                            @endif
                                {{-- LOOP ENDS --}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of featured product area   -->
    @endif

    @if($gs->lb == 1)
        <!--  Starting of product banner area   -->
        <div class="product-banner-wrap" data-wow-duration="1s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    @foreach($imgs as $img)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-banner-img">
                                <a href="{{$img->url}}" class="single-image-blog-box">
                                    <img class="btbn" src="{{asset('assets//images/'.$img->photo)}}" alt="banner">

                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--  Ending of product banner area   -->
    @endif

    @if($gs->lp == 1)
        <!--  Starting of new arrival product area   -->
        <div class="section-padding featured-product-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>{{$lang->new_arrival}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product-type-tab">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#featured1" class="tab-1">{{$lang->hot_sale}}</a></li>
                                <li><a data-toggle="tab" href="#latestSpecial1" class="tab-2">{{$lang->latest_special}}</a></li>
                                <li><a data-toggle="tab" href="#bestSeller1" class="tab-3">{{$lang->big_sale}}</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="featured1" class="tab-pane in active">
                                    <div class="row">
                                        @php
                                            $i=3000;
                                            $j=3000;
                                            $m = 0;
                                        @endphp
                                        @foreach($hproducts as $prod)
                                {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>
                            </div>

                            @endif
                                {{-- LOOP ENDS --}}
                                        @endforeach

                                    </div>
                                </div>
                                <div id="latestSpecial1" class="tab-pane">

                                    <div class="row" style="display: none;">

                                        @php
                                            $i=5000;
                                            $j=5000;
                                            $m=0;
                                        @endphp
                                        @foreach($lproducts as $prod)
                                {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>
                            </div>

                            @endif
                                {{-- LOOP ENDS --}}
                                        @endforeach
                                    </div>
                                </div>
                                <div id="bestSeller1" class="tab-pane">

                                    <div class="row" style="display: none;">
                                        @php
                                            $i=4000;
                                            $j=4000;
                                            $m=0;
                                        @endphp
                                        @foreach($biproducts as $prod)
                                {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 {{$m >=3?'hidden-xs':''}}">
                                      @php
                                          $m++;
                                          $name = str_replace(" ","-",$prod->name);
                                      @endphp
                        <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                          <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                            @php
                                            $title = explode(',', $prod->features);
                                            $details = explode(',', $prod->colors);
                                            @endphp
                                            <div class="featured-tag" style="width: 100%;">
                                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                              <style type="text/css">
                                                span#d{{$j++}}:after {
                                                    border-left: 10px solid {{$dtl}};
                                                }
                                              </style>
                                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                              @endforeach
                                            </div>
                                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
                            @if($prod->youtube != null)
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle"></i></span>
                            </div>
                            @endif

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="{{$prod->id}}">
                    @if(Auth::guard('user')->check())
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @else
                      <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="{{$lang->wishlist_add}}"><i class="fa fa-heart"></i>
                                <span class="wish-number">{{App\Models\Wishlist::where('product_id','=',$prod->id)->get()->count() }}</span>
                              </span>
                    @endif
                    <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="{{$lang->quick_view}}"><i class="fa fa-eye"></i>
                              </span>
                              <span class="hovertip addcart" rel-toggle="tooltip" title="{{$lang->hcs}}"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="{{$lang->compare}}"><i class="fa fa-exchange"></i>
                              </span>
                            </div>



                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>
                            </div>

                            @endif
                                {{-- LOOP ENDS --}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of new arrival product area   -->
    @endif

    @if($gs->pp == 1)
        <!--  Starting of countdown area   -->
        <div class="countdown-wrap" data-wow-duration="1s" style="background-image: url({{asset('assets//images/'.$gs->count_image)}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="count-down-text-wrap text-center">
                            <div class="count-down-header">
                                <h2>{{$gs->count_title}}</h2>
                                <h4>{{$gs->count_heading}}</h4>
                            </div>

                            <div class="countdown-timer-wrap">
                                <div id="clock"></div>
                            </div>

                            <div class="count-down-button">
                                <a href="{{$gs->count_link}}" class="btn btn-primary">{{$lang->shop_now}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of countdown area   -->
    @endif
    @if($gs->ftp == 1)
        <!--  Starting of video blog area   -->
        <div class="video-blog-wrap" data-wow-duration="1s" data-wow-delay=".5s" style="background-image: url({{asset('assets/images/'.$gs->vidimg)}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video-text-area text-center">
                            <div class="video-header">
                                <h2>{{$lang->video_title}}</h2>
                            </div>
                            <div class="video-play-area">
                                <div class="video-play-btn">
                                    <a class="fancybox" data-fancybox href="{{$gs->vid}}"><img src="{{asset('assets/front/images/video/video-play.png')}}" alt="video play"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of video blog area   -->
    @endif

    @if($gs->bs == 1)
        <!--  Starting of latest news area   -->
        <div class="section-padding latest-news-wrap" data-wow-duration="1s" data-wow-delay=".3s" style="padding: 0;">
            <div class="blog-wrap" style="padding-top: 50px; padding-bottom: 50px; margin-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="common-title">{{$lang->lns}}</h2>
                        </div>
                    </div>

                            @foreach($homeblogs as $lblog)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <a href="{{route('front.blogshow',$lblog->id)}}" class="blog mb-30">
            <div class="blog__img">
              <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="blog image">
            </div>
            <div class="blog__content text-center">
              <div class="blog__meta">{{date('jS M, Y', strtotime($lblog->created_at))}}</div>
              <div class="blog__title">{{strlen($lblog->title) > 80 ? substr($lblog->title,0,80)."...":$lblog->title}}</div>
              <p>{{substr(strip_tags($lblog->details),0,150)}}</p>
              <span class="blog__footer"><i class="fa fa-eye"></i> {{$lang->vd}}</span>
            </div>
          </a>

                            </div>
                            @endforeach


                </div>
            </div>
            </div>
        </div>
        <!--  Ending of latest news area   -->
    @endif

    @if($gs->ts == 1)
        <!--  Starting of review carousel area   -->
        <div class="section-padding review-carousel-wrap overlay" data-wow-duration="1s" data-wow-delay=".3s" style="background-image: url({{asset('assets/images/'.$gs->cimg)}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>{{$lang->review_title}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="owl-carousel review-carousel">
                            @foreach($ads as $ad)
                                <div class="single-review-carousel-area text-center">
                                    <div class="review-carousel-profile">
                                        <img src="{{asset('assets/images/'.$ad->photo)}}" alt="review profile">
                                    </div>
                                    <div class="review-carousel-text">
                                        <h5 class="profile-name">{{$ad->client}}</h5>
                                        <p>{{$ad->review}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of review carousel area   -->
    @endif

    @if($gs->bl == 1)
        <!-- Starting of client logo area -->
        <section class="section-padding client-logo-wrap" data-wow-duration="1s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2>{{$lang->sue}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel logo-carousel">
                            @foreach($brands->chunk(10) as $brandz)
                                <ul class="logo-wrapper">
                                    @foreach($brandz as $brand)
                                        <li><a href="{{$brand->url}}"><img src="{{asset('assets/images/'.$brand->photo)}}" alt="client logo"></a></li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ending of client logo area -->
    @endif
@endsection

@section('scripts')
    <script>
        //---------Countdown-----------
        $('#clock').countdown('{{$gs->count_date}}', function(event) {
            $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
        });
    </script>
@endsection