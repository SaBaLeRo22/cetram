<?php 
/**
 * @var $this LocalView
 */
?><div class="row consultas index">
    <div class="col-md-9">
        <h2><?= __('Consultas'); ?></h2>
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
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
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
                <?= $this->Html->link(__('Agregar Consulta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
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
            <h4 class="text-muted">Respuesta Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Coeficientes'), array('controller' => 'respuesta_coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Coeficiente'), array('controller' => 'respuesta_coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Respuesta Indicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Indicadores'), array('controller' => 'respuesta_indicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Indicadore'), array('controller' => 'respuesta_indicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Respuesta Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Items'), array('controller' => 'respuesta_items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Item'), array('controller' => 'respuesta_items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Respuesta Multiplicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Multiplicadores'), array('controller' => 'respuesta_multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Multiplicadore'), array('controller' => 'respuesta_multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Respuesta Parametro</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Parametros'), array('controller' => 'respuesta_parametros', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Parametro'), array('controller' => 'respuesta_parametros', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Respuesta Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Preguntas'), array('controller' => 'respuesta_preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Pregunta'), array('controller' => 'respuesta_preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Respuesta Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Respuesta Tipos'), array('controller' => 'respuesta_tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Tipo'), array('controller' => 'respuesta_tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
