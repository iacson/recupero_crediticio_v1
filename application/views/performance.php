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


   <div class="content-wrapper" id="overlay">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Performance
        <small>Performance Diario</small>
      </h1>
	<ol class="breadcrumb">
		<li class="active">Última Actualización: dd/mm/yyyy hh:mm</li>
	</ol>
	<button type="submit" class="btn btn-success pull-left" style="margin-top: 8px;" onclick="window.open('<?=base_url();?>Performance/export_performance_xls')"><i class="fa fa-save" style="padding-right: 5px;"></i> Descargar XLS</button>
	</br>
	</br>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalle de Performance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="PERFORMANCE_TABLE">
				<table id="performance_t" class="table table-bordered table-hover">
					<thead><tr><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th></tr></thead>
					<tbody>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
					</tbody>
				</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
 <footer id="main-footer" class="main-footer">
 </footer>
  
  <aside class="control-sidebar control-sidebar-dark" id="right-aside">
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<script>
function printPerformanceTable(url){
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		cache: false,
		async: true,
		success: function(data){
			html = tablaPerformance;
			
			for(let i=0; i<data.message.length; i++){

			var a1 = data.message[i].idAgente;
            var a2 = data.message[i].Int;
            var a3 = data.message[i].Box;
            var a4 = data.message[i].Agente;
            var a5 = data.message[i].LogIn;
            var a6 = data.message[i].LogOut;
            var a7 = data.message[i].HoraPrimerLlamado;
            var a8 = data.message[i].HoraUltimoLlamado;
            var a9 = data.message[i].TiempoMuerto;
            var a10 = data.message[i].TotalLogueo;
            var a11 = data.message[i].TotalComunicacion;
            var a12 = data.message[i].CantidadLLamdas;
            var a13 = data.message[i].CuentasTadas;
            var a14 = data.message[i].QMinCtas;
            var a15 = data.message[i].CantidadGestiones;
            var a16 = data.message[i].CtTitular;
            var a17 = data.message[i].CtFamiliar;
            var a18 = data.message[i].CtTercero;
            var a19 = data.message[i].Compromisos;
            var a20 = data.message[i].Recupero;
            var a21 = data.message[i].RecuperoCuotas;
            var a22 = data.message[i].Cuponeras;
            var a23 = data.message[i].TBreak;
            var a24 = data.message[i].TBaño;
            var a25 = data.message[i].TCoach;
            var a26 = data.message[i].NoResponde;
            var a27 = data.message[i].Ocupado;
            var a28 = data.message[i].ImpContactar;
            var a29 = data.message[i].Cliente;
            var a30 = data.message[i].PopUp;
            var a31 = data.message[i].QSalientes;
            var a32 = data.message[i].QEntrantes;
            var a33 = data.message[i].TotalLlamados;
            var a34 = data.message[i].ParamLlamdas;
            var a35 = data.message[i].Supervisor;
            var a36 = data.message[i].Qnrep;
            var a37 = data.message[i].MayorRep;
            var a38 = data.message[i].NroTelRep;
            var a39 = data.message[i].CantiRepInternos;
            var a40 = data.message[i].DurLlamInternos;
            var a41 = data.message[i].TNoMolestar;
            var a42 = data.message[i].PorcLlam;
            var a43 = data.message[i].PorcGest;
            var a44 = data.message[i].PorcContact;
            var a45 = data.message[i].IndJust;				
				
				html += '<tr><td>'+a1+'</td><td>'+a2+'</td><td>'+a3+'</td><td>'+a4+'</td><td>'+a5+'</td><td>'+a6+'</td><td>'+a7+'</td><td>'+a8+'</td><td>'+a9+'</td><td>'+a10+'</td><td>'+a11+'</td><td>'+a12+'</td><td>'+a13+'</td><td>'+a14+'</td><td>'+a15+'</td><td>'+a16+'</td><td>'+a17+'</td><td>'+a18+'</td><td>'+a19+'</td><td>'+a20+'</td><td>'+a21+'</td><td>'+a22+'</td><td>'+a23+'</td><td>'+a24+'</td><td>'+a25+'</td><td>'+a26+'</td><td>'+a27+'</td><td>'+a28+'</td><td>'+a29+'</td><td>'+a30+'</td><td>'+a31+'</td><td>'+a32+'</td><td>'+a33+'</td><td>'+a34+'</td><td>'+a35+'</td><td>'+a36+'</td><td>'+a37+'</td><td>'+a38+'</td><td>'+a39+'</td><td>'+a40+'</td><td>'+a41+'</td><td>'+a42+'</td><td>'+a43+'</td><td>'+a44+'</td><td>'+a45+'</td></tr>';

			}
			
			html += '</tbody></table>';
			tablaPerformance = null;
			
			$("#PERFORMANCE_TABLE").html(html);
			
			$(function () {
				$('#performance_t').DataTable({
				  'paging'      : true,
				  'lengthChange': true,
				  'searching'   : true,
				  'ordering'    : true,
				  'info'        : true,
				  'autoWidth'   : true,
				  'scrollX'	: true
				})
			})
		},
		error: function (xhr, ajaxOptions, thrownError) {
		}
	});				
}
$(document).ready(function (){
	$("#overlay").LoadingOverlay("show");
	printFooter();
	printRightAside();
	printUserNavBar();
	printPerformanceTable('<?=base_url();?>Performance/getPerformance');
	$("#overlay").LoadingOverlay("hide");
})
</script>

<style>
table.dataTable{clear:both;margin-top:6px !important;margin-bottom:6px !important;max-width:none !important;border-collapse:separate !important}table.dataTable td,table.dataTable th{-webkit-box-sizing:content-box;box-sizing:content-box}table.dataTable td.dataTables_empty,table.dataTable th.dataTables_empty{text-align:center}table.dataTable.nowrap th,table.dataTable.nowrap td{white-space:nowrap}div.dataTables_wrapper div.dataTables_length label{font-weight:normal;text-align:left;white-space:nowrap}div.dataTables_wrapper div.dataTables_length select{width:75px;display:inline-block}div.dataTables_wrapper div.dataTables_filter{text-align:right}div.dataTables_wrapper div.dataTables_filter label{font-weight:normal;white-space:nowrap;text-align:left}div.dataTables_wrapper div.dataTables_filter input{margin-left:0.5em;display:inline-block;width:auto}div.dataTables_wrapper div.dataTables_info{padding-top:8px;white-space:nowrap}div.dataTables_wrapper div.dataTables_paginate{margin:0;white-space:nowrap;text-align:right}div.dataTables_wrapper div.dataTables_paginate ul.pagination{margin:2px 0;white-space:nowrap}div.dataTables_wrapper div.dataTables_processing{position:absolute;top:50%;left:50%;width:200px;margin-left:-100px;margin-top:-26px;text-align:center;padding:1em 0}table.dataTable thead>tr>th.sorting_asc,table.dataTable thead>tr>th.sorting_desc,table.dataTable thead>tr>th.sorting,table.dataTable thead>tr>td.sorting_asc,table.dataTable thead>tr>td.sorting_desc,table.dataTable thead>tr>td.sorting{padding-right:30px}table.dataTable thead>tr>th:active,table.dataTable thead>tr>td:active{outline:none}table.dataTable thead .sorting,table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc,table.dataTable thead .sorting_asc_disabled,table.dataTable thead .sorting_desc_disabled{cursor:pointer;position:relative}table.dataTable thead .sorting:after,table.dataTable thead .sorting_asc:after,table.dataTable thead .sorting_desc:after,table.dataTable thead .sorting_asc_disabled:after,table.dataTable thead .sorting_desc_disabled:after{position:absolute;bottom:8px;right:8px;display:block;font-family:'Glyphicons Halflings';opacity:0.5}table.dataTable thead .sorting:after{opacity:0.2;content:"\e150"}table.dataTable thead .sorting_asc:after{content:"\e155"}table.dataTable thead .sorting_desc:after{content:"\e156"}table.dataTable thead .sorting_asc_disabled:after,table.dataTable thead .sorting_desc_disabled:after{color:#eee}div.dataTables_scrollHead table.dataTable{margin-bottom:0 !important}div.dataTables_scrollBody table{border-top:none;margin-top:0 !important;margin-bottom:0 !important}div.dataTables_scrollBody table thead .sorting:after,div.dataTables_scrollBody table thead .sorting_asc:after,div.dataTables_scrollBody table thead .sorting_desc:after{display:none}div.dataTables_scrollBody table tbody tr:first-child th,div.dataTables_scrollBody table tbody tr:first-child td{border-top:none}div.dataTables_scrollFoot table{margin-top:0 !important;border-top:none}@media screen and (max-width: 767px){div.dataTables_wrapper div.dataTables_length,div.dataTables_wrapper div.dataTables_filter,div.dataTables_wrapper div.dataTables_info,div.dataTables_wrapper div.dataTables_paginate{text-align:center}}table.dataTable.table-condensed>thead>tr>th{padding-right:20px}table.dataTable.table-condensed .sorting:after,table.dataTable.table-condensed .sorting_asc:after,table.dataTable.table-condensed .sorting_desc:after{top:6px;right:6px}table.table-bordered.dataTable th,table.table-bordered.dataTable td{border-left-width:0}table.table-bordered.dataTable th:last-child,table.table-bordered.dataTable th:last-child,table.table-bordered.dataTable td:last-child,table.table-bordered.dataTable td:last-child{border-right-width:0}table.table-bordered.dataTable tbody th,table.table-bordered.dataTable tbody td{border-bottom-width:0}div.dataTables_scrollHead table.table-bordered{border-bottom-width:0}div.table-responsive>div.dataTables_wrapper>div.row{margin:0}div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:first-child{padding-left:0}div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:last-child{padding-right:0}
</style>
</body>
</html>