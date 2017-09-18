<?php echo $this->Html->docType('html5'); ?>
<head>
    <title>
        <?php echo $title_for_layout ?>
    </title>


    <?= $this->Html->css( [
   'custom-styles'
   ] ); ?>

    <?php
        echo $this->Html->charset();
        echo $this->Html->meta('icon');
        $this->Html->css('/authake/css/bootstrap.min', null, array('inline' => false));
        $this->Html->css('/authake/css/custom', null, array('inline' => false));
        //$this->Html->script('Authake.jquery-3.2.1', array('block' => 'script'));
        $this->Html->script('Authake.jquery-latest', array('block' => 'script'));
        $this->Html->script('Authake.custom', array('block' => 'script'));
        $this->Html->script('Authake.bootstrap.min', array('block' => 'script'));
        $this->Html->script('Authake.html5shiv', array('block' => 'script'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <!-- Js writeBuffer -->
    <?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
    // Writes cached scripts
    ?>
    </head>
    <body>
    <header>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo $this->Html->url('/'); ?>">CETRAM</a>
                <?php if ($this->Session->read('Grupo.Admin') || $this->Session->read('Grupo.Sistemas')): ?>
                    <ul class="nav pull-left">
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Nuevo'), array('controller' => 'users', 'action' => 'add')); ?></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><i class="icon-th-list"> </i> Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Nuevo'), array('controller' => 'groups', 'action' => 'add')); ?></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'index')); ?>"><i class="icon-th-list"> </i> Grupos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reglas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Nueva'), array('controller' => 'rules', 'action' => 'add')); ?></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'rules', 'action' => 'index')); ?>"><i class="icon-th-list"> </i> Reglas</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                    <ul class="nav pull-right">
                    <?php if ($this->Session->read('Grupo.Admin')): ?>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'authake', 'action' => 'settings')); ?>">Configuraciones</a></li>
                    <?php endif; ?>
                        <li class="divider-vertical"></li>
                    <?php echo $this->Authake->getUserMenu(); ?>
                        <li class="divider-vertical"></li>
                    <?php if ($this->Session->read('Grupo.Admin') || $this->Session->read('Grupo.Sistemas')): ?>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'authake', 'action' => 'help')); ?>"><i class="icon-comment icon-white"></i> Help</a></li>
                    <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="container" style="width: 100%">
    <?php
                            if ($this->Session->check('Message.flash')):
                                echo $this->Session->flash();
                            endif;
    ?>

    <?php
                            if ($this->Session->read('Grupo.Admin') || $this->Session->read('Grupo.Sistemas')) {
                                echo "<p class='breadcrumb'>" . $this->Html->getCrumbs(' » ', array(
                                    'text' => 'Dashboard',
                                    'url' => array('controller' => 'authake', 'action' => 'index', 'home'),
                                    'escape' => false
                                )) . "</p>";
                            }
                            echo $this->fetch('content');
    ?>
</div>
    <footer class="footer pie">

        <div class="container" style="text-align: center; background-color: #ffffff;">

            <hr class="style14" />

            <a href="<?php echo $this->Html->url('http://www.frsf.utn.edu.ar/'); ?>">
                <?php echo $this->Html->image('cetram/utn-santafe-75.png', array('alt' => 'UTN-FRSF')) ?>
            </a>
            <p>Proyecto: Herramienta para la Determinación de
                los Costos de Sistemas de Transporte Público de
                Pasajeros en Ciudades de Tamaño Medio.</p>
            <p class="text-muted">Equipo: Ing. Mec. Fernando Imaz / Ing. Civ. Juan Jaurena / Ing. Sis. Matías Rovere / Ing. Ind. Melisa Batistela / Duilio Abdala</p>
            <p class="text-muted">Copyright © 2017. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>