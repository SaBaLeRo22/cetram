<?php
/*
    This file is part of Authake.

    Author: Jérôme Combaz (jakecake/velay.greta.fr)
    Contributors:

    Authake is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Authake is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/

class AuthakeHelper extends AppHelper {
  
    var $helpers = array('Session','Authake.Gravatar','Html');

    function getUserId() {
        return $this->Session->read('Authake.id');
    }

    function getUserEmail() {
        return $this->Session->read('Authake.email');
    }

    function getUsuario($id = null) {
        App::import("Model", "Authake.User");
        $model = new User();

        $user = $model->find('first', array('conditions' => array('User.id' => $id)));
        if ( $user['User']['login'] !=  NULL )
        {
            $loginName = $user['User']['login'];
        }
        else
        {
            $loginName = $user['User']['email'];
        }
        return $loginName;
    }

    function getUser($id = null) {
        App::import("Model", "Authake.User");
        $model = new User();

        $user = $model->find('first', array('conditions' => array('User.id' => $id)));

        return $user;
    }

    function getUserMenu() {
	if ( ! Configure::read('Authake.useEmailAsUsername') )
	{
	    $loginName = $this->getLogin();
	}
	else
	{
	    $loginName = $this->getNombre();
	}
 	if($loginName){
		$output = '<li class="dropdown pull-right">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.
			$this->Gravatar->get_gravatar($this->getUserEmail(),18,'','',true).'&nbsp;'.
			$loginName.'<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="'.$this->Html->url( array('plugin'=>'authake','controller'=>'user','action'=>'index')).'">Configurar Perfil</a></li>
				<li class="divider"></li>
				<li>'.$this->Html->link(__('Salir'), array('plugin'=>'authake','controller'=> 'user', 'action'=>'logout')).'</li>
			</ul>
		</li>';
		}
		else
		{
		$output = '<li class="pull-right">'.$this->Html->link(__('Registrarse'), array('plugin'=>'authake','controller'=> 'user', 'action'=>'register')).'</li>';
		$output .= '<li class="pull-right">'.$this->Html->link(__('Ingresar'), array('plugin'=>'authake','controller'=> 'user', 'action'=>'login')).'</li>';
		}
        return $output;
    }

    function isLogged() {
        return ($this->getUserId() !== null);
    }

    function getLogin() {
        return $this->Session->read('Authake.login');
    }

    function getGroupIds() {
        $gid = $this->Session->read('Authake.group_ids');
        return (empty($gid) ? array(0) : $gid);
    }

    function getGroupNames() {
        $gn = $this->Session->read('Authake.group_names');
        return (is_array($gn) ? $gn : array(__('Guest')));
    }

    function isMemberOf($gid) {
        return in_array($gid, $this->getGroupIds());
    }

    function getNombre() {
        return $this->Session->read('Authake.nombre');
    }
   
}
    
?>