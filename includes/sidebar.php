<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
<?php
$id_usuario=$_SESSION['datatechnologyid'];
$ret=mysqli_query($con,"select nombre_usuario from usuario where id_usuario='$id_usuario'");
$row=mysqli_fetch_array($ret);
$name=$row['nombre_usuario'];

?>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> 
                <a class="navbar-brand" href="dashboard.php">DataTech | <?php echo $name; ?></a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

 <li class="menu-item-has-children dropdown">
                    <a href="agregar_computo.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Computos</a>
                    <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a href="agregar_computo.php">Agregar</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href="administrar_computo.php">Administrar</a></li>
                        </ul>
                    </li>

<li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Dispositivos</a>
                    <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a href="agregar_dispositivo.php">Agregar</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href="administrar_dispositivo.php">Administrar</a></li>
                        </ul>
                    </li>



 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Usuarios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="agregar_usuario.php">Agregar</a></li>
                            <li><i class="fa fa-user"></i><a href="administrar_usuarios.php">Administrar</a></li>
                            
                          
                        </ul>
                    </li>


    
<li class="active">
                        <a href="busqueda.php"> <i class="menu-icon fa fa-search"></i>Buscar </a>
                    </li>
  <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Reportes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a href="reporte_fecha.php">Por fechas</a></li>
                           
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>