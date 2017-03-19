<div class="row asignaciones index">
    <div class="col-md-12">
        <h2><?= __('Herramientas'); ?></h2>

        <div class="bs-example" data-example-id="thumbnails-with-custom-content">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">



                        <?php echo $this->Html->image('cetram/002.jpg', array('style' => 'height: 200px; width: 100%','display' => 'block','data-holder-rendered' => 'true','class' => 'img-responsive', 'escape' => false, 'alt' => 'UTN-FRSF')) ?>

                        <div class="caption"><h3>UTN-FRSF</h3>

                            <p>Sitio de la Universidad Tecnol&oacute;gica Nacional - Facultad Regional Santa Fe.<br/><br/></p>

                            <p><a href="<?php echo $this->Html->url('http://www.frsf.utn.edu.ar/'); ?>" class="btn btn-primary" role="button">Ir</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">

                        <?php echo $this->Html->image('cetram/003.jpg', array('style' => 'height: 200px; width: 100%','display' => 'block','data-holder-rendered' => 'true','class' => 'img-responsive', 'escape' => false, 'alt' => 'CETRAM')) ?>

                        <div class="caption"><h3>CETRAM</h3>

                            <p>Sitio del Grupo Cient&iacute;dico de Estudios de Transporte Accidentolog&iacute;a y Movilidad.<br/><br/></p>
                            <p><a href="<?php echo $this->Html->url('http://extranet.frsf.utn.edu.ar/CETRAM'); ?>" class="btn btn-primary" role="button">Ir</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">

                        <?php echo $this->Html->image('cetram/004.jpg', array('style' => 'height: 200px; width: 100%','display' => 'block','data-holder-rendered' => 'true','class' => 'img-responsive', 'escape' => false, 'alt' => 'COSTO')) ?>

                        <div class="caption"><h3>Costo Pasaje</h3>

                            <p>Herramienta para la Determinaci&oacute;n de los Costos de Sistemas de Transporte P&uacute;blico de Pasajeros en Ciudades de Tama&ntilde;o Medio.</p>
                            <p><a href="<?= $this->Html->url(array('plugin' => NULL, 'controller' => 'consultas', 'action' => 'index', 'prefix' => false, $this->request->prefix => false)) ?>" class="btn btn-primary" role="button">Ingresar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>