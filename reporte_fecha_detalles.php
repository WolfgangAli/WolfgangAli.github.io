<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>Reporte fecha | DataTech</title>
   

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
                        <h1>Ver computos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="reporte_fecha_detalles.php">Reporte por fechas</a></li>
                            <li class="active">Computo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ver computo</strong>
                            </div>
                            <div class="card-body">
<h4 class="m-t-0 header-title">Reporte por fechas</h4>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$computo=$_POST['id_computo'];
$empleado=$_POST['id_usuario'];

?>
<h5 align="center" style="color:green">Reporte desde <?php echo $fdate?> hasta <?php echo $tdate?></h5>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
            <th>No.</th>
            
            <th>Computo</th>
            <th>Usuario</th>    
             <th>Nombre</th>
             <th>Asunto</th>
              <th>Observaciones</th>    
             <th>Tiempo llegada</th>
             <th>Tiempo salida</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"Select computo.nombre_computo,usuario.nombre ,usuario.nombre_usuario, bitacora.asunto, bitacora.observaciones, bitacora.tiempo_llegada, bitacora.tiempo_salida from computo, usuario, bitacora 
where (computo.id_computo=bitacora.id_computo) AND (usuario.id_usuario = bitacora.id_usuario) and (usuario.rol_usuario = 'empleado') 
and date(tiempo_llegada) between '$fdate' and '$tdate' and bitacora.id_computo = '$computo'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['nombre_computo'];?></td>
                  <td><?php  echo $row['nombre_usuario'];?></td>
                  <td><?php  echo $row['nombre'];?></td>
                  <td><?php  echo $row['asunto'];?></td>
                  <td><?php  echo $row['observaciones'];?></td>
                  <td><?php  echo $row['tiempo_llegada'];?></td>
                  <td><?php  echo $row['tiempo_salida'];?></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php }  ?>