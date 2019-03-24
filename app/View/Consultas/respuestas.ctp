<?php 
/**
 * @var $this View
 */
?>


<div class="row consultas view">
    <div class="col-md-12">
        <div class="col-md-12">
            <h2>Administrar Respuestas</h2>
            <hr/>
        </div>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Respuesta'); ?>&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Listado'); ?>&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Detalle'); ?>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Consultas</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'consultas', 'action' => 'informe'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Informe de Consultas realizadas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Preguntas</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestapreguntas', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Preguntas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Par&aacute;metros</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestaparametros', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Par&aacute;metros.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Coeficientes</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestacoeficientes', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Coeficientes.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Pasajeros</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestapasajeros', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Pasajeros.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>&Iacute;tems</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestaitems', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de &Iacute;tems.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Tipos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestatipos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Tipos.</td>
                    </tr>
<!--
                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Multiplicadores</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestamultiplicadores', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Multiplicadores.</td>
                    </tr>
-->

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Indicadores</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestaindicadores', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Indicadores.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Salarios</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'respuestasalarios', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Salarios.</td>
                    </tr>
<!--
                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Pasos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'pasos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Administrar Respuestas de Pasos.</td>
                    </tr>
-->

                    </tbody>
                </table>
            </div>
    </div>
</div>