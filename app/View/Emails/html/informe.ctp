<?php 
/**
 * @var $this View
 */
?>
<div class="row consultas view" style="margin-left: -15px;margin-right: -15px;box-sizing: border-box;">
    <div class="col-md-12" style="width: 100%;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;box-sizing: border-box;">
        <h2 style="font-size: 27px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;">Informe de Resultados</h2>
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;"/>
    </div>
    <div class="col-md-4" style="width: 33.33333333333333%;float: left;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;box-sizing: border-box;">
        <div class="well well-sm" style="padding: 9px;border-radius: 2px;min-height: 20px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid #e3e3e3;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);box-sizing: border-box;">
            <dl class="dl-horizontal" style="margin-bottom: 18px;box-sizing: border-box;">
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;"><?= __('Id'); ?></dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;">
                    <?= h($consulta['Consulta']['id']); ?>
                    &nbsp;
                </dd>
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;"><?= __('Localidad'); ?></dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;">
                    <?= h($consulta['Localidade']['nombre']); ?>
                    &nbsp;
                </dd>
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;"><?= __('Ipk'); ?></dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;">
                    <?= h($consulta['Consulta']['ipk']); ?>
                    &nbsp;
                </dd>
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;"><?= __('Subsidio Pax'); ?></dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;">
                    <?= h($consulta['Consulta']['subsidio_pax']); ?>
                    &nbsp;
                </dd>
            </dl>
            <dl class="dl-horizontal text-muted" style="color: #999;margin-bottom: 18px;box-sizing: border-box;">
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;color: #999;">Estado</dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;color: #999;"><?= h($consulta['Estado']['nombre']); ?>&nbsp;</dd>
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;color: #999;">Usuario</dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;color: #999;">Usuario </dd>
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;color: #999;">Creada</dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;color: #999;"><?= h($consulta['Consulta']['created']); ?>&nbsp;</dd>
                <dt style="float: left;width: 160px;clear: left;text-align: right;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-weight: 700;line-height: 1.428571429;box-sizing: border-box;color: #999;">Modificada</dt>
                <dd style="margin-bottom: 5px;margin-left: 180px;line-height: 1.428571429;box-sizing: border-box;color: #999;"><?= h($consulta['Consulta']['modified']); ?>&nbsp;</dd>
            </dl>
        </div>
    </div>
    <div class="col-md-8" style="width: 66.66666666666666%;float: left;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;box-sizing: border-box;">
        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Resumen'); ?></h3>

            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
                    <thead>
                    <tr>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Resultado'); ?></th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Inferior'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Minimo'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Estimado'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Maximo'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Superior'); ?>
                            &nbsp;<br>(<?= h($consulta['Unidade']['nombre']); ?>)&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><strong>Costo&nbsp;</strong></td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['costo_inferior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['costo_minimo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['costo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['costo_maximo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['costo_superior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                    </tr>

                    <tr>
                        <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><strong>Tarifa&nbsp;</strong></td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['tarifa_inferior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['tarifa_minima'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['tarifa'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['tarifa_maxima'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['tarifa_superior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                    </tr>

                    <tr>
                        <td style="padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><strong>Subsidio&nbsp;</strong></td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['subsidio_inferior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['subsidio_minimo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['subsidio'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['subsidio_maximo'], 3, ',', '.')); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= h(number_format($consulta['Consulta']['subsidio_superior'], 3, ',', '.')); ?>
                            &nbsp;</td>
                    </tr>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

<hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

<div class="row consultas view" style="margin-left: -15px;margin-right: -15px;box-sizing: border-box;">
    <div class="col-md-12" style="width: 100%;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;box-sizing: border-box;">

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Indicadores de Eficiencia'); ?></h3>

            <?php if ($consulta['RespuestaIndicadore']['0']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #28a745 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['0']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['0']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['0']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['0']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #ffc107 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['0']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['0']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['0']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #dc3545 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['0']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['0']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['0']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php endif; ?>


            <?php if ($consulta['RespuestaIndicadore']['1']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #28a745 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['1']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['1']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['1']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['1']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #ffc107 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['1']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['1']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['1']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #dc3545 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['1']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['1']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['1']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['2']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #28a745 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['2']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['2']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['2']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['2']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #ffc107 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['2']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['2']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['2']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #dc3545 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['2']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['2']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['2']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['3']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #28a745 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['3']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['3']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['3']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['3']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #ffc107 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['3']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['3']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['3']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #dc3545 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['3']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['3']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['3']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['4']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #28a745 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['4']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['4']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['4']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['4']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #ffc107 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['4']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['4']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['4']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #dc3545 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['4']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['4']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['4']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($consulta['RespuestaIndicadore']['5']['evento_id'] == '2'): ?>
            <div class="col-md-4 card text-white bg-success mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #28a745 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['5']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['5']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['5']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php elseif ($consulta['RespuestaIndicadore']['5']['evento_id'] == '4'): ?>
            <div class="col-md-4 card text-white bg-warning mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #ffc107 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['5']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['5']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['5']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4 card text-white bg-danger mb-3" style="margin-bottom: 1rem !important;color: #fff !important;background-color: #dc3545 !important;flex-flow: column wrap;position: relative;display: block;flex-direction: column;max-width: 32%;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;margin-left: 0px;margin-right: 10px;min-height: 200px;width: 33.33333333333333%;float: left;padding-left: 15px;padding-right: 15px;box-sizing: border-box">
                <div class="card-header" style="text-align: center;border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                    <?= $consulta['RespuestaIndicadore']['5']['indicador']; ?>&nbsp;
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;color: #fff !important;box-sizing: border-box;word-wrap: break-word;">
                    <h4 class="card-title" style="margin-bottom: .75rem;font-size: 17px;margin-top: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['5']['evento']; ?>&nbsp;
                    </h4>
                    <p class="card-text" style="font-style: italic;margin-bottom: 0;box-sizing: border-box;color: #fff !important;word-wrap: break-word;">
                        <?= $consulta['RespuestaIndicadore']['5']['mensaje']; ?>&nbsp;
                    </p>
                </div>
            </div>
            <?php endif; ?>

        </div>

    </div>
</div>

<hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

<div class="row consultas view" style="margin-left: -15px;margin-right: -15px;box-sizing: border-box;">
    <div class="col-md-12" style="width: 100%;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;box-sizing: border-box;">

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Tipos'); ?></h3>
            <?php if (!empty($consulta['RespuestaTipo'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
                    <thead>
                    <tr>

                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Tipo'); ?></th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Minimo'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #337ab7; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Inferior'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #5bc0de; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Estimado'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #5cb85c; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Superior'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #f0ad4e; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Maximo'); ?>
                            &nbsp;<br>($)&nbsp;</th>
                        <th style="background-color: #d9534f; color: #eee; text-align: center; vertical-align: middle; border-top: 0;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.428571429;white-space: nowrap;box-sizing: border-box;"><?= __('Incidencia'); ?>
                            &nbsp;<br>(%)&nbsp;</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consulta['RespuestaTipo'] as $respuestaTipo): ?>
                    <tr>
                        <td><strong><?= $respuestaTipo['tipo']; ?>&nbsp;</strong></td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['minimo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['incidencia_minimo'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['inferior'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['incidencia_inferior'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['valor'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['incidencia_valor'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['superior'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['incidencia_superior'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['maximo'], 3, ',', '.'); ?>
                            &nbsp;</td>
                        <td style="text-align: center;padding: 8px;line-height: 1.428571429;vertical-align: top;border-top: 1px solid #ddd;white-space: nowrap;box-sizing: border-box;"><?= number_format($respuestaTipo['incidencia_maximo'] * 100, 3, ',', '.'); ?>
                            &nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Items'); ?></h3>
            <?php if (!empty($consulta['RespuestaItem'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Respuesta Preguntas'); ?></h3>
            <?php if (!empty($consulta['RespuestaPregunta'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;">
                <?php if ($sube['RespuestaPregunta']['opcione_id'] == '24'): ?>
                <?= __('Pasajeros: "Posee SUBE"'); ?>
                <?php else: ?>
                <?= __('Pasajeros: "NO Posee SUBE"'); ?>
                <?php endif; ?>
            </h3>
            <?php if (!empty($consulta['RespuestaPasajero'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Respuesta Salarios'); ?></h3>
            <?php if (!empty($consulta['RespuestaSalario'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Parametros'); ?></h3>
            <?php if (!empty($consulta['RespuestaParametro'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
                    <tr>

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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Coeficientes'); ?></h3>
            <?php if (!empty($consulta['RespuestaCoeficiente'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="related" style="margin-bottom: 40px;box-sizing: border-box;">
            <h3 style="font-size: 23px;margin-top: 18px;margin-bottom: 9px;font-family: Roboto,Helvetica,Arial,sans-serif;font-weight: 500;line-height: 1.1;box-sizing: border-box;"><?= __('Detalle Indicadores'); ?></h3>
            <?php if (!empty($consulta['RespuestaIndicadore'])): ?>
            <div class="table-responsive" style="width: 100%;margin-bottom: 15px;overflow-y: hidden;overflow-x: scroll;box-sizing: border-box;">
                <table class="table" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 18px;max-width: 100%;background-color: transparent;border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
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
        <hr style="margin-top: 18px;margin-bottom: 18px;border: 0;box-sizing: content-box;height: 0;"/>

        <div class="well well-sm" style="overflow-x:auto;overflow-y:auto;padding: 9px;border-radius: 2px;min-height: 20px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid #e3e3e3;box-shadow: inset 0 1px 1px rgba(0,0,0,.05);box-sizing: border-box;">
            <strong style="font-weight: 700;box-sizing: border-box;">Observaciones: </strong>

            <p style="white-space:pre-line;margin: 0 0 9px;box-sizing: border-box;">
                <?= h($consulta['Consulta']['observaciones']); ?>
            </p>
        </div>


    </div>
</div>