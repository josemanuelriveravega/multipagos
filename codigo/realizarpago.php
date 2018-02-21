<?php
session_start();
if (@!$_SESSION['id']) {
header("Location:index.html");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <style>
        .div {
            text-align: center;
  margin: .4em 0;
}
div .label {
    text-align: right;
    margin-right: 10px;
  width: 10%;
  float: center;
}
  }
  label{color:red;
}
input{
    
}
  </style>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="sade.ico" >
  <title>SADE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S-</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SISTEMA SADE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">SADE</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
     
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="dist/img/padre.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Bienvenidos papas de: <?php echo $_SESSION['nombre'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/padre.jpg" class="img-circle" alt="User Image">

            
              </li>
          
              <!-- Menu Footer-->
              <li class="user-footer">
               
                 <div class="pull-right">
                  <a href="desconectar.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
       
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
       <!-- Sidebar user panel -->
      <br>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/padre.jpg" class="img-circle" alt="User Image">
        </div>
        
      <?php
        require('conexion.php');
          
     $id = $_SESSION['id'];
    $query =   " SELECT * FROM becasalumnos,becas WHERE becas.id and becasalumnos.alumno='$id' ";
      $resultado=$conexion->query($query);
         $row = $resultado->fetch_assoc();
          ?>
          <div class="pull-left info">
         <p>Su hijo(a) <?php echo $_SESSION['nombre'];?> </p>
          
        <?php
   require('conexion.php');
    $id = $_SESSION['id'];
 
   $resultado=$conexion->query($query);
         $row = $resultado->fetch_assoc();
        
   if($row==0) 
     {
     echo "";
 }else
 { echo "cuenta con un &nbsp;";
     echo $row['porcentaje'];
   echo "% de beca";
   }
   ?>
        </div>
      </div>
       <br>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
        <li class="header">PADRES DE FAMILIA O TUTOR</li>
       
        <br>
 
        <li>
          <a href="admin.php">
            <i class="fa fa-th"></i> <span>INICIO</span>
          </a>
        </li>
 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>PAGOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
           <li><a href="fechasdepago.php"><i class="fa fa-circle-o"></i>Consultar Pagos </a></li>
  
         
          </ul>
        </li>
   <li>
          <a href="cambiarcontrasena.php">
            <i class="fa fa-th"></i> <span>CAMBIAR CONTRASEÑA</span>
          </a>
        </li>
        <li>
          <a href="desconectar.php">
            <i class="fa fa-th"></i> <span>CERRAR SESIÓN</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        <small>Pagos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">PAGOS</a></li>
        <li class="active">Consultar pagos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
     
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
      
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
               <h4>Favor de Verificar su Información.</h4>
               <br>
                 <?php
        require('conexion.php');
          
     $id = $_SESSION['id'];
    $query =   " SELECT * FROM niveles,alumnos WHERE alumnos.nivel=niveles.id and alumnos.id='$id' ";
      $resultado=$conexion->query($query);
         $row = $resultado->fetch_assoc();
        $mat = $row['matricula'];
 
   ?>               
                 <!-- text input -->
                 <label class="labe">Nombre:</label>
                <div class="form-group" class="div">
                  <input type="text" class="" placeholder="" value=" <?php echo $row['nombre'];?>&nbsp;<?php echo $row['apellidoPaterno'];?>&nbsp;&nbsp;<?php echo $row['apellidoMaterno'];?> " size="40" disabled>
                </div>
                
                 <label  class="labe">Matricula:</label>
                <div class="form-group"  class="div">
                  <input type="text" class="" placeholder="" value=" <?php echo  $row['matricula'];  ?>" size="40" disabled>
                </div>
                
                <label>Nivel:</label>
                 <div class="form-group" >
                  <input type="text" class="" placeholder="" value=" <?php echo  $row['descripcion'];  ?>" size="40" disabled>
                </div>
     
              

<br><br>

            
                  <?php
        require('conexion.php');
    
     $id = $_REQUEST['id'];
  
    $query =   " SELECT * FROM recibosalumnos WHERE  recibosalumnos.id='$id' ";
     
      $resultado=$conexion->query($query);
         $row = $resultado->fetch_assoc();
          ?>
             
              <?php
function SignData($text, $privateKeyFile)
{

	$private_cert = $privateKeyFile;

 	$f = fopen($private_cert,"r+");

        if($f)
                $private_key = fread( $f, filesize($private_cert) );
        else
                return "";

        fclose($f);

  
        $private_key = openssl_get_privatekey($private_key);
  
        if(openssl_private_encrypt(md5($text), $crypt_text, $private_key))
        {
		return base64_url_encode($crypt_text);
        }

	return "";
}
//ATAR para generar HASH con llave publica
function SignDataInv($text, $publicKeyFile)
{

	$public_cert = $publicKeyFile;

 	$f = fopen($public_cert,"r+");

        if($f)
                $public_key = fread( $f, filesize($public_cert) );
        else
                return "";

        fclose($f);

        $public_key = openssl_get_publickey($public_key);

        if(openssl_public_encrypt(md5($text), $crypt_text, $public_key))
        {
		return base64_url_encode($crypt_text) . "\n";
        }

	return "";
}

function VerifyData($crypt_text, $plaintext, $publicKeyFile)
{
        $public_cert = $publicKeyFile;

        $s = fopen($public_cert,"r+");

        if($s)
                $public_key = fread( $s, filesize($publicKeyFile));
        else
                return false;

        fclose($s);

        $res = openssl_get_publickey($public_key);


	if(openssl_public_decrypt(base64_url_decode($crypt_text), $decrypt, $res))
        {
		if($decrypt == md5($plaintext))
		   	return true;

		else
			return false;
        }

	return false;
}

function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '-_,');
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_,', '+/='));
}


?>
  <?php
             
             
             
             //EN ESTA SECCION SE GENERA EL HASH CON LA LLAVE PRIVADA------------------------------------------
//echo "-------------------EN ESTA SECCION SE GENERA EL HASH CON LA LLAVE PRIVADA-----------------------<br>";

          
//$cadenaEncriptada =$row['numeroRecibo']."|".$row['concepto']."|".$row['total']."|".$row['conceptoBanco']."|".$row['servicioBanco']."|";
//	echo "CadenaEncriptada:<b>".$cadenaEncriptada."<br></b>";

$cadenaEncriptada =$row['numeroRecibo']."|".$mat." ".$row['concepto']."|".$row['total']."|".$row['conceptoBanco']."|".$row['servicioBanco']."|";
	
		$base64 = SignData($cadenaEncriptada,"./Private_key.pem");
//		echo ">> Base64(RSA(Hash)) = <b>" . $base64 . "<br></b>";

//echo "--------------------------------------------------------------------------------------------------------------------------<br><br><br><br>";

//EN ESTA SECCION SE VERIFICA EL HASH CON LA LLAVE PUBLICA----------------------------------------
//$cadenaEncriptada="cl_folio|cl_referencia|dl_monto|cl_concepto|servicio|"; //PRUEBAS
$cadenaEncriptada =$row['numeroRecibo']."|".$mat." ".$row['concepto']."|".$row['total']."|".$row['conceptoBanco']."|".$row['servicioBanco']."|";

$base64 = $base64; //PRUEBAS

//echo "HASH que nos mandaron: <b>$test <br></b>" ;


//echo "----------------EN ESTA SECCION SE VERIFICA EL HASH CON LA LLAVE PUBLICA-------------------------<br>";
//echo "<p>Verificando datos: </p>";
//echo  "<b>$cadenaEncriptada</b>";
//echo "<p> Base64(RSA(Hash)): $base64  </p>";

//echo  "$cadenaEncriptada";

//	if( VerifyData($base64, $cadenaEncriptada , "./Public_key.pem") )
//		echo "\n<h1>DATOS CORRECTOS :)</h1><br>";
//	else
//		echo "\n<h1>DATOS INCORRECTOS!!!!  :( </h1><br>";
//echo "--------------------------------------------------------------------------------------------------------------------------<br>";
?>




  <form role="form" method="POST" action="https://multipagos.bb.com.mx/Estandar/index2.php" target="popup" onsubmit="window.open('','popup','width=870,height=600,menubar=no, scrollbar=yes, directories=no')">
    
      <h4 class="box-title" style=" margin-left:50px">Descripción </h4>
     
 
       <table border="0" cellpadding="0" cellspacing="0" >
<TR><TD><label>Folio:</label><TD style=" margin-left:30px;height:40px; width:200px"><input  name="cl_folio" readonly  size="33" id="cl_folio" type="text" value="<?php echo $row['numeroRecibo']; ?>"> </TD>
	</TR>            
           
<TR><TD> <label>Referencia:</label></TD><TD style=" margin-left:30px;height:40px; width:200px"><input name="cl_referencia" readonly size="33"  type="text" value="<?php  echo $mat . " " . $row['concepto']; ?>" > </TD>
	</TR>           
           
<TR><TD><label>Monto a pagar:</label></TD><TD style=" margin-left:30px;height:40px; width:200px"><input name="dl_monto" readonly size="33" size="100" type="text" value="<?php echo $row['total']; ?>"> </TD>
	</TR>
           
	<TR><TD></TD><TD> <input name="cl_concepto" size="50" type="hidden" value="<?php echo $row['conceptoBanco']; ?>"> <br></TD>
	</TR>
	<TR><TD></TD><TD> <input name="servicio" size="50" type="hidden" value="<?php echo $row['servicioBanco']; ?>" ></TD>
	</TR>
		<TR><TD></TD><TD> <input name="hash" type="hidden" size="500" value="<?php echo $base64; ?>"></TD>
	</TR>
</table>
       
 
       <input type="submit" class="btn btn-primary btn-flat" value="Pagar" style="color:#FFFFFF; margin-left:30px;height:30px; width:200px">
 <!--?php
// echo "recibo:" . $row['numeroRecibo'] . "<br>" ; 
// echo "referencia:" . $row['concepto'] . "<br>";
// echo "monto:" . $row['total'] . "<br>" ;
// echo "concepto:" . $row['conceptoBanco'] . "<br>" ;
// echo "servicio:" . $row['servicioBanco'] . "<br>" ;
// echo "firma :" . $base64;
      ?>-->
  </form>
    
<br>
<br>
     
            </div>
            <!-- / hidden -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Sistema de Administración Escolar</b> v1.0.0
    </div>
    <strong>Desarrollado por:<a href="https://informaticasoluciones.com"> INFORMÁTICA SOLUCIONES DE MÉXICO</a></strong> 
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
