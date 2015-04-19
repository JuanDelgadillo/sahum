<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $i = 0;

        $fecha_despacho = explode("-",$fecha_despacho);
        list($dia,$mes,$ano)=$fecha_despacho;
        $fecha_despacho = $ano."-".$mes."-".$dia;

        $codigos_insumos = explode(",",$codigos_insumos);
        $cantidades_solicitadas = explode(",",$cantidades_solicitadas);
        $cantidades_despachadas = explode(",",$cantidades_despachadas);

        $nuevoDespacho = mysql_query("INSERT INTO despachos (numero_control, id_concepto_salida, id_division, id_servicio, personal_despachador, fecha_elaboracion, hora_elaboracion) VALUES ('$numero_control','$concepto_salida','$division','$servicio','$personal_despachador','$fecha_despacho','$hora_despacho') ");

        $id_despacho = mysql_insert_id($conex);

            foreach($codigos_insumos as $codigo)
            {
                // Seleccion del insumo de acuerdo al codigo dinámico del arreglo
                $insumo = mysql_fetch_assoc(mysql_query("SELECT * FROM insumos WHERE id_insumo = '$codigo' "));
                
                // Carga de los insumos al despacho
                $insumo_renuncia = mysql_query("INSERT INTO insumos_despacho (id_despacho, id_insumo, cantidad_solicitada, cantidad_despachada) VALUES ('$id_despacho','$codigo','".$cantidades_solicitadas[$i]."','".$cantidades_despachadas[$i]."')");
                
                // Actualización de la existencia del insumo en el inventario
                $existencia_insumo = (int)$insumo['cantidad_existencia']-(int)$cantidades_despachadas[$i];
                
                $actualizar_insumo = mysql_query("UPDATE insumos SET cantidad_existencia = '$existencia_insumo' WHERE id_insumo = '$codigo' ");
                $i++;
            }
            $_SESSION['message'] = "El despacho ha sido cargado satisfactoriamente.";
            header("Location:../modulos/despachos.php");
            die();
        
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