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
    
    <title>Mostrar anomalias</title>
    
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
                        <h1>Anomalias</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="mostrar_anomalia.php">Anomalias</a></li>
                            <li class="active">Anomalias sin reolver</li>
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
                                <strong class="card-title">Mostrar anomalias sin resolver</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>ID</th>
            
                  <th>Computo</th>
                           
                   <th>Dispositivo</th>

                   <th>Usuario</th>

                   <th>Descripcion</th>
            
                  <th>Fecha</th>

                  <th>Estado</th>
                           
                   <th>Acción</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$data_tech=$_SESSION['datatechnologyid'];
$ret=mysqli_query($con,"SELECT anomalia.id_anomalia,computo.nombre_computo, dispositivo.nombre_dispositivo, usuario.nombre_usuario, anomalia.des_anomalia, anomalia.fecha_anomalia, estado.nombre_estado from computo,usuario,dispositivo,anomalia, estado
where (computo.id_computo = anomalia.id_computo) AND (dispositivo.id_dispositivo = anomalia.id_dispositivo)
AND (usuario.id_usuario = anomalia.id_usuario) AND (estado.id_estado = anomalia.id_estado) AND anomalia.id_estado = '3'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['nombre_computo'];?></td>           
                  <td><?php  echo $row['nombre_dispositivo'];?></td>
                  <td><?php  echo $row['nombre_usuario'];?></td>
                  <td><?php  echo $row['des_anomalia'];?></td>
                  <td><?php  echo $row['fecha_anomalia'];?></td>
                  <td><?php  echo $row['nombre_estado'];?></td>
                  <td><a href="administrar_anomalia.php?adminid=<?php echo $row['id_anomalia'];?>">Resolver</a></td>
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