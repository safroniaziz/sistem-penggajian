@extends('admin_template')
@section('resource-chart')
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
@endsection
@section('main-title')
    Dashboard
@endsection
@section('manajemen-title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pegawai</span>
              <span class="info-box-number">{{ $total }}<small>&nbsp;Orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Jabatan</span>
              <span class="info-box-number">{{ $jabatan }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
            <div class="col-md-12">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik Masa Kerja Pegawai</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="{{ $total }} Orang Pegawai" class="label label-primary">Dari {{ $total }} Pegawai</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    

                    <!-- Chart code -->
                    <script>

                      AmCharts.addInitHandler(function(chart) {
                      // check if there are graphs with autoColor: true set
                      for(var i = 0; i < chart.graphs.length; i++) {
                        var graph = chart.graphs[i];
                        if (graph.autoColor !== true)
                          continue;
                        var colorKey = "autoColor-"+i;
                        graph.lineColorField = colorKey;
                        graph.fillColorsField = colorKey;
                        for(var x = 0; x < chart.dataProvider.length; x++) {
                          var color = chart.colors[x]
                          chart.dataProvider[x][colorKey] = color;
                        }
                      }
                      
                    }, ["serial"]);
                    var chart = AmCharts.makeChart("chartdiv", {
                      "type": "serial",
                      "theme": "light",
                      "marginRight": 70,
                      "dataProvider": [

                        @foreach ($data as $data)
                            {
                            "country": "{{ $data->nm_pegawai }}",
                            "visits": "{{ $data->masa_kerja }}",
                          },
                        @endforeach

                      ],
                      "valueAxes": [{
                        "axisAlpha": 0,
                        "position": "left",
                        "title": "Masa Kerja Pegawai (Th)"
                      }],
                      "startDuration": 1,
                      "graphs": [{
                        "balloonText": "<b>[[category]]: [[value]]</b>",
                        "fillColorsField": "color",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "type": "column",
                        "valueField": "visits",
                        "autoColor": true
                      }],
                      "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                      },
                      "categoryField": "country",
                      "categoryAxis": {
                        "gridPosition": "start",
                        "labelRotation": 45
                      },
                      "export": {
                        "enabled": true
                      }

                    });
                    </script>

                    <!-- HTML -->
                    <div id="chartdiv"></div>
                </div>
                <!-- /.box-body -->
        
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->



@endsection