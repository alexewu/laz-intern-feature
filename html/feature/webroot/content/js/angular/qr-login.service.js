(function() {

    var app = angular.module("feature");

    qrService.$inject = ['$http'];
    app.service("qrLoginService", qrService);

    function qrService($http) {
        function regenerateNewQrCode() {
            return $http.post('/api/regenerate');
        }

        function generateQrForClassroom() {
            return $http.post('/api/qrLogin/classroomGenerate');
        }

        function login(qrPassword) {
            var req = {
                method: 'POST',
                url: '/main/Login/',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    'qr_password': qrPassword
                }
            };
            return $http(req);
        }

        function getQrPasscodeFromStudentId() {
            return $http.get('/api/studentPasscode');
        }

        return {
            regenerateNewQrCode: regenerateNewQrCode,
            generateQrForClassroom: generateQrForClassroom,
            login: login,
            getQrPasscodeFromStudentId: getQrPasscodeFromStudentId,
        }
    }
})();