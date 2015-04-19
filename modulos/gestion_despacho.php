<?php

require "../config/conection.php";

session_start();
extract($_REQUEST);
if(! isset($_SESSION['usuario']))
{
    header("Location:login.php");
    die();
}

    $ultimo_despacho = mysql_query("SELECT * FROM despachos ");

    if(mysql_num_rows($ultimo_despacho) == 0)
    {
        $nro_control = 1;
    }
    else
    {
        $despacho = mysql_fetch_assoc(mysql_query("SELECT * FROM despachos ORDER BY numero_control DESC "));
        $nro_control = $despacho['numero_control']+1;
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

    var counter = 0;
    var array_ubicacion_insumo_inventario = Array();
    var array_nodos = Array();
    var array_codigos = Array();
    var array_cantidades_solicitadas = Array();
    var array_cantidades_despachadas = Array();

    var despliegue_warning = function(mensaje, tiempo)
    {
        msg_warning.innerText = mensaje;
        warning_ajax.style.display = 'block';
        setTimeout(function(){
                warning_ajax.style.display = 'none';
            }, tiempo);
        return false; 
    }

    var agregar_insumo = function(registro)
    {
        var target_row = $(registro).closest("tr").get(0);
        var ubicacion_insumo_inventario = $('#example1').dataTable().fnGetPosition(target_row);
        if(array_codigos.indexOf(target_row.childNodes[3].textContent) == -1)
        {
            array_codigos.push(target_row.childNodes[3].textContent);
            array_nodos.push(target_row);

            array_ubicacion_insumo_inventario.push(ubicacion_insumo_inventario);
            if(array_codigos.length >= 2 && array_cantidades_solicitadas.length == 0)
            {
                counter--;
                array_nodos.splice(array_codigos.indexOf(target_row.childNodes[3].textContent)-1,1);
                array_ubicacion_insumo_inventario.splice(array_codigos.indexOf(target_row.childNodes[3].textContent)-1,1);
                array_codigos.splice(array_codigos.indexOf(target_row.childNodes[3].textContent)-1,1);
            }
        }
        else
        {
            despliegue_warning('Ya has seleccionado el insumo, procede a cargar el detalle.', 4000);
        }
    }
    
window.addEventListener('load',function(){
    //Inicialización del reloj
    hmsg();

    // Cargar servicios de la división dinámicamente
    $('#division').on('change',function(){
        $.ajax({
              url: '../procesos/carga_valores.php',
              type: 'POST',
              async: true,
              data: 'tipo=servicio&id='+division.value,
              success: function(data){
                    servicio.innerHTML = data;
              },
              dataType: 'HTML'
            });
    });

    form_despacho.addEventListener('submit',function(event){
        if(!array_cantidades_solicitadas.length)
        {
            despliegue_warning('Debe cargar al menos un insumo a despachar',4000);
            event.preventDefault();
        }
    },false);

    agregar_detalle.addEventListener('click',function(){

        if(typeof (array_nodos[counter]) != 'undefined')
        {
            var aPos = $('#example1').dataTable();
            //console.log(aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[8].textContent);
            var cantidad_existencia = Number(aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[8].textContent);
        }
        
        if(typeof (array_nodos[counter]) == 'undefined')
        {
            despliegue_warning('Debe seleccionar el insumo a cargar.',4000);
        }
        else if(cantidad_solicitada.value == "")
        {
            despliegue_warning('Debe ingresar la cantidad solicitada.',4000);
        }
        else if(isNaN(cantidad_solicitada.value))
        {
            despliegue_warning('La cantidad solicitada debe ser un número.',4000);
        }
        else if(cantidad_solicitada.value <= 0)
        {
            despliegue_warning('La cantidad solicitada debe ser un número mayor que 0.',4000);
        }
        else if(cantidad_despachada.value == "")
        {
            despliegue_warning('Debe ingresar la cantidad despachada.',4000);
        }
        else if(isNaN(cantidad_despachada.value))
        {
            despliegue_warning('La cantidad despachada debe ser un número.',4000);
        }
        else if(cantidad_despachada.value <= 0 || cantidad_despachada.value > cantidad_solicitada.value)
        {
            despliegue_warning('La cantidad despachada debe ser un número mayor que 0 y menor o igual que la cantidad solicitada.',5000);
        }
        else if(cantidad_despachada.value > cantidad_existencia)
        {
            despliegue_warning('La cantidad despachada debe ser un número menor o igual que la cantidad en existencia.',5000);
        }
        else
        {
            
            aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[8].textContent = cantidad_existencia - Number(cantidad_despachada.value);
            var id_insumo = aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[1].textContent
            var codigo = aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[4].textContent
            var descripcion = aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[5].textContent
            var unidad_medida = aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[6].textContent
            var fecha_vencimiento = aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[7].textContent;
            fecha_vencimiento = fecha_vencimiento.split(",");

            //Asignación de valores dinámicos a los campos ocultos del formulario
            codigos_insumos.value = array_codigos.toString();
            array_cantidades_solicitadas.push(cantidad_solicitada.value);
            cantidades_solicitadas.value = array_cantidades_solicitadas.toString();
            array_cantidades_despachadas.push(cantidad_despachada.value);
            cantidades_despachadas.value = array_cantidades_despachadas.toString();

            //Agregar insumo a los cargados del despacho
            $('#example2').dataTable().fnAddData( [
                    counter+1,
                    codigo,
                    descripcion,
                    unidad_medida,
                    "<span style='display:none'>"+fecha_vencimiento[0]+"</span>"+fecha_vencimiento[1],
                    cantidad_solicitada.value,
                    cantidad_despachada.value,
                    "<span class='btn-group'><a class='del"+counter+" btn btn-small' title='Eliminar insumo'><i class='fa fa-trash-o'></i></a></span>" ] );
                    
                    $(".del"+counter).click(function(){
                        var target_row = $(this).closest("tr").get(0);
                        var aPos = $('#example1').dataTable().fnGetPosition(target_row);
                        var cantidad_existencia = $('#example1').dataTable()[0].children[2].children[array_ubicacion_insumo_inventario[aPos]].children[8].textContent;
                        $('#example1').dataTable()[0].children[2].children[array_ubicacion_insumo_inventario[aPos]].children[8].textContent = Number(cantidad_existencia)+Number(array_cantidades_despachadas[aPos]);
                        $('#example1').dataTable()[0].children[2].children[array_ubicacion_insumo_inventario[aPos]].children[9].style.display = '';
                        array_nodos.splice(aPos,1);
                        array_codigos.splice(aPos,1);
                        array_cantidades_solicitadas.splice(aPos,1);
                        array_cantidades_despachadas.splice(aPos,1);
                        $('#example2').dataTable().fnDeleteRow(aPos);
                        codigos_insumos.value = array_codigos.toString();
                        cantidades_solicitadas.value = array_cantidades_solicitadas.toString();
                        cantidades_despachadas.value = array_cantidades_despachadas.toString();
                    });

            //Limpieza de campos para un nuevo insumo a despachar
            cantidad_solicitada.value = "";
            cantidad_despachada.value = "";

            //Eliminar opción de selección del insumo
            aPos[0].children[2].children[aPos.fnGetPosition(array_nodos[counter])].children[9].style.display = 'none';

            //Incrementar posición para los arreglos
            counter++;

                       
            // Así obtengo el id de cada insumo
            // aPos[0].children[2].children[counter].children[1].textContent
        }


    },false); // Fin de la función de escucha del boton agregar detalle

},false); // Fin del evento load

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
                                        <li><a href="gestion_orden_compra.php"><i class="fa fa-angle-double-right"></i> Cargar orden de compra</a></li>
                                        <li><a href="ordenes_compra.php"><i class="fa fa-angle-double-right"></i> Ordenes de compra</a></li>
                                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Reportes</a></li>
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
                        <li>
                            <a href="despachos.php">
                                <i class="fa fa-share-square"></i> <span>Salida</span>
                            </a>
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
                        <small>Salida</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="despachos.php"><i class="fa fa-share-square"></i> Salidas</a></li>
                        <li class="active">Nuevo despacho</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box" style="border-top:none;">
                                <div class="box-body table-responsive">
                                    <div style="display:none;" id="warning_ajax" class="alert alert-danger alert-dismissable">
                                            <i class="fa fa-ban"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b>¡Alerta! <span id="msg_warning"></span></b> 
                                        </div>
                                    <div style="display:none;" id="success_ajax" class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b></b> 
                                        </div>
                                    <?php

                                        if(isset($_SESSION['warning']) && $_SESSION['warning'] != "")
                                        { ?>
                                        <div style="display:block;" id="warning" class="alert alert-danger alert-dismissable">
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
                                        <div style="display:block;" id="success" class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b></b> <?=$_SESSION['message']?>
                                        </div>
                                        <?php

                                          unset($_SESSION['message']);

                                        }

                                        ?>
                            <div class="box box-success">
                            <form role="form" id="form_despacho" method="POST" action="../procesos/despacho.php">
                            <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">Cargar nuevo despacho</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                    <div class="form-group">
                                        <label>Número de control</label>
                                        <input type="text" name="numero_control" value="<?=$nro_control?>" class="form-control" readonly />
                                    </div>

                                    <div class="form-group">
                                            <label>Concepto de salida</label>
                                            <select name="concepto_salida" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                                <?php
                                                $conceptos_salida = mysql_query("SELECT * FROM conceptos_salida");
                                                while($concepto = mysql_fetch_assoc($conceptos_salida))
                                                {
                                                    ?>
                                                    <option value="<?=$concepto['id_concepto_salida']?>"><?=$concepto['nombre_concepto_salida']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label>Personal de despacho</label>
                                        <input type="text" name="personal_despachador" id="personal_despachador"  class="form-control" placeholder="Personal de despacho" required/>
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
                                        <label>Fecha de despacho</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="fecha_despacho" class="form-control" value="<?=date('d-m-Y')?>" id="fecha_despacho" required readonly />
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <div class="form-group">
                                            <label>Division solicitante</label>
                                            <select name="division" id="division" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                                <?php
                                                $divisiones = mysql_query("SELECT * FROM divisiones");
                                                while($division = mysql_fetch_assoc($divisiones))
                                                {
                                                    ?>
                                                    <option value="<?=$division['id_division']?>"><?=$division['nombre_division']?></option>
                                                    <?php
                                                }
                                                ?>
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
                                        <label>Hora de despacho</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" name="hora_despacho" class="form-control" id="hora_despacho" required readonly />
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <div class="form-group">
                                            <label>Servicio</label>
                                            <select name="servicio" id="servicio" class="form-control" required>
                                                <option value="">- Seleccione -</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <br><br><br>
                                        </div>

                                        <?php if(isset($id) && is_numeric($id) && $id != ""){ ?>
                                        <input type="hidden" name="id" value="<?=$id?>">
                                        <input type="hidden" name="operation" value="update">">
                                        <?php }else{ ?>
                                        <input type="hidden" name="codigos_insumos" id="codigos_insumos">
                                        <input type="hidden" name="cantidades_solicitadas" id="cantidades_solicitadas">
                                        <input type="hidden" name="cantidades_despachadas" id="cantidades_despachadas">
                                        
                                        <input type="hidden" name="operation" value="save">
                                        <?php } ?>
                                        
                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                                <div class="box-footer">
                                        <input type="submit" style="margin-top:-5px;" class="btn btn-primary" value="Cargar despacho">
                                    </div>
                        </div>
                        
                            </form>
                            </div><!-- /.box -->
                            <div class="box box-info">
                            <div class="box-header">
                                    <h3 class="box-title">Insumos del inventario</h3>
                                </div><!-- /.box-header -->                                   
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th style="display:none;"></th>
                                                <th>Deposito</th>
                                                <th>Sección</th>
                                                <th>Código del insumo</th>
                                                <th>Descripción</th>
                                                <th>Unidad de medida</th>
                                                <th>Fecha de vencimiento</th>
                                                <th>Cantidad en existencia</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $i = 1;
                                            $insumos = mysql_query("SELECT * FROM insumos, depositos, secciones WHERE insumos.id_deposito = depositos.id_deposito AND insumos.id_seccion = secciones.id_seccion AND insumos.cantidad_existencia != 0");

                                            while($insumo = mysql_fetch_assoc($insumos))
                                            {
                                                $insumo['fecha_vencimiento'] = explode("-",$insumo['fecha_vencimiento']);
                                                list($ano,$mes,$dia)=$insumo['fecha_vencimiento'];
                                                $insumo['fecha_vencimiento']= $dia."-".$mes."-".$ano;
                                            ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td style="display:none;"><?=$insumo['id_insumo']?></td>
                                                <td><?=$insumo['nombre_deposito']?></td>
                                                <td><?=$insumo['nombre_seccion']?></td>
                                                <td><?=$insumo['codigo_insumo']?></td>
                                                <td><?=$insumo['descripcion']?></td>
                                                <td><?=$insumo['unidad_medida']?></td>
                                                <td><span style='display: none;'><?=$ano.$mes.$dia.","?></span><?=$insumo['fecha_vencimiento']?></td>
                                                <td><?=$insumo['cantidad_existencia']?></td>
                                                <td>
                                                <a class="btn addi" onclick="agregar_insumo(this);" title="Seleccionar insumo N° <?=$i?>">
                                                <i class="fa fa-check-square"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>N°</th>
                                                <th style="display:none;"></th>
                                                <th>Deposito</th>
                                                <th>Sección</th>
                                                <th>Código del insumo</th>
                                                <th>Descripción</th>
                                                <th>Unidad de medida</th>
                                                <th>Fecha de vencimiento</th>
                                                <th>Cantidad en existencia</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- End box -->
                                    <div class="box box-info">
                            <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">Detalle del insumo a cargar</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                    <div class="form-group">
                                        <label>Cantidad solicitada</label>
                                        <input type="text" name="cantidad_solicitada" id="cantidad_solicitada"  class="form-control" placeholder="Cantidad solicitada" />
                                        </div>


                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                        <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Cantidad despachada</label>
                                        <input type="text" name="cantidad_despachada" id="cantidad_despachada"  class="form-control" placeholder="Cantidad despachada" />
                                        </div>
                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                        <div class="col-md-4">
                            <!-- general form elements disabled -->
                                <div class="box-header">
                                    <h3 class="box-title">&nbsp;</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                        <br>
                                        
                                </div><!-- /.box-body -->
                        </div><!--/.col (right) -->
                                <div class="box-footer">
                                        <input type="button" style="margin-top:-5px;" id="agregar_detalle" class="btn btn-primary" value="Aceptar" />
                                    </div>
                        </div>
                        <div class="box box-info">
                        <div class="box-header">
                                    <h3 class="box-title">Insumos cargados al despacho</h3>
                                </div><!-- /.box-header -->
                        <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Código del insumo</th>
                                                <th>Descripción</th>
                                                <th>Unidad de medida</th>
                                                <th>Fecha de vencimiento</th>
                                                <th>Solicitado</th>
                                                <th>Entregar</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>N°</th>
                                                <th>Código del insumo</th>
                                                <th>Descripción</th>
                                                <th>Unidad de medida</th>
                                                <th>Fecha de vencimiento</th>
                                                <th>Solicitado</th>
                                                <th>Entregar</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </tfoot>
                                    </table><br>
                                </div>
                            </div><!-- /.box -->
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
        <script src="../js/reloj.js" type="text/javascript"></script>
        <script src="../js/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable( {
                "oLanguage": {
                  "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ insumos",
                  "sInfoFiltered": "(Filtrado de _MAX_ insumo totales)",
                  "sInfoEmpty": "Mostrando del 0 al 0 de 0 insumos",
                  "sEmptyTable": "No existen insumos en el inventario."
                },
                "iDisplayLength": 5,
                "aLengthMenu": [[5, 10, 25, 50, 100], ["5", "10", "25", "50", "100"]]
              } );

                $('#example2').dataTable( {
                "oLanguage": {
                  "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ insumo",
                  "sInfoFiltered": "(Filtrado de _MAX_ insumo totales)",
                  "sInfoEmpty": "Mostrando del 0 al 0 de 0 insumos",
                  "sEmptyTable": "No existen insumos cargados al despacho."
                },
                "iDisplayLength": 5,
                "aLengthMenu": [[5, 10, 25, 50, 100], ["5", "10", "25", "50", "100"]]
              } );

                });

            

            $(document).ready(function () {
                
                $('#fecha_despacho').datepicker({
                    format: "dd-mm-yyyy"
                });
            
            });
        </script>

    </body>
</html>