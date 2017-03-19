<?= "<?php 
/**
 * @var \$this LocalView
 */
?>";
/**
 * @var $this View
 */
$link_attrs = "array('class' => 'btn btn-default btn-xs')";
$link_info_attrs = "array('class' => 'btn btn-info btn-xs')";
$link_danger_attrs = "array('class' => 'btn btn-danger btn-xs')";
?>
<div class="row <?= $pluralVar; ?> index">
    <div class="col-md-9">
        <h2><?= "<?= __('{$pluralHumanName}'); ?>"; ?></h2>
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <?php foreach ($fields as $field): ?><th><?= "<?= \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                    <?php endforeach; ?> 
                </tr>
                </thead>
                <tbody>
                <?= "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>"; ?> 
                <tr>
                    <?php 
                    foreach ($fields as $field):
                        $isKey = false;
                        
                        if (!empty($associations['belongsTo'])):
                            foreach ($associations['belongsTo'] as $alias => $details):
                                if ($field === $details['foreignKey']):
                                    $isKey = true; 
                    ?><td><?= "<?= \${$singularVar}['{$alias}']['{$details['displayField']}']; ?>"; ?></td><?php           
                                    break;
                                endif;
                            endforeach;
                        endif;
                        if ( $field === $displayField ):
                    ?><td class="display-column">
                        <?= "<?= \$this->Html->link( h( \${$singularVar}['{$modelClass}']['{$field}'] ),
                        array( 'action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'] ) ); ?>"; ?>
                        
                        <div class="nowrap">
                            <?= "<?= \$this->Html->link( '<i class=\"fa fa-plus\"></i> Ver', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), $link_info_attrs); ?>"; ?> 
                            <?= "<?= \$this->Html->link( '<i class=\"fa fa-pencil\"></i> Editar', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), $link_info_attrs); ?>"; ?> 
                            &nbsp;
                            <?= "<?= \$this->Form->postLink( '<i class=\"fa fa-trash\"></i> Eliminar', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), $link_danger_attrs, __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', \${$singularVar}['{$modelClass}']['{$displayField}'])); ?>"; ?>                 
                        </div>
                    </td> 
                    <?php 
                        continue;
                        endif;
                        
                        if ($isKey !== true): 
                        ?><td><?= "<?= h(\${$singularVar}['{$modelClass}']['{$field}']); ?>"; ?>&nbsp;</td>
                    <?php
                        endif;
                    endforeach; ?> 
                </tr>
                <?= "<?php endforeach ?>" ?> 
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4">
                <small class="paging-text text-muted">
                    <?= "<?= \$this->Paginator->counter('Página {:page} de {:pages}, {:count} registros en total.'); ?>"; ?> 
                </small>
            </div>
            <div class="col-md-8 text-right">
                <ul class="pagination">
                    <?= "<?= \$this->Paginator->prev( '<i class=\"fa fa-angle-left\"></i>',
                        array( 'tag' => 'li', 'escape' => false ), null,
                        array( 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => false ) ); ?>"; ?>
                    <?= "<?= \$this->Paginator->numbers( array(
                        'separator'    => '',
                        'currentTag'   => 'a',
                        'currentClass' => 'active',
                        'tag'          => 'li',
                        'first'        => 1,
                        'last'         => 1,
                        'ellipsis'     => '<li class=\"disabled\"><a>...</a></li>'
                    ) ); ?>"; ?>
                    <?= "<?= \$this->Paginator->next( '<i class=\"fa fa-angle-right\"></i>',
                        array( 'tag' => 'li', 'currentClass' => 'disabled', 'escape' => false ), null,
                        array( 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => false ) ); ?>"; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= "<?= __('Acciones'); ?>"; ?></h3>
            
            <div class="list-group">
                <?php $action_link_attrs = "array('class' => 'list-group-item')"; ?><?= 
                "<?= \$this->Html->link(__('Agregar " . $singularHumanName . "'), array('action' => 'add'), $action_link_attrs); ?>"; ?> 
                <?php
                $done = array();
                foreach ($associations as $type => $data) {
                    foreach ($data as $alias => $details) {
                ?> 
            </div>
            <h4 class="text-muted"><?= Inflector::humanize(Inflector::underscore($alias)); ?></h4>
            <div class="list-group">
                <?php   if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                            echo "\t\t<?= \$this->Html->link(__('Listado de " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), $action_link_attrs); ?> \n";
                            echo "\t\t<?= \$this->Html->link(__('Agregar " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), $action_link_attrs); ?> \n";
                            $done[] = $details['controller'];
                        }
                    }
                }
                ?> 
            </div>
        </div>
    </div>
</div>
