@extends('layouts.frenchise')

@section('content')
       <div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard header items area -->
                        <div class="panel panel-default admin">
                          <div class="panel-heading admin-title">
                                    <div class="product__header" style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2 style="font-size: 25px;">Frnchise Dashboard</h2>
                                                </div>
                                            </div>
                                              @include('includes.frenchise-notification')
                                        </div>   
                                    </div>
                            </div>
                              <div class="panel-body dashboard-body">
                                  <div class="dashboard-header-area">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @include('includes.form-success')
                                           
                                        </div>
                                      
                                        <?php 
                                            $frenchise = Auth::guard('frenchise')->user(); 
                                            $vendors = App\Models\User::where('frenchise_id',$frenchise->id)->get()->pluck('id');
                                            $gincome = 0;
                                            $nincome = 0; 
                                            foreach($vendors as $key)
                                            {
                                                $gincome=$gincome+(App\Models\Vendororder::where('user_id','=',$key)->where('status','completed')->sum('price'));
                                            }
                                           
                                            $detection = (($gincome * $currency_sign->value) * $gs->percentage_commission)/100;
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a  class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                                <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($gincome  * $currency_sign->value,2)}}</div>
                                                <h4>Total Sale</h4>

                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a  class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                                <h4>{{$gs->percentage_commission}}% get of Total Sale</h4>
                                                  <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($detection,2)}}</div>
                                                <h4>Gross Income</h4>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a  class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                                <h4>30% of Gross Income</h4> 
                                                <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format((($detection*30)/100),2)}}</div>
                                                <h4>Net Income</h4>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a  class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                                <h4>{{$frenchise->monthly_percentage}}% of Net Income</h4> 
                                                @php
                                                    $net_incom = number_format((($detection*30)/100),2);
                                                    $monthly_incom = ($net_incom * $frenchise->monthly_percentage)/100;
                                                @endphp
                                                <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($monthly_incom,2)}}</div>
                                                <h4>Monthly Net Income</h4>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a  class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                                <h4>{{$frenchise->yearly_percentage}}% of Net Income</h4> 
                                                @php
                                                    $net_incom = number_format((($detection*30)/100),2);
                                                    $yearly_incom = ($net_incom * $frenchise->yearly_percentage)/100;
                                                @endphp
                                                <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($yearly_incom,2)}}</div>
                                                <h4>Yearly Net Income</h4>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a  class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-usd fa-5x"></i></div>
                                                <h4>{{$frenchise->completion_percentage}}% of Net Income</h4> 
                                                @php
                                                    $net_incom = number_format((($detection*30)/100),2);
                                                    $completion_incom = ($net_incom * $frenchise->completion_percentage)/100;
                                                @endphp
                                                <div style="font-size: 38px; font-weight: 600;">{{$currency_sign->sign}}{{number_format($completion_incom,2)}}</div>
                                                <h4>Completion Net Income</h4>
                                            </a>
                                        </div>
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ending of Dashboard header items area -->

                    <!-- Starting of Dashboard Top reference + Most Used OS area -->
                    <div class="reference-OS-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-default admin top-reference-area">
                                    <div class="panel-heading">Daily Sales</div>
                                    <div class="panel-body">
                                        <div id="chartContainer1" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-default admin top-reference-area">
                                    <div class="panel-heading">weekly Sales</div>
                                    <div class="panel-body">
                                        <div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Top reference + Most Used OS area -->
                        <!-- Starting of Dashboard header items area -->
                        <div class="panel panel-default admin">
                            <div class="panel-heading admin-title">Total Sales in Last 30 Days</div>
                            <div class="panel-body dashboard-body">
                                <div class="dashboard-header-area">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 pb-3">
                                            <div id="chartContainer3"
                                                style="height: 370px; max-width: 930px; margin: 0px auto;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default admin">
                          <div class="panel-heading admin-title">Total Sales in Last 30 Days</div>
                              <div class="panel-body dashboard-body">
                                  <div class="dashboard-header-area">
                                    <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding: 0">
                                        <canvas id="lineChart" style="width: 1074px; height: 537px;" width="1074" height="537"></canvas>
                                    </div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script language="JavaScript">
        displayLineChart();
        function displayLineChart() {
            var data = {
                labels: [
                    {!! $days !!}
                ],
                datasets: [
                    {
                        label: "Prime and Fibonacci",
                        fillColor: "#3dbcff",
                        strokeColor: "#0099ff",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            {!! $sales !!}
                        ]
                    }
                ]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
        </script>

<script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
                exportEnabled: true,
                animationEnabled: true,

                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($referrals as $browser)
                                    {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                                @endforeach
                        ]
                    }
                ]
            });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os",
            {
                exportEnabled: true,
                animationEnabled: true,
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                            @foreach($browsers as $browser)
                                {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                            @endforeach
                        ]
                    }
                ]
            });
        chart.render();    
</script>

<script>
window.onload = function () {

var chart1 = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: ""
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",
        dataPoints: [
            { x: 10, y: 71 },
            { x: 20, y: 55 },
            { x: 30, y: 50 },
            { x: 40, y: 65 },
            { x: 50, y: 92, indexLabel: "Highest" },
            { x: 60, y: 68 },
            { x: 70, y: 38 },
            { x: 80, y: 71 },
            { x: 90, y: 54 },
            { x: 100, y: 60 },
            { x: 110, y: 36 },
            { x: 120, y: 49 },
            { x: 130, y: 21, indexLabel: "Lowest" }
        ]
    }]
});
var chart2 = new CanvasJS.Chart("chartContainer2", {
    exportEnabled: true,
    animationEnabled: true,
    title:{
        text: ""
    },
    legend:{
        cursor: "pointer",
        itemclick: explodePie
    },
    data: [{
        type: "pie",
        showInLegend: true,
        toolTipContent: "{name}: <strong>{y}%</strong>",
        indexLabel: "{name} - {y}%",
        dataPoints: [
            { y: 26, name: "Total Sale", exploded: true },
            { y: 20, name: "Gross Income" },
            { y: 5, name: "Net Income" },
            { y: 3, name: "Total Customer" },
            { y: 7, name: "Total Order" },
            { y: 17, name: "Vendor" },
            { y: 22, name: "Other Local Assistance"}
        ]
    }]
});
var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "Product Manufacturing Expenses"
    },
    data: [{
        type: "pyramid",
        indexLabelFontSize: 18,
        valueRepresents: "area",
        showInLegend: true,
        legendText: "{indexLabel}",
        toolTipContent: "<b>{indexLabel}:</b> {y}%",
        dataPoints: [
            { y: 30, indexLabel: "Research and Design" },
            { y: 30, indexLabel: "Manufacturing" },
            { y: 15, indexLabel: "Marketing" },
            { y: 13, indexLabel: "Shipping" },
            { y: 12, indexLabel: "Retail" }
        ]
    }]
});
chart1.render();
chart2.render();
chart3.render();
}
function explodePie (e) {
    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart2.render();

}
</script> 
@endsection