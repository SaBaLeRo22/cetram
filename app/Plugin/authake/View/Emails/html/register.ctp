<h3><?php echo sprintf(__('Confirmación de registro en %s'),  $service);?></h3>
<p><?php echo __('Usted se registró en nuestro servicio.');?> <?php echo __('Para asegurarse de que este correo electrónico es válido, por favor, siga este enlace:');?></p>
<p><?php
$url = $this->Html->url(array('plugin'=>'authake', 'controller'=>'user', 'action'=>'verify', $code), true);
    echo $this->Html->link(__('Click aqui para verificar.'), $url);?>
</p>
<p><?php echo sprintf(__('Código de verificación: %s'), $code);?></p>
<p><?php echo __('Atentamente');?><br/><?php echo $service;?></p>