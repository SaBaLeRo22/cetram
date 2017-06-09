<?php 
/**
 * @var $this View
 */
?><div class="row estados form">
    <div class="col-md-9">
                <h2><?= __('Editar Estado') ?></h2>
                <hr/>

        <?= $this->Form->create('Estado', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                                                                                    <div class="form-group">
            <?= $this->Form->label('user_created', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('user_created'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('user_modified', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('user_modified'); ?> 
        </div>
                                        <div class="well well-sm text-right">
            <?= $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar', array('class' => 'btn btn-primary')); ?> 
        </div>
        <?= $this->Form->end(); ?> 
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>
            
            <div class="list-group">
                                                <?= $this->Html->link(__('Listado de Estados'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Agrupamiento</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Agrupamientos'), array('controller' => 'agrupamientos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Agrupamiento'), array('controller' => 'agrupamientos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Ambito</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Ambitos'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Categoria</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Categorias'), array('controller' => 'categorias', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Categoria'), array('controller' => 'categorias', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Coeficientes'), array('controller' => 'coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Coeficiente'), array('controller' => 'coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Consulta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Consultas'), array('controller' => 'consultas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('controller' => 'consultas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Convenio</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Convenios'), array('controller' => 'convenios', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Convenio'), array('controller' => 'convenios', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Dieta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Dietas'), array('controller' => 'dietas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Dieta'), array('controller' => 'dietas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Factore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Factores'), array('controller' => 'factores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Factore'), array('controller' => 'factores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Indicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Indicadores'), array('controller' => 'indicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Indicadore'), array('controller' => 'indicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Intervencione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Intervenciones'), array('controller' => 'intervenciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Intervencione'), array('controller' => 'intervenciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Items'), array('controller' => 'items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Localidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Localidades'), array('controller' => 'localidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Localidade'), array('controller' => 'localidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Matrix</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Matrices'), array('controller' => 'matrices', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Matrix'), array('controller' => 'matrices', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Modo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Modos'), array('controller' => 'modos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Modo'), array('controller' => 'modos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Multiplicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Multiplicadores'), array('controller' => 'multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Multiplicadore'), array('controller' => 'multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Opcione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Opciones'), array('controller' => 'opciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Opcione'), array('controller' => 'opciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Parametro</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Parametros'), array('controller' => 'parametros', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Parametro'), array('controller' => 'parametros', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Participacione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Participaciones'), array('controller' => 'participaciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Participacione'), array('controller' => 'participaciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Preguntas'), array('controller' => 'preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Pregunta'), array('controller' => 'preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Provincia</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Provincias'), array('controller' => 'provincias', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Provincia'), array('controller' => 'provincias', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Coeficientes'), array('controller' => 'respuesta_coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Coeficiente'), array('controller' => 'respuesta_coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Indicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Indicadores'), array('controller' => 'respuesta_indicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Indicadore'), array('controller' => 'respuesta_indicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Items'), array('controller' => 'respuesta_items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Item'), array('controller' => 'respuesta_items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Multiplicadore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Multiplicadores'), array('controller' => 'respuesta_multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Multiplicadore'), array('controller' => 'respuesta_multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Parametro</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Parametros'), array('controller' => 'respuesta_parametros', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Parametro'), array('controller' => 'respuesta_parametros', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Preguntas'), array('controller' => 'respuesta_preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Pregunta'), array('controller' => 'respuesta_preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Respuesta Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Respuesta Tipos'), array('controller' => 'respuesta_tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Tipo'), array('controller' => 'respuesta_tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Salario</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Salarios'), array('controller' => 'salarios', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Salario'), array('controller' => 'salarios', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Sectore</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Sectores'), array('controller' => 'sectores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Sectore'), array('controller' => 'sectores', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Tipos'), array('controller' => 'tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Tipo'), array('controller' => 'tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Viatico</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Viaticos'), array('controller' => 'viaticos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Viatico'), array('controller' => 'viaticos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

