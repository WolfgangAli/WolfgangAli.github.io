<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $id_usuario=$_SESSION['datatechnologyid'];
    $nombre=$_POST['nombre'];
    $telefono_usuario=$_POST['telefono_usuario'];
    $email=$_POST['email_usuario'];
    $direccion_usuario=$_POST['direccion_usuario'];
  
     $query=mysqli_query($con, "update usuario set telefono_usuario ='$telefono_usuario', nombre='$nombre', email_usuario= '$email' ,direccion_usuario='$direccion_usuario' where id_usuario='$id_usuario'");
    if ($query) {
    $msg="El perfil del administrador ha sido actualizado.";
  }
  else
    {
      $msg="Algo malo ha pasado, Intentalo de nuevo.";
    }
  }
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>DataTech | Perfil del Administrador</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Perfil del administrador</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="perfil_admin.php">Perfil del administrador</a></li>
                            <li class="active">Actualizar</li>
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
                            <div class="card-header"><strong>Administrador</strong><small> Perfil</small></div>
                            <form name="profile" method="post" action="">
                                <strong><p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p></strong>
                            <div class="card-body card-block">
 <?php
$id_usuario=$_SESSION['datatechnologyid'];
$ret=mysqli_query($con,"select * from usuario where id_usuario='$id_usuario'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                                <div class="form-group"><label for="company" class=" form-control-label">Nombre del administrador</label><input type="text" name="nombre" value="<?php  echo $row['nombre'];?>" class="form-control" required='true'></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Usuario del administrador</label><input type="text" name="nombre_usuario" value="<?php  echo $row['nombre_usuario'];?>" class="form-control" readonly=""></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Teléfono o celular</label><input type="text" name="telefono_usuario" value="<?php  echo $row['telefono_usuario'];?>"  class="form-control" maxlength='10' required='true'></div>
                                            
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">e-mail</label><input type="email" name="email_usuario" value="<?php  echo $row['email_usuario'];?>" class="form-control" required='true'></div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group"><label for="postal-code" class=" form-control-label">Fecha de registro</label><input type="text" name="fecha_usuario" value="<?php  echo $row['fecha_usuario'];?>" readonly="" class="form-control"></div>
                                                        </div>

                                                        <div class="col-12">
                                                        <div class="form-group"><label for="postal-code" class=" form-control-label">Direccion</label><textarea name="direccion_usuario"  rows="5"   class="form-control" required='true'><?php  echo $row['direccion_usuario'];?></textarea></div>
                                                        </div>


                                                    </div>
                                                    
                                                    </div>
                                                    <?php } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Actualizar
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