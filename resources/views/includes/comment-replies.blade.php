@if($gs->is_comment == 1)

@if(Auth::guard('customer')->check())

      <!--  Starting of product detail comments area   -->
    <div class="container pt-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-comments-area product">
                    <h3 id="cmnt-text">{{ count($product->comments) > 1 ? $lang->comments:$lang->comment}} (<span id="cmnt_count">{{count($product->comments)}}</span>)</h3>

                <div class="blog-comments-msg-area">
                    <form action="" method="POST" id="cmnt">
                      {{csrf_field()}}
                            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::guard('customer')->user()->id}}">
                        <div class="form-group">
                            <textarea name="text" placeholder="{{$lang->write_comment}}" id="txtcmnt" rows="5" class="form-control" style="resize: vertical;" required></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn blog-btn comments">{{$lang->comment}}</button>
                        </div>
                    </form>
                </div>
                <div id="comments">
                  @php 
                  $g = 1
                  @endphp
        @if($product->comments)
            @foreach($product->comments()->orderBy('created_at','desc')->get() as $comment)
              <div id="comment{{$comment->id}}" >
                        <div class="row single-blog-comments-wrap">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$comment->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $comment->created_at->diffForHumans() }}</div>
                                <p id="cmntttl{{$comment->id}}">{{$comment->text}}</p>
                                <div class="replay-form">
                                    <p class="text-right">
                                      <input type="hidden" value="{{$comment->id}}">
                                      <button class="replay-btn">{{$lang->reply_button}} <i class="fa fa-reply"></i></button>
                                      @if(Auth::guard('customer')->user()->id == $comment->user_id)
                                            <style type="text/css">
                                              #raply{{$g}} {
                                                    left: 195px;
                                                }
                                            </style>
                                          @if($lang->rtl == 1)
                                            <style type="text/css">
                                              #raply{{$g}} {
                                                    left: auto;
                                                    right: 209px;
                                                }
                                            </style>
                                          @endif
                                          <button class="replay-btn-edit">{{$lang->edit_button}} <i class="fa fa-edit"></i></button>
                                          <button class="replay-btn-delete">{{$lang->remove}} <i class="fa fa-trash"></i></button>
                                      @else
                                          <style type="text/css">
                                            #raply{{$g}} {
                                                  left: 75px;
                                              }
                                          </style>  
                                          @if($lang->rtl == 1)
                                          <style type="text/css">
                                            #raply{{$g}} {
                                                  left: auto;
                                                  right: 73px;
                                              }
                                          </style>
                                          @endif                                    
                                      @endif
                                      @if($comment->replies()->count() > 0)
                                      <button class="view-replay-btn" id="raply{{$g}}">{{ $lang->view_replies }}<i class="fa fa-reply-all"></i></button>
                                      @else
                                      <button class="view-replay-btn" style="display: none;">{{ $lang->view_replies }} <i class="fa fa-reply-all"></i></button>
                                      @endif
                                    </p>
                                    <form action="" method="POST" class="comment-edit">
                                      {{csrf_field()}}
                                  <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                      <div class="form-group">
                                        <textarea rows="2" id="editcmnt{{$comment->id}}" name="text" class="form-control" placeholder="{{$lang->edit_comment}}" required="" style="resize: vertical;"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">{{$lang->update_comment}}</button>
                                        <button type="button" class="btn btn-no-border hvr-shutter-out-horizontal cancel">{{$lang->cancel_edit}}</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="replies{{$comment->id}}" style="display: none;">
                          <div class="rapper" style="display: none;">
                   @if($comment->replies)
                   @foreach($comment->replies as $reply)
                   <div id="reply{{$reply->id}}">                   
                        <div class="row single-blog-comments-wrap replay">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$reply->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $reply->created_at->diffForHumans() }}</div>
                                <p id="rplttl{{$reply->id}}">{{$reply->text}}</p>

                                <div class="replay-form">
                                    <p class="text-right">
                                      <input type="hidden" value="{{$comment->id}}">
                                      <button class="subreplay-btn">{{$lang->reply_button}} <i class="fa fa-reply"></i></button>
                                      @if(Auth::guard('customer')->user()->id == $reply->user_id)
                                      <button class="replay-btn-edit1">{{$lang->edit_button}} <i class="fa fa-edit"></i></button>
                                      <button class="replay-btn-delete1">{{$lang->remove}} <i class="fa fa-trash"></i></button>
                                      @endif
                                    </p>
                                    <form action="" method="POST" class="reply-edit">
                                      {{csrf_field()}}
                                  <input type="hidden" name="reply_id" value="{{$reply->id}}">
                                      <div class="form-group">
                                        <textarea rows="2" id="editrpl{{$reply->id}}" name="text" class="form-control" placeholder="{{$lang->edit_reply}}" required="" style="resize: vertical;"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">{{$lang->update_comment}}</button>
                                        <button type="button" class="btn btn-no-border hvr-shutter-out-horizontal cancel">{{$lang->cancel_edit}}</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                    @endforeach
                    @endif
                    </div>
                    <form action="" method="POST" class="reply" style="display: none;">
                      {{csrf_field()}}
                      <input type="hidden" name="comment_id" id="comment_id{{$comment->id}}" value="{{$comment->id}}">
                      <input type="hidden" name="user_id" id="user_id{{$comment->id}}" value="{{Auth::guard('customer')->user()->id}}">
                        <div class="form-group">
                          <textarea rows="2" name="text" id="txtcmnt{{$comment->id}}" class="form-control" placeholder="{{$lang->write_reply}}" required="" style="resize: vertical;"></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">{{$lang->reply_button}}</button>
                        </div>
                    </form>
                  </div>

              </div>
              @php 
              $g++;
              @endphp
          @endforeach
        @endif
        </div>
                </div>
        </div>
      </div>
    </div>
    <!--  Ending of product detail comments area   -->

@else

    <div class="container pt-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-comments-area product">
            <hr>
            <h3 class="text-center"><a style="cursor: pointer; background-color: {{$gs->colors == null ? '#007bff':$gs->colors}}; border-color: {{$gs->colors == null ? '#007bff':$gs->colors}}; padding: 8px 12px;"  class="no-wish btn btn-primary" data-toggle="modal" data-target="#loginModal">{{$lang->comment_login}}</a> {{$lang->comment_review}} </h3>
            <hr>
          </div>
        </div>
      </div>
    </div>

      <!--  Starting of product detail comments area   -->
    <div class="container pt-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-comments-area product">
                    <h3 id="cmnt-text">{{ count($product->comments) > 1 ? $lang->comments:$lang->comment}} (<span id="cmnt_count">{{count($product->comments)}}</span>)</h3>

                <div id="comments">
        @if($product->comments)
            @foreach($product->comments()->orderBy('created_at','desc')->get() as $comment)
              <div id="comment{{$comment->id}}">
                        <div class="row single-blog-comments-wrap">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$comment->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $comment->created_at->diffForHumans() }}</div>
                                <p id="cmntttl{{$comment->id}}">{{$comment->text}}</p>
                                <div class="replay-form">
                                    <p class="text-right">
                                      <style type="text/css">
                                        .view-replay-btn {
                                          left: 15px;
                                        }
                                      </style>
                                      @if($comment->replies()->count() > 0)
                                      <button class="view-replay-btn">{{ $lang->view_replies }} <i class="fa fa-reply-all"></i></button>
                                      @else
                                      <button class="view-replay-btn" style="display: none;">{{ $lang->view_replies }} <i class="fa fa-reply-all"></i></button>
                                      @endif
                                    </p>
                                <form class="reply">
                                  <input type="hidden" name="comment_id" id="comment_id{{$comment->id}}" value="{{$comment->id}}">
                                </form>
                                </div>
                            </div>
                        </div>
                        <div id="replies{{$comment->id}}" style="display: none;">
                   @if($comment->replies)
                   @foreach($comment->replies as $reply)
                   <div id="reply{{$reply->id}}">                   
                        <div class="row single-blog-comments-wrap replay">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$reply->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $reply->created_at->diffForHumans() }}</div>
                                <p id="rplttl{{$reply->id}}">{{$reply->text}}</p>
                            </div>
                        </div>
                      </div>
                    @endforeach
                    @endif
                  </div>

              </div>
          @endforeach
        @endif
        </div>
                </div>
        </div>
      </div>
    </div>
    <!--  Ending of product detail comments area   -->


@endif

@endif