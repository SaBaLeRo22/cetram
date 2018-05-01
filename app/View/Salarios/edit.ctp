<?php 
/**
 * @var $this View
 */
?><div class="row salarios form">
    <div class="col-md-9">
                <h2><?= __('Editar Salario') ?></h2>
                <hr/>

        <?= $this->Form->create('Salario', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('convenio_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('convenio_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('categoria_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('categoria_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('sueldo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('sueldo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('bonificacion_anual', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('bonificacion_anual'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('sac', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('sac'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('vacaciones', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('vacaciones'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('contribuciones', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('contribuciones'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('estado_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('estado_id'); ?> 
        </div>

                                        <div class="well well-sm text-right">
            <?= $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar', array('class' => 'btn btn-primary')); ?> 
        </div>
        <?= $this->Form->end(); ?> 
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>
            
            <div class="list-group">
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $this->Form->value('Salario.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Salario.sueldo'))); ?>                                <?= $this->Html->link(__('Listado de Salarios'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Convenio</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Convenios'), array('controller' => 'convenios', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Convenio'), array('controller' => 'convenios', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Categoria</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Categorias'), array('controller' => 'categorias', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Categoria'), array('controller' => 'categorias', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

        </div>
    </div>
</div>

