<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);


    if($operation == "save")
    {
        $i = 0;

        $fecha_actual = explode("-",$fecha_actual);
        list($dia,$mes,$ano)=$fecha_actual;
        $fecha_actual = $ano."-".$mes."-".$dia;

        $codigos_insumos = explode(",",$codigos_insumos);
        $cantidades_recibidas = explode(",",$cantidades_recibidas);
        $numeros_lotes = explode(",",$numeros_lotes);
        $laboratorios = explode(",",$laboratorios);
        $fechas_elaboracion = explode(",",$fechas_elaboracion);
        $fechas_vencimiento = explode(",",$fechas_vencimiento);

        $verificar_nota_entrega = mysql_query("SELECT * FROM nota_entrega_carta_renuncia WHERE numero_nota_entrega = '$numero_nota_entrega' ");

        if(mysql_num_rows($verificar_nota_entrega) != 0)
        {
            $_SESSION['warning'] = "La nota de entrega N° $numero_nota_entrega ya se encuentra registrada.";
            header("Location:../modulos/gestion_nota_entrega.php?orden=".$orden_compra);
            die();
        }
        else
        {
            $nuevaNota = mysql_query("INSERT INTO nota_entrega_carta_renuncia (id_orden_compra, numero_nota_entrega, fecha_recepcion, personal_receptor, imagen_digital_documento) VALUES ('$orden_compra','$numero_nota_entrega','$fecha_actual','$personal_receptor','') ");

            $id_nota_entrega = mysql_insert_id($conex);

            foreach($codigos_insumos as $codigo)
            {
                //Formateo de fechas
                $fechas_elaboracion[$i] = explode("-",$fechas_elaboracion[$i]);
                list($dia,$mes,$ano)=$fechas_elaboracion[$i];
                $fechas_elaboracion[$i] = $ano."-".$mes."-".$dia;
                $fechas_vencimiento[$i] = explode("-",$fechas_vencimiento[$i]);
                list($dia,$mes,$ano)=$fechas_vencimiento[$i];
                $fechas_vencimiento[$i] = $ano."-".$mes."-".$dia;

                // Seleccion del insumo de acuerdo al codigo dinámico del arreglo
                $insumo = mysql_fetch_assoc(mysql_query("SELECT * FROM insumos, insumos_orden_compra WHERE insumos.codigo_insumo = '$codigo' AND insumos_orden_compra.id_insumo = insumos.id_insumo AND insumos_orden_compra.id_orden_compra = '$orden_compra' "));
                
                // Seleccion de la orden de compra
                $orden_de_compra = mysql_fetch_assoc(mysql_query("SELECT * FROM orden_compra WHERE id_orden_compra = '$orden_compra' "));
                
                // Carga de los insumos a la nota de entrega
                $insumo_nota = mysql_query("INSERT INTO insumos_nota_entrega_carta_renuncia (id_nota_entrega, id_insumo, cantidad_recibida, cantidad_renunciar, nro_lote) VALUES ('$id_nota_entrega','".$insumo['id_insumo']."','".$cantidades_recibidas[$i]."','0','".$numeros_lotes[$i]."')");
                
                // Registro de los nuevos insumos al inventario
                $nuevoInsumo = mysql_query("INSERT INTO insumos (codigo_insumo, id_deposito, id_seccion, id_proveedor, id_concepto_ingreso, id_laboratorio, id_marca, codigo_barra, descripcion, presentacion, dosificacion, unidad_medida, cantidad_existencia, cantidad_minima, cantidad_maxima, n_lote, fecha_elaboracion, fecha_vencimiento, precio_unitario, imagen_insumo, ubicacion_fisica) VALUES ('$codigo','".$insumo['id_deposito']."','".$insumo['id_seccion']."','".$orden_de_compra['id_proveedor']."','4','".$laboratorios[$i]."','2','','".$insumo['descripcion']."','".$insumo['presentacion']."','".$insumo['dosificacion']."','".$insumo['unidad_medida']."','".$cantidades_recibidas[$i]."','".$insumo['cantidad_minima']."','".$insumo['cantidad_maxima']."','".$numeros_lotes[$i]."','".$fechas_elaboracion[$i]."','".$fechas_vencimiento[$i]."','".$insumo['precio_unitario']."','','".$insumo['ubicacion_fisica']."') ")or die(mysql_error());
                
                // Actualización pendiente por recibir del insumo en la orden de compra
                $pendiente_por_recibir = (int)$insumo['pendiente_por_recibir']-(int)$cantidades_recibidas[$i];
                $actualizar_orden_compra = mysql_query("UPDATE insumos_orden_compra SET pendiente_por_recibir = '$pendiente_por_recibir' WHERE id_orden_compra = '$orden_compra' AND id_insumo = '".$insumo['id_insumo']."' ");
                $i++;
            }
            $_SESSION['message'] = "La nota de entrega N° $numero_nota_entrega ha sido cargada satisfactoriamente.";
            header("Location:../modulos/ordenes_compra.php");
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