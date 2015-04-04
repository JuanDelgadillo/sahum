<?php

session_start();

include_once "../config/conection.php";

if(isset($_SESSION['usuario']))
{
    session_destroy();
    header("Location:../");
}
else
{
    header("Location:../");
}

?>