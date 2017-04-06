<?php
$config = array (
  'Authake' => 
  array (
    'useDefaultLayout' => '1',
    'baseUrl' => 
    array (
      'plugin' => NULL,
      'controller' => 'consultas',
      'action' => 'index',
    ),
    'service' => 'CETRAM',
    'loginAction' => 
    array (
      'plugin' => 'authake',
      'controller' => 'user',
      'action' => 'login',
      'named' => 
      array (
      ),
      'pass' => 
      array (
      ),
    ),
    'loggedAction' => 
    array (
      'plugin' => NULL,
      'controller' => 'consultas',
      'action' => 'index',
    ),
    'sessionTimeout' => '604800',
    'defaultDeniedAction' => 
    array (
      'plugin' => 'authake',
      'controller' => 'user',
      'action' => 'denied',
      'named' => 
      array (
      ),
      'pass' => 
      array (
      ),
    ),
    'rulesCacheTimeout' => '604800',
    'systemEmail' => 'cetram.utn.frsf@gmail.com',
    'systemReplyTo' => 'cetram.utn.frsf@gmail.com',
    'passwordVerify' => '1',
    'registration' => '1',
    'defaultGroup' => '4',
    'useEmailAsUsername' => '1',
  ),
);