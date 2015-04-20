<?php

require "../config/conection.php";

session_start();
extract($_REQUEST);
if(! isset($_SESSION['usuario']))
{
    header("Location:login.php");
    die();
}

if(isset($despacho) && ! empty($despacho) && is_numeric($despacho))
{
    $data_despacho = mysql_fetch_assoc(mysql_query("SELECT * FROM despachos, divisiones, servicios WHERE despachos.id_despacho = '$despacho' AND despachos.id_division = divisiones.id_division AND despachos.id_servicio = servicios.id_servicio "));
    $insumos_despacho = mysql_query("SELECT * FROM insumos_despacho, insumos WHERE insumos_despacho.id_despacho = '$despacho' AND insumos_despacho.id_insumo = insumos.id_insumo ");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pro forma de pedido</title>
    <style>

    h1 {
        margin:0;
        text-align: center;
    }

    </style>
    <script>
    window.addEventListener('load',function(){
        window.print();
    },false);
    </script>
</head>
<body>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td><img src="../img/sahum.png" width="200px" alt=""></td>
            <td align="center"><br><h2>PRO-FORMA DE PEDIDO</h2></td>
            <td><div style="border:1px solid black;width:190px;"><b>Número de control:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$data_despacho['numero_control']?></b></div></td>
        </tr>
    </table>
    <table border="1" width="100%" cellpadding="0" cellspacing="0">
        <tr align="center">
            <td rowspan="2" colspan="2">Código</td>
            <td rowspan="2" colspan="3">SERVICIO</td>
            <td colspan="2">Concepto</td>
            <td rowspan="2">Fecha de despacho</td>
            <td rowspan="2">Hora de despacho</td>
        </tr>
        <tr align="center">
            <td>53</td>
            <td>54</td>
        </tr>
        <tr align="center">
            <td colspan="2"></td>
            <td colspan="3"><?=$data_despacho['nombre_servicio']?></td>
            <td><?php if($data_despacho['id_concepto_salida'] == 1) echo "X"; ?></td>
            <td><?php if($data_despacho['id_concepto_salida'] == 2) echo "X"; ?></td>
            <td><?=$data_despacho['fecha_elaboracion']?></td>
            <td><?=$data_despacho['hora_elaboracion']?></td>
        </tr>
        <tr align="center">
            <td colspan="2">Cantidad</td>
            <td colspan="3">Código</td>
            <td rowspan="2" colspan="3">Descripción del articulo solicitado</td>
            <td rowspan="2">Tipo unidad</td>
        </tr>
        <tr align="center">
            <td>Pedido</td>
            <td>Despacho</td>
            <td>Grupo</td>
            <td>Sub-grupo</td>
            <td>Articulo</td>
        </tr>
        <?php

        while($insumo = mysql_fetch_assoc($insumos_despacho))
        {
        ?>
        <tr align="center">
            <td><?=$insumo['cantidad_solicitada']?></td>
            <td><?=$insumo['cantidad_despachada']?></td>
            <td colspan="3"><?=$insumo['codigo_insumo']?></td>
            <td colspan="3"><?=$insumo['descripcion']?></td>
            <td><?=$insumo['unidad_medida']?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>