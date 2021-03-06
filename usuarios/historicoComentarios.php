<!DOCTYPE html>
<html lang="en">

<?php

include "../archivos_generales/databaseManager.inc.php";


@session_start();
use PHPMailer\PHPMailer\PHPMailer;


function enviaMensaje($remitente, $password, $destinatario, $asunto)
{
 

    $mail = new PHPMailer();

    $body = $_POST["titulo"];

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->From = $remitente;
    $mail->FromName = "User";
    $mail->Username   = $remitente;
    $mail->Password   = $password;
    $mail->SetFrom($remitente);

    $mail->AddReplyTo($destinatario);
    $mail->Subject    =  $asunto;


    $mail->MsgHTML($body);
    $mail->IsHTML(true);


    $mail->AddAddress('jesus.gonzalez.munoz.al@iespoligonosur.org');
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}

if (count($_GET) > 0) {
  $id_inc = $_GET["varId"];
 $comentario=obtenerComentarioxIncidencia($id_inc);
 $incidencia=obtenerIncidencia($id_inc);

} else {
  $id_inc = $_POST["id_inc"];
 
  $comentario = obtenerComentarioxIncidencia($id_inc);
}
$error = '';
if (count($_POST) > 0) {
  function seguro($valor)
  {
      $valor = strip_tags($valor);
      $valor = stripslashes($valor);
      $valor = htmlspecialchars($valor);
      return $valor;
  }


  $cumplido = editarComentario($_POST["id"],  $_POST["mensaje"], $_POST["id_inc"], date("Y-m-d"), $_SESSION["id"]);
 
  if ($cumplido == true) {
    $user = obtenerUsuarioxId($incidencia["id_usuario"]);
    foreach ($user as $fila) {
        enviaMensaje($fila["nombre"], $fila['password'], $fila['mail'], "Modificada la incidencia: " . $id . " con fecha " .date("Y-m-d"));
    }
      header("logadosView.php");
      
  } else {
      $error = "Datos incorrectos o no se ha actualizado nada";
  }
}






?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>

  <link rel='stylesheet' id='layerslider-css' href='https://iespoligonosur.org/www/wp-content/plugins/LayerSlider/static/layerslider/css/layerslider.css?ver=6.7.6' type='text/css' media='all' />
  <link rel='stylesheet' id='ls-google-fonts-css' href='https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
  <link rel='stylesheet' id='wp-block-library-css' href='https://iespoligonosur.org/www/wp-includes/css/dist/block-library/style.min.css?ver=5.4.10' type='text/css' media='all' />
  <link rel='stylesheet' id='contact-form-7-css' href='https://iespoligonosur.org/www/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.2' type='text/css' media='all' />
  <link rel='stylesheet' id='rs-plugin-settings-css' href='https://iespoligonosur.org/www/wp-content/plugins/revslider/public/assets/css/rs6.css?ver=6.2.12' type='text/css' media='all' />
  <style id='rs-plugin-settings-inline-css' type='text/css'>

  </style>
  <link rel='stylesheet' id='bookly-ladda.min.css-css' href='https://iespoligonosur.org/www/wp-content/plugins/bookly-responsive-appointment-booking-tool/frontend/resources/css/ladda.min.css?ver=20.6' type='text/css' media='all' />
  <link rel='stylesheet' id='bookly-picker.classic.css-css' href='https://iespoligonosur.org/www/wp-content/plugins/bookly-responsive-appointment-booking-tool/frontend/resources/css/picker.classic.css?ver=20.6' type='text/css' media='all' />
  <link rel='stylesheet' id='bookly-picker.classic.date.css-css' href='https://iespoligonosur.org/www/wp-content/plugins/bookly-responsive-appointment-booking-tool/frontend/resources/css/picker.classic.date.css?ver=20.6' type='text/css' media='all' />
  <link rel='stylesheet' id='bookly-intlTelInput.css-css' href='https://iespoligonosur.org/www/wp-content/plugins/bookly-responsive-appointment-booking-tool/frontend/resources/css/intlTelInput.css?ver=20.6' type='text/css' media='all' />
  <link rel='stylesheet' id='bookly-bookly-main.css-css' href='https://iespoligonosur.org/www/wp-content/plugins/bookly-responsive-appointment-booking-tool/frontend/resources/css/bookly-main.css?ver=20.6' type='text/css' media='all' />
  <link rel='stylesheet' id='mc4wp-form-themes-css' href='https://iespoligonosur.org/www/wp-content/plugins/mailchimp-for-wp/assets/css/form-themes.css?ver=4.8.7' type='text/css' media='all' />
  <link rel='stylesheet' id='dante-google-fonts-css' href='https://fonts.googleapis.com/css?family=Actor:400&#038;subset=latin' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-css' href='https://iespoligonosur.org/www/wp-content/themes/dante/css/bootstrap.min.css' type='text/css' media='all' />
  <link rel='stylesheet' id='font-awesome-v5-css' href='https://iespoligonosur.org/www/wp-content/themes/dante/css/font-awesome.min.css?ver=5.10.1' type='text/css' media='all' />
  <link rel='stylesheet' id='font-awesome-v4shims-css' href='https://iespoligonosur.org/www/wp-content/themes/dante/css/v4-shims.min.css' type='text/css' media='all' />
  <link rel='stylesheet' id='ssgizmo-css' href='https://iespoligonosur.org/www/wp-content/themes/dante/css/ss-gizmo.css' type='text/css' media='all' />
  <link rel='stylesheet' id='sf-main-css' href='https://iespoligonosur.org/www/wp-content/themes/dante-child/style.css' type='text/css' media='all' />
  <link rel='stylesheet' id='sf-responsive-css' href='https://iespoligonosur.org/www/wp-content/themes/dante/css/responsive.css' type='text/css' media='all' />
  <script src="./js/sweetalert.min.js"></script>
  <title>Portal de incidencias</title>

  <style>
    .row g-5 {
      margin-left: 2px;
    }


    h2 {
      font-family: sans-serif;
    }

    .frame {
      font-family: sans-serif;
      margin-right: 3rem;
    }

    .form-group {
      margin-bottom: 1rem;
      margin-left: 1rem;
    }

    h1 {
      text-align: left;
    }

    #main {
      margin-right: auto;
    }
  </style>
</head>

<body>



  <nav class="navbar navbar-expand-sm navbar-light bg-success">
    <div id="logo" class="logo-left has-light-logo has-dark-logo clearfix">
      <a href="https://iespoligonosur.org">
        <img class="standard" src="https://iespoligonosur.org/www/wp-content/uploads/2020/07/cropped-IespsurLogov3.png" alt="IES Pol??gono Sur" width="285" height="60">


        <a href="#" class="visible-sm visible-xs mobile-menu-show"><i class="ss-rows"></i></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Oferta<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            El centro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">El Centro</a>
            <a class="dropdown-item" href="#">Oferta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Contacto</a>
          </div>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <section>
    <div class="page-heading  clearfix asset-bg none">
      <div class="container">

        <h1>Portal de incidencias</h1>

      </div>

      <div id="breadcrumbs">
                <a title="cerrar sesion." href="../archivos_generales/cerrarSesion.php" class="home">Cerrar sesion</a>
            </div>

            <div id="breadcrumbs">

                <a title="ver listado incidencias." href="../archivos_generales/crearIncidencias.php" class="home">Crear incidencia</a>
            </div>

      <div id="breadcrumbs">

        <a title="ver listado incidencias." href="logadosView.php" class="home">Volver a tu perfil</a>

      </div>

    </div>
    </div>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last " id="frame">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-success">NOVEDADES</span>

        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <a class="my-0">Abierto el plazo de becas del curso 2022/23</a>
              <p> 18 de Abril de 2022</p>
            </div>

          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <a class="my-0">CAMPA??A DONACI??N DE SANGRE</a>
              <p class="text-muted">20 de marzo 2022</p>
            </div>

          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <a class="my-0">celebraci??n del d??a de Andaluc??a en nuestro centro</a>
              <p class="text-muted">1 de marzo 2022</p>
            </div>

          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <a class="my-0">Empiezan las jornadas laborales</a>
              <p class="text-muted">15 de diciembre de 2021</p>
            </div>

          </li>

        </ul>
      </div>
      <div class=" col-md-7 col-lg-8">

        <h2 class="dc-mega">Modifica los comentarios de la incidencia <?php echo $id_inc ?> </h2>
    <?php
       echo "<h3>TUS COMENTARIOS</h3>";
       $lista = obtenerComentarioxIncidencia($id_inc);

       echo "<table class='container-fluid '>";
       echo "<th>", "contenido", "</th>";
       echo "<th>", "n?? incidencia", "</th>";
       echo "<th>", "Fecha de creaci??n", "</th>";
       echo "<th>", "modificar", "</th>";

       
       foreach ($lista as $fila) {
            
        echo "<tr class='mr-2 ml-2'>";

        echo "<td class='mr-2 ml-2'>";

        

        echo $fila['contenido'];

        echo "</td>";

        echo "<td>";

        echo $fila['id_incidencia'];

        echo "</td>";


        echo "<td>";

        echo $fila['fecha_modificacion'];

        echo "</td>";
        echo "<td>";

        echo "<a type='button' class='btn btn-success  btn-md btn-outline-light' href='modificaComentario.php?variableId=" . $fila['id']. "'>" . "modificar" . "</a></td>";

        echo "</td>";
      echo "</tr>";
    }  
        echo "</table>";
     
        ?>
      
       <?php
       
      

    ?>
     
      </div>


  </section>
  <br>

  
  </div>


  </div>
  </div>

  <!--// CLOSE #footer //-->
  </section>



</body>

</html>