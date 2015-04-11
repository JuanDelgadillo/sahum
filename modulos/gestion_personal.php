<?php

require "../config/conection.php";

session_start();
extract($_REQUEST);
if(! isset($_SESSION['usuario']))
{
    header("Location:modulos/login.php");
    die();
}

if(isset($id) && is_numeric($id) && $id != "")
{
    $title = "Actualizar persona";
    $persona = mysql_fetch_assoc(mysql_query("SELECT * FROM personas WHERE cedula = '$id' "));
    $cedula = $persona['cedula'];
    $nombres = $persona['nombres'];
    $apellidos = $persona['apellidos'];
    $fecha_ingreso = $persona['fecha_ingreso'];
    $estatus = $persona['estatus'];
    $nomina = $persona['nomina'];
    $fecha_ingreso_nomina = $persona['fecha_ingreso_nomina'];
    $estatus_nomina = $persona['estatus_nomina'];
    $nivel_academico = $persona['nivel_academico'];
    $profesion = $persona['profesion'];
    $ubicacion = $persona['ubicacion'];
    $telefono = $persona['telefono'];
    $fecha_ingreso = explode("-",$fecha_ingreso);
    list($ano,$mes,$dia)=$fecha_ingreso;
    $fecha_ingreso = $dia."-".$mes."-".$ano;
    $fecha_ingreso_nomina = explode("-",$fecha_ingreso_nomina);
    list($ano,$mes,$dia)=$fecha_ingreso_nomina;
    $fecha_ingreso_nomina = $dia."-".$mes."-".$ano;
}
else
{
    $title = "Nueva persona";
    $cedula = "";
    $nombres = "";
    $apellidos = "";
    $fecha_ingreso = "";
    $estatus = "";
    $nomina = "";
    $fecha_ingreso_nomina = "";
    $estatus_nomina = "";
    $nivel_academico = "";
    $profesion = "";
    $ubicacion = "";
    $telefono = "";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SAHUM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../css/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../css/sahum.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

<script>

window.addEventListener('load',function(){

    <?php

    if(isset($_SESSION['message']) && $_SESSION['message'] != "")
    { ?>
    var success = document.querySelector("#success");
    
    if(success.style.display == 'block')
    {
        setTimeout(function(){
            success.style.display = 'none';
        }, 4000); 
    }
    <?php 
    }
    ?>
    <?php

    if(isset($_SESSION['warning']) && $_SESSION['warning'] != "")
    { ?>
    var warning = document.querySelector("#warning");
    
    if(warning.style.display == 'block')
    {
        setTimeout(function(){
            warning.style.display = 'none';
        }, 6000); 
    }
    <?php 
    }
    ?>

},false);

</script>

    </head>
    <body class="skin-blue">
        <div id="banner-identificacion"></div>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SAHUM
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes 4 mensages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes 10 notificaciones</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes 9 tareas</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Juan Delgadillo <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Juan Delgadillo - Web Developer
                                        <small>Miembro desde Noviembre. 2014</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Seguidores</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#"></a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Amigos</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../procesos/logout.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
         <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, Juan</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="../">
                                <i class="fa fa-th"></i> <span>Panel de control</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-archive"></i> <span>Inventario</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-angle-double-right">
                                        
                                    </i> Nota de entrega
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                        <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Cargar nota de entrega</a></li>
                                        <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Reportes</a></li>
                                    </ul>
                                </li>
                                <li><a href="inventario.php"><i class="fa fa-angle-double-right"></i> Inventario</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-truck"></i>
                                <span>Proveedores</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="proveedores.php"><i class="fa fa-angle-double-right"></i> Proveedores</a></li>
                                <li class="treeview">
                                    <a href="pages/charts/flot.html">
                                        <i class="fa fa-angle-double-right"></i> Orden de compra
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Cargar orden de compra</a></li>
                                        <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Reportes</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="divisiones.php">
                                <i class="fa fa-hospital-o"></i>
                                <span>Divisiones y servicios</span>
                            </a>
                        </li>
                        <li>
                            <a href="personal.php">
                                <i class="fa fa-users"></i>
                                <span>Personal</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text"></i> <span>Pro forma</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> Pro formas</a></li>
                                <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Reportes</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Devolución</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Consultar</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> <span>Estadística</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                                <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="pages/calendar.html">
                                <i class="fa fa-gears"></i> <span>Configuraciones</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="cuentas.php"><i class="fa fa-angle-double-right"></i> Usuarios del sistema</a></li>
                                <li class="treeview">
                                    <a href="pages/charts/flot.html">
                                        <i class="fa fa-angle-double-right"></i> Carga inicial
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="depositos.php"><i class="fa fa-angle-double-right"></i> Depositos</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Configuración del sistema</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-search"></i> <span>Auditoría</span>
                                <small class="badge pull-right bg-red">10</small>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        SAHUM
                        <small>Personal</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="personal.php"><i class="fa fa-users"></i> Personal</a></li>
                        <li class="active"><?=$title?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php

                            if(isset($_SESSION['warning']) && $_SESSION['warning'] != "")
                            { ?>
                            <div style="margin-top:15px;display:block;" id="warning" class="alert alert-danger alert-dismissable">
                                <i class="fa fa-ban"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>¡Alerta!</b> <?=$_SESSION['warning']?>
                            </div>
                            <?php

                              unset($_SESSION['warning']);

                            }

                            ?>
                            <?php

                            if(isset($_SESSION['message']) && $_SESSION['message'] != "")
                            { ?>
                            <div style="margin-top:15px;display:block;" id="success" class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b></b> <?=$_SESSION['message']?>
                            </div>
                            <?php

                              unset($_SESSION['message']);

                            }

                            ?>
                            <div class="box box-success">
                            <form role="form" method="POST" action="../procesos/personal.php">
                            <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title"><?=$title?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Cédula</label>
                                        <input type="text" name="cedula" value="<?=$cedula?>" class="form-control" placeholder="Cédula" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de ingreso al SAHUM</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="fecha_ingreso" value="<?=$fecha_ingreso?>" class="form-control" id="fecha_ingreso" required readonly />
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                    <div class="form-group">
                                        <label>Fecha de ingreso a nómina</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="fecha_ingreso_nomina" value="<?=$fecha_ingreso_nomina?>" class="form-control" id="fecha_ingreso_nomina" required readonly />
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                    <div class="form-group">
                                        <label>Profesión</label>
                                        <select name="profesion" class="form-control" required>
                                            <option value="">- Seleccione -</option>
                                            <option <?php if($profesion == "Lcdo. en administracion") echo "SELECTED"; ?> value="Lcdo. en administracion">Lcdo. en administración</option>
                                            <option <?php if($profesion == "Lcdo. en contaduria publica") echo "SELECTED"; ?> value="Lcdo. en contaduria publica">Lcdo. en contaduría pública</option>
                                            <option <?php if($profesion == "Ingeniero civil") echo "SELECTED"; ?> value="Ingeniero civil">Ingeniero civil</option>
                                            <option <?php if($profesion == "Ingeniero en informatica") echo "SELECTED"; ?> value="Ingeniero en informatica">Ingeniero en informática</option>
                                        </select>
                                    </div>

                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                        <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" name="nombres" value="<?=$nombres?>" class="form-control" placeholder="Nombres" required />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Estatus</label>
                                        <select name="estatus" class="form-control" required>
                                            <option value="">- Seleccione -</option>
                                            <option <?php if($estatus == "Activo") echo "SELECTED"; ?> value="Activo">Activo</option>
                                            <option <?php if($estatus == "Inactivo") echo "SELECTED"; ?> value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Estatus nómina</label>
                                        <select name="estatus_nomina" class="form-control" required>
                                            <option value="">- Seleccione -</option>
                                            <option <?php if($estatus_nomina == "Activo") echo "SELECTED"; ?> value="Activo">Activo</option>
                                            <option <?php if($estatus_nomina == "Inactivo") echo "SELECTED"; ?> value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="telefono" value="<?=$telefono?>" class="form-control" placeholder="Teléfono" required />
                                    </div>

                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                        <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" name="apellidos" value="<?=$apellidos?>" class="form-control" placeholder="Apellidos" required />
                                    </div>

                                    <div class="form-group">
                                            <label>Nómina</label>
                                            <select name="nomina" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                                <option <?php if($nomina == "Contratado empleado") echo "SELECTED"; ?> value="Contratado empleado">Contratado empleado</option>
                                                <option <?php if($nomina == "Fijo empleado") echo "SELECTED"; ?> value="Fijo empleado">Fijo empleado</option>
                                                <option <?php if($nomina == "Contratado obrero") echo "SELECTED"; ?> value="Contratado obrero">Contratado obrero</option>
                                                <option <?php if($nomina == "Fijo obrero") echo "SELECTED"; ?> value="Fijo obrero">Fijo obrero</option>
                                            </select>
                                        </div>

                                    <div class="form-group">
                                        <label>Nivel academico</label>
                                        <select name="nivel_academico" class="form-control" required>
                                            <option value="">- Seleccione -</option>
                                            <option <?php if($nivel_academico == "Sin instruccion") echo "SELECTED"; ?> value="Sin instruccion">Sin instrucción</option>
                                            <option <?php if($nivel_academico == "Basico") echo "SELECTED"; ?> value="Basico">Básico</option>
                                            <option <?php if($nivel_academico == "Bachiller") echo "SELECTED"; ?> value="Bachiller">Bachiller</option>
                                            <option <?php if($nivel_academico == "Tecnico medio") echo "SELECTED"; ?> value="Tecnico medio">Técnico medio</option>
                                            <option <?php if($nivel_academico == "Tecnico superior") echo "SELECTED"; ?> value="Tecnico superior">Técnico superior</option>
                                            <option <?php if($nivel_academico == "Universitario") echo "SELECTED"; ?> value="Universitario">Universitario</option>
                                            <option <?php if($nivel_academico == "Licenciado") echo "SELECTED"; ?> value="Licenciado">Licenciado</option>
                                            <option <?php if($nivel_academico == "Ingeniero") echo "SELECTED"; ?> value="Ingeniero">Ingeniero</option>
                                            <option <?php if($nivel_academico == "Maestria") echo "SELECTED"; ?> value="Maestria">Maestría</option>
                                            <option <?php if($nivel_academico == "Postgrado") echo "SELECTED"; ?> value="Postgrado">Postgrado</option>
                                            <option <?php if($nivel_academico == "Doctorado") echo "SELECTED"; ?> value="Doctorado">Doctorado</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                            <label>Ubicación</label>
                                            <textarea style="resize:none;" name="ubicacion" class="form-control" rows="3" placeholder="Ubicación" required><?=$ubicacion?></textarea>
                                        </div>

                                        <?php if(isset($id) && is_numeric($id) && $id != ""){ ?>
                                        <input type="hidden" name="id" value="<?=$id?>">
                                        <input type="hidden" name="operation" value="update">
                                        <?php }else{ ?>
                                        <input type="hidden" name="operation" value="save">
                                        <?php } ?>
                                        
                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                                <div class="box-footer">
                                        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                                        <button type="button" onclick="window.location='personal.php'" class="btn">Cancelar</button>
                                    </div>
                        </div>
                        
                            </form>
                            </div><!-- /.box -->
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="../js/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#fecha_ingreso').datepicker({
                    format: "dd-mm-yyyy"
                });

                $('#fecha_ingreso_nomina').datepicker({
                    format: "dd-mm-yyyy"
                });
            
            });
        </script>

    </body>
</html>