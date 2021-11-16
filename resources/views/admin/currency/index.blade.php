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
                                                    <h2>Currencies</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Payment Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Currencies</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <div class="add-product-header products" style="justify-content: unset;">
                                        <label class="control-label" for="about_page_content" style=" padding-top: 10px; padding-left: 10px;"> Multiple Currencies:</label>
                                            <div class="col-sm-3" style="margin-top: 6px;">
                                                        <span class="dropdown">
                                            <button id="Vendor" class="btn btn-{{$ps->is_currency == 1 ? 'primary':'danger'}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$ps->is_currency == 1 ? 'Activated':'Deactivated'}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-cur-update',1)}}">Active</a></li>
                                                            <li><a href="{{route('admin-cur-update',0)}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                            </div>
                                      </div>
                                      <hr>



                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
        


                                      <div class="row">
                                        <div class="col-sm-12">

                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr role="row">
                                                    <th style="width: 184px;">Name</th>
                                                    <th style="width: 184px;">Sign</th>
                                                    <th style="width: 184px;">Value</th>
                                                    <th style="width: 314px;">Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                              @foreach($faqs as $faq)    
                                              <tr>
                                                      <td> &nbsp;{{$faq->name}}</td>
                                                      <td> &nbsp;{{$faq->sign}}</td>
                                                      <td> &nbsp;{{$faq->value}}</td>
                                                      <td>
                                                        @if($faq->id != 1)
                                                        <a href="{{route('admin-currency-edit',$faq->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="javascript:;" data-href="{{route('admin-currency-delete',$faq->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                                                        @endif

                                                        @if($faq->is_default == 1)
                                                        <a class="btn btn-success product-btn"><i class="fa fa-check"></i> Default</a>
                                                        @else
                                                        <a class="btn btn-info product-btn" href="{{route('admin-currency-st',['id1'=>$faq->id,'id2'=>1])}}">Set Default</a>
                                                        @endif
                                                      </td>
                                                  </tr>
                                              @endforeach
                                                </tbody>
                                          </table>
                                        </div>
                                        </div>
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
                    <p class="text-center">You are about to delete this Currency.</p>
                    <p class="text-center">Do you want to proceed?</p>
                    {{-- <p>Everything will be deleted under this Name.</p> --}}
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
  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a href="{{route('admin-currency-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Add New Currency</a>'+
          '</div>');                                                                       
});
</script>

@endsection