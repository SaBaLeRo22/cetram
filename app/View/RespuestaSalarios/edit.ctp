<?php 
/**
 * @var $this View
 */
?><div class="row respuestaSalarios form">
    <div class="col-md-9">
                <h2><?= __('Editar Respuesta Salario') ?></h2>
                <hr/>

        <?= $this->Form->create('RespuestaSalario', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('consulta_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('consulta_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('convenio_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('convenio_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('anio', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('anio'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('inicio', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('inicio'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('fin', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('fin'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('categoria_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('categoria_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('categoria', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('categoria'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('salario', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('salario'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('cantidad', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('cantidad'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('RespuestaSalario.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('RespuestaSalario.categoria'))); ?>                                <?= $this->Html->link(__('Listado de Respuesta Salarios'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
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

