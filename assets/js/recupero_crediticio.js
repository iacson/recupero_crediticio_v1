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
			alert(data);			
		}
	});				
}

function printPerformanceTable(url){
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		cache: false,
		async: true,
		success: function(data){
			html = `<table id="performance_t" class="table table-bordered table-hover"><thead><tr>
			<th>idAgente</th>
            <th>Int</th>
            <th>Box</th>
            <th>Agente</th>
            <th>LogIn</th>
            <th>LogOut</th>
            <th>HoraPrimerLlamado</th>
            <th>HoraUltimoLlamado</th>
            <th>TiempoMuerto</th>
            <th>TotalLogueo</th>
            <th>TotalComunicacion</th>
            <th>CantidadLLamdas</th>
            <th>CuentasTadas</th>
            <th>QMinCtas</th>
            <th>CantidadGestiones</th>
            <th>CtTitular</th>
            <th>CtFamiliar</th>
            <th>CtTercero</th>
            <th>Compromisos</th>
            <th>Recupero</th>
            <th>RecuperoCuotas</th>
            <th>Cuponeras</th>
            <th>TBreak</th>
            <th>TBaño</th>
            <th>TCoach</th>
            <th>NoResponde</th>
            <th>Ocupado</th>
            <th>ImpContactar</th>
            <th>Cliente</th>
            <th>PopUp</th>
            <th>QSalientes</th>
            <th>QEntrantes</th>
            <th>TotalLlamados</th>
            <th>ParamLlamdas</th>
            <th>Supervisor</th>
            <th>Qnrep</th>
            <th>MayorRep</th>
            <th>NroTelRep</th>
            <th>CantiRepInternos</th>
            <th>DurLlamInternos</th>
            <th>TNoMolestar</th>
            <th>PorcLlam</th>
            <th>PorcGest</th>
            <th>PorcContact</th>
            <th>IndJust</th>
			</tr></thead><tbody>`;
			
			
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

function printFooter(){	
	$("#main-footer").append('<div class="pull-right hidden-xs"><b>Versión </b> 0.1 </div><strong>Copyright &copy; 2018-2019 <a href="https://www.iacson.com">Iacson Sistemas</a>.</strong>');
}

function printRightAside(){
	var html = `<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div id="tab-right-config" class="tab-content">
	  <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Actividades</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cumpleaños de Mauricio Matto</h4>

                <p>Fecha: 24 Enero 2019</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Progreso de Proyectos</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Tablero de Performance
                <span class="pull-right-container">
                    <span class="label label-success pull-right">90%</span>
                  </span>
              </h4>
			  
			  <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 90%"></div>
              </div>
            </a>
			<a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Tablero de Ventas
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">30%</span>
                  </span>
              </h4>
              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 30%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab"></div>
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configuración</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Recibir notificaciones por email
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Se notificará cualquier actividad a través de su correo actual: nombre.apellido@ejemplo.com.ar
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
    </div>`;
	
	
	$("#right-aside").append(html);	
}

function printUserNavBar(){
	var html = `<ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">2</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 2 mensajes</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/img/pp.jpg" class="img-circle" alt="Imagen de Usuario">
                      </div>
                      <h4>
                        Team: Iacson Sistemas
                        <small><i class="fa fa-clock-o"></i> 30 min</small>
                      </h4>
                      <!-- The message -->
                      <p>El deber llama</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Leer todos</a></li>
            </ul>
          </li>

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">8</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 8 notificaciones</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> iniciamos este tablero
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todos</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 3 tareas asignadas</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Diseño de botones
                        <small class="pull-right">30%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"
                             aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">30% Completo</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Ver tareas</a>
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/img/pp.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Nadia Ramirez</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="assets/img/pp.jpg" class="img-circle" alt="User Image">

                <p>
                  Nadia Ramirez - Business Intelligence
                  <small></small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>`;
	
	$("#user-nav-bar").append(html);	
}

function printUsersList(){
	var html = `<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Tabla de Usuarios</h3>
				</div>
				<div class="table-responsive">
				  <table class="table table-bordered">
					<tbody>
					<tr>
					  <th style="width: 10px">#</th>
					  <th>Usuario</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Correo</th>
					  <th>Cargo</th>
					  <th>Fecha</th>
					  <th style="width: 10px" colspan="3"></th>
					</tr>
					<tr>
					  <td>1.</td>
					  <td>nadia.ramirez</td>
					  <td>Nadia</td>
					  <td>Ramirez</td>
					  <td>nadia.ramirez@recuperocrediticio.com.ar</td>
					  <td>Business Intelligence</td>
					  <td>01/01/1990</td>
					  <td><a href="#" class="text-light-blue" data-toggle="modal" data-target="#modal_user_edit"><i class="fa fa-pencil"  title="Editar"></i></a></td>
					  <td><a href="#" class="text-orange" data-toggle="modal" data-target="#modal_user_refresh"><i class="fa fa-refresh" title="Reiniciar contraseña"></i></a></td>
					  <td><a href="#" class="text-red" data-toggle="modal" data-target="#modal_user_delete"><i class="fa fa-trash" title="Eliminar"></i></a></td>
					</tr>
				  </tbody></table>
				</div>
				<div class="box-footer clearfix">
				  <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_user_add"><i class="fa fa-plus"></i> Agregar Usuario</button>
				</div>
			  </div>`;
	$("#users_list").append(html);			
}