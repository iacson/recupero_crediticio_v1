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
			html = '<table id="performance_t" class="table table-bordered table-hover"><thead><tr><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th><th>Campo 1</th></tr></thead><tbody>';
			
			for(let i=0; i<data.message.length; i++){
				
				var vTit = data.message[i].Tit;
				var vCt_Fam = data.message[i].Ct_Fam;
				var vCt_Ter = data.message[i].Ct_Ter;
				var vComp = data.message[i].Comp;
				var vRecup = data.message[i].Recup;
				
				html += '<tr><td>'+vTit+'</td><td>'+vCt_Fam+'</td><td>'+vCt_Ter+'</td><td>'+vComp+'</td><td>'+vRecup+'</td><td>'+vTit+'</td><td>'+vCt_Fam+'</td><td>'+vCt_Ter+'</td><td>'+vComp+'</td><td>'+vRecup+'</td><td>'+vTit+'</td><td>'+vCt_Fam+'</td><td>'+vCt_Ter+'</td><td>'+vComp+'</td><td>'+vRecup+'</td><td>'+vTit+'</td><td>'+vCt_Fam+'</td><td>'+vCt_Ter+'</td><td>'+vComp+'</td><td>'+vRecup+'</td></tr>';

			}
			
			html += '</tbody></table>';
			
			$("#PERFORMANCE_TABLE").append(html);
			
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
//			alert(data);			
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