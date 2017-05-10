<?php 
/**
 * @var $this View
 */
?><div class="row respuestaItems form">
    <div class="col-md-9">
                <h2><?= __('Editar Respuesta Item') ?></h2>
                <hr/>

        <?= $this->Form->create('RespuestaItem', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('consulta_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('consulta_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('item_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('item_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('item', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('item'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('valor', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('valor'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('incidencia_valor', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('incidencia_valor'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('minimo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('minimo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('incidencia_minimo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('incidencia_minimo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('maximo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('maximo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('incidencia_maximo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('incidencia_maximo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('unidade_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('unidade_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('unidad', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('unidad'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Respuesta Items'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Items'), array('controller' => 'items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

