<?php 
/**
 * @var $this LocalView
 */
?><div class="row salarios index">
    <div class="col-md-12">
        <h2><?= __('Salarios'); ?></h2>
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
                    <th><?= $this->Paginator->sort('convenio_id'); ?></th>
                    <th><?= $this->Paginator->sort('categoria_id'); ?></th>
                    <th><?= $this->Paginator->sort('sueldo'); ?></th>
                    <th><?= $this->Paginator->sort('bonificacion_anual'); ?></th>
                    <th><?= $this->Paginator->sort('sac'); ?></th>
                    <th><?= $this->Paginator->sort('vacaciones'); ?></th>
                    <th><?= $this->Paginator->sort('contribuciones'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($salarios as $salario): ?> 
                <tr>
                    <td><?= h($salario['Salario']['id']); ?>&nbsp;</td>
                    <td><?= $salario['Convenio']['anio']; ?></td><td><?= $salario['Categoria']['nombre']; ?></td><td class="display-column">
                        <?= $this->Html->link( h( $salario['Salario']['sueldo'] ),
                        array( 'action' => 'view', $salario['Salario']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $salario['Salario']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $salario['Salario']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'eliminar', $salario['Salario']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $salario['Salario']['sueldo'])); ?>
                        </div>
                    </td> 
                    <td><?= h($salario['Salario']['bonificacion_anual']); ?>&nbsp;</td>
                    <td><?= h($salario['Salario']['sac']); ?>&nbsp;</td>
                    <td><?= h($salario['Salario']['vacaciones']); ?>&nbsp;</td>
                    <td><?= h($salario['Salario']['contribuciones']); ?>&nbsp;</td>
                    <td><?= $salario['Estado']['nombre']; ?></td><td><?= h($salario['Salario']['created']); ?>&nbsp;</td>
                    <td><?= h($salario['Salario']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($salario['Salario']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($salario['Salario']['user_modified'])); ?>&nbsp;</td>
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
