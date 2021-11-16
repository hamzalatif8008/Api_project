@extends('layouts.admin')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard data-table area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Reviews</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Product Discussion <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Reviews</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>
                                                    <th style="width: 130px;">Product</th>
                                                    <th style="width: 150px;">Reviewer</th>
                                                    <th style="width: 100px;">Rating</th>
                                                    <th style="width: 160px;">Action</th></tr>
                                              </thead>

                                              <tbody>
                                                @foreach($reviews as $review)                                                  

                                                    <tr>
                                                        <td>
                                                          <a target="_blank" href="{{route('front.product',['id1' => $review->product->id, $review->product->name])}}">
                                                    {{ strlen($review->product->name) > 45 ? substr($review->product->name,0,45).'...' : $review->product->name }}
                                                          </a></td>
                                                    <td>{{ $review->user->email }}</td>
                                                    <td>                                            <p class="product-reviews">
                                              <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:{{$review->rating*20}}%"></div>
                                              </div>
                                          </p></td>
                                                    <td>
                                                      <input type="hidden" value="{{$review->user->email}}">
                                                      <a href="{{route('admin-review-show',$review->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                                                      <a style="cursor: pointer;" class="btn btn-success product-btn email1"  data-toggle="modal" data-backdrop="false" data-target="#emailModal1"><i class="fa fa-send"></i> Send Message</a>
                                                        <a href="javascript:;" data-href="{{route('admin-review-delete',$review->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                                                      </td>
                                                  </tr>
                                                  @endforeach
                                                  </tbody>
                                          </table></div></div>
                                        </div>
                                        </div>
                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard data-table area -->
                </div>
            </div>
        </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are about to delete this Review.</p>
                    <p class="text-center">Do you want to proceed?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
</script>

@endsection