var tablaPerformance = `<table id="performance_t" class="table table-bordered table-hover"><thead><tr>

				<th>Nombre</th>
				<th>Apellido</th>
				<th>LogIn</th>
				<th>LogOut</th>
				<th>Total Logueo</th>
				<th>PrimerLlamada</th>
				<th>UltimaLlamada</th>
				<th>Pop up</th>
				<th>Salientes</th>
				<th>Entrantes</th>
				<th>Total Llamadas</th>
				<th># Min Llamadas</th>
				<th>% Llamadas</th>
				<th>Total Comunicacion</th>
				<th>% Total Comunicacion</th>
				<th>Tiempo Ocioso</th>
				<th>% Tiempo Ocioso</th>
				<th>Tiempo Break</th>
				<th>Tiempo Bano</th>
				<th>Tiempo Leader</th>
				<th>Tiempo Coach</th>
				<th>Tiempo Admin</th>
				<th>Tiempo Wsp</th>
				<th>Tiempo Tipeo</th>
				<th>% Total Prod</th>
				<th>Max Repeteciones</th>

			</tr></thead><tbody>`;

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


function printOperationsList() {
  var html = `<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Tabla de Jefes de Operaciones</h3>
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
					  <td><a href="#" class="text-light-blue" data-toggle="modal" data-target="#modal_operations_edit"><i class="fa fa-pencil"  title="Editar"></i></a></td>
					  <td><a href="#" class="text-orange" data-toggle="modal" data-target="#modal_operations_refresh"><i class="fa fa-refresh" title="Reiniciar contraseña"></i></a></td>
					  <td><a href="#" class="text-red" data-toggle="modal" data-target="#modal_operations_delete"><i class="fa fa-trash" title="Eliminar"></i></a></td>
					</tr>
				  </tbody></table>
				</div>
				<div class="box-footer clearfix">
				  <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_operations_add"><i class="fa fa-plus"></i> Agregar Jefe de Operaciones</button>
				</div>
			  </div>`;
  $("#operations_list").append(html);
}



function printOperationsNavBar() {
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

  $("#operations-nav-bar").append(html);
}


function printAssignList() {
  var html = `<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Tabla de Asignaciones</h3>
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
					  <td><a href="#" class="text-light-blue" data-toggle="modal" data-target="#modal_assign_edit"><i class="fa fa-pencil"  title="Editar"></i></a></td>
					  <td><a href="#" class="text-orange" data-toggle="modal" data-target="#modal_assigns_refresh"><i class="fa fa-refresh" title="Reiniciar contraseña"></i></a></td>
					  <td><a href="#" class="text-red" data-toggle="modal" data-target="#modal_assign_delete"><i class="fa fa-trash" title="Eliminar"></i></a></td>
					</tr>
				  </tbody></table>
				</div>
				<div class="box-footer clearfix">
				  <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_assign_add"><i class="fa fa-plus"></i> Agregar Asignación</button>
				</div>
			  </div>`;
  $("#assign_list").append(html);
}



function printAssignNavBar() {
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

  $("#assign-nav-bar").append(html);
}


function printCampaignList() {
  var html = `<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Tabla de Campañas</h3>
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
					  <td><a href="#" class="text-light-blue" data-toggle="modal" data-target="#modal_campaign_edit"><i class="fa fa-pencil"  title="Editar"></i></a></td>
					  <td><a href="#" class="text-orange" data-toggle="modal" data-target="#modal_campaign_refresh"><i class="fa fa-refresh" title="Reiniciar contraseña"></i></a></td>
					  <td><a href="#" class="text-red" data-toggle="modal" data-target="#modal_campaign_delete"><i class="fa fa-trash" title="Eliminar"></i></a></td>
					</tr>
				  </tbody></table>
				</div>
				<div class="box-footer clearfix">
				  <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_campaign_add"><i class="fa fa-plus"></i> Agregar Campaña</button>
				</div>
			  </div>`;
  $("#campaign_list").append(html);
}



function printCampaignNavBar() {
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

  $("#campaign-nav-bar").append(html);
}

function printSupervisorList() {
  var html = `<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Tabla de Supervisores</h3>
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
					  <td><a href="#" class="text-light-blue" data-toggle="modal" data-target="#modal_supervisor_edit"><i class="fa fa-pencil"  title="Editar"></i></a></td>
					  <td><a href="#" class="text-orange" data-toggle="modal" data-target="#modal_supervisor_refresh"><i class="fa fa-refresh" title="Reiniciar contraseña"></i></a></td>
					  <td><a href="#" class="text-red" data-toggle="modal" data-target="#modal_supervisor_delete"><i class="fa fa-trash" title="Eliminar"></i></a></td>
					</tr>
				  </tbody></table>
				</div>
				<div class="box-footer clearfix">
				  <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_supervisor_add"><i class="fa fa-plus"></i> Agregar Supervisor</button>
				</div>
			  </div>`;
  $("#supervisor_list").append(html);
}



function printSupervisorNavBar() {
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

  $("#supervisor-nav-bar").append(html);
}