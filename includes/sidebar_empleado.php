<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
<?php
$id_usuario=$_SESSION['datatechnologyid'];
$ret=mysqli_query($con,"select nombre_usuario from usuario where id_usuario='$id_usuario' ");
$row=mysqli_fetch_array($ret);
$name=$row['nombre_usuario'];

?>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> 
                <a class="navbar-brand" href="dashboard_empleado.php">DataTech | <?php echo $name; ?></a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard_empleado.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>


 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Empleado</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="agregar_bitacora.php">Llenar bitacora</a></li>
                            <li><i class="fa fa-user"></i><a href="administrar_bitacora.php">Actualizar bitacora</a></li>
                            
                          
                        </ul>
                    </li>

                  


                    


            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>