@extends('layouts.customer')
@section('content')
  <div class="right-side">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Starting of Dashboard data-table area -->
        <div class="section-padding add-product-1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Messages</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Messages</p>
                                                </div>
                                            </div>
                                              @include('includes.customer-notification')
                                        </div>   
                                    </div>
                <div>
                        @include('includes.form-success')
                                          @include('includes.form-error')
                  <div class="row">
                    <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                        <thead style="display: none;">
                        <tr class="table-header-row">
                          <th>Name</th>
                          <th>Message</th>
                          <th>Sent</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($convs as $conv)
                        
                          <tr class="conv">
                            <input type="hidden" value="{{$conv->id}}">
                            @if($user->id == $conv->sent->id)
                            <td>{{$conv->recieved->name}}</td>    
                            @else
                            <td>{{$conv->sent->name}}</td>
                            @endif
                            <td>{{$conv->subject}}</td>
                            <td>{{$conv->created_at->diffForHumans()}}</td>
                            <td>
                              <a href="{{route('customer-message',$conv->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                              <a href="javascript:;" data-href="{{route('customer-message-delete',$conv->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                            </td>

                          </tr>
                        @endforeach
                        </tbody>
                      </table></div></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Ending of Dashboard data-table area -->
    </div>
  </div>
  </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are about to delete this Conversation. Everything will be deleted under this Conversation.</p>
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
  <div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">New Message</h4>
          </div>
          <form id="emailreply"  method="POST">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml" name="email" placeholder="Email"  value="">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg" class="form-control" rows="5" placeholder="Message *" required=""></textarea>
                </div>
                <input type="hidden" name="name" value="{{Auth::guard('customer')->user()->name}}">
                <input type="hidden" name="user_id" value="{{Auth::guard('customer')->user()->id}}">
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
  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a id="product-email" style="cursor: pointer;" class="add-newProduct-btn email2" data-toggle="modal" data-target="#emailModal">'+
          '<i class="fa fa-envelope-o"></i> Compose Message</a>'+
          '</div>');                                                                       
});
</script>

<script type="text/javascript">
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
@endsection