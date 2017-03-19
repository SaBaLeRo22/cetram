<?php
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
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row <?php echo $pluralVar; ?> view">
<div class="col-md-4">
    <h2><?php echo __d( 'cake', 'View %s', $singularHumanName ); ?></h2>
    <hr/>
    <dl class="dl-horizontal">
        <?php
        foreach ($scaffoldFields as $_field) {
            $isKey = false;
            if ( !empty($associations['belongsTo']) ) {
                foreach ($associations['belongsTo'] as $_alias => $_details) {
                    if ( $_field === $_details['foreignKey'] ) {
                        $isKey = true;
                        echo "\t\t<dt>" . Inflector::humanize( $_alias ) . "</dt>\n";
                        echo "\t\t<dd>\n\t\t\t";
                        echo $this->Html->link(
                            ${$singularVar}[$_alias][$_details['displayField']],
                            array(
                                'plugin'     => $_details['plugin'],
                                'controller' => $_details['controller'],
                                'action'     => 'view',
                                ${$singularVar}[$_alias][$_details['primaryKey']]
                            )
                        );
                        echo "\n\t\t&nbsp;</dd>\n";
                        break;
                    }
                }
            }
            if ( $isKey !== true ) {
                echo "\t\t<dt>" . Inflector::humanize( $_field ) . "</dt>\n";
                echo "\t\t<dd>" . h( ${$singularVar}[$modelClass][$_field] ) . "&nbsp;</dd>\n";
            }
        }
        ?>
    </dl>

    <hr/>
    <div class="actions">
        <h3><i class="icon-wrench"></i> <?php echo __d( 'cake', 'Actions' ); ?></h3>

        <div class="list-group">
            <?php $action_link_attrs = array('class' => 'list-group-item'); ?>
            <?php
            echo $this->Html->link(
                __d( 'cake', 'Edit %s', $singularHumanName ),
                array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]), $action_link_attrs
            );
            echo $this->Form->postLink(
                __d( 'cake', 'Delete %s', $singularHumanName ),
                array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]), $action_link_attrs,
                __d( 'cake', 'Are you sure you want to delete # %s?', ${$singularVar}[$modelClass][$primaryKey] )
            );

            echo $this->Html->link(
                __d( 'cake', 'List %s', $pluralHumanName ), array('action' => 'index'), $action_link_attrs
            );
            echo $this->Html->link(
                __d( 'cake', 'New %s', $singularHumanName ), array('action' => 'add'), $action_link_attrs
            );

            $done = array();
            foreach ($associations as $_type => $_data) {
            foreach ($_data as $_alias => $_details) {
            ?>
        </div>
        <h4 class="text-muted"><?php echo Inflector::humanize( Inflector::underscore( $_alias ) ); ?></h4>

        <div class="list-group">
            <?php
            if ( $_details['controller'] != $this->name && !in_array( $_details['controller'], $done ) ) {
                echo $this->Html->link(
                    __d( 'cake', 'List %s', Inflector::humanize( $_details['controller'] ) ),
                    array(
                        'plugin'     => $_details['plugin'],
                        'controller' => $_details['controller'],
                        'action'     => 'index'
                    ),
                    $action_link_attrs
                );
                echo $this->Html->link(
                    __d( 'cake', 'New %s', Inflector::humanize( Inflector::underscore( $_alias ) ) ),
                    array(
                        'plugin'     => $_details['plugin'],
                        'controller' => $_details['controller'],
                        'action'     => 'add'
                    ),
                    $action_link_attrs
                );
                $done[] = $_details['controller'];
            }
            }
            }
            ?>
        </div>
    </div>

</div>
<div class="col-md-8">
    <?php
    if ( !empty($associations['hasOne']) ) :
        foreach ($associations['hasOne'] as $_alias => $_details): ?>
            <div class="related">
                <h3><?php echo __d( 'cake', "Related %s", Inflector::humanize( $_details['controller'] ) ); ?></h3>
                <?php if ( !empty(${$singularVar}[$_alias]) ): ?>
                    <dl class="dl-horizontal">
                        <?php
                        $otherFields = array_keys( ${$singularVar}[$_alias] );
                        foreach ($otherFields as $_field) {
                            echo "\t\t<dt>" . Inflector::humanize( $_field ) . "</dt>\n";
                            echo "\t\t<dd>\n\t" . ${$singularVar}[$_alias][$_field] . "\n&nbsp;</dd>\n";
                        }
                        ?>
                    </dl>
                <?php endif; ?>
                <div class="actions">
                    <ul>
                        <li><?php
                            echo $this->Html->link(
                                __d( 'cake', 'Edit %s', Inflector::humanize( Inflector::underscore( $_alias ) ) ),
                                array(
                                    'plugin'     => $_details['plugin'],
                                    'controller' => $_details['controller'],
                                    'action'     => 'edit',
                                    ${$singularVar}[$_alias][$_details['primaryKey']]
                                )
                            );
                            echo "</li>\n";
                            ?>
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
    $i = 0;
    foreach ($relations as $_alias => $_details):
        $otherSingularVar = Inflector::variable( $_alias );
        ?>
        <div class="related">
            <div class="actions">
                <ul class="nav nav-pills">
                    <li><?php echo $this->Html->link(
                            __d( 'cake', "New %s", Inflector::humanize( Inflector::underscore( $_alias ) ) ),
                            array(
                                'plugin'     => $_details['plugin'],
                                'controller' => $_details['controller'],
                                'action'     => 'add'
                            )
                        ); ?> </li>
                </ul>
            </div>
            <h3><?php echo __d( 'cake', "Related %s", Inflector::humanize( $_details['controller'] ) ); ?></h3>
            <?php if ( !empty(${$singularVar}[$_alias]) ): ?>
                <div class="table-responsive">
                    <table class="table" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <?php
                            $otherFields = array_keys( ${$singularVar}[$_alias][0] );
                            if ( isset($_details['with']) ) {
                                $index = array_search( $_details['with'], $otherFields );
                                unset($otherFields[$index]);
                            }
                            foreach ($otherFields as $_field) {
                                echo "\t\t<th>" . Inflector::humanize( $_field ) . "</th>\n";
                            }
                            ?>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $rel_table_action_attrs = array('class' => 'btn btn-default btn-xs');
                        foreach (${$singularVar}[$_alias] as ${$otherSingularVar}):
                            echo "\t\t<tr>\n";

                            foreach ($otherFields as $_field) {
                                echo "\t\t\t<td>" . ${$otherSingularVar}[$_field] . "</td>\n";
                            }

                            echo "\t\t\t<td class=\"actions\">\n";
                            echo "\t\t\t\t";
                            echo $this->Html->link(
                                __d( 'cake', 'View' ),
                                array(
                                    'plugin'     => $_details['plugin'],
                                    'controller' => $_details['controller'],
                                    'action'     => 'view',
                                    ${$otherSingularVar}[$_details['primaryKey']]
                                ),
                                $rel_table_action_attrs
                            );
                            echo "\n";
                            echo "\t\t\t\t";
                            echo $this->Html->link(
                                __d( 'cake', 'Edit' ),
                                array(
                                    'plugin'     => $_details['plugin'],
                                    'controller' => $_details['controller'],
                                    'action'     => 'edit',
                                    ${$otherSingularVar}[$_details['primaryKey']]
                                ),
                                $rel_table_action_attrs
                            );
                            echo "\n";
                            echo "\t\t\t\t";
                            echo $this->Form->postLink(
                                __d( 'cake', 'Delete' ),
                                array(
                                    'plugin'     => $_details['plugin'],
                                    'controller' => $_details['controller'],
                                    'action'     => 'delete',
                                    ${$otherSingularVar}[$_details['primaryKey']]
                                ),
                                $rel_table_action_attrs,
                                __d(
                                    'cake', 'Are you sure you want to delete # %s?',
                                    ${$otherSingularVar}[$_details['primaryKey']]
                                )
                            );
                            echo "\n";
                            echo "\t\t\t</td>\n";
                            echo "\t\t</tr>\n";
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</div>

