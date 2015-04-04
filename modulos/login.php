<?php

require "../config/conection.php";

session_start();

?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>SAHUM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="../css/sahum.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>

        #banner-identificacion {
            border-bottom:none;
        }

        </style>
    </head>
    <body class="bg-black">
        <div id="banner-identificacion"></div>
        <div class="form-box" id="login-box">
            <div class="header">Control de acceso</div>
            <form action="../procesos/login.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="usuario" class="form-control" required placeholder="Usuario" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" required placeholder="Contraseña" />
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="ingresar" class="btn bg-olive btn-block">Iniciar sesión</button>  
                    <br>
                <div class="margin text-center">
                <span>Desarrollado por Juan Delgadillo 2015 <br>Licencia GNU GPL V3 </span>

            </div>
                </div>
            </form>

            
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>        

<?php

if(isset($_SESSION['menssage']) && $_SESSION['menssage'] != "")
{

  printf("<script type='text/javascript' language='javascript'>
    window.addEventListener('load',function(){
        alert('".$_SESSION['menssage']."');
    },false);

    </script>");

  unset($_SESSION['menssage']);

}

 ?>

    </body>
</html>