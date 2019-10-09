<?php 
/**
 * @var $this View
 */
?>
<div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta
            <small>Paso 6 de 6</small>
        </h1>

        <h2>
            <small>Resumen:</small>
        </h2>


        <ul>

            <?php foreach ($pasos as $paso): ?>
                <?php if ($paso['Paso']['completo'] == '0'): ?>
                    <?php if ($paso['Paso']['agrupamiento_id'] == '7'): ?>
                        <li>
                            <p class="text-info"><strong>Paso <?= h($paso['Agrupamiento']['orden']); ?>&nbsp;:</strong><span class="badge badge-info" style="background-color:#17a2b8"> Actual <i class="fa fa-flag-checkered" aria-hidden="true"></i></span></p>
                        </li>
                    <?php else: ?>
                        <li>
                            <p class="text-danger"><strong>Paso <?= h($paso['Agrupamiento']['orden']); ?>&nbsp;:</strong><span class="badge badge-danger" style="background-color:#dc3545"> Incompleto <i class="fa fa-thumbs-o-down" aria-hidden="true"></i></span></p>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li>
                        <p class="text-success"><strong>Paso <?= h($paso['Agrupamiento']['orden']); ?>&nbsp;:</strong><span class="badge badge-success" style="background-color:#468847"> Ok <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></p>
                     </li>
                <?php endif; ?>
            <?php endforeach ?>

            <li>
                <?php if ($completo): ?>
                    <p class="text-info">Por favor, complete los siguientes datos del <span class="label label-info">Paso 6</span> y finalice la consulta. Muchas gracias.</p>
                <?php else: ?>
                    <p class="text-info">Por favor, regrese y complete los <span class="label label-danger">Pasos</span> pendientes. Muchas gracias.</p>
                <?php endif; ?>
            </li>
        </ul>
        <hr>
        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>
        <h2><small>Ciudad para la que se realiza la consulta</small></h2>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Ayuda: </strong> Si no se completa se utilizar&aacute; su localidad: "<?= h(str_replace('?', 'ñ', $localidad['Localidade']['nombre']).' ('.$localidad['Localidade']['codigopostal'].') - '.$localidad['Provincia']['nombre']); ?>".
        </div>

        <div class="form-group">
            <?= $this->Form->label('localidade_id', 'Localidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('localidade_id', array('empty' => '', 'required' => 'required')); ?>
        </div>

        <h2>
            <small>Comentarios y Observaciones</small>
        </h2>
        <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'editarcinco', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>

            <?php if ($completo): ?>
                <?= $this->Form->button('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Finalizar', array('class' => 'btn btn-primary','style' => 'float:right')); ?>
            <?php endif; ?>


            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

<?php $this->append('script') ?>
<script type="text/javascript">

    (function ($) {

        $(function () {

            $('select#ConsultaLocalidadeId').selectize({
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
