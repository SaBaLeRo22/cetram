<?php
/**
 * Created by javier
 * Date: 03/04/14
 * Time: 14:18
 */
/**
 * @var $this LocalView
 * @var $message string
 * @var $type string
 */

if ( !isset( $type ) ) {
    $type = 'success';
}
?>
<div class="alert alert-<?= $type ?> alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-remove"></i></button>
    <?= $message; ?>
</div>