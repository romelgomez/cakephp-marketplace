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

//    public function appError() {
////        $this->{'redirect'}('/');
//    }

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
            'cookie' => 'cakephp-marketplace',
            'defaults' => 'database',
            'timeout' => 4320 //3 days
        ));

//		debug($this->{'request'}->url);
//		$url_action = strstr($this->{'request'}->url, '/', true); // Desde PHP 5.3.0
//		$this->{'set'}('url_action',$url_action);

		$scripts = array();

//  Redactor - http://imperavi.com/redactor/
//  array_push($scripts,'/resources/library-vendor/redactor/redactor.min.js');
//  array_push($scripts,'/resources/library-vendor/redactor/langs/es.js');

		array_push($scripts,'/bower_components/jquery/dist/jquery.js');
		array_push($scripts,'/bower_components/bootstrap/dist/js/bootstrap.js');
		array_push($scripts,'/bower_components/pnotify/pnotify.core.js');
		array_push($scripts,'/bower_components/angular/angular.js');
		array_push($scripts,'/bower_components/angular-bootstrap/ui-bootstrap.js');
		array_push($scripts,'/bower_components/angular-bootstrap/ui-bootstrap-tpls.js');
		array_push($scripts,'/bower_components/angular-messages/angular-messages.js');
		array_push($scripts,'/assets/scripts/app.js');


		$css = array();

		array_push($css,'/bower_components/bootstrap/dist/css/bootstrap.css');
		array_push($css,'/bower_components/font-awesome/css/font-awesome.min.css');
		array_push($css,'/bower_components/pnotify/pnotify.core.css');
		array_push($css,'/assets/styles/base.css');


//  Redactor http://imperavi.com/redactor/
//  array_push($css,'/resources/library-vendor/redactor/redactor.css');

		$data = $this->{'request'}->data;
		$urlAction = $this->{'request'}->url;

		switch($urlAction){
			case 'product':

				// Title URL - lazy solution
				$foo    = trim($data['Product']['title']);
				$foo    = strtolower($foo);
				$foo    = str_replace('/', '',$foo);
				$foo    = preg_replace( '/\s+/', ' ', $foo);
				$titleUrl  = str_replace(' ', '-',$foo);

				// Description
				$text =  $data['Product']['body'];

				$description = '';
				$_description        =  strip_tags($text);     // remove html entities
				$_description        =  trim($_description);   // remove whitespaces
				$_descriptionLength  =  strlen($_description); // Get string length

				if($_descriptionLength > 200){
					$_description = substr($_description, 0, 140);      // Return part of a string
					$_description =  explode(" ",$_description);        // returns an array containing all the words found inside the string
					for($i = 0; $i < sizeof($_description)-1; $i++){
						$description .= ' '.(string)$_description[$i];
					}
					$description = ucfirst(trim($description)).' ...';
				}else{
					$description = ucfirst($_description);
				}

				$title = '<title>CakePHP-MarketPlace - '.$data['Product']['title'].' - '.$data['User']['name'].' Stock</title>';

				$meta = '<meta property="og:title" content="'.$data['Product']['title'].'" />'
					.'<meta property="og:url" content="http://www.mystock.la/producto/'.$data['Product']['id'].'/'.$titleUrl.'.html" />'
					.'<meta property="og:type" content="website" />'
					.'<meta property="og:site_name" content="MyStock.LA" />'
					.'<meta property="og:description" content="'.$description.'" />'
					.'<meta property="og:image" content="http://www.mystock.la/resources/app/img/products/'.$data['Image'][0]['facebook'].'" />'
					.'<meta property="fb:app_id" content="338515926310582" />'
					.'<meta name="twitter:card" content="summary_large_image" />'
					.'<meta name="twitter:site" content="@mystockla" />'
					.'<meta name="twitter:title" content="'.ucfirst($data['Product']['title']).'" />'
					.'<meta name="twitter:description" content="'.$description.'">'
					.'<meta name="twitter:image:src" content="http://www.mystock.la/resources/app/img/products/'.$data['Image'][0]['facebook'].'" />'
					.'<meta name="twitter:url" content="http://www.mystock.la/stock/'.$data['Product']['user_id'].'" />';

				break;
			case "stock":
				if($data['User']['banner'] !== NULL){
					$banner = 'resources/app/img/banners/'.$data['User']['banner'];
				}else{
					$banner = 'resources/app/img/benjaminFranklin.jpg';
				}

				$title = '<title>CakePHP-MarketPlace  - '.$data['User']['name'].' Stock</title>';
				$meta = '<meta property="og:title" content="'.$data['User']['name'].' Stock" />'
					.'<meta property="og:url" content="http://www.mystock.la/stock/'.$data['User']['id'].'" />'
					.'<meta property="og:type" content="website" />'
					.'<meta property="og:site_name" content="MyStock.LA" />'
					.'<meta property="og:description" content="Visita el stock de producto y/o servicios que tengo para ti" />'
					.'<meta property="og:image" content="http://www.mystock.la/'.$banner.'" />'
					.'<meta property="fb:app_id" content="338515926310582" />'
					.'<meta name="twitter:card" content="summary_large_image" />'
					.'<meta name="twitter:site" content="@mystockla" />'
					.'<meta name="twitter:title" content="'.ucfirst($data['User']['name']).' Stock" />'
					.'<meta name="twitter:description" content="Visita el stock de producto y/o servicios que tengo para ti">'
					.'<meta name="twitter:image:src" content="http://www.mystock.la/'.$banner.'" />'
					.'<meta name="twitter:url" content="http://www.mystock.la/stock/'.$data['User']['id'].'" />';
				break;
			default:
				$title = '<title>CakePHP-MarketPlace</title>';
				$meta = '';
				break;
		}

		$this->{'set'}('title',$title);
		$this->{'set'}('meta',$meta);
		$this->{'set'}('scripts',$scripts);
		$this->{'set'}('css',$css);

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
