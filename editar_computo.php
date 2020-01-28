<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editarid'];
$data_tech=$_SESSION['datatechnologyid'];
$nombre_com=$_POST['nombre_computo'];
$estado_com=$_POST['id_estado'];
 $query=mysqli_query($con,"update computo set nombre_computo='$nombre_com',id_estado='$estado_com' where  id_computo='$eid'");

    if ($query) {
    $msg="Se ha editado los detalles del cómputo con éxito.";
  }
  else
    {
      $msg="Algo malo ha pasado, inténtalo de nuevo";
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>DatatTech editar cómputo</title>
  
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
                        <h1>Actualizar detalles de cómputo</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="administrar_computo.php">Actualizar detalles de cómputo</a></li>
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
                            <div class="card-header"><strong>Computo</strong><small> Detalle</small></div>
                            <form name="package" method="post" action="">
                                <p style="font-size:16px; color:green" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['editarid'];
$ret=mysqli_query($con,"select * from  computo where id_computo='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group"><label for="company" class=" form-control-label">Nombre de computo</label><input type="text" name="nombre_computo" value="<?php  echo $row['nombre_computo'];?>" class="form-control" id="nombre_computo" required="true"></div>
                                   
                                       
                                            <div class="row form-group">
                                                <div class="col-12">
                                                <div class="form-group"><label for="city" class=" form-control-label">Estado del computo</label><select type="text" name="id_estado" id="cname" value="<?php  echo $row['id_estado'];?>" class="form-control" required="true">
                                                   
                                                   
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