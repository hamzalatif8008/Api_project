@extends('layouts.front')
@section('content')
    <style type="">
      h4{
  font-size: 16px;
  font-weight: 600;
}
.head-bgadv{

  height: 400px;
  width: 100%;
  background-attachment: fixed;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
@media(max-width: 991px){
  .head-bgadv{
    height: 350px;
    background-position: center !important;
  }
}
.form-control{
  width: 100%;
  height: 35px;
  font-size: 14px;
  line-height: 20px;
}
button , .form-control:focus{
outline: none !important;
box-shadow: none !important;
border: 1px solid black;
}
.advsear-btn{
  width: 100%;
  height: 35px;
  background-color: #E7AB3C;
  color: white;
  font-size: 15px;
  font-weight: 600;
  line-height: 0px;
  text-transform: capitalize;
}
.advsear-btn:hover{
  color: white !important;
}
.anchoradvsear{
color: #E7AB3C !important;
text-decoration: none;
text-transform: capitalize; 
font-size: 15px;
font-weight: 600;
}
.product-name {
        font-size: 15px;
        color: #121212;
        height: 35px;
        line-height: 1.3;
        font-weight: 500
        }
        .product-price {
        font-size: 20px;
        font-weight: 500;
        color: #E47F14 !important
        }
        .product-review .fa-star {
        position: relative
        }
        .product-review .fa-star:before {
        position: absolute;
        content: "\f005\f005\f005\f005\f005";
        left: 50%;
        top: -10px;
        color: #FFC000;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%)
        }
        .product-description {
        line-height: 30px;
        padding: 10px 10px
        }
        .single-product-area {
        border: 1px solid #E0E0E0;
        box-shadow: 0 0 5px #F2F2F2;
        display: block;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        position: relative;
        overflow: hidden;
        -webkit-transition: all .3s ease-in;
        transition: all .3s ease-in;
        margin-bottom: 30px
        }
        .single-product-area:before {
        content: "";
        position: absolute;
        z-index: -1;
        left: 100%;
        right: 0;
        bottom: 0;
        background: #fff !important;
        height: 2px;
        -webkit-transition-property: left;
        transition-property: left;
        -webkit-transition-duration: .3s;
        transition-duration: .3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out
        }
        .single-product-area:active:before,
        .single-product-area:focus:before,
        .single-product-area:hover:before {
        left: 0
        }
        .product-image-area {
        position: relative;
        width: 100%;
        height: 262px;
        overflow: hidden
        }
        .category-wrap .product-image-area {
        width: 100%;
        height: 276px
        }
        .product-image-area img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        -webkit-transform: scale(1, 1);
        transform: scale(1, 1);
        -webkit-transition: all .4s ease-in;
        transition: all .4s ease-in
        }
        .single-product-area:hover img {
        -webkit-transform: scale(1.1, 1.1);
        transform: scale(1.1, 1.1);
        }
        .featured-tag span {
        position: relative;
        background: #000 !important;
        color: #fff;
        font-size: 12px;
        font-weight: 500;
        padding: 5px 8px;
        margin-right: 2px;
        display: inline-block;
        margin-bottom: 10px
        }
        .featured-tag span:after {
        position: absolute;
        right: 5px;
        bottom: -10px;
        content: "";
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 10px solid #000 !important;
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg)
        }
        .featured-tag {
        position: absolute;
        left: 0;
        top: 0;
        padding: 5px;
        text-align: left;
        z-index: 3
        }
        .product-hover-area {
        position: absolute;
        width: 100%;
        left: 0;
        bottom: -15%;
        opacity: 0;
        visibility: hidden;
        z-index: 3;
        -webkit-transition: all .4s ease-in;
        transition: all .4s ease-in;
        z-index: 36;
        }
        .single-product-area:hover {
        border-color: #ddd !important;
        text-decoration: none;
        }
        .single-product-area:hover .product-hover-area {
        bottom: 20px;
        opacity: 1;
        visibility: visible
        }
        span.hovertip {
        position: relative;
        display: inline-block;
        height: 40px;
        width: 40px;
        border-radius: 100%;
        text-align: center;
        line-height: 40px;
        color: #E47F14 !important;
        background: #fff;
        font-size: 18px;
        -webkit-transition: all .3s ease-in;
        transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
        transition: all .3s ease-in;
        transform: scale(.9)
        }
        span.hovertip:hover {
        color: #fff !important;
        background: #E47F14 !important;
        transform: scale(1)
        }
        span.wish-number {
        position: absolute;
        color: #fff;
        background: #E47F14 !important;
        right: 30px;
        bottom: 50%;
        height: 18px;
        width: auto;
        line-height: 18px;
        font-size: 10px;
        border-radius: 30px;
        padding: 0 5px;
        text-align: right
        }
        .product-hover-top {
        position: absolute;
        left: 50%;
        margin-left: -25px;
        right: auto;
        top: 35%;
        z-index: 36;
        border-radius: 100%;
        -webkit-transform: scale(.8);
        -ms-transform: scale(.8);
        transform: scale(.8);
        -webkit-transition: all .7s ease-in;
        -moz-transition: all .7s ease-in;
        -ms-transition: all .7s ease-in;
        -o-transition: all .7s ease-in;
        transition: all .7s ease-in;
        opacity: 0;
        visibility: hidden
        }
        .single-product-area:hover .product-hover-top {
        opacity: 1;
        visibility: visible;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
        }
        .product-hover-top span {
        display: inline-block;
        -webkit-transition: all .3s ease-in;
        transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
        transition: all .3s ease-in;
        color: #fff;
        font-size: 50px
        }
        .product-hover-top span:hover {
        color: #E47F14 !important
        }
        .review-star {
        padding: 20px 0
        }
        .ratings {
        position: relative;
        vertical-align: middle;
        display: inline-block;
        color: #B1B1B1;
        overflow: hidden
        }
        .empty-stars:before{
        content: "\2605\2605\2605\2605\2605";
        font-size: 14pt
        }
        .empty-stars:before {
        -webkit-text-stroke: 1px #E47F14;
        color: transparent
        }
        .mean-container .mean-nav {
        max-height: 500px;
        overflow-y: scroll
        }
        .owl-stage {
        width: 6728px
        }
        .category-wrap .single-product-area {
        margin-bottom: 15px
        }
        .category-wrap>.row>.col-lg-4 {
        padding-left: 7.5px;
        padding-right: 7.5px
        }
        .product-price .offer-price {
        font-size: 12px;
        color: #0c0c0c99
        }
        @media only screen and (max-width:767px) {
        .productDetails-header-info a{
        color: #E47F14 !important;
        border: 1px solid #E47F14 !important
        }
        .single-product-area {
        max-width: 300px;
        margin: 30px auto
        }
        .product-image-area {
        height: 300px;
        width: 300px
        }
        .category-wrap .product-image-area {
        height: 300px;
        width: 300px
        }
        }
    </style>

    <div class="container ">
      <div class="row">
        <div class="col-lg-12">
          <span><a href="" class="anchoradvsear"> home</a> <span class="text-black-50" style="font-size: 14px;">> Advance search</span></span>
        </div>
      </div>
    </div>
    <div class="container my-3" style="margin-top: 10px;">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h4 class="text-black-50 text-uppercase">Enter keywords or product name</h4>
        </div>
          <form action="{{route('productsearch')}}"  method="get">
           @csrf
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Enter keywords or product name" name="name">
                </div>
            </div>
            {{--  <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
              
                <div class="form-group">
                  <select  class="form-select form-control" aria-label="Default select example " >
                    <option value="">Any words ,any order</option>
                    <option value="">Exact words ,exact order</option>
                    <option value="">Exact word ,any order</option>
                  </select>
                </div>
             
            </div>  --}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
            
                <div class="form-group">
                  <select  class="form-select form-control" aria-label="Default select example " name="category">
                  @php
                    $catgories  = App\Models\Category::get();
                  @endphp
                    <option selected disabled>All Categories</option>
                    @foreach($catgories as $catgory)
                    <option value="{{$catgory->id}}">{{$catgory->cat_name}}</option>
                    @endforeach
                  </select>
                </div>
             
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
              
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Price from PKR" name="min" min="0" >
                </div>
             
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
              
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="To PKR" name="max" min="0">
                </div>
             
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 text-center mt-2">
              <button class="btn advsear-btn" type="submit">search</button>
            </div>
          </form>

      </div>
    </div>
    <div class="container my-2">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h4 class="text-black-50 text-uppercase">Search shop</h4>
        </div>
           <form action="{{route('shopsearch')}}"  method="get">
           @csrf
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Enter keywords or name" name="shop_name">
                </div>
            </div>
            
            {{--  <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
              
                <div class="form-group">
                  <select  class="form-select form-control" aria-label="Default select example " >
                    <option selected disabled>Search By Categories</option>
                    @foreach($catgories as $catgory)
                    <option value="{{$catgory->id}}">{{$catgory->cat_name}}</option>
                    @endforeach
                  </select>
                </div>
              
            </div>  --}}

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 text-center mt-2">
              <button class="btn advsear-btn" type="submit">search</button>
            </div>
        </form>

      </div>
    </div>
    <div class="container my-2">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h4 class="text-black-50 mt-2 text-uppercase">Search Brand</h4>
        </div>
        <form action="{{route('brandsearch')}}"  method="get">
           @csrf
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter keywords or name" name="brand">
            </div>
          
        </div>
        
        {{--  <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
            <div class="form-group">
              <select  class="form-select form-control" aria-label="Default select example " name="category">
                <option selected disabled>Search By Categories</option>
                 @foreach($catgories as $catgory)
                <option value="{{$catgory->id}}">{{$catgory->cat_name}}</option>
                @endforeach
              </select>
            </div>
        </div>  --}}
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 text-center mt-2">
          <button class="btn advsear-btn" type="submit">search</button>
        </div>
        </form>
         
      </div>
    </div>

    <div class="container my-2">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h4 class="text-black-50  text-uppercase">Search Franchise</h4>
        </div>
        <form action="{{route('frenchisesearch')}}"  method="get">
           @csrf
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
          
            <div class="form-group">
              <select  class="form-select form-control" id="prov" name="province" aria-label="Default select example " >
                @php
                    $countries = App\Models\Country::groupBy('admin_name')->get();
                @endphp 
               <option selected disabled>Select Province</option>

                 @foreach($countries as $country)
                      <option value="{{$country->admin_name}}">{{$country->admin_name}}</option> 
                  @endforeach
                
              </select>
            </div>
          
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
          
            <div class="form-group">
              <select  class="form-select form-control" id="city"  name="city" aria-label="Default select example " disabled="">
                <option selected disabled>Select City</option>
              </select>
            </div>
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
         
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter keywords or name" name="f_name">
            </div>
        
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
         
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter Address" name="f_address">
            </div>
        

        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 text-center mt-2">
          <button class="btn advsear-btn" type="submit">search</button>
        </div>
        </form>
      </div>
    </div>
    <br>
  @if(isset($products))
    <div class="container">
      <div class="category-wrap">
        <div class="row">
          @if(isset($products))
            @foreach($products as $product)
              @php
                $name = str_replace(" ","-",$product->name);
              @endphp
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('front.product',['id' => $product->id, 'slug' => $name])}}" class="single-product-area text-center">
                  <div class="product-image-area">
                      {{--  <div class="featured-tag" style="width: 100%;">
                          <span id="d{{$i++}}" style="background: {{$dtl}}">speakers</span>
                          <span id="d{{$i++}}" style="background: {{$dtl}}">speakers</span>
                      </div>  --}}
                      <img src="{{asset('assets/images/'.$product->photo)}}" style="width: 100%;" alt="featured product">
                      <div class="product-hover-top">
                          <span class="fancybox" data-fancybox href=""><i class="fa fa-play-circle"></i></span>
                      </div>
                      <div class="gallery-overlay"></div>
                      <div class="gallery-border"></div>
                      <div class="product-hover-area">
                          <input type="hidden" value="">
                          <span class="wishlist hovertip no-wish" data-toggle="modal" data-target="#loginModal" rel-toggle="tooltip" title="Add to wishlist"><i class="fa fa-heart"></i>
                              <span class="wish-number">2</span>
                          </span>
                          <span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="quick view"><i class="fa fa-eye"></i>
                          </span>
                          <span class="hovertip addcart" rel-toggle="tooltip" title="Add to Cart"><i class="fa fa-cart-plus"></i>
                          </span>
                          <span class="hovertip compare" rel-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i>
                          </span>
                      </div>
                  </div>
                  <div class="product-description  text-center">
                    <div class="product-name">{{strlen($product->name) > 50 ? substr($product->name,0,50)."..." : $product->name}}</div>
                    <div class="product-review">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                        </div>
                    </div>
                    <div class="product-price ">@if($product->user_id != 0)
                        @php
                          $price = $product->cprice + $gs->fixed_commission + ($product->cprice/100) * $gs->percentage_commission ;
                        @endphp
                        {{number_format(round($price * $curr->value,2))}}
                        @else
                        {{number_format(round($product->cprice * $curr->value,2))}}
                        @endif
                        <del class="offer-price">{{$curr->sign}}{{number_format(round($product->pprice * $curr->value,2))}}</del>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  @elseif (isset($shops))
    <div class="container">
      <div class="category-wrap">
        <div class="row">
          @if(isset($shops))
            @foreach($shops as $shop)
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('front.vendor',str_replace(' ', '-',($shop->shop_name)))}}" class="single-product-area text-center">
                  <div class="product-image-area">
                      {{--  <div class="featured-tag" style="width: 100%;">
                          <span id="d{{$i++}}" style="background: {{$dtl}}">speakers</span>
                          <span id="d{{$i++}}" style="background: {{$dtl}}">speakers</span>
                      </div>  --}}
                      <img src="{{asset('assets/images/'.$shop->logo)}}" class="img-fluid allshopspageimg" alt="">
                     
                      <div class="gallery-overlay"></div>
                      <div class="gallery-border"></div>
                      
                  </div>
                  <div class="product-description  text-center">
                    <div class="product-name">{{$shop->shop_name}}</div>
                    <div class="product-review">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                        </div>
                    </div>
                    {{--  <div class="product-price ">@if($product->user_id != 0)
                        @php
                          $price = $product->cprice + $gs->fixed_commission + ($product->cprice/100) * $gs->percentage_commission ;
                        @endphp
                        {{number_format(round($price * $curr->value,2))}}
                        @else
                        {{number_format(round($product->cprice * $curr->value,2))}}
                        @endif
                        <del class="offer-price">{{$curr->sign}}{{number_format(round($product->pprice * $curr->value,2))}}</del>
                    </div>  --}}
                      <p class="allshopspagep"><span class="allshopspagesp">{{count($shop->products()->get())}} </span>Total Products</p>

                  </div>
                </a>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  @elseif(isset($brands))
    <div class="container">
      <div class="category-wrap">
        <div class="row">
          @if(isset($brands))
            @foreach($brands as $brand)
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('front.vendor',str_replace(' ', '-',($brand->shop_name)))}}" class="single-product-area text-center">
                  <div class="product-image-area">
                      {{--  <div class="featured-tag" style="width: 100%;">
                          <span id="d{{$i++}}" style="background: {{$dtl}}">speakers</span>
                          <span id="d{{$i++}}" style="background: {{$dtl}}">speakers</span>
                      </div>  --}}
                      <img src="{{asset('assets/images/'.$brand->photo)}}" class="img-fluid allshopspageimg" alt="">
                      <div class="product-hover-top">
                          <span class="fancybox" data-fancybox href=""><i class="fa fa-play-circle"></i></span>
                      </div>
                      <div class="gallery-overlay"></div>
                      <div class="gallery-border"></div>
                      
                  </div>
                  <div class="product-description  text-center">
                    <div class="product-name">{{$brand->shop_name}}</div>
                    <div class="product-review">
                        <div class="ratings">
                            <div class="empty-stars"></div>
                        </div>
                    </div>
                    {{--  <div class="product-price ">@if($product->user_id != 0)
                        @php
                          $price = $product->cprice + $gs->fixed_commission + ($product->cprice/100) * $gs->percentage_commission ;
                        @endphp
                        {{number_format(round($price * $curr->value,2))}}
                        @else
                        {{number_format(round($product->cprice * $curr->value,2))}}
                        @endif
                        <del class="offer-price">{{$curr->sign}}{{number_format(round($product->pprice * $curr->value,2))}}</del>
                    </div>  --}}
                      <p class="allshopspagep"><span class="allshopspagesp">{{count($brand->products()->get())}} </span>Total Products</p>

                  </div>
                </a>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>  
  @elseif(isset($frenchises))
    <div class="container">
      <div class="category-wrap">
        <div class="row">
          @if(isset($frenchises))
          <div class="container frenchisealllistcontainer">
            <div class="row">
            @foreach($frenchises as $fcity)
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 frenchisealllistdiv">
              <span ><b><span class="frenchisealltext">{{$fcity->frenchise_name}}</span></b> </span><br>
              <span ><i class="fa fa-map-marker frenchiseallfa"></i><span class="frenchisealltext">{{$fcity->frenchise_address}}</span> </span><br>
              <span ><i class="fa fa-phone-square frenchiseallfa"></i><span class="frenchisealltext">{{$fcity->frenchise_mobile_number}}</span> </span><br>
              <span ><i class="fa fa-envelope frenchiseallfa"></i><span class="frenchisealltext">{{$fcity->email}}</span> </span><br>
              <span ><i class="fa fa-users frenchiseallfa"></i><span class="frenchisealltext">total vendors({{count(App\Models\User::where('frenchise_id',$fcity->id)->get())}})</span> </span><br>
              <div class="frenchisesocialrow">
                <span><a href=" "><i class="fa fa-facebook fafrenchiselist1"></i></a><a href=""><i class="fa fa-twitter fafrenchiselist"></i></a><a href=""><i class="fa fa-whatsapp fafrenchiselist"></i></a><a href=""><i class="fa fa-instagram fafrenchiselist"></i></a><a href=""><i class="fa fa-youtube fafrenchiselist"></i></a></span>
              </div>
            </div>
            @endforeach
             </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  @endif  
  
  @endsection
  @section('scripts')
  
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

@endsection