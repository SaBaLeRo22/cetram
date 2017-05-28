<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-9">
                <h2><?= __('Editar Consulta') ?></h2>
                <hr/>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('costo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('costo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('tarifa', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('tarifa'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('subsidio', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('subsidio'); ?> 
        </div>

        <div class="form-group">
            <?= $this->Form->label('unidade_id', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('unidade_id'); ?>
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('observaciones'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Consulta.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Consulta.tarifa'))); ?>                                <?= $this->Html->link(__('Listado de Consultas'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Coeficientes'), array('controller' => 'respuesta_coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Coeficiente'), array('controller' => 'respuesta_coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Indicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Indicadores'), array('controller' => 'respuesta_indicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Indicadore'), array('controller' => 'respuesta_indicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Items'), array('controller' => 'respuesta_items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Item'), array('controller' => 'respuesta_items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Multiplicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Multiplicadores'), array('controller' => 'respuesta_multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Multiplicadore'), array('controller' => 'respuesta_multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Parametro</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Parametros'), array('controller' => 'respuesta_parametros', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Parametro'), array('controller' => 'respuesta_parametros', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Preguntas'), array('controller' => 'respuesta_preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Pregunta'), array('controller' => 'respuesta_preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Tipos'), array('controller' => 'respuesta_tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Tipo'), array('controller' => 'respuesta_tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

