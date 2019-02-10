<div class="modal fade" id="modal_assign_add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="  modal-header alert-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Asignación</h4>
              </div>
             <div class="modal-body" id="modal_assign_add_overlay">
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
									<input id="assign_add_IdAgente" type="int" class="form-control" placeholder="IdAgente">
								</div>					
							</div>
							<div class="col-xs-6">
									<input id="assign_add_IdJefeOp" type="int" class="form-control" placeholder="IdJefeOp">
							</div>
						</div>
						</br>

							<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="assign_add_IdSupervisor" type="int" class="form-control" placeholder="IdAgente">
								</div>					
							</div>
							<div class="col-xs-6">
									<input id="assign_add_IdCampana" type="int" class="form-control" placeholder="IdCampana">
							</div>
						</div>
						</br>
							<div class="row">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="assign_add_PercRecupero" type="int" class="form-control" placeholder="PercRecupero">
								</div>					
							</div>
						</div>
						</br>
				</div>
			  </form>				
			</div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="assign_add()" id="btn_assign_add">Guardar cambios</button>
              </div>
            </div>
          </div>

  </div>
        </div> 
	</div>
<script>
function assign_add(){
	$("#modal_assign_add_overlay").LoadingOverlay("show");

	var assign_add_IdAgente 			= $("#assign_add_IdAgente").val();
	var assign_add_IdJefeOp				= $("#assign_add_IdJefeOp").val();
	var assign_add_IdSupervisor 	= $("#assign_add_IdSupervisor").val();
	var assign_add_IdCampana 			= $("#assign_add_IdCampana").val();
	var assign_add_PercRecupero 	= $("#assign_add_PercRecupero").val();
	// var user_add_profile = $("#assign_add_profile").val();
	// var user_add_user = $("#assign_add_user").val();
	var rc_token = 0;

	$.ajax({
		url: '<?=base_url()?>Assign/assign_add',
		type: 'POST',
		dataType: 'json',
		data: {
			'IdAgente':assign_add_IdAgente,
			'IdJefeOp':assign_add_IdJefeOp,
			'IdSupervisor':assign_add_IdSupervisor,
			'IdCampana':assign_add_IdCampana,
			'PercRecupero':assign_add_PercRecupero,
			// 'profile':assign_add_profile,
			// 'user':assign_add_user,
			'csrf_rc' : $('#csrf_rc').val()
		},
		cache: false,
		async: true,
		success: function(data){
			$.notify(data.message, {
				className : data.type,
				position  : "right bottom"
			});
			assign_modal_reset();
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
	

	$("#modal_assign_add_overlay").LoadingOverlay("hide");
}
function assign_modal_reset(){
	$("#assign_add_IdAgente").val("");
	$("#assign_add_IdJefeOp").val("");
	$("#assign_add_IdSupervisor").val("");
	$("#assign_add_IdCampana").val("");
	$("#assign_add_PercRecupero ").val("");
	// $("#assign_add_profile").val("");
	// $("#assign_add_user").val("");
}
</script>
		