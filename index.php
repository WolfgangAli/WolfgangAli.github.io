<?php

session_start();
error_reporting(0);
include('includes/conexionbd.php');

if(isset($_POST['login']))
{
  $usuario=$_POST['nombre_usuario'];
  $password=md5($_POST['password']);
  $query=mysqli_query($con,"select id_usuario from usuario where nombre_usuario='$usuario' AND password='$password' AND rol_usuario='administrador' AND id_estado ='1' ");
  $ret=mysqli_fetch_array($query);
  $usuario_empleado=$_POST['nombre_usuario'];
  $password_empleado=md5($_POST['password']);
  $query2=mysqli_query($con,"select id_usuario from usuario where nombre_usuario='$usuario_empleado' AND password='$password_empleado' AND rol_usuario='empleado' AND id_estado ='1' ");
  $ret2=mysqli_fetch_array($query2);
  if($ret>0){
    $_SESSION['datatechnologyid']=$ret['id_usuario'];
   header('location:dashboard.php');
  }else if ($ret2>0){
    $_SESSION['datatechnologyid']=$ret2['id_usuario'];
    header('location:dashboard_empleado.php');
  }
  else{
    $msg="Usuario o contraseña erróneos, Intenta otra vez.";
    }
}




?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>DataTechnology</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">



</head>

<body class="bg-dark" style=" background-image: url('images/back.jpg');">


    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color: #222f3e">DataTechnology Management System  </h3>
                    <hr  color="black"/>
                </div>
                <div class="login-form">
                <h3 style="color: #222f3e" align='center'>Iniciar sesión</h3>
                    <hr  color="black"/>

                <div class="login-form">
                    <form action="" method="post" name="login">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" required="true" name="nombre_usuario">
                        </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" placeholder="Contraseña" name="password" required="true">
                        </div>
                                

                                     

                                
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Inicia sesión</button>                            
                               
                                
                            
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
