<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Featured Shops</h2>
            <a class="btn viewallcat-btn"  href="{{route('all-shops',['slug' =>'all shops'])}}">View all <span class="fa fa-arrow-right"></span></a>
        </div>
    </div>
</div> 
<!-- Top Categories starts-->
<section class="bg-white" >
    <div class="banner-section spadshopgal">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 newtypeshopall" style="background-image:url(' {{asset('assets/images/TB1ZXXNIgHqK1RjSZFkXXX.WFXa-300-320.jpg')}}');" >
                    <h3 class="newtypeshopallht">Shopping Guide for <br> Trending Styles</h3>
                    <a class="btn viewallshopallnewbt"  href="{{route('all-shops',['slug' =>'all shops'])}}">View all <span class="fa fa-arrow-right"></span></a>
                </div> -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @foreach($top_shop_cat as $brand)
                        <div class=" col-lg-2 col-md-3 col-sm-3 col-xs-6 " >
                            <div class="hovereffect">
                                <a href="{{route('front.vendor',str_replace(' ', '-',($brand->shop_name)))}}">
                                <img src="{{asset('assets/images/'.$brand->logo)}}" class="hovereffimggal"  alt="shop-img"></a>
                                <div class="overlayzee">
                                    <h2 class="shopnamenewas">{{$brand->shop_name}}</h2>
                                    <a class="info" href="{{route('front.vendor',str_replace(' ', '-',($brand->shop_name)))}}">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top categories ends-->
<!-- category new look -->
<!-- <div class="container-fluid" style="padding-top: 5px;padding-bottom: 4px;">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Categories</h2> -->
            <!-- <a class="btn viewallcat-btn"  href="{{route('front.allproduct',['ptype' =>'deal_of_the_day'])}}">View all <span class="fa fa-arrow-right"></span></a> -->
        <!-- </div>
    </div>
</div> -->
<!-- <div class="owl-carousel reviewcat2-carouselsss" style="padding-top: 20px;padding-bottom: 20px;">
    @foreach($category as $cat)
    <a href="{{route('front.category',$cat->cat_slug)}}">
        
        <div class="catnewlooklittle text-center">
            <h5 class="catnewlookheading">{{$cat->cat_name}}</h5>
            <img src="{{asset('assets/images/'.$cat->photo)}}" alt="">
        </div>
    </a>
    @endforeach
    
</div> -->
<!-- <div class="container-fluid bigpage-catnew" style="padding-bottom: 10px;">
    <div class="row">
        @foreach($category as $cat)
        <a href="{{route('front.category',$cat->cat_slug)}}">
            <div class="col-lg-2 col-md-2 col-sm-2  catnewlooklittle">
                <h5 class="catnewlookheading">{{$cat->cat_name}}</h5>
                <img src="{{asset('assets/images/'.$cat->photo)}}" alt="">
            </div>
        </a>
        @endforeach
    </div>
    {{--  <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2  catnewlooklittle">
            <h5 class="catnewlookheading">Category 1</h5>
            <img src="{{asset('assets/front/images/0fef5361780df7d9ee73a928be6b634c.jpg')}}" alt="">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2  catnewlooklittle">
            <h5 class="catnewlookheading">Category 1</h5>
            <img src="{{asset('assets/front/images/0fef5361780df7d9ee73a928be6b634c.jpg')}}" alt="">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2  catnewlooklittle">
            <h5 class="catnewlookheading">Category 1</h5>
            <img src="{{asset('assets/front/images/0fef5361780df7d9ee73a928be6b634c.jpg')}}" alt="">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 catnewlooklittle">
            <h5 class="catnewlookheading">Category 1</h5>
            <img src="{{asset('assets/front/images/0fef5361780df7d9ee73a928be6b634c.jpg')}}" alt="">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2  catnewlooklittle">
            <h5 class="catnewlookheading">Category 1</h5>
            <img src="{{asset('assets/front/images/0fef5361780df7d9ee73a928be6b634c.jpg')}}" alt="">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2  catnewlooklittle">
            <h5 class="catnewlookheading">Category 1</h5>
            <img src="{{asset('assets/front/images/0fef5361780df7d9ee73a928be6b634c.jpg')}}" alt="">
        </div>
    </div>  --}}
</div> -->
<!--  -->
<!-- category new look -->
@if($gs->pp == 1)
<!--  Starting of countdown area   -->
<div class="container-fluid" >
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Deals of the day</h2>
            <a class="btn viewallcat-btn"  href="{{route('front.allproduct',['ptype' =>'deal_of_the_day'])}}">View all <span class="fa fa-arrow-right"></span></a>
        </div>
    </div>
</div>
<!--  Ending of countdown area   -->
@endif

@if($gs->hv == 1)
<!--  Starting of featured product area   -->
<div class="section-padding featured-product-wrap wow fadeInUp" style="margin-top: 10px;">
    <div class="container-fluid">
        <div class="row">
            <!--<div class="col-lg-12">-->
            <!--    <div class="section-title text-center">-->
            <!--        <h2>{{$lang->featured_product}}</h2>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-lg-12">
                <div class="product-type-tab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#bestSeller" class="tab-1">{{$lang->bg}}</a></li>
                        <li><a data-toggle="tab" href="#topRate" class="tab-2">{{$lang->lm}}</a></li>
                        <li><a data-toggle="tab" href="#hotSale" class="tab-3">{{$lang->rds}}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="bestSeller" class="tab-pane active">
                            <div class="owl-carousel featured-carousel">
                                @php
                                $i=1;
                                $j=1;
                                @endphp
                                @foreach($fproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div id="topRate" class="tab-pane">
                            <!-- <div class="featured_loader"></div> -->
                            
                            <div class="owl-carousel featured-carousel owl-test">
                                @php
                                $i=1000;
                                $j=1000;
                                @endphp
                                @foreach($beproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div id="hotSale" class="tab-pane fade">
                            
                            <div class="owl-carousel featured-carousel owl-test" >
                                @php
                                $i=2000;
                                $j=2000;
                                @endphp
                                @foreach($tproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{number_fomat(round($prod->pprice * $curr->value,2))}}</del>
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
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
<div class="product-banner-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s" >
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
<!-- Ending of product banner area   -->
@endif
@if($gs->lp == 1)
<!--  Starting of new arrival product area   -->
<div class="featured-product-wrap wow fadeInUp">
    <div class="container" style="display:none;">
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
                            <div class="owl-carousel featured-carousel owl-test">
                                @php
                                $i=3000;
                                $j=3000;
                                @endphp
                                @foreach($hproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div id="latestSpecial1" class="tab-pane">
                            <div class="featured_loader"></div>
                            <div class="owl-carousel featured-carousel owl-test" style="display: none;">
                                @php
                                $i=5000;
                                $j=5000;
                                @endphp
                                @foreach($lproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{round($price * $curr->value,2)}}
                                            @else
                                            {{round($prod->cprice * $curr->value,2)}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{round($price * $curr->value,2)}}
                                            @else
                                            {{round($prod->cprice * $curr->value,2)}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div id="bestSeller1" class="tab-pane">
                            <div class="featured_loader"></div>
                            <div class="owl-carousel featured-carousel owl-test" style="display: none;">
                                @php
                                $i=4000;
                                $j=4000;
                                @endphp
                                @foreach($biproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{round($price * $curr->value,2)}}
                                            @else
                                            {{round($prod->cprice * $curr->value,2)}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{round($price * $curr->value,2)}}
                                            @else
                                            {{round($prod->cprice * $curr->value,2)}}
                                            @endif
                                            <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
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
<!-- start left banner section with carusel -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Hot Sale</h2>
            <a class="btn viewallcat-btn"  href="{{route('front.hotsale',['ptype' =>'hot'])}}">View all <span class="fa fa-arrow-right"></span></a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row no-gutters">
        {{--  <!--         <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
            
            <img src="{{asset('assets/front/ZAin/ZEE-1.jpg')}}" class="homeaddban1big" alt="">
            <img src="{{asset('assets/front/ZAin/zee 2.jpg')}}" class="homeaddban1small" alt="">
        </div> -->  --}}
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 newtypeshopall" style="background-image:url(' {{asset('assets/images/'.$banner->top1)}}');" >
            {{--  <h3 class="newtypeshopallht">Shopping Guide for <br> Trending Styles</h3>  --}}
            <a class="btn viewallshopallnewbt"  href="{{$banner->top1l}}" target="_blank">View all <span class="fa fa-arrow-right"></span></a>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    {{--  <!--                     <h2 class="link-desshop">Hot Sale</h2>
                    <a class="btn viewallcat-btn"  href="{{route('front.hotsale',['ptype' =>'hot'])}}">View all <span class="fa fa-arrow-right"></span></a> -->  --}}
                    <div class="owl-carousel review-carouselsss">
                        @php
                        $i=1;
                        $j=1;
                        @endphp
                        @foreach($fproducts as $prod)
                        @php
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
                                    <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle" id="fa-play-circle"></i></span>
                                </div>
                                @endif
                                <div class="gallery-overlay"></div>
                                <div class="gallery-border"></div>
                                <div class="product-hover-area2">
                                    <input type="hidden" value="{{$prod->id}}">
                                    @if(Auth::guard('customer')->check())
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
                                <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                <div class="product-review">
                                    <div class="ratings">
                                        <div class="empty-stars"></div>
                                        <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                    </div>
                                </div>
                                @if($gs->sign == 0)
                                <div class="product-price">{{$curr->sign}}
                                    @if($prod->user_id != 0)
                                    @php
                                    $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                    @endphp
                                    {{number_format(round($price * $curr->value,2))}}
                                    @else
                                    {{number_format(round($prod->cprice * $curr->value,2))}}
                                    @endif
                                    
                                    <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                </div>
                                @else
                                <div class="product-price">
                                    @if($prod->user_id != 0)
                                    @php
                                    $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                    @endphp
                                    {{number_format(round($price * $curr->value,2))}}
                                    @else
                                    {{number_format(round($prod->cprice * $curr->value,2))}}
                                    @endif
                                    {{$curr->sign}}
                                </div>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end left banner section with carusel -->
@if($gs->bs == 1)
<!--  Starting of latest news area   -->
{{--  Slider2  --}}
@if($gs->hv == 1)
<!--  Starting of featured product area   -->
<div class="container-fluid " style="margin-top: 5px !important;margin-bottom: 5px !important;">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Deals of the day</h2>
            <a class="btn viewallcat-btn"  href="{{route('front.dealsofday2',['ptype' =>'deal_of_the_day'])}}">View all <span class="fa fa-arrow-right"></span></a>
        </div>
    </div>
</div>
<div class="section-padding featured-product-wrap wow fadeInUp" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-type-tab">
                    
                    <div class="tab-content">
                        <div id="bestSeller" class="tab-pane active">
                            <div class="owl-carousel featured-carousel">
                                @php
                                $i=1;
                                $j=1;
                                @endphp
                                @foreach($fproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
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
{{--  End Slider2  --}}
<!-- start left banner section with carusel -->
<div class="container-fluid" >
    <div class="row no-gutters">
        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="link-desshop">Latest Special</h2>
                    <a class="btn viewallcat-btn"  href="{{route('front.latestspecial',['ptype' =>'latest'])}}">View all <span class="fa fa-arrow-right"></span></a>
                    <div class="owl-carousel review-carouselsss" style="margin-top: 50px;">
                        @php
                        $i=1;
                        $j=1;
                        @endphp
                        @foreach($fproducts as $prod)
                        @php
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
                                    <span class="fancybox" data-fancybox href="{{$prod->youtube}}"><i class="fa fa-play-circle" id="fa-play-circle"></i></span>
                                </div>
                                @endif
                                <div class="gallery-overlay"></div>
                                <div class="gallery-border"></div>
                                <div class="product-hover-area2">
                                    <input type="hidden" value="{{$prod->id}}">
                                    @if(Auth::guard('customer')->check())
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
                                <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                <div class="product-review">
                                    <div class="ratings">
                                        <div class="empty-stars"></div>
                                        <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                    </div>
                                </div>
                                @if($gs->sign == 0)
                                <div class="product-price">{{$curr->sign}}
                                    @if($prod->user_id != 0)
                                    @php
                                    $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                    @endphp
                                    {{number_format(round($price * $curr->value,2))}}
                                    @else
                                    {{number_format(round($prod->cprice * $curr->value,2))}}
                                    @endif
                                    
                                    <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                </div>
                                @else
                                <div class="product-price">
                                    @if($prod->user_id != 0)
                                    @php
                                    $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                    @endphp
                                    {{number_format(round($price * $curr->value,2))}}
                                    @else
                                    {{number_format(round($prod->cprice * $curr->value,2))}}
                                    @endif
                                    {{$curr->sign}}
                                </div>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
            <a href="{{$banner->top2l}}" target="_blank">
            <img src="{{asset('assets/images/'.$banner->top2)}}" class="homeaddban1big" alt="">
            <img src="{{asset('assets/images/'.$banner->top2)}}" class="homeaddban1small" alt="">
            </a>
        </div>
    </div>
</div>
<!-- end left banner section with carusel -->
{{--  Slider3  --}}
@if($gs->hv == 1)
<!--  Starting of featured product area   -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Festival</h2>
            <a class="btn viewallcat-btn"  href="{{route('front.festival',['ptype' =>'festival'])}}">View all <span class="fa fa-arrow-right"></span></a>
        </div>
    </div>
</div>
<div class="section-padding featured-product-wrap wow fadeInUp">
    <div class="container-fluid">
        <div class="row">
            
            
            <div class="col-lg-12">
                <div class="product-type-tab">
                    
                    <div class="tab-content">
                        <div id="bestSeller" class="tab-pane active">
                            <div class="owl-carousel featured-carousel">
                                @php
                                $i=1;
                                $j=1;
                                @endphp
                                @foreach($fproducts as $prod)
                                @php
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
                                        <div class="product-name limitstr">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                        <div class="product-review">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                            </div>
                                        </div>
                                        @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            
                                            <del class="offer-price">{{$curr->sign}}{{number_format(round($prod->pprice * $curr->value,2))}}</del>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            @if($prod->user_id != 0)
                                            @php
                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                            @endphp
                                            {{number_format(round($price * $curr->value,2))}}
                                            @else
                                            {{number_format(round($prod->cprice * $curr->value,2))}}
                                            @endif
                                            {{$curr->sign}}
                                        </div>
                                        @endif
                                    </div>
                                </a>
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
{{--  End Slider3  --}}
<div class="container-fluid" style="margin-bottom: 15px;">
    <div class="row">

        <div class="col-lg-4">
            <div class="newsideportionmain1">
                <h5>Wholesalers</h5>
                <div class="row">
                    @foreach ($wholesalers as $wholesaler)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <a href="{{route('front.vendor',str_replace(' ', '-',($wholesaler->shop_name)))}}">
                              <img src="{{asset('assets/images/'.$wholesaler->logo)}}" class="newsideportionmainimg1"  alt="shop-img"></a>
                                {{--  <img src="{{asset('assets/front/images/new big box/pents1.jpg')}}" class="newsideportionmainimg1" alt="">  --}}
                                <p class="newsideportionmainp">{{$wholesaler->shop_name}}</p>  
                            </a>
                        </div>

                    @endforeach
                    
                   
                    <div class="col-lg-12">
                         <a href="{{route('shops-type',['slug' =>'Wholesaler'])}}">
                            <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                        </a>
                    </div>   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="newsideportionmain1">
                <h5>Units</h5>
                <div class="row">
                    @foreach ($units as $unit)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <a href="{{route('front.vendor',str_replace(' ', '-',($unit->shop_name)))}}">
                              <img src="{{asset('assets/images/'.$unit->logo)}}" class="newsideportionmainimg1"  alt="shop-img"></a>
                                {{--  <img src="{{asset('assets/front/images/new big box/pents1.jpg')}}" class="newsideportionmainimg1" alt="">  --}}
                                <p class="newsideportionmainp">{{$unit->shop_name}}</p>  
                            </a>
                        </div>
                    @endforeach
                   
                    <div class="col-lg-12">
                        <a href="{{route('shops-type',['slug' =>'Unit'])}}">
                            <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                        </a>
                    </div>   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="newsideportionmain1">
                <h5>Factories</h5>
                <div class="row">
                     @foreach ($factories as $factory)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <a href="{{route('front.vendor',str_replace(' ', '-',($factory->shop_name)))}}">
                              <img src="{{asset('assets/images/'.$factory->logo)}}" class="newsideportionmainimg1"  alt="shop-img"></a>
                                {{--  <img src="{{asset('assets/front/images/new big box/pents1.jpg')}}" class="newsideportionmainimg1" alt="">  --}}
                                <p class="newsideportionmainp">{{$factory->shop_name}}</p>  
                            </a>
                        </div>
                    @endforeach
                    
                    <div class="col-lg-12">
                        <a href="{{route('shops-type',['slug' =>'Factory'])}}">
                            <p class="newsideportionmainp2">See All &nbsp<i class="fa fa-long-arrow-right"></i></p>
                        </a>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" >
    <div class="row">
        <div class="col-lg-12">
            <h2 class="link-desshop">Brands</h2>
            {{--  <a class="btn viewallcat-btn"  href="{{route('front.brand',['slug' =>'brands'])}}">View all <span class="fa fa-arrow-right"></span></a>  --}}
        </div>
    </div>
</div>
<!-- <div class="col-lg-12">
    <div class="owl-carousel latest-news-list">
        @foreach($lblogs as $lblog)
        <a href="{{route('front.blogshow',$lblog->id)}}" class="single-news-list">
            <div class="news-img">
                <img class="news-img" src="{{asset('assets/images/'.$lblog->photo)}}" alt="news image">
                <div class="news-list-meta"><span>{{date('d',strtotime($lblog->created_at))}}</span> {{date('M',strtotime($lblog->created_at))}}</div>
            </div>
            <div class="news-list-text">
                <h4 dir="{{$lang->rtl == 1 ? 'rtl':''}}">{{strlen($lblog->title) > 50 ? substr($lblog->title,0,50)."..." : $lblog->title}}</h4>
                <p dir="{{$lang->rtl == 1 ? 'rtl':''}}">{{substr(strip_tags($lblog->details),0,250)}}</p>
            </div>
            <hr/>
            <div class="news-list-button"  dir="{{$lang->rtl == 1 ? 'rtl':''}}">
                <span class="news-btn">{{$lang->vd}}</span>
            </div>
        </a>
        @endforeach
    </div>
</div> -->
</div>
</div>
</div>
<!--  Ending of latest news area   -->
@endif
@if($gs->ts == 1)
<!-- Starting of review carousel area   -->
<!-- <div class="section-padding review-carousel-wrap overlay wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="background-image: url({{asset('assets/images/'.$gs->cimg)}})">
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
</div> -->
<!--  Ending of review carousel area   -->
@endif
<!--  @if($gs->bl == 1)
{{--  Slidernew  --}}
@if($gs->hv == 1)
Starting of featured product area   -->
<!-- <div class="container-fluid" style="padding-top: 10px;padding-bottom: 4px;">
<div class="row">
<div class="col-lg-12">
<h2 class="link-desshop">Just For You</h2>
<a class="btn viewallcat-btn"  href="#">View all <span class="fa fa-arrow-right"></span></a>
</div>
</div>
</div>
<div class="section-padding featured-product-wrap wow fadeInUp" style="margin-bottom: 10px;">
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
    <div class="owl-carousel new-carousel text-center">
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-1.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-2.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-3.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
    <div class="owl-carousel new-carousel text-center">
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-1.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-2.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-3.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
    <div class="owl-carousel new-carousel text-center">
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-1.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-2.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-3.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
    <div class="owl-carousel new-carousel text-center">
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-1.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-2.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-3.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
    <div class="owl-carousel new-carousel text-center">
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-1.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-2.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-3.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
    <div class="owl-carousel new-carousel text-center">
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-1.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-2.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
        <div class="newowldiv1">
            <a href="">
                <img src="{{asset('assets/img/insta-3.jpg')}}" alt="img1">
            </a>
            <h4 class="newowlh5 text-center"> <span class="newowl12">30%</span> &nbsp off</h4>
            <span><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
            <h5 class="newowlh2">PKR 2000 <del class="newowldel">PKR 1000</del></h5>
        </div>
    </div>
</div>
</div>
</div>
</div> -->
<!--  Ending of featured product area   -->
@endif
{{--  End Slidernew  --}}
<!-- <div class="col-lg-12">
{{--  Slider3  --}}
@if($gs->hv == 1)
<!--  Starting of featured product area   -->
<div class="section-padding featured-product-wrap wow fadeInUp" style="margin-top: 5px !important;margin-bottom: 5px !important;">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="product-type-tab">
            
            <div class="tab-content">
                <div id="bestSeller" class="tab-pane active">
                    <div class="owl-carousel review-carouselsss">
                        
                        @foreach($brands->chunk(5) as $brandz)
                        
                        @foreach($brandz as $brand)
                        <a href="{{$brand->url}}" target="_blank">
                            <div class="newstylebrandns">
                                <h5 class="newstylebrandnsht">{{$brand->name}}</h5>
                                <img class="shopsimg-back" src="{{asset('assets/images/'.$brand->photo)}}" alt="client logo">
                                <p class="newstylebrandnsbl">shop now</p>
                            </div>
                        </a>
                        @endforeach
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
{{--  End Slider3  --}}
<!-- Ending of client logo area -->
@endif
<script src="{{asset('assets/front/js/main.js')}}"></script>
<script>
//---------Countdown-----------
$('#clock').countdown('{{$gs->count_date}}', function(event) {
$(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
});
function myFunction(id)
{
$('#extraData').load('{{url("category_index")}}'+"/"+id);
}
</script>
