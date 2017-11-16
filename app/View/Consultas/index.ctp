<?php 
/**
 * @var $this LocalView
 */
?><div class="row consultas index">
    <div class="col-md-12">
        <h2><?= __('Consultas'); ?></h2>
        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Nueva Consulta', ['controller' => 'consultas', 'action' => 'uno'], ['class' => 'btn btn-sm btn-info']); ?>
            </div>
        </div>

        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('modo_id', 'Estado'); ?></th>
                    <th><?= $this->Paginator->sort('costo', 'Costo ($)'); ?></th>
                    <th><?= $this->Paginator->sort('tarifa', 'Tarifa ($)'); ?></th>
                    <th><?= $this->Paginator->sort('subsidio', 'Subsidio ($)'); ?></th>
                    <th><?= $this->Paginator->sort('localidade_id', 'Localidad'); ?></th>
                    <th><?= $this->Paginator->sort('created', 'Creada'); ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificada'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= h($consulta['Consulta']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $consulta['Modo']['nombre'] ), array( 'action' => 'continuar', $consulta['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?php if ($consulta['Modo']['id'] == '1'): ?>
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'resultado', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?= $this->Html->link( '<i class="fa fa-files-o"></i>', array('action' => 'copiar', $consulta['Consulta']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                            <?php else: ?>
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i>', array('action' => 'continuar', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i>', array('action' => 'eliminar', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['id'])); ?>
                            <?php endif ?>
                            &nbsp;
                        </div>
                    </td>
                    <td><?= $consulta['Consulta']['costo']; ?></td>
                    <td><?= h($consulta['Consulta']['tarifa']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['subsidio']); ?>&nbsp;</td>
                    <td><?= $consulta['Localidade']['nombre'].' ('.$consulta['Localidade']['codigopostal'].')'; ?></td>
                    <td><?= h($consulta['Consulta']['created']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['modified']); ?>&nbsp;</td>
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
