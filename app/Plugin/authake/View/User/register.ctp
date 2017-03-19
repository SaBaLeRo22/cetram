<div class="row usuarios form">
	<div class="col-md-9">
		<h2><?= __('Registrar') ?></h2>
		<hr/>
				<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'register'),'class' => 'form-horizontal'));?>



					<?php if (! Configure::read('Authake.useEmailAsUsername') ): ?>

						<div class="form-group">
							<?= $this->Form->label('login', 'Usuario', array('class' => 'control-label col-xs-3')); ?>
							<?= $this->Form->input('login', array('size'=>'12')); ?>
						</div>

					<?php endif; ?>


		<div class="form-group">
			<?= $this->Form->label('nombre', 'Nombre', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('nombre', array('size'=>'50')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('apellido', 'Apellido', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('apellido', array('size'=>'50')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('email', 'E-Mail', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('email', array('size'=>'40')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('password1', 'Contrase&ntilde;a', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('password1', array('type'=>'password', 'value' => '', 'size'=>'12')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('password2', 'Repetir Contrase&ntilde;a', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('password2', array('type'=>'password', 'value' => '', 'size'=>'12')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('provincia_id', 'Provincia', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('provincia_id', array('empty' => 'Seleccionar...')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('localidad_id', 'Localidad', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('localidad_id', array('type' => 'select', 'empty' => 'Seleccionar...')); ?>
		</div>

		<div class="form-group">
			<?= $this->Form->label('sector_id', 'Sector', array('class' => 'control-label col-xs-3')); ?>
			<?= $this->Form->input('sector_id', array('empty' => 'Seleccionar...')); ?>
		</div>

		<div class="well well-sm text-right">
			<?= $this->Form->button('<i class="fa fa-save fa-fw"></i> Registrar', array('class' => 'btn btn-primary')); ?>
		</div>


	</div>
</div>
<?php $this->append('script') ?>
<script type="text/javascript">
	$('#UserProvinciaId').change(function(){
		$('#UserLocalidadId').load('../user/obtener_localidades/'+$('#UserProvinciaId').val());
	});
</script>
<?php $this->end() ?>