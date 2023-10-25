<?php
require 'vendor/autoload.php';
include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verifica si el correo y el DNI son únicos
    $query = "SELECT * FROM usuarios_registro WHERE email = '$email'";
    $result = mysqli_query($conexion, $query);


    if (mysqli_num_rows($result) > 0) {
        // El correo o el DNI ya existen en la base de datos
        // Puedes redirigir al usuario de nuevo al formulario de registro o mostrar un mensaje de error
        header("Location: register.php?error=duplicado");
        exit();
    } else {
        // Los datos son únicos, procede a insertar en la base de datos
        $query = "INSERT INTO usuarios_registro (nombre, apellido, dni, email, password) VALUES ('$nombre', '$apellido', '$dni', '$email', '$password')";
        if (mysqli_query($conexion, $query)) {
            $codigo_confirmacion = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $query = "UPDATE usuarios_registro SET codigo_confirmacion = '$codigo_confirmacion', activo = 0 WHERE email = '$email'";
            mysqli_query($conexion, $query);

            // Envía un correo de confirmación al usuario
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'drploretoinformatica@gmail.com';
            $mail->Password = 'nodi gvpa slag yydn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('tu_correo_electronico', 'Nombre de tu empresa');
            $mail->addAddress($email, $nombre);

            $mail->isHTML(true);
            $mail->Subject = 'Código de Confirmación';
            $mail->Body = '<html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="content-type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0;">
                <meta name="format-detection" content="telephone=no"/>
            
                <style>
                /* Reset styles */ 
                body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                #outlook a { padding: 0; }
                .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
            
                /* Rounded corners for advanced mail clients only */ 
                @media all and (min-width: 560px) {
                    .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
                }
            
                /* Set color for auto links (addresses, dates, etc.) */ 
                a, a:hover {
                    color: #127DB3;
                }
                .footer a, .footer a:hover {
                    color: #999999;
                }
            
                </style>
            
                <!-- MESSAGE SUBJECT -->
                <title>Ingresa a tu cuenta con tu código de seguridad</title>
            
            </head>
            
            <!-- BODY -->
            <!-- Set message background color (twice) and text color (twice) -->
            <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                background-color: #F0F0F0;
                color: #000000;"
                bgcolor="#F0F0F0"
                text="#000000">
            
            <!-- SECTION / BACKGROUND -->
            <!-- Set message background color one again -->
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                bgcolor="#F0F0F0">
            
            <!-- WRAPPER -->
            <!-- Set wrapper width (twice) -->
            <table border="0" cellpadding="0" cellspacing="0" align="center"
                width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                max-width: 560px;" class="wrapper">
            
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                        padding-top: 20px;
                        padding-bottom: 20px;">
            
                        <!-- PREHEADER -->
                        <!-- Set text color to background color -->
                        <div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                        color: #F0F0F0;" class="preheader">
                            Codigo de confirmación de correo</div>
            
                        <!-- LOGO -->
                        <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2. URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content=logo&utm_campaign={{Campaign-Name}} -->
                       
            
            <!-- End of WRAPPER -->
            </table>
            
            <!-- WRAPPER / CONTEINER -->
            <!-- Set conteiner background color -->
            <table border="0" cellpadding="0" cellspacing="0" align="center"
                bgcolor="#FFFFFF"
                width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                max-width: 560px;" class="container">
            
                <!-- HEADER -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                        padding-top: 25px;
                        color: #000000;
                        font-family: sans-serif;" class="header">
                            Ingresa a tu cuenta con tu código de seguridad
                    </td>
                </tr>
                
                <!-- SUBHEADER -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
                        padding-top: 5px;
                        color: #000000;
                        font-family: sans-serif;" class="subheader">
                    </td>
                </tr>
            
                <!-- HERO IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including "auto"). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                 <tr>
        <td
          align="center"
          valign="top"
          style="
            border-collapse: collapse;
            border-spacing: 0;
            margin: 0;
            padding: 0;
            padding-top: 20px;
          "
          class="hero"
        >
        <a target="_blank" style="text-decoration: none" href="">
    <img
        border="0"
        vspace="0"
        hspace="0"
        src="https://scontent.flim6-4.fna.fbcdn.net/v/t39.30808-6/322577155_1023019031991907_4560430919675408798_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=1xwn1yD7aC4AX8gLMU5&_nc_ht=scontent.flim6-4.fna&oh=00_AfBZl39_lTVWYZnGMrDQXfS5TYVV3PkjeqGTxXmM1ae6QA&oe=653E0F6B"
        width="300"
        style="
            max-width: 400px;
            border-radius: 100%; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: block;
            border: 5px solid transparent;
            transition: transform 0.3s ease;
        "
    />
</a>

<style>
    img:hover {
        transform: scale(1.1);
        cursor: pointer;
    }
</style>
        </td>
      </tr>                       
                <!-- PARAGRAPH -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                <tr>
                    <td align="center" valign:top style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                        padding-top: 25px; 
                        color: #000000;
                        font-family: sans-serif;" class="paragraph">
                            Gracias por registrarte&nbsp;' . $nombre . ' ' . $apellido . ', se te envio un correo a:
                            ' . $email . ', para verificar el correo, se necesitas&nbsp;que&nbsp;ingreses&nbsp;el codigo&nbsp;&nbsp;de confirmacion&nbsp;a continuacion:
                    </td>
                </tr>
            
                <!-- BUTTON -->
                <!-- Set button background color at TD, link/text color at A and TD, font family ("sans-serif" or "Georgia, serif") at TD. For verification codes add "letter-spacing: 5px;". Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                        padding-top: 25px;
                        padding-bottom: 5px;" class="button"><a
                        href="" target="_blank" style="text-decoration: underline;">
                            <table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
                            bgcolor="#E9703E"><a target="_blank" style="text-decoration: underline;
                            color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
                            href="">
                                ' . $codigo_confirmacion . '</a>
                    </td></tr></table></a>
                </td>
            </tr>
            
            <!-- LINE -->
            <!-- Set line color -->
            <tr>    
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 25px;" class="line"><hr
                    color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
                </td>
            </tr>
            
            <!-- PARAGRAPH -->
            <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                    padding-top: 20px;
                    padding-bottom: 25px;
                    color: #000000;
                    font-family: sans-serif;" class="paragraph">
                        Ten en cuenta que&nbsp;vence en 30 minutos.<a href="mailto:support@ourteam.com" target="_blank" style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;"></a>
                </td>
            </tr>
            
            <!-- End of WRAPPER -->
            </table>
            
            <!-- WRAPPER -->
            <!-- Set wrapper width (twice) -->
            <table border="0" cellpadding="0" cellspacing="0" align="center"
                width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                max-width: 560px;" class="wrapper">
            
                <!-- SOCIAL NETWORKS -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                        padding-top: 25px;" class="social-icons"><table
                        width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                        <tr>
            
                            <!-- ICON 1 -->
                            <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                                href="https://raw.githubusercontent.com/konsav/email-templates/"
                            style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                                color: #000000;"
                                alt="F" title="Facebook"
                                width="44" height="44"
                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>
            
                            <!-- ICON 2 -->
                            <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                                href="https://raw.githubusercontent.com/konsav/email-templates/"
                            style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                                color: #000000;"
                                alt="T" title="Twitter"
                                width="44" height="44"
                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>                
            
                            <!-- ICON 3 -->
                            <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                                href="https://raw.githubusercontent.com/konsav/email-templates/"
                            style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                                color: #000000;"
                                alt="G" title "Google Plus"
                                width="44" height="44"
                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>        
            
                            <!-- ICON 4 -->
                            <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                                href="https://raw.githubusercontent.com/konsav/email-templates/"
                            style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                                color: #000000;"
                                alt="I" title="Instagram"
                                width="44" height="44"
                                src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>
            
                        </tr>
                        </table>
                    </td>
                </tr>
            
                <!-- FOOTER -->
                <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; padding-top: 20px; padding-bottom: 20px;" class="footer">
                    <p style="margin: 0; padding: 0; color: #000000; font-size: 12px; font-weight: 400; line-height: 120%; font-family: sans-serif;" class="paragraph">
                    </p>
                </td>
            </tr>
            
            <!-- End of WRAPPER -->
            </table>
            
            <!-- End of SECTION / BACKGROUND -->
            </td></tr></table>
            
            </body>
            </html>';

            if ($mail->send()) {
                header("Location: verificar_usuario.php");
                exit();
            } else {
                header("Location: register.php?error=correo");
                exit();
            }
        }
    }
}
