<?php 
/**
 * @var $this LocalView
 */
?><div class="row matrices index">
    <div class="col-md-12">
        <h2><?= __('Matrices'); ?></h2>
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
                    <th><?= $this->Paginator->sort('coeficiente_id'); ?></th>
                    <th><?= $this->Paginator->sort('multiplicadore_id', 'Multiplicador'); ?></th>
                    <th><?= $this->Paginator->sort('peso'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($matrices as $matrix): ?> 
                <tr>
                    <td class="display-column">
                        <?= $this->Html->link( h( $matrix['Matrix']['id'] ),
                        array( 'action' => 'view', $matrix['Matrix']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $matrix['Matrix']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $matrix['Matrix']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'eliminar', $matrix['Matrix']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $matrix['Matrix']['id'])); ?>
                        </div>
                    </td> 
                    <td><?= $matrix['Coeficiente']['nombre']; ?></td><td><?= $matrix['Multiplicadore']['nombre']; ?></td><td><?= h($matrix['Matrix']['peso']); ?>&nbsp;</td>
                    <td><?= $matrix['Estado']['nombre']; ?></td><td><?= h($matrix['Matrix']['created']); ?>&nbsp;</td>
                    <td><?= h($matrix['Matrix']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($matrix['Matrix']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($matrix['Matrix']['user_modified'])); ?>&nbsp;</td>
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
