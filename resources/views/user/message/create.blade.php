@extends('layouts.user')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Office Address -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>{{$conv->subject}} <a href="{{ route('user-message-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                            </h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Tickets <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Details</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>

                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Office Address -->
                </div>
<div class="row">
                        @include('includes.form-success')
                                          @include('includes.form-error')
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Wrong Invoice area -->

                        <div class="section-padding support-ticket-wrapper padding-top-0">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            @foreach($conv->messages as $message)
                                            @if($message->user_id != 0)
                                            <div class="single-reply-area">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">

                                                        <img class="img-circle" src="{{$message->conversation->user->photo != null ? asset('assets/images/'.$message->conversation->user->photo) : asset('assets/images/noimage.png')}}" alt="">
                                                        <p class="ticket-date">{{$message->conversation->user->name}}</p>
                                                    </div>
                                                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-8">
                                                        <p>{{$message->message}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @else

                                            <div class="single-reply-area user">
                                                <div class="row">
                                                    <div class="col-lg-2 col-lg-push-10 col-md-3 col-md-push-9 col-sm-3 col-sm-push-9 col-xs-4 col-xs-push-8">
                                                        <img class="img-circle" src="{{ asset('assets/images/admin.jpg')}}" alt="">
                                                        <p class="ticket-date">Admin</p>
                                                    </div>
                                                    <div class="col-lg-10 col-lg-pull-2 col-md-9 col-md-pull-3 col-sm-9 col-sm-pull-3 col-xs-8 col-xs-pull-4">
                                                        <p>{{$message->message}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <br>
                                            @endforeach
                                        </div>
                                      <div class="panel-footer">
                                          <form action="{{route('user-message-store')}}" method="POST">
                                            {{csrf_field()}}
                                              <div class="form-group">
                                                <input type="hidden" name="conversation_id" value="{{$conv->id}}">
                                                <input type="hidden" name="user_id" value="{{$conv->user->id}}">
                                                  <textarea class="form-control" name="message" id="wrong-invoice" rows="5"  style="resize: vertical;" required placeholder="Message"></textarea>
                                              </div>
                                              <div class="form-group">
                                                  <button class="btn btn-primary invoice-btn">
                                                      Add Reply
                                                  </button>
                                              </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ending of Wrong Invoice area -->
                        </div>
                    </div>                
            </div>
        </div>
    </div>
@endsection
