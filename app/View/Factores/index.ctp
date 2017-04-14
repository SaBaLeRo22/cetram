<?php 
/**
 * @var $this LocalView
 */
?><div class="row factores index">
    <div class="col-md-9">
        <h2><?= __('Factores'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('nombre'); ?></th>
                    <th><?= $this->Paginator->sort('descripcion'); ?></th>
                    <th><?= $this->Paginator->sort('antiguedad_maxima'); ?></th>
                    <th><?= $this->Paginator->sort('valor_residual'); ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_amortizar'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($factores as $factore): ?> 
                <tr>
                    <td><?= h($factore['Factore']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $factore['Factore']['nombre'] ),
                        array( 'action' => 'view', $factore['Factore']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $factore['Factore']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $factore['Factore']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $factore['Factore']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $factore['Factore']['nombre'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($factore['Factore']['descripcion']); ?>&nbsp;</td>
                    <td><?= h($factore['Factore']['antiguedad_maxima']); ?>&nbsp;</td>
                    <td><?= h($factore['Factore']['valor_residual']); ?>&nbsp;</td>
                    <td><?= h($factore['Factore']['porcentaje_amortizar']); ?>&nbsp;</td>
                    <td><?= $factore['Estado']['nombre']; ?></td><td><?= h($factore['Factore']['created']); ?>&nbsp;</td>
                    <td><?= h($factore['Factore']['modified']); ?>&nbsp;</td>
                    <td><?= h($factore['Factore']['user_created']); ?>&nbsp;</td>
                    <td><?= h($factore['Factore']['user_modified']); ?>&nbsp;</td>
                     
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
                <?= $this->Html->link(__('Agregar Factore'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
