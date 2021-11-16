@extends('layouts.front')
@section('content')
    <!-- Starting of Login/registration area -->
    <div class="section-padding login-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
          <div class="login-tab">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#login">{{$lang->signin}}</a></li>
              <li><a data-toggle="tab" href="#signup">{{$lang->signup}}</a></li>
            </ul>
            
            <div class="tab-content">
              <div id="login" class="tab-pane fade in active">
                <div class="login-title text-center">
                  <h3>{{$lang->signin}}</h3>
                </div>
                  @include('includes.form-success')
                <div class="login-form">
                  <form action="{{route('customer-login-submit')}}" method="POST">
                       {{csrf_field()}}

                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                      <label for="login_email">{{$lang->doeml}}</label>
                        <input type="email" name="email" class="form-control" id="login_email" placeholder="{{$lang->doeml}}" required>
                    </div>
                    <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                      <label for="login_pwd">{{$lang->sup}}</label>
                      <input type="password" name="password" class="form-control" id="login_pwd" placeholder="{{$lang->sup}}" required>
                    </div>
                    <button type="submit" class="btn btn-default btn-block">{{$lang->sie}}</button>
                    <div class="forgot-area text-right">
                      <a href="{{route('user-forgot')}}" target="_blank">{{$lang->fpw}}</a>
                    </div>
                    @if($sl->fcheck == 1  || $sl->gcheck == 1)
                    <div class="login-social-btn-area">

                        @if($sl->fcheck ==1)
                      <a href="{{route('social-provider','facebook')}}" class="social-btn"><i class="fa fa-facebook"></i> <span>{{ $lang->facebook_login }}</span></a>
                        @endif
                        @if($sl->gcheck ==1)
                      <a href="{{route('social-provider','google')}}" class="social-btn last-child"><i class="fa fa-google"></i> <span>{{ $lang->google_login }}</span></a>
                        @endif
                    </div>
                    @endif
                  </form>
                </div>
              </div>
              <div id="signup" class="tab-pane fade">
                <div class="login-title text-center">
                  <h3>{{$lang->signup}}</h3>
                </div>
                  @include('includes.form-error')
                <div class="login-form">
                  <form action="{{route('customer-register-submit')}}" method="POST">
                      {{csrf_field()}}

                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_email">{{$lang->doeml}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doeml}}" type="email" name="email" id="reg_email" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_name">{{$lang->fname}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->fname}}" type="text" name="name" id="reg_name" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_Pnumber">{{$lang->doph}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doph}}" type="text" name="phone" id="reg_Pnumber" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_Padd">{{$lang->doad}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->doad}}" type="text" name="address" id="reg_Padd" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="reg_password">{{$lang->sup}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->sup}}" type="password" name="password" id="reg_password" required>
                      </div>
                      <div class="form-group {{$lang->rtl == 1 ? 'text-right' : ''}}">
                          <label for="confirm_password">{{$lang->sucp}} <span>*</span></label>
                          <input class="form-control" placeholder="{{$lang->sucp}}" type="password" name="password_confirmation" id="confirm_password" required>
                      </div>
                    <button type="submit" class="btn btn-default btn-block">{{$lang->spe}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>    
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Login/registration area -->

@endsection