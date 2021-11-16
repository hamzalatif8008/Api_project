<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="GeniusOcean">

        <title>{{$gs->title}}</title>
        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/themify-icon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 
        <style type="text/css">
        .form-control {
        box-shadow: inset 0px 0px 0px rgba(0,0,0,.075);            
        }

        </style>
        @include('styles.admin-design') 
        @yield('styles')
    </head>
    <body>
        <div class="dashboard-wrapper">
            <div class="left-side">
            <!-- Starting of Dashboard Sidebar menu area -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-right">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </nav>
                
                <div class="dashboard-sidebar-area">
                    <img src="{{asset('assets/images/'.$gs->bimg)}}" alt="">
                    <div class="sidebar-menu-body">
                        <nav id="sidebar-menu">
                            <ul class="list-unstyled profile">
                                <li class="active">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <img src="{{ Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo):asset('assets/images/noimage.png') }}" alt="profile image">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">    
                                            <a>{{ Auth::guard('admin')->user()->name}} <span>{{ Auth::guard('admin')->user()->role}}</span></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled components">
                                <li>
                                    <a href="{{route('admin-dashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="#order" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-usd"></i> Orders</a>
                                    <ul class="collapse list-unstyled submenu" id="order">
                                        <li>
                                            <a href="{{route('admin-order-index')}}"><i class="fa fa-angle-right"></i> All Orders</a>
                                            <a href="{{route('admin-order-pending')}}"><i class="fa fa-angle-right"></i> Pending Orders</a>
                                            <a href="{{route('admin-order-processing')}}"><i class="fa fa-angle-right"></i> Processing Orders</a>
                                            <a href="{{route('admin-order-completed')}}"><i class="fa fa-angle-right"></i> Completed Orders</a>
                                            <a href="{{route('admin-order-declined')}}"><i class="fa fa-angle-right"></i> Declined Orders</a>
                                        </li>  
                                    </ul>
                                </li>
                                <li>
                                    <a href="#prod" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-shopping-cart"></i> Products</a>
                                    <ul class="collapse list-unstyled submenu" id="prod">
                                        {{--  <li>
                                            <a href="{{route('admin-prod-create')}}"><i class="fa fa-angle-right"></i>Add New Product</a>
                                        </li>    --}}
                                        <li>
                                            <a href="{{route('admin-prod-index')}}"><i class="fa fa-angle-right"></i>All Products</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-prod-deactive')}}"><i class="fa fa-angle-right"></i>Deactivated Products</a>
                                        </li>  
                                    </ul>
                                </li>
                                <li>
                                    <a href="#customer" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-users"></i> Customers</a>
                                    <ul class="collapse list-unstyled submenu" id="customer">
                                        <li>
                                            <a href="{{route('admin-user-index')}}"><i class="fa fa-angle-right"></i>Customers List</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-vendor-wtt')}}"><i class="fa fa-angle-right"></i>Withdraws</a>
                                        </li>  
                                    </ul>
                                </li>
                                <!-- start  Frenchise control -->
                                @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#frenchise" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-users"></i> Franchise</a>
                                    <ul class="collapse list-unstyled submenu" id="frenchise">
                                        <li>
                                            <a href="{{route('admin-frenchise-add')}}"><i class="fa fa-angle-right"></i>Add New Frenchise</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin-frenchise-index')}}"><i class="fa fa-angle-right"></i>Franchise List</a>
                                        </li>   
                                    </ul>
                                </li> 
                                @endif
                                <!-- End frenchise -->
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#vendor" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-users"></i> Vendors</a>
                                    <ul class="collapse list-unstyled submenu" id="vendor">
                                        <li>
                                            <a href="{{route('admin-vendor-index')}}"><i class="fa fa-angle-right"></i>Vendors List</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-vendor-wt')}}"><i class="fa fa-angle-right"></i>Withdraws</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-vendor-subs')}}"><i class="fa fa-angle-right"></i>Vendor Subscriptions</a>
                                        </li>  
                                    </ul>
                                </li>
                                <li><a href="{{route('admin-subscription-index')}}"><i class="fa fa-fw fa-usd"></i> Vendor Subscription Plans</a>
                                </li>
                                @endif
                                <li>
                                    <a href="#category" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-sitemap"></i> Manage Category</a>
                                    <ul class="collapse list-unstyled submenu" id="category">
                                        <li>
                                            <a href="{{route('admin-cat-index')}}"><i class="fa fa-angle-right"></i>Main Category</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-subcat-index')}}"><i class="fa fa-angle-right"></i>Sub Category</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-childcat-index')}}"><i class="fa fa-angle-right"></i>Child Category</a>
                                        </li> 
                                    </ul>
                                </li>
                                <li><a href="#proddiscussion" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-comments-o"></i> Product Discussion</a>
                                    <ul class="collapse list-unstyled submenu" id="proddiscussion">
                                        <li><a href="{{route('admin-review-index')}}"><i class="fa fa-angle-right"></i> Reviews</a></li>
                                        <li><a href="{{route('admin-comment-index')}}"><i class="fa fa-angle-right"></i> Comments</a></li>                                        
                                    </ul>                                    
                                </li>
                                <li><a href="{{route('admin-newupdate')}}"><i class="fa fa-refresh"></i> New Updates</a>
                                </li>
                                <li><a href="{{route('admin-cp-index')}}"><i class="fa fa-fw fa-percent"></i> Set Coupons</a>
                                </li>
                                <li><a href="{{route('admin-blog-index')}}"><i class="fa fa-fw fa-file-text"></i> Blog</a>
                                </li>
                                <li><a href="{{route('admin-message-index')}}"><i class="fa fa-fw fa-envelope"></i> Messages</a>
                                </li>
                                
                                
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#generalSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-cogs"></i> General Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="generalSettings">
                                        <li><a href="{{route('admin-gs-logo')}}"><i class="fa fa-angle-right"></i> Logo</a></li>
                                        <li><a href="{{route('admin-gs-comingsoongif')}}"><i class="fa fa-angle-right"></i> Coming Soon Gif</a></li>
                                        <li><a href="{{route('admin-gs-fav')}}"><i class="fa fa-angle-right"></i> Favicon</a></li>
                                        <li><a href="{{route('admin-gs-load')}}"><i class="fa fa-angle-right"></i> Loader</a></li>
                                        <li><a href="{{route('admin-gs-bgimg')}}"><i class="fa fa-angle-right"></i> Background Image</a></li>
                                        <li><a href="{{route('admin-gs-cimg')}}"><i class="fa fa-angle-right"></i> Review Background Image</a></li>
                                       <li><a href="{{route('admin-gs-successm')}}"><i class="fa fa-angle-right"></i> Success Messages</a></li>
                                       <li><a href="{{route('admin-pick-index')}}"><i class="fa fa-angle-right"></i> Pickup Location</a></li>
                                        <li><a href="{{route('admin-gs-contents')}}"><i class="fa fa-angle-right"></i> Website Contents</a></li>
                                        <li><a href="{{route('admin-gs-about')}}"><i class="fa fa-angle-right"></i> Footer</a></li>
                                        <li>
                                            <a href="{{route('admin-gs-reg')}}"><i class="fa fa-angle-right"></i>Vendor Registration Option</a>
                                        </li> 
                                        <li><a href="{{route('admin-gs-affilate')}}"><i class="fa fa-angle-right"></i> Affilate Informations</a></li>
                                    </ul>
                                </li>
                                @endif
                                <li>
                                    <a href="#homeSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-edit"></i> Home Page Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="homeSettings">
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="{{route('admin-sl-index')}}"><i class="fa fa-angle-right"></i> Sliders</a>
                                </li>
                                <li>
                                    <a href="{{route('admin-service-index')}}"><i class="fa fa-angle-right"></i> Service Section</a>
                                </li>
                                @endif
                                <li><a href="{{route('admin-banner-top')}}"><i class="fa fa-angle-right"></i> Top Banners</a></li>
                                <li><a href="{{route('admin-img1-index')}}"><i class="fa fa-angle-right"></i> Bottom Banners</a></li>
                                
                                <li><a href="{{route('admin-gs-countdown')}}"><i class="fa fa-angle-right"></i> Countdown Section</a></li>
                                <li>
                                    <a href="{{route('admin-video')}}"><i class="fa fa-angle-right"></i> Home Page Video</a>
                                </li>
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li><a href="{{route('admin-ad-index')}}"><i class="fa fa-angle-right"></i> Testimonials</a></li>
                                <li>
                                    <a href="{{route('admin-img-index')}}"><i class="fa fa-angle-right"></i> Brands</a>
                                </li>
                                <li><a href="{{route('admin-gs-popup')}}"><i class="fa fa-angle-right"></i> Subscribe Popup Form</a></li>
                                <li><a href="{{route('admin-gs-bginfo')}}"><i class="fa fa-angle-right"></i> Customizations</a></li>   
                                <li><a href="{{route('admin-gs-festival')}}"><i class="fa fa-angle-right"></i> Festival</a></li>   
                                @endif
                                    </ul>
                                </li>
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#pageSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-code-o"></i> Menu Page Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="pageSettings">
                                        <li><a href="{{route('admin-fq-index')}}"><i class="fa fa-angle-right"></i> FAQ page</a></li>
                                        <li><a href="{{route('admin-ps-contact')}}"><i class="fa fa-angle-right"></i> Contact us page</a></li>
                                        <li><a href="{{route('admin-page-index')}}"><i class="fa fa-angle-right"></i> Other pages</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#mailSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-at"></i> Email Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="mailSettings">
                                        <li><a href="{{route('admin-mail-index')}}"><i class="fa fa-angle-right"></i> Email Templates</a></li>
                                        <li><a href="{{route('admin-mail-config')}}"><i class="fa fa-angle-right"></i> Email Configurations</a></li>
                                        <li><a href="{{route('admin-group-show')}}"><i class="fa fa-angle-right"></i> Group Email</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#payments" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-code-o"></i> Payment Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="payments">
                                        <li><a href="{{route('admin-gs-payments')}}"><i class="fa fa-angle-right"></i> Payment Informations</a></li>
                                        <li><a href="{{route('admin-payment-index')}}"><i class="fa fa-angle-right"></i> Payment Gateways</a>
                                        </li>
                                        <li><a href="{{route('admin-currency-index')}}"><i class="fa fa-angle-right"></i>  Currency Settings</a></li>
                                    </ul>
                                </li>            
                                <li>
                                    <a href="#socialSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-paper-plane"></i> Social Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="socialSettings">
                                        <li><a href="{{route('admin-social-index')}}"><i class="fa fa-angle-right"></i> Social Links</a></li>   
                                        <li><a href="{{route('admin-social-facebook')}}"><i class="fa fa-angle-right"></i> Facebook Login</a></li>
                                        <li><a href="{{route('admin-social-google')}}"><i class="fa fa-angle-right"></i> Google Login</a></li>
                                    </ul>
                                </li>  
                                <li>
                                    <a href="{{route('admin-staff-index')}}"><i class="fa fa-fw fa-user-secret"></i> Manage Staffs</a>
                                </li>
                                <li><a href="{{route('admin-lang-index')}}"><i class="fa fa-fw fa-language"></i>  Language Settings</a></li>                              
                                <li>
                                    <a href="#seoTools" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-wrench"></i> SEO Tools</a>
                                    <ul class="collapse list-unstyled submenu" id="seoTools">
                                        <li><a href="{{route('admin-prod-popular',30)}}"><i class="fa fa-angle-right"></i> Popular Products</a></li>
                                        <li><a href="{{route('admin-seotool-analytics')}}"><i class="fa fa-angle-right"></i> Google analytics</a></li>
                                        <li><a href="{{route('admin-seotool-keywords')}}"><i class="fa fa-angle-right"></i> Meta Keys</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('admin-subs-index')}}"><i class="fa fa-fw fa-group"></i> Subscribers</a></li>
                                <li>
                                    <a href="#sysTools" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-wrench"></i> System Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="sysTools">
                                    </ul>

                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            <!-- Ending of Dashboard Sidebar menu area --> 
            </div>
            @yield('content')
</div>
        
    <div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">Send Email</h4>
          </div>
          <form id="emailreply">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml" name="to" placeholder="Email"  value="" readonly="">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj" class="form-control" placeholder="Subject" required="">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg" class="form-control" rows="5" placeholder="Message *" required=""></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="emlsub" class="btn btn-default email-btn">Send</button>
          </div>
           </form>
        </div>
      </div>
    </div>

    <div class="modal vendor" id="emailModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">Send Message</h4>
          </div>
          <form id="emailreply1">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml1" name="to" placeholder="Email"  value="">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj1" class="form-control" placeholder="Subject" required="">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg1" class="form-control" rows="5" placeholder="Message *" required=""></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="emlsub1" class="btn btn-default email-btn">Send</button>
          </div>
           </form>
        </div>
      </div>
    </div>
                
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.canvasjs.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap-colorpicker.js')}}"></script>
        <script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/notify.js')}}"></script>
        <script src="{{asset('assets/admin/js/main.js')}}"></script>

<script>
$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/user/notf')}}",
                    success:function(data){
                        $("#notf_user").html(data);
                      }
              }); 
    }, 5000);
});

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/product/notf')}}",
                    success:function(data){
                        $("#notf_product").html(data);
                      }
              }); 
    }, 5000);
});

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/order/notf')}}",
                    success:function(data){
                        $("#notf_order").html(data);
                      }
              }); 
    }, 5000);
});
</script>
<script type="text/javascript">
            $(document).on("click", "#user_notf" , function(){
                $("#notf_user").html('0');
                $('.profile-wishlist-content').load('{{URL::to('user/notf')}}');
            });
            $(document).on("click", "#order_notf" , function(){
                $("#notf_order").html('0');
                $('.profile-notifi-content').load('{{URL::to('order/notf')}}');
            });
            $(document).on("click", "#product_notf" , function(){
                $("#notf_product").html('0');
                $('.profile-comments-content').load('{{URL::to('product/notf')}}');
            });
            $(document).on("click", "#user_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/user/notf/clear')}}"
              }); 
            });
            $(document).on("click", "#order_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/order/notf/clear')}}"
              }); 
            });
            $(document).on("click", "#product_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/product/notf/clear')}}"
              }); 
            });
</script>

<script type="text/javascript">
    $(document).on("click", ".email" , function(){
        var email = $(this).parent().find('input[type=hidden]').val();
        $("#eml").val(email);
        $(".modal-backdrop, .modal.vendor").css('background-color','rgba(0,0,0,0)');
    });
    $(document).on("click", ".email2" , function(){
        $(".modal-backdrop, .modal.vendor").css('background-color','rgba(0,0,0,0)');
    });
          $(document).on("submit", "#emailreply" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var to = $(this).find('input[name=to]').val();
          $('#eml').prop('disabled', true);
          $('#subj').prop('disabled', true);
          $('#msg').prop('disabled', true);
          $('#emlsub').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/admin/order/email')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'to'   : to
                  },
            success: function( data) {
          $('#eml').prop('disabled', false);
          $('#subj').prop('disabled', false);
          $('#msg').prop('disabled', false);
          $('#subj').val('');
          $('#msg').val('');
        $('#emlsub').prop('disabled', false);
        if(data == 0)
        $.notify("Oops Something Goes Wrong !!","error");
        else
        $.notify("Message Sent !!","success");
        $('.ti-close').click();
            }

        });          
          return false;
        });
    $(document).on("click", ".email1" , function(){
        var email = $(this).parent().find('input[type=hidden]').val();
        $("#eml1").val(email);
        $(".modal-backdrop, .modal.vendor").css('background-color','rgba(0,0,0,0)');
    });
          $(document).on("submit", "#emailreply1" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var to = $(this).find('input[name=to]').val();
          $('#eml1').prop('disabled', true);
          $('#subj1').prop('disabled', true);
          $('#msg1').prop('disabled', true);
          $('#emlsub1').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/admin/user/send/message')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'to'   : to
                  },
            success: function( data) {
                console.log(data);
          $('#eml1').prop('disabled', false);
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
$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/conv/notf1')}}",
                    success:function(data){
                        $("#notf_conv").html(data);
                      }
              }); 
    }, 5000);
});
            $(document).on("click", "#conv_notf" , function(){
                $("#notf_conv").html('0');
                $('.profile-notifi-content').load('{{URL::to('conv/notf1')}}');
            });
            $(document).on("click", "#conv_clear" , function(){

            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/conv/notf/clear1')}}"
              }); 
            });
</script>
        @yield('scripts')

    </body>
</html>
