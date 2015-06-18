<?php class PublicationsController extends AppController {


	public function beforeFilter(){

		$this->{'Auth'}->allow(array('_publications','publications','stock'));

		parent::beforeFilter();
	}

    public function _publications(){
        $request = $this->{'request'}->input('json_decode',true);
        $action  = $request['action'];
        $return	 = array();

        if($action === 'stock' || $action  === 'publications'){

            $return = $this->getPublications($request);

        }else{
            $return['status'] = 'error';
            $return['message'] = 'bad-request';
        }

        $this->{'set'}('return',$return);
        $this->{'render'}('ajax_view','ajax');
    }

	private function getPublications($request){

		$userLogged 	= $this->{'Auth'}->User();
		$search  		= '';
		$return	 		= array();
		$conditions 	= array();

		switch ($request['action']) {
			case 'published':

				// search - conditions
				if(!isset($request['search']) || $request['search'] == ''){
					$conditions = array('Product.user_id' => $userLogged['User']['id'],'Product.deleted'=>0,'Product.published'=>1);
				}else{
					$search = $this->cleanString($request["search"]);
					$conditions = array(
						'Product.user_id' => $userLogged['User']['id'],
						'Product.deleted'=>0,
						'Product.published'=>1,
						'or'=>array(
							'Product.title LIKE'=> '%'.$search.'%',
							'Product.body LIKE'=> '%'.$search.'%'
						)
					);
				}

				// total_products es la cantidad total de productos publicados, este resultado es indiferente a los filtros aplicados por el usuario.
				$totalProducts = $this->{'Product'}->find('count', array('conditions'=> array('Product.user_id' => $userLogged['User']['id'],'Product.deleted'=>0,'Product.published'=>1)));

				break;
			case 'drafts':

				// search - conditions
				if(!isset($request['search']) || $request['search'] == ''){
					$conditions = array('Product.user_id' => $userLogged['User']['id'],'Product.deleted'=>0,'Product.published'=>0);
				}else{
					$search = $this->cleanString($request["search"]);
					$conditions = array(
						'Product.user_id' => $userLogged['User']['id'],
						'Product.deleted'=>0,
						'Product.published'=>0,
						'or'=>array(
							'Product.title LIKE'=> '%'.$search.'%',
							'Product.body LIKE'=> '%'.$search.'%'
						)
					);
				}

				// total_products es la cantidad total de productos publicados, este resultado es indiferente a los filtros aplicados por el usuario.
				$totalProducts = $this->{'Product'}->find('count', array('conditions'=> array('Product.user_id' => $userLogged['User']['id'],'Product.deleted'=>0,'Product.published'=>0)));

				break;
			case 'stock':

				// search - conditions
				if(!isset($request['search']) || $request['search'] == ''){
					$conditions = array('Product.user_id' => $request['user'],'Product.deleted'=>0,'Product.published'=>1,'Product.status'=>1);
				}else{
					$search = $this->cleanString($request["search"]);
					$conditions = array(
						'Product.user_id' => $request['user-id'],
						'Product.deleted'=>0,
						'Product.published'=>1,
						'Product.status'=>1,
						'or'=>array(
							'Product.title LIKE'=> '%'.$search.'%',
							'Product.body LIKE'=> '%'.$search.'%'
						)
					);
				}

				// total_products es la cantidad total de productos publicados, este resultado es indiferente a los filtros aplicados por el usuario.
				$totalProducts = $this->{'Product'}->find('count', array('conditions'=> array('Product.user_id' => $request['user-id'],'Product.deleted'=>0,'Product.published'=>1)));

				break;
		}

		// page
		if(!isset($request['page']) || $request['page'] == ''){
			$page = 1;
		}else{
			$page = (int)$request['page'];
		}

		if(!isset($request['orderBy']) || $request['orderBy'] == ''){
			$order	 = array('Product.created' => 'desc');
			$orderBy = 'latest';
		}else{

			switch ($request['orderBy']) {
				case 'highest-price':
					$order	 = array('Product.price' => 'desc');
					$orderBy = 'highest-price';
					break;
				case 'lowest-price':
					$order	 = array('Product.price' => 'asc');
					$orderBy = 'lowest-price';
					break;
				case 'latest':
					$order	 = array('Product.created' => 'desc');
					$orderBy = 'latest';
					break;
				case 'oldest':
					$order = array(
						'Product.created' => 'asc'
					);
					$orderBy = 'oldest';
					break;
				case 'higher-availability':
					$order = array(
						'Product.quantity' => 'desc'
					);
					$orderBy = 'higher-availability';
					break;
				case 'lower-availability':
					$order = array(
						'Product.quantity' => 'asc'
					);
					$orderBy = 'lower-availability';
					break;
				default:
					$order = array(
						'Product.created' => 'desc'
					);
					$orderBy = 'latest';
			}

		}

		try {

			/* Primer intento:  pagina actual
             *******************************************************/
			$this->{'paginate'} = array(
				'conditions' =>  $conditions,
				'contain' => array(
					'Image'=>array(
					)
				),
				'order' => $order,
				'limit' => 10,
				'page'	=>$page
			);

			$products = $this->{'paginate'}('Product');

			$return['status'] 			= 'success';
			$return['products'] 		= $products;
			$return['orderBy']	 		= $orderBy;
			$return['search'] 			= $search;
			$return['totalItems'] 		= $this->{'request'}->params['paging']['Product']['count'];
			$return['itemsInThisPage'] 	= $this->{'request'}->params['paging']['Product']['current'];
			$return['currentPage'] 		= $this->{'request'}->params['paging']['Product']['page'];
			$return['totalPages'] 		= $this->{'request'}->params['paging']['Product']['pageCount'];
			$return['prevPage'] 		= $this->{'request'}->params['paging']['Product']['prevPage'];
			$return['nextPage'] 		= $this->{'request'}->params['paging']['Product']['nextPage'];

		}catch(Exception $e){

			try {
				/* Segundo intento:  pagina anterior
                *******************************************************/
				$previous_page = $page-1;

				$this->{'paginate '}= array(
					'conditions' =>  $conditions,
					'contain' => array(
						'Image'=>array(
						)
					),
					'order' => $order,
					'limit' => 10,
					'page'	=> $previous_page
				);

				$products = $this->{'paginate'}('Product');

				$return['status'] 			= 'success';
				$return['products'] 		= $products;
				$return['orderBy']	 		= $orderBy;
				$return['search'] 			= $search;
				$return['totalItems'] 		= $this->{'request'}->params['paging']['Product']['count'];
				$return['itemsInThisPage'] 	= $this->{'request'}->params['paging']['Product']['current'];
				$return['currentPage'] 		= $this->{'request'}->params['paging']['Product']['page'];
				$return['totalPages'] 		= $this->{'request'}->params['paging']['Product']['pageCount'];
				$return['prevPage'] 		= $this->{'request'}->params['paging']['Product']['prevPage'];
				$return['nextPage'] 		= $this->{'request'}->params['paging']['Product']['nextPage'];

			}catch (Exception $e){

				try {
					/* Tercer intento:  ultima pagina disponible
                    *******************************************************/
					$last_page = $this->{'request'}->params['paging']['Product']['pageCount'];

					$this->{'paginate'}= array(
						'conditions' =>  $conditions,
						'contain' => array(
							'Image'=>array(
							)
						),
						'order' => $order,
						'limit' => 10,
						'page'	=> $last_page
					);

					$products = $this->{'paginate'}('Product');

					$return['status'] 			= 'success';
					$return['products'] 		= $products;
					$return['orderBy']	 		= $orderBy;
					$return['search'] 			= $search;
					$return['totalItems'] 		= $this->{'request'}->params['paging']['Product']['count'];
					$return['itemsInThisPage'] 	= $this->{'request'}->params['paging']['Product']['current'];
					$return['currentPage'] 		= $this->{'request'}->params['paging']['Product']['page'];
					$return['totalPages'] 		= $this->{'request'}->params['paging']['Product']['pageCount'];
					$return['prevPage'] 		= $this->{'request'}->params['paging']['Product']['prevPage'];
					$return['nextPage'] 		= $this->{'request'}->params['paging']['Product']['nextPage'];

				}catch (Exception $e){
					$return['status'] = 'error';
					$return['message'] = 'undefined';
				}
			}
		}


		return $return;
	}


}
