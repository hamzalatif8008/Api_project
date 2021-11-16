@extends('layouts.front')
@section('content')
<div class="section-padding compare-wrap">
  <div class="container-fluid">
    @if(Session::has('compare'))
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h3 class="compare-h3">{{$lang->compare_title}}</h3>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="clear-area text-right">
          <a href="" class="btn clear-btn">{{$lang->clear}}</a>
        </div>
      </div>
    </div>
    <div class="compare-content-wrap">
      <div class="singleComapre__area text-center">
        <div class="singleCompare__title image">{{$lang->cimage}}</div>
        <div class="singleCompare__title">{{$lang->cproduct}}</div>
        <div class="singleCompare__title">{{$lang->cupice}}</div>
        <div class="singleCompare__title">{{$lang->compare_rating}}</div>
        <div class="singleCompare__title">{{$lang->compare_vendor}}</div>
        <div class="singleCompare__title description">{{$lang->compare_description}}</div>
        <div class="singleCompare__title">{{$lang->compare_available}}</div>
        <div class="singleCompare__title">{{$lang->compare_cart}}</div>
      </div>
      <div class="singleCompare__content-wrap text-center">
        @if(Session::has('compare'))
        @foreach($products as $product)
        <div class="singleCompare__content">
          <div class="compare__img">
            <input type="hidden" value="{{ $product['item']['id'] }}">
            <i class="fa fa-close compare-remove" style="cursor: pointer;"></i>
            <img src="{{ asset('assets/images/'.$product['item']['photo']) }}" alt="product image">
          </div>
          <p><strong><a style="color: black;" href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}">{{strlen($product['item']['name']) > 70 ? substr($product['item']['name'],0,70).'...' : $product['item']['name']}}</a></strong></p>
          <p>                              @if($gs->sign == 0)
            {{$curr->sign}}{{ round($product['item']['cprice'] * $curr->value, 2) }}
            @else
            {{ round($product['item']['cprice'] * $curr->value, 2) }}{{$curr->sign}}
          @endif</p>
          <div class="ratings">
            <div class="empty-stars"></div>
            <div class="full-stars" style="width:{{App\Models\Review::ratings($product['item']['id'])}}%"></div>
          </div>
          <p style=" padding: 0; height: 17px;"></p>
          @if($product['item']['user_id'] != 0)
          @php
          $user = App\Models\User::findOrFail($product['item']['user_id']);
          @endphp
          @if(isset($user))
          <p>{{$user->shop_name}}</p>
          @else
          <p>No Vendor.</p>
          @endif
          @else
          <p>No Vendor.</p>
          @endif
          <p class="description">{{strip_tags($product['item']['description'])}}</p>
          @php
          $stk = (string)$product['item']['stock'];
          @endphp
          @if($stk == "0")
          <p class="productDetails-status" style="color: red;">
            <i class="fa fa-times-circle-o"></i>
            <span>{{$lang->dni}}</span>
          </p>
          @else
          <p class="productDetails-status" style="color: green;">
            <i class="fa fa-check-square-o"></i>
            <span>{{$lang->sbg}}</span>
          </p>
          @endif
          <p class="text-center">
            <input type="hidden" value="{{ $product['item']['id'] }}">
            <a href="" class="btn compare-cartBtn addcart">{{$lang->hcs}}</a></p>
          </div>
          @endforeach
          @endif
        </div>
      </div>
      @else
      <h2 class="text-center">{{$lang->no_compare}}</h2>
      @endif
    </div>
  </div>
  @endsection