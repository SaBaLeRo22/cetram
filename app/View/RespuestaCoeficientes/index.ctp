<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaCoeficientes index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Coeficientes'); ?></h2>
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
                    <th><?= $this->Paginator->sort('coeficiente'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('unidad'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaCoeficientes as $respuestaCoeficiente): ?> 
                <tr>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaCoeficiente['Consulta']['id'] ),
                        array( 'action' => 'view', $respuestaCoeficiente['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('controller' => 'consultas', 'action' => 'resultado', $respuestaCoeficiente['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            &nbsp;
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaCoeficiente['RespuestaCoeficiente']['coeficiente'] ),
                        array( 'action' => 'view', $respuestaCoeficiente['RespuestaCoeficiente']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaCoeficiente['RespuestaCoeficiente']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            &nbsp;
                        </div>
                    </td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['maximo']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['unidad']); ?>&nbsp;</td>
                    <td><?= $respuestaCoeficiente['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaCoeficiente['RespuestaCoeficiente']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaCoeficiente['RespuestaCoeficiente']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaCoeficiente['RespuestaCoeficiente']['user_modified'])); ?>&nbsp;</td>
                     
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
