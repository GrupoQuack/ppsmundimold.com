<?php
//$correos='jramirez@geoygeo.com.mx,amedina@geoygeo.com.mx,vvazquez@geoygeo.com.mx, info@geoygeo.com.mx, noelbasurto9@gmail.com,basurtoomar@gmail.com';
$correos='basurtoomar@gmail.com';
$pagina = $_POST['pag'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$tel = $_POST['telefono'];
$mensaje = $_POST['mensajes'];
$thank="http://ppsmundimold.com.mx/gracias.html";

if(is_null($nombre) || $nombre == ""){
	echo "El parametro nombre va vacio" ;
}elseif(is_null($tel) || $tel == ""){
	echo "El parametro telefono va vacio" ;
}elseif (is_null($correo) || $correo == "") {
	echo "El parametro correo va vacio";
}elseif(is_null($mensaje) || $mensaje == "") {
	echo "El parametro mensaje va vacio";
}
else
{

	$message = '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<!-- Edit the code below this line -->

<body>
    <table valign="top" class="bg-light body" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; margin: 0; padding: 0; border: 0;"
        bgcolor="#f8f9fa">
        <tbody>
            <tr>
                <td valign="top" style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#f8f9fa">
                    <table class="container" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; width: 100%;">
                        <tbody>
                            <tr>
                                <td align="center" style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                                    <!--[if (gte mso 9)|(IE)]>
          <table align="center">
            <tbody>
              <tr>
                <td width="600">
        <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; width: 100%; max-width: 600px; margin: 0 auto;">
                                        <tbody>
                                            <tr>
                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; margin: 0;" align="left">

                                                    <table class="mx-auto" align="center" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; margin: 0 auto;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; margin: 0;" align="left">


                                                                    <img class="  " src="http://ppsmundimold.com.mx/img/logo.png" style="height: auto; line-height: 100%; outline: none; text-decoration: none; border: 0 none;">
                                                                    <table class="s-3 w-100" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="16" style="border-spacing: 0px; border-collapse: collapse; line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left">

                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>


                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                    <table class="card " border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: separate !important; border-radius: 4px; width: 100%; overflow: hidden; border: 1px solid #dee2e6;"
                                                        bgcolor="#ffffff">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">
                                                                    <div style="border-top-width: 5px; border-top-color: #F49102; border-top-style: solid;">
                                                                        <table class="card-body" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; width: 100%;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 20px;" align="left">
                                                                                        <div>
                                                                                            <h4 class="text-center" style="margin-top: 0; margin-bottom: 0; font-weight: 500; color: inherit; vertical-align: baseline; font-size: 24px; line-height: 28.8px;" align="center">Buen dia tienes un correo electrónico de</h4>
                                                                                            <h5 class="text-muted text-center" style="margin-top: 0; margin-bottom: 0; font-weight: 500; color: #636c72; vertical-align: baseline; font-size: 20px; line-height: 24px;" align="center">'.$pagina.'</h5>

                                                                                            <div class="hr " style="width: 100%; margin: 20px 0; border: 0;">
                                                                                                <table border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; width: 100%;">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #dddddd; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>


                                                                                            <h5 class="text-center" style="margin-top: 0; margin-bottom: 0; font-weight: 500; color: inherit; vertical-align: baseline; font-size: 20px; line-height: 24px;" align="center"><strong>Detalles</strong></h5>
                                                                                            <table class="table" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; width: 100%; max-width: 100%;" bgcolor="#ffffff">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" align="left" valign="top">Nombre</td>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" class="text-right" align="right" valign="top">'.$nombre.'</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" align="left" valign="top">Correo</td>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" class="text-right" align="right" valign="top">'.$correo.'</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" align="left" valign="top">Telefono</td>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" class="text-right" align="right" valign="top">'.$tel.'</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" align="left" valign="top">Mensaje</td>
                                                                                                        <td style="border-top-width: 0; border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-color: #e9ecef; border-top-style: solid; margin: 0; padding: 12px;" class="text-right" align="right" valign="top">'.$mensaje.'</td>
                                                                                                    </tr>

                                                                                                </tbody>
                                                                                            </table>

                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="s-4 w-100" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="24" style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left">

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>





                                                    <table class="table-unstyled text-muted " border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse; width: 100%; max-width: 100%; color: #636c72;"
                                                        bgcolor="transparent">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">© ppsmundimold</td>
                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">
                                                                    <table class="float-right" align="right" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">
                                                                                    <table class="pl-2" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; padding-left: 8px; margin: 0;" align="left">
                                                                                                    <img class=" " width="20" height="20" src="https://s3.amazonaws.com/lyft.zimride.com/images/emails/social/v2/facebook@2x.png" style="height: auto; line-height: 100%; outline: none; text-decoration: none; border: 0 none;">
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>

                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="float-right" align="right" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">
                                                                                    <table class="pl-2" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; padding-left: 8px; margin: 0;" align="left">
                                                                                                    <img class=" " width="20" height="20" src="https://s3.amazonaws.com/lyft.zimride.com/images/emails/social/v2/twitter@2x.png" style="height: auto; line-height: 100%; outline: none; text-decoration: none; border: 0 none;">
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>

                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="float-right" align="right" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica, Arial, sans-serif; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0px; border-collapse: collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">
                                                                                    <img class="" width="20" height="20" src="https://s3.amazonaws.com/lyft.zimride.com/images/emails/social/v2/instagram@2x.png" style="height: auto; line-height: 100%; outline: none; text-decoration: none; border: 0 none;">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">Vallarta 40, Tlalnepantla centro , </td>
                                                                <td class="text-right" style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="right">Redes Sociales</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="left">Tlalnepantla, Estado de México CP 54000</td>
                                                                <td class="text-right" style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 16px; border-top-width: 0; border-bottom-width: 0; margin: 0;" align="right"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="s-4 w-100" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="24" style="border-spacing: 0px; border-collapse: collapse; line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left">

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>




                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
            </tbody>
          </table>
        <![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
	';

	//para el envío en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

	//dirección del remitente 
	$headers .= "From: ppsmundimold  <info@ppsmundimold.com> \r\n"; 

	mail($correos,'formulario',$message, $headers);
    //alert('Mensaje enviado');
	Header ("Location: $thank");
	  
}



?> 