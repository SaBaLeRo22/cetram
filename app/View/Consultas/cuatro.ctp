<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta <small>Paso 4 de 5</small></h1>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>
        <h4>
            SALARIOS
        </h4>


            <p class="text-info text-left"><pre class="text-info text-left"><i class="fa fa-life-ring" aria-hidden="true"></i> <strong>Ayuda:</strong> Acceda al siguiente <strong><?php echo $this->Html->link( 'enlace', $parametro['Parametro']['descripcion'], array('target' => '_blank'))?></strong> para obtener los datos correspondientes al salario.</pre></p>


        <?php foreach ($preguntas as $pregunta): ?>

        <?php if ($pregunta['Pregunta']['titulo'] != NULL): ?>
        <hr/>
        <h2><small><?= h($pregunta['Pregunta']['titulo']); ?></small></h2>
        <?php endif; ?>

        <div class="form-group">
            <?= $this->Form->label('Consulta.preguntas.'.$pregunta['Pregunta']['id'], $pregunta['Pregunta']['pregunta'], array('class' => 'control-label col-xs-10')); ?>
            <div class="col-xs-2">
                <?= $this->Form->input('Consulta.preguntas.'.$pregunta['Pregunta']['id'], array('div'=>false, 'type' => $pregunta['Pregunta']['tipo'],'options' => $pregunta['Pregunta']['opciones'], 'step' => '0.01')); ?>
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


        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed table-striped" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CATEGORIA</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CANTIDAD</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">ANTIG&Uuml;EDAD<br>PROMEDIO (A&Ntilde;os)</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">SALARIO<br>($)</h4></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td class="text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0"><h4 style="font-weight: bold"><?= h($categoria['Categoria']['nombre']); ?>&nbsp;</h4></td>
                    <?= $this->Form->input('Consulta.categorias.'.$categoria['Categoria']['id'].'.categoria_id', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'hidden','default' => $categoria['Categoria']['id'])); ?>
                    <?= $this->Form->input('Consulta.categorias.'.$categoria['Categoria']['id'].'.categoria', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'hidden','default' => $categoria['Categoria']['nombre'])); ?>
                    <td style="align-items:center; padding-bottom: 0;padding-top: 0"><?= $this->Form->input('Consulta.categorias.'.$categoria['Categoria']['id'].'.cantidad', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'number','default' => '0')); ?>&nbsp;</td>
                    <td style="align-items:center; padding-bottom: 0;padding-top: 0"><?= $this->Form->input('Consulta.categorias.'.$categoria['Categoria']['id'].'.antiguedad', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'number','default' => '0', 'step' => '0.01')); ?>&nbsp;</td>
                    <td style="vertical-align: middle; padding-bottom: 0;padding-top: 0"><?= $this->Form->input('Consulta.categorias.'.$categoria['Categoria']['id'].'.salario', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'number','default' => '0', 'step' => '0.01')); ?>&nbsp;</td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CATEGORIA</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CANTIDAD</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">ANTIG&Uuml;EDAD<br>PROMEDIO</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">SALARIO<br>($)</h4></th>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'tres', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('class' => 'btn btn-success','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

