<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array('Session', 'Html','Form','Time');

    public function appError() {
        $this->{'redirect'}('/');
    }

    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'loginAction'=>'/login',
            'loginRedirect' => '/publicados',
            'logoutRedirect'=> '/',
            'ajaxLogin'=>'expired_session'
        ),
        'Cookie',
        'Session'
    );

    public function beforeFilter(){

        // Configuración de la Secciones
        Configure::write('Session', array(
            'cookie' => 'santomercado',
            'defaults' => 'database',
            'timeout' => 4320 //3 days
        ));

        /* Para Ubicarse entre las vistas y controladores
         ****************************************************/
        $this->{'set'}('controller',$this->{'request'}->params['controller']);
        $this->{'set'}('action',$this->{'request'}->params['action']);

    }

    public function beforeRender(){
        // Destruye la sección al abrir x links en otra pestaña si se coloca en la función beforeFilter.
        if($this->{'Auth'}->User()){
            $this->{'set'}('userLogged',$this->{'Auth'}->User());
        }

    }

    function cleanString($texto)
    {
        return  trim(preg_replace("/[^\p{L}\p{N}]/u", ' ', $texto));
    }

}
