<h3><?php echo sprintf(__('Confirmaci�n de registro en %s'),  $service);?></h3>
<p><?php echo __('Usted se registr� en nuestro servicio.');?> <?php echo __('Para asegurarse de que este correo electr�nico es v�lido, por favor, siga este enlace:');?></p>
<p><?php
$url = $this->Html->url(array('plugin'=>'authake', 'controller'=>'user', 'action'=>'verify', $code), true);
    echo $this->Html->link(__('Click aqui para verificar.'), $url);?>
</p>
<p><?php echo sprintf(__('C�digo de verificaci�n: %s'), $code);?></p>
<p><?php echo __('Atentamente');?><br/><?php echo $service;?></p>