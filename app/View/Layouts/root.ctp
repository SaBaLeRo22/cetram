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

<!--
            <li>
                <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-registered"></i> Acerca de</a>
            </li>
            <li role="presentation" class="divider"></li>
            -->

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
