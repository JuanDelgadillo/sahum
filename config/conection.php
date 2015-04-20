<?php

date_default_timezone_set("America/Caracas");

$db   = "sahum";
$host = "localhost";
$user = "root";
$pass = "salomon";

$conex = mysql_connect($host,$user,$pass)or die("No fue posible la Conexion al Servidor ".$host);
$sdb   = mysql_select_db($db,$conex)or die("No se encontro la Base de Datos ".$db);

/**
 * Funcion que devuelve un array con los valores:
 *  os => sistema operativo
 *  browser => navegador
 *  version => version del navegador
 */
function detect()
{
    $browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
    $os=array("WIN","MAC","LINUX");
    
    # definimos unos valores por defecto para el navegador y el sistema operativo
    $info['browser'] = "OTHER";
    $info['os'] = "OTHER";
    
    # buscamos el navegador con su sistema operativo
    foreach($browser as $parent)
    {
        $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
        $f = $s + strlen($parent);
        $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
        $version = preg_replace('/[^0-9,.]/','',$version);
        if ($s)
        {
            $info['browser'] = $parent;
            $info['version'] = $version;
        }
    }
    
    # obtenemos el sistema operativo
    foreach($os as $val)
    {
        if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
            $info['os'] = $val;
    }
    
    # devolvemos el array de valores
    return $info;
}

function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}

function auditoria($usuario,$operation,$sistema_operativo,$navegador,$version_navegador,$ip)
    {
       $auditoria = mysql_query("INSERT INTO auditoria (id_usuario, operacion_realizada, sistema_operativo, navegador, version_navegador, ip, fecha_hora) VALUES ('$usuario', '$operation', '$sistema_operativo', '$navegador', '$version_navegador', '$ip', NOW() ) ");
    }

$ip = getRealIP();
$info=detect();

// echo "Sistema operativo: ".$info["os"];
// echo "Navegador: ".$info["browser"];
// echo "Versión: ".$info["version"];
?>