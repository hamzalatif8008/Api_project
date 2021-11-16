@extends('layouts.front')
@section('content')
<div class="section-padding login-area-wrapper">
           <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1  col-xs-12">
                       <div class="signIn-area">
                           <h2 class="signIn-title text-center">{{$lang->fpt}}</h2>
                           <hr>
                           @include('includes.form-error')
                           @include('includes.form-success')
                           <div class="login-form">
                           <form action="{{route('user-forgot-submit')}}" method="POST">
                            {{csrf_field()}}

                               <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                                   <label for="forgot_email">{{$lang->fpe}} <span>*</span></label>
                                   <input class="form-control" placeholder="{{$lang->fpe}}" type="email" name="email" id="forgot_email" required="">
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn btn-default btn-block">{{$lang->fpb}}</button>
                               </div>
                               <div class="form-group">
                                   <div class="row">
                                       <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                            <a href="{{route('user-login')}}">{{$lang->al}}</a>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
@endsection