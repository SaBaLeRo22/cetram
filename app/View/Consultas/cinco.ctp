<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta <small>Paso 5 de 6</small></h1>
        <h4>Par&aacute;metros<small> (Pre-Cargados por Grupo CETRAM)</small></h4>
        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>

        <?php foreach ($parametros as $parametro): ?>


        <div class="form-group">
            <?= $this->Form->label($parametro['Parametro']['id'], $parametro['Parametro']['nombre'].' '.'('.$parametro['Unidade']['nombre'].')', array('class' => 'control-label col-xs-10')); ?>
            <div class="col-xs-2">
                <?= $this->Form->input($parametro['Parametro']['id'], array('div'=>false, 'default'=> $parametro['Parametro']['valor'],'type' => 'number', 'step' => '0.01', 'min' => '0')); ?>
            </div>
        </div>


        <?php endforeach ?>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'editarcuatro', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('class' => 'btn btn-success','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

