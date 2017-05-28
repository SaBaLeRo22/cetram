<?php 
/**
 * @var $this View
 */
?><div class="row unidades form">
    <div class="col-md-9">
                <h2><?= __('Editar Unidade') ?></h2>
                <hr/>

        <?= $this->Form->create('Unidade', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('descripcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('descripcion'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Unidades'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Indicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Indicadores'), array('controller' => 'indicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Indicadore'), array('controller' => 'indicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Items'), array('controller' => 'items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Opcione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Opciones'), array('controller' => 'opciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Opcione'), array('controller' => 'opciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Parametro</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Parametros'), array('controller' => 'parametros', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Parametro'), array('controller' => 'parametros', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Preguntas'), array('controller' => 'preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Pregunta'), array('controller' => 'preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
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
            <h4 class="text-muted">Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Tipos'), array('controller' => 'tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Tipo'), array('controller' => 'tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

