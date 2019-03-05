<?php

/**
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
/**
 * @var $this View
 */
$this->extend('default');
?>
<?php $this->start('menu'); ?>

<?php $this->end(); ?>

<?= $this->fetch('content') ?>

