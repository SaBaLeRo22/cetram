<h3><?php echo sprintf(__('E-mail de verificaci�n de %s'),  $service);?></h3>
<p><?php echo __('Usted ha cambiado su direcci�n de e-mail en su perfil.');?> <?php echo __('Para asegurarse de que este correo electr�nico es v�lido, por favor, siga este enlace:');?></p>
<p><?php
$url = $this->Html->url(array('plugin'=>'authake', 'controller'=>'user', 'action'=>'verify', $code), true);
echo $this->Html->link(__('Click aqui para verficiar'), $url);?>
</p>
<p><?php echo sprintf(__('C�digo de verificaci�n: %s'), $code);?></p>
<p><?php echo __('Atentamente');?><br/><?php echo $service;?></p>