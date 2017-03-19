<h3><?php echo sprintf(__('Solicitud de cambio de contrase&ntilde;a en %s'),  $service);?></h3>
<p><?php echo __('Siguiendo el enlace de abajo puedes cambiar tu contrase&ntilde;a:');?></p>
<p><?php
$url = $this->Html->url(array('plugin'=>'authake', 'controller'=>'user', 'action'=>'pass', $code), true);
echo $this->Html->link(__('Click aqui para cambiar su clave.'), $url);?>
</p>
<p><?php echo sprintf(__('C&oacute;digo de verificaci&oacute;n: %s'), $code);?></p>
<p><?php echo __("Si no solicita este cambio, no se requiere ninguna acci&oacute;n. Su contrase&ntilde;a permanecer&aacute; igual hasta que no active este c&oacute;digo.");?></p>
<p><?php echo __('Atentamente');?><br/><?php echo $service;?></p>