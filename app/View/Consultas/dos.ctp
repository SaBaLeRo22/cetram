<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta <small>Paso 2 de 6</small></h1>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>

        <?php foreach ($preguntas as $pregunta): ?>

        <?php if ($pregunta['Pregunta']['titulo'] != NULL): ?>
        <hr/>
        <h2><small><?= h($pregunta['Pregunta']['titulo']); ?></small></h2>
        <?php endif; ?>

        <div class="form-group">
            <?= $this->Form->label($pregunta['Pregunta']['id'], $pregunta['Pregunta']['pregunta'], array('class' => 'control-label col-xs-10')); ?>
            <div class="col-xs-2">
                <?= $this->Form->input($pregunta['Pregunta']['id'], array('div'=>false, 'type' => $pregunta['Pregunta']['tipo'],'options' => $pregunta['Pregunta']['opciones'], 'step' => $pregunta['Pregunta']['step'], 'min' => $pregunta['Pregunta']['minimo'], 'max' => $pregunta['Pregunta']['maximo'])); ?>
            </div>
        </div>

        <?php if ($pregunta['Pregunta']['ayuda'] != NULL): ?>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Ayuda: </strong> <?= h($pregunta['Pregunta']['ayuda']); ?>
        </div>
        <?php endif; ?>

        <?php endforeach ?>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'editaruno', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('class' => 'btn btn-success','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

