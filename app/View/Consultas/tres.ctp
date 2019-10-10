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
        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal', 'novalidate' => true)); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>
        <?= $this->Form->input('sube', array('type' => 'hidden')); ?>
        <?= $this->Form->input('tiene', array('type' => 'hidden')); ?>
        <?= $this->Form->input('base', array('type' => 'hidden', 'name' => 'base')); ?>

        <h1>Realizar Consulta
            <small>Paso 3 de 6</small>
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
                        TIPO DE TARIFA
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
                            <?= $this->Form->input('base', array('value' => false, 'type' => 'radio', 'name' => 'base', 'options'=>array($pasajero['RespuestaPasajero']['id'] => false), 'legend'=>false, 'div' => false, 'label'=>false)); ?>
                        <?php else: ?>
                            <?= $this->Form->input('base', array('value' => $pasajero['RespuestaPasajero']['id'], 'type' => 'radio', 'name' => 'base', 'options'=>array($pasajero['RespuestaPasajero']['id'] => false), 'legend'=>false, 'div' => false, 'label'=>false)); ?>
                        <?php endif; ?>

                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['semestre1']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['semestre2']); ?>&nbsp;</td>

                    <td class="text-info" style="text-align:center;vertical-align: middle">
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
                        TIPO DE TARIFA
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
                        TIPO DE TARIFA
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
                        <?= $this->Form->input('base', array('value' => false, 'type' => 'radio', 'name' => 'base', 'options'=>array($pasajero['RespuestaPasajero']['id'] => false), 'legend'=>false, 'div' => false, 'label'=>false)); ?>
                        <?php else: ?>
                        <?= $this->Form->input('base', array('value' => $pasajero['RespuestaPasajero']['id'], 'type' => 'radio', 'name' => 'base', 'options'=>array($pasajero['RespuestaPasajero']['id'] => false), 'legend'=>false, 'div' => false, 'label'=>false)); ?>
                        <?php endif; ?>

                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes01']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes02']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes03']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes04']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes05']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes06']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes07']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes08']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes09']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes10']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes11']); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h($pasajero['RespuestaPasajero']['mes12']); ?>&nbsp;</td>

                    <td class="text-info" style="text-align:center;vertical-align: middle">
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
                        TIPO DE TARIFA
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
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">
                        ELIMINAR
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <?php if ($tiene == '0'): ?>
        <h4>
            Agregar Tarifa:
            <small>NO POSEE SUBE</small>
        </h4>
        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tipo de Tarifa', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('required' => 'required','type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('costo', 'Costo ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('costo', array('required' => 'required', 'type' => 'number', 'step' => '0.01', 'min' => '0.01')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('semestre1', 'Semestre 1', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('semestre1', array('required' => 'required', 'type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('semestre2', 'Semestre 2', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('semestre2', array('required' => 'required', 'type' => 'number', 'min' => '1')); ?>
        </div>
        <?php endif; ?>

        <?php if ($tiene == '1'): ?>
        <h4>
            Agregar Tarifa:
            <small>SI POSEE SUBE</small>
        </h4>

        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tipo de Tarifa', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('required' => 'required','type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('costo', 'Costo ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('costo', array('required' => 'required','type' => 'number', 'step' => '0.01', 'min' => '0.01')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes01', 'Mes 01', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes01', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes02', 'Mes 02', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes02', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes03', 'Mes 03', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes03', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes04', 'Mes 04', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes04', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes05', 'Mes 05', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes05', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes06', 'Mes 06', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes06', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes07', 'Mes 07', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes07', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes08', 'Mes 08', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes08', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes09', 'Mes 09', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes09', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes10', 'Mes 10', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes10', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes11', 'Mes 11', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes11', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('mes12', 'Mes 12', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('mes12', array('required' => 'required','type' => 'number', 'min' => '1')); ?>
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

