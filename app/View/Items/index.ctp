<?php 
/**
 * @var $this LocalView
 */
?><div class="row items index">
    <div class="col-md-9">
        <h2><?= __('Items'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('nombre'); ?></th>
                    <th><?= $this->Paginator->sort('descripcion'); ?></th>
                    <th><?= $this->Paginator->sort('tipo_id'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $item): ?> 
                <tr>
                    <td><?= h($item['Item']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $item['Item']['nombre'] ),
                        array( 'action' => 'view', $item['Item']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $item['Item']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $item['Item']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $item['Item']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $item['Item']['nombre'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($item['Item']['descripcion']); ?>&nbsp;</td>
                    <td><?= $item['Tipo']['nombre']; ?></td>
                    <td><?= $item['Unidade']['nombre']; ?></td>
                    <td><?= $item['Estado']['nombre']; ?></td><td><?= h($item['Item']['created']); ?>&nbsp;</td>
                    <td><?= h($item['Item']['modified']); ?>&nbsp;</td>
                    <td><?= h($item['Item']['user_created']); ?>&nbsp;</td>
                    <td><?= h($item['Item']['user_modified']); ?>&nbsp;</td>
                     
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
                <?= $this->Html->link(__('Agregar Item'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Tipos'), array('controller' => 'tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Tipo'), array('controller' => 'tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Participacione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Participaciones'), array('controller' => 'participaciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Participacione'), array('controller' => 'participaciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
