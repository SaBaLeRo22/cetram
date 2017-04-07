<div class="row usuarios form">
	<div class="col-md-9">
		<h2><?= __('Constrase&ntilde;a Perdida') ?></h2>
		<hr/>
				<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'lost_password'),'class' => 'form-horizontal'));?>



					<div class="form-group">
						<?= $this->Form->label('loginoremail', 'Correo o Usuario', array('class' => 'control-label col-xs-3')); ?>
						<?= $this->Form->input('loginoremail', array('size'=>'40')); ?>
					</div>



		<div class="well well-sm text-right">
						<?php echo $this->Form->end(array('div'=>false,'label'=>'Requerir Nueva','class'=>'action input-action btn btn-info'));?>
		</div>
						</div>
</div>