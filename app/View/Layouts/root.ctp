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
$this->extend('default');
?>
<?php $this->start('menu'); ?>
<ul class="nav navbar-nav navbar-right">
    <li>
        <a class="text-center" href="<?= $this->Html->url('/') ?>">
            <i class="fa fa-home fa-2x fa-fw"></i> <br/>
            <?= __('Inicio'); ?>
        </a>
    </li>
    <li>
        <a class="text-center" href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'externos', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
            <i class="fa fa-wrench fa-2x fa-fw"></i> <br/>
            <?= __('Tools'); ?>
        </a>
    </li>

    <?php if ($this->Authake->isLogged()): ?>

    <li>
        <a class="text-center" href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'consultas', 'action' => 'uno', 'prefix' => false, $this->request->prefix => false)) ?>">
            <i class="fa fa-bus fa-2x fa-fw"></i> <br/>
            <?= __('Consulta'); ?>
        </a>
    </li>

    <?php if ($this->Session->read('Grupo.Admin') || $this->Session->read('Grupo.Sistemas')): ?>

    <li class="divider-left dropdown">
        <a class="text-center" href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'consultas', 'action' => 'informe', 'prefix' => false, $this->request->prefix => false)) ?>">
            <i class="fa fa-list fa-2x fa-fw"></i> <br/>
            <?= __('Informe'); ?>
        </a>
    </li>

    <li class="divider-left dropdown">
        <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" >
            <i class="fa fa-cogs fa-fw fa-2x"></i>
            <br/>
            <?= __('Administrar'); ?>
            <i class="icon-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'consultas', 'action' => 'configuracion', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Configuraciones
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'consultas', 'action' => 'respuestas', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Respuestas
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'authake', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-users"></i> Usuarios
                </a>
            </li>
        </ul>
    </li>
    <?php endif; ?>

    <!--Usuario-->
    <li class="divider-left dropdown">
        <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" >
            <i class="fa fa-user fa-fw fa-2x"></i>
            <br/>
            <?= $this->Authake->getNombre(); ?>
            <i class="icon-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?= $this->Html->url(array('plugin' => 'authake', 'controller' => 'user', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-users"></i> Perfil
                </a>
            </li>
            <li role="presentation" class="divider"></li>

            <li><?php echo $this->Html->link(__('<i class="fa fa-fw fa-life-ring"></i> Ayuda Usuario', true), '/files/Usuario.pdf', array('escape' => false, 'target' => '_blank')); ?></li>
            <li role="presentation" class="divider"></li>

            <?php if ($this->Session->read('Grupo.Admin') || $this->Session->read('Grupo.Sistemas')): ?>
            <li><?php echo $this->Html->link(__('<i class="fa fa-fw fa-life-ring"></i> Ayuda Admin', true), '/files/Admin.pdf', array('escape' => false, 'target' => '_blank')); ?></li>
            <li role="presentation" class="divider"></li>
            <?php endif; ?>

            <li>
                <!-- Button to trigger modal -->
                <a data-toggle="modal" href="#myModal"><i class="fa fa-fw fa-question-circle"></i> Acerca de CETRAPP</a>
            </li>
            <li role="presentation" class="divider"></li>


            <li>
                <a href="<?= $this->Html->url(array('plugin' => 'authake', 'controller' => 'user', 'action' => 'logout', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-fw fa-power-off"></i> Salir
                </a>
            </li>
        </ul>
    </li>
    <?php endif; ?>


</ul>
<?php $this->end(); ?>

<?= $this->fetch('content') ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Acerca de CETRAPP</h4>
            </div>
            <div class="modal-body">
                <div class="container" style="text-align: center; background-color: #ffffff;">

                    <a href="<?php echo $this->Html->url('http://extranet.frsf.utn.edu.ar/CETRAM'); ?>">
                        <?php echo $this->Html->image('cetram/cetram-50.png', array('alt' => 'CETRAM')) ?>
                    </a>

                    <a href="<?php echo $this->Html->url('http://www.frsf.utn.edu.ar/'); ?>">
                        <?php echo $this->Html->image('cetram/utn-santafe-75.png', array('alt' => 'UTN-FRSF')) ?>
                    </a>

                    <hr class="style14"/>
                    <br>
                    <p>Proyecto: Herramienta para la Determinaci&oacute;n de
                        los Costos de Sistemas de Transporte P&uacute;blico de
                        Pasajeros en Ciudades de Tama&ntilde;o Medio.</p>
                    <p class="text-muted">Equipo: Ing. Mec. Fernando Imaz / Ing. Civ. Juan Jaurena / Ing. Sis. Mat&iacute;as Rovere / Ing. Ind. Melisa Batistela / Duilio Abdala</p>
                    <p class="text-muted">Copyright &copy; 2017. Todos los derechos reservados.</p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
