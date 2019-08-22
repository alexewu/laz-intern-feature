(function() {

    var app = angular.module("feature");

    app.component("qrEdit", {
        templateUrl: 'feature/webroot/content/js/angular/qr-edit.html',
        controller: 'qrEditController',
        bindings:
            {
                studentId: "<"
            }
    });

    app.controller('qrEditController', qrEditController);
    qrEditController.$inject = ["qrLoginService"];

    function qrEditController(qrLoginService) {
        var ctrl = this;

        ctrl.$onInit = function() {
             qrLoginService.getQrPasscodeFromStudentId()
                 .then(function (response) {
                     ctrl.qrCode = response['data'];
                     console.log(ctrl.qrCode);
                     ctrl.hasQrPassword = true;
                     displayQrCode();
                 });
            ctrl.hasQrPassword = true;
        };

        function displayQrCode() {
            ctrl.qrImage = new QRCode('qrcode', {
                text: ctrl.qrCode,
                width: 100,
                height: 100
            });
        }

        ctrl.regenerate = function () {
            qrLoginService.regenerateNewQrCode()
                .then(function (response) {
                    ctrl.qrCode = response["data"];
                    ctrl.qrImage.makeCode(response["data"]);
                })
                .catch(function (response) {
                    ctrl.error = true;
                    ctrl.errorMessage = response;
                });
        };

        ctrl.onSubmit = function() {
            //downloadService.download("/api/qrLogin/qrStudentLoginPdf?studentId=" + ctrl.studentId);
        };
    }
})();