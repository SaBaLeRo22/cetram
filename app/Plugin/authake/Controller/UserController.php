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
App::uses('CakeEmail', 'Network/Email');

class UserController extends AuthakeAppController {

    var $uses = array('Authake.User', 'Authake.Rule', 'Authake.Group');

    //var $components = array('Email');//var $layout = 'authake';
    //var $scaffold;
    function denied() {// display this view (/app/views/users/denied.ctp) when the user is denied
    }

    function message() {// display this view if you want to say something important to your users.
        // For example (your password was changed and you need to receive mail to
        // confirm it.)
    }

    /**
     * User profile
     */
    function index() {

//        $this->layout = 'root';
        $this->layout = 'authake';
//        $this->layout = 'noregistrado';
//        $this->layout = 'perfil';

        if (!$this->Authake->getUserId()) {
            $this->Session->setFlash(__('Invalid User'), 'error', array('plugin' => 'Authake'));
            $this->redirect('/');
        }

        $this->User->recursive = 1;
        $user = $this->User->read(null, $this->Authake->getUserId());

//        debug($this->Authake->getUserId());

        if (!empty($this->request->data)) {

            if ($this->request->data['User']['password1'] != '') {// password changed
                if ($this->request->data['User']['password1'] != $this->request->data['User']['password2']) {
                    $this->Session->setFlash(__('¡Las dos contraseñas no coinciden!'), 'error', array('plugin' => 'Authake'));
                } else {
                    $user['User']['password'] = md5($this->request->data['User']['password1']);
                    $this->Session->setFlash(__('¡Contraseña cambiada!'), 'success', array('plugin' => 'Authake'));
                }
            }

            $state = 0;

            if (Configure::read('Authake.passwordVerify') == true && $this->request->data['User']['email'] != $user['User']['email']) {//Check if that email is not registered by another user
                if ($this->User->find('count', array('conditions' => array('User.email LIKE' => $this->request->data['User']['email'], 'User.id != ' . $user['User']['id']))) > 0) {
                    $this->Session->setFlash(__('Este correo electrónico ha sido utilizado por otro usuario en el sistema. Por favor, intente con otro!'), 'error', array('plugin' => 'Authake'));
                    $this->redirect(array('action' => 'index'));
                }

                $user['User']['emailcheckcode'] = md5(rand() . time() . rand() . $user['User']['email']);
                $user['User']['email'] = $this->request->data['User']['email']; // send a mail with code to change the pw
                $email = new CakeEmail();
                //$email->config('smtp');
                $email->config('gmail');
                $email->to($user['User']['email']);
                $email->subject(sprintf(__('E-mail de verificación de %s '), Configure::read('Authake.service')));
                $email->replyTo(Configure::read('Authake.systemReplyTo'));
                $email->from(Configure::read('Authake.systemEmail'));
                $email->emailFormat('html'); //$this->Email->charset = 'utf-8';
                $email->template('Authake.verify'); //Set the code into template
                $this->set('code', $user['User']['emailcheckcode']);
                $this->set('service', Configure::read('Authake.service'));

                if ($email->send()) {
                    $state = 1;
                } else {
                    $state = 2;
                }
            }

            if($this->request->data['User']['localidad_id'] != NULL){
                $user['User']['localidad_id'] = $this->request->data['User']['localidad_id'];
            }

            //Unbind HABTM relation for this save
            $this->User->unbindModel(array('hasAndBelongsToMany' => array('Group')), false);

            if ($this->User->save($user['User'])) {
                switch ($state) {
                    case 1:
                        $this->Session->setFlash(__('Su correo electrónico ha sido modificado, debe recibir un correo con instrucciones para confirmar su nuevo correo electrónico...'), 'warning', array('plugin' => 'Authake'));
                        break;
                    case 2:
                        $this->Session->setFlash(sprintf(__('Error al enviar un correo electrónico para cambiar su contraseña. Por favor, póngase en contacto con el administrador en %s'), Configure::read('Authake.systemReplyTo')), 'error', array('plugin' => 'Authake'));
                        break;
                    default:$this->Session->setFlash(__('El perfil de usuario se ha guardado.'), 'success', array('plugin' => 'Authake'));
                }
            }

            if (Configure::read('Authake.passwordVerify') == true) {
                $this->redirect(array('action' => 'index'));
            } else {
                $this->redirect(array('action' => 'messages'));
            }
        }
/*
        $this->loadModel('Provincia');
        $this->Provincia->recursive = -1;

        $provincias = $this->Provincia->find('list', array(
            'fields' => array('Provincia.id','Provincia.nombre'),
            'conditions' => array('Provincia.nombre <>' => '', 'Provincia.estado_id' => '1'),
            'order' => array('Provincia.nombre' => 'asc')
        ));

        $this->loadModel('Localidad');
        $this->Localidad->recursive = -1;

        $localidads = $this->Localidad->find('list', array(
            'fields' => array('Localidad.id','Localidad.nombre'),
            'conditions' => array('Localidad.nombre <>' => '', 'Localidad.estado_id' => '1', 'Localidad.provincia_id' => $user['Localidad']['provincia_id']),
            'order' => array('Localidad.nombre' => 'asc')
        ));
*/
        $this->loadModel('Sector');
        $this->Sector->recursive = -1;

        $sectors = $this->Sector->find('list', array(
            'fields' => array('Sector.id','Sector.nombre'),
            'conditions' => array('Sector.estado_id' => '1'),
            'order' => array('Sector.nombre' => 'asc')
        ));

        //debug($user);

        //$this->request->data = null;
        $this->set(compact('user','sectors'));
    }

    /**
     * Confirm the email change if needed
     */
    function verify($code = null) {

        $this->layout = 'noregistrado';

        if (Configure::read('Authake.registration') == false) {
            $this->redirect('/');
        }

        if ($code != null) {
            $this->request->data['User']['code'] = $code;
        }

        if (!empty($this->request->data)) {
            $this->User->recursive = 0;
            $user = $this->User->find('first', array('conditions' => array('emailcheckcode' => $this->request->data['User']['code'])));

            if (empty($user)) {// bad code or email
                $this->Session->setFlash(__('¡Malos datos de identificación!'), 'error', array('plugin' => 'Authake'));
            } else {
                $user['User']['emailcheckcode'] = '';
                $this->User->unbindModel(array('hasAndBelongsToMany' => array('Group')), false);
                $this->User->save($user);

                if ($this->Authake->getUserId() == null) {//User need to be redirected to login
                    $this->Session->setFlash(__('El código de confirmación ha sido aceptado. Usted puede iniciar sesión ahora!'), 'success', array('plugin' => 'Authake'));
                    $this->redirect(array('action' => 'login'));
                } else {
                    $this->Session->setFlash(__('El código de confirmación ha sido aceptado. ¡Gracias!'), 'success', array('plugin' => 'Authake'));
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    /**
     * User registration
     */
    function register() {

        $this->layout = 'noregistrado';

        if (Configure::read('Authake.registration') == false) {
            $this->redirect('/');
        }

        if (!empty($this->request->data)) {
            $this->User->recursive = 0; /* If settings say we should use only email info instead of username/email, skip this */
            if (Configure::read('Authake.useEmailAsUsername') == false) {
                $exist = $this->User->findByLogin($this->request->data['User']['login']);

                if (!empty($exist)) {
                    $this->Session->setFlash(__('Este inicio de sesión ya está en uso!'), 'error', array('plugin' => 'Authake'));
                    return;
                }
            } else {
                $exist = $this->User->findByEmail($this->request->data['User']['email']);

                if (!empty($exist)) {
                    $this->Session->setFlash(__('¡Este correo electrónico ya está registrado!'), 'error', array('plugin' => 'Authake'));
                    return;
                }
            }
            $pwd = $this->__makePassword($this->request->data['User']['password1'], $this->request->data['User']['password2']);

            if (!$pwd) {
                return;
            }

            // password is invalid...
            $this->request->data['User']['password'] = $pwd;
            $this->request->data['User']['login'] = $this->request->data['User']['email'];
            $this->request->data['User']['emailcheckcode'] = md5(time() * rand());
            $this->User->create(); //add default group if there is such thing

            if (Configure::read('Authake.defaultGroup') != null && Configure::read('Authake.defaultGroup') != false) {
                $groups = $this->Group->find('all', array('fields' => array('Group.id'), 'conditions' => array('Group.id' => Configure::read('Authake.defaultGroup'))));

                foreach ($groups as $group) {
                    $this->request->data['Group']['Group'][] = $group['Group']['id'];
                }
            }

//                debug($this->request->data);
//                exit;
            //

            if ($this->User->save($this->request->data)) {// send a mail to finish the registration
                $email = new CakeEmail(array('log' => true));
                //$email->config('smtp');
                $email->config('gmail');
                $email->to($this->request->data['User']['email']);
                $email->subject(sprintf(__('Confirmación de registro en %s '), Configure::read('Authake.service')));
                $email->viewVars(array('service' => Configure::read('Authake.service'), 'code' => $this->request->data['User']['emailcheckcode']));
                $email->replyTo(Configure::read('Authake.systemReplyTo'));
                $email->from(Configure::read('Authake.systemEmail'));
                $email->emailFormat('html'); //$this->Email->charset = 'utf-8';
                $email->template('Authake.register'); //Set the code into template
                //$this->set('code', $this->request->data['User']['emailcheckcode']);
                //$this->set('service', Configure::read('Authake.service'));

                if ($email->send()) {
                    $this->Session->setFlash(__('Recibirá un correo electrónico con un código para finalizar el registro...'), 'info', array('plugin' => 'Authake'));
                } else {
                    $this->Session->setFlash(sprintf(__('Error al enviar el correo electrónico de confirmación. Por favor, póngase en contacto con el administrador en %s'), Configure::read('Authake.systemReplyTo')), 'error', array('plugin' => 'Authake'));
                }
                if (!isset($this->request->data['Requester'])) {
                    $this->redirect(array('plugin' => 'authake', 'controller' => 'user', 'action' => 'login'));
                } else {
                    return $this->User->id;
                }
            } else {
                $this->Session->setFlash(__('El registro falló!'), 'error', array('plugin' => 'Authake'));
            }
        }

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

        $this->set(compact('provincias','sectors'));
    }

    /**
     * Function which allow user to change his password if he request it
     */
    function pass($code = null) {
        if ($this->Authake->getUserId() > 0) {
            $this->Session->setFlash(__('Ya has iniciado sesión. ¡Cambia tu contraseña en tu perfil!'), 'warning', array('plugin' => 'Authake'));
            $this->redirect(array('action' => 'index'));
        }

        $this->User->recursive = 0;

        if (!empty($this->request->data)) {
            $user = $this->User->find('first', array('conditions' => array('passwordchangecode' => $this->request->data['User']['passwordchangecode'])));

            if (!empty($user)) {
                $pwd = $this->__makePassword($this->request->data['User']['password1'], $this->request->data['User']['password2']);

                if (!$pwd) {
                    return;
                }

                // password is invalid...
                $user['User']['password'] = $pwd;
                $user['User']['passwordchangecode'] = '';
                $this->User->unbindModel(array('hasAndBelongsToMany' => array('Group')), false);

                if ($this->User->save($user)) {//
                    $this->Session->setFlash(__('¡Tu contraseña ha sido cambiada! Usted puede iniciar sesión ahora!'), 'success', array('plugin' => 'Authake'));
                    $this->redirect(array('action' => 'login'));
                } else {
                    $this->Session->setFlash(__('¡Error al guardar tu contraseña!'), 'error', array('plugin' => 'Authake'));
                }
            }
        }

        if ($code != null) {
            $this->request->data['User']['passwordchangecode'] = $code;
        }
    }

    /**
     * Login functionality
     */
    function login($Authake = null) {

        $this->layout = 'root';

        if (!isset($this->Authake)) {
            $this->Authake = $Authake;
        }

        if ($this->Authake->isLogged()) {
            if (!isset($this->request->data['requester'])) {
                $this->Session->setFlash(__('¡Ya se ha autentificado!'), 'info', array('plugin' => 'Authake'));
                $this->redirect(Configure::read('Authake.loggedAction'));
            } else {
                return __('¡Ya se ha autentificado!');
            }
        }


        if (!empty($this->request->data)) {
            $login = $this->request->data['User']['login'];
            $password = $this->request->data['User']['password'];

            if (Configure::read('Authake.useEmailAsUsername') == false) {
                $user = $this->User->findByLogin($login);
            } else {
                $user = $this->User->findByEmail($login);
            }

            if (empty($user)) {
                if (!isset($this->request->data['requester'])) {
                    $this->Session->setFlash(__('¡Clave o usuario inválido!'), 'error', array('plugin' => 'Authake'));
                    return;
                } else {
                    return __('¡Clave o usuario inválido!');
                }
            }

            // check for locked account

            if ($user['User']['id'] != 1 and $user['User']['disable']) {
                if (!isset($this->request->data['requester'])) {
                    $this->Session->setFlash(__('¡Tu cuenta está desactivada!'), 'error', array('plugin' => 'Authake'));
                    $this->redirect('/');
                } else {
                    return __('¡Tu cuenta está desactivada!');
                }
            }

            // check for expired account
            $exp = $user['User']['expire_account'];

            if ($user['User']['id'] != 1 and $exp != '0000-00-00' and $exp != null and strtotime($exp) < time()) {
                if (!isset($this->request->data['requester'])) {
                    $this->Session->setFlash(__('¡Tu cuenta ha expirado!'), 'error', array('plugin' => 'Authake'));
                    $this->redirect('/');
                } else {
                    return __('¡Tu cuenta ha expirado!');
                }
            }

            // check for not confirmed email

            if ($user['User']['emailcheckcode'] != '') {
                if (!isset($this->request->data['requester'])) {
                    $this->Session->setFlash(__('Tu registro no ha sido confirmado!'), 'warning', array('plugin' => 'Authake'));
                    $this->redirect(array('action' => 'verify'));
                } else {
                    return __('Tu registro no ha sido confirmado!');
                }
            }

            $userdata = $this->User->getLoginData($login, $password);

            if (empty($userdata)) {
                if (!isset($this->request->data['requester'])) {
                    $this->Session->setFlash(__('¡Clave o usuario inválido!'), 'error', array('plugin' => 'Authake'));
                    return;
                } else {
                    return __('¡Clave o usuario inválido!');
                }
            } else {
                if ($user['User']['passwordchangecode'] != '') {//clear password change code (if there is any)
                    $this->User->unbindModel(array('hasAndBelongsToMany' => array('Group')), false);
                    $user['User']['passwordchangecode'] = '';
                    $this->User->save($user);
                }

                $this->Authake->login($userdata['User']);
                if (!isset($this->request->data['requester'])) {
                    $this->Session->setFlash(__('Has iniciado sesión como ') . $userdata['User']['login'], 'success', array('plugin' => 'authake'));

//                    if (($next = $this->Authake->getPreviousUrl()) !== null)
//                    {
//                        $this->redirect($next);
//                    }
//                    else
//                    {
//                        $this->redirect(Configure::read('Authake.loggedAction'));
//                    }


                    $this->Session->delete('Grupo.Admin');
                    $this->Session->delete('Grupo.RegisteredUsers');
                    $this->Session->delete('Grupo.Sistemas');
                    $this->Session->delete('Grupo.Administracion');
                    $this->Session->delete('Grupo.Bunker');

                    foreach ($this->Authake->getGroupIds() as $grupo) {
                        if ($grupo == '1') {
                            $this->Session->write('Grupo.Admin', true);
                        } else if ($grupo == '2') {
                            $this->Session->write('Grupo.RegisteredUsers', true);
                        } else if ($grupo == '3') {
                            $this->Session->write('Grupo.Sistemas', true);
                        } else if ($grupo == '4') {
                            $this->Session->write('Grupo.Administracion', true);
                        } else if ($grupo == '5') {
                            $this->Session->write('Grupo.Bunker', true);
                        }
                    }


                    $this->redirect(Configure::read('Authake.loggedAction'));
                } else {
                    return true;
                }
            }
        }
    }

    function lost_password() {

        $this->layout = 'noregistrado';

        if (Configure::read('Authake.registration') == false) {
            $this->redirect('/');
        }

        $this->User->recursive = 0;

        if (!empty($this->request->data)) {
            $loginoremail = $this->request->data['User']['loginoremail'];

            if ($loginoremail) {
                $user = $this->User->findByLogin($loginoremail);
            }

            if (empty($user)) {
                $user = $this->User->findByEmail($loginoremail);
            }

            if (!empty($user)) {
                // ok, login or email is ok
                //Prevent sending more than 11 e-mail
                if ($user['User']['passwordchangecode'] != '') {
                    $this->Session->setFlash(__('Ya has solicitado el cambio de contraseña. Por favor revise su correo electrónico y use el código que le hemos enviado.'), 'error', array('plugin' => 'Authake'));
                    $this->redirect(array('action' => 'lost_password'));
                }
                $user['User']['passwordchangecode'] = md5(time() * rand() . $user['User']['email']);
                $md5 = $user['User']['passwordchangecode'];
                $this->User->unbindModel(array('hasAndBelongsToMany' => array('Group')), false);

                if ($this->User->save($user)) {// send a mail with code to change the pw
                    $this->set('code', $user['User']['passwordchangecode']);
                    $this->set('service', Configure::read('Authake.service'));
                    $email = new CakeEmail();
                    //$email->config('smtp');
                    $email->config('gmail');
                    ///$email->viewVars(array('service' => Configure::read('Authake.service'),'emailcheckcode'=>$this->request->data['User']['code']));
                    $email->viewVars(array('service' => Configure::read('Authake.service'), 'code' => $md5));
                    $email->to($user['User']['email']);
                    $email->subject(sprintf(__('Solicitud de cambio de contraseña en %s '), Configure::read('Authake.service')));
                    $email->replyTo(Configure::read('Authake.systemReplyTo'));
                    //$email->from = Configure::read('Authake.systemEmail');
                    $email->from(Configure::read('Authake.systemEmail'));
                    $email->emailFormat('html'); //$this->Email->charset = 'utf-8';
                    $email->charset('utf-8');
                    $email->template('Authake.lost_password'); //Set the code into template

                    if ($email->send()) {
                        $this->Session->setFlash(__('Si los datos proporcionados son correctos, debería recibir un correo con instrucciones para cambiar su contraseña...'), 'warning', array('plugin' => 'Authake'));
                    } else {
                        $this->Session->setFlash(sprintf(__('Error al enviar un correo electrónico para cambiar su contraseña. Por favor, póngase en contacto con el administrador en %s'), Configure::read('Authake.systemReplyTo')), 'error', array('plugin' => 'Authake'));
                    }
                } else {
                    $this->Session->setFlash(sprintf(__('Error al cambiar tu contraseña. Por favor, póngase en contacto con el administrador en %s'), Configure::read('Authake.systemReplyTo')), 'error', array('plugin' => 'Authake'));
                }
            } else {
                $this->Session->setFlash(__('Si los datos proporcionados son correctos, debería recibir un correo con instrucciones para cambiar su contraseña...'), 'warning', array('plugin' => 'Authake'));
            }

            $this->redirect(array('action' => 'lost_password'));
        }
    }

    function logout() {
        if ($this->Authake->isLogged()) {
            $this->Authake->logout();
            $this->Session->setFlash(__('Usted está desconectado!'), 'info', array('plugin' => 'Authake'));
        }

        $this->redirect('/');
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

    function beforeFilter() {
        parent::beforeFilter(); //Overwriting the authake layout with the default one

        if (Configure::read('Authake.useDefaultLayout') == true) {
            $this->layout = 'default';
        }
    }

}

?>
