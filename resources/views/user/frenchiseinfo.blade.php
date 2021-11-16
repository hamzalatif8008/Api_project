@extends('layouts.user')
        

@section('styles')
<style type="text/css">
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-top: none;
}
.add-product-box {
    box-shadow: none;
}
.add-product-1
{
    padding-bottom: 30px;
}
</style>
@endsection
        
@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Frenchise Details <a href="{{ route('user-dashboard') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchises <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Frenchise Details
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <hr>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                        <table class="table">
                            <tbody>
                           @if($frenchise->frenchise_name != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Frenchise Name:</strong></td>
                                <td>{{$frenchise->frenchise_name}}</td>
                            </tr>
                             @endif
                            @if($frenchise->frenchise_mobile_number != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Frenchise Mobile Number:</strong></td>
                                <td>{{$frenchise->frenchise_mobile_number}}</td>
                            </tr>
                             @endif
                             
                             <tr>
                                <td width="49%" style="text-align: right;"><strong>Owner Name:</strong></td>
                                <td>{{$frenchise->owner_name}}</td>
                            </tr>
                            
                             @if($frenchise->frenchise_address != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Location:</strong></td>
                                <td>{{$frenchise->frenchise_address}}</td>
                            </tr>
                            @endif
                             
                            @if($frenchise->city != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>City:</strong></td>
                                <td>{{$frenchise->city}}</td>
                            </tr>
                            @endif
                            
                             @if($frenchise->email != "")
                            <tr>
                                <td width="49%" style="text-align: right;"><strong>Email:</strong></td>
                                <td>{{$frenchise->email}}</td>
                            </tr>
                              @endif
                           
                            </tbody>
                        </table>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" value="{{$frenchise->email}}"><a style="cursor: pointer;" data-toggle="modal" data-target="#emailModal" class="btn btn-primary email1"><i class="fa fa-send"></i> Contact Frenchise</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>
   
<div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">Send Message</h4>
          </div>
          <form id="emailreply"  method="POST">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml" name="email" placeholder="Email"  value="{{$frenchise->email}}" readonly="">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg" class="form-control" rows="5" placeholder="Message *" required=""></textarea>
                </div>
                <input type="hidden" name="name" value="{{Auth::guard('user')->user()->name}}">
                <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
          </div>
          <div class="modal-footer">
            <button type="submit" id="emlsub" class="btn btn-default email-btn">Send</button>
          </div>
           </form>
        </div>
      </div>
    </div>
    
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).on("click", ".email" , function(){
        var email = $(this).parent().find('input[type=hidden]').val();
        $("#eml").val(email);
        $(".modal-backdrop, .modal.vendor").css('background-color','rgba(0,0,0,0)');
    });
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
          $(document).on("submit", "#emailreply" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var email = $(this).find('input[name=email]').val();
          var name = $(this).find('input[name=name]').val();
          var user_id = $(this).find('input[name=user_id]').val();
          $('#eml').prop('disabled', true);
          $('#subj').prop('disabled', true);
          $('#msg').prop('disabled', true);
          $('#emlsub').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/user/user/contact')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'email'   : email,
                'name'  : name,
                'user_id'   : user_id
                  },
            success: function( data) {
          $('#eml').prop('disabled', false);
          $('#subj').prop('disabled', false);
          $('#msg').prop('disabled', false);
          $('#subj').val('');
          $('#msg').val('');
        $('#emlsub').prop('disabled', false);
        if(data == 0)
        $.notify("Email Not Found !!","error");
        else
        $.notify("Message Sent !!","success");
        $('.ti-close').click();
            }
        });          
          return false;
        });
</script>
    <script type="text/javascript">
        $(document).on('click','#license' , function(e){
            var id = $(this).parent().find('input[type=hidden]').val();
            var key = $(this).parent().parent().find('input[type=hidden]').val();
            $('#key').html(id);  
            $('#license-key').val(key);    
    });
        $(document).on('click','#license-edit' , function(e){
            $(this).hide();
            $('#edit-license').show();
            $('#license-cancel').show();
        });
        $(document).on('click','#license-cancel' , function(e){
            $(this).hide();
            $('#edit-license').hide();
            $('#license-edit').show();
        });
    </script>
@endsection

