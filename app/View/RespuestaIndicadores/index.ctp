<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaIndicadores index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Indicadores'); ?></h2>
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
                    <th><?= $this->Paginator->sort('indicador'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('alerta'); ?></th>
                    <th><?= $this->Paginator->sort('mensaje'); ?></th>
                    <th><?= $this->Paginator->sort('evento'); ?></th>
                    <th><?= $this->Paginator->sort('color'); ?></th>
                    <th><?= $this->Paginator->sort('menor'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('mayor'); ?></th>
                    <th><?= $this->Paginator->sort('unidad'); ?></th>
                    <th><?= $this->Paginator->sort('notificar'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaIndicadores as $respuestaIndicadore): ?> 
                <tr>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaIndicadore['Consulta']['id'] ),
                        array( 'action' => 'view', $respuestaIndicadore['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('controller' => 'consultas', 'action' => 'resultado', $respuestaIndicadore['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaIndicadore['RespuestaIndicadore']['indicador'] ),
                        array( 'action' => 'view', $respuestaIndicadore['RespuestaIndicadore']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaIndicadore['RespuestaIndicadore']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['alerta']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['mensaje']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['evento']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['color']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['menor']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['maximo']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['mayor']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['unidad']); ?>&nbsp;</td>
                    <td><?php if ($respuestaIndicadore['RespuestaIndicadore']['notificar']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>&nbsp;</td>
                    <td><?= $respuestaIndicadore['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaIndicadore['RespuestaIndicadore']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaIndicadore['RespuestaIndicadore']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaIndicadore['RespuestaIndicadore']['user_modified'])); ?>&nbsp;</td>
                     
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
