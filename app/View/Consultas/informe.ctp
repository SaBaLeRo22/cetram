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
          <!--  <div>
                Visibilidad de Columnas:
                <a class="toggle-vis" data-column="0">Acci&oacute;n</a> -
                <a class="toggle-vis" data-column="1">&nbsp;&nbsp;ID&nbsp;&nbsp;</a> -
                <a class="toggle-vis" data-column="2">Modo</a> -
                <a class="toggle-vis" data-column="3">Costo M&iacute;n. ($)</a> -
                <a class="toggle-vis" data-column="4">Costo Inf. ($)</a> -
                <a class="toggle-vis" data-column="5">Costo ($)</a> -
                <a class="toggle-vis" data-column="6">Costo Sup. ($)</a> -
                <a class="toggle-vis" data-column="7">Costo M&aacute;x. ($)</a> -
                <a class="toggle-vis" data-column="8">Tarifa M&iacute;n. ($)</a> -
                <a class="toggle-vis" data-column="9">Tarifa Inf. ($)</a> -
                <a class="toggle-vis" data-column="10">Tarifa ($)</a> -
                <a class="toggle-vis" data-column="11">Tarifa Sup. ($)</a> -
                <a class="toggle-vis" data-column="12">Tarifa M&aacute;x. ($)</a> -
                <a class="toggle-vis" data-column="13">Subsidio ($)</a> -
                <a class="toggle-vis" data-column="14">Localidad</a> -
                <a class="toggle-vis" data-column="15">Estado</a> -
                <a class="toggle-vis" data-column="16">Usuario</a> -
                <a class="toggle-vis" data-column="17">Creada</a> -
                <a class="toggle-vis" data-column="18">Modificada</a>
            </div>
            <BR/>-->
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th style="text-align: center;vertical-align: middle">Acci&oacute;n</th>
                    <th style="text-align: center;vertical-align: middle">&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
                    <th style="text-align: center;vertical-align: middle">Modo</th>
                    <th style="text-align: center;vertical-align: middle">Costo M&iacute;n. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo Inf. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo Sup. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo M&aacute;x. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa M&iacute;n. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa Inf. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa Sup. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa M&aacute;x. ($)</th>
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
                    <th style="text-align: center;vertical-align: middle">Costo M&iacute;n. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo Inf. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo ($)</th>
                    <th style="text-align: center;vertical-align: middle">Costo Sup.</th>
                    <th style="text-align: center;vertical-align: middle">Costo M&aacute;x. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa M&iacute;n. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa Inf. ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa ($)</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa Sup.</th>
                    <th style="text-align: center;vertical-align: middle">Tarifa M&aacute;x. ($)</th>
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
                        <?php if ($consulta['Consulta']['modo_id'] == '1'): ?>
                        <?= $this->Html->link( '<i class="fa fa-eye"></i>', array('action' => 'resultado', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>
                        <?= $this->Html->link( '<i class="fa fa-files-o"></i>', array('action' => 'copiar', $consulta['Consulta']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                        <?php else: ?>
                        <!--<?= $this->Html->link( '<i class="fa fa-pencil"></i>', array('action' => 'continuar', $consulta['Consulta']['id']), array('class' => 'btn btn-info btn-xs')); ?>-->
                        <?= $this->Form->postLink( '<i class="fa fa-trash"></i>', array('action' => 'eliminar', $consulta['Consulta']['id']), array('class' => 'btn btn-danger btn-xs'), __('Se va a eliminar %s ¿Está seguro de eliminar este registro?', $consulta['Consulta']['id'])); ?>
                        <?php endif ?>
                    </td>
                    <td style="text-align: center;vertical-align: middle"><?= h($consulta['Consulta']['id']); ?></td>
                    <td style="font-weight: bold;vertical-align: middle"><?= $consulta['Modo']['nombre']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['costo_minimo']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['costo_inferior']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['costo']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['costo_superior']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['costo_maximo']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['tarifa_minima']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['tarifa_inferior']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['tarifa']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['tarifa_superior']; ?></td>
                    <td style="text-align: center;vertical-align: middle"><?= $consulta['Consulta']['tarifa_maxima']; ?></td>
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
                    lengthChange: true,
                    lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'Todo']],
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
                        'decimal': ',',
                        'thousands': '.',
                        'sProcessing':     'Procesando...',
                        'sLengthMenu':     'Mostrar _MENU_ registros&nbsp&nbsp',
                        'sZeroRecords':    'No se encontraron resultados',
                        'sEmptyTable':     'Ningún dato disponible en esta tabla',
                        'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                        'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
                        'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
                        'sInfoPostFix':    '',
                        'sSearch':         'Buscar:',
                        'sUrl':            '',
                        'sInfoThousands':  ',',
                        'sLoadingRecords': 'Cargando...',
                        'oPaginate': {
                            'sFirst':    'Primero',
                            'sLast':     'Último',
                            'sNext':     'Siguiente',
                            'sPrevious': 'Anterior'
                        },
                        'oAria': {
                            'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    }
            } );

            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );
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