<?php 
/**
 * @var $this View
 */
?><div class="row preguntas form">
    <div class="col-md-9">
                <h2><?= __('Editar Pregunta') ?></h2>
                <hr/>

        <?= $this->Form->create('Pregunta', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('pregunta', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('pregunta'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('descripcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('descripcion'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('orden', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('orden'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('minimo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('minimo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('maximo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('maximo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('multiplicadore_id', 'Multiplicador', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('multiplicadore_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('agrupamiento_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('agrupamiento_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('opciones', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('opciones'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('unidade_id', 'Unidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('unidade_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('titulo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('titulo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('ayuda', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('ayuda'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('tipo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('tipo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('step', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('step'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('ambito_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('ambito_id'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Preguntas'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Multiplicador</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Multiplicadores'), array('controller' => 'multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Multiplicador'), array('controller' => 'multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
            <h4 class="text-muted">Agrupamiento</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Agrupamientos'), array('controller' => 'agrupamientos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Agrupamiento'), array('controller' => 'agrupamientos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Unidad</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidad'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
            <h4 class="text-muted">Ambito</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Ambitos'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

            <h4 class="text-muted">Opcion</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Opciones'), array('controller' => 'opciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Opcion'), array('controller' => 'opciones', 'action' => 'add'), array('class' => 'list-group-item')); ?>
 
            </div>
        </div>
    </div>
</div>

