<?= "<?php 
/**
 * @var \$this View
 */
?>";
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row <?= $pluralVar; ?> view">
    <div class="col-md-12">
        <h2><?= "<?= \${$singularVar}['{$modelClass}']['{$displayField}'] ?>"; ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                <?php
                foreach ($fields as $field) {
                    if (in_array($field, array('deleted', 'created', 'modified', 'updated'))) {
                        continue;
                    }
                    $isKey = false;
                    if ( !empty($associations['belongsTo']) ) {
                        foreach ($associations['belongsTo'] as $alias => $details) {
                            if ( $field === $details['foreignKey'] ) {
                                $isKey = true;
                                echo "\t\t<dt><?= __('" . Inflector::humanize(
                                        Inflector::underscore( $alias )
                                    ) . "'); ?></dt>\n";
                                echo "\t\t<dd>\n\t\t\t<?= \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
                                break;
                            }
                        }
                    }
                    if ( $isKey !== true ) {
                        echo "\t\t<dt><?= __('" . Inflector::humanize( $field ) . "'); ?></dt>\n";
                        echo "\t\t<dd>\n\t\t\t<?= h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
                    }
                }
                ?>
            </dl>
            <dl class="dl-horizontal text-muted">
                <?php foreach ($fields as $field) {
                    if ( in_array( $field, array( 'deleted', 'created', 'modified', 'updated' ) ) ) { 
                    ?><dt><?= Inflector::humanize( $field ); ?></dt>
                    <dd><?= "<?= h(\${$singularVar}['{$modelClass}']['{$field}']); ?>" ?>&nbsp;</dd>
                <?php 
                    }
                } ?>
            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= "<?= __('Acciones'); ?>"; ?></h3>

            <div class="list-group">
                <?php $action_link_attrs = "array('class' => 'list-group-item')"; ?>
                <?php
                echo "\t\t<?= \$this->Html->link(__('Editar " . $singularHumanName . "'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), $action_link_attrs); ?> \n";
                echo "\t\t<?= \$this->Form->postLink(__('Eliminar " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), $action_link_attrs, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> \n";
                echo "\t\t<?= \$this->Html->link(__('Listado de " . $pluralHumanName . "'), array('action' => 'index'), $action_link_attrs); ?> \n";
                echo "\t\t<?= \$this->Html->link(__('Agregar " . $singularHumanName . "'), array('action' => 'add'), $action_link_attrs); ?> \n";
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <?php
        if ( !empty($associations['hasOne']) ) :
            foreach ($associations['hasOne'] as $alias => $details): ?>
        <div class="related">
            <h3><?= "<?= __('" . Inflector::humanize( $details['controller'] ) . "'); ?>"; ?></h3>
            <?= "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
            <dl class="dl-horizontal">
                <?php
                foreach ($details['fields'] as $field) {
                    echo "\t\t<dt><?= __('" . Inflector::humanize( $field ) . "'); ?></dt>\n";
                    echo "\t\t<dd>\n\t<?= \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
                }
                ?>
            </dl>
            <?= "<?php endif; ?>\n"; ?>
            <div class="actions">
                <ul class="list-unstyled">
                    <li><?= "<?= \$this->Html->link(__('Editar " . Inflector::humanize(
                                Inflector::underscore( $alias )
                            ) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n"; ?>
                </ul>
            </div>
        </div>
            <?php
            endforeach;
        endif;
        if ( empty($associations['hasMany']) ) {
            $associations['hasMany'] = array();
        }
        if ( empty($associations['hasAndBelongsToMany']) ) {
            $associations['hasAndBelongsToMany'] = array();
        }
        $relations = array_merge( $associations['hasMany'], $associations['hasAndBelongsToMany'] );
        foreach ($relations as $alias => $details):
            $otherSingularVar = Inflector::variable( $alias );
            $otherPluralHumanName = Inflector::humanize( $details['controller'] );
            ?>
        <div class="related">
            <div class="actions">
                <?= "<?= \$this->Html->link( '<i class=\"fa fa-plus fa-fw\"></i> Agregar " . Inflector::humanize( Inflector::underscore( $alias )) . 
                    "', ['controller' => '{$details['controller']}', 'action' => 'add', '{$singularVar}_id' => \${$singularVar}['{$modelClass}']['{$primaryKey}']], ['class' => 'btn btn-sm btn-info']); ?>"; ?> 
            </div>
            <h3><?= "<?= __('" . $otherPluralHumanName . "'); ?>"; ?></h3>
            <?= "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <?php
                    foreach ($details['fields'] as $field) {
                        echo "\t\t<th><?= __('" . Inflector::humanize( $field ) . "'); ?></th>\n";
                    }
                    ?>
                    <th class="actions"><?= "<?= __('Acciones'); ?>"; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $rel_table_action_attrs = "array('class' => 'btn btn-default btn-xs')";
                echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
                echo "\t\t<tr>\n";
                foreach ($details['fields'] as $field) {
                    echo "\t\t\t<td><?= \${$otherSingularVar}['{$field}']; ?></td>\n";
                }

                echo "\t\t\t<td class=\"actions\">\n";
                echo "\t\t\t\t<?= \$this->Html->link(__('Ver'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), $rel_table_action_attrs); ?>\n";
                echo "\t\t\t\t<?= \$this->Html->link(__('Editar'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), $rel_table_action_attrs); ?>\n";
                echo "\t\t\t\t<?= \$this->Form->postLink(__('Eliminar'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), $rel_table_action_attrs, __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
                echo "\t\t\t</td>\n";
                echo "\t\t</tr>\n";

                echo "\t<?php endforeach; ?>\n";
                ?>
                </tbody>
            </table>
            </div>
            <?= "<?php endif; ?>\n\n"; ?>
        </div>
        <hr/>
        <?php endforeach; ?>  
    </div>
</div>
