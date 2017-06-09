<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaSalarios index">
    <div class="col-md-9">
        <h2><?= __('Respuesta Salarios'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('consulta_id'); ?></th>
                    <th><?= $this->Paginator->sort('convenio_id'); ?></th>
                    <th><?= $this->Paginator->sort('anio'); ?></th>
                    <th><?= $this->Paginator->sort('inicio'); ?></th>
                    <th><?= $this->Paginator->sort('fin'); ?></th>
                    <th><?= $this->Paginator->sort('categoria_id'); ?></th>
                    <th><?= $this->Paginator->sort('categoria'); ?></th>
                    <th><?= $this->Paginator->sort('salario'); ?></th>
                    <th><?= $this->Paginator->sort('cantidad'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaSalarios as $respuestaSalario): ?> 
                <tr>
                    <td><?= h($respuestaSalario['RespuestaSalario']['id']); ?>&nbsp;</td>
                    <td><?= $respuestaSalario['Consulta']['costo']; ?></td><td><?= $respuestaSalario['Convenio']['anio']; ?></td><td><?= h($respuestaSalario['RespuestaSalario']['anio']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['inicio']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['fin']); ?>&nbsp;</td>
                    <td><?= $respuestaSalario['Categoria']['nombre']; ?></td><td class="display-column">
                        <?= $this->Html->link( h( $respuestaSalario['RespuestaSalario']['categoria'] ),
                        array( 'action' => 'view', $respuestaSalario['RespuestaSalario']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $respuestaSalario['RespuestaSalario']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $respuestaSalario['RespuestaSalario']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $respuestaSalario['RespuestaSalario']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $respuestaSalario['RespuestaSalario']['categoria'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($respuestaSalario['RespuestaSalario']['salario']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['cantidad']); ?>&nbsp;</td>
                    <td><?= $respuestaSalario['Estado']['nombre']; ?></td><td><?= h($respuestaSalario['RespuestaSalario']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['modified']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['user_created']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['user_modified']); ?>&nbsp;</td>
                     
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
                <?= $this->Html->link(__('Agregar Respuesta Salario'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Convenio</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Convenios'), array('controller' => 'convenios', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Convenio'), array('controller' => 'convenios', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Categoria</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Categorias'), array('controller' => 'categorias', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Categoria'), array('controller' => 'categorias', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
