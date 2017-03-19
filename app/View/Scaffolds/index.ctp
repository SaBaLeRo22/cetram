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
/**
 * @var $this View
 */
?>
<div class="row <?php echo $pluralVar; ?> index">
    <div class="col-md-9">
        <div>
            <?php if ( in_array( $pluralVar, array('feriados', 'acontecimientos') ) ): ?>
                <div class="pull-right">
                    <form action="#" class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="yearFilter">Seleccionar año</label>
                            <?php echo $this->Form->year(
                                'yearFilter', 2012, 2016, array(
                                    'class'   => 'form-control',
                                    'empty'   => false,
                                    'default' => 2014
                                )
                            ); ?>
                        </div>
                        <button type="submit" class="btn btn-default">Cambiar año</button>
                    </form>
                </div>
            <?php endif; ?>
            <h2><?php echo $pluralHumanName; ?></h2>
        </div>
        <table class="table table-hover" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <?php foreach ($scaffoldFields as $_field): ?>
                    <th><?php echo $this->Paginator->sort( $_field ); ?></th>
                <?php endforeach; ?>
                <th><?php echo __d( 'cake', 'Actions' ); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $link_attrs = array('class' => 'btn btn-default btn-xs');
            foreach (${$pluralVar} as ${$singularVar}):
                echo '<tr>';
                foreach ($scaffoldFields as $_field) {
                    $isKey = false;
                    if ( !empty($associations['belongsTo']) ) {
                        foreach ($associations['belongsTo'] as $_alias => $_details) {
                            if ( $_field === $_details['foreignKey'] ) {
                                $isKey = true;
                                echo '<td>' . $this->Html->link(
                                        ${$singularVar}[$_alias][$_details['displayField']], array(
                                            'controller' => $_details['controller'],
                                            'action'     => 'view',
                                            ${$singularVar}[$_alias][$_details['primaryKey']]
                                        )
                                    ) . '</td>';
                                break;
                            }
                        }
                    }
                    if ( $isKey !== true ) {
                        echo '<td>' . h( ${$singularVar}[$modelClass][$_field] ) . '</td>';
                    }
                }

                echo '<td class="actions">';
                echo $this->Html->link(
                    __d( 'cake', 'View' ), array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]),
                    $link_attrs
                );
                echo ' ' . $this->Html->link(
                        __d( 'cake', 'Edit' ), array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]),
                        $link_attrs
                    );
                echo ' ' . $this->Form->postLink(
                        __d( 'cake', 'Delete' ),
                        array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]),
                        $link_attrs,
                        __d(
                            'cake', 'Are you sure you want to delete # %s?', ${$singularVar}[$modelClass][$primaryKey]
                        )
                    );
                echo '</td>';
                echo '</tr>';

            endforeach;

            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-5">
                <small class="paging-text text-muted">
                    <?php echo $this->Paginator->counter(
                        'Página {:page} de {:pages}, {:count} registros en total.'
                    );?>
                </small>
            </div>
            <div class="col-md-7 text-right">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev(
                        __( 'Anterior' ), array('tag' => 'li'), null,
                        array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')
                    );
                    echo $this->Paginator->numbers(
                        array(
                            'separator'    => '',
                            'currentTag'   => 'a',
                            'currentClass' => 'active',
                            'tag'          => 'li',
                            'first'        => 1,
                            'last'         => 1,
                            'ellipsis'     => '<li class="disabled"><a>...</a></li>'
                        )
                    );
                    echo $this->Paginator->next(
                        __( 'Siguiente' ), array('tag' => 'li', 'currentClass' => 'disabled'), null,
                        array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')
                    );
                    ?>
                </ul>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?php echo __d( 'cake', 'Actions' ); ?></h3>

            <div class="list-group">
                <?php $action_link_attrs = array('class' => 'list-group-item'); ?>
                <?php echo $this->Html->link(
                    __d( 'cake', 'New %s', $singularHumanName ), array('action' => 'add'), $action_link_attrs
                ); ?>
                <?php
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
</div>

