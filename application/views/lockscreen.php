<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen"style="background-color:#3C8DBC">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
   <div class="lockscreen-logo">
    <img src="<?=base_url();?>/assets/img/banner_RC.png" alt="Logo Image"> 
    <a href="<?=base_url();?>/assets/index2.html"></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name" style="font-size:20px; color:#ddd;">Nadia Ramirez</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?=base_url();?>/assets/img/pp.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Contraseña">

        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" style="color:#ddd;">
    Ingrese su contraseña para iniciar sesión  
  </div>
  <div class="text-center">
    <a href="login.html" style="color:#fff;"> Igresar con un usuario diferente</a>
  </div>
  <div class="lockscreen-footer text-center">
    <!--Copyright &copy; 2018-2019 <b><a href="https://www.iacson.com/" class="text-black">Iacson Sistemas</a></b><br>-->
    
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
