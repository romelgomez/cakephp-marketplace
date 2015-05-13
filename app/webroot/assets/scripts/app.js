'use strict';

angular.module('forms',['ngMessages'])
    .controller('LoginController',['$scope','$http','$log',function($scope,$http,$log) {

        $scope.alerts = [];

        $scope.closeAlert = function(index) {
            $scope.alerts = [];
        };

        $scope.user = {
            email: null,
            password: null
        };

        $scope.login = function(){
            if($scope.loginForm.$valid){
                $http.post('/in', $scope.user).
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


angular.module('app',['ui.bootstrap','forms'])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    });


var login = function(){

    var notification;

    var request_parameters = {
        "requestType":"form",
        "type":"post",
        "url":"/in",
        "data":{},
        "form":{
            "id":"login-form",
            "inputs":[
                {'id':'login-email',          'name':'email'},
                {'id':'login-password',       'name':'password'}
            ]
        },
        "callbacks":{
            "beforeSend":function(){
                notification = ajax.notification("beforeSend");
            },
            "success":function(response){

                var message = '';

                if(response['status'] === 'success'){
                    window.location = "/";
                }else{
                    ajax.notification("complete",notification);

                    switch (response['message']) {
                        case 'user-not-exist':
                            message = 'This email does not exist in our database.';
                            break;
                        case 'password-does-not-match':
                            message = 'The password does not match.';
                            break;
                        case 'banned':
                            message = 'This account was banned. Please contact us at support@mystock.la if you believe that there was a misunderstanding.';
                            break;
                        case 'suspended':
                            message = 'This account was suspended. Please contact us at support@mystock.la if you believe that there was a misunderstanding.';
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

                    $("#login-form").find('.message').html(utility.alert(message,'danger'));
                }

            },
            "error":function(){
                ajax.notification("error",notification);
            },
            "complete":function(){
            }
        }
    };

    // Validation:
    var loginUserValidateObj = {
        "submitHandler": function(){
            ajax.request(request_parameters);
        },
        "rules":{
            "login-email":{
                "required":true,
                "email": true,
                "maxlength":30
            },
            "login-password":{
                "required":true,
                "rangelength": [7, 21]
            }
        },
        "messages":{
            "login-email":{
                "required":"The email is required.",
                "email":"You must provide a valid email.",
                "maxlength":"The email must not have more than 30 characters."
            },
            "login-password":{
                "required":"The password is required.",
                "rangelength":"You must provide a password that is between 7 and 21 characters."
            }
        }
    };

    validate.form("login-form",loginUserValidateObj);
};


//.directive('alert'),
//
//
//utility.alert = function(message,type,dismiss){
//
//    if ( type == undefined ) {
//        type = 'info';
//    }
//
//    var close = '';
//    if ( dismiss == undefined || dismiss === true ) {
//        close = '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
//    }
//
//    return '<div class="alert alert-' + type + ' alert-dismissible" role="alert">'+
//        close+
//        message+
//        '</div>';
//};