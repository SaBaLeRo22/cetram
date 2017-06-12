<style type="text/css">
    input[type="checkbox"][readonly] {
        pointer-events: none;
    }
</style>

<?php
/**
 * @var $this View
 */
?>
<div class="row consultas form">
    <div class="col-md-12">
        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <h1>Realizar Consulta
            <small>Paso 3 de 5</small>
        </h1>
        <h4>
            PASAJEROS TRANSPORTADOS
        </h4>

        <?php if ($tiene == '0'): ?>
        <?php if (!empty($pasajeros)): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed table-striped" cellpadding="0"
                   cellspacing="0">
                <thead>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        TARIFA
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        BASE
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        SEMESTRE<br>01
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        SEMESTRE<br>02
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        ELIMINAR
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pasajeros as $pasajero): ?>
                <tr>
                    <td class="display-column text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0">
                        <strong><?= h($pasajero['RespuestaPasajero']['tarifa']); ?></strong>&nbsp;
                    </td>
                    <td class="text-info" style="text-align:center;vertical-align: middle">
                        <strong><?= h($pasajero['RespuestaPasajero']['costo']); ?></strong>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle">

                        <?php if ($pasajero['RespuestaPasajero']['base'] == '0'): ?>
                            <?= $this->Form->input('base', array('type' => 'radio', 'name' => 'base', 'options'=>array($pasajero['RespuestaPasajero']['id'] => false), 'legend'=>false, 'div' => false, 'label'=>false)); ?>
                        <?php else: ?>
                            <?= $this->Form->input('base', array('value' => $pasajero['RespuestaPasajero']['id'], 'type' => 'radio', 'name' => 'base', 'options'=>array($pasajero['RespuestaPasajero']['id'] => false), 'legend'=>false, 'div' => false, 'label'=>false)); ?>
                        <?php endif; ?>

                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['semestre1']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['semestre2']); ?>&nbsp;</td>

                    <td class="text-info" style="text-align:center;vertical-align: middle">
                        <!--<?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i>'), array('controller' => 'respuesta_pasajeros', 'action' => 'eliminar', $pasajero['RespuestaPasajero']['id']), array('class' => 'btn btn-danger btn-xs'), __('Seguro de eliminar la tarifa %s?',$pasajero['RespuestaPasajero']['tarifa']));?>-->

                        <?php echo $this->Html->link(
                        '<i class="fa fa-trash"></i>',
                        array('controller' => 'respuesta_pasajeros', 'action' => 'eliminar', $pasajero['RespuestaPasajero']['id']),
                        array('class' => 'btn btn-danger btn-xs', 'confirm' => 'Seguro de eliminar la tarifa?')
                        );?>

                    </td>

                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        TARIFA
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        BASE
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        SEMESTRE<br>01
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        SEMESTRE<br>02
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        ELIMINAR
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <?php if ($tiene == '1'): ?>
        <?php if (!empty($pasajeros)): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed table-striped" cellpadding="0"
                   cellspacing="0">
                <thead>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        TARIFA
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        BASE
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>01
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>02
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>03
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>04
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>05
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>06
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>07
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>08
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>09
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>10
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>11
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>12
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pasajeros as $pasajero): ?>
                <tr>
                    <td class="display-column text-info"
                        style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0">
                        <h4 style="font-weight: bold">
                            <?= h("Plana"); ?>&nbsp;
                        </h4>
                        <div class="nowrap">
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('controller' => 'respuesta_pasajeros', 'action' => 'eliminar', $pasajero['RespuestaPasajero']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $pasajero['RespuestaPasajero']['tarifa'])); ?>
                        </div>
                    </td>
                    <td class="text-info" style="text-align:center;vertical-align: middle">
                        <strong><?= h("10"); ?></strong>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle">
                        <strong><?= h("SI"); ?></strong>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0011"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0022"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0033"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0044"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0055"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0066"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0077"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0088"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0099"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("1010"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("1111"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("1212"); ?>&nbsp;</td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        TARIFA
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        BASE
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>01
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>02
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>03
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>04
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>05
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>06
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>07
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>08
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>09
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>10
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>11
                    </th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        MES<br>12
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <?php endif; ?>
        <?php endif; ?>


        <!--<?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>-->
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>
        <?= $this->Form->input('sube', array('type' => 'hidden')); ?>
        <?= $this->Form->input('tiene', array('type' => 'hidden')); ?>
        <?= $this->Form->input('primero', array('type' => 'hidden')); ?>

        <?php if ($tiene == '0'): ?>
        <h4>
            Agregar Tarifa:
            <small>NO POSEE SUBE</small>
        </h4>

        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tarifa', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('costo', 'Costo ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('costo', array('type' => 'number')); ?>
        </div>

        <!--<div class="form-group">
            <?= $this->Form->label('base', 'Base (Tarifa Plana)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('base', array('type' => 'checkbox', 'readonly' => $readonly)); ?>
        </div>

        <div class="alert alert-warning alert-dismissible" role="alert"
             style="margin-bottom: 3px;margin-top: -10px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Nota: </strong> Se debe seleccionar una &uacute;nica de las tarifas como base o plana, ya que la
            misma se utilizar&aacute; para los c&aacute;lculos de equivalencia.
        </div>
        <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 25px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Importante: </strong> No se permitir&aacute; avanzar al siguiente paso si no se selecciona
            una &uacute;nica tarifa como base o plana.
        </div>-->

        <div class="form-group">
            <?= $this->Form->label('semestre1', 'Semestre 1', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('semestre1', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('semestre2', 'Semestre 2', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('semestre2', array('type' => 'number')); ?>
        </div>
        <?php endif; ?>

        <?php if ($tiene == '1'): ?>
        <h4>
            Agregar Tarifa:
            <small>SI POSEE SUBE</small>
        </h4>

        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tarifa', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('costo', 'Costo ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('costo', array('type' => 'number')); ?>
        </div>

        <!--<div class="form-group">
            <?= $this->Form->label('base', 'Base (Tarifa Plana)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('base', array('type' => 'checkbox', 'readonly' => $readonly)); ?>
        </div>
        <div class="alert alert-warning alert-dismissible" role="alert"
             style="margin-bottom: 3px;margin-top: -10px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Nota: </strong> Se debe seleccionar una &uacute;nica de las tarifas como base o plana, ya que la
            misma se utilizar&aacute; para los c&aacute;lculos de equivalencia.
        </div>
        <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 25px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Importante: </strong> No se permitir&aacute; avanzar al siguiente paso si no se selecciona
            una &uacute;nica tarifa como base o plana.
        </div>-->

        <div class="form-group">
            <?= $this->Form->label('mes01', 'Mes 01', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes01', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes02', 'Mes 02', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes02', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes03', 'Mes 03', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes04', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes04', 'Mes 04', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes04', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes05', 'Mes 05', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes05', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes06', 'Mes 06', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes06', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes07', 'Mes 07', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes07', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes08', 'Mes 08', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes08', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes09', 'Mes 09', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes09', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes10', 'Mes 10', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes10', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes11', 'Mes 11', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes11', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes12', 'Mes 12', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes12', array('type' => 'number')); ?>
        </div>
        <?php endif; ?>

        <div class="well well-sm text-center">
            <?= $this->Form->button('<i class="fa fa-plus-circle fa-fw"></i> Agregar Tarifa', array('name'=>'accion',
            'value'=>'2', 'class' => 'btn btn-danger','style' => 'float:center')); ?>
            <div style="clear: both;"></div>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas',
            'action' => 'editardos', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' =>
            'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('name'=>'accion',
            'value'=>'1','class' => 'btn btn-success','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

