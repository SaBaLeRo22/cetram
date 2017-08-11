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


			<div id="estimado"></div>


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

		<div class="well well-sm" style="overflow-x:auto;overflow-y:auto">
			<strong>Observaaciones: </strong>
			<p style="white-space:pre-line">			<?= h($consulta['Consulta']['observaciones']); ?></p>
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

	<?=
			$script = "
			$(function () {
				$('#estimado').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Browser market shares. January, 2015 to May, 2015'
					},
					subtitle: {
						text: 'Click the columns to view versions.'
					},
					xAxis: {
						type: 'category'
					},
					yAxis: {
						title: {
							text: 'Total percent market share'
						}

					},
					legend: {
						enabled: false
					},
					plotOptions: {
						series: {
							borderWidth: 0,
							dataLabels: {
								enabled: true,
								format: '{point.y:.1f}%'
							}
						}
					},



					series: [{
						name: 'Brands',
						colorByPoint: true,
						data: [{
							name: 'Microsoft Internet Explorer',
							y: 56.33,
							drilldown: 'Microsoft Internet Explorer'
						}, {
							name: 'Chrome',
							y: 24.03,
							drilldown: 'Chrome'
						}, {
							name: 'Firefox',
							y: 10.38,
							drilldown: 'Firefox'
						}, {
							name: 'Safari',
							y: 4.77,
							drilldown: 'Safari'
						}, {
							name: 'Opera',
							y: 0.91,
							drilldown: 'Opera'
						}, {
							name: 'Proprietary or Undetectable',
							y: 0.2,
							drilldown: null
						}]
					}],
					drilldown: {
						series: [{
							name: 'Microsoft Internet Explorer',
							id: 'Microsoft Internet Explorer',
							data: [
								[
									'v11.0',
									24.13
								],
								[
									'v8.0',
									17.2
								],
								[
									'v9.0',
									8.11
								],
								[
									'v10.0',
									5.33
								],
								[
									'v6.0',
									1.06
								],
								[
									'v7.0',
									0.5
								]
							]
						}, {
							name: 'Chrome',
							id: 'Chrome',
							data: [
								[
									'v40.0',
									5
								],
								[
									'v41.0',
									4.32
								],
								[
									'v42.0',
									3.68
								],
								[
									'v39.0',
									2.96
								],
								[
									'v36.0',
									2.53
								],
								[
									'v43.0',
									1.45
								],
								[
									'v31.0',
									1.24
								],
								[
									'v35.0',
									0.85
								],
								[
									'v38.0',
									0.6
								],
								[
									'v32.0',
									0.55
								],
								[
									'v37.0',
									0.38
								],
								[
									'v33.0',
									0.19
								],
								[
									'v34.0',
									0.14
								],
								[
									'v30.0',
									0.14
								]
							]
						}, {
							name: 'Firefox',
							id: 'Firefox',
							data: [
								[
									'v35',
									2.76
								],
								[
									'v36',
									2.32
								],
								[
									'v37',
									2.31
								],
								[
									'v34',
									1.27
								],
								[
									'v38',
									1.02
								],
								[
									'v31',
									0.33
								],
								[
									'v33',
									0.22
								],
								[
									'v32',
									0.15
								]
							]
						}, {
							name: 'Safari',
							id: 'Safari',
							data: [
								[
									'v8.0',
									2.56
								],
								[
									'v7.1',
									0.77
								],
								[
									'v5.1',
									0.42
								],
								[
									'v5.0',
									0.3
								],
								[
									'v6.1',
									0.29
								],
								[
									'v7.0',
									0.26
								],
								[
									'v6.2',
									0.17
								]
							]
						}, {
							name: 'Opera',
							id: 'Opera',
							data: [
								[
									'v12.x',
									0.34
								],
								[
									'v28',
									0.24
								],
								[
									'v27',
									0.17
								],
								[
									'v29',
									0.16
								]
							]
						}]
					}
				});
			});
	";

	$this->Html->scriptBlock($script, array('inline' => false));
	?>
</script>