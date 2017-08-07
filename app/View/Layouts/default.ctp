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

    <?= $this->Html->css( [
        'bootstrap.min',
        'fonts', 
        '/plugins/font-awesome-4.7.0/css/font-awesome.min',
        'app-styles',
        'custom-styles',
        '/plugins/selectize.js/dist/css/selectize.bootstrap3',
        
        
        '/plugins/DataTables-1.10.7/media/css/jquery.dataTables.min',
        '/plugins/DataTables-1.10.7/media/css/jquery.dataTables_themeroller',
        '/plugins/DataTables-1.10.7/extensions/TableTools/css/dataTables.tableTools',
        
        
    ] ); ?> 
    <?= $this->fetch( 'css' ); ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topbar-menu">
                <span class="sr-only">Abrir/cerrar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->Html->url('http://extranet.frsf.utn.edu.ar/CETRAM'); ?>">
                <h3>
                    <?php echo $this->Html->image('cetram/cetram-50.png', array('alt' => 'CETRAM', 'style' => 'margin-top:5px')) ?>
                </h3>
            </a>
        </div>

        <div id="topbar-menu" class="collapse navbar-collapse">
            <?= $this->fetch('menu') ?>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    <?= $this->Session->flash( 'flash', ['element' => 'flash'] ); ?>
    <?= $this->Session->flash( 'auth', ['element' => 'flash'] ); ?>

    <?= $this->fetch( 'content' ); ?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= $this->Html->url('/js/jquery-1.11.1.min.js') ?>"><\/script>')</script>

<?= $this->Html->script( ['bootstrap.min', 'plugins', 'highcharts', 'exporting', 'dark-unica'] ); ?>

<?= $this->Html->script( [
    '/plugins/selectize.js/dist/js/standalone/selectize.min',
    '/plugins/jquery.inputmask-3.x/dist/jquery.inputmask.bundle.min',
] ) ?>


<?= $this->Html->script( [
//    '/plugins/DataTables-1.10.7/media/js/jquery',
//    '/plugins/DataTables-1.10.7/media/js/jquery.dataTables.min',
    '/plugins/DataTables-1.10.7/media/js/jquery.dataTables',
    '/plugins/DataTables-1.10.7/extensions/TableTools/js/dataTables.tableTools',
] ) ?>


<?= $this->fetch( 'script' ); ?>

<script type="text/javascript">
    (function ($) {
        $(function () {
            $('body').on("keyup", "[data-provider='nombre']", function () {
                $("[data-consumer='nombre']").text($(this).val())
            });
            $("[data-inputmask]").inputmask();
        })
    })(jQuery)
</script>
<?= null //$this->element( 'sql_dump' ); ?>


<footer class="footer pie">

    <div class="container" style="text-align: center; background-color: #ffffff;">

        <hr class="style14" />

        <a href="<?php echo $this->Html->url('http://www.frsf.utn.edu.ar/'); ?>">
                <?php echo $this->Html->image('cetram/utn-santafe-75.png', array('alt' => 'UTN-FRSF')) ?>
        </a>
        <p>Herramienta para la Determinación de
            los  Costos  de  Sistemas  de  Transporte  Público  de
            Pasajeros  en  Ciudades  de  Tamaño  Medio.</p>
        <p class="text-muted">Copyright © 2016. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
        
