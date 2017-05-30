<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
                <h2><?= __('Realizar Consulta - Paso 2 de 3') ?></h2>
                <hr/>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>

        <div class="form-group">
            <?= $this->Form->label('flota', 'Flota total de omnibus', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('flota', array('type' => 'number')); ?>
        </div>

        <h3><?= __('Kil&oacute;metros Recorridos Mensuales Declarados (CNRT):') ?></h3>
        <div class="form-group">
            <?= $this->Form->label('enero', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('enero', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('febrero', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('febrero', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('marzo', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('marzo', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('abril', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('abril', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('mayo', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mayo', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('junio', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('junio', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('julio', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('julio', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('agosto', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('agosto', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('septiembre', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('septiembre', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('octubre', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('octubre', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('noviembre', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('noviembre', array('type' => 'number')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('diciembre', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('diciembre', array('type' => 'number')); ?>
        </div>

                                        <div class="well well-sm text-right">
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('class' => 'btn btn-success')); ?>
        </div>
        <?= $this->Form->end(); ?> 
    </div>
</div>

