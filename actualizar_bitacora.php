<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    $id_computo=$_POST['id_computo_redireccionar'];
    $cid=$_POST['upid'];
      $observaciones=$_POST['observaciones'];
      $tiempo_salida=$_POST['tiempo_salida'];
    
   $query=mysqli_query($con, "update bitacora set observaciones='$observaciones', id_estado='2' where id_bitacora='$cid'");
    if ($query) {
echo "<script>
if (window.confirm('Se ha actualizado la bitacora, ¿Desea reportar una anomalia?')) { 
  window.location.href = 'agregar_anomalia.php?id_computo=$id_computo';
}else{
  window.location.href = 'dashboard_empleado.php';
}
</script>";
  }
  else
    {
      $msg="Algo malo ha pasado, intentalo otra vez";
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
                        <h1>Actualizar bitacora</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard_empleado.php">Dashboard</a></li>
                            <li><a href="actualizar_bitacora.php">Actualizar bitacora</a></li>
                            <li class="active">Actualizar bitacora</li>
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
                            <div class="card-header"><strong>Actualizar</strong><small> Bitacora</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['upid'];
$ret=mysqli_query($con,"select * from bitacora where id_bitacora='$cid'");


$cnt=1;
while ($row=mysqli_fetch_array($ret)) {


?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                                     
<tr>                          
                                   <tr>
                                    <th>Asunto</th>
                                      <td><?php  echo $row['asunto'];?></td>
                                  </tr>                        
           
                     <tr>
       <th>Tiempo de entrada</th>
       <td><?php  echo $row['tiempo_llegada'];?></td>
</tr>


</td>
  </tr>
</table>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                                </table>
<table class="table mb-0">

<?php if($row['id_estado']="1"){ ?>


<form name="submit" method="post"  enctype="multipart/form-data"> 
<input type="hidden" name="id_computo_redireccionar" value="<?php echo $row['id_computo'];?>">
<input type="hidden" name="upid" value="<?php echo $cid;?>">
<tr>
    <th>Observaciones :</th>
    <td>
    <textarea name="observaciones" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
    
  </tr>
  
<tr>
 <td> <a href="agregar_anomalia.php?reid=<?php echo $row['id_computo'];?>"></a> </td>
</tr>
  
  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Actualizar</button>
    
    </td>
    


  </tr>
  </form>
<?php } else { ?>
    <table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Observaciones</th>
    <td><?php echo $row['observaciones']; ?></td>
  </tr>
<tr>
   <tr>
    <th>Tiempo salida</th>
    <td><?php echo $row['tiempo_salida']; ?></td>
  </tr>

<tr>
<th>Tiempo de actualizacion</th>
<td><?php echo $row['act_tiempo']; ?>  </td></tr>





<?php } ?>
</table>


  

  

<?php } ?>

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
