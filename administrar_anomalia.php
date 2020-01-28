<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$adm=$_GET['adminid'];
$data_tech=$_SESSION['datatechnologyid'];
$estado = $_POST['id_estado'];
$sol_anomalia = $_POST['solucion'];

    $query = "update anomalia set id_estado='$estado', sol_anomalia = '$sol_anomalia' where id_anomalia='$adm'";

    $run_query = mysqli_query($con, $query);

    echo "<script>alert('Se ha actualizado la anomalia')</script>";
    echo "<script>window.open('dashboard.php')</script>";
}
  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>DataTech actualizar anomalia</title>
  
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
                        <h1>DataTech actualizar anomalia</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="administrar_anomalia.php">DataTech actualizar anomalia</a></li>
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
                            <div class="card-header"><strong>Anomalia</strong><small> Detalle</small></div>
                            <form name="package" method="post" action="">
                                <p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
$adm=$_GET['adminid'];
$ret=mysqli_query($con,"SELECT anomalia.id_anomalia,computo.nombre_computo, dispositivo.nombre_dispositivo, usuario.nombre_usuario, anomalia.des_anomalia, anomalia.fecha_anomalia, estado.nombre_estado from computo,usuario,dispositivo,anomalia, estado
where (computo.id_computo = anomalia.id_computo) AND (dispositivo.id_dispositivo = anomalia.id_dispositivo)
AND (usuario.id_usuario = anomalia.id_usuario) AND (estado.id_estado = anomalia.id_estado) AND anomalia.id_anomalia = '$adm'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                         
                                         
                            <div class="col-12">

                            <div class="form-group"><label for="company" class=" form-control-label">Computo</label><input type="text" name="nombre" value="<?php  echo $row['nombre_computo'];?>" class="form-control" id="nombre_dispositivo" required="true" readonly=""></div>

                            <div class="form-group"><label for="company" class=" form-control-label">Dispositivo</label><input type="text" name="nombre" value="<?php  echo $row['nombre_dispositivo'];?>" class="form-control" id="nombre_dispositivo" required="true" readonly=""></div>


                            <div class="form-group"><label for="company" class=" form-control-label">Usuario</label><input type="text" name="apellido" value="<?php  echo $row['nombre_usuario'];?>" class="form-control" id="nombre_dispositivo" required="true" readonly=""></div>

                            <div>
                            <label>Descripcion anomalia</label>
                            <textarea name="direccion" placeholder="" rows="5" cols="10" class="form-control wd-450"  required="true" readonly=""><?php  echo $row['des_anomalia'];?></textarea>
                            </div>

                            <div>
                            <label>Solucion anomalia</label>
                            <textarea name="solucion" placeholder="" rows="5" cols="10" class="form-control wd-450"  required="true"></textarea>
                            </div>


                           
                                                    
 
                                <div class="form-group"><label for="company" class=" form-control-label">Fecha anomalia</label><input type="text" name="telefono" value="<?php  echo $row['fecha_anomalia'];?>" class="form-control" id="nombre_dispositivo" required="true" readonly=""></div>
                                
                               
                                            <div class="row form-group">
                                                <div class="col-12">
                                                <div class="form-group"><label for="city" class=" form-control-label">Estado del usuario</label><select type="text" name="id_estado" id="cname" value="<?php  echo $row['id_estado'];?>" class="form-control" required="true">
                                                   
                                                   
                                                    <?php         
                                                            $get_estado = "select * from estado";
                                                            $run_estado = mysqli_query($con, $get_estado);
                                                            while ($row_estado=mysqli_fetch_array($run_estado)){
                                                        
                                                                
                                                                $nombre_estado = $row_estado['nombre_estado'];
                                                        
                                                               
                                                                echo "<option value='$row_estado[id_estado]'";
                                                                if($row["id_estado"]==$row_estado['id_estado']){
                                                                    echo " selected ";
                                                                }
                                                                echo ">$nombre_estado</option>";
                                                            }
                                                    ?>
                                                    </select></div>
                                               
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Actualizar
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