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

angular.module('forms',['ngMessages','cgBusy'])
	.controller('FormsController',['$scope',function($scope){
		$scope.sizeOf = function(obj) {
			var len = 0, key;
			for (key in obj) {
				if (obj.hasOwnProperty(key)) len++;
			}
			return len;
		};

		$scope.alerts = [];

		$scope.closeAlert = function(index) {
			$scope.alerts.splice(index, 1);
		};
	}])
    .controller('LoginFormController',['$scope','$http','$modal','$log',function($scope,$http,$modal,$log) {

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
                            $scope.alerts.push({ type: 'danger', msg: data.message });
                        }
                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };


        $scope.recoverAccount = function (size) {
            var modalInstance = $modal.open({
                templateUrl: 'recoverAccountModal.html',
                controller: 'RecoverAccountController',
                size: size
            });

            var success = function (message) {
                $log.log('success message: ',message)
            };

            var error = function (reason) {
                $log.info('error reason: ' + reason);
            };

            modalInstance.result.then(success,error);
        };

        $scope.newUser = function (size) {
            var modalInstance = $modal.open({
                templateUrl: 'newUserModal.html',
                controller: 'NewUserController',
                size: size
            });

            var success = function (message) {
                $log.log('success message: ',message)
            };

            var error = function (reason) {
                $log.info('error reason: ' + reason);
            };

            modalInstance.result.then(success,error);
        };


	}])
    .controller('RecoverAccountController',['$scope','$modalInstance',function($scope,$modalInstance){
        $scope.ok = function () {
            $modalInstance.close('it ok');
        };

        $scope.cancel = function () {
            $modalInstance.dismiss('cancel the form recover Account');
        };
    }])
    .controller('NewUserController',['$scope','$modalInstance',function($scope,$modalInstance){
        $scope.ok = function () {
            $modalInstance.close('it ok');
        };

        $scope.cancel = function () {
            $modalInstance.dismiss('cancel the form newUser');
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
