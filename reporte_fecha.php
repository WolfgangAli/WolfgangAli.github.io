<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
error_reporting(0);
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
                        <h1>Reportes por fechas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="reporte_fecha.php">Reportes por fechas</a></li>
                            <li class="active">Reportes</li>
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
                            <div class="card-header"><strong>Por fechas</strong><small> Reporte</small></div>
                            <form name="bwdatesreport"  action="reporte_fecha_detalles.php" method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">

                            <div class="form-group"><label for="city" class=" form-control-label">Computo</label><select type="text" name="id_computo" id="cname" value="" class="form-control" >
                                                    <option value="">Seleccione computo</option>
                                                    <?php
                                                            $get_computo = "select * from computo where id_estado='1'";
                                                            $run_computo = mysqli_query($con, $get_computo);
                                                            while ($row_computo=mysqli_fetch_array($run_computo)){
                                                        
                                                                $id_computo = $row_computo['id_computo'];
                                                                $nombre_computo = $row_computo['nombre_computo'];
                                                        
                                                                echo "<option value=$id_computo>$nombre_computo</option>";
                                                            }
                                                    ?>
                                                    </select></div>

 
                                <div class="form-group"><label for="company" class=" form-control-label">Desde:</label><input type="date" name="fromdate" id="fromdate" class="form-control" required="true"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Hasta:</label><input type="date" name="todate"  class="form-control" required="true"></div>
                                        
                                                    </div>
                                                   
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Aceptar
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