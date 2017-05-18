<?php 
/**
 * @var $this LocalView
 */
?><div class="row respuestaPreguntas index">
    <div class="col-md-9">
        <h2><?= __('Respuesta Preguntas'); ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('consulta_id'); ?></th>
                    <th><?= $this->Paginator->sort('pregunta_id'); ?></th>
                    <th><?= $this->Paginator->sort('pregunta'); ?></th>
                    <th><?= $this->Paginator->sort('valor'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id'); ?></th>
                    <th><?= $this->Paginator->sort('unidad'); ?></th>
                    <th><?= $this->Paginator->sort('respuesta'); ?></th>
                    <th><?= $this->Paginator->sort('opcione_id'); ?></th>
                    <th><?= $this->Paginator->sort('funcion'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($respuestaPreguntas as $respuestaPregunta): ?> 
                <tr>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['id']); ?>&nbsp;</td>
                    <td><?= $respuestaPregunta['Consulta']['tarifa']; ?></td><td><?= $respuestaPregunta['Pregunta']['pregunta']; ?></td><td><?= h($respuestaPregunta['RespuestaPregunta']['pregunta']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $respuestaPregunta['RespuestaPregunta']['valor'] ),
                        array( 'action' => 'view', $respuestaPregunta['RespuestaPregunta']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-plus"></i> Ver', array('action' => 'view', $respuestaPregunta['RespuestaPregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $respuestaPregunta['RespuestaPregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?> 
                            &nbsp;
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'delete', $respuestaPregunta['RespuestaPregunta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $respuestaPregunta['RespuestaPregunta']['valor'])); ?>                 
                        </div>
                    </td> 
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['minimo']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['maximo']); ?>&nbsp;</td>
                    <td><?= $respuestaPregunta['Unidade']['nombre']; ?></td><td><?= h($respuestaPregunta['RespuestaPregunta']['unidad']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['respuesta']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['opcione_id']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['funcion']); ?>&nbsp;</td>
                    <td><?= $respuestaPregunta['Estado']['nombre']; ?></td><td><?= h($respuestaPregunta['RespuestaPregunta']['created']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['modified']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['user_created']); ?>&nbsp;</td>
                    <td><?= h($respuestaPregunta['RespuestaPregunta']['user_modified']); ?>&nbsp;</td>
                     
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
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>
            
            <div class="list-group">
                <?= $this->Html->link(__('Agregar Respuesta Pregunta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
                 
            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Preguntas'), array('controller' => 'preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Pregunta'), array('controller' => 'preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>
