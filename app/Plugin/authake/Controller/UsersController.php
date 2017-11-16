<?php
/*
	This file is part of Authake.

	Author: Jérôme Combaz (jakecake/velay.greta.fr)
	Contributors: Mutlu Tevfik Kocak (mtkocak.net)

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
class UsersController extends AuthakeAppController {
	var $uses = array('Authake.User', 'Authake.Rule');
	var $components = array('Authake.Filter','Session');// var $layout = 'authake';
	var $paginate = array('limit' => 10, 'order' => array('User.login' => 'asc'));//var $scaffold;

	function index($tableonly = false) {
		$this->User->recursive = 1;
		$filter = $this->Filter->process($this);
		$this->set('users', $this->paginate(null, $filter));
		$this->set('tableonly', $tableonly);
	}

	function view($id = null, $viewactions = null) {
		$this->User->recursive = 1;// to select user, groups and rules

		if (!$id)
		{
			$this->Session->setFlash(__('Invalid User'));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('user', $this->User->read(null, $id));
		$groups = $this->User->getGroups($id);
		$this->set('rules', $this->Rule->getRules($groups));

		if ($viewactions === 'actions')
		{
			$this->set('actions', $this->Authake->getActionsPermissions($groups));
		}
	}

	function add() {

		if (!empty($this->request->data))
		{// only an admin can make an admin

			if (in_array(1, $this->request->data['Group']['Group']) and !in_array(1, $this->Authake->getGroupIds()))
			{
				$this->Session->setFlash(__('You cannot add a user in administrators group'), 'warning');
				$this->redirect(array('action'=>'index'));
			}

			$p = $this->request->data['User']['password'];
			$this->request->data['User']['password'] = $this->__makePassword($p, $p);
			$this->User->create();

			if ($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('The User has been saved'), 'success');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'), 'error');
			}
		}

		$this->request->data['User']['password'] = '';
		$groups = $this->User->Group->find('list');

		$this->loadModel('Provincia');
		$this->Provincia->recursive = -1;

		$provincias = $this->Provincia->find('list', array(
			'fields' => array('Provincia.id','Provincia.nombre'),
			'conditions' => array('Provincia.nombre <>' => '', 'Provincia.estado_id' => '1'),
			'order' => array('Provincia.nombre' => 'asc')
		));

		$this->loadModel('Sector');
		$this->Sector->recursive = -1;

		$sectors = $this->Sector->find('list', array(
			'fields' => array('Sector.id','Sector.nombre'),
			'conditions' => array('Sector.estado_id' => '1'),
			'order' => array('Sector.nombre' => 'asc')
		));
		$this->set(compact('groups', 'provincias','sectors'));
	}

	function edit($id = null) {

		if (!$id && empty($this->request->data))
		{
			$this->Session->setFlash(__('Invalid User'));
			$this->redirect(array('action'=>'index'));
		}

		$this->User->recursive = 1;

		$user = $this->User->read(null, $id);// check if user allow to edit (only an admin can edit an admin)
		$gr = Set::extract($user, 'Group.{n}.id');

		if (in_array(1, $gr) and !in_array(1, $this->Authake->getGroupIds()))
		{
			$this->Session->setFlash(__('You cannot edit a user in administrators group'), 'warning');
			$this->redirect(array('action'=>'index'));
		}


		if (!empty($this->request->data))
		{// only Admin (id 1) can modify its profile (for security reasons)

			if ($id == 1 && $this->Authake->getUserId() != 1)
			{
				$this->Session->setFlash(__('Only the admin can change its profile!'), 'warning');
				$this->redirect(array('action'=>'index'));
			}

			// only an admin can make an admin

			if ($this->request->data['Group']['Group'] == '')
			{
				$this->request->data['Group']['Group'] = array();
			}


			if (isset($this->request->data['Group']['Group']) and in_array(1, $this->request->data['Group']['Group']) and !in_array(1, $this->Authake->getGroupIds()) )
			{
				$this->Session->setFlash(__('You cannot add a user in administrators group'), 'warning');
				$this->redirect(array('action'=>'index'));
			}

			// check if pwd changed

			if ($p = $this->request->data['User']['password'])
			{
				$this->request->data['User']['password'] = $this->__makePassword($p, $p);
			}
			else
			{
				unset($this->request->data['User']['password']);
			}


			if (empty($this->request->data['Group']))
			{
				$this->request->data['Group']['Group'] = array();
			}

			// delete user-group relation if selection empty
			unset($this->request->data['User']['login']);// never change the login


			if($this->request->data['User']['localidad_id'] == NULL){
				$this->request->data['User']['localidad_id'] = $user['User']['localidad_id'];
			}

			// save user
			if ($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('The User has been saved'), 'success');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'), 'error');
			}
		}

		// show edit form
		$this->request->data = $user;
		//debug($this->request->data);
		$this->request->data['User']['password'] = '';// find groups
		$groups = $this->User->Group->find('list');
		unset($groups[0]);// remove group 0 (everybody)


/*		$this->loadModel('Provincia');
		$this->Provincia->recursive = -1;

		$provincias = $this->Provincia->find('list', array(
			'fields' => array('Provincia.id','Provincia.nombre'),
			'conditions' => array('Provincia.nombre <>' => '', 'Provincia.estado_id' => '1'),
			'order' => array('Provincia.nombre' => 'asc')
		));

		$this->loadModel('Localidad');
		$this->Localidad->recursive = 0;
		$loc = $this->Localidad->find('first', array(
			'conditions' => array('Localidad.id' => $user['User']['localidad_id'])
		));*/
		//$this->request->data['User']['provincia_id'] = $loc['Localidad']['provincia_id'];

/*		$localidades = $this->Localidad->find('list', array(
			'fields' => array('Localidad.id','Localidad.nombre'),
			//'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
			'conditions' => array('Localidad.provincia_id' => $loc['Localidad']['provincia_id'], 'Localidad.nombre <>' => '', 'Localidad.estado_id' => '1'),
			'order' => array('Localidad.nombre' => 'asc')
		));*/
		//$this->request->data['User']['localidad_id'] = $user['User']['localidad_id'];

		$this->loadModel('Sector');
		$this->Sector->recursive = -1;

		$sectors = $this->Sector->find('list', array(
			'fields' => array('Sector.id','Sector.nombre'),
			'conditions' => array('Sector.estado_id' => '1'),
			'order' => array('Sector.nombre' => 'asc')
		));

		$this->set(compact('groups','user','sectors'));
	}

	function delete($id = null) {// check if user in admins group
		$user = $this->User->read(null, $id);

		if (!$id || $id == 1)
		{
			$this->Session->setFlash(__('Invalid id for User'), 'error');
			$this->redirect(array('action'=>'index'));
		}

		// check if user allow to edit (only an admin can edit an admin)
		$gr = Set::extract($user, 'Group.{n}.id');

		if (in_array(1, $gr) and !in_array(1, $this->Authake->getGroupIds()))
		{
			$this->Session->setFlash(__('You cannot delete a user in administrators group'), 'warning');
			$this->redirect(array('action'=>'index'));
		}


		if ($this->User->delete($id))
		{
			$this->Session->setFlash(__('User deleted'), 'success');
			$this->redirect(array('action'=>'index'));
		}
	}

	public function obtener_localidades($id=null) {

		Configure::write('debug', '0');
		$this->layout = 'ajax';

		$this->loadModel('Localidad');
		$this->Localidad->recursive = -1;
		$locs = $this->Localidad->find('all', array(
			'recursive' => -1,
			'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
			'conditions' => array('Localidad.provincia_id' => $id, 'Localidad.nombre <>' => '', 'Localidad.estado_id' => '1'),
			'order' => array('Localidad.nombre' => 'asc')));

		$localidades = array();
		foreach ($locs as $key => $localidad) {
			$localidades[$localidad['Localidad']['id']] = str_replace('?', 'ñ', $localidad[0]['nombre']);
		}

		$this->set('localidades', $localidades);
	}


	/**
	 * @param $search
	 * @return CakeResponse|null
	 */
	public function search_by_localidad($search) {
		$this->loadModel('Localidad');
		$this->Localidad->recursive = 0;
		$localidades = $this->Localidad->find('all', array(
			'recursive' => 0,
			'order' => array('Localidad.nombre' => 'asc', 'Localidad.codigopostal' => 'asc'),
			//'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
			'fields' => array('Localidad.id' ,'Localidad.nombre' ,'Localidad.codigopostal', 'Provincia.nombre'),
			'conditions' => array('Localidad.nombre <>' => '', 'Localidad.estado_id' => '1', 'Localidad.nombre LIKE' => "%{$search}%"),
			'limit' => 100
		));

		$result = array();
		foreach ($localidades as $localidad) {
			$result[] = array(
				'value' => $localidad['Localidad']['id'],
				'text' => $localidad['Localidad']['nombre']." (CP: ".$localidad['Localidad']['codigopostal']." - Prov.: ".$localidad['Provincia']['nombre'].")"
			);
		}

		$this->response->type('json');
		$this->response->body(json_encode($result));

		return $this->response;
	}

}
?>
