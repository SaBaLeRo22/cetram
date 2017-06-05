<?php
//debug($localidades);
echo '<option value="">Seleccionar...</option>';
foreach ($localidades as $key => $value):
    echo '<option value='.$key.'>'.$value.'</option>';
endforeach;
?>