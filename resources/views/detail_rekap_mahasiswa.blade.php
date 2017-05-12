@extends('admin_template')

@section('content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Absen Kelas {{$nama}} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                        <th >NRP</th>
                        <th >NAMA</th>
                        <th >1</th>
                        <th >2</th>
                        <th >3</th>
                        <th >4</th>
                        <th >5</th>
                        <th >6</th>
                        <th >4</th>
                        <th >7</th>
                        <th >8</th>
                        <th >9</th>
                        <th >10</th>
                        <th >11</th>
                        <th >12</th>
                        <th >13</th>
                        <th >14</th>
                        <th >15</th>
                        <th >16</th>
                      </tr>
                    </thead> 
                
                <tbody>
                
                <tr>
                <td> {{$nrp}}</td>
                  <td>{{ $nama }}</td>
                 @for($i=1; $i<18; $i++)
                  @if($matakuliah[$i] == 0 )
                    <?php
                     echo '<td> </td>';
                     continue; ?>
                    @endif
                  
                  <?php          
                   
                      
                      if($matakuliah[$i][0]->status_absen == 1) echo '<td> Hadir</td>';
                      else echo '<td> Absen </td>'; 
                       
                    
                  
                  ?>
                   @endfor

                   </tr>
                
                  
                </tbody>
                

                <tfoot>
                
                </tfoot>
              </table>
              </div>
              </div>


            </div>
            <!-- /.box-body -->
          </div>


        


<script>
$(function () {
  $("#example1").DataTable();
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });
});
</script>
<script src="{{ asset("/bower_components/admin-lte/plugins/chartjs/Chart.min.js") }}"></script>

<script>


  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // // This will get the first returned node in the jQuery collection.
    // var areaChart = new Chart(areaChartCanvas);

    // var areaChartOptions = {
    //   //Boolean - If we should show the scale at all
    //   showScale: true,
    //   //Boolean - Whether grid lines are shown across the chart
    //   scaleShowGridLines: false,
    //   //String - Colour of the grid lines
    //   scaleGridLineColor: "rgba(0,0,0,.05)",
    //   //Number - Width of the grid lines
    //   scaleGridLineWidth: 1,
    //   //Boolean - Whether to show horizontal lines (except X axis)
    //   scaleShowHorizontalLines: true,
    //   //Boolean - Whether to show vertical lines (except Y axis)
    //   scaleShowVerticalLines: true,
    //   //Boolean - Whether the line is curved between points
    //   bezierCurve: true,
    //   //Number - Tension of the bezier curve between points
    //   bezierCurveTension: 0.3,
    //   //Boolean - Whether to show a dot for each point
    //   pointDot: false,
    //   //Number - Radius of each point dot in pixels
    //   pointDotRadius: 4,
    //   //Number - Pixel width of point dot stroke
    //   pointDotStrokeWidth: 1,
    //   //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    //   pointHitDetectionRadius: 20,
    //   //Boolean - Whether to show a stroke for datasets
    //   datasetStroke: true,
    //   //Number - Pixel width of dataset stroke
    //   datasetStrokeWidth: 2,
    //   //Boolean - Whether to fill the dataset with a color
    //   datasetFill: true,
    //   //String - A legend template
    //   legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //   //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    //   maintainAspectRatio: true,
    //   //Boolean - whether to make the chart responsive to window resizing
    //   responsive: true
    // };

    // //Create the line chart
    // areaChart.Line(areaChartData, areaChartOptions);

    // //-------------
    // //- LINE CHART -
    // //--------------
    // var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    // var lineChart = new Chart(lineChartCanvas);
    // var lineChartOptions = areaChartOptions;
    // lineChartOptions.datasetFill = false;
    // lineChart.Line(areaChartData, lineChartOptions);

    // //-------------
    // //- PIE CHART -
    // //-------------
    // // Get context with jQuery - using jQuery's .get() method.
    // var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    // var pieChart = new Chart(pieChartCanvas);
    // var PieData = [
    //   {
    //     value: 700,
    //     color: "#f56954",
    //     highlight: "#f56954",
    //     label: "Chrome"
    //   },
    //   {
    //     value: 500,
    //     color: "#00a65a",
    //     highlight: "#00a65a",
    //     label: "IE"
    //   },
    //   {
    //     value: 400,
    //     color: "#f39c12",
    //     highlight: "#f39c12",
    //     label: "FireFox"
    //   },
    //   {
    //     value: 600,
    //     color: "#00c0ef",
    //     highlight: "#00c0ef",
    //     label: "Safari"
    //   },
    //   {
    //     value: 300,
    //     color: "#3c8dbc",
    //     highlight: "#3c8dbc",
    //     label: "Opera"
    //   },
    //   {
    //     value: 100,
    //     color: "#d2d6de",
    //     highlight: "#d2d6de",
    //     label: "Navigator"
    //   }
    // ];
    // var pieOptions = {
    //   //Boolean - Whether we should show a stroke on each segment
    //   segmentShowStroke: true,
    //   //String - The colour of each segment stroke
    //   segmentStrokeColor: "#fff",
    //   //Number - The width of each segment stroke
    //   segmentStrokeWidth: 2,
    //   //Number - The percentage of the chart that we cut out of the middle
    //   percentageInnerCutout: 50, // This is 0 for Pie charts
    //   //Number - Amount of animation steps
    //   animationSteps: 100,
    //   //String - Animation easing effect
    //   animationEasing: "easeOutBounce",
    //   //Boolean - Whether we animate the rotation of the Doughnut
    //   animateRotate: true,
    //   //Boolean - Whether we animate scaling the Doughnut from the centre
    //   animateScale: false,
    //   //Boolean - whether to make the chart responsive to window resizing
    //   responsive: true,
    //   // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    //   maintainAspectRatio: true,
    //   //String - A legend template
    //   legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    // };
    // //Create pie or douhnut chart
    // // You can switch between pie and douhnut using the method below.
    // pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>




@endsection
