<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $fecha_actual = date("Y-m-d");
        $i = 0;

        $fecha_orden = explode("-",$fecha_orden);
        list($dia,$mes,$ano)=$fecha_orden;
        $fecha_orden = $ano."-".$mes."-".$dia;
        $fecha_entrega_deposito = explode("-",$fecha_entrega_deposito);
        list($dia,$mes,$ano)=$fecha_entrega_deposito;
        $fecha_entrega_deposito = $ano."-".$mes."-".$dia;
        $fecha_limite_recepcion = explode("-",$fecha_limite_recepcion);
        list($dia,$mes,$ano)=$fecha_limite_recepcion;
        $fecha_limite_recepcion = $ano."-".$mes."-".$dia;

        $codigos_insumos = explode(",",$codigos_insumos);
        $cantidad_insumos = explode(",",$cantidad_insumos);

        $verificar_orden_compra = mysql_query("SELECT * FROM orden_compra WHERE nro_orden_compra = '$orden_compra' ");

        if(mysql_num_rows($verificar_orden_compra) != 0)
        {
            auditoria($_SESSION['id_usuario'],"Intento registrar una orden de compra de N° $orden_compra, ya existente.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "La orden de compra N° $orden_compra ya se encuentra registrada.";
            header("Location:../modulos/gestion_orden_compra.php");
            die();
        }
        else
        {
            $nuevaOrden = mysql_query("INSERT INTO orden_compra (id_proveedor, nro_orden_compra, fecha_emision, fecha_carga_sistema, fecha_recepcion_deposito, fecha_limite_recepcion, descripcion, condicion, unidad_solicitante) VALUES ('$proveedor','$orden_compra','$fecha_orden','$fecha_actual','$fecha_entrega_deposito','$fecha_limite_recepcion','$descripcion_orden','$condicion_pago','$unidad_solicitante')");

            $id_orden_compra = mysql_insert_id($conex);

            foreach($codigos_insumos as $codigo)
            {
                $insumo = mysql_fetch_assoc(mysql_query("SELECT * FROM insumos WHERE codigo_insumo = '$codigo' "));
                $insumo_orden = mysql_query("INSERT INTO insumos_orden_compra (id_orden_compra, id_insumo, cantidad_solicitada, pendiente_por_recibir) VALUES ('$id_orden_compra','".$insumo['id_insumo']."','".$cantidad_insumos[$i]."','".$cantidad_insumos[$i]."')");
                $i++;
            }
            auditoria($_SESSION['id_usuario'],"Registro una orden de compra de N° $orden_compra",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "La orden de compra N° $orden_compra ha sido cargada satisfactoriamente.";
            header("Location:../modulos/gestion_orden_compra.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        // $actualizar_deposito = mysql_query("UPDATE depositos SET id_division = '$division_deposito', nombre_deposito = '$nombre_deposito' WHERE id_deposito = '$id' ");
        // $_SESSION['message'] = "El depósito ha sido actualizado satisfactoriamente.";
        // header("Location:../modulos/depositos.php");
        // die();
    }
    elseif($operation == "delete")
    {
        // $verificar_insumos = mysql_query("SELECT * FROM insumos WHERE id_deposito = '$id' ");
        // if(mysql_num_rows($verificar_insumos) == 0)
        // {
        //     $delete_deposito = mysql_query("DELETE FROM depositos WHERE id_deposito = '$id' ");
        //     $_SESSION['message'] = "El depósito se ha eliminado satisfactoriamente.";
        //     header("Location:../modulos/depositos.php");
        //     die();
        // }
        // else
        // {
        //     $_SESSION['warning'] = "No es posible eliminar el deposito, ya que posee ".mysql_num_rows($verificar_insumos)." insumos asociados.";
        //     header("Location:../modulos/depositos.php");
        //     die();
        // }
    }
    else
    {
        header("Location:../");
    }

?>