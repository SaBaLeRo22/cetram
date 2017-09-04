<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
                <h1>Editar <small>Paso 1 de 6</small></h1>


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
                <?= $this->Form->input($pregunta['Pregunta']['id'], array('div'=>false, 'type' => $pregunta['Pregunta']['tipo'],'options' => $pregunta['Pregunta']['opciones'], 'step' => '1', 'min' => '0')); ?>
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
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('class' => 'btn btn-success')); ?>
        </div>
        <?= $this->Form->end(); ?> 
    </div>
</div>

