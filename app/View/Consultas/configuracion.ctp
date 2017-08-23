<?php 
/**
 * @var $this View
 */
?>


<div class="row consultas view">
    <div class="col-md-12">
        <div class="col-md-12">
            <h2>Configuraciones</h2>
            <hr/>
        </div>
            <div class="table-responsive">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Parametro'); ?>&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Listado'); ?>&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Nuevo'); ?>&nbsp;</th>
                        <th style="background-color: #222; color: #eee; text-align: center; vertical-align: middle"><?= __('Detalle'); ?>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Preguntas</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'preguntas', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'preguntas', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de las preguntas que se realizan en las pantallas de consulta.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Parametros</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'parametros', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'parametros', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los parametros utilizados en los calculos de las consultas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Coeficientes</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'coeficientes', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'coeficientes', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los coeficientes utilizados en los calculos de las consultas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Agrupamientos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'agrupamientos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'agrupamientos', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Definen las pantallas de cuestionarios de las consultas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Alertas</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'alertas', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'alertas', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de las alertas que disparan los indicadores.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Ambitos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los ambitos disponibles para el uso del sistema.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Categorias</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'categorias', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'categorias', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los tipos de categorias y posiciones de los trabajadores de las empresas de transporte.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Convenios</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'convenios', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'convenios', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los convenios salariales.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Convenios</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'dietas', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'dietas', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los tipos de dietas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Estados</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los tipos de estados posibles.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Eventos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'eventos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'eventos', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los eventos disponibles para las alertas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Factores</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'factores', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'factores', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los facores disponibles para el formulario de preguntas utilizadas para los calculos de depreciacion y rentabilidad.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Indicadores</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'indicadores', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'indicadores', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los indicadores utilizados en los resultados de las consultas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Intervenciones</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'intervenciones', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'intervenciones', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de que coeficiente interviene en que item.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Items</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'items', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'items', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los tipos de items en los que se descomponen los calculos.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Localidades</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'localidades', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'localidades', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de las localidades de las provincias.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Matrices</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'matrices', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'matrices', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de las matrices en donde se define que coeficiente pertenece a que multiplicador.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Modos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'modos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'modos', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los modos en los que se puede encontrar un consulta.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Multiplicadores</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'multiplicadores', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'multiplicadores', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los multiplicadores que afectan a los coeficientes segun las respuestas de las preguntas.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Opciones</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'opciones', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'opciones', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de las posibles opciones para cada pregunta.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Participaciones</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'participaciones', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'participaciones', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de que parametro interviene en que item.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Provincias</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'provincias', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'provincias', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de Provincias.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Salarios</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'salarios', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'salarios', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion los salarios pre cargados para cada convenio.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Sectores</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'sectores', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'sectores', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los tipos de sectores a los que pueden pertenecer los usuarios.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Tipos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'tipos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'tipos', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de los tipos en los que se descomponen los calculos.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Unidades</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion de las unidades disponibles.</td>
                    </tr>

                    <tr>
                        <td style="text-align: justify; vertical-align: middle"><strong>Viaticos</strong></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-list-ul fa-fw"></i>'), array('controller' => 'viaticos', 'action' => 'index'), array('class' => 'btn btn-info')); ?></td>
                        <td style="text-align: center; vertical-align: middle"><?= $this->Html->link(__('<i class="fa fa-plus fa-fw"></i>'), array('controller' => 'viaticos', 'action' => 'add'), array('class' => 'btn btn-success')); ?></td>
                        <td style="text-align: justify; vertical-align: middle">Configuracion los viaticos pre cargados para cada convenio y su dieta.</td>
                    </tr>





































                    </tbody>
                </table>
            </div>
    </div>
</div>