<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaItems index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Items'); ?></h2>
        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csv'], ['class' => 'btn btn-sm btn-info']); ?>
            </div>
        </div>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('consulta_id'); ?></th>
                    <th><?= $this->Paginator->sort('item'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_valor'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_maximo'); ?></th>
                    <th><?= $this->Paginator->sort('unidad'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaItems as $respuestaItem): ?> 
                <tr>
                    <td><?= h($respuestaItem['RespuestaItem']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaItem['Consulta']['id'] ),
                        array( 'action' => 'view', $respuestaItem['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('controller' => 'consultas', 'action' => 'resultado', $respuestaItem['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaItem['RespuestaItem']['item'] ),
                        array( 'action' => 'view', $respuestaItem['RespuestaItem']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaItem['RespuestaItem']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td><?= h($respuestaItem['RespuestaItem']['valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['incidencia_valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['incidencia_minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['maximo']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['incidencia_maximo']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['unidad']); ?>&nbsp;</td>
                    <td><?= $respuestaItem['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaItem['RespuestaItem']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaItem['RespuestaItem']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaItem['RespuestaItem']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaItem['RespuestaItem']['user_modified'])); ?>&nbsp;</td>
                     
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
