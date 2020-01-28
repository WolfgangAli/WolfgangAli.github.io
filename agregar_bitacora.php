<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$data_tech=$_SESSION['datatechnologyid'];
$id_computo=$_POST['id_computo'];
$asunto=$_POST['asunto'];
$id_estado=$_POST['id_estado'];

 $query=mysqli_query($con,"insert into bitacora(id_computo,id_usuario,asunto,id_estado) 
 value('$id_computo','$data_tech','$asunto','1')");

    if ($query) {
    echo '<script>alert("Una nueva bitacora de acceso ha sido agregado.")</script>';
echo "<script>window.location.href ='dashboard_empleado.php'</script>";
  }
  else
    {
         echo '<script>alert("Algo malo ha pasado, intentalo de nuevo.")</script>';
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>DataTech | Bitacora</title>
  

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

    <?php include_once('includes/sidebar_empleado.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header_empleado.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detalles de la bitacora</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard_empleado.php">Dashboard</a></li>
                            <li><a href="agregar_bitacora.php">Detalles de la bitacora</a></li>
                            <li class="active">Agregar</li>
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
                            <div class="card-header"><strong>Bitacora</strong><small> Detalles</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
                            <div class="col-12">
                                                <div class="form-group"><label for="city" class=" form-control-label">Computo</label><select type="text" name="id_computo" id="cname" value="" class="form-control" required="true">
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

                                                   

                                
 
                                <div class="form-group"><label for="company" class=" form-control-label">Asunto</label><input type="text" name="asunto" value="" class="form-control" id="nombre_dispositivo" required="true"></div>
                                

                                           
                                                <div class="col-12">
                                                
                                               
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Agregar
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            



                                           
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