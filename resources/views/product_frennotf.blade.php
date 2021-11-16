      @php
        $product_notff = App\Models\FrenchiseNotification::where('product_id','!=',null)->get();
        if($product_notff->count() > 0){
          foreach($product_notff as $notf){
            $notf->is_read = 1;
            $notf->update();
          }
        }
      @endphp   

                                                            <div class="profile-comments-title">
                                                                 <h5>New Product.</h5>
                                                                @if($product_notff->count() > 0)
                                                                <p  style="cursor: pointer;" id="product_clear">Clear All</p>
                                                                @endif
                                                            </div>

                                                            @if($product_notff->count() > 0)
                                                            @foreach($product_notff as $notf)
                                                            <div class="single-comments-area">
                                                               <div class="comments-img">
                                                                    <img src="{{asset('assets/images/'.$notf->product->photo)}}" alt="comments image">
                                                               </div>
                                                               <div class="single-comments-text">
                                                                   <h5><a href="{{route('front.product',['id' => $notf->product->id, 'slug' => $name])}}" style="color: #333;">You Have a new Product.</a></h5>
                                                                   <p>Stock : {{$notf->product->stock}}</p>
                                                               </div>
                                                               </div>
                                                              @endforeach
                                                            @else
                                                            <div class="single-comments-area">
                                                            <h5>No Products quantity.</h5> 
                                                            </div>  
                                                            @endif