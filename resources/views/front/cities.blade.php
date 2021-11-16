@extends('layouts.front')
@section('content')
<!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" id="title-overlay-wrap2">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1 class="text-capitalize">Faisalabad</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->

    <!-- Starting of product category area -->
    <div class="section-padding product-category-wrap" style="margin-top: 10px;">
        <div class="container">
            <div class="row">
  @include('includes.catalogcountry')

                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <div class="category-wrap">
                        <div class="row">
                                
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                   
                        <a href="" class="single-product-area text-center">
                          <div class="product-image-area">
                                            
                                            <div class="featured-tag" style="width: 100%;">
                                              
                                              
                                              <span id="" style="">SR</span>
                                             
                                            </div>
                                            
                            <img src="{{asset('assets/537f497243d6ec5e-1200x675.jpg')}}" alt="featured product">
                            <div class="product-hover-top">
                              <span class="fancybox" data-fancybox href=""><i class="fa fa-play-circle"></i></span>
                            </div>

                            <div class="gallery-overlay"></div>
<div class="gallery-border"></div>
<div class="product-hover-area">
                    <input type="hidden" value="">
                      <span class="wishlist hovertip uwish" rel-toggle="tooltip" title=""><i class="fa fa-heart"></i>
                                <span class="wish-number">12</span>
                              </span>
                      
                              <span class="hovertip addcart" rel-toggle="tooltip" title="vc"><i class="fa fa-cart-plus"></i>
                              </span>
                              <span class="hovertip compare" rel-toggle="tooltip" title="bv"><i class="fa fa-exchange"></i>
                              </span>
                            </div>

                          </div>
                          <div class="product-description text-center">
                            <div class="product-name">Seth Rollins hahahahaha</div>
                            <div class="product-review">
                                                  <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" ></div>
                                                  </div>
                            </div>

                                        <div class="product-price">1234
                      <del class="offer-price">123</del>  
                    

                                        </div>
                                  
                          </div>
                        </a>

                            </div>
                            

                
                    <div class="row">
                        <div class="col-md-12 text-center"> 
                                          
                        </div>
                    </div>



                    </div>
                </div>              
            </div>
        </div> 
    </div>
    <!-- Ending of product category area -->
@endsection