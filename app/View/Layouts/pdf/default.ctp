<?php
/**
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

/**
 * @var $this View
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Configure::read( 'App.name' ); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="rights" content="">
    <meta name="language" content="es-ES">
    <meta name="title" content="CETRAM - UTN Santa Fe">
    <title>CETRAM- UTN Santa Fe</title>
    <link rel="shortcut icon" href="http://extranet.frsf.utn.edu.ar/favicon.ico">

    <?= $this->fetch( 'meta' ); ?>
    <?= $this->Html->css('pdf', ['fullBase' => true]); ?>

    <?= $this->fetch( 'css' ); ?>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <h3>
                    <?php echo $this->Html->image('cetram/cetram-50.png') ?>
            </h3>

        </div>
        <div id="topbar-menu" class="collapse navbar-collapse">
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<BR/><BR/><BR/>
<div class="container">
    <?= $this->fetch( 'content' ); ?>
</div>

<BR/>
<footer class="footer pie">

    <div class="container" style="text-align: center; background-color: #ffffff;">

        <hr class="style14"/>
        <BR/>

            <?php echo $this->Html->image('cetram/utn-santafe-75.png', array('alt' => 'UTN-FRSF')) ?>


        <p>Proyecto: Herramienta para la Determinación de
            los Costos de Sistemas de Transporte Público de
            Pasajeros en Ciudades de Tamaño Medio.</p>
        <p class="text-muted">Equipo: Ing. Mec. Fernando Imaz / Ing. Civ. Juan Jaurena / Ing. Sis. Matías Rovere / Ing. Ind. Melisa Batistela / Duilio Abdala</p>
        <p class="text-muted">Copyright © 2017. Todos los derechos reservados.</p>

    </div>
</footer>
</body>
</html>