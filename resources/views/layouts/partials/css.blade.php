<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/AdminLTE.min.css ')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/skins/skin-blue.min.css')}}">

    <!-- sweet alert -->
  <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">

   {{-- dataTables --}}
    <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  
  @yield('resource-chart')

    <!-- Styles -->
    <style>
    #chartdiv {
      width: 100%;
      height: 300px;
    }

    .amcharts-export-menu-top-right {
      top: 10px;
      right: 0;
    }

    .dt-buttons{
      float: left;
      margin-right: 5px;
      font-family: sans-serif;
    }
    .amcharts-chart-div a {display:none !important;}
    </style>