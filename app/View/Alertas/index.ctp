<?php 
/**
 * @var $this LocalView
 */
?><div class="row alertas index">
    <div class="col-md-12">
        <h2><?= __('Alertas'); ?></h2>
        <div class="table-responsive">

            <div class="related">
                <div class="actions">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i> Agregar'), array('action' => 'add'), array('class' => 'btn btn-sm btn-info')); ?>
                </div>
            </div>

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('indicadore_id'); ?></th>
                    <th><?= $this->Paginator->sort('evento_id'); ?></th>
                    <th><?= $this->Paginator->sort('nombre'); ?></th>
                    <th><?= $this->Paginator->sort('menor'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('mayor'); ?></th>
                    <th><?= $this->Paginator->sort('notificar'); ?></th>
                    <th><?= $this->Paginator->sort('mensaje'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($alertas as $alerta): ?> 
                <tr>
                    <td><?= h($alerta['Alerta']['id']); ?>&nbsp;</td>
                    <td><?= $alerta['Indicadore']['nombre']; ?></td><td><?= $alerta['Evento']['nombre']; ?></td><td class="display-column">
                        <?= $this->Html->link( h( $alerta['Alerta']['nombre'] ),
                        array( 'action' => 'view', $alerta['Alerta']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $alerta['Alerta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $alerta['Alerta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'eliminar', $alerta['Alerta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $alerta['Alerta']['nombre'])); ?>
                        </div>
                    </td> 
                    <td><?= h($alerta['Alerta']['menor']); ?>&nbsp;</td>
                    <td><?= h($alerta['Alerta']['minimo']); ?>&nbsp;</td>
                    <td><?= h($alerta['Alerta']['maximo']); ?>&nbsp;</td>
                    <td><?= h($alerta['Alerta']['mayor']); ?>&nbsp;</td>
                    <td><?= h($alerta['Alerta']['notificar']); ?>&nbsp;</td>
                    <td><?= h($alerta['Alerta']['mensaje']); ?>&nbsp;</td>
                    <td><?= $alerta['Estado']['nombre']; ?></td><td><?= h($alerta['Alerta']['created']); ?>&nbsp;</td>
                    <td><?= h($alerta['Alerta']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($alerta['Alerta']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($alerta['Alerta']['user_modified'])); ?>&nbsp;</td>
                     
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
</div>
