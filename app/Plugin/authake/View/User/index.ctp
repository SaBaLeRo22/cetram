<div id="content">
	<div class="container">
		<div class="section">
			<div class="section-header">
				<h3><?php  echo __('Perfil de '); echo $user['User']['nombre'];?></h3>
			</div>
			<div class="section-body">
				<div class="row-fluid">
					<div class="span2">
						<?php
						if(!empty($contact['Mail']))
						{
						 echo $this->Authake->Gravatar->get_gravatar($this->Authake->getUserMail(),130,'','',true);
						}
						?>
					</div>
					<div class="span10">
						<div class="page-header">
							<h3><?php echo __('Informaci&oacute;n de Usuario');?></h3>
						</div>
						<table class="table table-outer-bordered table-striped">
							<tbody>
								<tr>
								<th class="span3"><?php echo __('Usuario');?></th>
								<td><?php echo $user['User']['login']." <em>(ID {$user['User']['id']})</em>"; ?></td>
							</tr>
								<tr>
								<th>Grupos</th>
								<td>
									<?php
									if(!empty($user['Group']))
									{
									?>
									<div class="muted">
										<?php //pr($user['Group']);
									$gr = (count($user['Group'])) ? array() : array(__('Groups'));     // Specify Guest group if lonely group
									foreach($user['Group'] as $group)
										$gr[] = __($group['name']);
										if (empty($gr))
							                echo __('Guest');
							            else
							                echo implode(" ", $gr); ?>
									</div>
									<?php
									}
									?>
								</td>
							</tr>
								<tr>
								<th><?php echo __('Creado');?></th>
								<td colspan="2"><?php echo $this->Time->format('d/m/Y H:i', $this->Time->fromString($user['User']['created'])); ?></td>
							</tr>
							</tbody>
						</table>
						<div class="well well-small">
							<?php echo $this->Form->create('User', array('url' => array('controller' => 'user', 'action'=>'index')));?>
							<fieldset>
						        <legend><?php echo __('Modificar Perfil');?></legend>
						    	<?php
						        echo $this->Form->input('email', array('value'=>$user['User']['email'], 'size'=>'40', 'after'=>'<p>'.__('(Si se modifica, deber&aacute; confirmarlo antes del siguiente inicio de sesi&oacute;n)').'</p>'));

								echo $this->Form->input('nombre', array('label'=> __('Nombre') , 'value' => $user['User']['nombre'], 'size'=>'50'));
								echo $this->Form->input('apellido', array('label'=> __('Apellido') , 'value' => $user['User']['apellido'], 'size'=>'50'));

								echo $this->Form->input('sector_id', array('type'=>'select','empty' => 'Seleccionar...', 'label'=> __('Sector') , 'value' => $user['User']['sector_id']));

								echo $this->Form->input('password1', array('type'=>'password', 'label'=> __('Nueva Contrase&ntilde;a') , 'value' => '', 'size'=>'12'));
						        echo $this->Form->input('password2', array('type'=>'password',  'label'=> __('Ingresar contrase&ntilde;a nuevamente'), 'value' => '', 'size'=>'12'));
						    	?>

								<div class="form-group">
									<?= $this->Form->label('localidad_id', 'Localidad ('.$user['Localidad'][nombre].' - CP: '.$user['Localidad'][codigopostal].')', array('class' => 'control-label col-xs-3')); ?>
									<?= $this->Form->input('localidad_id', array('empty' => '')); ?>
								</div>

							</fieldset>
								<?php echo $this->Form->end(array('div'=>false,'label'=>'Guardar','class'=>'action input-action btn btn-success'));?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->append('script') ?>
<script type="text/javascript">

	(function ($) {

		$(function () {

			$('select#UserLocalidadId').selectize({
				//create: true,
				//createOnBlur: true,
				dropdownParent: 'body',
				load: function (query, callback) {

					if (!query.length) return callback();
					$.ajax({

						url: "<?= $this->Html->url(array('action' => 'search_by_localidad')) ?>/" + encodeURIComponent(query),

						type: 'GET',

						error: function () {
							//alert(query);
							callback();
						},
						success: function (res) {
							//alert(query);
							callback(res);
						}
					});
				}
			});
		})
	})(jQuery);
</script>
<?php $this->end() ?>