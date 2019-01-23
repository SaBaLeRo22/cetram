<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaParametros index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Parametros'); ?></h2>
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
                    <th><?= $this->Paginator->sort('parametro'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('unidad'); ?></th>
                    <th><?= $this->Paginator->sort('editado'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaParametros as $respuestaParametro): ?> 
                <tr>
                    <td><?= h($respuestaParametro['RespuestaParametro']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaParametro['Consulta']['id'] ),
                        array( 'controller' => 'consultas', 'action' => 'view', $respuestaParametro['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('controller' => 'consultas', 'action' => 'resultado', $respuestaParametro['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <!--<?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $respuestaParametro['RespuestaPregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?> -->
                            &nbsp;
                            <!--<?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $respuestaParametro['RespuestaParametro']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $respuestaParametro['RespuestaPregunta']['valor'])); ?>                 -->
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaParametro['RespuestaParametro']['parametro'] ),
                        array( 'action' => 'view', $respuestaParametro['RespuestaParametro']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaParametro['RespuestaParametro']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <!--<?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $respuestaParametro['RespuestaParametro']['id']), array('class' => 'btn btn-info btn-xs')); ?> -->
                            <!--&nbsp;-->
                            <!--<?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $respuestaParametro['RespuestaParametro']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $respuestaParametro['RespuestaParametro']['parametro'])); ?>                 -->
                        </div>
                    </td> 
                    <td><?= h($respuestaParametro['RespuestaParametro']['valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaParametro['RespuestaParametro']['unidad']); ?>&nbsp;</td>
                    <td><?php if ($respuestaParametro['RespuestaParametro']['editado']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>&nbsp;</td>
                    <td><?= h($respuestaParametro['RespuestaParametro']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaParametro['RespuestaParametro']['maximo']); ?>&nbsp;</td>
                    <td><?= $respuestaParametro['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaParametro['RespuestaParametro']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaParametro['RespuestaParametro']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaParametro['RespuestaParametro']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaParametro['RespuestaParametro']['user_modified'])); ?>&nbsp;</td>
                     
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
