<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

 <header class="main-header">

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Botón Navegador</span>
      </a>

      <div id="user-nav-bar" class="navbar-custom-menu">
      </div>
    </nav>
  </header>
 
  <aside class="main-sidebar">

    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/pp.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nadia Ramirez</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <?= $menu ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper" id="overlay">   
	<section class="content-header">
      <h1>
        Dashboard
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">	
	<!-- PRELOADER -->
		<div id="DASHBOARD_KPI" class="row">
		</div>
		 <div class="row">
			<div class="col-md-12">
			  <div class="box box-success">
				<div class="box-header with-border">
				  <h3 class="box-title">Evolución Llamadas</h3>
				</div>
				<div class="box-body">
				  <div class="chart">
					<canvas id="barChart" style="height:230px"></canvas>
				  </div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			</div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
    </section>
  </div>


  <!-- Control Sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/pp.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nadia Ramirez</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?= $menu ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside> 
  <footer id="main-footer" class="main-footer">
  </footer>
  
  <aside class="control-sidebar control-sidebar-dark" id="right-aside">
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<script src="assets/bower_components/chart.js/Chart.js"></script>
<script>
	function printDashboardKPI(url){
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function(data){
				
				/*
				
				
				Popup`,
				Salientes,
				Entrantes,
				Entrantes + Salientes AS LlamadasTotales
				
				*/
				
				
				var Popup = data.message.Popup;
				var Salientes = data.message.Salientes;
				var Entrantes = data.message.Entrantes;
				var LlamadasTotales = data.message.LlamadasTotales;
					
				$("#DASHBOARD_KPI").append('<div class="col-lg-3 col-xs-6"><div class="small-box bg-blue"><div id="POP_UP" class="inner"><h3>'+Popup+'</h3><p>Pop Up</p></div><div class="icon"><i class="fa fa-phone-square"></i></div><a href="#" class="small-box-footer"><i></i></a></div></div>');
				$("#DASHBOARD_KPI").append('<div class="col-lg-3 col-xs-6"><div class="small-box bg-aqua"><div id="SALIENTES" class="inner"><h3>'+Salientes+'</h3><p>Salientes</p></div><div class="icon"><i class="fa fa-phone-square"></i></div><a href="#" class="small-box-footer"><i></i></a></div></div>');
				$("#DASHBOARD_KPI").append('<div class="col-lg-3 col-xs-6"><div class="small-box bg-aqua"><div id="ENTRANTES" class="inner"><h3>'+Entrantes+'</h3><p>Entrantes</p></div><div class="icon"><i class="fa fa-phone-square"></i></div><a href="#" class="small-box-footer"><i></i></a></div></div>');
				$("#DASHBOARD_KPI").append('<div class="col-lg-3 col-xs-6"><div class="small-box bg-red"><div id="LLAMADASTOTALES" class="inner"><h3>'+LlamadasTotales+'</h3><p>Total Llamadas</p></div><div class="icon"><i class="fa fa-phone-square"></i></div><a href="#" class="small-box-footer"><i></i></a></div></div>');
			},
			error: function (xhr, ajaxOptions, thrownError) {
				$.notify(xhr.status+': '+thrownError, {
					className : "warn",
					position  : "right bottom"
				});
				$("#overlay").LoadingOverlay("hide");
			}
		});
	}
	
	function printBarChart(url){
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function(data){
				barChart.data.datasets[0].data[1] = 10; 
				barChart.update(); 	
			},
			error: function (xhr, ajaxOptions, thrownError) {
				$.notify(xhr.status+': '+thrownError, {
					className : "warn",
					position  : "right bottom"
				});
				$("#overlay").LoadingOverlay("hide");
			}
		});
	}
	
	$(document).ready(function (){
		$("#overlay").LoadingOverlay("show");
		printFooter();
		printDashboardKPI('<?=base_url();?>Performance/getKPI');
		printBarChart('<?=base_url();?>Performance/getTotalLlamadas');
		printRightAside();
		printUserNavBar();
		
		$("#overlay").LoadingOverlay("hide");	
	})
	
	$(function () {
		
		var ChartData = {
		  labels  : ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],
		  datasets: [
			{
			  label               : 'Llamadas',
			  fillColor           : 'rgba(210, 30, 30, 1)',
			  strokeColor         : 'rgba(210, 30, 30, 1)',
			  pointColor          : 'rgba(210, 214, 222, 1)',
			  pointStrokeColor    : '#c1c7d1',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(220,220,220,1)',
			  data                : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			}
		  ]
		}
		//-------------
		//- BAR CHART -
		//-------------
		var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
		var barChart                         = new Chart(barChartCanvas)
		var barChartData                     = ChartData
		var barChartOptions                  = {
		  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		  scaleBeginAtZero        : true,
		  //Boolean - Whether grid lines are shown across the chart
		  scaleShowGridLines      : true,
		  //String - Colour of the grid lines
		  scaleGridLineColor      : 'rgba(0,0,0,.05)',
		  //Number - Width of the grid lines
		  scaleGridLineWidth      : 1,
		  //Boolean - Whether to show horizontal lines (except X axis)
		  scaleShowHorizontalLines: true,
		  //Boolean - Whether to show vertical lines (except Y axis)
		  scaleShowVerticalLines  : true,
		  //Boolean - If there is a stroke on each bar
		  barShowStroke           : true,
		  //Number - Pixel width of the bar stroke
		  barStrokeWidth          : 2,
		  //Number - Spacing between each of the X value sets
		  barValueSpacing         : 5,
		  //Number - Spacing between data sets within X values
		  barDatasetSpacing       : 1,
		  //String - A legend template
		  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		  //Boolean - whether to make the chart responsive
		  responsive              : true,
		  maintainAspectRatio     : true
		}

		barChartOptions.datasetFill = false
		barChart.Bar(barChartData, barChartOptions)
  })
</script>



</body>
</html>
