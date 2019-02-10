<div class="modal fade" id="modal_supervisor_add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="  modal-header alert-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar supervisor</h4>
              </div>
             <div class="modal-body" id="modal_supervisor_add_overlay">
				<form role="form">
				<div class="box box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title">Datos Personales</h3>
					</div>
					<div class="box-body">
					  
						<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="supervisor_add_IdSupervisor" type="text" class="form-control" placeholder="Id Supervisor">
								</div>					
							</div>
							<div class="col-xs-6">
									<input id="supervisor_add_Supervisor" type="text" class="form-control" placeholder="Supervisor">
							</div>
						</div>
						</div>
						</div>
						</br>
						
						<!-- <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input id="supervisor_add_birthday" type="date" class="form-control" placeholder="Fecha nacimiento">
						</div> 
					  </div>
				</div> -->
				
				
				<!-- <div class="box box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title">Datos Profesionales</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-at"></i></span>
									<input id="user_add_user" type="text" class="form-control" placeholder="Usuario">
								</div>
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input id="user_add_email" type="email" class="form-control" placeholder="correo@recuperocrediticio.com.ar">
								</div>
							</div>
						</div>
							</br>

						<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-desktop"></i></span>
									<input id="user_add_job" type="text" class="form-control" placeholder="Cargo">
								</div>					
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-wrench"></i></span>
									<select id="user_add_profile" class="form-control">
										<option>Usuario</option>
										<option>Administrador</option>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" id="csrf_rc" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					  </div>
				</div>
			  </form>				
			</div> -->

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="supervisor_add()" id="btn_supervisor_add">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>

<script>
function supervisor_add(){
	$("#modal_supervisor_add_overlay").LoadingOverlay("show");

	var supervisor_add_IdSupervisor = $("#supervisor_add_IdSupervisor").val();
	var supervisor_add_Supervisor = $("#supervisor_add_Supervisor").val();
	// var supervisor_add_birthday = $("#supervisor_add_birthday").val();
	// var supervisor_add_email = $("#supervisor_add_email").val();
	// var supervisor_add_job = $("#supervisor_add_job").val();
	// var supervisor_add_profile = $("#supervisor_add_profile").val();
	// var supervisor_add_user = $("#supervisor_add_user").val();
	var rc_token = 0;

	$.ajax({
		url: '<?=base_url()?>Supervisor/supervisor_add',
		type: 'POST',
		dataType: 'json',
		data: {
			'IdSupervisor':supervisor_add_IdSupervisor,
			'Supervisor':supervisor_add_Supervisor,
			// 'birthday':supervisor_add_birthday,
			// 'email':supervisor_add_email,
			// 'job':supervisor_add_job,
			// 'profile':supervisor_add_profile,
			// 'user':supervisor_add_user,
			'csrf_rc' : $('#csrf_rc').val()
		},
		cache: false,
		async: true,
		success: function(data){
			$.notify(data.message, {
				className : data.type,
				position  : "right bottom"
			});
			supervisor_modal_reset();
			$("#generic_preloader").LoadingOverlay("hide");
		},
		error: function (xhr, ajaxOptions, thrownError) {
			$.notify(xhr.status+': '+thrownError, {
				className : "warn",
				position  : "right bottom"
			});
			$("#generic_preloader").LoadingOverlay("hide");
		}
	});
	

	$("#modal_supervisor_add_overlay").LoadingOverlay("hide");
}
function supervisor_modal_reset(){
	$("#supervisor_add_IdSupervisor'").val("");
	$("#supervisor_add_Supervisor").val("");
	// $("#supervisor_add_birthday").val("");
	// $("#supervisor_add_email").val("");
	// $("#supervisor_add_job").val("");
	// $("#supervisor_add_profile").val("");
	// $("#supervisor_add_user").val("");
}
</script>
		