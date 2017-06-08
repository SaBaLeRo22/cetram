<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta <small>Paso 3 de 5</small></h1>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>

        <h4>
            PASAJEROS TRANSPORTADOS
        </h4>

        <div class="table-responsive">

            <table class="table table-hover table-bordered table-condensed table-striped" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">TARIFA</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">SEMESTRE<br>01</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">SEMESTRE<br>02</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td class="display-column text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0"><h4 style="font-weight: bold">
                        <?= h("Plana"); ?>&nbsp;
                        <div class="nowrap">
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['tarifa'])); ?>
                        </div>
                    </h4>
                    </td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><strong><?= h("10"); ?></strong>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0011"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0022"); ?>&nbsp;</td>
                </tr>

                <tr>
                    <td class="display-column text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0"><h4 style="font-weight: bold">
                        <?= h("Centro"); ?>&nbsp;
                        <div class="nowrap">
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['tarifa'])); ?>
                        </div>
                    </h4>
                    </td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><strong><?= h("10"); ?></strong>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0011"); ?>&nbsp;</td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><?= h("0022"); ?>&nbsp;</td>
                </tr>


                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">TARIFA</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">SEMESTRE<br>01</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">SEMESTRE<br>02</th>
                </tr>
                </tfoot>
            </table>


            <table class="table table-hover table-bordered table-condensed table-striped" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">TARIFA</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>01</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>02</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>03</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>04</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>05</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>06</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>07</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>08</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>09</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>10</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>11</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>12</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td class="display-column text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0"><h4 style="font-weight: bold">
                        <?= h("Plana"); ?>&nbsp;
                        <div class="nowrap">
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['tarifa'])); ?>
                        </div>
                    </h4>
                    </td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><strong><?= h("10"); ?></strong>&nbsp;</td>
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

                <tr>
                    <td class="display-column text-info" style="background-color: #e6f4fb;vertical-align: middle; padding-bottom: 0;padding-top: 0;margin-top: 0;margin-bottom: 0"><h4 style="font-weight: bold">
                        <?= h("Centro"); ?>&nbsp;
                        <div class="nowrap">
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['tarifa'])); ?>
                        </div>
                    </h4>
                    </td>
                    <td class="text-info" style="text-align:center;vertical-align: middle"><strong><?= h("10"); ?></strong>&nbsp;</td>
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
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">TARIFA</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">COSTO<br>($)</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>01</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>02</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>03</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>04</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>05</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>06</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>07</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>08</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>09</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>10</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>11</th>
                    <th style="background-color:#3a87ad;color: #e6f4fb;vertical-align: middle; text-align: center">MES<br>12</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <h4>
            Agregar Tarifa: <small>NO POSEE SUBE</small>
        </h4>
        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tarifa', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('costo', 'Costo ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('costo', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('semestre1', 'Semestre 1', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('semestre1', array('type' => 'number')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('semestre2', 'Semestre 2', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('semestre2', array('type' => 'number')); ?>
        </div>


        <h4>
            Agregar Tarifa: <small>SI POSEE SUBE</small>
        </h4>
            <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tarifa', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('costo', 'Costo ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('costo', array('type' => 'number')); ?>
        </div>
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

        <div class="well well-sm text-center">
            <?= $this->Form->button('<i class="fa fa-plus-circle fa-fw"></i> Agregar Tarifa', array('name'=>'accion', 'value'=>'2', 'class' => 'btn btn-danger','style' => 'float:center')); ?>
            <div style="clear: both;"></div>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'editardos', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-hand-o-right fa-fw"></i> Siguiente', array('name'=>'accion', 'value'=>'1','class' => 'btn btn-success','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

