(function() {

    var app = angular.module("shared");

    app.component("qrScanner", {
        templateUrl: 'shared/js/angular/qr-scanner/qr-scanner.html',
        controller: 'qrScannerController'
    });

    app.controller('qrScannerController', qrScannerController);
    qrScannerController.$inject = ['windowService', 'qrScanner'];

    function qrScannerController(windowService, qrScanner)
    {
        var ctrl = this;
        ctrl.video = document.createElement("video");
        ctrl.canvasElement = document.getElementById("canvas");
        ctrl.canvas = ctrl.canvasElement.getContext("2d");
        ctrl.loadingMessage = document.getElementById("loadingMessage");

        navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
            ctrl.video.srcObject = stream;
            ctrl.video.setAttribute("playsinline", true);
            ctrl.video.play();
            requestAnimationFrame(ctrl.tick);
        });

        ctrl.tick = function ()
        {
            ctrl.loadingMessage.innerText = "? Loading video...";
            if (ctrl.video.readyState === ctrl.video.HAVE_ENOUGH_DATA)
            {
                ctrl.loadingMessage.hidden = true;
                ctrl.canvasElement.hidden = false;
                ctrl.canvasElement.height = ctrl.video.videoHeight;
                ctrl.canvasElement.width = ctrl.video.videoWidth;
                ctrl.canvas.drawImage(ctrl.video, 0, 0, ctrl.canvasElement.width, ctrl.canvasElement.height);
                var imageData = ctrl.canvas.getImageData(0, 0, ctrl.canvasElement.width, ctrl.canvasElement.height);
                var code = jsQR(imageData.data, imageData.width, imageData.height, {
                    inversionAttempts: "dontInvert",
                });
                if (code && !qrScanner.getIsScanning())
                {
                    qrScanner.setIsScanning(true);
                    (code.data !== "") ? qrScanner.setString (code.data): qrScanner.setIsScanning(false);
                }
            }
            requestAnimationFrame(ctrl.tick);
        };
    }
})();