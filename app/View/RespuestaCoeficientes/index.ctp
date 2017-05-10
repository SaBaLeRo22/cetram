<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaCoeficientes index">
    <div class="col-md-9">
        <h2><?= __('Respuesta Coeficientes'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('consulta_id'); ?></th>
                    <th><?= $this->Paginator->sort('coeficiente_id'); ?></th>
                    <th><?= $this->Paginator->sort('coeficiente'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id'); ?></th>
                    <th><?= $this->Paginator->sort('unidad'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaCoeficientes as $respuestaCoeficiente): ?> 
                <tr>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['id']); ?>&nbsp;</td>
                    <td><?= $respuestaCoeficiente['Consulta']['tarifa']; ?></td><td><?= $respuestaCoeficiente['Coeficiente']['nombre']; ?></td><td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['coeficiente']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaCoeficiente['RespuestaCoeficiente']['valor'] ),
                        array( 'action' => 'view', $respuestaCoeficiente['RespuestaCoeficiente']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $respuestaCoeficiente['RespuestaCoeficiente']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $respuestaCoeficiente['RespuestaCoeficiente']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $respuestaCoeficiente['RespuestaCoeficiente']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $respuestaCoeficiente['RespuestaCoeficiente']['valor'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['maximo']); ?>&nbsp;</td>
                    <td><?= $respuestaCoeficiente['Unidade']['nombre']; ?></td><td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['unidad']); ?>&nbsp;</td>
                    <td><?= $respuestaCoeficiente['Estado']['nombre']; ?></td><td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['modified']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['user_created']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['user_modified']); ?>&nbsp;</td>
                     
                </tr>
                <?php endforeach ?> 
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4">
                <small class="paging-text text-muted">
                    <?= $this->Paginator->counter('Página {:page} de {:pages}, {:count} registros en total.'); ?> 
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
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>
            
            <div class="list-group">
                <?= $this->Html->link(__('Agregar Respuesta Coeficiente'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Coeficientes'), array('controller' => 'coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Coeficiente'), array('controller' => 'coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
