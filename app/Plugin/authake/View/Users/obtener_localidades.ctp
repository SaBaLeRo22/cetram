<?php
//debug($localidades);
echo '<option value="">Seleccionar...</option>';
foreach ($localidads as $key => $value):
    echo '<option value='.$key.'>'.$value.'</option>';
endforeach;
?>