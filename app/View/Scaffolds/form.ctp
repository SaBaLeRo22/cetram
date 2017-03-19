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
<div class="row <?php echo $pluralVar; ?> form">
    <div class="col-md-9">
        <?php if ( $this->request->action === 'add' ): ?>
            <h2><?php echo __( 'Nuevo ' ) . $singularHumanName; ?></h2>
        <?php else: ?>
            <h2><?php echo __( 'Editar ' ) . $singularHumanName; ?></h2>
        <?php endif; ?>
        <hr/>
        <?php
        echo $this->Form->create( array('class' => 'form-horizontal') );
        //        $this->Form->inputDefaults(array(
        //            'class' => 'form-control',
        //            'div' => array('class' => 'form-group'),
        //        ));
        foreach ($scaffoldFields as $_field): ?>
            <?php if ( $_field === $primaryKey ): ?>
                <?php echo $this->Form->input( $_field ); ?>
            <?php else: ?>
                <div class="form-group">
                    <?php echo $this->Form->label( $_field, null, array('class' => 'control-label col-xs-3') ); ?>
                    <?php echo $this->Form->input(
                        $_field, array(
                            'label'     => false,
                            'div'       => array('class' => 'col-xs-9'),
                            'class'     => 'form-control',
                            'separator' => ''
                        )
                    ); ?>
                </div>
            <?php endif; ?>
            <!--            echo $this->Form->input($_field, array(-->
            <!--                    'label' => array()-->
            <!--                ));-->
        <?php endforeach ?>
        <div class="well well-sm">
            <?php echo $this->Form->button( __( 'Submit' ), array('class' => 'btn btn-primary') ); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?php echo __d( 'cake', 'Actions' ); ?></h3>

            <div class="list-group">
                <?php $action_link_attrs = array('class' => 'list-group-item'); ?>
                <?php if ( $this->request->action !== 'add' ): ?>
                    <?php echo $this->Form->postLink(
                        __d( 'cake', 'Delete' ),
                        array('action' => 'delete', $this->Form->value( $modelClass . '.' . $primaryKey )),
                        $action_link_attrs,
                        __d(
                            'cake', 'Are you sure you want to delete # %s?',
                            $this->Form->value( $modelClass . '.' . $primaryKey )
                        )
                    );
                    ?>
                <?php endif; ?>
                <?php echo $this->Html->link(
                    __d( 'cake', 'List' ) . ' ' . $pluralHumanName, array('action' => 'index'), $action_link_attrs
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
                    echo "\t\t" . $this->Html->link(
                            __d( 'cake', 'List %s', Inflector::humanize( $_details['controller'] ) ),
                            array(
                                'plugin'     => $_details['plugin'],
                                'controller' => $_details['controller'],
                                'action'     => 'index'
                            ),
                            $action_link_attrs
                        ) . "\n";
                    echo "\t\t" . $this->Html->link(
                            __d( 'cake', 'New %s', Inflector::humanize( Inflector::underscore( $_alias ) ) ),
                            array(
                                'plugin'     => $_details['plugin'],
                                'controller' => $_details['controller'],
                                'action'     => 'add'
                            ),
                            $action_link_attrs
                        ) . "\n";
                    $done[] = $_details['controller'];
                }
                }
                }
                ?>
            </div>
        </div>
    </div>
</div>
