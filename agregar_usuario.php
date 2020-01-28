<?php
session_start();
error_reporting(0);
include('includes/conexionbd.php');
if (strlen($_SESSION['datatechnologyid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

    $errores = array();

$data_tech=$_SESSION['datatechnologyid'];
$codigo_usuario = $_POST['cod_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];    
$direccion = $_POST['direccion'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

if (empty($nombre)) { array_push($errores, "Nombre del administrador es requerido"); }
    if (empty($codigo_usuario)) { array_push($errores, "Codigo de usuario es requerido"); }
    if (empty($usuario)) { array_push($errores, "Nombre de usuario del administrador es requerido"); }
    if (empty($telefono)) { array_push($errores, "Teléfono o celular es requerido"); }
    if (empty($email)) { array_push($errores, "Correo electrónico del administrador es requerido"); }
    if (empty($password_1)) { array_push($errores, "Contraseña del administrador es requerido"); }

    if ($password_1 != $password_2){
        array_push($errores, "Las contraseñas no coinciden");
        echo "<script>alert('Las contraseñas no coinciden!')</script>";
        echo "<script>window.open('register.php)</script>";
    }

    $usuario_chk_query = "SELECT * FROM usuario WHERE nombre_usuario='$usuario' OR email_usuario='$email' OR cod_usuario='$codigo_usuario' LIMIT 1";
    $resultado = mysqli_query($con, $usuario_chk_query);
    $user = mysqli_fetch_assoc($resultado);

    if ($user){
        if ($user['email'] === $email) {
            array_push($errores, "Este correo ya existe");
            echo "<script>alert('Este correo ya existe!')</script>";
            echo "<script>window.open('register.php)</script>";
        }

        if ($user['nombre_usuario'] === $usuario) {
            array_push($errores, "Este usuario ya existe");
            echo "<script>alert('Este usuario ya se ha usado!')</script>";
            echo "<script>window.open('register.php)</script>";
        }

        if ($user['cod_usuario'] === $codigo_usuario) {
            array_push($errores, "Este codigo de usuario ya existe");
            echo "<script>alert('Este codigo de usuario ya se ha usado!')</script>";
            echo "<script>window.open('register.php)</script>";
        }
    }
    if (count($errores) == 0) {
        $password = md5($password_1);
  
        $query = "INSERT INTO usuario (cod_usuario, nombre, apellido, nombre_usuario, password, rol_usuario, direccion_usuario, telefono_usuario, email_usuario, id_estado) 
                  VALUES('$codigo_usuario', '$nombre', '$apellido', '$usuario','$password' ,'$rol', '$direccion', '$telefono', '$email', '$estado')";

        $run_query = mysqli_query($con, $query);

        echo "<script>alert('Su cuenta ha sido creada exitosamente, Gracias!')</script>";
        echo "<script>window.open('agregar_usuario.php')</script>";
    }
  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>DataTech | Usuario</title>
  

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
                        <h1>Detalles del usuario</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="agregar_usuario.php">Detalles del usuario</a></li>
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
                            <div class="card-header"><strong>Usuario</strong><small> Detalles</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                           

                           <div class="card-body card-block">
                            <div class="col-12">

                            <div class="form-group"><label for="company" class=" form-control-label">Código de usuario</label><input type="text" name="cod_usuario" value="" class="form-control" id="nombre_dispositivo" required="true"></div>

                            <div class="form-group"><label for="company" class=" form-control-label">Nombre</label><input type="text" name="nombre" value="" class="form-control" id="nombre_dispositivo" required="true"></div>


                            <div class="form-group"><label for="company" class=" form-control-label">Apellido</label><input type="text" name="apellido" value="" class="form-control" id="nombre_dispositivo" required="true"></div>

                            <div class="form-group"><label for="company" class=" form-control-label">Nombre de usuario</label><input type="text" name="usuario" value="" class="form-control" id="nombre_dispositivo" required="true"></div>

                            <div class="form-group"><label for="company" class=" form-control-label">Contraseña</label><input type="password" name="password_1" value="" class="form-control" id="nombre_dispositivo" required="true"></div>
                            
                            <div class="form-group"><label for="company" class=" form-control-label">Confirmar contraseña</label><input type="password" name="password_2" value="" class="form-control" id="nombre_dispositivo" required="true"></div>

                                                <div class="form-group"><label for="city" class=" form-control-label">Rol del usuario</label><select type="text" name="rol" id="cname" value="" class="form-control" required="true">
                                                    <option value="">Seleccione rol del usuario</option>
                                                    <option value="administrador">administrador</option>
                                                    <option value="empleado">empleado</option>
                                                    </select></div>

                                                
                                                    <div>
                        <label>Direccion</label>
                        <textarea name="direccion" placeholder="" rows="5" cols="10" class="form-control wd-450" required="true"></textarea>
                        </div>
 
                                <div class="form-group"><label for="company" class=" form-control-label">Telefono</label><input type="text" name="telefono" value="" class="form-control" id="nombre_dispositivo" required="true"></div>
                                
                                
                                <div class="form-group"><label for="company" class=" form-control-label">e-mail del usuario</label><input type="text" name="email" value="" class="form-control" id="serial_dispositivo" required="true"></div>
                                       
                                            <div class="row form-group">
                                                <div class="col-12">
                                                <div class="form-group"><label for="city" class=" form-control-label">Estado del dispositivo</label><select type="text" name="estado" id="cname" value="" class="form-control" required="true">
                                                    <option value="">Seleccione estado</option>
                                                    <?php
                                                            $get_estado = "select * from estado";
                                                            $run_estado = mysqli_query($con, $get_estado);
                                                            while ($row_estado=mysqli_fetch_array($run_estado)){
                                                        
                                                                $id_estado = $row_estado['id_estado'];
                                                                $nombre_estado = $row_estado['nombre_estado'];
                                                        
                                                                echo "<option value=$id_estado>$nombre_estado</option>";
                                                            }
                                                    ?>
                                                    </select></div>
                                               
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