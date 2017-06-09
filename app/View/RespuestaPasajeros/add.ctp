<?php 
/**
 * @var $this View
 */
?><div class="row respuestaPasajeros form">
    <div class="col-md-9">
                <h2><?= __('Editar Respuesta Pasajero') ?></h2>
                <hr/>

        <?= $this->Form->create('RespuestaPasajero', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('consulta_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('consulta_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('tarifa', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('tarifa'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('sube', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('sube'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('base', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('base'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('costo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('costo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('semestre1', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('semestre1'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('semestre2', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('semestre2'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes01', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes01'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes02', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes02'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes03', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes03'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes04', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes04'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes05', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes05'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes06', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes06'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes07', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes07'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes08', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes08'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes09', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes09'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes10', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes10'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes11', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes11'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mes12', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mes12'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Respuesta Pasajeros'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

