<?php 
/**
 * @var $this View
 */
?><div class="row salarios form">
    <div class="col-md-9">
                <h2><?= __('Editar Salario') ?></h2>
                <hr/>

        <?= $this->Form->create('Salario', array('class' => 'form-horizontal')); ?>
 
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
                                                                                                                    <div class="form-group">
            <?= $this->Form->label('user_created', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('user_created'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('user_modified', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('user_modified'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Salarios'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
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
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

