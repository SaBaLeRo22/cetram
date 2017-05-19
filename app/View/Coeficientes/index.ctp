<?php 
/**
 * @var $this LocalView
 */
?><div class="row coeficientes index">
    <div class="col-md-9">
        <h2><?= __('Coeficientes'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('nombre'); ?></th>
                    <th><?= $this->Paginator->sort('descripcion'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('ambito_id'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($coeficientes as $coeficiente): ?> 
                <tr>
                    <td><?= h($coeficiente['Coeficiente']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $coeficiente['Coeficiente']['nombre'] ),
                        array( 'action' => 'view', $coeficiente['Coeficiente']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $coeficiente['Coeficiente']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $coeficiente['Coeficiente']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $coeficiente['Coeficiente']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $coeficiente['Coeficiente']['nombre'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($coeficiente['Coeficiente']['descripcion']); ?>&nbsp;</td>
                    <td><?= h($coeficiente['Coeficiente']['minimo']); ?>&nbsp;</td>
                    <td><?= h($coeficiente['Coeficiente']['maximo']); ?>&nbsp;</td>
                    <td><?= $coeficiente['Ambito']['nombre']; ?></td><td><?= $coeficiente['Estado']['nombre']; ?></td><td><?= h($coeficiente['Coeficiente']['created']); ?>&nbsp;</td>
                    <td><?= h($coeficiente['Coeficiente']['modified']); ?>&nbsp;</td>
                    <td><?= h($coeficiente['Coeficiente']['user_created']); ?>&nbsp;</td>
                    <td><?= h($coeficiente['Coeficiente']['user_modified']); ?>&nbsp;</td>
                     
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
                <?= $this->Html->link(__('Agregar Coeficiente'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Ambito</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Ambitos'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Intervencione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Intervenciones'), array('controller' => 'intervenciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Intervencione'), array('controller' => 'intervenciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Matrix</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Matrices'), array('controller' => 'matrices', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Matrix'), array('controller' => 'matrices', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>