<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/botonera.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->


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


    <script src="./js/sweetalert.min.js"></script>
    <title>Listado incidencias</title>
</head>

<body>
    <?php include_once "databaseManager.inc.php"; ?>
    <nav class="navbar navbar-expand-sm navbar-light bg-success">
        <div id="logo" class="logo-left has-light-logo has-dark-logo clearfix">
            <a href="https://iespoligonosur.org">
                <img class="standard" src="https://iespoligonosur.org/www/wp-content/uploads/2020/07/cropped-IespsurLogov3.png" alt="IES Polígono Sur" width="285" height="60">


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
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="page-heading  clearfix asset-bg none">
        <div class="container">

            <h1>Portal de incidencias</h1>

        </div>

        <div id="breadcrumbs">

            <a title="Ver página instituto" href="https://iespoligonosur.org" class="home">Página principal</a>

        </div>

        <div id="breadcrumbs">

            <a title="ver listado incidencias." href="listadoIncidenciasView.php" class="home">Listado de incidencias</a>
        </div>

        <div id="breadcrumbs">

            <a title="ver listado incidencias." href="crearIncidencias.php" class="home">Crear incidencia</a>


        </div>


    </div>





    <div class="row g-5 ml-2">

        <table class="styled-table col-xs-11 ml-2" border="1">
            <h2>Usuarios dados de alta en el sistema</h2>
            <thead>
                <tr>

                    <th>id</th>
                    <th>nombre</th>
                    <th>mail</th>
                    <th>modificar</th>
                    <th>eliminar</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $datos = obtenerUsuarios();
                $mensaje="modificar";
                $elimina="eliminar";
                for ($i = 0; $i < count($datos); $i++) {
                    echo "<tr><td>" . $datos[$i]["id"] . "</td> <td>" . $datos[$i]["nombre"] . "</td>  <td>" . $datos[$i]["mail"] . "</td> 
                    <td> <a href='modificarUsuario.php?variableId=".$datos[$i]["id"]."'>" . $mensaje. "</a></td>
                    <td> <a href='eliminarUsuario.php?variableId=".$datos[$i]["id"]."'>" . $elimina. "</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <br>
    <section id="footer" class="footer-divider bg-secondary">
        <div class="container">
            <div id="footer-widgets" class="row clearfix">

                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <section id="text-2" class="widget widget_text clearfix">
                            <div class="widget-heading clearfix">
                                <h6>Estamos en…</h6>
                            </div>
                            <div class="textwidget">C/Esclava del Señor 2 · 41013 · Sevilla<br>
                                Telf: +34 955 622 844<br>
                                Fax: +34 955 622 845<br>
                                Correo: info@iespoligonosur.org<br>


                                <br>

                                <p><img class="alignnone wp-image-5415 size-full" src="https://iespoligonosur.org/www/wp-content/uploads/2021/06/sellosweb.png" alt="" width="1024" height="125">

                                </p>


                                <section class="fw-row asset-bg ">
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="spb_gmaps_widget spb_content_element 150px">
                                                <div class="spb_wrapper">
                                                    <div class="spb_map_wrapper">
                                                        <div class="map-canvas" style="width:100%;height:100px;" data-address="Esclava del señor 2 41013 sevilla" data-zoom="14" data-maptype="roadmap" data-mapcolor="" data-mapsaturation="mono" data-pinimage="" data-pinlink=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="container">
                                    <div class="row">
                                        <div class="spb_content_element col-sm-12 spb_text_column">
                                            <div class="spb_wrapper clearfix">

                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
    </section>
    </div>

    <section class="fw-row asset-bg ">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="spb_gmaps_widget spb_content_element 150px">
                    <div class="spb_wrapper">
                        <div class="spb_map_wrapper">
                            <div class="map-canvas" style="width:100%;height:100px;" data-address="Esclava del señor 2 41013 sevilla" data-zoom="14" data-maptype="roadmap" data-mapcolor="" data-mapsaturation="mono" data-pinimage="" data-pinlink=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="spb_content_element col-sm-12 spb_text_column">
                <div class="spb_wrapper clearfix">

                </div>
            </div>
        </div>
    </section>
    </div>
    </section>
</body>

</html>