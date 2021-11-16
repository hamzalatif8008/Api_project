      @php
        $conv_notff = App\Models\UserNotification::where('user_id','=',Auth::guard('user')->user()->id)->get();
        if($conv_notff->count() > 0){
          foreach($conv_notff as $notf){
            $notf->is_read = 1;
            $notf->update();
          }
        }
      @endphp   

                                                            <div class="profile-notifi-title">
                                                                <h5>{{$lang->conv}}</h5>
                                                                @if($conv_notff->count() > 0)
                                                                <p  style="cursor: pointer;" id="conv_clear">Clear All</p>
                                                                @endif
                                                            </div>

                                                            @if($conv_notff->count() > 0)
                                                            @foreach($conv_notff as $notf)
                                                            @if($notf->conversation_id != null)
                                                            <div class="single-notifi-area">
                                                               <div class="notifi-img">
                                                                    <i class="fa fa-envelope"></i>
                                                               </div>
                                                               <div class="single-notifi-text">
                                                                   <h5><a href="{{route('user-message',$notf->conversation->id)}}" style="color: #333;">{{$lang->new_conv}}</a></h5>
                                                               </div>
                                                               </div>
                                                               @else
                                                            <div class="single-notifi-area">
                                                               <div class="notifi-img">
                                                                    <i class="fa fa-envelope"></i>
                                                               </div>
                                                               <div class="single-notifi-text">
                                                                   <h5><a href="{{route('user-message-show',$notf->conv1->id)}}" style="color: #333;">New Message From Admin.</a></h5>
                                                               </div>
                                                               </div>
                                                               @endif
                                                              @endforeach
                                                            @else
                                                            <div class="single-notifi-area">
                                                            <h5>{{$lang->no_conv}}</h5> 
                                                            </div>  
                                                            @endif