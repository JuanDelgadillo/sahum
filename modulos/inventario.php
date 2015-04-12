<?php

require "../config/conection.php";

session_start();

if(! isset($_SESSION['usuario']))
{
    header("Location:login.php");
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
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../css/sahum.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
.box {
       border-top:none;
}
        </style>
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
                        <li class="treeview active">
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
                                <li class="active"><a href="inventario.php"><i class="fa fa-angle-double-right"></i> Inventario</a></li>
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
                                        <li><a href="conceptos_ingreso.php"><i class="fa fa-angle-double-right"></i> Conceptos de ingreso</a></li>
                                        <li><a href="laboratorios.php"><i class="fa fa-angle-double-right"></i> Laboratorios y marcas</a></li>
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
                        <li><a href="../"><i class="fa fa-th"></i> Panel de control</a></li>
                        <li class="active">Inventario</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <a class="btn btn-app" href="nuevoInsumo.php" title="Nuevo insumo">
                                        <i class="fa fa-plus"></i> Nuevo
                                    </a>                                    
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Deposito</th>
                                                <th>Sección</th>
                                                <th>Código del insumo</th>
                                                <th>Descripción</th>
                                                <th>Unidad de medida</th>
                                                <th>Cantidad en existencia</th>
                                                <th>Cantidad mínima</th>
                                                <th>Cantidad máxima</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td>5</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 5.5</td>
                                                <td>Win 95+</td>
                                                <td>5.5</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 6</td>
                                                <td>Win 98+</td>
                                                <td>6</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 7</td>
                                                <td>Win XP SP2+</td>
                                                <td>7</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>AOL browser (AOL desktop)</td>
                                                <td>Win XP</td>
                                                <td>6</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td>1.9</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.1</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.1</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.2</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.2</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.3</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.3</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.4</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.4</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.5</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.5</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.6</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.6</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.7</td>
                                                <td>Win 98+ / OSX.1+</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.8</td>
                                                <td>Win 98+ / OSX.1+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Seamonkey 1.1</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Epiphany 2.20</td>
                                                <td>Gnome</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 1.2</td>
                                                <td>OSX.3</td>
                                                <td>125.5</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 1.3</td>
                                                <td>OSX.3</td>
                                                <td>312.8</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 2.0</td>
                                                <td>OSX.4+</td>
                                                <td>419.3</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 3.0</td>
                                                <td>OSX.4+</td>
                                                <td>522.1</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>OmniWeb 5.5</td>
                                                <td>OSX.4+</td>
                                                <td>420</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>iPod Touch / iPhone</td>
                                                <td>iPod</td>
                                                <td>420.1</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>S60</td>
                                                <td>S60</td>
                                                <td>413</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 7.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 7.5</td>
                                                <td>Win 95+ / OSX.2+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 8.0</td>
                                                <td>Win 95+ / OSX.2+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 8.5</td>
                                                <td>Win 95+ / OSX.2+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 9.0</td>
                                                <td>Win 95+ / OSX.3+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 9.2</td>
                                                <td>Win 88+ / OSX.3+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 9.5</td>
                                                <td>Win 88+ / OSX.3+</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera for Wii</td>
                                                <td>Wii</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Nokia N800</td>
                                                <td>N800</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Nintendo DS browser</td>
                                                <td>Nintendo DS</td>
                                                <td>8.5</td>
                                                <td>C/A<sup>1</sup></td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KHTML</td>
                                                <td>Konqureror 3.1</td>
                                                <td>KDE 3.1</td>
                                                <td>3.1</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KHTML</td>
                                                <td>Konqureror 3.3</td>
                                                <td>KDE 3.3</td>
                                                <td>3.3</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KHTML</td>
                                                <td>Konqureror 3.5</td>
                                                <td>KDE 3.5</td>
                                                <td>3.5</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tasman</td>
                                                <td>Internet Explorer 4.5</td>
                                                <td>Mac OS 8-9</td>
                                                <td>-</td>
                                                <td>X</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tasman</td>
                                                <td>Internet Explorer 5.1</td>
                                                <td>Mac OS 7.6-9</td>
                                                <td>1</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tasman</td>
                                                <td>Internet Explorer 5.2</td>
                                                <td>Mac OS 8-X</td>
                                                <td>1</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>NetFront 3.1</td>
                                                <td>Embedded devices</td>
                                                <td>-</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>NetFront 3.4</td>
                                                <td>Embedded devices</td>
                                                <td>-</td>
                                                <td>A</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>Dillo 0.8</td>
                                                <td>Embedded devices</td>
                                                <td>-</td>
                                                <td>X</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>Links</td>
                                                <td>Text only</td>
                                                <td>-</td>
                                                <td>X</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>Lynx</td>
                                                <td>Text only</td>
                                                <td>-</td>
                                                <td>X</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>IE Mobile</td>
                                                <td>Windows Mobile 6</td>
                                                <td>-</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td>-</td>
                                                <td>C</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>U</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>
                                                <a class="btn" title="Editar insumo">
                                                <i class="fa fa-pencil"></i></a>
                                                <a class="btn" title="Eliminar insumo">
                                                <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Deposito</th>
                                                <th>Sección</th>
                                                <th>Código del insumo</th>
                                                <th>Descripción</th>
                                                <th>Unidad de medida</th>
                                                <th>Cantidad en existencia</th>
                                                <th>Cantidad mínima</th>
                                                <th>Cantidad máxima</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
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
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>