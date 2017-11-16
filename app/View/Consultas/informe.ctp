<?php 
/**
 * @var $this LocalView
 */
?>

<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>

<div class="row consultas index">
    <div class="col-md-12">
        <h2><?= __('Consultas'); ?></h2>

        <div class="table-responsive">
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th style="text-align: center;vertical-align: middle">Acci&oacute;n</th>
                    <th style="text-align: center;vertical-align: middle">&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
                    <th style="text-align: center;vertical-align: middle">Modo</th>
                    <th style="text-align: center;vertical-align: middle">Costo ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa ($)</th>
                    <th style="text-align: center;vertical-align: middle">Subsidio ($)</th>
                    <th style="text-align: center;vertical-align: middle">Localidad</th>
                    <th style="text-align: center;vertical-align: middle">Estado</th>
                    <th style="text-align: center;vertical-align: middle">Usuario</th>
                    <th style="text-align: center;vertical-align: middle">Creada</th>
                    <th style="text-align: center;vertical-align: middle">Modificada</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th style="text-align: center;vertical-align: middle">Acci&oacute;n</th>
                    <th style="text-align: center;vertical-align: middle">&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
                    <th style="text-align: center;vertical-align: middle">Modo</th>
                    <th style="text-align: center;vertical-align: middle">Costo ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa ($)</th>
                    <th style="text-align: center;vertical-align: middle">Subsidio ($)</th>
                    <th style="text-align: center;vertical-align: middle">Localidad</th>
                    <th style="text-align: center;vertical-align: middle">Estado</th>
                    <th style="text-align: center;vertical-align: middle">Usuario</th>
                    <th style="text-align: center;vertical-align: middle">Creada</th>
                    <th style="text-align: center;vertical-align: middle">Modificada</th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td style="text-align: center;vertical-align: middle">
                        <?php if ($consulta['Modo']['id'] == '1'): ?>
                        <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'resultado', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        <?= $this->Html->link( '<i class="fa fa-files-o"></i>', array('action' => 'copiar', $consulta['Consulta']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php else: ?>
                        <!--<?= $this->Html->link( '<i class="fa fa-pencil"></i>', array('action' => 'continuar', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>-->
                        <?= $this->Form->postLink( '<i class="fa fa-trash"></i>', array('action' => 'eliminar', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['id'])); ?>
                        <?php endif ?>
                    </td>
                    <td style="text-align: center;vertical-align: middle"><?= h($consulta['Consulta']['id']); ?></td>
                    <td style="font-weight: bold;vertical-align: middle"><?= $consulta['Modo']['nombre']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['costo']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= h($consulta['Consulta']['tarifa']); ?>&nbsp;</td>
                    <td style="text-align: center;vertical-align: middle"><?= h($consulta['Consulta']['subsidio']); ?>&nbsp;</td>
                    <td style="vertical-align: middle"><?= $consulta['Localidade']['nombre'].' ('.$consulta['Localidade']['codigopostal'].')'; ?></td>
                    <td style="vertical-align: middle"><?= h($consulta['Estado']['nombre']); ?>&nbsp;</td>
                    <td style="vertical-align: middle"><?= h($this->Authake->getUsuario($consulta['Consulta']['user_created'])); ?>&nbsp;</td>
                    <td style="text-align: center;vertical-align: middle"><?= h($consulta['Consulta']['created']); ?>&nbsp;</td>
                    <td style="text-align: center;vertical-align: middle"><?= h($consulta['Consulta']['modified']); ?>&nbsp;</td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>


<!--
        <div class="table-responsive">

            <table class="table table-hover" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('modo_id', 'Modo'); ?></th>
                    <th><?= $this->Paginator->sort('costo', 'Costo ($)'); ?></th>
                    <th><?= $this->Paginator->sort('tarifa', 'Tarifa ($)'); ?></th>
                    <th><?= $this->Paginator->sort('subsidio', 'Subsidio ($)'); ?></th>
                    <th><?= $this->Paginator->sort('localidade_id', 'Localidad'); ?></th>
                    <th><?= $this->Paginator->sort('estado_id', 'Estado'); ?></th>
                    <th><?= $this->Paginator->sort('user_created', 'Usuario'); ?></th>
                    <th><?= $this->Paginator->sort('created', 'Creada'); ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificada'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= h($consulta['Consulta']['id']); ?>&nbsp;</td>
                    <td class="display-column">
                        <?= $this->Html->link( h( $consulta['Modo']['nombre'] ), array( 'action' => 'continuar', $consulta['Consulta']['id'] ) ); ?>
                        <div class="nowrap">
                            <?php if ($consulta['Modo']['id'] == '1'): ?>
                            <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'resultado', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?= $this->Html->link( '<i class="fa fa-files-o"></i>', array('action' => 'copiar', $consulta['Consulta']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                            <?php else: ?>
                            <?= $this->Html->link( '<i class="fa fa-pencil"></i>', array('action' => 'continuar', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                            <?= $this->Form->postLink( '<i class="fa fa-trash"></i>', array('action' => 'eliminar', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['id'])); ?>
                            <?php endif ?>
                            &nbsp;
                        </div>
                    </td>
                    <td><?= $consulta['Consulta']['costo']; ?></td>
                    <td><?= h($consulta['Consulta']['tarifa']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['subsidio']); ?>&nbsp;</td>
                    <td><?= $consulta['Localidade']['nombre']; ?></td>
                    <td><?= h($consulta['Estado']['nombre']); ?>&nbsp;</td>
                    <td><?= h($this->Authake->getUsuario($consulta['Consulta']['user_created'])); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['created']); ?>&nbsp;</td>
                    <td><?= h($consulta['Consulta']['modified']); ?>&nbsp;</td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4">
                <small class="paging-text text-muted">
                    <?= $this->Paginator->counter('Página {:page} de {:pages}, {:count} registros en total.'); ?>
                </small>
            </div>
            <div class="col-md-8 text-right">
                <ul class="pagination">
                    <?= $this->Paginator->prev( '<i class="fa fa-angle-left"></i>',
                    array( 'tag' => 'li', 'escape' => false ), null,
                    array( 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => false ) ); ?>                    <?= $this->Paginator->numbers( array(
                    'separator'    => '',
                    'currentTag'   => 'a',
                    'currentClass' => 'active',
                    'tag'          => 'li',
                    'first'        => 1,
                    'last'         => 1,
                    'ellipsis'     => '<li class="disabled"><a>...</a></li>'
                    ) ); ?>                    <?= $this->Paginator->next( '<i class="fa fa-angle-right"></i>',
                    array( 'tag' => 'li', 'currentClass' => 'disabled', 'escape' => false ), null,
                    array( 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'escape' => false ) ); ?>                </ul>
            </div>
        </div>-->




    </div>
</div>




<script type='text/javascript' charset='utf-8'>
<?=
    $script =
"







        $(document).ready(function() {




            // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type=text placeholder='+title+' />' );
            } );

/*            var r = $('#example tfoot th');
            r.find('th').each(function(){
                $(this).css('padding', 8);
            });
            $('#example thead').append(r);
            $('#search_0').css('text-align', 'center');*/

            // DataTable
            var table =
                $('#example').DataTable( {
                    //'dom': 'Bfrtip',
                    //'dom': 'Bfrtip',
                    lengthChange: false,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
//                        {
//                            extend:    'copyHtml5',
//                            text:      '<i id=copiar class=fa fa-files-o ></i>',
//                            titleAttr: 'Copy'
//                        },
//                        {
//                            extend:    'excelHtml5',
//                            text:      '<i class=fa fa-file-excel-o></i>',
//                            titleAttr: 'Excel'
//                        },
//                        {
//                            extend:    'csvHtml5',
//                            text:      '<i class=fa fa-file-text-o></i>',
//                            titleAttr: 'CSV'
//                        },
//                        {
//                            extend:    'pdfHtml5',
//                            text:      '<i class=fa fa-file-pdf-o></i>',
//                            titleAttr: 'PDF'
//                        }
                    ],
                    //'sWrapper': 'dataTables_wrapper form-inline',
                    //'responsive': true,
                    'language': {
                        //'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
                        //'decimal': ',',
                        //'thousands': '.'
                    }
            } );

            table.buttons().container()
                    .insertBefore( '#example_filter' );

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                                .search( this.value )
                                .draw();
                    }
                } );
            } );



        } );


";
    $this->Html->scriptBlock($script, array('inline' => false));
?>
</script>