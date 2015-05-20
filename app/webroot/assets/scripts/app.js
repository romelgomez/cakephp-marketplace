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

angular.module('forms',['ngMessages','cgBusy','jlareau.pnotify'])
	.controller('FormsController',['$scope','$modal','$log',function($scope,$modal,$log){
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
    .controller('RecoverAccountController',['$scope','$modalInstance',function($scope,$modalInstance){
//        $scope.ok = function () {
//            $modalInstance.close('it ok');
//        };
//
//        $scope.cancel = function () {
//            $modalInstance.dismiss('cancel the form recover Account');
//        };
    }])
    .controller('NewUserController',['$scope','$modalInstance','notificationService',function($scope,$modalInstance,notificationService){

        $scope.model = {
            name: null,
            email: null,
            lastName: null,
            password: null,
            termsOfService: false
        };

        $scope.submit = function () {
            if($scope.form.$valid){
//                $scope.httpRequestPromise = $http.post('/in', $scope.model).
//                    success(function(data) {
//                        if(data['status'] === 'success'){
//                            window.location = "/";
//                        }else{
//                            notificationService.error(data.message);
//                        }
//                    }).
//                    error(function() {
//                        window.location = "/";
//                    });
            }

            //  $modalInstance.close('it ok');

        };
//
        $scope.cancel = function () {
            $modalInstance.dismiss();
        };
    }]);

//https://angular-ui.github.io/bootstrap/#/modal
//angular.module('modalDemo',[])
//    .controller('ModalDemoCtrl', function ($scope, $modal, $log) {
//
//        $scope.items = ['item1', 'item2', 'item3'];
//        $scope.users = [
//            {
//                name:'romel',
//                lastName:'Gomez'
//            },
//            {
//                name:'Dilia',
//                lastName:'Gomez'
//            },
//            {
//                name:'Rudy',
//                lastName:'Gomez'
//            }
//        ];
//
//        $scope.open = function (size) {
//            var modalInstance = $modal.open({
//                templateUrl: 'myModalContent.html',
//                controller: 'ModalInstanceCtrl',
//                size: size,
//                resolve: {
//                    items: function () {
//                        return $scope.items;
//                    },
//                    users: function () {
//                        return $scope.users
//                    }
//                }
//            });
//
//            var success = function (selectedItem) {
//                $scope.selected = selectedItem;
//            };
//
//            var error = function (reason) {
//                $log.info('reason: ' + reason);
//                $log.info('Modal dismissed at: ' + new Date());
//            };
//
//            modalInstance.result.then(success,error);
//        };
//
//    })
//    .controller('ModalInstanceCtrl', function ($scope, $modalInstance, items, users) {
//
//        $scope.items = items;
////        $scope.users = users;
//
//        $scope.selected = {
//            item: $scope.items[0]
//        };
//
//        $scope.ok = function () {
//            $modalInstance.close($scope.selected.item);
//        };
//
//        $scope.cancel = function () {
//            $modalInstance.dismiss('cancel');
//        };
//
//    });

angular.module('filters',[])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    });

angular.module('app',['ui.bootstrap','forms']);
