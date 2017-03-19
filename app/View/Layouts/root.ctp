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
        <a href="<?= $this->Html->url('/') ?>" class="text-center">
            <i class="fa fa-home fa-2x fa-fw"></i> <br/>
            <?= __('Inicio'); ?>
        </a>
    </li>


    <?php if ($this->Authake->isLogged()): ?>
    <?php if ($this->Session->read('Grupo.Admin') || $this->Session->read('Grupo.Sistemas')): ?>
    <li class="divider-left dropdown">
        <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" >
            <i class="fa fa-cogs fa-fw fa-2x"></i>
            <br/>
            <?= __('Administrar'); ?>
            <i class="icon-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'parametros', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Parametros
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'items', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Items
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'tipos', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Tipos
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'unidades', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Unidades
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'sectores', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Sectores
                </a>
            </li>
            <li role="presentation" class="divider"></li>
            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'localidades', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-wrench"></i> Localidades
                </a>
            </li>
            <li role="presentation" class="divider"></li>

            <li>
                <a href="<?= $this->Html->url(array('plugin' => null, 'controller' => 'authake', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>">
                    <i class="fa fa-users"></i> Authake
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
                    <i class="fa fa-users fa-power-off"></i> Perfil
                </a>
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