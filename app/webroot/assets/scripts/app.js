'use strict';

angular.module('httpDelay',[])
    .config(['$httpProvider', function($httpProvider) {
        // http://www.bennadel.com/blog/2802-simulating-network-latency-in-angularjs-with-http-interceptors-and-timeout.htm

        $httpProvider.interceptors.push( httpDelay );


        // I add a delay to both successful and failed responses.
        function httpDelay( $timeout, $q ) {

            var delayInMilliseconds = 3000;

            // Return our interceptor configuration.
            return({
                response: response,
                responseError: responseError
            });


            // ---
            // PUBLIC METHODS.
            // ---


            // I intercept successful responses.
            function response( response ) {

                var deferred = $q.defer();

                $timeout(
                    function() {

                        deferred.resolve( response );

                    },
                    delayInMilliseconds,
                    // There's no need to trigger a $digest - the view-model has
                    // not been changed.
                    false
                );

                return( deferred.promise );

            }


            // I intercept error responses.
            function responseError( response ) {

                var deferred = $q.defer();

                $timeout(
                    function() {

                        deferred.reject( response );

                    },
                    delayInMilliseconds,
                    // There's no need to trigger a $digest - the view-model has
                    // not been changed.
                    false
                );

                return( deferred.promise );

            }

        }

    }]);

angular.module('forms',['ngMessages','cgBusy','jlareau.pnotify','validation.match'])
	.controller('FormsController',['$scope','$modal',function($scope,$modal){
        $scope.recoverAccount = function (size) {
            $modal.open({
                templateUrl: 'recoverAccountModal.html',
                controller: 'RecoverAccountController',
                size: size
            });
        };
        $scope.newUser = function (size) {
            $modal.open({
                templateUrl: 'newUserModal.html',
                controller: 'NewUserController',
                size: size
            });
        };
        $scope.verifyEmail = function(size){
            $modal.open({
                templateUrl: 'verifyEmailModal.html',
                controller: 'VerifyEmailController',
                size: size
            });
        };
    }])
    .controller('LoginFormController',['$scope','$http','notificationService',function($scope,$http,notificationService) {

        $scope.model = {
            email: null,
            password: null
        };

        $scope.submit = function(){
            if($scope.form.$valid){
                $scope.httpRequestPromise = $http.post('/in', $scope.model).
                    success(function(data) {
                        if(data['status'] === 'success'){
                            window.location = "/";
                        }else{
                            notificationService.error(data.message);
                        }
                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };

	}])
    .controller('NewPasswordController',['$scope','$http','notificationService',function($scope,$http,notificationService) {

        $scope.model = {
            password: null,
            passwordAgain: null
        };

        $scope.submit = function(){
            if($scope.form.$valid){
                $scope.httpRequestPromise = $http.post('/snp', $scope.model).
                    success(function(data) {
                        if(data['status'] === 'success'){

                            notificationService.success('Listo, ahora intente iniciar sesión en su cuenta.');

//                            form.find('.form-group').hide();
//                            form.find('button').hide();


                        }else{
                            notificationService.error(data.message);
                        }
                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };

	}])
    .controller('RecoverAccountController',['$scope','$http','$modalInstance','notificationService',function($scope,$http,$modalInstance,notificationService){

        $scope.model = {
          email: null
        };

        $scope.submit = function () {
            if($scope.form.$valid){
                $scope.httpRequestPromise = $http.post('/recover-account', $scope.model).
                    success(function(data) {
                        if(data['status'] === 'success'){
                            notificationService.success('Ya le enviamos un correo electrónico para que recupere su cuenta.');
                            $modalInstance.close();
                        }else{
                            notificationService.error(data.message);
                        }
                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };

        $scope.cancel = function () {
            $modalInstance.dismiss();
        };

    }])
    .controller('NewUserController',['$scope','$http','$modalInstance','notificationService',function($scope,$http,$modalInstance,notificationService){

        $scope.model = {
            name: null,
            email: null,
            lastName: null,
            password: null,
            termsOfService: false
        };

        $scope.submit = function () {
            if($scope.form.$valid){
                $scope.httpRequestPromise = $http.post('/new-user', $scope.model).
                    success(function(data) {
                        if(data['status'] === 'success'){
                            notificationService.success('Casi listo, le hemos enviado un correo para verificar y activar su cuenta.');
                            $modalInstance.close();
                        }else{
                            notificationService.error(data.message);
                        }
                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };

        $scope.cancel = function () {
            $modalInstance.dismiss();
        };

    }])
    .controller('VerifyEmailController',['$scope','$http','$modalInstance','notificationService',function($scope,$http,$modalInstance,notificationService){

        $scope.model = {
            email: null
        };

        $scope.submit = function () {
            if($scope.form.$valid){
                $scope.httpRequestPromise = $http.post('/sea', $scope.model).
                    success(function(data) {
                        if(data['status'] === 'success'){
                            notificationService.success('Ya hemos enviado otro correo electrónico para verificar su cuenta.');
                            $modalInstance.close();
                        }else{
                            notificationService.error(data.message);
                        }
                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };

        $scope.cancel = function () {
            $modalInstance.dismiss();
        };

    }]);

angular.module('publications',[])
    .factory('urlInfo', function($location) {

        var pathname 	= $location.absUrl();
        var url 		= window.purl(pathname);
        var segments	= url.attr('fragment');
        var action   	= url.segment(1);
        var userId   	= url.segment(2);

        var url_obj         	= {};
        url_obj['action']     	= action;
        url_obj['user-id']     	= userId;
        url_obj['search']      	= '';
        url_obj['page']        	= '';
        url_obj['order-by']    	= '';

        if(segments != ''){
            var split_segments = url.attr('fragment').split('/');
            if(split_segments.length){
                angular.forEach(split_segments, function(parameter) {
                    if(parameter.indexOf("search-") !== -1){
                        var search_string = utility.stringReplace(parameter,'search-','');
                        /* La cadena search_string se manipula en el siguiente orden.
                         *
                         * 1) se reemplaza los caracteres especiales
                         * 2) se elimina los espacios en blancos ante y después de la cadena
                         * 3) se reemplaza los espacios en blancos largos por uno solo.
                         *
                         ********************************************************************/
                        url_obj.search = search_string.replace(/[^a-zA-Z0-9]/g,' ').trim().replace(/\s{2,}/g, ' ');
                    }
                    if(parameter.indexOf("page-") !== -1){
                        url_obj.page = parseInt(utility.stringReplace(parameter,'page-',''));
                    }
                    switch(parameter) {
                        case 'highest-price':
                            url_obj['order-by'] = "highest-price";
                            break;
                        case 'lowest-price':
                            url_obj['order-by'] = "lowest-price";
                            break;
                        case 'latest':
                            url_obj['order-by'] = "latest";
                            break;
                        case 'oldest':
                            url_obj['order-by'] = 'oldest';
                            break;
                        case 'higher-availability':
                            url_obj['order-by'] = 'higher-availability';
                            break;
                        case 'lower-availability':
                            url_obj['order-by'] = 'lower-availability';
                            break;
                    }
                });
            }
        }

        return url_obj;
    })
	.factory('publications',function($filter){

		return {
			digest:function(list){
				var publications = [];
				if(list.length > 0){
					angular.forEach(list,function(publication){
						var obj = {
							id: 		publication['Product']['id'],
							title:		$filter('capitalizeFirstChar')(publication['Product']['title']),
							slug:		$filter('slug')(publication['Product']['title']),
							status:		publication['Product']['status'],
							price:		publication['Product']['price'],
							quantity:	publication['Product']['quantity'],
							created:	$filter('dateParse')(publication['Product']['created'],'dd/MM/yyyy - hh:mm a')
						};
						obj.link = '/product/'+obj.id+'/'+obj.slug+'.html';
						obj.draftLink = '/edit-draft/'+obj.id;

						if(publication['Image'] == undefined || publication['Image'].length == 0){
							obj.image = '/assets/images/no-image-available.png'
						}else{
							obj.image = '/assets/images/publications/'+publication['Image'][0]['name'];
						}
						publications.push(obj);
					});
				}
				return publications;
			}
		};

	})
    .controller('PublicationsController',['$scope','$http','notificationService','urlInfo','$filter','publications','$log',function($scope,$http,notificationService,urlInfo,$filter,publications,$log){

        $log.log('urlInfo',urlInfo);

        $scope.publications = [];

        $scope.model = urlInfo;

        $scope.httpRequestPromise = $http.post('/products', $scope.model).
            success(function(data) {
                $log.log('httpRequest data: ',data);

                if(data['expired_session']){
                    window.location = "/login";
                }

                if(data['status'] === 'success'){
					$scope.publications = publications.digest(data['data']['products']);
                }else{
                    window.location = "/";
                }

            }).
            error(function() {
                window.location = "/";
            });

    }])
	.directive('paginate',[function(){

	}])
    .directive('publications',['$log','$templateCache','$compile',function($log,$templateCache,$compile){

        return {
            restrict:'E',
            scope: {
				'publications':'=data',
				'type':'@'
			},
            link:function(scope,element,attrs){

				if(typeof scope.publications ==  "undefined"){
					throw { message: 'attrs data is not defined' };
				}
				if(typeof scope.type ==  "undefined"){
					throw { message: 'attrs type is not defined' };
				}

				scope.$watch('publications', function(){

					var template = '';

					switch(scope.type) {
						case 'published':
							if(scope.publications.length > 0){
								template = 'published.html';
							}else{
								template = 'noPublished.html';
							}
							break;
						case 'drafts':
							if(scope.publications.length > 0){
								template = 'drafts.html';
							}else{
								template = 'noDrafts.html';
							}
							break;
						case 'stock':
							if(scope.publications.length > 0){
								template = 'stock.html';
							}else{
								template = 'noStock.html';
							}
							break;
					}

					element.html($compile($templateCache.get(template))(scope));

				});

			}
        };
    }]);

angular.module('filters',[])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    })
    .filter('slug', function() {
        return function(input) {
            return (!!input) ? String(input).trim().toLowerCase().replace(/([-()\[\]{}+?*.$\^|,:#<!\\®\/´`])/g, ' ').replace(/\s+/g, ' ').replace(/\s+/g, '-') : '';  //  http://www.regexr.com/  | http://stackoverflow.com/questions/11092951/regex-friendly-url
        };
    })
    .filter('capitalizeFirstChar', function() {
        return function(input) {
            return (!!input) ? input.trim().replace(/(^\w{0,1})/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1);}) : '';
        };
    })
	.filter('dateParse', function($filter) {
        return function(input,format,timezone) {
            return (!!input) ? $filter('date')( Date.parse(input), format, timezone) : '';
        };
    });

angular.module('app',['ui.bootstrap','forms','publications','filters']);
