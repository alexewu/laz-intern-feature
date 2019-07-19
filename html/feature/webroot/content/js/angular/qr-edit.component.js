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
    qrEditController.$inject = ["qrLoginService", "downloadService", "$injector"];

    function qrEditController(qrLoginService, downloadService, $injector) {
        var ctrl = this;
        var rosterData = null;

        ctrl.$onInit = function() {
            if($injector.has('rosterData')) {
                rosterData = $injector.get('rosterData');
                ctrl.qrCode = rosterData.qrPassword;
                ctrl.studentId = rosterData.student.student_id;
                ctrl.hasQrPassword = (ctrl.qrCode !== "");
                if(ctrl.hasQrPassword) {
                    displayQrCode();
                }
            }
            else {
                qrLoginService.getQrPasscodeFromStudentId(ctrl.studentId)
                    .then(function (response) {
                        ctrl.qrCode = response['data'];
                        ctrl.hasQrPassword = true;
                        displayQrCode();
                    });
            }
        };

        function displayQrCode() {
            ctrl.qrImage = new QRCode('qrcode', {
                text: ctrl.qrCode,
                width: 100,
                height: 100
            });
        }

        ctrl.regenerate = function () {
            qrLoginService.regenerateNewQrCode(ctrl.studentId)
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
            downloadService.download("/api/qrLogin/qrStudentLoginPdf?studentId=" + ctrl.studentId);
        };
    }
})();