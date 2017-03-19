<div class="container">

    <div class="modal-dialog" style="margin: 60px auto;">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Iniciar Sesión</h4>
            </div>
            <?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action' => 'login'))); ?>

            <div class="modal-body">
                <fieldset>
                    <div class="form-group">
                        <?= $this->Form->input('login', array('label' => 'Usuario')); ?>
                    </div>
                    <br><br><br>
                    <div class="form-group">                        
                        <?= $this->Form->input('password', array('label' => 'Contraseña', 'value' => '')); ?>
                    </div>
                </fieldset>
            </div>

            <div class="section-actions">
                <?php if(Configure::read('Authake.registration') == true){?>
                <?php echo $this->Html->link(__("¿Olvidaste tu contraseña?"), array('action'=>'lost_password'),array('class'=>'btn btn-mini')); ?>
                <?php echo $this->Html->link(__("Registrarse"), array('action'=>'register'), array('class'=>'btn btn-success btn-mini'))?>
                <?php };?>
            </div>

            <div class="modal-footer">

                <?= $this->Form->button('<i class="fa fa-sign-in fa-fw"></i> Ingresar', array('class' => 'btn btn-primary')); ?>
            </div>

        </div>
        <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>