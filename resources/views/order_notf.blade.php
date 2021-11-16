      @php
        $order_notff = App\Models\Notification::where('order_id','!=',null)->get();
        if($order_notff->count() > 0){
          foreach($order_notff as $notf){
            $notf->is_read = 1;
            $notf->update();
          }
        }
      @endphp   

                                                            <div class="profile-notifi-title">
                                                                <h5>New Orders.</h5>
                                                                @if($order_notff->count() > 0)
                                                                <p style="cursor: pointer;" id="order_clear">Clear All</p>
                                                                @endif
                                                            </div>

                                                            
                                                              @if($order_notff->count() > 0)
                                                               @foreach($order_notff as $notf)
                                                               <div class="single-notifi-area">
                                                               <div class="notifi-img">
                                                                    <i class="fa fa-heart"></i>
                                                               </div>
                                                               <div class="single-notifi-text">
                                                                   <h5><a href="{{route('admin-order-show',$notf->order_id)}}" style="color: #333;">You Have a new order.</a></h5>
                                                                   <p>{{$notf->created_at->diffForHumans()}}</p>
                                                               </div>
                                                             </div>
                                                               @endforeach
                                                              @else
                                                              <div class="single-notifi-area">
                                                              <h5>No New Order(s).</h5>
                                                            </div>
                                                              @endif