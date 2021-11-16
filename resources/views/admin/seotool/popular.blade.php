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
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Popular Products</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> SEO Tools <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Popular Products</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                  <hr>
                  <div>
                                 @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>
                                                    <th style="width: 150px;"> Name</th>
                                                    <th style="width: 110px;">Category</th>
                                                    <th style="width: 110px;">Type</th>
                                                    <th style="width: 110px;">Clicks</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                                @foreach($productss as $productt) 
                    @foreach($productt as $prod)

                                                        <tr>

                                                            @php
                                                                $name = str_replace(" ","-",$prod->product->name);
                                                            @endphp
                                                            <td><a href="{{route('front.product',['id' => $prod->product->id, 'slug' => $name])}}" target="_blank">{{strlen($prod->product->name) > 50 ? substr($prod->product->name, 0, 50) : $prod->product->name}}</a></td>
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
{{$prod->product->type == 0 ? "Physical" : "Digital"}}
  </td>
                                      <td>{{$productt->count('product_id')}}</td>
                                                  </tr>

                                                  @break
                    @endforeach



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
@endsection

@section('scripts')
<script type="text/javascript">
$( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-center">'+
        '<select class="form-control" id="prevdate">'+
          '<option value="30" {{$val==30 ? 'selected':''}}>Last 30 Days</option>'+
          '<option value="15" {{$val==15 ? 'selected':''}}>Last 15 Days</option>'+
          '<option value="7" {{$val==7 ? 'selected':''}}>Last 7 Days</option>'+
        '</select>'+
          '</div>'); 

        $("#prevdate").change(function () {
        var sort = $("#prevdate").val();
        window.location = "{{url('/admin/products/popular/')}}/"+sort;
    });                                                                      
});
</script>

@endsection