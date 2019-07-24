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

        function teacherHasQrUsers() {
            return $http.get('/api/qrLogin/teacherHasQrUsers');
        }

        function getQrInfo() {
            return $http.get('/api/qrLogin/qrInfo');
        }

        function getQrPasscodeFromStudentId(studentId) {
            return $http.get('/api/qrLogin/' + studentId);
        }

        return {
            regenerateNewQrCode: regenerateNewQrCode,
            generateQrForClassroom: generateQrForClassroom,
            login: login,
            teacherHasQrUsers: teacherHasQrUsers,
            getQrInfo: getQrInfo,
            getQrPasscodeFromStudentId: getQrPasscodeFromStudentId,
        }
    }
})();