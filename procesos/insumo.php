<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

    if($operation == "save" || $operation == "update")
    {
        $fecha_elaboracion = explode("-",$fecha_elaboracion);
        list($dia,$mes,$ano)=$fecha_elaboracion;
        $fecha_elaboracion = $ano."-".$mes."-".$dia;
        $fecha_vencimiento = explode("-",$fecha_vencimiento);
        list($dia,$mes,$ano)=$fecha_vencimiento;
        $fecha_vencimiento = $ano."-".$mes."-".$dia;
    }

    if($operation == "save")
    {
        $verificar_insumo = mysql_query("SELECT * FROM insumos WHERE codigo_insumo = '$codigo_insumo' ");

        if(mysql_num_rows($verificar_insumo) != 0)
        {
            auditoria($_SESSION['id_usuario'],"Intento registrar un insumo identificado con el código $codigo_insumo, ya existente.",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['warning'] = "El insumo ya se encuentra registrado.";
            header("Location:../modulos/nuevoInsumo.php");
            die();
        }
        else
        {
            $nuevoInsumo = mysql_query("INSERT INTO insumos (codigo_insumo, id_deposito, id_seccion, id_proveedor, id_concepto_ingreso, id_laboratorio, id_marca, codigo_barra, descripcion, presentacion, dosificacion, unidad_medida, cantidad_existencia, cantidad_minima, cantidad_maxima, n_lote, fecha_elaboracion, fecha_vencimiento, precio_unitario, imagen_insumo, ubicacion_fisica) VALUES ('$codigo_insumo','$deposito','$seccion','$proveedor','$concepto_ingreso','$laboratorio','$marca','$codigo_barra','$descripcion','$presentacion','$dosificacion','$unidad_de_medida','$cantidad_existencia','$cantidad_minima','$cantidad_maxima','$numero_lote','$fecha_elaboracion','$fecha_vencimiento','$precio_unitario','','$ubicacion_fisica') ");
            auditoria($_SESSION['id_usuario'],"Registro un nuevo insumo identificado con el código $codigo_insumo",$info["os"],$info["browser"],$info["version"],$ip);
            $_SESSION['message'] = "El insumo ha sido registrado satisfactoriamente.";
            header("Location:../modulos/nuevoInsumo.php");
            die();
        }
    }
    elseif($operation == "update")
    {
        $actualizar_insumo = mysql_query("UPDATE insumos SET codigo_insumo = '$codigo_insumo', id_deposito = '$deposito', id_seccion = '$seccion', id_proveedor = '$proveedor', id_concepto_ingreso = '$concepto_ingreso', id_laboratorio = '$laboratorio', id_marca = '$marca', codigo_barra = '$codigo_barra', descripcion = '$descripcion', presentacion = '$presentacion', dosificacion = '$dosificacion', unidad_medida = '$unidad_de_medida', cantidad_existencia = '$cantidad_existencia', cantidad_minima = '$cantidad_minima', cantidad_maxima = '$cantidad_maxima', n_lote = '$numero_lote', fecha_elaboracion = '$fecha_elaboracion', fecha_vencimiento = '$fecha_vencimiento', precio_unitario = '$precio_unitario', imagen_insumo = '', ubicacion_fisica = '$ubicacion_fisica' WHERE id_insumo = '$id' ");
        auditoria($_SESSION['id_usuario'],"Actualizó el insumo identificado con el código $codigo_insumo",$info["os"],$info["browser"],$info["version"],$ip);
        $_SESSION['message'] = "El insumo ha sido actualizado satisfactoriamente.";
        header("Location:../modulos/inventario.php");
        die();
    }
    elseif($operation == "delete")
    {
        var_dump($_REQUEST);
        die();
        $verificar_insumos = mysql_query("SELECT * FROM insumos WHERE id_deposito = '$id' ");
        if(mysql_num_rows($verificar_insumos) == 0)
        {
            $delete_deposito = mysql_query("DELETE FROM depositos WHERE id_deposito = '$id' ");
            $_SESSION['message'] = "El depósito se ha eliminado satisfactoriamente.";
            header("Location:../modulos/depositos.php");
            die();
        }
        else
        {
            $_SESSION['warning'] = "No es posible eliminar el deposito, ya que posee ".mysql_num_rows($verificar_insumos)." insumos asociados.";
            header("Location:../modulos/depositos.php");
            die();
        }
    }
    else
    {
        header("Location:../");
    }

?>