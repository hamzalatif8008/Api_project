@extends('layouts.admin')

@if($data->rtl == 1)

@section('styles')
<style type="text/css">
  input[type=text] {
    direction:  rtl;
  }
</style>

@endsection

@endif

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Contact Page Content -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Update Language <a href="{{ route('admin-lang-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Language Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                              <form class="form-horizontal" action="{{route('admin-lang-update',$data->id)}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')      
                                        {{csrf_field()}}

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="rtl">Language Direction *</label>
                                            <div class="col-sm-6">
                                              <select id="rtl" class="form-control" name="rtl">
                                                <option value="0" {{ $data->rtl == 0 ? 'selected' : '' }}>Left To Right</option>
                                                <option value="1" {{ $data->rtl == 1 ? 'selected' : '' }}>Right To Left</option>
                                              </select>
                                            </div>
                                          </div>
<hr style="margin-top: 20px; margin-bottom: 20px;">

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Language Name *</label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="language" placeholder="Language Name" value="{{$data->language}}" required="">
                                            </div>
                                          </div>
<hr style="margin-top: 20px; margin-bottom: 20px;">

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">All Categories *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="all_categories" placeholder="All Categories Text" value="{{$data->all_categories}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Home *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="home" placeholder="Home" value="{{$data->home}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">About *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="about" placeholder="About Text" value="{{$data->about}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blog" placeholder="blog Text" value="{{$data->blog}}" required="">
                                            </div>
                                          </div>       
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blogs *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogs" placeholder="Blogs Text" value="{{$data->blogs}}" required="">
                                            </div>
                                          </div>                                                                
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogss" placeholder="Blog Details" value="{{$data->blogss}}" required="">
                                            </div>
                                          </div>   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Recent Posts *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogsss" placeholder="Recent Posts Text" value="{{$data->blogsss}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Contact *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contacts" placeholder="Blog Contact Text" value="{{$data->contacts}}" required="">
                                            </div>
                                          </div>                
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="faq" placeholder="Faq Text" value="{{$data->faq}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="faqs" placeholder="Faq Title Text" value="{{$data->faqs}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Page Header *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="maq" placeholder="Faq Page Header Text" value="{{$data->maq}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contact" placeholder="Contact Text" value="{{$data->contact}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Others *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="others" placeholder="Others Text" value="{{$data->others}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Heading *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="search" placeholder="Search Heading Text" value="{{$data->search}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Placeholder *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ec" placeholder="Search Placeholder Text" value="{{$data->ec}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Front Page Wish List *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wishlists" placeholder="Front Page Wish List Text" value="{{$data->wishlists}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Front Page Wish List Heading *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_head" placeholder="Front Page Wish List Heading Text" value="{{$data->wish_head}}" required="">
                                            </div>
                                          </div>                                          
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Account *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fh" placeholder="My Account Text" value="{{$data->fh}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fht" placeholder="My Cart Text " value="{{$data->fht}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Empty *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="h" placeholder="Cart Empty Text" value="{{$data->h}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Total *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vt" placeholder="Total Text" value="{{$data->vt}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Checkout *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="gt" placeholder="Checkout Text" value="{{$data->gt}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vdn" placeholder="View Cart Text " value="{{$data->vdn}}" required="">
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Top Category *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bgs" placeholder="Top Category Text" value="{{$data->bgs}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Featured Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="featured_product" placeholder=">Featured Products Text" value="{{$data->featured_product}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Featured *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bg" placeholder="Featured Text" value="{{$data->bg}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Best Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="lm" placeholder="Best Seller Text" value="{{$data->lm}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Top Rate *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="rds" placeholder="Top Rate Text" value="{{$data->rds}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Arrival Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_arrival" placeholder=">New Arrival Products Text" value="{{$data->new_arrival}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Hot Sale *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hot_sale" placeholder=">Hot Sale Text" value="{{$data->hot_sale}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Special *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="latest_special" placeholder="Latest Special Text" value="{{$data->latest_special}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Big Save *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="big_sale" placeholder="Big Save Text" value="{{$data->big_sale}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Weeks *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="week" placeholder="Weeks Text" value="{{$data->week}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Days *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="day" placeholder="Days Text" value="{{$data->day}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Hours *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hour" placeholder="Hours Text" value="{{$data->hour}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Minutes *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="minute" placeholder="Minutes Text" value="{{$data->minute}}" required="">
                                            </div>
                                          </div>                                                       
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Seconds *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="second" placeholder="Seconds Text" value="{{$data->second}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Now *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_now" placeholder="Shop Now Text" value="{{$data->shop_now}}" required="">
                                            </div>
                                          </div>                               
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hcs" placeholder="Add To Cart Text" value="{{$data->hcs}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Out Of Stock *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dni" placeholder="Out Of StockText" value="{{$data->dni}}" required="">
                                            </div>
                                          </div>
 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Available *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sbg" placeholder="Available Text" value="{{$data->sbg}}" required="">
                                            </div>
                                          </div>
  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quantity *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dopd" placeholder="Quantity Text" value="{{$data->dopd}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Size *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doo" placeholder="Size Text" value="{{$data->doo}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Color *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="colors" placeholder="Color Text" value="{{$data->colors}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quick Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dol" placeholder="Quick Review Text" value="{{$data->dol}}">
                                            </div>
                                          </div>                                         
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Filter Option *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doa" placeholder="Filter Option Text" value="{{$data->doa}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Latest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doe" placeholder="Sort Latest Text " value="{{$data->doe}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Oldest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dor" placeholder="Sort Oldest Text " value="{{$data->dor}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Lowest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dopr" placeholder="Sort Lowest Text " value="{{$data->dopr}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Highest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doc" placeholder="Sort Highest Text" value="{{$data->doc}}">
                                            </div>
                                          </div>
<!-- ****************************** DONE ******************** -->   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">All Categories *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doci" placeholder="All Categories Text" value="{{$data->doci}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Price *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dosp" placeholder="Price Text" value="{{$data->dosp}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Price Search *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="don" placeholder="Price Search Text" value="{{$data->don}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Popular Tags *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doem" placeholder="Popular Tags Text" value="{{$data->doem}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tag *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dom" placeholder="Tag Text" value="{{$data->dom}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Result *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ss" placeholder="Search Result Text" value="{{$data->ss}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reviews *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dttl" placeholder="Reviews Text" value="{{$data->dttl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_detail" placeholder="Product Details Text" value="{{$data->product_detail}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ddesc" placeholder="Full Description Text" value="{{$data->ddesc}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Return & Policy *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ppr" placeholder="Return & Policy Text" value="{{$data->ppr}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write a Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpr" placeholder="Write a Review Text" value="{{$data->fpr}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Submit Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="size" placeholder="Submit Review Text" value="{{$data->size}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="md" placeholder="No Review Text" value="{{$data->md}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Related Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="amf" placeholder="Related Products Text" value="{{$data->amf}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Your Rating *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dofpl" placeholder="Your Rating Text" value="{{$data->dofpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Remove *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cremove" placeholder="Cart Remove Text" value="{{$data->cremove}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Image *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cimage" placeholder="Cart Image Text" value="{{$data->cimage}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Product Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cproduct" placeholder="Cart Product Name Text" value="{{$data->cproduct}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Edit *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cedit" placeholder="Cart Edit Text" value="{{$data->cedit}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Quantity *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cquantity" placeholder="Cart Quantity Text" value="{{$data->cquantity}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Unit Price *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cupice" placeholder="Cart Unit Price Text" value="{{$data->cupice}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Sub Total *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cst" placeholder="Cart Sub Total Text" value="{{$data->cst}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Continue Shopping *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ccs" placeholder="Continue Shopping Text" value="{{$data->ccs}}" required="">
                                            </div>
                                          </div>



                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Proceed Checkout *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cpc" placeholder="Proceed Checkout Text" value="{{$data->cpc}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="odetails" placeholder="Order Details Text " value="{{$data->odetails}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Billing Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bdetails" placeholder="Billing Details Text " value="{{$data->bdetails}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shipping Cost *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ship" placeholder="Shipping Cost Text " value="{{$data->ship}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Now *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="onow" placeholder="Order Now Text " value="{{$data->onow}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Payment Method *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cup" placeholder="Payment Method Text" value="{{$data->cup}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Paypal *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pp" placeholder="Paypal Text" value="{{$data->pp}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Credit Card *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="app" placeholder="Credit Card Text" value="{{$data->app}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Mobile Money *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dotpl" placeholder="Mobile Money Text " value="{{$data->dotpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Bank Wire *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dogpl" placeholder="Bank Wire Text" value="{{$data->dogpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cash On Delivery *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dolpl" placeholder="Cash On Delivery Text" value="{{$data->dolpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Ship To Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ships" placeholder="Ship To Address Text " value="{{$data->ships}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Ship To Another Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipss" placeholder="Ship To Another Address Text " value="{{$data->shipss}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pick Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickup" placeholder="Pick Up Text" value="{{$data->pickup}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pick Up Location *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickups" placeholder="Pick Up Location Text" value="{{$data->pickups}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Notes *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="onotes" placeholder="Order Notes Text" value="{{$data->onotes}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Transaction *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="tid" placeholder="Transaction Text" value="{{$data->tid}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">PickUp Location *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickupss" placeholder="Transaction Text" value="{{$data->pickupss}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="con" placeholder="Contact Name Text" value="{{$data->con}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Phone *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cop" placeholder="Contact Phone Text" value="{{$data->cop}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Email *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="coe" placeholder="Contact Email Text" value="{{$data->coe}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Reply *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cor" placeholder="Contact Replay Text" value="{{$data->cor}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Enter Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="enter_code" placeholder="Contact Enter Code Text" value="{{$data->enter_code}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign In / Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signinup" placeholder="Sign In / Up Text" value="{{$data->signinup}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign In *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signin" placeholder="Sign In Text" value="{{$data->signin}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Login *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sie" placeholder="Login Text" value="{{$data->sie}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="spe" placeholder="Sign Up Password Text" value="{{$data->spe}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signup" placeholder="Sign Up Text" value="{{$data->signup}}" required="">
                                            </div>
                                          </div>



                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sup" placeholder="Sign Up Password Text" value="{{$data->sup}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Confirm Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sucp" placeholder="Sign Up Confirm Password Text" value="{{$data->sucp}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Dashboard Welcome *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="welcome" placeholder="Enter Your Input" value="{{$data->welcome}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Profile *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit" placeholder="Edit Profile Text" value="{{$data->edit}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reset Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reset" placeholder="Reset Password Text" value="{{$data->reset}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Orders *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cn" placeholder="Create New Account Text" value="{{$data->cn}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Out *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="logout" placeholder="Sign Out Text" value="{{$data->logout}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Current Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cp" placeholder="Current Password Text" value="{{$data->cp}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="np" placeholder="New Password Text" value="{{$data->np}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Re-Type New Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="rnp" placeholder="Re-Type New Password Text" value="{{$data->rnp}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Change Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="chnp" placeholder="Change Password Text" value="{{$data->chnp}}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Video Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="video_title" placeholder="Video Title Text" value="{{$data->video_title}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Blogs *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="lns" placeholder="Latest Blogs Text" value="{{$data->lns}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Details Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vd" placeholder="View Details Text" value="{{$data->vd}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Review Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="review_title" placeholder="Review Title Text" value="{{$data->review_title}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Happy Customer *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sue" placeholder="Happy Customer Text" value="{{$data->sue}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ston" placeholder="Subscribe Text" value="{{$data->ston}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="s" placeholder="Subscribe Button Text" value="{{$data->s}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Placeholder *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="supl" placeholder="Subscribe Placeholder Text" value="{{$data->supl}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Footer Links *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fl" placeholder="Footer Links Text" value="{{$data->fl}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sm" placeholder="Contact Button Text" value="{{$data->sm}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpw" placeholder="Forgot Password Text" value="{{$data->fpw}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpt" placeholder="Forgot Password Title" value="{{$data->fpt}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Email *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpe" placeholder="Forgot Password Email" value="{{$data->fpe}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpb" placeholder="Forgot Password Button" value="{{$data->fpb}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Already Account *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="al" placeholder="Already Account Text" value="{{$data->al}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Source *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bs" placeholder="Blog Source Text" value="{{$data->bs}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fname" placeholder="Full Name Text" value="{{$data->fname}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Phone Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doph" placeholder="HandyMan Phone Text" value="{{$data->doph}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Email Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doeml" placeholder="HandyMan Emali Text" value="{{$data->doeml}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">City *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doct" placeholder="City Text" value="{{$data->doct}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doad" placeholder="Address Text" value="{{$data->doad}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Fax *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dofx" placeholder="Fax Text" value="{{$data->dofx}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Postal Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="suph" placeholder="Postal Code Text" value="{{$data->suph}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Review Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="suf" placeholder="Sign Up Name Text" value="{{$data->suf}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doupl" placeholder="Update Button Text" value="{{$data->doupl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Success *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="success" placeholder=" Update Success Text" value="{{$data->success}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Country *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ctry" placeholder=" Enter Your Input" value="{{$data->ctry}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Select Country *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sctry" placeholder=" Enter Your Input" value="{{$data->sctry}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Coupon Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cpn" placeholder=" Enter Your Input" value="{{$data->cpn}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Enter Coupon *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ecpn" placeholder=" Enter Your Input" value="{{$data->ecpn}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Apply Coupon *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="acpn" placeholder=" Enter Your Input" value="{{$data->acpn}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Discount *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ds" placeholder=" Enter Your Input" value="{{$data->ds}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Final Total *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ft" placeholder=" Enter Your Input" value="{{$data->ft}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_name" placeholder=" Enter Your Input" value="{{$data->shop_name}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_description" placeholder=" Enter Your Input" value="{{$data->vendor_description}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Linked Accounts *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="linked_accounts" placeholder=" Enter Your Input" value="{{$data->linked_accounts}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Registration *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_registration" placeholder=" Enter Your Input" value="{{$data->vendor_registration}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Shop Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vshop_name" placeholder=" Enter Your Input" value="{{$data->vshop_name}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Owner Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="owner_name" placeholder=" Enter Your Input" value="{{$data->owner_name}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Shop Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_number" placeholder=" Enter Your Input" value="{{$data->shop_number}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Shop Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_address" placeholder=" Enter Your Input" value="{{$data->shop_address}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Registration Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reg_number" placeholder=" Enter Your Input" value="{{$data->reg_number}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="message" placeholder=" Enter Your Input" value="{{$data->message}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">This Field is Optional *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="optional" placeholder=" Enter Your Input" value="{{$data->optional}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sell *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sale" placeholder=" Enter Your Input" value="{{$data->sale}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">User Dashboard *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="user_dashboard" placeholder=" Enter Your Input" value="{{$data->user_dashboard}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Conversations *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="conv" placeholder=" Enter Your Input" value="{{$data->conv}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Conversation Alert *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_conv" placeholder=" Enter Your Input" value="{{$data->new_conv}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No New Converstions *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="no_conv" placeholder=" Enter Your Input" value="{{$data->no_conv}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Clear All *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="clear" placeholder=" Enter Your Input" value="{{$data->clear}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Favorite Product *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="favorite_product" placeholder=" Enter Your Input" value="{{$data->favorite_product}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Processing *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="order_processing" placeholder=" Enter Your Input" value="{{$data->order_processing}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Completed *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="order_completed" placeholder=" Enter Your Input" value="{{$data->order_completed}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Bonus *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_bonus" placeholder=" Enter Your Input" value="{{$data->affilate_bonus}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Current Balance *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="current_balance" placeholder=" Enter Your Input" value="{{$data->current_balance}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Item Sold *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="item_sold" placeholder=" Enter Your Input" value="{{$data->item_sold}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Total Earning *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="total_earning" placeholder=" Enter Your Input" value="{{$data->total_earning}}" required="">
                                            </div>
                                          </div>
 

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View All *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_all" placeholder=" Enter Your Input" value="{{$data->view_all}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Customer *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="customer" placeholder=" Enter Your Input" value="{{$data->customer}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Website *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_website" placeholder=" Enter Your Input" value="{{$data->view_website}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Dashboard *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dashboard" placeholder="Dashboard Text" value="{{$data->dashboard}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Wishlist *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_list" placeholder=" Enter Your Input" value="{{$data->wish_list}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Favorite Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="favorite_seller" placeholder=" Enter Your Input" value="{{$data->favorite_seller}}" required="">
                                            </div>
                                          </div>                                          
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Messages *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="messages" placeholder=" Enter Your Input" value="{{$data->messages}}" required="">
                                            </div>
                                          </div> 

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Purchased Items *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="purchased_item" placeholder=" Enter Your Input" value="{{$data->purchased_item}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Settings *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_settings" placeholder=" Enter Your Input" value="{{$data->affilate_settings}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Withdraw *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_withdraw" placeholder=" Enter Your Input" value="{{$data->affilate_withdraw}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_code" placeholder=" Enter Your Input" value="{{$data->affilate_code}}" required="">
                                            </div>
                                          </div> 
                                           <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tickets *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="support" placeholder="Enter Your Input" value="{{$data->support}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_products" placeholder=" Enter Your Input" value="{{$data->vendor_products}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Orders *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_orders" placeholder=" Enter Your Input" value="{{$data->vendor_orders}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Withdraw *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="withdraw" placeholder=" Enter Your Input" value="{{$data->withdraw}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Settings *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="settings" placeholder=" Enter Your Input" value="{{$data->settings}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sliders *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sliders" placeholder=" Enter Your Input" value="{{$data->sliders}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_description" placeholder=" Enter Your Input" value="{{$data->shop_description}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shipping Cost *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipping_cost" placeholder=" Enter Your Input" value="{{$data->shipping_cost}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Social Links *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="social_link" placeholder=" Enter Your Input" value="{{$data->social_link}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Apply For Vendor *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_apply" placeholder=" Enter Your Input" value="{{$data->vendor_apply}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Availability *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="availability" placeholder=" Enter Your Input" value="{{$data->availability}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Wishlist *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wishlist_add" placeholder=" Enter Your Input" value="{{$data->wishlist_add}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quick View *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="quick_view" placeholder=" Enter Your Input" value="{{$data->quick_view}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare" placeholder=" Enter Your Input" value="{{$data->compare}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Watch Video *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="watch_video" placeholder=" Enter Your Input" value="{{$data->watch_video}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Condition *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_condition" placeholder=" Enter Your Input" value="{{$data->product_condition}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Estimated Shipping Time *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipping_time" placeholder=" Enter Your Input" value="{{$data->shipping_time}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Favorite Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="add_seller" placeholder=" Enter Your Input" value="{{$data->add_seller}}" required="">
                                            </div>
                                          </div>  
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contact_seller" placeholder=" Enter Your Input" value="{{$data->contact_seller}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Phone Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="phone_number" placeholder=" Enter Your Input" value="{{$data->phone_number}}" required="">
                                            </div>
                                          </div>  
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Send Message To Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="send_message" placeholder=" Enter Your Input" value="{{$data->send_message}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor New Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_message" placeholder=" Enter Your Input" value="{{$data->new_message}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Send To *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="send_to" placeholder=" Enter Your Input" value="{{$data->send_to}}" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Subject *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_subject" placeholder=" Enter Your Input" value="{{$data->vendor_subject}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_message" placeholder=" Enter Your Input" value="{{$data->vendor_message}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Send Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_send" placeholder=" Enter Your Input" value="{{$data->vendor_send}}" required="">
                                            </div>
                                          </div>

                                  <div class="form-group">
                                      <label class="control-label col-sm-4" for="blood_group_display_name">Platform * <span>(In Any Language)</span></label>
                                      <div class="col-sm-6">
                                          <input class="form-control" name="platform" id="blood_group_display_name" placeholder="Enter Platform" value="{{$data->platform}}" required="" type="text" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-4" for="blood_group_display_name">Region * <span>(In Any Language)</span></label>
                                      <div class="col-sm-6">
                                          <input class="form-control" name="region" id="blood_group_display_name" placeholder="Enter Region" value="{{$data->region}}" required="" type="text" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-4" for="blood_group_display_name">Type * <span>(In Any Language)</span></label>
                                      <div class="col-sm-6">
                                          <input class="form-control" name="licence_type" id="blood_group_display_name" placeholder="Enter Type" value="{{$data->licence_type}}" required="" type="text" >
                                      </div>
                                  </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Comment Login * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="comment_login" id="comment_login" placeholder="Comment Login" required="" type="text" value="{{ $data->comment_login }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Comment Review * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="comment_review" id="comment_review" placeholder="Comment Review" required="" type="text" value="{{ $data->comment_review }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Favorite * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="product_favorite" id="product_favorite" placeholder="Favorite" required="" type="text" value="{{ $data->product_favorite }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="facebook_login">Login With Facebook * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="facebook_login" id="facebook_login" placeholder="Login With Facebook" required="" type="text" value="{{ $data->facebook_login }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="google_login">Login With Google * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="google_login" id="google_login" placeholder="Login With Google" required="" type="text" value="{{ $data->google_login }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="digital_login">Digital Checkout Message * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="digital_login" id="digital_login" placeholder="Digital Checkout Message" required="" type="text" value="{{ $data->digital_login }}">
                                                </div>
                                            </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tax *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="tax" placeholder="Enter Your Input" value="{{ $data->tax }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Comment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="comment" placeholder="Enter Your Input" value="{{ $data->comment }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Comments *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="comments" placeholder="Enter Your Input" value="{{ $data->comments }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write Comment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="write_comment" placeholder="Enter Your Input" value="{{ $data->write_comment }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write Reply *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="write_reply" placeholder="Enter Your Input" value="{{ $data->write_reply }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit_button" placeholder="Enter Your Input" value="{{ $data->edit_button }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reply Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reply_button" placeholder="Enter Your Input" value="{{ $data->reply_button }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Remove Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="remove" placeholder="Enter Your Input" value="{{ $data->remove }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Comment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit_comment" placeholder="Enter Your Input" value="{{ $data->edit_comment }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Reply *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit_reply" placeholder="Enter Your Input" value="{{ $data->edit_reply }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="update_comment" placeholder="Enter Your Input" value="{{ $data->update_comment }}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Compare *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_title" placeholder="Enter Your Input" value="{{ $data->compare_title }}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Rating *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_rating" placeholder="Enter Your Input" value="{{ $data->compare_rating }}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Vendor *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_vendor" placeholder="Enter Your Input" value="{{ $data->compare_vendor }}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_description" placeholder="Enter Your Input" value="{{ $data->compare_description }}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Available *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_available" placeholder="Enter Your Input" value="{{ $data->compare_available }}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_cart" placeholder="Enter Your Input" value="{{ $data->compare_cart }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Compare *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="no_compare" placeholder="Enter Your Input" value="{{ $data->no_compare }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">To Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="to_review" placeholder="Enter Your Input" value="{{ $data->to_review }}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Puchase To Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_review" placeholder="Enter Your Input" value="{{ $data->product_review }}" required="">
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Replies *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_replies" placeholder="Enter Your Input" value="{{ $data->view_replies }}" required="">
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Cancel *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cancel_edit" placeholder="Enter Your Input" value="{{ $data->cancel_edit }}" required="">
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">See More *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="see_more" placeholder="Enter Your Input" value="{{ $data->see_more }}" required="">
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">See Less *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="see_less" placeholder="Enter Your Input" value="{{ $data->see_less }}" required="">
                                            </div>
                                          </div>  
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>   
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard FAQ Page -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script type="text/javascript">
  $("#rtl").change(function() {
    var x = $(this).val();
    if(x == 1)
    $("input[type=text]").css("direction", "rtl");
    else
    $("input[type=text]").css("direction", "ltr");
});
</script>

@endsection