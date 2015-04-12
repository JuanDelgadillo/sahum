<?php

require "../config/conection.php";

session_start();

if(! isset($_SESSION['usuario']))
{
    header("Location:modulos/login.php");
    die();
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
                        <small>Inventario</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="inventario.php"><i class="fa fa-archive"></i> Inventario</a></li>
                        <li class="active">Nuevo insumo</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                            <form role="form">
                            <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">Nuevo insumo</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Deposito</label>
                                            <select name="deposito" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Código del insumo</label>
                                            <input type="text" name="codigo_insumo" class="form-control" placeholder="Código del insumo" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Presentación</label>
                                            <select name="presentacion" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                                <option>Aerosol</option>
                                                <option>Ampolla</option>
                                                <option>Capsula</option>
                                                <option>Grageas</option>
                                                <option>Tableta</option>
                                                <option>Cartucho</option>
                                                <option>Comprimido</option>
                                                <option>Crema</option>
                                                <option>Frasco</option>
                                                <option>Jarabe</option>
                                                <option>Galón</option>
                                                <option>Gotas</option>
                                                <option>Loción</option>
                                                <option>Ovulos</option>
                                                <option>Parches</option>
                                                <option>Solución</option>
                                                <option>Polvo</option>
                                                <option>Supositorio</option>
                                                <option>Suspensión</option>
                                                <option>Suspensión gotas</option>
                                                <option>Suspensión nevulizador</option>
                                                <option>Lata</option>
                                                <option>Sobre</option>
                                                <option>Bolsa</option>
                                                <option>C/U</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad en existencia</label>
                                            <input type="text" name="cantidad_existencia" class="form-control" placeholder="Cantidad en existencia" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Laboratorio</label>
                                            <select name="laboratorio" class="form-control" required>
                                                <option>- Seleccione -</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label>Fecha de elaboración</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="fecha_elaboracion" class="form-control" id="fecha_elaboracion" required readonly />
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                        <div class="form-group">
                                            <label for="exampleInputFile">Imagen del insumo</label>
                                            <input type="file" name="imagen_insumo" id="imagen_insumo">
                                            <p class="help-block">Ingrese la imagen del insumo (opcional).</p>
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
                                            <label>Sección</label>
                                            <select name="seccion" class="form-control" required>
                                                <option>- Seleccione -</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Código de barra</label>
                                            <input type="text" name="codigo_barra" class="form-control" placeholder="Código de barra" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Unidad de medida</label>
                                            <select name="unidad_de_medida" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                                <option>Unidad</option>
                                                <option>Docena</option>
                                                <option>Bulto</option>
                                                <option>Paquete</option>
                                                <option>Litro</option>
                                                <option>Gramo</option>
                                                <option>Caja</option>
                                                <option>Kilo</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad mínima</label>
                                            <input type="text" name="cantidad_minima" class="form-control" placeholder="Cantidad minima" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Marca</label>
                                            <select name="marca" class="form-control" required>
                                                <option>- Seleccione -</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label>Fecha de vencimiento</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control" required readonly />
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <div class="form-group">
                                            <label>Ubicación física</label>
                                            <input type="text" name="ubicacion_fisica" class="form-control" placeholder="Ubicación física" required />
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
                                            <label>Proveedor</label>
                                            <select name="proveedor" class="form-control" required>
                                                <option>- Seleccione -</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Concepto de ingreso</label>
                                            <select name="concepto_ingreso" class="form-control" required>
                                                <option>- Seleccione -</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Dosificación</label>
                                            <input type="text" name="dosificacion" class="form-control" placeholder="Dosificación" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Cantidad máxima</label>
                                            <input type="text" name="cantidad_maxima" class="form-control" placeholder="Cantidad máxima" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Número de lote</label>
                                            <input type="text" name="numero_lote" class="form-control" placeholder="Número de lote" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Precio unitario</label>
                                            <input type="text" name="precio_unitario" class="form-control" placeholder="Precio unitario" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea style="resize:none;" name="descripcion" class="form-control" rows="3" placeholder="Descripción del insumo" required></textarea>
                                        </div>
                                        
                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                                <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" onclick="window.location='inventario.php'" class="btn">Cancelar</button>
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
                
                $('#fecha_vencimiento').datepicker({
                    format: "dd/mm/yyyy"
                });

                $('#fecha_elaboracion').datepicker({
                    format: "dd/mm/yyyy"
                });
            
            });
        </script>

    </body>
</html>