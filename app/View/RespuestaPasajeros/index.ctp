<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaPasajeros index">
    <div class="col-md-12">
        <h2><?= __('Respuesta Pasajeros'); ?></h2>
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
                    <th><?= $this->Paginator->sort('tarifa'); ?></th>
                    <th><?= $this->Paginator->sort('sube'); ?></th>
                    <th><?= $this->Paginator->sort('base'); ?></th>
                    <th><?= $this->Paginator->sort('costo'); ?></th>
                    <th><?= $this->Paginator->sort('semestre1'); ?></th>
                    <th><?= $this->Paginator->sort('semestre2'); ?></th>
                    <th><?= $this->Paginator->sort('mes01'); ?></th>
                    <th><?= $this->Paginator->sort('mes02'); ?></th>
                    <th><?= $this->Paginator->sort('mes03'); ?></th>
                    <th><?= $this->Paginator->sort('mes04'); ?></th>
                    <th><?= $this->Paginator->sort('mes05'); ?></th>
                    <th><?= $this->Paginator->sort('mes06'); ?></th>
                    <th><?= $this->Paginator->sort('mes07'); ?></th>
                    <th><?= $this->Paginator->sort('mes08'); ?></th>
                    <th><?= $this->Paginator->sort('mes09'); ?></th>
                    <th><?= $this->Paginator->sort('mes10'); ?></th>
                    <th><?= $this->Paginator->sort('mes11'); ?></th>
                    <th><?= $this->Paginator->sort('mes12'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaPasajeros as $respuestaPasajero): ?> 
                <tr>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaPasajero['Consulta']['id'] ),
                        array( 'controller' => 'consultas', 'action' => 'resultado', $respuestaPasajero['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('controller' => 'consultas', 'action' => 'resultado', $respuestaPasajero['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaPasajero['RespuestaPasajero']['tarifa'] ),
                        array( 'action' => 'view', $respuestaPasajero['RespuestaPasajero']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'view', $respuestaPasajero['RespuestaPasajero']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        </div>
                    </td>
                    <td><?php if ($respuestaPasajero['RespuestaPasajero']['sube']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>&nbsp;</td>
                    <td><?php if ($respuestaPasajero['RespuestaPasajero']['base']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['costo']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['semestre1']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['semestre2']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes01']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes02']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes03']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes04']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes05']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes06']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes07']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes08']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes09']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes10']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes11']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['mes12']); ?>&nbsp;</td>
                    <td><?= $respuestaPasajero['Estado']['nombre']; ?></td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaPasajero['RespuestaPasajero']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaPasajero['RespuestaPasajero']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($respuestaPasajero['RespuestaPasajero']['user_modified'])); ?>&nbsp;</td>
                     
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
