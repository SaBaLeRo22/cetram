<?php 
/**
 * @var $this View
 */
?><div class="row consultas view">
    <div class="col-md-12">
        <h2>Informe de Resultados</h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['id']); ?>
			&nbsp;
		</dd>
				<dt><?= __('Localidad'); ?></dt>
				<dd>
					<?= h($consulta['Localidade']['nombre']); ?>
					&nbsp;
				</dd>
		<dt><?= __('Ipk'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['ipk']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Subsidio Pax'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['subsidio_pax']); ?>
			&nbsp;
		</dd>
			</dl>
				<dl class="dl-horizontal text-muted">
					<dt>Estado</dt>
					<dd><?= h($consulta['Estado']['nombre']); ?>&nbsp;</dd>
					<dt>Usuario</dt>
					<dd><?= h($this->Authake->getNombre($consulta['Consulta']['user_created'])); ?>&nbsp;</dd>
					<dt>Creada</dt>
					<dd><?= h($consulta['Consulta']['created']); ?>&nbsp;</dd>
					<dt>Modificada</dt>
					<dd><?= h($consulta['Consulta']['modified']); ?>&nbsp;</dd>
				</dl>
		</div>
		</div>
    <div class="col-md-8">
                <div class="related">
					<div class="actions">
						<?= $this->Html->link( '<i class="fa fa-paper-plane-o fa-fw"></i> Enviar por E-Mail', ['controller' => 'consultas', 'action' => 'resultado', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?>
					</div>
					<h3><?= __('Resumen'); ?></h3>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
		<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Resultado'); ?></th>
		<th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle"><?= __('Inferior'); ?>&nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
		<th style="background-color: #5bc0de; color: #eee; text-align: center; vertical-align: middle"><?= __('Minimo'); ?>&nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
		<th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle"><?= __('Estimado'); ?>&nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
		<th style="background-color: #f0ad4e; color: #eee; text-align: center; vertical-align: middle"><?= __('Maximo'); ?>&nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
		<th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle"><?= __('Superior'); ?>&nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                </tr>
                </thead>
                <tbody>

		<tr>
			<td><strong>Costo&nbsp;</strong></td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_inferior'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_minimo'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_maximo'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_superior'], 3, ',', '.')); ?>&nbsp;</td>
		</tr>

		<tr>
			<td><strong>Tarifa&nbsp;</strong></td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_inferior'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_minima'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_maxima'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_superior'], 3, ',', '.')); ?>&nbsp;</td>
		</tr>

		<tr>
			<td><strong>Subsidio&nbsp;</strong></td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_inferior'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_minimo'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_maximo'], 3, ',', '.')); ?>&nbsp;</td>
			<td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_superior'], 3, ',', '.')); ?>&nbsp;</td>
		</tr>

                </tbody>
            </table>
            </div>


        </div>
	</div>
</div>
<div class="row consultas view">
	<div class="col-md-12">

		<div class="related">
			<h3><?= __('Indicadores de Eficiencia'); ?></h3>

		</div>
		<hr/>

		<div class="related">
			<h3><?= __('Gr&aacute;ficos de Incidencia'); ?></h3>


			<div id="incidenciasitems"></div>


		</div>
		<hr/>

		<div class="related">
			<h3><?= __('Tipos'); ?></h3>
			<?php if (!empty($consulta['RespuestaTipo'])): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>

						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Tipo'); ?></th>
						<th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Inferior'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Minimo'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Estimado'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Maximo'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Superior'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>

					</tr>
					</thead>
					<tbody>
					<?php foreach ($consulta['RespuestaTipo'] as $respuestaTipo): ?>
					<tr>
						<td><strong><?= $respuestaTipo['tipo']; ?>&nbsp;</strong></td>
						<td style="text-align: center"><?= number_format($respuestaTipo['inferior'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['incidencia_inferior'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['minimo'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['incidencia_minimo'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['valor'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['incidencia_valor'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['maximo'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['incidencia_maximo'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['superior'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaTipo['incidencia_superior'] * 100, 3, ',', '.'); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>

		<div class="related">
			<h3><?= __('Items'); ?></h3>
			<?php if (!empty($consulta['RespuestaItem'])): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>

						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Item'); ?></th>
						<th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Inferior'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Minimo'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Estimado'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Maximo'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>
						<th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Superior'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Incidencia'); ?>&nbsp;<br>(%)&nbsp;</th>

					</tr>
					</thead>
					<tbody>
					<?php foreach ($consulta['RespuestaItem'] as $respuestaItem): ?>
					<tr>
						<td><strong><?= $respuestaItem['item']; ?>&nbsp;</strong></td>
						<td style="text-align: center"><?= number_format($respuestaItem['inferior'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['incidencia_inferior'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['minimo'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['incidencia_minimo'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['valor'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['incidencia_valor'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['maximo'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['incidencia_maximo'] * 100, 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['superior'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaItem['incidencia_superior'] * 100, 3, ',', '.'); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>

		<div class="related">
			<h3><?= __('Respuesta Preguntas'); ?></h3>
			<?php if (!empty($consulta['RespuestaPregunta'])): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>

						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Pregunta'); ?></th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Respuesta'); ?></th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Unidad'); ?></th>

					</tr>
					</thead>
					<tbody>
					<?php foreach ($consulta['RespuestaPregunta'] as $respuestaPregunta): ?>
					<tr>

						<td><strong><?= $respuestaPregunta['pregunta']; ?>&nbsp;</strong></td>
						<td style="text-align: center"><?= $respuestaPregunta['respuesta']; ?>&nbsp;</td>
						<td style="text-align: center"><?= $respuestaPregunta['unidad']; ?>&nbsp;</td>

					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>

		<div class="related">
			<h3>
				<?php if ($sube['RespuestaPregunta']['opcione_id'] == '24'): ?>
					<?= __('Pasajeros: "Posee SUBE"'); ?>
				<?php else: ?>
					<?= __('Pasajeros: "NO Posee SUBE"'); ?>
				<?php endif; ?>
			</h3>
			<?php if (!empty($consulta['RespuestaPasajero'])): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Tarifa'); ?></th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Costo'); ?></th>

						<?php if ($sube['RespuestaPregunta']['opcione_id'] == '24'): ?>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>01'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>02'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>03'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>04'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>05'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>06'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>07'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>08'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>09'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>10'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>11'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>12'); ?></th>
						<?php else: ?>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Semestre<br>1'); ?></th>
							<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Semestre<br>2'); ?></th>
						<?php endif; ?>

					</tr>
					</thead>
					<tbody>
					<?php foreach ($consulta['RespuestaPasajero'] as $respuestaPasajero): ?>
					<tr>

						<?php if ($respuestaPasajero['base'] == '1'): ?>
							<td class="btn-success"><strong><?= $respuestaPasajero['tarifa']; ?>&nbsp;</strong> (BASE)</td>
						<td class="btn-success" style="text-align: center"><?= number_format($respuestaPasajero['costo'], 3, ',', '.'); ?>&nbsp;</td>
						<?php else: ?>
							<td><strong><?= $respuestaPasajero['tarifa']; ?>&nbsp;</strong></td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['costo'], 3, ',', '.'); ?>&nbsp;</td>
						<?php endif; ?>

						<?php if ($sube['RespuestaPregunta']['opcione_id'] == '24'): ?>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes01'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes02'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes03'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes04'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes05'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes06'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes07'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes08'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes09'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes10'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes11'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['mes12'], 0, ',', '.'); ?>&nbsp;</td>
						<?php else: ?>
							<td style="text-align: center"><?= number_format($respuestaPasajero['semestre1'], 0, ',', '.'); ?>&nbsp;</td>
							<td style="text-align: center"><?= number_format($respuestaPasajero['semestre2'], 0, ',', '.'); ?>&nbsp;</td>
						<?php endif; ?>

					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>

		<div class="related">
			<h3><?= __('Respuesta Salarios'); ?></h3>
			<?php if (!empty($consulta['RespuestaSalario'])): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>

						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Categoria'); ?>&nbsp;</th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Salario'); ?>&nbsp;<br>($)&nbsp;</th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Cantidad'); ?>&nbsp;<br>(Personas)&nbsp;</th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Antiguedad'); ?>&nbsp;<br>(A&ntilde;os)&nbsp;</th>

					</tr>
					</thead>
					<tbody>
					<?php foreach ($consulta['RespuestaSalario'] as $respuestaSalario): ?>
					<tr>

						<td><strong><?= $respuestaSalario['categoria']; ?>&nbsp;</strong></td>
						<td style="text-align: center"><?= number_format($respuestaSalario['salario'], 2, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaSalario['cantidad'], 0, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= number_format($respuestaSalario['antiguedad'], 0, ',', '.'); ?>&nbsp;</td>

					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>

		<div class="related">
			<h3><?= __('Parametros'); ?></h3>
			<?php if (!empty($consulta['RespuestaParametro'])): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>

						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Parametro'); ?>&nbsp;</th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Valor'); ?>&nbsp;</th>
						<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Unidad'); ?>&nbsp;</th>

					</tr>
					</thead>
					<tbody>
					<?php foreach ($consulta['RespuestaParametro'] as $respuestaParametro): ?>
					<tr>

						<td><strong><?= $respuestaParametro['parametro']; ?>&nbsp;</strong></td>
						<td style="text-align: center"><?= number_format($respuestaParametro['valor'], 3, ',', '.'); ?>&nbsp;</td>
						<td style="text-align: center"><?= $respuestaParametro['unidad']; ?>&nbsp;</td>

					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>

                <div class="related">
            <h3><?= __('Coeficientes'); ?></h3>
            <?php if (!empty($consulta['RespuestaCoeficiente'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>

					<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Coeficiente'); ?></th>
					<th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle"><?= __('Minimo'); ?>&nbsp;</th>
					<th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle"><?= __('Valor'); ?>&nbsp;</th>
					<th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle"><?= __('Maximo'); ?>&nbsp;</th>

                </tr>
                </thead>
                <tbody>
                	<?php foreach ($consulta['RespuestaCoeficiente'] as $respuestaCoeficiente): ?>
		<tr>

			<td><strong><?= $respuestaCoeficiente['coeficiente']; ?>&nbsp;</strong></td>
			<td style="text-align: center"><?= number_format($respuestaCoeficiente['minimo'], 5, ',', '.'); ?>&nbsp;</td>
			<td style="text-align: center"><?= number_format($respuestaCoeficiente['valor'], 5, ',', '.'); ?>&nbsp;</td>
			<td style="text-align: center"><?= number_format($respuestaCoeficiente['maximo'], 5, ',', '.'); ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>
                <div class="related">
            <h3><?= __('Indicadores'); ?></h3>
            <?php if (!empty($consulta['RespuestaIndicadore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>

					<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Indicador'); ?></th>
					<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Notificar'); ?></th>
					<th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle"><?= __('Minimo'); ?>&nbsp;</th>
					<th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle"><?= __('Valor'); ?>&nbsp;</th>
					<th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle"><?= __('Maximo'); ?>&nbsp;</th>
					<th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Unidad'); ?></th>

                </tr>
                </thead>
                <tbody>
                	<?php foreach ($consulta['RespuestaIndicadore'] as $respuestaIndicadore): ?>
		<tr>
			<td><strong><?= $respuestaIndicadore['indicador']; ?>&nbsp;</strong></td>

			<?php if ($respuestaIndicadore['notificar'] == '1'): ?>
			<td class="btn-success" style="text-align: center">SI</td>
			<?php else: ?>
			<td style="text-align: center">NO</td>
			<?php endif; ?>

			<td style="text-align: center"><?= number_format($respuestaIndicadore['minimo'], 3, ',', '.'); ?>&nbsp;</td>
			<td style="text-align: center"><?= number_format($respuestaIndicadore['valor'], 3, ',', '.'); ?>&nbsp;</td>
			<td style="text-align: center"><?= number_format($respuestaIndicadore['maximo'], 3, ',', '.'); ?>&nbsp;</td>
			<td style="text-align: center"><?= $respuestaIndicadore['unidad']; ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

		<div class="well well-sm">
			<strong>Observaaciones: </strong>
			<p>			<?= h($consulta['Consulta']['observaciones']); ?>
				&nbsp;</p>
		</div>

		<div class="well well-sm text-center">
			<?= $this->Html->link( '<i class="fa fa-paper-plane-o fa-fw"></i> Enviar por E-Mail', ['controller' => 'consultas', 'action' => 'resultado', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-success']); ?>
			<div style="clear: both;"></div>
		</div>



          
    </div>
</div>

<!--
Gráficos
-->

<script type='text/javascript' charset='utf-8'>

	/**
	 * Dark theme for Highcharts JS
	 * @author Torstein Honsi
	 */

// Load the fonts
	Highcharts.createElement('link', {
		href: 'https://fonts.googleapis.com/css?family=Unica+One',
		rel: 'stylesheet',
		type: 'text/css'
	}, null, document.getElementsByTagName('head')[0]);

	Highcharts.theme = {
		colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
			"#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
		chart: {
			backgroundColor: {
				linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
				stops: [
					[0, '#2a2a2b'],
					[1, '#3e3e40']
				]
			},
			style: {
				fontFamily: "'Unica One', sans-serif"
			},
			plotBorderColor: '#606063'
		},
		title: {
			style: {
				color: '#E0E0E3',
				textTransform: 'uppercase',
				fontSize: '20px'
			}
		},
		subtitle: {
			style: {
				color: '#E0E0E3',
				textTransform: 'uppercase'
			}
		},
		xAxis: {
			gridLineColor: '#707073',
			labels: {
				style: {
					color: '#E0E0E3'
				}
			},
			lineColor: '#707073',
			minorGridLineColor: '#505053',
			tickColor: '#707073',
			title: {
				style: {
					color: '#A0A0A3'

				}
			}
		},
		yAxis: {
			gridLineColor: '#707073',
			labels: {
				style: {
					color: '#E0E0E3'
				}
			},
			lineColor: '#707073',
			minorGridLineColor: '#505053',
			tickColor: '#707073',
			tickWidth: 1,
			title: {
				style: {
					color: '#A0A0A3'
				}
			}
		},
		tooltip: {
			backgroundColor: 'rgba(0, 0, 0, 0.85)',
			style: {
				color: '#F0F0F0'
			}
		},
		plotOptions: {
			series: {
				dataLabels: {
					color: '#B0B0B3'
				},
				marker: {
					lineColor: '#333'
				}
			},
			boxplot: {
				fillColor: '#505053'
			},
			candlestick: {
				lineColor: 'white'
			},
			errorbar: {
				color: 'white'
			}
		},
		legend: {
			itemStyle: {
				color: '#E0E0E3'
			},
			itemHoverStyle: {
				color: '#FFF'
			},
			itemHiddenStyle: {
				color: '#606063'
			}
		},
		credits: {
			style: {
				color: '#666'
			}
		},
		labels: {
			style: {
				color: '#707073'
			}
		},

		drilldown: {
			activeAxisLabelStyle: {
				color: '#F0F0F3'
			},
			activeDataLabelStyle: {
				color: '#F0F0F3'
			}
		},

		navigation: {
			buttonOptions: {
				symbolStroke: '#DDDDDD',
				theme: {
					fill: '#505053'
				}
			}
		},

		// scroll charts
		rangeSelector: {
			buttonTheme: {
				fill: '#505053',
				stroke: '#000000',
				style: {
					color: '#CCC'
				},
				states: {
					hover: {
						fill: '#707073',
						stroke: '#000000',
						style: {
							color: 'white'
						}
					},
					select: {
						fill: '#000003',
						stroke: '#000000',
						style: {
							color: 'white'
						}
					}
				}
			},
			inputBoxBorderColor: '#505053',
			inputStyle: {
				backgroundColor: '#333',
				color: 'silver'
			},
			labelStyle: {
				color: 'silver'
			}
		},

		navigator: {
			handles: {
				backgroundColor: '#666',
				borderColor: '#AAA'
			},
			outlineColor: '#CCC',
			maskFill: 'rgba(255,255,255,0.1)',
			series: {
				color: '#7798BF',
				lineColor: '#A6C7ED'
			},
			xAxis: {
				gridLineColor: '#505053'
			}
		},

		scrollbar: {
			barBackgroundColor: '#808083',
			barBorderColor: '#808083',
			buttonArrowColor: '#CCC',
			buttonBackgroundColor: '#606063',
			buttonBorderColor: '#606063',
			rifleColor: '#FFF',
			trackBackgroundColor: '#404043',
			trackBorderColor: '#404043'
		},

		// special colors for some of the
		legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
		background2: '#505053',
		dataLabelsColor: '#B0B0B3',
		textColor: '#C0C0C0',
		contrastTextColor: '#F0F0F3',
		maskColor: 'rgba(255,255,255,0.3)'
	};

	// Apply the theme
	Highcharts.setOptions(Highcharts.theme);

	<?=
			$script = "
			$(function () {
				$('#incidenciasitems').highcharts({
					chart: {
						zoomType: 'xy'
					},
					title: {
						text: 'Incidencias'
					},
					subtitle: {
						text: 'Items'
					},
					xAxis: [{
						categories: [" . $incidencias_estimado_item['items'] . "],
						crosshair: true
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							format: '{value}',
							style: {
								color: Highcharts.getOptions().colors[1]
							}
						},
						title: {
							text: 'Incidencia (%)',
							style: {
								color: Highcharts.getOptions().colors[1]
							}
						}
					}],
					tooltip: {
						shared: true
					},
					legend: {
						layout: 'vertical',
						align: 'left',
						x: 75,
						verticalAlign: 'top',
						y: 0,
						floating: true,
						backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
					},
					series: [{
						name: 'Abiertos',
						type: 'column',
						data: [" . $incidencias_estimado_item['incidencias'] . "],
						tooltip: {
							valueSuffix: ' tickets'
						}

					},
						{
							name: 'Cerrados',
							type: 'column',
							data: [" . $incidencias_estimado_item['incidencias'] . "],
							tooltip: {
								valueSuffix: ' tickets'
							}
						},
						{
							name: 'Promedio Abiertos',
							type: 'spline',
							data: [" . $incidencias_estimado_item['incidencias'] . "],
							tooltip: {
								valueSuffix: ' tickets'
							}
						},
						{
							name: 'Promedio Cerrados',
							type: 'spline',
							data: [" . $incidencias_estimado_item['incidencias'] . "],
							tooltip: {
								valueSuffix: ' tickets'
							}
						}]
				});
			});

	";

	$this->Html->scriptBlock($script, array('inline' => false));
	?>
</script>