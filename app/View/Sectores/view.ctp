<?php 
/**
 * @var $this View
 */
?><div class="row sectores view">
    <div class="col-md-12">
        <h2><?= $sectore['Sectore']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Sector'), array('action' => 'edit', $sectore['Sectore']['id']), array('class' => 'list-group-item')); ?>
		<?= $this->Form->postLink(__('Eliminar Sector'), array('action' => 'eliminar', $sectore['Sectore']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $sectore['Sectore']['id'])); ?>
		<?= $this->Html->link(__('Listado de Sectores'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Sector'), array('action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                <dt><?= __('Id'); ?></dt>
                <dd>
                    <?= h($sectore['Sectore']['id']); ?>
                    &nbsp;
                </dd>
                <dt><?= __('Nombre'); ?></dt>
                <dd>
                    <?= h($sectore['Sectore']['nombre']); ?>
                    &nbsp;
                </dd>

            </dl>
            <dl class="dl-horizontal text-muted">
                <dt><?= __('Estado'); ?></dt>
                <dd>
                    <?= $this->Html->link($sectore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $sectore['Estado']['id'])); ?>
                    &nbsp;
                </dd>
                <dt>Created</dt>
                <dd><?= h($sectore['Sectore']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                <dd><?= h($sectore['Sectore']['modified']); ?>&nbsp;</dd>
            </dl>
        </div>
        <hr/>
    </div>
</div>
