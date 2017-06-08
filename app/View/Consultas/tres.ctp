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

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('costo'); ?></th>
                    <th><?= $this->Paginator->sort('tarifa'); ?></th>
                    <th><?= $this->Paginator->sort('subsidio'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id'); ?></th>
                    <th><?= $this->Paginator->sort('localidade_id'); ?></th>
                    <th><?= $this->Paginator->sort('observaciones'); ?></th>
                    <th><?= $this->Paginator->sort('modo_id'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= h($consulta['Consulta']['id']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['costo']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $consulta['Consulta']['tarifa'] ),
                        array( 'action' => 'view', $consulta['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['tarifa'])); ?>
                        </div>
                    </td>
                    <td><?= h($consulta['Consulta']['subsidio']); ?>&nbsp;</td>
                    <td><?= $consulta['Unidade']['nombre']; ?></td>
                    <td><?= $consulta['Localidade']['nombre']; ?></td>
                    <td><?= h($consulta['Consulta']['observaciones']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['modo_id']); ?>&nbsp;</td>
                    <td><?= $consulta['Estado']['nombre']; ?></td><td><?= h($consulta['Consulta']['created']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['modified']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['user_created']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['user_modified']); ?>&nbsp;</td>

                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-4">
                <small class="paging-text text-muted">
                    <?= $this->Paginator->counter('P&aacute;gina {:page} de {:pages}, {:count} registros en total.'); ?>
                </small>
            </div>
            <div class="col-md-8 text-right">
                <ul class="pagination">
                    <?= $this->Paginator->prev( '<i class="fa fa-angle-left"></i>',
                    array( 'tag' => 'li', 'escape' => false ), null,
                    array( 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => false ) ); ?>                    <?= $this->Paginator->numbers( array(
                    'separator'    => '',
                    'currentTag'   => 'a',
                    'currentClass' => 'active',
                    'tag'          => 'li',
                    'first'        => 1,
                    'last'         => 1,
                    'ellipsis'     => '<li class="disabled"><a>...</a></li>'
                    ) ); ?>                    <?= $this->Paginator->next( '<i class="fa fa-angle-right"></i>',
                    array( 'tag' => 'li', 'currentClass' => 'disabled', 'escape' => false ), null,
                    array( 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => false ) ); ?>                </ul>
            </div>
        </div>



        <h4>
            Agregar Franquicia: <small>NO POSEE SUBE</small>
        </h4>
        <div class="form-group">
            <?= $this->Form->label('franquicia', 'Fanquicia', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('franquicia', array('type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tarifa ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('type' => 'number')); ?>
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
            Agregar Franquicia: <small>POSEE SUBE</small>
        </h4>
            <div class="form-group">
            <?= $this->Form->label('franquicia', 'Fanquicia', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('franquicia', array('type' => 'text')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('tarifa', 'Tarifa ($)', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('tarifa', array('type' => 'number')); ?>
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
            <?= $this->Form->button('<i class="fa fa-plus-circle fa-fw"></i> Agregar Franquicia', array('name'=>'accion', 'value'=>'2', 'class' => 'btn btn-danger','style' => 'float:center')); ?>
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

