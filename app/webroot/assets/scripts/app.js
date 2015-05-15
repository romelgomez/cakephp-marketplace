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
    .factory('formCommon',function(){

//        var messages = {
//            userNotExist:'This email does not exist in our database.',
//            passwordDoesNotMatch:'The password does not match.',
//            banned:'This account was banned. Please contact us at support@cakephp-marketplace.com if you believe that there was a misunderstanding.',
//            suspended:'',
//            emailNotVerified:'The email is not verified. <button id="send-email-again" type="button" class="btn btn-link">Send me the email again.</button>',
//            noLogin:'An unexpected error occurred.'
//        };
//
//        switch (data.message) {
//            case 'user-not-exist':
//                message = ;
//                break;
//            case 'password-does-not-match':
//                message = 'The password does not match.';
//                break;
//            case 'banned':
//                message = 'This account was banned. Please contact us at support@cakephp-marketplace.com if you believe that there was a misunderstanding.';
//                break;
//            case 'suspended':
//                message = 'This account was suspended. Please contact us at support@cakephp-marketplace.com if you believe that there was a misunderstanding.';
//                break;
//            case 'email-not-verified':
//                message = '';
//                break;
//            case 'no-login':
//                message = 'An unexpected error occurred.';
//                break;
//            default:
//                message = 'An unexpected error occurred.';
//        }
//

        return {
        }
    })
    .controller('LoginController',['$scope','$http','$log',function($scope,$http,$log) {

        $scope.sizeOf = function(obj) {
            return Object.keys(obj).length;
        };

        $scope.alerts = [];

        $scope.closeAlert = function(index) {
            $scope.alerts.splice(index, 1);
        };

        $scope.user = {
            email: null,
            password: null
        };

        $scope.login = function(){
            if($scope.loginForm.$valid){
                $scope.myPromise = $http.post('/in', $scope.user).
                    success(function(data) {

                        var message = '';

                        if(data['status'] === 'success'){
                            window.location = "/";
                        }else{
                            switch (data.message) {
                                case 'user-not-exist':
                                    message = 'This email does not exist in our database.';
                                    break;
                                case 'password-does-not-match':
                                    message = 'The password does not match.';
                                    break;
                                case 'banned':
                                    message = 'This account was banned. Please contact us at support@cakephp-marketplace.com if you believe that there was a misunderstanding.';
                                    break;
                                case 'suspended':
                                    message = 'This account was suspended. Please contact us at support@cakephp-marketplace.com if you believe that there was a misunderstanding.';
                                    break;
                                case 'email-not-verified':
                                    message = 'The email is not verified. <button id="send-email-again" type="button" class="btn btn-link">Send me the email again.</button>';
                                    break;
                                case 'no-login':
                                    message = 'An unexpected error occurred.';
                                    break;
                                default:
                                    message = 'An unexpected error occurred.';
                            }

                            $scope.alerts.push({ type: 'danger', msg: message });
                        }

                    }).
                    error(function() {
                        window.location = "/";
                    });
            }
        };

    }]);

angular.module('filters',[])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    });

angular.module('app',['ui.bootstrap','forms']);