@extends('admin_template')

@section('content')

<div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10%;">KODE KELAS</th>
                
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10%;">NAMA KELAS</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">1</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">2</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">3</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">4</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">5</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">6</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">7</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">8</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">9</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">10</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">11</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">12</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">13</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">14</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">15</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 5%;">16</th>

                <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 178.778px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 129.889px;">CSS grade</th> --></tr>
                </thead>
                
                <tbody>
                
                
                
                 @for ($y=0; $y<count($presence); $y++)
               
                <tr role="row" class="odd">
                 
                  

                  <td class="sorting_1">{{$presence[$y][0]->kode}}</td>
                  <td>{{ $presence[$y][0]->nama_matkul }}</td>
                  <?php          
                     for($i=0; $i<count($presence[$y]); $i++){
                      $temp = '<td> Hadir: ' . $presence[$y][0]->presence . '<br>Absen: ' . $absent[$y][0]->absent . '</td>';
                      echo $temp;
                     
                     }           

                  
                  ?>

                  
                </tr>
                  @endfor
               
                </tbody>
                

                <tfoot>
                
                </tfoot>
              </table></div></div>


              <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
              
            </div>
            <!-- /.box-body -->
          </div>


     <!--      <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Absen</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height: 230px; width: 581px;" height="206" width="522"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
 -->


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

    var areaChartData = {
      labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4", "Minggu 5", "Minggu 6", "Minggu 7", "Minggu 8", "Minggu 9", "Minggu 10", "Minggu 11", "Minggu 12", "Minggu 13", "Minggu 14", "Minggu 15", "Minggu 16"],
      

      datasets: [
        {
          label: "Hadir",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.9)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          // data: [65, 59, 80, 81, 56, 55, 40]
          
         
        },
        {
          label: "Absen",
          fillColor: "rgba(255,34,188,0.9)",
          strokeColor: "rgba(255,34,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          //data:
        }
      ]
    };

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
