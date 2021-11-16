      @php
      $vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get()->pluck('id');
        $user_notff = App\Models\FrenchiseNotification::whereIn('user_id',$vendor)->where('user_id','!=',null)->orWhere('vendor_id','!=',null)->get();
        if($user_notff->count() > 0){
          foreach($user_notff as $notf){
            $notf->is_read = 1;
            $notf->update();
          }
        }
      @endphp   
                                                            <div class="profile-wishlist-title">
                                                                <h5>New Notification(s).</h5>
                                                                @if($user_notff->count() > 0)
                                                                <p style="cursor: pointer;" id="user_clear">Clear All</p>
                                                                @endif
                                                            </div>
                                                            
                                                              @if($user_notff->count() > 0)
                                                              @foreach($user_notff as $notf)
                                                              @if($notf->user_id != null)
                                                              <div class="single-wishlist-area">
                                                               <div class="wishlist-img">
                                                                    <i class="fa fa-heart"></i>
                                                               </div>
                                                               <div class="single-wishlist-text">
                                                                   <h5><a href="{{route('frenchise-vendor-show',$notf->user_id)}}" style="color: #333;">A New User Has Registered.</a></h5>
                                                                   <p>{{$notf->created_at->diffForHumans()}}</p>
                                                               </div>
                                                              </div>
                                                              @else
                                                              <div class="single-wishlist-area">
                                                               <div class="wishlist-img">
                                                                    <i class="fa fa-heart"></i>
                                                               </div>
                                                               <div class="single-wishlist-text">
                                                                   <h5><a href="{{route('frenchise-vendor-show',$notf->vendor_id)}}" style="color: #333;">A User Has applied for Vendor.</a></h5>
                                                                   <p>{{$notf->created_at->diffForHumans()}}</p>
                                                               </div>
                                                              </div>
                                                              @endif
                                                              
                                                              @endforeach
                                                              @else
                                                              <div class="single-wishlist-area">
                                                              <h5>No New Notification(s).</h5>
                                                              </div>
                                                              @endif