<?php
 require('conexion.php');
    
    $folio = $_POST["cl_folio"];
    $concepto = $_POST["t_concepto"];
    $referencia = $_POST["cl_referencia"];
    $fechapago = $_POST["dt_fechaPago"];
    $nlstatus = $_POST["nl_status"];
    $tipopago = $_POST["nl_tipoPago"];
    $monto = $_POST["dl_monto"];
    $Hash = $_POST["hash"];
   
    $status1="PAGADO";
   
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

//comenta	if (empty($Hash)||empty($folio)||empty($referencia)||empty($monto)||empty($fechapago)||empty($tipopago)||empty($nlstatus)) 
//comenta			{
//comenta echo"<script type=\"text/javascript\">alert('Faltan par&aacute;metros. Favor de intentarlo nuevamente [------Hash[".$Hash."]-Folio[".$folio."]-Referencia[".$referencia."]-Monto[".$monto."]-FechaPago[".$fechapago."]-TipoPago[".$tipopago."]-status[".$nlstatus."]---]'); window.location='https://mogaaneducation.net/fechasdepago.php';</script>";
	
//echo ("Faltan par&aacute;metros. Favor de intentarlo nuevamente");
			
//	echo("[------Hash[".$Hash."]-Folio[".$folio."]-Referencia[".$referencia."]-Monto[".$monto."]-FechaPago[".$fechapago."]-TipoPago[".$tipopago."]-status[".$nlstatus."]---]");
//comenta	exit(0);
//comenta			}
//comenta			else
//comenta			{
	  //$plaintext =$_POST["cl_folio"]."|".$_POST["t_concepto"]."|".$_POST["cl_referencia"]."|".$_POST["dt_fechaPago"]."|".$_POST["nl_status"]."|".$_POST["nl_tipoPago"]."|".$_POST["dl_monto"]."|";
	  
	   $plaintext =$_POST["cl_folio"]."|".$_POST["cl_referencia"]."|".$_POST["dl_monto"]."|".$_POST["dt_fechaPago"]."|".$_POST["nl_tipoPago"]."|".$_POST["nl_status"]."|";
			    
				
		if(VerifyData($Hash,$plaintext,"./public_key.pem") ) 
				{
		
//	echo"<script type=\"text/javascript\">alert('Pago realizado correctamente'); window.location='https://mogaaneducation.net/fechasdepago.php';</script>"; 	    
            //  echo "datos validos";
		//		$hora= date("H:i:s");   
			//	$status1="PAGADO";
		//recibosalumnos.status<>'PAGADO' and recibosalumnos.referencia='$referencia' ORDER BY recibosalumnos.numeroRecibo ASC LIMIT 1
			
 $queryi="UPDATE recibosalumnos SET status = '$status1',fechaPagoRecibo= '$fechapago', tipoPagoRecibo = '$tipopago',statusPagoRecibo = '$nlstatus' WHERE recibosalumnos.numeroRecibo='$Folio'";
	$resultado = $conexion->query($queryi);
				 if($resultado){
	 echo"<script type=\"text/javascript\">alert('Pago realizado correctamente'); window.location='https://mogaaneducation.net/fechasdepago.php';</script>"; 	
				    //header("location:https://mogaaneducation.net/fechasdepago.php");
				    //echo "<script type=\"text/javascript\">alert('Pago realizado correctamente');</script>";
				 }else{
     //echo"<script type=\"text/javascript\">alert('Error al recibir los datos en el sistema web'); window.location='https://mogaaneducation.net/fechasdepago.php';</script>"; 
     //	echo "<script type=\"text/javascript\">alert('Error al recibir los datos en el sistema web');</script>";
			 }
	
				}		
				else
				{
//	echo"<script type=\"text/javascript\">alert('Error al recibir los datos en el sistema web'); window.location='https://mogaaneducation.net/fechasdepago.php';</script>";
	//echo "<script type=\"text/javascript\">alert('Error al recibir los datos en el sistema web');</script>";
				//echo("Datos Invalidos");
				//echo "<script type=\"text/javascript\">alert('Error al recibir los datos en el sistema web');</script>";
				    
				 echo"<script type=\"text/javascript\">alert('Error al recibir los datos en el sistema web'); window.location='https://mogaaneducation.net/fechasdepago.php';</script>"; 	
				}
//comenta			}
				

?>
