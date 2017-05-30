<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
                <h2><?= __('Realizar Consulta - Paso 1 de 3') ?></h2>
                <hr/>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
 
        <?php foreach ($preguntas as $pregunta): ?>
        <div class="form-group">
            <?= $this->Form->label($pregunta['Pregunta']['id'], $pregunta['Pregunta']['pregunta'], array('class' => 'control-label col-xs-10')); ?>
            <div class="col-xs-2">
                <?= $this->Form->input($pregunta['Pregunta']['id'], array('div'=>false, 'options' => $pregunta['Pregunta']['opciones'])); ?>
            </div>
        </div>
        <?php endforeach ?>

        <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
        </div>

                                        <div class="well well-sm text-right">
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('class' => 'btn btn-success')); ?>
        </div>
        <?= $this->Form->end(); ?> 
    </div>
</div>

