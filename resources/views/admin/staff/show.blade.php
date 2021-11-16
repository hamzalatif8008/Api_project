@extends('layouts.admin')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Staff Information <a href="{{ route('admin-staff-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Staffs <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Show
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                    <div class="table-responsive order-details-table">
                                        <table class="table">
                                            <tbody><tr>
                                                <th>Staff ID#</th>
                                                <td>{{$staff->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Photo</th>
                                                <td>
                                              <img style="width: 250px; height: auto;" id="adminimg" src="{{ $staff->photo ? asset('assets/images/'.$staff->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="No Image" id="adminimg">

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Staff Name:</th>
                                                <td>{{$staff->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Role:</th>
                                                <td>{{$staff->role}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Email:</th>
                                                <td>{{$staff->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Phone:</th>
                                                <td>{{$staff->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Joined:</th>
                                                <td>{{$staff->created_at->diffForHumans()}}</td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>

<script type="text/javascript">
  
  function uploadclick(){
    $("#uploadFile").click();
    $("#uploadFile").change(function(event) {
          readURL(this);
        $("#uploadTrigger").html($("#uploadFile").val());
    });

}


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#adminimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection