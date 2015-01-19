<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/* Sort alphabetically by the name of the controller. */

//	A
//	B
//	C
//	D
//	E
//	F
Router::connect('/',										array('controller' => 'frontEnds', 	'action' => 'index'));							// Acción Get - Interfaz principal.
//	G
//	H
//	I
Router::connect('/add-banner',								array('controller' => 'images', 'action' => 'addBanner'));
Router::connect('/delete-banner',	 					    array('controller' => 'images', 'action' => 'deleteBanner'));
Router::connect('/select-banner',	 					    array('controller' => 'images', 'action' => 'selectBanner'));

Router::connect('/image_add',								array('controller' => 'images', 'action' => 'add'));
Router::connect('/enables_this_images',	 					array('controller' => 'images', 'action' => 'enables_this_images'));
Router::connect('/disable_this_imagen',	 					array('controller' => 'images', 'action' => 'disable_this_imagen'));
//	J
//	K
//	L
//	M
//	N
//	O
//	P

/* /publicar, /editar_borrador, /editar usan la misma vista add para los procesos referentes, todos los proceso son compatibles en 98% por lo tanto comparten vistas , la acción es identificada por la url,
 * solo cambia una pequeña parte de dom, los botones únicamente.
***********************************************************************************************************************/
Router::connect('/publish',								array('controller' => 'products', 	'action' => 'add'));							// Acción Get  - Interfaz para cargar nuevos productos.

Router::connect('/edit-draft/:id', 							array('controller' => 'products', 	'action' => 'add'),  				  			// Acción Get  - para editar un borrador, es un producto que no a sido publicado.
    array(
        'pass' => array('id')
    ));

Router::connect('/edit/:id', 								array('controller' => 'products', 	'action' => 'add'),  				  			// Acción Get  - para editar un producto publicado.
    array(
        'pass' => array('id')
    ));


Router::connect('/change-status', 							array('controller' => 'products',	 'action' => 'changeStatus'));   					// Acción Ajax - para pausar o activar una publicación.
Router::connect('/delete', 									array('controller' => 'products',	 'action' => 'delete'));							// Acción Ajax - borrar un producto publicado


Router::connect('/add_new',									array('controller' => 'products', 	'action' => 'add_new'));						// Acción Ajax - para guardar una nueva publicación.
Router::connect('/save-draft',	 							array('controller' => 'products',	'action' => 'saveDraft'));	   					// Acción Ajax - para guardar un borrador

Router::connect('/published', 								array('controller' => 'products',	'action' => 'published'));	   					// Acción Get  - Interfaz para acceder a los productos publicados
Router::connect('/drafts',	 								array('controller' => 'products',	'action' => 'drafts'));	   						// Acción Get  - Interfaz para acceder a los borradores

Router::connect('/stock/:id',                               array('controller' => 'products', 	'action' => 'stock'),           	            // Acción Get  - Interfaz para acceder al stock del usuario
    array(
        'pass' => array('id','slug')
    ));


Router::connect('/products',                                array('controller' => 'products',   'action' => 'products')); 						// Acción Ajax - para administrar publicaciones.

//Router::connect('/search',                                  array('controller' => 'products',   'action' => 'search')); 						// Acción Ajax - para pausar buscar publicaciones.


Router::connect('/discard',	 								array('controller' => 'products',	'action' => 'discard'));	   					// Acción Ajax - para descartar un borrador registrado


Router::connect('/product/:id/:slug', 						array('controller' => 'products', 	'action' => 'view'),  				  			// Acción Get 	- Interfaz para visualizar un producto
    array(
        'pass' => array('id','slug'),
        'ext' => 'html'
    ));

//	Q
//	R
//	S
//	T
//	U
Router::connect('/logout',									array('controller' => 'users', 	'action' => 'logout'));								// Acción Get  - Para salir de la aplicación
Router::connect('/login',									array('controller' => 'users', 	'action' => 'login'));								// Acción Get  - Interfaz de entrada a la aplicación o registro de un nuevo usuario.
Router::connect('/in',										array('controller' => 'users', 	'action' => 'in'));									// Acción Ajax - Para entrar a la aplicación.
Router::connect('/new-user',								array('controller' => 'users', 	'action' => 'add'));								// Acción Ajax - Para registrar un nuevo usuario.
Router::connect('/check-email',								array('controller' => 'users', 	'action' => 'check_email')); 						// Acción Ajax - Para determinar si el correo ya se ha registrado.
Router::connect('/recover-account',							array('controller' => 'users', 	'action' => 'recover_account')); 					// Acción Ajax - Para recuperar una cuenta.
Router::connect('/terms-of-service',						array('controller' => 'users', 	'action' => 'terms_of_service')); 					// Acción Get
Router::connect('/privacy-policy',							array('controller' => 'users', 	'action' => 'privacy_policy')); 					// Acción Get

# This url is sent as a link to the user's email
Router::connect('/ve/:id/:key', 							array('controller' => 'users', 	'action' => 'verify_email_address'),  						// Acción Get 	- Verify email address
    array(
        'pass' => array('id','key')
    ));
Router::connect('/sea', 									array('controller' => 'users', 	'action' => 'send_email_again_to_verify_email_address'));  // Acción Ajax - send email again to verify email address

# This url is sent as a link to the user's email
Router::connect('/npr/:id/:key', 							array('controller' => 'users', 	'action' => 'new_password_request'),  						// Acción Get 	- to obtain access to the form to change password
    array(
        'pass' => array('id','key')
    ));
Router::connect('/snp', 						array('controller' => 'users', 	'action' => 'set_new_password')); // Acción Ajax - set new password

//	V
//	W
//	X
//	Y
//	Z



/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();