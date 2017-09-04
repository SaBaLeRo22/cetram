<?php 
/**
 * @var $this LocalView
 */
?><div class="row preguntas index">
    <div class="col-md-9">
        <h2><?= __('Preguntas'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('pregunta'); ?></th>
                    <th><?= $this->Paginator->sort('descripcion'); ?></th>
                    <th><?= $this->Paginator->sort('orden'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('multiplicadore_id'); ?></th>
                    <th><?= $this->Paginator->sort('agrupamiento_id'); ?></th>
                    <th><?= $this->Paginator->sort('opciones'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id'); ?></th>
                    <th><?= $this->Paginator->sort('titulo'); ?></th>
                    <th><?= $this->Paginator->sort('ayuda'); ?></th>
                    <th><?= $this->Paginator->sort('tipo'); ?></th>
                    <th><?= $this->Paginator->sort('step'); ?></th>
                    <th><?= $this->Paginator->sort('ambito_id'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($preguntas as $pregunta): ?> 
                <tr>
                    <td><?= h($pregunta['Pregunta']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $pregunta['Pregunta']['pregunta'] ),
                        array( 'action' => 'view', $pregunta['Pregunta']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $pregunta['Pregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $pregunta['Pregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $pregunta['Pregunta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $pregunta['Pregunta']['pregunta'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($pregunta['Pregunta']['descripcion']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['orden']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['minimo']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['maximo']); ?>&nbsp;</td>
                    <td><?= $pregunta['Multiplicadore']['nombre']; ?></td><td><?= $pregunta['Agrupamiento']['nombre']; ?></td><td><?= h($pregunta['Pregunta']['opciones']); ?>&nbsp;</td>
                    <td><?= $pregunta['Unidade']['nombre']; ?></td><td><?= h($pregunta['Pregunta']['titulo']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['ayuda']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['tipo']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['step']); ?>&nbsp;</td>
                    <td><?= $pregunta['Ambito']['nombre']; ?></td><td><?= $pregunta['Estado']['nombre']; ?></td><td><?= h($pregunta['Pregunta']['created']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['modified']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['user_created']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['user_modified']); ?>&nbsp;</td>
                     
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
                <?= $this->Html->link(__('Agregar Pregunta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Multiplicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Multiplicadores'), array('controller' => 'multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Multiplicadore'), array('controller' => 'multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Agrupamiento</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Agrupamientos'), array('controller' => 'agrupamientos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Agrupamiento'), array('controller' => 'agrupamientos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
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
            <h4 class="text-muted">Opcione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Opciones'), array('controller' => 'opciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Opcione'), array('controller' => 'opciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
