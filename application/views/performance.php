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
          <img src="<?=base_url();?>/assets/img/pp.jpg" class="img-circle" alt="User Image">
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
    <section class="content-header">
      <h1>
        Performance
        <small>Performance Diario</small>
      </h1>
	<ol class="breadcrumb">
		<li class="active">Actualización en tiempo real</li>
	</ol>
	<button type="submit" class="btn btn-success pull-left" style="margin-top: 8px;" onclick="window.open('<?=base_url();?>Performance/export_performance_xls')"><i class="fa fa-save" style="padding-right: 5px;"></i> Descargar XLS</button>
	</br>
	</br>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalle de Performance</h3>
            </div>
            <div class="box-body" id="PERFORMANCE_TABLE">
				<table id="performance_t" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th><th>Cargando</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
						<tr><td>...</td><td>...</td><td>...</td><td>...</td><td>...</td></tr>
					</tbody>
				</table>
            </div>
          </div>
        </div>
      </div>
    </section>
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

				var Nombre = data.message[i].Nombre;
				var Apellido = data.message[i].Apellido;
				var LogIn = data.message[i].LogIn;
				var LogOut = data.message[i].LogOut;
				var TotalLogueo = data.message[i].TotalLogueo;
				var PrimerLlamada = data.message[i].PrimerLlamada;
				var UltimaLlamada = data.message[i].UltimaLlamada;
				var Popup = data.message[i].Popup;
				var Salientes = data.message[i].Salientes;
				var Entrantes = data.message[i].Entrantes;
				var TotalLlamadas = data.message[i].TotalLlamadas;
				var MinLlamadas = data.message[i].MinLlamadas;
				var PercLlamadas = data.message[i].PercLlamadas;
				var TotalComunicacion = data.message[i].TotalComunicacion;
				var PercTotalComunicacion = data.message[i].PercTotalComunicacion;
				var TiempoOcioso = data.message[i].TiempoOcioso;
				var PercTiempoOcioso = data.message[i].PercTiempoOcioso;
				var TiempoBreak = data.message[i].TiempoBreak;
				var TiempoBano = data.message[i].TiempoBano;
				var TiempoLeader = data.message[i].TiempoLeader;
				var TiempoCoach = data.message[i].TiempoCoach;
				var TiempoAdmin = data.message[i].TiempoAdmin;
				var TiempoWsp = data.message[i].TiempoWsp;
				var TiempoTipeo = data.message[i].TiempoTipeo;
				var PercTotalProd = data.message[i].PercTotalProd;
				var MaxRepeteciones = data.message[i].MaxRepeteciones;
				
				html += '<tr><td>'+Nombre+'</td><td>'+Apellido+'</td><td>'+LogIn+'</td><td>'+LogOut+'</td><td>'+TotalLogueo+'</td><td>'+PrimerLlamada+'</td><td>'+UltimaLlamada+'</td><td>'+Popup+'</td><td>'+Salientes+'</td><td>'+Entrantes+'</td><td>'+TotalLlamadas+'</td><td>'+MinLlamadas+'</td><td>'+PercLlamadas+'</td><td>'+TotalComunicacion+'</td><td>'+PercTotalComunicacion+'</td><td>'+TiempoOcioso+'</td><td>'+PercTiempoOcioso+'</td><td>'+TiempoBreak+'</td><td>'+TiempoBano+'</td><td>'+TiempoLeader+'</td><td>'+TiempoCoach+'</td><td>'+TiempoAdmin+'</td><td>'+TiempoWsp+'</td><td>'+TiempoTipeo+'</td><td>'+PercTotalProd+'</td><td>'+MaxRepeteciones+'</td></tr>';

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
			});
			$("#overlay").LoadingOverlay("hide")
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
	printRightAside();
	printUserNavBar();
	printPerformanceTable('<?=base_url();?>Performance/getPerformance');
})
</script>

<style>
table.dataTable{clear:both;margin-top:6px !important;margin-bottom:6px !important;max-width:none !important;border-collapse:separate !important}table.dataTable td,table.dataTable th{-webkit-box-sizing:content-box;box-sizing:content-box}table.dataTable td.dataTables_empty,table.dataTable th.dataTables_empty{text-align:center}table.dataTable.nowrap th,table.dataTable.nowrap td{white-space:nowrap}div.dataTables_wrapper div.dataTables_length label{font-weight:normal;text-align:left;white-space:nowrap}div.dataTables_wrapper div.dataTables_length select{width:75px;display:inline-block}div.dataTables_wrapper div.dataTables_filter{text-align:right}div.dataTables_wrapper div.dataTables_filter label{font-weight:normal;white-space:nowrap;text-align:left}div.dataTables_wrapper div.dataTables_filter input{margin-left:0.5em;display:inline-block;width:auto}div.dataTables_wrapper div.dataTables_info{padding-top:8px;white-space:nowrap}div.dataTables_wrapper div.dataTables_paginate{margin:0;white-space:nowrap;text-align:right}div.dataTables_wrapper div.dataTables_paginate ul.pagination{margin:2px 0;white-space:nowrap}div.dataTables_wrapper div.dataTables_processing{position:absolute;top:50%;left:50%;width:200px;margin-left:-100px;margin-top:-26px;text-align:center;padding:1em 0}table.dataTable thead>tr>th.sorting_asc,table.dataTable thead>tr>th.sorting_desc,table.dataTable thead>tr>th.sorting,table.dataTable thead>tr>td.sorting_asc,table.dataTable thead>tr>td.sorting_desc,table.dataTable thead>tr>td.sorting{padding-right:30px}table.dataTable thead>tr>th:active,table.dataTable thead>tr>td:active{outline:none}table.dataTable thead .sorting,table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc,table.dataTable thead .sorting_asc_disabled,table.dataTable thead .sorting_desc_disabled{cursor:pointer;position:relative}table.dataTable thead .sorting:after,table.dataTable thead .sorting_asc:after,table.dataTable thead .sorting_desc:after,table.dataTable thead .sorting_asc_disabled:after,table.dataTable thead .sorting_desc_disabled:after{position:absolute;bottom:8px;right:8px;display:block;font-family:'Glyphicons Halflings';opacity:0.5}table.dataTable thead .sorting:after{opacity:0.2;content:"\e150"}table.dataTable thead .sorting_asc:after{content:"\e155"}table.dataTable thead .sorting_desc:after{content:"\e156"}table.dataTable thead .sorting_asc_disabled:after,table.dataTable thead .sorting_desc_disabled:after{color:#eee}div.dataTables_scrollHead table.dataTable{margin-bottom:0 !important}div.dataTables_scrollBody table{border-top:none;margin-top:0 !important;margin-bottom:0 !important}div.dataTables_scrollBody table thead .sorting:after,div.dataTables_scrollBody table thead .sorting_asc:after,div.dataTables_scrollBody table thead .sorting_desc:after{display:none}div.dataTables_scrollBody table tbody tr:first-child th,div.dataTables_scrollBody table tbody tr:first-child td{border-top:none}div.dataTables_scrollFoot table{margin-top:0 !important;border-top:none}@media screen and (max-width: 767px){div.dataTables_wrapper div.dataTables_length,div.dataTables_wrapper div.dataTables_filter,div.dataTables_wrapper div.dataTables_info,div.dataTables_wrapper div.dataTables_paginate{text-align:center}}table.dataTable.table-condensed>thead>tr>th{padding-right:20px}table.dataTable.table-condensed .sorting:after,table.dataTable.table-condensed .sorting_asc:after,table.dataTable.table-condensed .sorting_desc:after{top:6px;right:6px}table.table-bordered.dataTable th,table.table-bordered.dataTable td{border-left-width:0}table.table-bordered.dataTable th:last-child,table.table-bordered.dataTable th:last-child,table.table-bordered.dataTable td:last-child,table.table-bordered.dataTable td:last-child{border-right-width:0}table.table-bordered.dataTable tbody th,table.table-bordered.dataTable tbody td{border-bottom-width:0}div.dataTables_scrollHead table.table-bordered{border-bottom-width:0}div.table-responsive>div.dataTables_wrapper>div.row{margin:0}div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:first-child{padding-left:0}div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:last-child{padding-right:0}
</style>
</body>
</html>