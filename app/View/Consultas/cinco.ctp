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
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>

        <?php foreach ($preguntas as $pregunta): ?>

        <?php if ($pregunta['Pregunta']['titulo'] != NULL): ?>
        <hr/>
        <h2><small><?= h($pregunta['Pregunta']['titulo']); ?></small></h2>
        <?php endif; ?>

        <div class="form-group">
            <?php if ($pregunta['Pregunta']['tipo'] != 'hidden'): ?>
                <?= $this->Form->label($pregunta['Pregunta']['id'], $pregunta['Pregunta']['pregunta'], array('class' => 'control-label col-xs-10')); ?>
            <?php endif; ?>
            <div class="col-xs-2">
                <?= $this->Form->input($pregunta['Pregunta']['id'], array('div'=>false, 'type' => $pregunta['Pregunta']['tipo'],'options' => $pregunta['Pregunta']['opciones'])); ?>
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

        <div class="form-group">
            <?= $this->Form->label('provincia', 'Provincia', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('provincia_id', array('type' => 'select', 'empty' => 'Seleccionar...')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('localidade', 'Localidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('localidade_id', array('type' => 'select', 'empty' => 'Seleccionar...')); ?>
        </div>

        <h2>
            <small>Comentarios y Observaciones</small>
        </h2>
        <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'editardos', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Finalizar', array('class' => 'btn btn-primary','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
<?php $this->append('script') ?>
<script type="text/javascript">
    $('#ConsultaProvinciaId').change(function(){
        $('#ConsultaLocalidadeId').load('../obtener_localidades/'+$('#ConsultaProvinciaId').val());
    });
</script>
<?php $this->end() ?>