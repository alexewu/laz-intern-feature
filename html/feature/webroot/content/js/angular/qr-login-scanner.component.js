(function() {

    var app = angular.module("feature");

    app.component("qrLoginScanner", {
        templateUrl: 'feature/webroot/content/js/angular/qr-login-scanner.html',
        controller: 'qrLoginScannerController'
    });

    app.controller('qrLoginScannerController', qrLoginScannerController);
    qrLoginScannerController.$inject = ['qrLoginService', 'qrScanner'];

    function qrLoginScannerController(qrLoginService, qrScanner)
    {
        var ctrl = this;
        qrScanner.subscribe(doQrLogin);
        ctrl.redirectToLoginWebcam = function ()
        {
            //windowService.redirect('/main/Login/action/openWebcam');
        };

        ctrl.redirectToTeacherUsernameForm = function ()
        {
            //windowService.redirect('/main/Login');
        };

        ctrl.$onDestroy = function ()
        {
            qrScanner.unsubscribe(doQrLogin);
        };

        function redirectToStudentPortal() {
            ctrl.isSuccessfulLogin = true;
            //windowService.redirect('/main/StudentPortal');
        }

        function setInvalidLoginError() {
            ctrl.isInvalidQrPassword = true;
            ctrl.errorMessage = "Invalid QR Code";
        }

        function doQrLogin(qrPasscode) {
            ctrl.isLoggingIn = true;
            qrLoginService.getQrPasscodeFromStudentId()
                .then(function (response) {
                    console.log(response + " " + qrPasscode);
                    if(response['data'] === qrPasscode) {
                        redirectToStudentPortal();
                    }
                    else {
                        setInvalidLoginError();
                    }
                });
        }
    }
})();