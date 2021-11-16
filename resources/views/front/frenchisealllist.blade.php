@extends('layouts.front')
@section('content')
<style type="text/css">
.allshopspageimg{
width: 100%;
height: 300px;
border-radius: 10px;
margin-top: 10px;
}
.allshopspagediv1{
background-color:white;
opacity: 0.9;
margin-top: -120px;
width: 100%;
height: 120px;
border-top-right-radius: 15px;
border-top-left-radius: 15px;
padding-top: 5px;
color: rgba(0, 0, 0, 0.8);
} 
.allshopspageh3{
font-size: 16px;
font-weight: 600;
}
.shpallfafa{
font-size: 14px;
}
.allshopspagesp{
font-size: 17px;
font-weight: 600;
}
.allshopspagep{
font-size: 14px;
}
.hiddenStyle {
position: absolute;
overflow: hidden;
height: 1px;
width: 1px;
margin: -1px;
padding: 0;
border: 0;
}
.btn-allshopload{
border: 1px solid black;
color: black;
background-color: transparent;
width: 100%;
font-size: 20px;
font-weight: 500;
transition: 1s ease-in-out;
}
.btn-allshopload:hover{
border: 1px solid black;
color: white;
background-color: black;
transition: 1s ease-in-out;
}
.btn-allshopload:focus{
outline: none;
box-shadow: none;
}
</style>
<div class="container-fluid frenchisealllisthead"  style="background-image:url('{{asset('assets/front/images/646f52b084f90599794f122a3f475d20.jpg')}}');">
</div>
<div class="container frenchisealllistcontainer">
  <div class="row">
    @if(isset($fcitiesd))
      @foreach($fcitiesd as $fcity )
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 frenchisealllistdiv">
          <span ><b><span class="frenchisealltext">{{$fcity->frenchise_name}}</span></b> </span><br>
          <span ><i class="fa fa-map-marker frenchiseallfa"></i><span class="frenchisealltext">{{$fcity->frenchise_address}}</span> </span><br>
          <span ><i class="fa fa-phone-square frenchiseallfa"></i><span class="frenchisealltext">{{$fcity->frenchise_mobile_number}}</span> </span><br>
          <span ><i class="fa fa-envelope frenchiseallfa"></i><span class="frenchisealltext">{{$fcity->email}}</span> </span><br>
          <span><a href="{{route('frenchise-vendor-list',['id' => $fcity->id])}}"><i class="fa fa-users frenchiseallfa"></i><span class="frenchisealltext">total vendors({{count(App\Models\User::where('frenchise_id',$fcity->id)->get())}})</a></span><br>
          <div class="frenchisesocialrow">
            <span>
              @if($fcity->f_url)
              <a href="{{$fcity->f_url}}"><i class="fa fa-facebook faface"></i></a>
              @endif
              @if($fcity->t_url)
              <a href="{{$fcity->t_url}}"><i class="fa fa-twitter faface"></i></a>
              @endif
              @if($fcity->g_url)
              <a href="{{$fcity->g_url}}"><i class="fa fa-google faface"></i></a>
              @endif
              @if($fcity->i_url)
              <a href="{{$fcity->i_url}}"><i class="fa fa-instagram faface"></i></a>
              @endif
              @if($fcity->l_url)
              <a href="{{$fcity->l_url}}"><i class="fa fa-linkedin-square faface"></i></a>
              @endif
              @if($fcity->y_url)
              <a href="{{$fcity->y_url}}"><i class="fa fa-youtube faface"></i></a>
              @endif
              </span>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
@if(isset($frenvendor))
<div class="section-padding product-category-wrap" style="margin-top: 10px;margin-bottom: 30px;"> 
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="category-wrap">
          <div class="row">
            @foreach ($frenvendor as $topshop)
              
              <div class="col-lg-3 col-md-4 col-sm-6 col-12 itemss">
                <a href="{{route('front.vendor',str_replace(' ', '-',($topshop->shop_name)))}}">
                  <img src="{{asset('assets/images/'.$topshop->photo)}}" class="img-fluid allshopspageimg" alt="">
                </a>
                <div class="text-center allshopspagediv1 ">
                  <h4 class="allshopspageh3 ">{{$topshop->shop_name}}</h4>
                      {{--  <span class="full-stars" style="width:{{$topshop->shopratings($topshop->id)}}%"></span>  --}} 

                  <span><i class="full-stars" style="width:{{$topshop->shopratings($topshop->id)}}%"></i></span>
                  <p class="allshopspagep"><span class="allshopspagesp">{{count($topshop->products()->get())}} </span>Total Products</p>
                </div>
                
              </div>
            @endforeach

          </div>
        </div>  
      </div>              
    </div>
  </div>
</div>
@endif

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript">
console.clear();
var work = document.querySelector("#workOuterShell");
var items = Array.from(work.querySelectorAll(".itemss"));
var loadMore = document.getElementById("loadMore");
maxItems = 3;
loadItems = 2;
hiddenClass = "hiddenStyle";
hiddenItems = Array.from(document.querySelectorAll(".hiddenStyle"));
items.forEach(function (item, index) {
console.log(item.innerText, index);
if (index > maxItems - 1) {
item.classList.add(hiddenClass);
}
});
loadMore.addEventListener("click", function () {
[].forEach.call(document.querySelectorAll("." + hiddenClass), function (
item,
index
) {
if (index < loadItems) {
item.classList.remove(hiddenClass);
}
if (document.querySelectorAll("." + hiddenClass).length === 0) {
loadMore.style.display = "none";
}
});
});
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
@endsection