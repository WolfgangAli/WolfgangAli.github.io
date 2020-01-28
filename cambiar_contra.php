<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $telefono=$_SESSION['telefono'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update admin set password='$password'  where  email='$email' && numero_telefono='$telefono' ");
   if($query)
   {
echo "<script>alert('Su contraseña ha sido cambiada exitosamente!');</script>";
session_destroy();
   }
  
  }
  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>DataTech | Contraseña olvidada</title>
  
    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Nueva contraseña y contraseña de confirmación no coinciden');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>

</head>

<body class="bg-dark" style=" background-image: url('images/back.jpg');">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                <h3 style="color: white">DataTech Management System </h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="changepassword" onsubmit="return checkpass();">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-group">
                                <label>Nueva contraseña</label>
                                <input type="password" class="form-control" placeholder="Nueva contraseña" name="newpassword" required="">
                        </div>
                            <div class="form-group">
                                <label>Confirmar contraseña</label>
                                <input type="password" class="form-control" placeholder="Confirmar contraseña" name="confirmpassword" required="">
                        </div>
                                <div class="checkbox">
                                    <label class="pull-left">
                                <a href="index.php">Inicia Sesión</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Cambiar contraseña</button>
                                
                            
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
