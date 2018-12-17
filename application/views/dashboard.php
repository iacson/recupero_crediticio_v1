<style>
</style>
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
<script>
	function printDashboardKPI(url){
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function(data){
				for(let i=0; i<data.message.length; i++){
					var vKpi = data.message[i].KPI;
					var vName = data.message[i].NAME;
					var vValue = data.message[i].VALUE;
					var vIcon = data.message[i].ICON;
					var vColor = data.message[i].COLOR;
					
					$("#DASHBOARD_KPI").append('<div class="col-lg-3 col-xs-6"><div class="small-box '+vColor+'"><div id="'+vKpi+'" class="inner"><h3>'+vValue+'</h3><p>'+vName+'</p></div><div class="icon"><i class="fa '+vIcon+'"></i></div><a href="#" class="small-box-footer"><i></i></a></div></div>');
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				$.notify(xhr.status+': '+thrownError, {
					className : "warn",
					position  : "right bottom"
				});
				$("#generic_preloader").LoadingOverlay("hide");
			}
		});
	}
	
	$(document).ready(function (){
		$("#overlay").LoadingOverlay("show");
		printFooter();
		printDashboardKPI('<?=base_url();?>Dashboard/getKPI');
		printRightAside();
		printUserNavBar();
		$("#overlay").LoadingOverlay("hide");	
	})
</script>



</body>
</html>
