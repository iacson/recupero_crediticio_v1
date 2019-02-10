<div class="modal fade" id="modal_operations_add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="  modal-header alert-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Jefe de operaciones</h4>
              </div>
             <div class="modal-body" id="modal_operations_add_overlay">
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
									<input id="operations_add_IdJefeOp" type="text" class="form-control" placeholder="Id Jefe Operaciones" >
								</div>					
							</div>
							<div class="col-xs-6">
									<input id="operations_add_ JefeOp" type="text" class="form-control" placeholder="Jefe de operaciones">
							</div>
						</div>
						</br>
						
						<!-- <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input id="operations_add_birthday" type="date" class="form-control" placeholder="Fecha nacimiento">
						</div> 
					  </div>
				</div> -->
				
				
				<div class="box box-solid">
					<div class="box-header with-border">
					  <!-- <h3 class="box-title">Datos Profesionales</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-at"></i></span>
									<input id="operations_add_user" type="text" class="form-control" placeholder="Usuario">
								</div>
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input id="operations_add_email" type="email" class="form-control" placeholder="correo@recuperocrediticio.com.ar">
								</div>
							</div>
						</div>
							</br> -->

						<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-desktop"></i></span>
									<input id="operations_add_job" type="text" class="form-control" placeholder="Cargo">
								</div>					
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-wrench"></i></span>
									<select id="operations_add_profile" class="form-control">
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
			</div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="operations_add()" id="btn_operations_add">Guardar cambios</button>
              </div>
            </div>
          </div>
				  </div>
					  </div>
						 </div>


			

<script>
function operations_add(){
	$("#modal_operations_add_overlay").LoadingOverlay("show");

	var operations_add_IdJefeOp = $("#operations_add_IdJefeOp").val();
	var operations_add_lastname = $("#operations_add_JefeOp").val();
	// var operations_add_birthday = $("#operations_add_birthday").val();
	// var operations_add_email = $("#operations_add_email").val();
	// var operations_add_job = $("#operations_add_job").val();
	// var operations_add_profile = $("#operations_add_profile").val();
	// var operations_add_user = $("#operations_add_user").val();
	var rc_token = 0;

	$.ajax({
		url: '<?=base_url()?>Operations/operations_add',
		type: 'POST',
		dataType: 'json',
		data: {
			'name':operations_add_IdJefeOp,
			'lastname':operations_add_JefeOp,
			// 'birthday':operations_add_birthday,
			// 'email':operations_add_email,
			// 'job':operations_add_job,
			// 'profile':operations_add_profile,
			// 'user':operations_add_user,
			'csrf_rc' : $('#csrf_rc').val()
		},
		cache: false,
		async: true,
		success: function(data){
			$.notify(data.message, {
				className : data.type,
				position  : "right bottom"
			});
			operations_modal_reset();
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
	

	$("#modal_operations_add_overlay").LoadingOverlay("hide");
}
function operations_modal_reset(){
	$("#operations_add_IdJefeOp").val("");
	$("#operations_add_JefeOp").val("");
// 	$("#operations_add_birthday").val("");
// 	$("#operations_add_email").val("");
// 	$("#operations_add_job").val("");
// 	$("#operations_add_profile").val("");
// 	$("#operations_add_user").val("");
 }
</script>
		