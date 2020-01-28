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
   
    <title>DataTech | Busqueda</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


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
                        <h1>Busqueda por usuario</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="busqueda.php">Busqueda por usuario</a></li>
                            <li class="active">Usuario</li>
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
                                <strong class="card-title">Busqueda por usuario</strong>
                            </div>

<form name="search" method="post" style="padding-top: 20px" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                
                                   
                                       <div class="form-group row">
                                       
                                                        <label class="col-4 col-form-label" for="example-email" style="padding-left: 50px"><strong>Buscar por usuario, nombre o codigo</strong></label>
                                                        <div class="col-6">
                                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                                        </div>

                                                        
                                                    </div> 
                                    
                                                    <div class="form-group"><label for="company" class="col-4 col-form-label"><strong>Desde:</strong></label><input type="date" name="fromdate" id="fromdate" class="form-control" required="true"></div>
                                <div class="form-group"><label for="vat" class="col-4 col-form-label"><strong>Hasta:</strong></label><input type="date" name="todate"  class="form-control" required="true"></div>
                                   

                                                   <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="search" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Buscar
                                                        </button></p>
                                                        
                                                    </div>
                                                    </div> 
                                    
       </form>


<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
$fecha_desde=$_POST['fromdate'];
$fecha_hasta=$_POST['todate'];
  ?>
  <h4 align="center">Resultados encontrados por "<?php echo $sdata;?>" desde <?php echo $fecha_desde;?> hasta <?php echo $fecha_hasta;?></h4> 


                            <div class="card-body">
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
$data_tech=$_SESSION['datatechnologyid'];
$ret=mysqli_query($con,"Select computo.nombre_computo,usuario.nombre ,usuario.nombre_usuario, bitacora.asunto, bitacora.observaciones, bitacora.tiempo_llegada,
bitacora.tiempo_salida from computo, usuario, bitacora where (computo.id_computo=bitacora.id_computo) AND (usuario.id_usuario = bitacora.id_usuario) 
and (usuario.rol_usuario = 'empleado') and date(tiempo_llegada) between '$fecha_desde' and '$fecha_hasta' and (usuario.nombre_usuario like '%$sdata%' OR usuario.cod_usuario like '%$sdata%' OR usuario.nombre like '%$sdata%')");
$num=mysqli_num_rows($ret);
if($num>0){
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
} } else { ?>
  <tr>
    <td colspan="8"> No se ha encontrado registros de esta busqueda.</td>

  </tr>
   
<?php } }?>

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