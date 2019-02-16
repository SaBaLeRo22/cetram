<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaSalarios index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Salarios'); ?></h2>
        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csv'], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
        </div>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('consulta_id'); ?></th>
                    <th><?= $this->Paginator->sort('categoria'); ?></th>
                    <th><?= $this->Paginator->sort('salario'); ?></th>
                    <th><?= $this->Paginator->sort('cantidad'); ?></th>
                    <th><?= $this->Paginator->sort('antiguedad'); ?></th>
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
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaSalario['Consulta']['id'] ),
                        array( 'action' => 'view', $respuestaSalario['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'resultado', $respuestaSalario['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaSalario['RespuestaSalario']['categoria'] ),
                        array( 'action' => 'view', $respuestaSalario['RespuestaSalario']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaSalario['RespuestaSalario']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td> 
                    <td><?= h($respuestaSalario['RespuestaSalario']['salario']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['cantidad']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['antiguedad']); ?>&nbsp;</td>
                    <td><?= $respuestaSalario['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaSalario['RespuestaSalario']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaSalario['RespuestaSalario']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaSalario['RespuestaSalario']['user_modified'])); ?>&nbsp;</td>
                     
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
