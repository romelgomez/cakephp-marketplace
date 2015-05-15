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





//        var notification;
//
//        $scope.newUser = function(){
//        };
//
//        $scope.endNotification = function(){
//        };
//        // alternatively, register the interceptor via an anonymous factory
//        $httpProvider.interceptors.push(function() {
//            return {
//                'request': function(config) {
//                    notification = Notification.set("beforeSend")
//                },
//
//                'response': function(response) {
//                    Notification.set("complete",notification);
//                }
//            };
//        });
//
//.factory('Notification',function(notificationService){
//
//    var defaultOptions = {
//        'init' : {
//            'title':    'Processing',
//            'text' :    'Wait a moment while we process your request.',
//            'type':     'info',
//            'icon':     'fa fa-spinner fa-spin',
//            'hide':     false,
//            'closer':   false,
//            'sticker':  false,
//            'opacity':  .75,
//            'shadow':   false,
//            'history':  false
//        },
//        'success' : {
//            'title':    'Ready!',
//            'text' :    'Your request has been processed successfully.',
//            'type':     'success',
//            'hide':     true,
//            'closer':   true,
//            'sticker':  true,
//            'icon':     'glyphicon glyphicon-ok-sign',
//            'opacity':  1,
//            'shadow':   true,
//            'history':  true
//        },
//        'error': {
//            'title':    'Error!',
//            'text' :    'An error has occurred while processing your request.',
//            'type' :    'error',
//            'icon':     'glyphicon glyphicon-warning-sign',
//            'hide':     true,
//            'closer':   true,
//            'sticker':  true,
//            'opacity':  1,
//            'shadow':   true,
//            'history':  true
//        }
//    };
//
//    return {
//        set: function(event,notification,options){
//            switch(event) {
//                case 'beforeSend':
//                    var notice;
//                    if ( options !== undefined ) {
//                        notice = notificationService.notify(options);
//                    }else{
//                        notice = notificationService.notify(defaultOptions['init']);
//                    }
//                    break;
//                case 'success':
//                    if ( options !== undefined ) {
//                        notification.update(options);
//                    }else{
//                        notification.update(defaultOptions['success']);
//                    }
//                    break;
//                case 'error':
//                    if ( options !== undefined ) {
//                        notification.update(options);
//                    }else{
//                        notification.update(defaultOptions['error']);
//                    }
//                    break;
//                case 'complete':
//                    notification.remove();
//                    break;
//            }
//
//            return notice;
//        }
//    }
//});