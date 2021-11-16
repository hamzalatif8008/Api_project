@extends('layouts.front')
@section('content')

<!-- Starting of ViewCart area -->
    <div class="section-padding product-shoppingCart-wrapper">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="view-cart-title">
                  <a style="color:black;" href="{{route('front.index')}}">{{ucfirst(strtolower($lang->home))}}</a>
                  <i class="fa fa-angle-right"></i>
                  <a style="color:black;" href="{{route('front.cart')}}">{{ucfirst(strtolower($lang->fht))}}</a>
                </div>
              </div>
                <div class="col-md-12 col-sm-12">
                @include('includes.form-success')
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{{$lang->cimage}}</th>
                          <th>{{$lang->doo}}</th>
                          <th>{{$lang->colors}}</th>
                          <th colspan="2">{{$lang->cproduct}}</th>
                          <th>{{$lang->cquantity}}</th>
                          <th>{{$lang->cupice}}</th>
                          <th>{{$lang->cst}}</th>
                          <th>{{$lang->cremove}}</th>
                        </tr>
                      </thead>
                      <tbody>
                            @if(Session::has('cart'))
                            @foreach($products as $product)
                        <tr id="del{{$product['item']['id']}}">
                          <td><img src="{{ asset('assets/images/'.$product['item']['photo']) }}" style="height: 150px; width: 150px;" alt="table image"></td>
                            <td>
                              <input type="hidden" value="{{$product['item']['id']}}">
                                @if($product['item']['size'] != null)
                                  @php
                                      $sizes = explode(',',$product['item']['size']);  
                                  @endphp
                              <select class="size">
                                  @foreach($sizes as $size)
                                    <option value="{{$size}}" {{$size == $product['size'] ? "selected":""}}>{{$size}}</option>                                
                                   @endforeach
                            </select>
                                @else
                                <input type="hidden" id="size{{$product['item']['id']}}" value="">
                                @endif
                            </td>
                            <td>
                              <input type="hidden" value="{{$product['item']['id']}}">
                                @if($product['item']['color'] != null)
                                  @php
                                      $colors = explode(',',$product['item']['color']);  
                                  @endphp
                              <select class="color" style="width: 50px; background: {{$product['color']}};" >
                                  @foreach($colors as $color)
                                    <option value="{{$color}}" {{$color == $product['color'] ? "selected":""}} style="background: {{$color}};"></option>                                
                                   @endforeach
                            </select>
                                @else
                                <input type="hidden" id="color{{$product['item']['id']}}" value="">
                                @endif
                            </td>
                            <td colspan="2">
                              <p class="text-center product-name-header"><a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a></p>
                              <p class="table-product-review">
                                <div class="ratings">
                                    <div class="empty-stars"></div>
                                    <div class="full-stars" style="width:{{App\Models\Review::ratings($product['item']['id'])}}%"></div>
                                </div>
                                @php
                                $prod =App\Models\Product::findOrFail($product['item']['id']);

                                @endphp
                                <span>({{count($prod->reviews)}} {{$lang->dttl}})</span>
                              </p>
                            </td>
                            <td>
                              <div class="productDetails-quantity">
                            <p>{{$lang->cquantity}}</p>
                            <span class="quantity-btn reducing"><i class="fa fa-minus"></i></span>
                            <span id="qty{{$product['item']['id']}}">{{ $product['qty'] }}</span>
                    <input type="hidden" value="{{$product['item']['id']}}">    
                            <span class="quantity-btn adding"><i class="fa fa-plus"></i></span>
{{--                     <span style="padding-left: 5px; border: none; font-weight: 700; font-size: 12px;">{{ $product['item']['measure'] }}</span> --}}
                          </div>
                            </td>
                            <input type="hidden" id="stock{{$product['item']['id']}}" value="{{$product['stock']}}">
                            <td>
                              @if($gs->sign == 0)
                              {{$curr->sign}}{{ round($product['item']['cprice'] * $curr->value, 2) }}
                              @else
                              {{ round($product['item']['cprice'] * $curr->value, 2) }}{{$curr->sign}}
                              @endif
                            </td>
                            <td>
                              @if($gs->sign == 0)
                              {{$curr->sign}}<span id="prc{{$product['item']['id']}}">{{ round($product['price'] * $curr->value, 2) }}</span>
                              @else
                              <span id="prc{{$product['item']['id']}}">{{ round($product['price'] * $curr->value, 2) }}</span>{{$curr->sign}}
                              @endif
                            </td>
                            <td><i class="fa fa-trash-o" aria-hidden="true" style="cursor: pointer;" onclick="remove({{$product['item']['id']}})"></i></td>
                        </tr>
                            @endforeach
                            @else
                            <tr>
                              <td colspan="9"><h2 class="text-center">{{$lang->h}}</h2></td>
                            </tr>
                            @endif
                      </tbody>
                      <tfoot>
                      @if(Session::has('cart'))
                        <tr>
                          <td colspan="7"></td>
                          <td><h3 style="text-align: right;">{{$lang->vt}}</h3></td>
                          <td><h3 style="text-align: right;">
                            @if($gs->sign == 0)
                            {{$curr->sign}}<span class="total" id="grandtotal">{{round($totalPrice * $curr->value, 2)}}</span>
                            @else
                            <span class="total" id="grandtotal">{{round($totalPrice * $curr->value, 2)}}</span>{{$curr->sign}}
                            @endif
                          </h3>
                          </td>
                        </tr>
                      @endif
                        <tr>
                          <td colspan="5">
                            <a href="{{route('front.index')}}" class="shopping-btn">{{$lang->ccs}}</a>
                          </td>
                          <td colspan="4">
                  <a href="{{route('front.checkout')}}" class="update-shopping-btn">{{$lang->cpc}}</a>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of ViewCart area -->

    @endsection

@section('scripts')
<script type="text/javascript">
      $(document).on("click", ".adding" , function(){
        var pid =  $(this).parent().find('input[type=hidden]').val();
        var stck = $("#stock"+pid).val();
        var qty = $("#qty"+pid).html();
        if(stck != "")
        {
        var stk = parseInt(stck);
          if(qty <= stk)
          {
             qty++;
         $("#qty"+pid).html(qty);            
          }
        }
        else{
         qty++;
         $("#qty"+pid).html(qty);      
        }
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/addbyone')}}",
                    data:{id:pid},
                    success:function(data){
                        if(data == 0)
                        {
                        }
                        else
                        {
                        $(".total").html((data[0] * {{$curr->value}}).toFixed(2));                        
                        $(".cart-quantity").html(data[3]);
                        $("#cqty"+pid).val("1");
                        $("#prc"+pid).html((data[2] * {{$curr->value}}).toFixed(2));
                        $("#prct"+pid).html((data[2] * {{$curr->value}}).toFixed(2));
                        $("#cqt"+pid).html(data[1]);
                        $("#qty"+pid).html(data[1]);
                        }
                      }
              }); 
       });

      $(document).on("click", ".reducing" , function(){
        var id =  $(this).parent().find('input[type=hidden]').val();
        var stck = $("#stock"+id).val();
        var qty = $("#qty"+id).html();
        qty--;
        if(qty < 1)
         {
         $("#qty"+id).html("1");            
         }
         else{
         $("#qty"+id).html(qty);
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/reducebyone')}}",
                    data:{id:id},
                    success:function(data){
                        $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                        $(".cart-quantity").html(data[3]);
                        $("#cqty"+id).val("1");
                        $("#prc"+id).html((data[2] * {{$curr->value}}).toFixed(2));
                        $("#prct"+id).html((data[2] * {{$curr->value}}).toFixed(2));
                        $("#cqt"+id).html(data[1]);
                        $("#qty"+id).html(data[1]);
                      }
              }); 
         }
       });
</script>

<script type="text/javascript">
       $(document).on("change", ".size" , function(){
        var id =  $(this).parent().find('input[type=hidden]').val();
        var size = $(this).val();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/updatecart')}}",
                    data:{id:id,size:size},
                    success:function(data){
                        $.notify("{{$gs->size_change}}","success");
                      }
              }); 
       });

       $(document).on("change", ".color" , function(){
        var id =  $(this).parent().find('input[type=hidden]').val();
        var colors = $(this).val();
        $(this).css('background',colors);
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/upcolor')}}",
                    data:{id:id,color:colors},
                    success:function(data){
                        $.notify("{{$gs->color_change}}","success");
                      }
              }); 
       });
</script>

<script type="text/javascript">
       $(document).on("click", ".delcart" , function(){
        $(this).parent().parent().hide();
       });
</script>





@endsection