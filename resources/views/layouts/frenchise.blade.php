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
                    <img src="assets/admin/images/75-752748_wwe-seth-rollins-hd.png" alt="">
                    <div class="sidebar-menu-body">
                        <nav id="sidebar-menu">
                            <ul class="list-unstyled profile">
                                <li class="active">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                             <img src="{{ Auth::guard('frenchise')->user()->photo ? asset('assets/images/'.Auth::guard('frenchise')->user()->photo):asset('assets/images/noimage.png') }}" alt="profile image">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">    
                                            <a>{{ Auth::guard('frenchise')->user()->owner_name}} <span>{{ Auth::guard('frenchise')->user()->role}}</span></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled components">
                                <li> 
                                    <a href="{{route('frenchise-dashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
                                </li>
                                
                                 @if(Auth::guard('frenchise')->user())
                                <li>
                                    <a href="#vendor" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-users"></i> Vendors</a>
                                    <ul class="collapse list-unstyled submenu" id="vendor">
                                        <li>
                                            <a href="{{route('register-shop')}}"><i class="fa fa-angle-right"></i>Add New Vendor</a>
                                         </li>
                                        <li>
                                            <a href="{{route('vendor-list')}}"><i class="fa fa-angle-right"></i>Vendors List</a>
                                        </li>  
                                        {{--  <li>
                                            <a href="{{route('vendor-wt')}}"><i class="fa fa-angle-right"></i>Withdraws</a>
                                        </li>    --}}
                                        <!-- <li>
                                            <a href="{{route('vendor-subs')}}"><i class="fa fa-angle-right"></i>Vendor Subscriptions</a>
                                        </li>   -->
                                    </ul>
                                </li>
                                {{--  <li><a href="{{route('admin-subscription-index')}}"><i class="fa fa-fw fa-usd"></i> Vendor Subscription Plans</a>
                                </li>  --}}
                                @endif
                                {{--  <li><a href="{{route('register-shop')}}"><i class="fa fa-fw fa-users"></i> Registered Shops</a>
                                </li>  --}}
                                 <li>
                                    <a href="#order" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-usd"></i> Orders</a>
                                    <ul class="collapse list-unstyled submenu" id="order">
                                        <li>
                                            <a href="{{route('frenchise-order-index')}}"><i class="fa fa-angle-right"></i> All Orders</a>
                                            <a href="{{route('frenchise-vendor-status',['status' => 'pending'])}}"><i class="fa fa-angle-right"></i> Pending Orders</a>
                                            <a href="{{route('frenchise-vendor-status',['status' => 'processing'])}}"><i class="fa fa-angle-right"></i> Processing Orders</a>
                                            <a href="{{route('frenchise-vendor-status',['status' => 'completed'])}}"><i class="fa fa-angle-right"></i> Completed Orders</a>
                                            <a href="{{route('frenchise-vendor-status',['status' => 'declined'])}}"><i class="fa fa-angle-right"></i> Declined Orders</a>
                                        </li>  
                                    </ul>
                                </li>
                                 <li>
                                    <a href="#prod" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-shopping-cart"></i>Products</a>
                                    <ul class="collapse list-unstyled submenu" id="prod">
                                        {{--  <li>
                                            <a href="{{route('frenchise-prod-create')}}"><i class="fa fa-angle-right"></i>Add New Product</a>
                                        </li>    --}}
                                        <li>
                                            <a href="{{route('frenchise-prod-index')}}"><i class="fa fa-angle-right"></i>All Products</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('frenchise-prod-deactive')}}"><i class="fa fa-angle-right"></i>Deactivated Products</a>
                                        </li>  
                                    </ul>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-shopping-cart"></i>Accounts</a>
                                    <ul class="collapse list-unstyled submenu" id="account">
                                        <li>
                                            <a href="{{route('frenchise-accounts')}}"><i class="fa fa-angle-right"></i>Detail</a>
                                        </li>  
                                         
                                    </ul>
                                </li>
                                <li><a href="{{route('frenchise-social-index')}}"><i class="fa fa-angle-{{$lang->rtl == 1 ? 'left':'right'}}"></i> {{$lang->social_link}}</a></li>  

                              
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
                    url:"{{URL::to('/json/user/frennotf')}}",
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
                    url:"{{URL::to('/json/product/frennotf')}}",
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
                    url:"{{URL::to('/json/order/frennotf')}}",
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
                $('.profile-wishlist-content').load('{{URL::to('user/frennotf')}}');
            });

            $(document).on("click", "#order_notf" , function(){
                $("#notf_order").html('0');
                $('.profile-notifi-content').load('{{URL::to('order/frennotf')}}');
            });
            $(document).on("click", "#product_notf" , function(){
                $("#notf_product").html('0');
                $('.profile-comments-content').load('{{URL::to('product/frennotf')}}');
            });  

            $(document).on("click", "#user_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/user/frontnotf/clear')}}"
              }); 
            });
            $(document).on("click", "#order_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/order/frontnotf/clear')}}"
              }); 
            });
            $(document).on("click", "#product_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/product/frontnotf/clear')}}"
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
