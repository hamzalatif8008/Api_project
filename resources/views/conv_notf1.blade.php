      @php
        $conv_notff = App\Models\Notification::where('conversation_id','!=',null)->get();
        if($conv_notff->count() > 0){
          foreach($conv_notff as $notf){
            $notf->is_read = 1;
            $notf->update();
          }
        }
      @endphp   

                                                            <div class="profile-notifi-title">
                                                                <h5>New Conversations.</h5>
                                                                @if($conv_notff->count() > 0)
                                                                <p  style="cursor: pointer;" id="conv_clear">Clear All</p>
                                                                @endif
                                                            </div>

                                                            @if($conv_notff->count() > 0)
                                                            @foreach($conv_notff as $notf)
                                                            <div class="single-notifi-area">
                                                               <div class="notifi-img">
                                                                    <i class="fa fa-envelope"></i>
                                                               </div>
                                                               <div class="single-notifi-text">
                                                                   <h5><a href="{{route('admin-message-show',$notf->conversation_id)}}" style="color: #333;">You Have a New Message.</a></h5>
                                                               </div>
                                                               </div>
                                                              @endforeach
                                                            @else
                                                            <div class="single-notifi-area">
                                                            <h5>You Have No New Message.</h5> 
                                                            </div>  
                                                            @endif