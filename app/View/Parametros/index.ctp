<?php 
/**
 * @var $this LocalView
 */
?><div class="row parametros index">
    <div class="col-md-12">
        <h2><?= __('Parametros'); ?></h2>
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
                    <th><?= $this->Paginator->sort('nombre'); ?></th>
                    <th><?= $this->Paginator->sort('descripcion'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id', 'Unidad'); ?></th>
                    <th><?= $this->Paginator->sort('tipo_id'); ?></th>
                    <th><?= $this->Paginator->sort('ambito_id'); ?></th>
                    <th><?= $this->Paginator->sort('editable'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('tipo'); ?></th>
                    <th><?= $this->Paginator->sort('step'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($parametros as $parametro): ?> 
                <tr>
                    <td><?= h($parametro['Parametro']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $parametro['Parametro']['nombre'] ),
                        array( 'action' => 'view', $parametro['Parametro']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $parametro['Parametro']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $parametro['Parametro']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'eliminar', $parametro['Parametro']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $parametro['Parametro']['nombre'])); ?>
                        </div>
                    </td> 
                    <td><?= h($parametro['Parametro']['descripcion']); ?>&nbsp;</td>
                    <td><?= h($parametro['Parametro']['valor']); ?>&nbsp;</td>
                    <td><?= $parametro['Unidade']['nombre']; ?></td><td><?= $parametro['Tipo']['nombre']; ?></td><td><?= $parametro['Ambito']['nombre']; ?></td><td><?= h($parametro['Parametro']['editable']); ?>&nbsp;</td>
                    <td><?= h($parametro['Parametro']['minimo']); ?>&nbsp;</td>
                    <td><?= h($parametro['Parametro']['maximo']); ?>&nbsp;</td>
                    <td><?= h($parametro['Parametro']['tipo']); ?>&nbsp;</td>
                    <td><?= h($parametro['Parametro']['step']); ?>&nbsp;</td>
                    <td><?= $parametro['Estado']['nombre']; ?></td><td><?= h($parametro['Parametro']['created']); ?>&nbsp;</td>
                    <td><?= h($parametro['Parametro']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($parametro['Parametro']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($parametro['Parametro']['user_modified'])); ?>&nbsp;</td>
                     
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
