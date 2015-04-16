<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $i = 0;

        $fecha_recibido = explode("-",$fecha_recibido);
        list($dia,$mes,$ano)=$fecha_recibido;
        $fecha_recibido = $ano."-".$mes."-".$dia;

        $codigos_insumos = explode(",",$codigos_insumos);
        $cantidades_renunciadas = explode(",",$cantidades_renunciadas);

        $nuevaRenuncia = mysql_query("INSERT INTO nota_entrega_carta_renuncia (id_orden_compra, fecha_recepcion, personal_receptor, imagen_digital_documento) VALUES ('$orden_compra','$fecha_recibido','$personal_receptor','') ");

        $id_carta_renuncia = mysql_insert_id($conex);

            foreach($codigos_insumos as $codigo)
            {
                // Seleccion del insumo de acuerdo al codigo dinámico del arreglo
                $insumo = mysql_fetch_assoc(mysql_query("SELECT * FROM insumos, insumos_orden_compra WHERE insumos.codigo_insumo = '$codigo' AND insumos_orden_compra.id_insumo = insumos.id_insumo AND insumos_orden_compra.id_orden_compra = '$orden_compra' "));
                
                // Seleccion de la orden de compra
                $orden_de_compra = mysql_fetch_assoc(mysql_query("SELECT * FROM orden_compra WHERE id_orden_compra = '$orden_compra' "));
                
                // Carga de los insumos a la carta de renuncia
                $insumo_renuncia = mysql_query("INSERT INTO insumos_nota_entrega_carta_renuncia (id_nota_entrega, id_insumo, cantidad_recibida, cantidad_renunciar, nro_lote) VALUES ('$id_carta_renuncia','".$insumo['id_insumo']."','0','".$cantidades_renunciadas[$i]."','')");
                
                // Actualización pendiente por recibir y total renunciado del insumo en la orden de compra
                $pendiente_por_recibir = (int)$insumo['pendiente_por_recibir']-(int)$cantidades_renunciadas[$i];
                $total_renunciado = (int)$insumo['total_renunciado']+(int)$cantidades_renunciadas[$i];
                $actualizar_orden_compra = mysql_query("UPDATE insumos_orden_compra SET pendiente_por_recibir = '$pendiente_por_recibir', total_renunciado = '$total_renunciado' WHERE id_orden_compra = '$orden_compra' AND id_insumo = '".$insumo['id_insumo']."' ");
                $i++;
            }
            $_SESSION['message'] = "La carta de renuncia ha sido cargada satisfactoriamente.";
            header("Location:../modulos/ordenes_compra.php");
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