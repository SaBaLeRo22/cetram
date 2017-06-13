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

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed table-striped" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CATEGORIA</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CANTIDAD</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">SALARIO<br>($)</h4></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($salarios as $salario): ?>
                <tr>
                    <td class="text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0"><h4 style="font-weight: bold"><?= h($salario['Categoria']['nombre']); ?>&nbsp;</h4></td>
                    <td style="align-items:center; padding-bottom: 0;padding-top: 0"><?= $this->Form->input('Consulta.categorias.'.$salario['Salario']['id'].'.cantidad', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'number','default' => $salario['Salario']['sueldo'])); ?>&nbsp;</td>
                    <td style="vertical-align: middle; padding-bottom: 0;padding-top: 0"><?= $this->Form->input('Consulta.categorias.'.$salario['Salario']['id'].'.salario', array('style'=>'margin-top: 5%;align-items:center','div'=>false, 'type' => 'number','default' => $salario['Salario']['sueldo'])); ?>&nbsp;</td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CATEGORIA</h4></th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center"><h4 style="font-weight: bold">CANTIDAD</h4></th>
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

