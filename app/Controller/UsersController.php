<?php
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController{

	/*
	 @Name              -> beforeFilter
	 @Description       -> This is CakePHP function. Check docs for more details.
	 */
	public function beforeFilter(){
        $this->{'Auth'}->allow(array('add','check_email','in','recover_account','terms_of_service','privacy_policy','new_password_request','set_new_password','verify_email_address','send_email_again_to_verify_email_address'));
        parent::beforeFilter();
    }

	/*
	 @Name              -> privacy_policy
	 @Description       -> The privacy policy.
	 @RequestType	    -> GET
	 @Parameters        -> NULL
	 @Receives       	-> NULL
	 @Returns           -> NULL
	 */
	public  function terms_of_service(){
	}

	/*
	 @Name              -> privacy_policy
	 @Description       -> The privacy policy.
	 @RequestType	    -> GET
	 @Parameters        -> NULL
	 @Receives       	-> NULL
	 @Returns           -> NULL
	 */
	public  function privacy_policy(){
	}

	/*
	 @Name              -> login
	 @Description       -> The method to represent Sign in forms. The (in) Ajax method is login real action.
	 @RequestType	    -> GET
	 @Parameters        -> NULL
	 @Receives       	-> NULL
	 @Returns           -> NULL
	 */
    public function login(){
		if($this->{'Auth'}->login()){
			$this->{'redirect'}('/');
		}
		$this->response->disableCache();
//		$this->layout = 'login';
	}

	/*
	 @Name              -> logout
	 @Description       -> sign out.
	 @RequestType	    -> GET
	 @Parameters        -> NULL
	 @Receives       	-> NULL
	 @Returns           -> NULL
	 */
    public function logout(){
        $this->{'Auth'}->logout();
        $this->{'redirect'}('/');
    }

	private function responseMessages($type,$I18n){

		if(!$I18n){
			$I18n = 'us_EN';
		}

		// status
		// message
		// messageType

		$messages = array(
			'alreadyVerified'=>array(
				'us_EN'=>'This account is already verified.',
				'es_VE'=>'Esta cuenta ya esta verificada.'
			),
			'banned'=>array(
				'us_EN'=>'This account was banned.',
				'es_VE'=>'Esta cuenta fue inhabilitada.'
			),
			'cannotSetNewParameters'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'cannotSaveNewUser'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'cannotSetNewPassword'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'emailNotVerified'=>array(
				'us_EN'=>'The email is not verified.',
				'es_VE'=>'El correo electrónico no se ha verificado.'
			),
			'emailNotSend'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'invalidData'=>array(
				'us_EN'=>'Invalid request.',
				'es_VE'=>''
			),
			'passwordDoesNotMatch'=>array(
				'us_EN'=>'The password does not match.',
				'es_VE'=>'La contraseña no coincide.'
			),
			'requestAccepted'=>array(
				'us_EN'=>'',
				'es_VE'=>''
			),
			'suspended'=>array(
				'us_EN'=>'This account was suspended.',
				'es_VE'=>'Esta cuenta fue suspendida.'
			),
			'theLinkIsInvalid'=>array(
				'us_EN'=>'',
				'es_VE'=>''
			),
			'theKeyIsInvalid'=>array(
				'us_EN'=>'',
				'es_VE'=>''
			),
			'userAlreadyExist'=>array(
				'us_EN'=>'The user already exist.',
				'es_VE'=>'El usuario ya existe.'
			),
			'userNotExist'=>array(
				'us_EN'=>'This email does not exist in our database.',
				'es_VE'=>'No hay nadie asociado con tal correo electrónico. Por favor verifique e inténtelo de nuevo.'
			),
			'unexpectedError'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Se ha producido un error inesperado.'
			)
		);

		return $messages[$type][$I18n];
	}



	/*
	 @Name              -> in
	 @Description       -> Login real action. Sign in method.
	 @RequestType	    -> AJAX-POST
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 2 elements:
		(email) 	=> Email of user account
		(password) 	=> Password of user account
	 @Returns           -> Array, which is presented as json string with the json_encode() function in "ajax_view" view, in the ajax layout.
	 */
	public function in(){
        $request = $this->{'request'}->input('json_decode',true);

		$options = array(
            'conditions' => array(
                'User.email' 		=> $request['email'],
            )
        );

		$user = $this->{'User'}->find('first',$options);

		if($user){
			$passwordHash = Security::hash($request['password'], 'blowfish', $user['User']['password']);

			// checks that the user password match
			if($passwordHash === $user['User']['password']){
				// checks that the user is not banned
				if(!$user['User']['banned']){
					// checks that the user is not suspended
					if(!$user['User']['suspended']){
						// checks that the user has email already verified
						if($user['User']['email_verified']){
							if($this->{'Auth'}->login($user)){
								$return['status'] = 'success';
							}else{
								$return['status'] 		= 'error';
								$return['message'] 		= $this->responseMessages('unexpectedError','es_VE');
								$return['messageType'] 	= 'unexpectedError';
							}
						}else{
							$return['status'] = 'error';
							$return['message'] 		= $this->responseMessages('emailNotVerified','es_VE');
							$return['messageType'] 	= 'emailNotVerified';
						}
					}else{
						$return['status'] = 'error';
						$return['message'] 		= $this->responseMessages('suspended','es_VE');
						$return['messageType'] 	= 'suspended';
					}
				}else{
					$return['status'] = 'error';
					$return['message'] 		= $this->responseMessages('banned','es_VE');
					$return['messageType'] 	= 'banned';
				}
			}else{
				$return['status'] = 'error';
				$return['message'] 		= $this->responseMessages('passwordDoesNotMatch','es_VE');
				$return['messageType'] 	= 'passwordDoesNotMatch';
			}
		}else{
			$return['status'] = 'error';
			$return['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$return['messageType'] 	= 'userNotExist';

		}

		$this->{'set'}('return',$return);
        $this->{'render'}('ajax_view','ajax');
    }

	/*
	 @Name              -> verify_email_address
	 @Description       -> verify email address of the new user
	 @RequestType	    -> AJAX-POST
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 2 elements:
		(id)		=> Is uuid UserId;
		(key)		=> Is uuid temp key, is related to temp_password which is hash based on that key, is processed for Security::hash blowfish pipeline, and is used to verify the user account.
	 @Returns           -> Array, which is presented as json string with the json_encode() function in "ajax_view" view, in the ajax layout.
	 */
	public function verify_email_address(){
		$request = $this->{'request'}->params;

		$options = array(
				'conditions' => array(
						'User.id' 		=> $request['id'],
				)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){
			// checks that the email is not verified
			if(!$user['User']['email_verified']){

				$tempPasswordHash = Security::hash($request['key'], 'blowfish', $user['User']['temp_password']);

				if($tempPasswordHash===$user['User']['temp_password']){
					$data =	array(
						'User'=>Array
						(
							'id'=>$user['User']['id'],
							'email_verified' =>	1,
						)
					);

					if($this->{'User'}->save($data)){
						$return['status'] = 'success';
					}else{
                        $return['status']  = 'error';
                        $return['message'] = 'cannotSetNewParameters';
                        $return['message'] = $this->responseMessages('cannotSetNewParameters','es_VE');
					}
				}else{
					$return['status']   = 'error';
					$return['message']  = 'theLinkIsInvalid';
                    $return['message'] 	= $this->responseMessages('theLinkIsInvalid','es_VE');
				}
			}else{
                $return['status']       = 'error';
                $return['message'] 		= $this->responseMessages('alreadyVerified','es_VE');
                $return['messageType'] 	= 'alreadyVerified';
			}
		}else{
            $return['status']       = 'error';
            $return['message'] 		= $this->responseMessages('userNotExist','es_VE');
            $return['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('data',$return);
	}


	/*
	 @Name              -> send_email_again_to_verify_email_address
	 @Description       -> send email again to verify email address
	 @RequestType	    -> AJAX-POST
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 1 elements:
		(email) => Email of user account
	 @Returns           -> Array, which is presented as json string with the json_encode() function in "ajax_view" view, in the ajax layout.
	 */
	public function send_email_again_to_verify_email_address(){
		$request = $this->{'request'}->input('json_decode',true);
		$return = array();

		$options = array(
				'conditions' => array(
						'User.email' 		=> $request['email'],
				)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){

			// checks that the email is not verified
			if(!$user['User']['email_verified']){
				$publicKey	 	= String::uuid();
				$privateKeyHash = Security::hash($publicKey);

				$data =	array(
					'User'=>Array
					(
						'id'			=> $user['User']['id'],
						'temp_password'	=> $privateKeyHash
					)
				);

				if($this->{'User'}->save($data)){

                    // In production uncomment the following code ==> START
//					$userData = $this->{'User'}->read();
//					$Email = new CakeEmail('default');
//					$Email->template('verifyEmail', 'verifyEmail');
//					$Email->viewVars(array('userId' => $userData['User']['id'],'publicKey'=>$publicKey));
//					$Email->emailFormat('both');
//					$Email->from(array('support@mystock.la' => 'MyStock.LA'));
//					$Email->to($userData['User']['email']);
//					$Email->subject('MyStock.LA - Verify your email address');
//
//					if ($Email->send()) {
//						$return['status'] = 'success';
//					}else{
//						$return['status'] = 'error';
//						$return['message'] = 'email-not-send';
//					}
                    // ==> END

                    $return['status'] = 'success';

				}else{
                    $return['status']       = 'error';
                    $return['message'] 		= $this->responseMessages('cannotSetNewParameters','es_VE');
                    $return['messageType'] 	= 'cannotSetNewParameters';
				}
			}else{
                $return['status']       = 'error';
                $return['message'] 		= $this->responseMessages('alreadyVerified','es_VE');
                $return['messageType'] 	= 'alreadyVerified';
			}
		}else{
            $return['status']       = 'error';
            $return['message'] 		= $this->responseMessages('userNotExist','es_VE');
            $return['messageType'] 	= 'userNotExist';
		}

	}

	/*
	 @Name              -> add
	 @Description       -> add new user
	 @RequestType	    -> AJAX-POST
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 3 elements:
		(name) => Name of user account
		(email) => Email of user account
		(password) => Password of user account
	 @Returns           -> Array, which is presented as json string with the json_encode() function in "ajax_view" view, in the ajax layout.
	 */
    public function add(){
        $request = $this->{'request'}->input('json_decode',true);
		$return = array();

		$this->{'User'}->set($request);
        if($this->{'User'}->validates()){

			$options = array(
					'conditions' => array(
							'User.email' 		=> $request['email'],
					)
			);

			$user = $this->{'User'}->find('first',$options);

			// checks that the user does not exist
			if(!$user){
				Security::setHash('blowfish');
				$passwordHash = Security::hash($request['password']);

				$publicKey	 	= String::uuid();
				$privateKeyHash = Security::hash($publicKey);

				$data =	array(
					'User'=>Array
					(
						'name'					=>	$request['name'],
						'lastName'	            =>	$request['lastName'],
						'email'					=>	$request['email'],
						'email_verified'		=>	1,                      // in production set to 0
						'password'				=>	$passwordHash,
						'temp_password'			=>	$privateKeyHash,
						'banned'				=>	0,
					)
				);

				if($this->{'User'}->save($data)){

                    // In production uncomment the following code ==> START
//                    $userData = $this->{'User'}->read();
//					$Email = new CakeEmail('default');
//					$Email->template('verifyEmail', 'verifyEmail');
//					$Email->viewVars(array('userId' => $userData['User']['id'],'publicKey'=>$publicKey));
//					$Email->emailFormat('both');
//					$Email->from(array('support@marketplace.com' => 'marketplace.com'));
//					$Email->to($userData['User']['email']);
//					$Email->subject('marketplace.com - Verify your email address');
//
//					if ($Email->send()) {
//						$return['status'] = 'success';
//					}else{
//                        $return['status']       = 'error';
//                        $return['message'] 		= $this->responseMessages('emailNotSend','es_VE');
//                        $return['messageType'] 	= 'emailNotSend';
//					}
                    // ==> END

                    $return['status'] = 'success';

                }else{
                    $return['status']       = 'error';
                    $return['message'] 		= $this->responseMessages('cannotSaveNewUser','es_VE');
                    $return['messageType'] 	= 'cannotSaveNewUser';
				}
			}else{
                $return['status']       = 'error';
                $return['message'] 		= $this->responseMessages('userAlreadyExist','es_VE');
                $return['messageType'] 	= 'userAlreadyExist';
            }
        }else{
            $return['status']       = 'error';
            $return['message'] 		= $this->responseMessages('invalidData','es_VE');
            $return['messageType'] 	= 'invalidData';
        }

        $this->{'set'}('return',$return);
        $this->{'render'}('ajax_view','ajax');
    }


	/*
	 @Name              -> check_email
	 @Description       -> to seed if email is already in database
	 @RequestType	    -> AJAX-POST
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 2 elements:
		(UserEmail)			=> Email to check in database
		(inverse_result)	=> If you want received inverse result
	 @Returns           -> Array, which is presented as json string with the json_encode() function in "ajax_view" view, in the ajax layout.
	 */
    public function check_email(){
		$request = $this->{'request'}->data;
		$return = false;

		$userEmailConditions = array(
				'conditions' => array('User.email' => $request['email']),
		);

        $email = $this->{'User'}->find('first',$userEmailConditions);

        if(isset($request['inverse_result'])){
            $inverse_result =  $request['inverse_result'];
            if($inverse_result){
                if(!$email){
                    $return = true;
                }else{
                    $return = false;
                }
            }
        }else{
			if($email){
				$return = true;
			}else{
				$return = false;
			}
		}

        $this->{'set'}('return',$return);
        $this->{'render'}('ajax_view','ajax');
    }

	/*
	 @Name              -> set_new_password
	 @Description       -> To set new password
	 @RequestType	    -> AJAX-POST
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 3 elements:
		(id)		=> Is uuid UserId;
		(key)		=> Is uuid temp key, is related to temp_password which is hash based on that key, is processed for Security::hash blowfish pipeline, and is used to verify the user account.
		(password)	=> Is the new password
	 @Returns           -> Array
	 */
	public function set_new_password(){
		$request = $this->{'request'}->input('json_decode',true);
		$return = array();

		$options = array(
				'conditions' => array(
						'User.id' 		=> $request['id'],
				)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){
			$tempPasswordHash = Security::hash($request['key'], 'blowfish', $user['User']['temp_password']);

			if($tempPasswordHash===$user['User']['temp_password']){
				Security::setHash('blowfish');
				$passwordHash = Security::hash($request['password']);

				$publicKey	 	= String::uuid();
				$privateKeyHash = Security::hash($publicKey);

				$data =	array(
					'User'=>Array
					(
						'id'			=>	$user['User']['id'],
						'password'		=>	$passwordHash,
						'temp_password'	=>	$privateKeyHash,
					)
				);

				if($this->{'User'}->save($data)){
                    // In production uncomment the following code ==> START
					// Send email to notify what the password has been changed
//                    $userData = $this->{'User'}->read();
//					$Email = new CakeEmail('default');
//					$Email->template('passwordHasBeenChanged', 'passwordHasBeenChanged');
////					$Email->viewVars(array('userId' => $userData['User']['id'],'publicKey'=>$publicKey));
//					$Email->emailFormat('both');
//					$Email->from(array('support@mystock.la' => 'MyStock.LA'));
//					$Email->to($userData['User']['email']);
//					$Email->subject('MyStock.LA - You password has been changed');
////
//					if ($Email->send()) {
//						$return['status'] = 'success';
//					}else{
//						$return['status'] = 'error';
//						$return['message'] = 'email-not-send';
//					}
                    // ==> END

                    $return['status'] = 'success';

                }else{
                    $return['status']       = 'error';
                    $return['message'] 		= $this->responseMessages('cannotSetNewPassword','es_VE');
                    $return['messageType'] 	= 'cannotSetNewPassword';
				}
			}else{
				$return['status'] 	    = 'error';
                $return['message'] 		= $this->responseMessages('theKeyIsInvalid','es_VE');
                $return['messageType'] 	= 'theKeyIsInvalid';
			}
		}else{
            $return['status'] 	    = 'error';
            $return['message'] 		= $this->responseMessages('userNotExist','es_VE');
            $return['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('return',$return);
		$this->{'render'}('ajax_view','ajax');
	}

	/*
	 @Name              -> new_password_request
	 @Description       -> To accept or not, set new password, if pass the test, the user will be able to see the form.
	 @RequestType	    -> GET;
	 @Parameters        -> NULL
	 @Receives       	-> Array which has 2 elements:
		(id)	=> Is uuid UserId;
		(key)	=> Is uuid temp key, is related to temp_password which is hash based on that key, is processed for Security::hash blowfish pipeline, and is used to verify the user account.
	 @Returns           -> Array
	 */
	public function  new_password_request(){
		$request = $this->{'request'}->params;

		$options = array(
				'conditions' => array(
						'User.id' 		=> $request['id'],
				)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){
			$tempPasswordHash = Security::hash($request['key'], 'blowfish', $user['User']['temp_password']);
			if($tempPasswordHash===$user['User']['temp_password']){
				$return['status'] 	= 'success';
				$return['message']	= 'request-accepted';
				$return['id']       = $request['id'];
				$return['key']      = $request['key'];
			}else{
                $return['status'] 	    = 'error';
                $return['message'] 		= $this->responseMessages('theLinkIsInvalid','es_VE');
                $return['messageType'] 	= 'theLinkIsInvalid';
			}
		}else{
            $return['status'] 	    = 'error';
            $return['message'] 		= $this->responseMessages('userNotExist','es_VE');
            $return['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('data',$return);
	}

	/*
	 @Name              -> recover_account
	 @Description       -> for recover account
	 @RequestType	    -> AJAX-POST;
	 @Parameters        -> NULL
	 @Receives       	-> JSON object parsed to array, which has 1 elements:
		(email) => email user account
	 @Returns           -> Array, which is presented as json string with the json_encode() function in "ajax_view" view, in the ajax layout.
	 */
    public function recover_account(){
        $request = $this->{'request'}->input('json_decode',true);
		$return  = array();

		$options = array(
			'conditions' => array(
				'User.email' 	=> $request['email'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){

			// checks that user is not banned
			if(!$user['User']['banned']){
				// checks that the user is not suspended
				if(!$user['User']['suspended']){
					Security::setHash('blowfish');

					$publicKey	 = String::uuid();
					$privateKey  = Security::hash($publicKey);

					$data =	array(
							'User'=>Array
							(
									'id'				=>$user['User']['id'],
									'email_verified' 	=> 1,
									'temp_password'		=>$privateKey,
							)
					);

					if($this->{'User'}->save($data)){

                        // In production uncomment the following code ==> START
//                        $Email = new CakeEmail('default');
//						$Email->template('newPasswordRequest', 'newPasswordRequest');
//						$Email->viewVars(array('userId' => $user['User']['id'],'publicKey'=>$publicKey));
//						$Email->emailFormat('both');
//						$Email->from(array('support@marketplace.com' => 'MarketPlace.com'));
//						$Email->to($user['User']['email']);
//						$Email->subject('MarketPlace.com - Set new password');
//
//						if ($Email->send()) {
//							$return['status'] = 'success';
//						}else{
//                            $return['status']       = 'error';
//                            $return['message'] 		= $this->responseMessages('emailNotSend','es_VE');
//                            $return['messageType'] 	= 'emailNotSend';
//						}
                        // ==> END

                        $return['status'] = 'success';


                    }else{
                        $return['status']       = 'error';
                        $return['message'] 		= $this->responseMessages('cannotSetNewParameters','es_VE');
                        $return['messageType'] 	= 'cannotSetNewParameters';
					}
				}else{
                    $return['status']       = 'error';
                    $return['message'] 		= $this->responseMessages('suspended','es_VE');
                    $return['messageType'] 	= 'suspended';
				}
			}else{
                $return['status']       = 'error';
                $return['message'] 		= $this->responseMessages('banned','es_VE');
                $return['messageType'] 	= 'banned';
			}
		}else{
            $return['status']       = 'error';
            $return['message'] 		= $this->responseMessages('userNotExist','es_VE');
            $return['messageType'] 	= 'userNotExist';
		}

        $this->{'set'}('return',$return);
        $this->{'render'}('ajax_view','ajax');
    }

}
