<?php

session_start();

include_once "../config/conection.php";

extract($_REQUEST);

?>
<select name="<?=$tipo?>" id="<?=$tipo?>" class="form-control" required>
    <option value="">- Seleccione -</option>
    <?php
    if($tipo == "seccion")
    {
    $valores = mysql_query("SELECT * FROM secciones WHERE id_deposito = '$id' ");
    while($valor = mysql_fetch_assoc($valores))
    {
        ?>
        <option <?php if($option == $valor['id_seccion']) echo "SELECTED"; ?> value="<?=$valor['id_seccion']?>"><?=$valor['nombre_seccion']?></option>
        <?php
    }
    }
    else if($tipo == "marca")
    {
    $valores = mysql_query("SELECT * FROM marcas WHERE id_laboratorio = '$id' ");
    while($valor = mysql_fetch_assoc($valores))
    {
        ?>
        <option <?php if($option == $valor['id_marca']) echo "SELECTED"; ?> value="<?=$valor['id_marca']?>"><?=$valor['nombre_marca']?></option>
        <?php
    }
    }
    ?>
</select>