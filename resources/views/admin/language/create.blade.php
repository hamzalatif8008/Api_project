@extends('layouts.admin')

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
                                                    <h2>Add Language<a href="{{ route('admin-lang-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Language Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Add
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-lang-store')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')    
                                        {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="rtl">Language Direction *</label>
                                            <div class="col-sm-6">
                                              <select id="rtl" class="form-control" name="rtl">
                                                <option value="0">Left To Right</option>
                                                <option value="1">Right To Left</option>
                                              </select>
                                            </div>
                                          </div>
<hr style="margin-top: 20px; margin-bottom: 20px;">
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Language Name *</label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="language" placeholder="Enter Your Input" value="Language Name" required="">
                                            </div>
                                          </div>
<hr style="margin-top: 20px; margin-bottom: 20px;">
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">All Categories *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="all_categories" placeholder="Enter Your Input" value="All Categories" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Home *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="home" placeholder="Enter Your Input" value="Home" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">About *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="about" placeholder="Enter Your Input" value="About" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blog" placeholder="Enter Your Input" value="Blog" required="">
                                            </div>
                                          </div>       
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blogs *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogs" placeholder="Enter Your Input" value="Blogs" required="">
                                            </div>
                                          </div>                                                                
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogss" placeholder="Enter Your Input" value="Blog Details" required="">
                                            </div>
                                          </div>   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Recent Posts *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogsss" placeholder="Enter Your Input" value="Recent Posts" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Contact *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contacts" placeholder="Enter Your Input" value="Blog Contact" required="">
                                            </div>
                                          </div>                
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="faq" placeholder="Enter Your Input" value="Faq" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="faqs" placeholder="Enter Your Input" value="Faq Title" required="" >
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Page Header *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="maq" placeholder="Enter Your Input" value="Faq Page Header" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contact" placeholder="Enter Your Input" value="Contact" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Others *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="others" placeholder="Enter Your Input" value="Others" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Heading *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="search" placeholder="Enter Your Input" value="Search Heading" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Placeholder *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ec" placeholder="Enter Your Input" value="Search Placeholder" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Front Page Wish List *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wishlists" placeholder="Enter Your Input" value="Wish List" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Front Page Wish List Heading *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_head" placeholder="Enter Your Input" value="Wish List Heading" required="">
                                            </div>
                                          </div>                                          
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Account *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fh" placeholder="Enter Your Input" value="My Account" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fht" placeholder="Enter Your Input" value="My Cart" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Empty *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="h" placeholder="Enter Your Input" value="Cart Empty" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Total *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vt" placeholder="Enter Your Input" value="Total" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Checkout *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="gt" placeholder="Enter Your Input" value="Checkout" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vdn" placeholder="Enter Your Input" value="View Cart" required="">
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Top Category *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bgs" placeholder="Enter Your Input" value="Top Category" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Featured Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="featured_product" placeholder="Enter Your Input" value="Featured Products" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Featured *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bg" placeholder="Enter Your Input" value="Featured" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Best Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="lm" placeholder="Enter Your Input" value="Best Seller" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Top Rate *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="rds" placeholder="Enter Your Input" value="Top Rate" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Arrival Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_arrival" placeholder="Enter Your Input" value="New Arrival Products" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Hot Sale *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hot_sale" placeholder="Enter Your Input" value="Hot Sale" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Special *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="latest_special" placeholder="Enter Your Input" value="Latest Special" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Big Save *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="big_sale" placeholder="Enter Your Input" value="Big Save" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Weeks *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="week" placeholder="Enter Your Input" value="Weeks" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Days *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="day" placeholder="Enter Your Input" value="Days" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Hours *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hour" placeholder="Enter Your Input" value="Hours" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Minutes *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="minute" placeholder="Enter Your Input" value="Minutes" required="">
                                            </div>
                                          </div>                                                       
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Seconds *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="second" placeholder="Enter Your Input" value="Seconds" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Now *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_now" placeholder="Enter Your Input" value="Shop Now" required="">
                                            </div>
                                          </div>                               
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hcs" placeholder="Enter Your Input" value="Add To Cart" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Out Of Stock *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dni" placeholder="Enter Your Input" value="Out Of Stock" required="">
                                            </div>
                                          </div>
 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Available *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sbg" placeholder="Enter Your Input" value="Available" required="">
                                            </div>
                                          </div>
  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quantity *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dopd" placeholder="Enter Your Input" value="Quantity" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Size *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doo" placeholder="Enter Your Input" value="Size" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Color *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="colors" placeholder="Enter Your Input" value="Color" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quick Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dol" placeholder="Enter Your Input" value="Quick Review" required="">
                                            </div>
                                          </div>                                         
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Filter Option *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doa" placeholder="Enter Your Input" value="Filter Option" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Latest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doe" placeholder="Enter Your Input" value="Sort Latest" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Oldest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dor" placeholder="Enter Your Input" value="Sort Oldest" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Lowest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dopr" placeholder="Enter Your Input" value="Sort Lowest" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Highest *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doc" placeholder="Enter Your Input" value="Sort Highest" required="">
                                            </div>
                                          </div>
<!-- ****************************** DONE ******************** -->   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">All Categories *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doci" placeholder="Enter Your Input" value="All Categories" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Price *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dosp" placeholder="Enter Your Input" value="Price" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Price Search *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="don" placeholder="Enter Your Input" value="Price Search" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Popular Tags *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doem" placeholder="Enter Your Input" value="Popular Tags" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tag *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dom" placeholder="Enter Your Input" value="Tag" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Result *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ss" placeholder="Enter Your Input" value="Search Result" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reviews *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dttl" placeholder="Enter Your Input" value="Reviews" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_detail" placeholder="Enter Your Input" value="Product Details" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ddesc" placeholder="Enter Your Input" value="Full Description" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Return & Policy *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ppr" placeholder="Enter Your Input" value="Return & Policy" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write a Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpr" placeholder="Enter Your Input" value="Write a Review" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Submit Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="size" placeholder="Enter Your Input" value="Submit Review" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="md" placeholder="Enter Your Input" value="No Review" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Related Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="amf" placeholder="Enter Your Input" value="Related Products" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Your Rating *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dofpl" placeholder="Enter Your Input" value="Your Rating" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Remove *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cremove" placeholder="Enter Your Input" value="Cart Remove" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Image *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cimage" placeholder="Enter Your Input" value="Cart Image" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Product Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cproduct" placeholder="Enter Your Input" value="Product Name" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Edit *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cedit" placeholder="Enter Your Input" value="Cart Edit" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Quantity *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cquantity" placeholder="Enter Your Input" value="Cart Quantity" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Unit Price *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cupice" placeholder="Enter Your Input" value="Price" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Sub Total *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cst" placeholder="Enter Your Input" value="Sub Total" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Continue Shopping *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ccs" placeholder="Enter Your Input" value="Continue Shopping" required="">
                                            </div>
                                          </div>



                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Proceed Checkout *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cpc" placeholder="Enter Your Input" value="Proceed Checkout" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="odetails" placeholder="Enter Your Input" value="Order Details" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Billing Details *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bdetails" placeholder="Enter Your Input" value="Billing Details" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shipping Cost *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ship" placeholder="Enter Your Input" value="Shipping Cost" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Now *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="onow" placeholder="Enter Your Input" value="Order Now" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Payment Method *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cup" placeholder="Enter Your Input" value="Payment Method" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Paypal *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pp" placeholder="Enter Your Input" value="Paypal" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Credit Card *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="app" placeholder="Enter Your Input" value="Credit Card" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Mobile Money *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dotpl" placeholder="Enter Your Input" value="Mobile Money" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Bank Wire *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dogpl" placeholder="Enter Your Input" value="Bank Wire" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cash On Delivery *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dolpl" placeholder="CEnter Your Input" value="Cash On Delivery" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Ship To Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ships" placeholder="Enter Your Input" value="Ship To Address" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Ship To Another Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipss" placeholder="Enter Your Input" value="Ship To Another Address" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pick Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickup" placeholder="Enter Your Input" value="Pick Up" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pick Up Location *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickups" placeholder="Enter Your Input" value="Pick Up Location" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Notes *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="onotes" placeholder="Enter Your Input" value="Order Notes" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Transaction *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="tid" placeholder="Enter Your Input" value="Transaction" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">PickUp Location *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickupss" placeholder="Enter Your Input" value="PickUp Location" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="con" placeholder="Enter Your Input" value="Contact Name" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Phone *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cop" placeholder="Enter Your Input" value="Contact Phone" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Email *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="coe" placeholder="Enter Your Input" value="Contact Email" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Reply *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cor" placeholder="Enter Your Input" value="Contact Reply" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Enter Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="enter_code" placeholder="Enter Your Input" value="Enter Code" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign In / Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signinup" placeholder="Enter Your Input" value="Sign In / Up" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign In *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signin" placeholder="Enter Your Input" value="Sign In" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Login *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sie" placeholder="Enter Your Input" value="Login" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="spe" placeholder="Enter Your Input" value="Sign Up" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Heading *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signup" placeholder="Enter Your Input" value="Sign Up" required="">
                                            </div>
                                          </div>



                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sup" placeholder="Enter Your Input" value="Password" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Confirm Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sucp" placeholder="Enter Your Input" value="Confirm Password" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Welcome *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="welcome" placeholder="Enter Your Input" value="Welcome" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Profile *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit" placeholder="Enter Your Input" value="Edit Profile" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reset Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reset" placeholder="Enter Your Input" value="Reset Password" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Orders *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cn" placeholder="Enter Your Input" value="Orders" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Out *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="logout" placeholder="Enter Your Input" value="Sign Out" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Current Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cp" placeholder="Enter Your Input" value="Current Password" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="np" placeholder="Enter Your Input" value="New Password" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Re-Type New Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="rnp" placeholder="Enter Your Input" value="Re-Type New Password" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Change Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="chnp" placeholder="Enter Your Input" value="Change Password" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Video Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="video_title" placeholder="Enter Your Input" value="Video Title" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Blogs *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="lns" placeholder="Enter Your Input" value="Latest Blogs" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Details Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vd" placeholder="Enter Your Input" value="View Details" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Review Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="review_title" placeholder="Enter Your Input" value="Review" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Happy Customer *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sue" placeholder="Enter Your Input" value="Happy Customer" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ston" placeholder="Enter Your Input" value="Subscribe" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="s" placeholder="Enter Your Input" value="Subscribe" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Placeholder *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="supl" placeholder="Enter Your Input" value="Subscribe Placeholder" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Footer Links *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fl" placeholder="Enter Your Input" value="Footer Links" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sm" placeholder="Enter Your Input" value="Contact" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpw" placeholder="Enter Your Input" value="Forgot Password" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpt" placeholder="Enter Your Input" value="Forgot Password Title" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Email *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpe" placeholder="Enter Your Input" value="Forgot Password Email" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpb" placeholder="Enter Your Input" value="Forgot Password Button" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Already Account *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="al" placeholder="Enter Your Input" value="Already Account" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Source *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bs" placeholder="Enter Your Input" value="Blog Source" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fname" placeholder="Enter Your Input" value="Full Name" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Phone Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doph" placeholder="Enter Your Input" value="Phone Number" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Email Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doeml" placeholder="Enter Your Input" value="Email Address" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">City *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doct" placeholder="Enter Your Input" value="City" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doad" placeholder="Enter Your Input" value="Address" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Fax *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dofx" placeholder="Enter Your Input" value="Fax" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Postal Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="suph" placeholder="Enter Your Input" value="Postal Code" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Review Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="suf" placeholder="Enter Your Input" value="Review Description" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doupl" placeholder="Enter Your Input" value="Update Button" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Success *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="success" placeholder="Enter Your Input" value="Update Success" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Country *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ctry" placeholder=" Enter Your Input" value="Country" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Select Country *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sctry" placeholder=" Enter Your Input" value="Select Country" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Coupon Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cpn" placeholder=" Enter Your Input" value="Coupon Code" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Enter Coupon *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ecpn" placeholder=" Enter Your Input" value="Enter Coupon" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Apply Coupon *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="acpn" placeholder=" Enter Your Input" value="Apply Coupon" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Discount *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ds" placeholder=" Enter Your Input" value="Discount" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Final Total *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ft" placeholder=" Enter Your Input" value="Final Total" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_description" placeholder=" Enter Your Input" value="Vendor Description" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Linked Accounts *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="linked_accounts" placeholder=" Enter Your Input" value="Linked Accounts" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Registration *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_registration" placeholder=" Enter Your Input" value="Vendor Registration" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Shop Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vshop_name" placeholder=" Enter Your Input" value="Vendor Shop Name" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Owner Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="owner_name" placeholder=" Enter Your Input" value="Vendor Owner Name" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Shop Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_number" placeholder=" Enter Your Input" value="Vendor Shop Number" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Shop Address *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_address" placeholder=" Enter Your Input" value="Vendor Shop Address" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Registration Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reg_number" placeholder=" Enter Your Input" value="Vendor Registration Number" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="message" placeholder=" Enter Your Input" value="Vendor Message" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">This Field is Optional *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="optional" placeholder=" Enter Your Input" value="This Field is Optional" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sell *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sale" placeholder=" Enter Your Input" value="SELL" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Name *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_name" placeholder=" Enter Your Input" value="Shop Name" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">User Dashboard *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="user_dashboard" placeholder=" Enter Your Input" value="User Dashboard" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Conversations *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="conv" placeholder=" Enter Your Input" value="New Conversations" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Conversation Alert *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_conv" placeholder=" Enter Your Input" value="New Conversation Alert" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No New Converstions *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="no_conv" placeholder=" Enter Your Input" value="No New Converstions" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Clear All *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="clear" placeholder=" Enter Your Input" value="Clear All" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Favorite Product *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="favorite_product" placeholder=" Enter Your Input" value="Favorite Product" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Processing *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="order_processing" placeholder=" Enter Your Input" value="Order Processing" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Completed *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="order_completed" placeholder=" Enter Your Input" value="Order Completed" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Bonus *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_bonus" placeholder=" Enter Your Input" value="Affilate Bonus" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Current Balance *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="current_balance" placeholder=" Enter Your Input" value="Current Balance" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Item Sold *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="item_sold" placeholder=" Enter Your Input" value="Item Sold" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Total Earning *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="total_earning" placeholder=" Enter Your Input" value="Total Earning" required="">
                                            </div>
                                          </div>
 

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View All *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_all" placeholder=" Enter Your Input" value="View All" required="">
                                            </div>
                                          </div>                                         
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Customer *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="customer" placeholder=" Enter Your Input" value="Customer" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Website *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_website" placeholder=" Enter Your Input" value="View Website" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Dashboard *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dashboard" placeholder="Enter Your Input" value="Dashboard" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Wishlist *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_list" placeholder=" Enter Your Input" value="Wishlist" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Favorite Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="favorite_seller" placeholder=" Enter Your Input" value="Favorite Seller" required="">
                                            </div>
                                          </div>                                          
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Messages *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="messages" placeholder=" Enter Your Input" value="Messages" required="">
                                            </div>
                                          </div> 

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Purchased Items *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="purchased_item" placeholder=" Enter Your Input" value="Purchased Items" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Settings *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_settings" placeholder=" Enter Your Input" value="Affilate Settings" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Withdraw *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_withdraw" placeholder=" Enter Your Input" value="Affilate Withdraw" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Affilate Code *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="affilate_code" placeholder=" Enter Your Input" value="Affilate Code" required="">
                                            </div>
                                          </div> 
                                           <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tickets *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="support" placeholder="Enter Your Input" value="Tickets" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Products *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_products" placeholder=" Enter Your Input" value="Products" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Orders *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_orders" placeholder=" Enter Your Input" value="Orders" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Withdraw *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="withdraw" placeholder=" Enter Your Input" value="Withdraw" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Settings *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="settings" placeholder=" Enter Your Input" value="Settings" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sliders *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sliders" placeholder=" Enter Your Input" value="Sliders" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_description" placeholder=" Enter Your Input" value="Description" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shipping Cost *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipping_cost" placeholder=" Enter Your Input" value="Shipping Cost" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Social Links *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="social_link" placeholder=" Enter Your Input" value="Social Links" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Apply For Vendor *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_apply" placeholder=" Enter Your Input" value="Apply For Vendor" required="">
                                            </div>
                                          </div>  
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Availability *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="availability" placeholder=" Enter Your Input" value="Availability" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Wishlist *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wishlist_add" placeholder=" Enter Your Input" value="Wishlist" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quick View *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="quick_view" placeholder=" Enter Your Input" value="Quick View" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare" placeholder=" Enter Your Input" value="Compare" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Watch Video *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="watch_video" placeholder=" Enter Your Input" value="Watch Video" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Condition *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_condition" placeholder=" Enter Your Input" value="Product Condition" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Estimated Shipping Time *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipping_time" placeholder=" Enter Your Input" value="Estimated Shipping Time" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Favorite Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="add_seller" placeholder=" Enter Your Input" value="Add To Favorite Seller" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contact_seller" placeholder=" Enter Your Input" value="Contact Seller" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Phone Number *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="phone_number" placeholder=" Enter Your Input" value="Phone Number" required="">
                                            </div>
                                          </div>  
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Send Message To Seller *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="send_message" placeholder=" Enter Your Input" value="Send Message To Seller" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor New Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_message" placeholder=" Enter Your Input" value="New Message" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Send To *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="send_to" placeholder=" Enter Your Input" value="Send To" required="">
                                            </div>
                                          </div> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Subject *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_subject" placeholder=" Enter Your Input" value="Subject" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Message *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_message" placeholder=" Enter Your Input" value="Message" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Send Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_send" placeholder=" Enter Your Input" value="Send" required="">
                                            </div>
                                          </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Platform * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="platform" id="blood_group_display_name" placeholder="Enter Platform" required="" type="text" value="Platform">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Region * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="region" id="blood_group_display_name" placeholder="Enter Region" required="" type="text" value="Region">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Type * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="licence_type" id="blood_group_display_name" placeholder="Enter Type" required="" type="text" value="Type">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Comment Login * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="comment_login" id="comment_login" placeholder="Comment Login" required="" type="text" value="Login">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Comment Review * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="comment_review" id="comment_review" placeholder="Comment Review" required="" type="text" value="to review">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Favorite * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="product_favorite" id="product_favorite" placeholder="Favorite" required="" type="text" value="Favorite">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="facebook_login">Login With Facebook * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="facebook_login" id="facebook_login" placeholder="Login With Facebook" required="" type="text" value="Login With Facebook">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="google_login">Login With Google * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="google_login" id="google_login" placeholder="Login With Google" required="" type="text" value="Login With Google">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="digital_login">Digital Checkout Message * <span>(In Any Language)</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="digital_login" id="digital_login" placeholder="Digital Checkout Message" required="" type="text" value="Digital Checkout Message">
                                                </div>
                                            </div>




                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tax *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="tax" placeholder="Enter Your Input" value="Tax" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Comment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="comment" placeholder="Enter Your Input" value="Comment" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Comments *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="comments" placeholder="Enter Your Input" value="Comments" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write Comment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="write_comment" placeholder="Enter Your Input" value="Write Comment" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write Reply *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="write_reply" placeholder="Enter Your Input" value="Write Reply" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit_button" placeholder="Enter Your Input" value="Edit Button" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reply Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reply_button" placeholder="Enter Your Input" value="Reply Button" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Remove Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="remove" placeholder="Enter Your Input" value="Remove" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Comment *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit_comment" placeholder="Enter Your Input" value="Edit Comment" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Reply *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit_reply" placeholder="Enter Your Input" value="Edit Reply" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="update_comment" placeholder="Enter Your Input" value="Update" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Compare *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_title" placeholder="Enter Your Input" value="Product Compare" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Rating *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_rating" placeholder="Enter Your Input" value="Rating" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Vendor *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_vendor" placeholder="Enter Your Input" value="Vendor" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Description *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_description" placeholder="Enter Your Input" value="Description" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Available *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_available" placeholder="Enter Your Input" value="Available" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Compare Cart *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="compare_cart" placeholder="Enter Your Input" value="Cart" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Compare *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="no_compare" placeholder="Enter Your Input" value="NO PRODUCTS TO COMPARE." required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">To Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="to_review" placeholder="Enter Your Input" value="To Review" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Puchase To Review *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_review" placeholder="Enter Your Input" value="Puchase To Review" required="">
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Replies *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_replies" placeholder="Enter Your Input" value="View Replies" required="">
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Cancel *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cancel_edit" placeholder="Enter Your Input" value="Edit Cancel" required="">
                                            </div>
                                          </div>    

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">See More *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="see_more" placeholder="Enter Your Input" value="See More" required="">
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">See Less *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="see_less" placeholder="Enter Your Input" value="See Less" required="">
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