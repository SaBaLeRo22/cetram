<?php 
/**
 * @var $this View
 */
?>
<div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta
            <small>Paso 5 de 5</small>
        </h1>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>

        <h2>
            <small>Comentarios y Observaciones</small>
        </h2>
        <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'dos', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Finalizar', array('class' => 'btn btn-primary','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

