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
    .factory('URL', function($location) {

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
                angular.forEach(split_segments, function(parameter, index) {
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

                        //console.log(url_obj.search);

                    }
                    if(parameter.indexOf("page-") !== -1){
                        url_obj.page = parseInt(utility.stringReplace(parameter,'page-',''));
                    }


                    if(parameter == 'highest-price'){
                        url_obj['order-by'] = "highest-price";
                    }
                    if(parameter == 'lowest-price'){
                        url_obj['order-by'] = "lowest-price";
                    }
                    if(parameter == 'latest'){
                        url_obj['order-by'] = "latest";
                    }
                    if(parameter == 'oldest'){
                        url_obj['order-by'] = 'oldest';
                    }
                    if(parameter == 'higher-availability'){
                        url_obj['order-by'] = 'higher-availability';
                    }
                    if(parameter == 'lower-availability'){
                        url_obj['order-by'] = 'lower-availability';
                    }
                });
            }
        }

        return {
            obj: url_obj
        };
    })
    .controller('PublicationsController',['$scope','$http','notificationService','$location','URL','$log',function($scope,$http,notificationService,$location,URL,$log){

//        $log.log('URL.obj',URL.obj);

        var lastResponseData = {};

        $scope.model = URL.obj;

        $scope.httpRequestPromise = $http.post('/products', $scope.model).
            success(function(data) {
                // Si la sesión ha expirado
                if(data['expired_session']){
                    window.location = "/login";
                }
                if(data['status'] === 'success'){
                    lastResponseData = data;
//                    process();
                }else{
                    window.location = "/";
                }
            }).
            error(function() {
                window.location = "/";
            });

    }]);

angular.module('filters',[])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    });

angular.module('app',['ui.bootstrap','forms','publications']);
