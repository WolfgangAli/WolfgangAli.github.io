<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
error_reporting(0);
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$id_usuario=$_SESSION['datatechnologyid'];
$act_password=md5($_POST['currentpassword']);
$nueva_password=md5($_POST['newpassword']);
$query=mysqli_query($con,"select id_usuario from usuario where id_usuario='$id_usuario' and password='$act_password'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update usuario set password='$nueva_password' where id_usuario='$id_usuario'");
$msg= "Tu contraseña ha sido cambiada exitosamente"; 
} else {

$msg="Su contraseña no ha podido ser cambiada";
}



}

  
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>DataTech | Cambiar Contraseña</title>
    

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
alert('Los campos de nueva contraseña y contraseña de confirmación no coinciden');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>

</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar_empleado.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header_empleado.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Cambiar contraseña </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard_empleado.php">Dashboard</a></li>
                            <li><a href="empleado_contra.php">Cambiar contraseña</a></li>
                            <li class="active">Cambiar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Cambiar</strong><small> Contraseña</small></div>
                            <form name="changepassword" method="post" onsubmit="return checkpass();" action="">
                                <p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
$id_usuario=$_SESSION['datatechnologyid'];
$ret=mysqli_query($con,"select * from usuario where id_usuario='$id_usuario'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group"><label for="company" class=" form-control-label">Contraseña actual</label><input type="password" name="currentpassword" id="currentpassword" class="form-control" required=""></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Nueva contraseña</label><input type="password" name="newpassword"  class="form-control" required=""></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Confirmar contraseña</label><input type="password" name="confirmpassword" id="confirmpassword" value=""  class="form-control"></div>
                                                                                                
                                                    </div>
                                                    <?php } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Cambiar
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>