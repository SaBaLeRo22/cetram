<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaTipos index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Tipos'); ?></h2>
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
                    <th><?= $this->Paginator->sort('tipo'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_minimo'); ?></th>
                    <th><?= $this->Paginator->sort('inferior'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_inferior'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_valor'); ?></th>
                    <th><?= $this->Paginator->sort('superior'); ?></th>
                    <th><?= $this->Paginator->sort('incidencia_superior'); ?></th>
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
                <?php foreach ($respuestaTipos as $respuestaTipo): ?> 
                <tr>
                    <td><?= h($respuestaTipo['RespuestaTipo']['id']); ?>&nbsp;</td>

                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaTipo['Consulta']['id'] ),
                        array( 'action' => 'view', $respuestaTipo['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('controller' => 'consultas', 'action' => 'resultado', $respuestaTipo['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaTipo['RespuestaTipo']['tipo'] ),
                        array( 'action' => 'view', $respuestaTipo['RespuestaTipo']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaTipo['RespuestaTipo']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['incidencia_minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['inferior']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['incidencia_inferior']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['incidencia_valor']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['superior']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['incidencia_superior']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['maximo']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['incidencia_maximo']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['unidad']); ?>&nbsp;</td>
                    <td><?= $respuestaTipo['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaTipo['RespuestaTipo']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaTipo['RespuestaTipo']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaTipo['RespuestaTipo']['user_modified'])); ?>&nbsp;</td>
                     
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
