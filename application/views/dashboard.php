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

  <div class="content-wrapper">
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
		<div class="preloader-wrapper" id="preloader_content"><div class="preloader"><img src="assets/img/preload.gif" alt="Cargando..."></div></div>
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

      <!-- search form (Optional) -->
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
  <footer id="main-footer" class="main-footer">
  </footer>
  
  <aside class="control-sidebar control-sidebar-dark" id="right-aside">
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="assets/bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/js/recupero_crediticio.js"></script>
<script>
	$("#preloader_content").show();
	printFooter();
	printDashboardKPI('<?=base_url();?>Dashboard/getKPI');
	printRightAside();
	printUserNavBar();
	// $("#preloader_content").hide();	
</script>
<style>
/*----------------------- Preloader -----------------------*/

.preloader-site {
    overflow: hidden;
}

.preloader-wrapper {
    height: 100%;
    width: 100%;
    background: rgba(255,255,255,0.5);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999999;
}

.preloader-wrapper .preloader {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 120px;
}
</style>


</body>
</html>
