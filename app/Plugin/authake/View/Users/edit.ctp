<?php $this->Html->addCrumb('Edit User', $this->Html->url( null, true )); ?>
<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3>Modify User <?php echo $this->data['User']['login']; ?></h3>
				<div class="section-actions">
					<?php echo $this->Html->link(__('View user'), array('action'=>'view', $this->Form->value('User.id')), array('class'=>'btn btn-primary'));?>
					<a href="<?php echo $this->Html->url( array('controller'=> 'users', 'action'=>'index')); ?>" class="btn btn-link">Cancel</a>
					<?php echo $this->Html->link(__('Delete'), array('action'=>'delete', $this->Form->value('User.id')), array('class'=>'btn btn-danger'), sprintf(__('Are you sure you want to delete @%s?'), $this->Form->value('User.login'))); ?>
				</div>
			</div>
			<div class="section-body">
				<?php echo $this->Form->create('User');?>
				<div class="form-horizontal">
					<fieldset class="inputs">
						<legend>User Information</legend>
						<?php echo $this->Form->input('id');?>

						<div class="string control-group stringish" id="Nombre">
							<?php echo $this->Form->input('nombre', array('label'=>array('text'=>__('Nombre'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Nombre del usuario.</span></div>'));?>
						</div>
						<div class="string control-group stringish" id="Apellido">
							<?php echo $this->Form->input('apellido', array('label'=>array('text'=>__('Apellido'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Apellido del usuario.</span></div>'));?>
						</div>
							<div class="string control-group stringish" id="Email">
								<?php echo $this->Form->input('email', array('label'=>array('text'=>__('Email'),'class'=>'control-label'),'size'=>'100', 'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">User\'s email address. Choose a real one. Confirmation goes to this email.</span></div>'));?>
							</div>
						<div class="string control-group stringish" id="Provincia">
							<?php echo $this->Form->input('provincia_id', array('type' => 'select', 'options' => $provincias, 'empty' => 'Seleccionar...', 'label'=>array('text'=>__('Provincia'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Provincia del usuario.</span></div>'));?>
						</div>

						<div class="string control-group stringish" id="Localidad">
							<?php echo $this->Form->input('localidad_id', array('type' => 'select', 'empty' => 'Seleccionar...', 'label'=>array('text'=>__('Localidad'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Localidad del usuario.</span></div>'));?>
						</div>

						<div class="string control-group stringish" id="Sector">
							<?php echo $this->Form->input('sector_id', array('empty' => 'Seleccionar...', 'label'=>array('text'=>__('Sector'),'class'=>'control-label'),'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">Sector del usuario.</span></div>'));?>
						</div>



							<div class="string control-group stringish" id="Password">
								<?php echo $this->Form->input('password', array('label'=>array('text'=>__('Password (visible!)'),'class'=>'control-label'),'type'=>'text','value'=>'','size'=>'12' ,'between'=>'<div class="controls">', 'after'=>'</div>'));?>
							</div>
							<div class="string control-group stringish" id="passwordchangecode">
								<?php echo $this->Form->input('passwordchangecode', array('label'=>array('text'=>__('Password Change Code'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">This is the code sent to User\'s email address at any password change</span></div>'));?>
							</div>
							<div class="string control-group stringish" id="emailcheckcode">
								<?php echo $this->Form->input('emailcheckcode', array('label'=>array('text'=>__('Email Check Code'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'<span class="help-inline">This is the code sent to User\'s email address at to validate account</span></div>'));?>
							</div>
							<div class="string control-group stringish" id="expire_account">
								<?php echo $this->Form->input('expire_account', array('label'=>array('text'=>__('Account Expiry Date'),'class'=>'control-label'), 'between'=>'<div class="controls">', 'after'=>'</div>'));?>
							</div>
							<div class="string control-group stringish" id="disable">
								<div class="controls">
									<label class="checkbox">
										<?php 
									echo $this->Form->checkbox('disable');
									?> Disable User
								</label>
							</div>
						</div>
						<div class="string control-group stringish" id="Group">
							<?php echo $this->Form->input('Group', array('label'=>array('text'=>__('In groups Press \'Control\' for multi-selection'),'class'=>'control-label'),'style'=>'width: 15em;', 'between'=>'<div class="controls">', 'after'=>'</div>'));?>
						</div>
					</fieldset>
					<fieldset class="form-actions">
						<?php echo $this->Form->end(array('div'=>false,'label'=>'Edit','class'=>'action input-action btn btn-success'));?>
						<?php echo $this->Html->link(__('View user'), array('action'=>'view', $this->Form->value('User.id')), array('class'=>'btn btn-primary'));?>
						<a href="<?php echo $this->Html->url( array('controller'=> 'users', 'action'=>'index')); ?>" class="btn btn-link">Cancel</a>
						<?php echo $this->Html->link(__('Delete'), array('action'=>'delete', $this->Form->value('User.id')), array('class'=>'btn btn-danger'), sprintf(__('Are you sure you want to delete @%s?'), $this->Form->value('User.login'))); ?>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

//AJAX for Dynamic Drop down

$this->Js->get('#UserProvinciaId')->event('change',

$this->Js->request(array(

'plugin'=>NULL,

'controller'=>'localidades',

'action' =>'obtener_localidades',

), array(

'update' =>'#UserLocalidadId',

'async' => true,

'method' => 'Post',

'dataExpression'=>true,

'data'=> $this->Js->serializeForm(array(

'isForm' => true,

'inline' => true

))

))

);

// END AJAX

?>