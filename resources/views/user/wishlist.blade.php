@extends('layouts.user')

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
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Wishlists</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Wishlists</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                    <div>
                                        @include('includes.form-success')



                                        <div class="row">
                                            <div class="col-sm-12">

                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr role="row">
                                                        <th style="width: 50px;">ID#</th>
                                                        <th style="width: 150px;">Product Title</th>
                                                        <th style="width: 100px;">Price</th>
                                                        <th style="width: 150px;">Category</th>
                                                        <th style="width: 150px;">Stock</th>
                                                        <th style="width: 370px;">Actions</th></tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($wishes as $prod)
                                                        <tr>
                                                            <td>{{$prod->product->id}}</td>
                                                            <td>{{$prod->product->name}}</td>
                                                            <td>{{$prod->product->cprice}}</td>
                                                            <td>
                                                                {{$prod->product->category->cat_name}} <br>

                                                                @if($prod->product->subcategory_id != null)

                                                                    {{$prod->product->subcategory->sub_name}} <br>

                                                                    @if($prod->product->childcategory_id != null)
                                                                        {{$prod->product->childcategory->child_name}}
                                                                    @endif

                                                                @endif
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $stck = (string)$prod->product->stock;
                                                                @endphp
                                                                @if($stck == "0")
                                                                    {{"Out Of Stock"}}
                                                                @elseif($stck == null)
                                                                    {{"Unlimited"}}
                                                                @else
                                                                    {{$prod->product->stock}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $name = str_replace(" ","-",$prod->product->name);
                                                                @endphp
                                                                <a  target="_blank" href="{{route('front.product',['id' => $prod->product->id, $name])}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                                                                <a href="javascript:;" data-href="{{route('user-wish-delete',$prod->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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
                    <p class="text-center">You are about to delete this Product From Wishlist.</p>
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
</script>

@endsection