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
   
    <title>Administrar dispositivos</title>
    

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
                        <h1>Administrar dispositivos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="administrar_dispositivo.php">Administrar dispositivos</a></li>
                            <li class="active">Administrar dispositivos</li>
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
                                <strong class="card-title">Administrar dispositivos</strong>
                            </div>

<form name="search" method="post" style="padding-top: 20px" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                   
                                   
                                       <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email" style="padding-left: 50px"><strong>Buscar por serial,ubicacion o nombre del dispositivo</strong></label>
                                                        <div class="col-6">
                                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                                        </div>
                                                    </div> 

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
  ?>
  <h4 align="center">Resultados de "<?php echo $sdata;?>"</h4> 


                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
            <th>ID DIS</th>
            
            <th>Cómputo</th>
                     
             <th>Nombre dispositivo</th>

             <th>Serial</th>
      
            <th>Ubicacion</th>
                     
             <th>Fecha registro</th>

             <th>Estado</th>
                     
             <th>Acción</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"SELECT dispositivo.id_dispositivo,computo.nombre_computo,nombre_dispositivo,serial_dispositivo,ubicacion_dispositivo,fecha_dispositivo,estado.nombre_estado 
FROM dispositivo,computo,estado 
WHERE (dispositivo.id_computo = computo.id_computo) AND (dispositivo.id_estado = estado.id_estado) 
AND (serial_dispositivo like '%$sdata%' OR nombre_dispositivo like '%$sdata%' OR ubicacion_dispositivo like '%$sdata%')");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    ?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['nombre_computo'];?></td>           
                  <td><?php  echo $row['nombre_dispositivo'];?></td>
                  <td><?php  echo $row['serial_dispositivo'];?></td>
                  <td><?php  echo $row['ubicacion_dispositivo'];?></td>
                  <td><?php  echo $row['fecha_dispositivo'];?></td>
                  <td><?php  echo $row['nombre_estado'];?></td>

                  <td><a href="editar_dispositivo.php?editarid=<?php echo $row['id_dispositivo'];?>">Editar</a></td>

                </tr>
                 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No hay registros para esta busqueda</td>

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