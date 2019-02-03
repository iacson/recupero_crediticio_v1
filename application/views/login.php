<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="assets/img/logo.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
	<link rel="stylesheet" href="assets/dist/css/skins/skin-blue.css">

	<!--[if lt IE 9]>
	<script src="/assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="/assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">	
	<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="assets/js/loadingoverlay.js"></script>
	<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/js/recupero_crediticio.js"></script>
	<script src="assets/js/notify.js"></script>
</head>

<body class="hold-transition login-page" style="background-color:#EEE;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color:#4c99c6;" id="overlay">
          <img width="200" src="<?=base_url();?>/assets/img/banner_RC.png" alt="Logo Image">

    <p class="login-box-msg"></p>

      <div class="form-group has-feedback">
        <input name="user" type="text" class="form-control" placeholder="Usuario">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Contraseña">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8 form-check">
      

            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" style="padding-left: 20px;"> 
            <label class="form-check-label" style="color:#fff; 	font-weight: normal;"> Recuérdame </label>
          
        </div>
        <!-- /.col -->
        <div class="col-s-4">
          <button id="signin" type="submit" class="btn btn-default">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>

    <div class="social-auth-links text-center">
    </div>

    <a href="#" style="color:#fff; 	font-weight: normal;">¿Olvidaste tu contraseña?</a><br>

  </div>
</div>

<script>
	function SignIn(url){
		$.ajax({
			url: url,
			type: 'POST',
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
				$.notify(xhr.status+': '+thrownError, {
					className : "warn",
					position  : "right bottom"
				});
				$("#overlay").LoadingOverlay("hide");
			}
		});
	}
	
	$( "#signin" ).click(function() {
	  	SignIn('<?=base_url();?>Login/SignIn');
	});
	
	$(document).ready(function (){
		$("#overlay").LoadingOverlay("show");
		$("#overlay").LoadingOverlay("hide");	
	})
</script>

</body>
</html>
