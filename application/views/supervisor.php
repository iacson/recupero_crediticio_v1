<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <header class="main-header">

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Botón Navegador</span>
      </a>

      <div id="supervisor-nav-bar" class="navbar-custom-menu">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content_overlay">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supervisor
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Config</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <section id="supervisor_list" class="col-lg-12">
		
        </section>
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
      <?= $menu ?>
    </section>
  </aside> 
  <footer id="main-footer" class="main-footer">
  </footer>
  
  <aside class="control-sidebar control-sidebar-dark" id="right-aside">
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<script>


function printSupervisorList(url){
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		cache: false,
		async: true,
		success: function(data){
	    var html = `<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Tabla de Usuarios</h3>
				</div>
				<div class="table-responsive">
				  <table class="table table-bordered">
					<tbody>
					<tr>
					  <th>Supervisor</th>
					 
					  <th style="width: 10px" colspan="3"></th>
					</tr>`;
				for(let i=0; i<data.message.length; i++){

            var supervisor = data.message[i].supervisor;
      
      
            html += '<tr><td>'+supervisor+'</td><td><a href="#" class="text-light-blue" data-toggle="modal" data-target="#modal_supervisor_edit"><i class="fa fa-pencil"  title="Editar"></i></a></td><td><a href="#" class="text-orange" data-toggle="modal" data-target="#modal_supervisor_refresh"><i class="fa fa-refresh" title="Reiniciar contraseña"></i></a></td><td><a href="#" class="text-red" data-toggle="modal" data-target="#modal_supervisor_delete"><i class="fa fa-trash" title="Eliminar"></i></a></td></tr>';
        }	
			
			html += '</tbody></table>';
			
      $("#supervisor_list").append(html);
  
      html = null;
			
			$("#content_overlay").LoadingOverlay("hide")
		},
		error: function (xhr, ajaxOptions, thrownError) {
			$.notify(xhr.status+': '+thrownError, {
				className : "warn",
				position  : "right bottom"
			});
			$("#content_overlay").LoadingOverlay("hide");
		}
	});				
}
$(document).ready(function (){
	$("#content_overlay").LoadingOverlay("show");
	printFooter();
	printRightAside();
	printSupervisorNavBar();
	printSupervisorList('<?=base_url();?>Supervisor/getSupervisor');
});
</script>

</body>
</html>
