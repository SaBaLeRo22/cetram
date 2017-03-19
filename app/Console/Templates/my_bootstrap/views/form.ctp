<?php echo "<?php 
/**
 * @var \$this View
 */
?>"; 
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row <?php echo $pluralVar; ?> form">
    <div class="col-md-9">
        <?php if (strpos($action, 'add')): ?>
        <h2><?php echo "<?= __('Nuevo $singularHumanName') ?>"; ?></h2>
        <?php else: ?>
        <h2><?php echo "<?= __('Editar $singularHumanName') ?>"; ?></h2>
        <?php endif; ?>
        <hr/>

        <?php echo "<?= \$this->Form->create('{$modelClass}', array('class' => 'form-horizontal')); ?>\n"; ?> 
        <?php foreach ($fields as $field):
            if (strpos($action, 'add') !== false && $field === $primaryKey) {
                continue;
            }
            ?>
            <?php if ($field === $primaryKey): ?> 
        <?php echo "<?= \$this->Form->input('{$field}'); ?>"; ?>  
            <?php else: if (!in_array($field, array('created', 'modified', 'updated', 'deleted'))): ?>
        <div class="form-group">
            <?php echo "<?= \$this->Form->label('{$field}', null, array('class' => 'control-label col-xs-3')); ?>"; ?> 
            <?php echo "<?= \$this->Form->input('{$field}'); ?>"; ?> 
        </div>
            <?php endif; endif; ?>
            <?php
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "\t\techo \$this->Form->input('{$assocName}');\n";
                }
            }
            ?>
        <?php endforeach; ?>
        <div class="well well-sm text-right">
            <?php echo "<?= \$this->Form->button('<i class=\"fa fa-save fa-fw\"></i> Guardar', array('class' => 'btn btn-primary')); ?>"; ?> 
        </div>
        <?php echo "<?= \$this->Form->end(); ?>"; ?> 
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?php echo "<?= __('Acciones'); ?>"; ?></h3>
            
            <div class="list-group">
                <?php $action_link_attrs = "array('class' => 'list-group-item')"; ?>
                <?php if (strpos($action, 'add') === false): ?>
                <?php echo "<?= \$this->Form->postLink(__('Eliminar'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), $action_link_attrs, __('Se va a eliminar %s ¿Confirma la eliminación?', \$this->Form->value('{$modelClass}.{$displayField}'))); ?>"; ?>
                <?php endif; ?>
                <?php echo "<?= \$this->Html->link(__('Listado de " . $pluralHumanName . "'), array('action' => 'index'), $action_link_attrs); ?>"; ?>

                <?php
                $done = array();
                foreach ($associations as $type => $data) {
                    foreach ($data as $alias => $details) {
                ?>
            </div>
            <h4 class="text-muted"><?php echo Inflector::humanize(Inflector::underscore($alias)); ?></h4>
            <div class="list-group">
                <?php   if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                            echo "\t\t<?= \$this->Html->link(__('Listado de  " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), $action_link_attrs); ?> \n";
                            echo "\t\t<?= \$this->Html->link(__('Agregar " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), $action_link_attrs); ?> \n";
                            $done[] = $details['controller'];
                        }
                    }
                }
                ?> 
            </div>
        </div>
    </div>
</div>

