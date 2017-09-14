<?php 
/**
 * @var $this LocalView
 */
?><div class="row preguntas index">
    <div class="col-md-12">
        <h2><?= __('Preguntas'); ?></h2>
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
                    <th><?= $this->Paginator->sort('pregunta'); ?></th>
                    <th><?= $this->Paginator->sort('descripcion'); ?></th>
                    <th><?= $this->Paginator->sort('orden'); ?></th>
                    <th><?= $this->Paginator->sort('minimo'); ?></th>
                    <th><?= $this->Paginator->sort('maximo'); ?></th>
                    <th><?= $this->Paginator->sort('multiplicadore_id', 'Multiplicador'); ?></th>
                    <th><?= $this->Paginator->sort('agrupamiento_id'); ?></th>
                    <th><?= $this->Paginator->sort('opciones'); ?></th>
                    <th><?= $this->Paginator->sort('unidade_id', 'Unidad'); ?></th>
                    <th><?= $this->Paginator->sort('titulo'); ?></th>
                    <th><?= $this->Paginator->sort('ayuda'); ?></th>
                    <th><?= $this->Paginator->sort('tipo'); ?></th>
                    <th><?= $this->Paginator->sort('step'); ?></th>
                    <th><?= $this->Paginator->sort('ambito_id'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id'); ?></th>
                    <th><?= $this->Paginator->sort('created'); ?></th>
                    <th><?= $this->Paginator->sort('modified'); ?></th>
                    <th><?= $this->Paginator->sort('user_created'); ?></th>
                    <th><?= $this->Paginator->sort('user_modified'); ?></th>
                     
                </tr>
                </thead>
                <tbody>
                <?php foreach ($preguntas as $pregunta): ?> 
                <tr>

                    <?php if ($pregunta['Pregunta']['estado_id'] == '2'): ?>
                        <td class="alert-danger"><?= h($pregunta['Pregunta']['id']); ?>&nbsp;</td>
                    <?php else: ?>
                        <td><?= h($pregunta['Pregunta']['id']); ?>&nbsp;</td>
                    <?php endif ?>

                    <td class="display-column">
                        <?= $this->Html->link( h( $pregunta['Pregunta']['pregunta'] ),
                        array( 'action' => 'view', $pregunta['Pregunta']['id'] ) ); ?>                        
                        <div class="nowrap">
                            <?= $this->Html->link( '<i class="fa fa-eye"></i> Ver', array('action' => 'view', $pregunta['Pregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i> Editar', array('action' => 'edit', $pregunta['Pregunta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?php if ($pregunta['Pregunta']['estado_id'] != '2'): ?>
                                &nbsp;
                                <?= $this->Form->postLink( '<i class="fa fa-trash"></i> Eliminar', array('action' => 'eliminar', $pregunta['Pregunta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $pregunta['Pregunta']['pregunta'])); ?>
                            <?php endif ?>
                        </div>
                    </td> 
                    <td><?= h($pregunta['Pregunta']['descripcion']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['orden']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['minimo']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['maximo']); ?>&nbsp;</td>
                    <td><?= $pregunta['Multiplicadore']['nombre']; ?></td><td><?= $pregunta['Agrupamiento']['nombre']; ?></td><td><?= h($pregunta['Pregunta']['opciones']); ?>&nbsp;</td>
                    <td><?= $pregunta['Unidade']['nombre']; ?></td><td><?= h($pregunta['Pregunta']['titulo']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['ayuda']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['tipo']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['step']); ?>&nbsp;</td>
                    <td><?= $pregunta['Ambito']['nombre']; ?></td><td><?= $pregunta['Estado']['nombre']; ?></td>
                    <td><?= h($pregunta['Pregunta']['created']); ?>&nbsp;</td>
                    <td><?= h($pregunta['Pregunta']['modified']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($pregunta['Pregunta']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($pregunta['Pregunta']['user_modified'])); ?>&nbsp;</td>
                     
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
