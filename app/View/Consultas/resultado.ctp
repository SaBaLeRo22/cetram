<?php 
/**
 * @var $this View
 */
?>
<div class="row consultas view">
    <div class="col-md-12">
        <h2>Informe de Resultados</h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                <dt style="width: 90px;"><?= __('Id'); ?></dt>
                <dd style="margin-left: 100px;">
                    <?= h($consulta['Consulta']['id']); ?>
                    &nbsp;
                </dd>
                <dt style="width: 90px;"><?= __('Localidad'); ?></dt>
                <dd style="margin-left: 100px;">
                    <?= h($consulta['Localidade']['nombre']); ?>
                    &nbsp;
                </dd>
                <dt style="width: 90px;"><?= __('Ipk'); ?></dt>
                <dd style="margin-left: 100px;">
                    <?= h($consulta['Consulta']['ipk']); ?>
                    &nbsp;
                </dd>
                <dt style="width: 90px;"><?= __('Subsidio Pax'); ?></dt>
                <dd style="margin-left: 100px;">
                    <?= h($consulta['Consulta']['subsidio_pax']); ?>
                    &nbsp;
                </dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt style="width: 90px;">Estado</dt>
                <dd style="margin-left: 100px;"><?= h($consulta['Estado']['nombre']); ?>&nbsp;</dd>
                <dt style="width: 90px;">Modo</dt>
                <dd style="margin-left: 100px;"><?= h($consulta['Modo']['nombre']); ?>&nbsp;</dd>
                <dt style="width: 90px;">Usuario</dt>
                <dd style="margin-left: 100px;"><?= h($this->Authake->getUsuario($consulta['Consulta']['user_created'])); ?>&nbsp;</dd>
                <dt style="width: 90px;">E-Mail</dt>
                <dd style="margin-left: 100px;"><?= h($this->Authake->getUser($consulta['Consulta']['user_created'])['User']['email']); ?>&nbsp;</dd>
                <dt style="width: 90px;">Creada</dt>
                <dd style="margin-left: 100px;"><?= h($consulta['Consulta']['created']); ?>&nbsp;</dd>
                <dt style="width: 90px;">Modificada</dt>
                <dd style="margin-left: 100px;"><?= h($consulta['Consulta']['modified']); ?>&nbsp;</dd>
            </dl>
        </div>
    </div>
    <div class="col-md-8">
        <div class="related">
            <div class="actions">
                <?= $this->Html->link(__('<i class="fa fa-paper-plane-o fa-fw"></i>'), array('action' => 'enviar', $consulta['Consulta']['id']), array('class' => 'btn btn-sm btn-info')); ?>
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvresumen', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
                <?= $this->Html->link(__('<i class="fa fa-file-pdf-o fa-fw"></i>'), array('action' => 'resultado', $consulta['Consulta']['id'], 'ext' => 'pdf'), array('class' => 'btn btn-sm btn-danger')); ?>

            </div>
            <h3><?= __('Resumen'); ?></h3>

            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Resultado'); ?></th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle"><?= __('Inferior'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center; vertical-align: middle"><?= __('Minimo'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle"><?= __('Estimado'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center; vertical-align: middle"><?= __('Maximo'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle"><?= __('Superior'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td><strong>Costo<BR>(por kilometro)</strong></td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_inferior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_minimo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_maximo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['costo_superior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                    </tr>

                    <tr>
                        <td><strong>Tarifa de Equilibrio<BR>(sin subsidios)</strong></td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_inferior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_minima'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_maxima'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['tarifa_superior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                    </tr>

                    <tr>
                        <td><strong>Tarifa de Equilibrio<BR>(con subsidios)</strong></td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_inferior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_minimo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_maximo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= h(number_format($consulta['Consulta']['subsidio_superior'], 3, ',', '.')); ?>
                            &nbsp;</td>
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

            <?php if ($consulta['RespuestaIndicadore']['0']['evento_id'] == '2'): ?>
                <div class="col-md-4 card text-white bg-success mb-3">
                    <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['0']['indicador']; ?>&nbsp;</div>
                    <div class="card-body">
                        <h4 class="card-title"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['0']['evento']; ?>&nbsp;</h4>
                        <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['0']['mensaje']; ?>&nbsp;</p>
                    </div>
                </div>
                <?php elseif ($consulta['RespuestaIndicadore']['0']['evento_id'] == '4'): ?>
                    <div class="col-md-4 card text-white bg-warning mb-3">
                        <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['0']['indicador']; ?>&nbsp;</div>
                        <div class="card-body">
                            <h4 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['0']['evento']; ?>&nbsp;</h4>
                            <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['0']['mensaje']; ?>&nbsp;</p>
                        </div>
                    </div>
                 <?php else: ?>
                    <div class="col-md-4 card text-white bg-danger mb-3">
                        <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['0']['indicador']; ?>&nbsp;</div>
                        <div class="card-body">
                            <h4 class="card-title"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['0']['evento']; ?>&nbsp;</h4>
                            <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['0']['mensaje']; ?>&nbsp;</p>
                        </div>
                    </div>
                  <?php endif; ?>


            <?php if ($consulta['RespuestaIndicadore']['1']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['1']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['1']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['1']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['1']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['1']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['1']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['1']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['1']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['1']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['1']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['2']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['2']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['2']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['2']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['2']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['2']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['2']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['2']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['2']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['2']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['2']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php endif; ?>

        <br>

            <?php if ($consulta['RespuestaIndicadore']['3']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['3']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['3']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['3']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['3']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['3']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['3']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['3']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['3']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['3']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['3']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['4']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['4']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['4']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['4']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['4']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['4']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['4']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['4']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['4']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['4']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['4']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['5']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['5']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['5']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['5']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['5']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['5']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['5']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['5']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3">
                <div class="card-header" style="text-align: center"><?= $consulta['RespuestaIndicadore']['5']['indicador']; ?>&nbsp;</div>
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;<?= $consulta['RespuestaIndicadore']['5']['evento']; ?>&nbsp;</h4>
                    <p class="card-text" style="font-style: italic"><?= $consulta['RespuestaIndicadore']['5']['mensaje']; ?>&nbsp;</p>
                </div>
            </div>
            <?php endif; ?>

        </div>

    </div>
</div>

                                <div class="row consultas view">
                                    <div class="col-md-12">
        <div class="related">
            <h3><?= __('Gr&aacute;ficos de Incidencia'); ?></h3>


            <div id="estimado" data-highcharts-chart="0"></div>
            <hr>
            <div id="rango" data-highcharts-chart="1"></div>
            <hr>
            <div id="extremo" data-highcharts-chart="2"></div>


        </div>
        <hr/>

        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvtipos', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
            <h3><?= __('Tipos'); ?></h3>
            <?php if (!empty($consulta['RespuestaTipo'])): ?>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Tipo'); ?></th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Minimo'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Inferior'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Estimado'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Superior'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Maximo'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaTipo'] as $respuestaTipo): ?>
                    <tr>
                        <td><strong><?= $respuestaTipo['tipo']; ?>&nbsp;</strong></td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['minimo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['incidencia_minimo'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['inferior'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['incidencia_inferior'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['valor'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['incidencia_valor'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['superior'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['incidencia_superior'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['maximo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaTipo['incidencia_maximo'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvitems', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
            <h3><?= __('Items'); ?></h3>
            <?php if (!empty($consulta['RespuestaItem'])): ?>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Item'); ?></th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Minimo'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Inferior'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Estimado'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Superior'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Maximo'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaItem'] as $respuestaItem): ?>
                    <tr>
                        <td><strong><?= $respuestaItem['item']; ?>&nbsp;</strong></td>
                        <td style="text-align: center"><?= number_format($respuestaItem['minimo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['incidencia_minimo'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['inferior'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['incidencia_inferior'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['valor'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['incidencia_valor'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['superior'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['incidencia_superior'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['maximo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaItem['incidencia_maximo'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvpreguntas', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
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
                        <td style="text-align: center"><?= $respuestaPregunta['respuesta']; ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= $respuestaPregunta['unidad']; ?>
                            &nbsp;</td>

                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvpasajeros', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
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
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            01'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            02'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            03'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            04'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            05'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            06'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            07'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            08'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            09'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            10'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            11'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Mes<br>
                            12'); ?>
                        </th>
                        <?php else: ?>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Semestre<br>
                            1'); ?>
                        </th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Semestre<br>
                            2'); ?>
                        </th>
                        <?php endif; ?>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaPasajero'] as $respuestaPasajero): ?>
                    <tr>

                        <?php if ($respuestaPasajero['base'] == '1'): ?>
                        <td class="btn-success"><strong><?= $respuestaPasajero['tarifa']; ?>
                            &nbsp;</strong> (BASE)
                        </td>
                        <td class="btn-success"
                            style="text-align: center"><?= number_format($respuestaPasajero['costo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <?php else: ?>
                        <td><strong><?= $respuestaPasajero['tarifa']; ?>&nbsp;</strong></td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['costo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <?php endif; ?>

                        <?php if ($sube['RespuestaPregunta']['opcione_id'] == '24'): ?>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes01'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes02'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes03'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes04'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes05'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes06'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes07'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes08'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes09'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes10'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes11'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['mes12'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <?php else: ?>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['semestre1'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaPasajero['semestre2'], 0, ',', '.'); ?>
                            &nbsp;</td>
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
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvsalarios', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
            <h3><?= __('Respuesta Salarios'); ?></h3>
            <?php if (!empty($consulta['RespuestaSalario'])): ?>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Categoria'); ?>
                            &nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Salario'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Cantidad'); ?>
                            &nbsp;<br>(Personas)&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Antiguedad'); ?>
                            &nbsp;<br>(A&ntilde;os)&nbsp;</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaSalario'] as $respuestaSalario): ?>
                    <tr>

                        <td><strong><?= $respuestaSalario['categoria']; ?>&nbsp;</strong></td>
                        <td style="text-align: center"><?= number_format($respuestaSalario['salario'], 2, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaSalario['cantidad'], 0, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaSalario['antiguedad'], 0, ',', '.'); ?>
                            &nbsp;</td>

                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvparametros', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
            <h3><?= __('Parametros'); ?></h3>
            <?php if (!empty($consulta['RespuestaParametro'])): ?>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>

                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Parametro'); ?>
                            &nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Valor'); ?>
                            &nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Unidad'); ?>
                            &nbsp;</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaParametro'] as $respuestaParametro): ?>


                    <?php if ($respuestaParametro['editado'] == '1'): ?>
                            <tr class="alert alert-warning" role="alert">
                        <?php else: ?>
                             <tr>
                        <?php endif; ?>

                        <td><strong><?= $respuestaParametro['parametro']; ?>&nbsp;</strong></td>
                        <td style="text-align: center"><?= number_format($respuestaParametro['valor'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= $respuestaParametro['unidad']; ?>
                            &nbsp;</td>

                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvcoeficientes', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
            <h3><?= __('Coeficientes'); ?></h3>
            <?php if (!empty($consulta['RespuestaCoeficiente'])): ?>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Coeficiente'); ?></th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle"><?= __('Minimo'); ?>
                            &nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle"><?= __('Valor'); ?>
                            &nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle"><?= __('Maximo'); ?>
                            &nbsp;</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaCoeficiente'] as $respuestaCoeficiente): ?>
                    <tr>

                        <td><strong><?= $respuestaCoeficiente['coeficiente']; ?>&nbsp;</strong>
                        </td>
                        <td style="text-align: center"><?= number_format($respuestaCoeficiente['minimo'], 5, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaCoeficiente['valor'], 5, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center"><?= number_format($respuestaCoeficiente['maximo'], 5, ',', '.'); ?>
                            &nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>
        <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-file-excel-o fa-fw"></i>', ['action' => 'csvindicadores', $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-success']); ?>
            </div>
            <h3><?= __('Detalle Indicadores'); ?></h3>
            <?php if (!empty($consulta['RespuestaIndicadore'])): ?>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Indicador'); ?></th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Alerta'); ?></th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Evento'); ?></th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Notificar'); ?></th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Accion'); ?></th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle"><?= __('Valor'); ?>
                            &nbsp;</th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle"><?= __('Minimo'); ?>
                            &nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle"><?= __('Maximo'); ?>
                            &nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Unidad'); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaIndicadore'] as $respuestaIndicadore): ?>

                    <?php if ($respuestaIndicadore['evento_id'] == '2'): ?>
                        <tr class="alert alert-success" role="alert">
                    <?php elseif ($respuestaIndicadore['evento_id'] == '4'): ?>
                        <tr class="alert alert-warning" role="alert">
                    <?php else: ?>
                        <tr class="alert alert-danger" role="alert">
                    <?php endif; ?>

                        <td><strong><?= $respuestaIndicadore['indicador']; ?>&nbsp;</strong>
                        </td>
                        <td style="text-align: center"><?= $respuestaIndicadore['alerta']; ?>&nbsp;</td>
                        <td style="text-align: center"><?= $respuestaIndicadore['evento']; ?>&nbsp;</td>

                        <?php if ($respuestaIndicadore['notificar'] == '1'): ?>
                        <td  class="alert alert-info" role="alert" style="text-align: center"><strong>SI</strong></td>
                        <?php else: ?>
                        <td style="text-align: center">NO</td>
                        <?php endif; ?>

                        <?php if ($respuestaIndicadore['evento_id'] == '2'): ?>
                        <td style="text-align: center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
                        <?php elseif ($respuestaIndicadore['evento_id'] == '4'): ?>
                        <td style="text-align: center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></td>
                        <?php else: ?>
                        <td style="text-align: center"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></td>
                        <?php endif; ?>

                        <td style="text-align: center"><?= number_format($respuestaIndicadore['valor'], 3, ',', '.'); ?>
                            &nbsp;</td>

                        <?php if ($respuestaIndicadore['menor'] == '1'): ?>
                        <td style="text-align: center"><=</td>
                        <?php else: ?>
                        <td style="text-align: center"><?= number_format($respuestaIndicadore['minimo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <?php endif; ?>

                        <?php if ($respuestaIndicadore['mayor'] == '1'): ?>
                        <td style="text-align: center">>=</td>
                        <?php else: ?>
                        <td style="text-align: center"><?= number_format($respuestaIndicadore['maximo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <?php endif; ?>

                        <td style="text-align: center"><?= $respuestaIndicadore['unidad']; ?>
                            &nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>

        <div class="well well-sm" style="overflow-x:auto;overflow-y:auto">
            <strong>Observaciones: </strong>

            <p style="white-space:pre-line">            <?= h($consulta['Consulta']['observaciones']); ?></p>
        </div>

        <div class="well well-sm text-center">
            <?= $this->Html->link(__('<i class="fa fa-paper-plane-o fa-fw"></i> Enviar por E-Mail'), array('action' => 'enviar', $consulta['Consulta']['id']), array('class' => 'btn btn-success')); ?>
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
                linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
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
    //Highcharts.setOptions(Highcharts.theme);

    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });

    <?=
            $script = "
            $(function () {
                $('#estimado').highcharts({
                    chart: {
                        zoomType: 'xy'
                    },
                    title: {
                        text: 'Incidencias'
                    },
                    subtitle: {
                        text: 'Estimado'
                    },
                    xAxis: [{
                        categories: [],
                        crosshair: true
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            format: '<b>{value:.2f}%</b>',
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
                    plotOptions: {
                        column: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                        name: 'Incidencia',
                        type: 'column',
                        showInLegend: false,
                        data: [{
                            name: 'Combustible',
                            y: ".(number_format($consulta['RespuestaItem'][0]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Filtros y Lubricantes',
                            y: ".(number_format($consulta['RespuestaItem'][1]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Neumaticos ',
                            y: ".(number_format($consulta['RespuestaItem'][2]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Reparaciones, Repuestos y Accesorios',
                            y: ".(number_format($consulta['RespuestaItem'][3]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Costo del Capital Invertido',
                            y: ".(number_format($consulta['RespuestaItem'][4]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Personal',
                            y: ".(number_format($consulta['RespuestaItem'][5]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'SUBE',
                            y: ".(number_format($consulta['RespuestaItem'][6]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Gastos Generales y Seguro',
                            y: ".(number_format($consulta['RespuestaItem'][7]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Impuestos y Tasas',
                            y: ".(number_format($consulta['RespuestaItem'][8]['incidencia_valor'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[4]
                        }],
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y:.2f}%</b>'
                        },
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y:.2f}%</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    },
                        {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie',
                            name: 'Incidencia',
                            data: [{
                                name: 'Costos Variables de Estructura',
                                y: ".(number_format($consulta['RespuestaTipo'][0]['incidencia_valor'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[2]
                            }, {
                                name: 'Costos Fijos de Estructura',
                                y: ".(number_format($consulta['RespuestaTipo'][1]['incidencia_valor'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[3]
                            }, {
                                name: 'Impuestos',
                                y: ".(number_format($consulta['RespuestaTipo'][2]['incidencia_valor'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[4],
                                sliced: true,
                                selected: true
                            }],
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            center: [900, 0],
                            size: 100,
                            showInLegend: true,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.percentage:.2f} %</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    ]
                });


                $('#rango').highcharts({
                    chart: {
                        zoomType: 'xy'
                    },
                    title: {
                        text: 'Incidencias'
                    },
                    subtitle: {
                        text: 'Rangos'
                    },
                    xAxis: [{
                        categories: [],
                        crosshair: true
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            format: '<b>{value:.2f}%</b>',
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
                    plotOptions: {
                        column: {
                            grouping: false,
                            shadow: false,
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                        name: 'Incidencia Sup',
                        type: 'column',
                        showInLegend: false,
                        data: [{
                            name: 'Combustible',
                            y: ".(number_format($consulta['RespuestaItem'][0]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Filtros y Lubricantes',
                            y: ".(number_format($consulta['RespuestaItem'][1]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Neumaticos ',
                            y: ".(number_format($consulta['RespuestaItem'][2]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Reparaciones, Repuestos y Accesorios',
                            y: ".(number_format($consulta['RespuestaItem'][3]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Costo del Capital Invertido',
                            y: ".(number_format($consulta['RespuestaItem'][4]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Personal',
                            y: ".(number_format($consulta['RespuestaItem'][5]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'SUBE',
                            y: ".(number_format($consulta['RespuestaItem'][6]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Gastos Generales y Seguro',
                            y: ".(number_format($consulta['RespuestaItem'][7]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Impuestos y Tasas',
                            y: ".(number_format($consulta['RespuestaItem'][8]['incidencia_superior'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[4]
                        }],


                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y:.2f}%</b>'
                        },
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y:.2f}%</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    },
                        {
                            name: 'Incidencia Inf',
                            type: 'column',
                            showInLegend: false,
                            data: [{
                                name: 'Combustible',
                                y: ".(number_format($consulta['RespuestaItem'][0]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Filtros y Lubricantes',
                                y: ".(number_format($consulta['RespuestaItem'][1]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Neumaticos ',
                                y: ".(number_format($consulta['RespuestaItem'][2]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Reparaciones, Repuestos y Accesorios',
                                y: ".(number_format($consulta['RespuestaItem'][3]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Costo del Capital Invertido',
                                y: ".(number_format($consulta['RespuestaItem'][4]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Personal',
                                y: ".(number_format($consulta['RespuestaItem'][5]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'SUBE',
                                y: ".(number_format($consulta['RespuestaItem'][6]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Gastos Generales y Seguro',
                                y: ".(number_format($consulta['RespuestaItem'][7]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Impuestos y Tasas',
                                y: ".(number_format($consulta['RespuestaItem'][8]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[7]
                            }],
                            pointPadding: 0.2,

                            tooltip: {
                                pointFormat: '<br>{series.name}: <b>{point.y:.2f}%</b>'
                            },
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.y:.2f}%</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        },
                        {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie',
                            name: 'Incidencia Inf',
                            data: [{
                                name: 'Costos Variables de Estructura Inf',
                                y: ".(number_format($consulta['RespuestaTipo'][0]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Costos Fijos de Estructura Inf',
                                y: ".(number_format($consulta['RespuestaTipo'][1]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Impuestos Inf',
                                y: ".(number_format($consulta['RespuestaTipo'][2]['incidencia_inferior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[7],
                                sliced: true,
                                selected: true
                            }],
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            center: [100, 0],
                            size: 100,
                            showInLegend: true,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.percentage:.2f} %</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        },
                        {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie',
                            name: 'Incidencia Sup',
                            data: [{
                                name: 'Costos Variables de Estructura Sup',
                                y: ".(number_format($consulta['RespuestaTipo'][0]['incidencia_superior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[2]
                            }, {
                                name: 'Costos Fijos de Estructura Sup',
                                y: ".(number_format($consulta['RespuestaTipo'][1]['incidencia_superior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[3]
                            }, {
                                name: 'Impuestos Sup',
                                y: ".(number_format($consulta['RespuestaTipo'][2]['incidencia_superior'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[4],
                                sliced: true,
                                selected: true
                            }],
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            center: [900, 0],
                            size: 100,
                            showInLegend: true,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.percentage:.2f} %</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    ]
                });


                $('#extremo').highcharts({
                    chart: {
                        zoomType: 'xy'
                    },
                    title: {
                        text: 'Incidencias'
                    },
                    subtitle: {
                        text: 'Extremos'
                    },
                    xAxis: [{
                        categories: [],
                        crosshair: true
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            format: '<b>{value:.2f}%</b>',
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
                    plotOptions: {
                        column: {
                            grouping: false,
                            shadow: false,
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                        name: 'Incidencia Max',
                        type: 'column',
                        showInLegend: false,
                        data: [{
                            name: 'Combustible',
                            y: ".(number_format($consulta['RespuestaItem'][0]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Filtros y Lubricantes',
                            y: ".(number_format($consulta['RespuestaItem'][1]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Neumaticos ',
                            y: ".(number_format($consulta['RespuestaItem'][2]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Reparaciones, Repuestos y Accesorios',
                            y: ".(number_format($consulta['RespuestaItem'][3]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[2]
                        }, {
                            name: 'Costo del Capital Invertido',
                            y: ".(number_format($consulta['RespuestaItem'][4]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Personal',
                            y: ".(number_format($consulta['RespuestaItem'][5]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'SUBE',
                            y: ".(number_format($consulta['RespuestaItem'][6]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Gastos Generales y Seguro',
                            y: ".(number_format($consulta['RespuestaItem'][7]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[3]
                        }, {
                            name: 'Impuestos y Tasas',
                            y: ".(number_format($consulta['RespuestaItem'][8]['incidencia_maximo'] * 100, 2, '.', '')).",
                            color: Highcharts.getOptions().colors[4]
                        }],


                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y:.2f}%</b>'
                        },
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y:.2f}%</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    },
                        {
                            name: 'Incidencia Min',
                            type: 'column',
                            showInLegend: false,
                            data: [{
                                name: 'Combustible',
                                y: ".(number_format($consulta['RespuestaItem'][0]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Filtros y Lubricantes',
                                y: ".(number_format($consulta['RespuestaItem'][1]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Neumaticos ',
                                y: ".(number_format($consulta['RespuestaItem'][2]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Reparaciones, Repuestos y Accesorios',
                                y: ".(number_format($consulta['RespuestaItem'][3]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Costo del Capital Invertido',
                                y: ".(number_format($consulta['RespuestaItem'][4]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Personal',
                                y: ".(number_format($consulta['RespuestaItem'][5]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'SUBE',
                                y: ".(number_format($consulta['RespuestaItem'][6]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Gastos Generales y Seguro',
                                y: ".(number_format($consulta['RespuestaItem'][7]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Impuestos y Tasas',
                                y: ".(number_format($consulta['RespuestaItem'][8]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[7]
                            }],
                            pointPadding: 0.2,

                            tooltip: {
                                pointFormat: '<br>{series.name}: <b>{point.y:.2f}%</b>'
                            },
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.y:.2f}%</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        },
                        {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie',
                            name: 'Incidencia Min',
                            data: [{
                                name: 'Costos Variables de Estructura Min',
                                y: ".(number_format($consulta['RespuestaTipo'][0]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[5]
                            }, {
                                name: 'Costos Fijos de Estructura Min',
                                y: ".(number_format($consulta['RespuestaTipo'][1]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[6]
                            }, {
                                name: 'Impuestos Min',
                                y: ".(number_format($consulta['RespuestaTipo'][2]['incidencia_minimo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[7],
                                sliced: true,
                                selected: true
                            }],
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            center: [100, 0],
                            size: 100,
                            showInLegend: true,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.percentage:.2f} %</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        },
                        {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie',
                            name: 'Incidencia Max',
                            data: [{
                                name: 'Costos Variables de Estructura Max',
                                y: ".(number_format($consulta['RespuestaTipo'][0]['incidencia_maximo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[2]
                            }, {
                                name: 'Costos Fijos de Estructura Max',
                                y: ".(number_format($consulta['RespuestaTipo'][1]['incidencia_maximo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[3]
                            }, {
                                name: 'Impuestos Max',
                                y: ".(number_format($consulta['RespuestaTipo'][2]['incidencia_maximo'] * 100, 2, '.', '')).",
                                color: Highcharts.getOptions().colors[4],
                                sliced: true,
                                selected: true
                            }],
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            center: [900, 0],
                            size: 100,
                            showInLegend: true,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.percentage:.2f} %</b>',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    ]
                });


            });

    ";

    $this->Html->scriptBlock($script, array('inline' => false));
    ?>

</script>