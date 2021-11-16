@extends('layouts.front')
@section('content')
@php
$i=1;
$j=1;
@endphp
@section('styles')
@if(count($vendor->sliders) > 0)
@php
$k =1;
@endphp
<style type="text/css">
@foreach($vendor->sliders as $slider)
.carousel-bg-{{$k++}} {background-image: url({{asset('assets/images/'.$slider->photo)}});}
@endforeach
</style>
@endif
@endsection

<!-- Starting of Section title overlay area -->
<div class="title-overlay-wrap overlay" id="title-overlay-wrap" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 text-left">
        <img src="{{asset('assets/front/images/SPORT.png')}}" class="imgbgtopvendor" alt="logo">
        
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
        <h1> <a href="{{route('front.vendor',str_replace(' ', '-',($vendor->shop_name)))}}" style="color: black;">{{$vendor->shop_name}}</a><br></h1>
        
      </div>
    </div>
  </div>
</div>
<div class="container-fluid" style="margin-bottom: 10px;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #f7f7f7;padding-top: 10px;padding-bottom: 5px;line-height: 20px;">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <p class="vendorfooterseperate">AT & T stadium Devport , IOWA</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
          <span><a href=" "><i class="fa fa-facebook faface"></i></a><a href=""><i class="fa fa-twitter faface"></i></a><a href=""><i class="fa fa-whatsapp faface"></i></a><a href=""><i class="fa fa-instagram faface"></i></a><a href=""><i class="fa fa-youtube faface"></i></a></span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Ending of Section title overlay area -->

    <!-- Starting of product category area -->
    <div class="section-padding product-category-wrap">
        <div class="container">
            <div class="row">

                @include('includes.catalog')

        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">


@if(count($vendor->sliders) > 0)
@php
$k =1;
@endphp
          <div class="vendor-carousel">
            <div class="row">
              <div class="col-lg-12">
                <div class="owl-carousel vendor-product-details-carousel">

                          @foreach($vendor->sliders as $slider)
                              <div class="owl-carousel vendor-single-product-details-item carousel-bg-{{$k++}}" data-dot="<img src='{{asset('assets/images/'.$slider->photo)}}'/>">
                              </div>
                          @endforeach

                </div>
              </div>
            </div>
          </div>
@endif


                    <div class="category-wrap">
                        <div class="row">
                                @foreach($vchildcats as $prod)

    {{-- LOOP STARTS --}}
                                {{-- If This product belongs to vendor then apply this --}}
                                @if($prod->user_id != 0)

                                {{-- check  If This vendor status is active --}}
                                @if($prod->user->is_vendor == 2)
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp

                            @if(isset($max))  
                            @if($price < $max)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>

                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    @if($prod->pprice != 0)
                      <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
                      @endif

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    @if($prod->pprice != 0)
                      <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
                      @endif
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif
                            @else                  
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                            <div class="product-name">{{strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name}}</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:{{App\Models\Review::ratings($prod->id)}}%"></div>
                                                  </div>
                            </div>

                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                      {{round($price * $curr->value,2)}}
                    @if($prod->pprice != 0)
                      <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
                      @endif

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($price * $curr->value,2)}}
                    @if($prod->pprice != 0)
                      <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
                      @endif
{{$curr->sign}}
                                        </div>
                                    @endif
                          </div>
                        </a>

                            </div>
                            @endif
                            @endif

                                {{-- Otherwise display products created by admin --}}

                                @else


                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                    @if($prod->pprice != 0)
                      <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
                      @endif

                                        </div>
                                    @else
                                        <div class="product-price">
                      {{round($prod->cprice * $curr->value,2)}}
                    @if($prod->pprice != 0)
                      <del class="offer-price">{{$curr->sign}}{{round($prod->pprice * $curr->value,2)}}</del>  
                      @endif
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


                @if(isset($min) || isset($max))
                    <div class="row">
                        <div class="col-md-12 text-center"> 
                            {!! $vchildcats->appends(['min' => $min, 'max' => $max])->links() !!}               
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12 text-center"> 
                            {!! $vchildcats->links() !!}               
                        </div>
                    </div>
                @endif
                    </div>
        </div>        
            </div>
        </div>
    </div>
    <!-- Ending of product category area -->

@endsection

@section('scripts')
<script type="text/javascript">
        $("#sortby").change(function () {
        var sort = $("#sortby").val();
        window.location = "{{url('/vendor')}}/{{str_replace(' ', '-',($vendor->shop_name))}}/childcategory/{{$vchildcat->child_slug}}/"+sort;
    });
</script>


<script type="text/javascript">
            $("#ex2").slider({});
        $("#ex2").on("slide", function(slideRange) {
            var totals = slideRange.value;
            var value = totals.toString().split(',');
            $("#price-min").val(value[0]);
            $("#price-max").val(value[1]);
        });
</script>


@endsection