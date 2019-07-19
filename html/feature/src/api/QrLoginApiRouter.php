<?php
namespace feature\src\api;
use objects\library\Router\Router;

class QrLoginApiRouter extends Router {
    public function __construct() {
        parent::__construct(QrLoginApiController::class, '/qrLogin');
    }

    protected function registerRoutes() {
        $tokens = [
            'studentId' => '\d+',
            'memberId' => '\d+',
        ];

        $this->post('/regenerate/{studentId}', 'regenerate', $tokens);
        $this->post('/classroomGenerate', 'generateClassroomQrLogin', $tokens);
        $this->get('/{studentId}', 'getQrCode', $tokens);
        $this->get('/qrStudentLoginPdf', 'getIndividualStudentQrPdf', $tokens);
        $this->get('/qrClassroomLoginPdf', 'getClassroomQrPdf', $tokens);
        $this->get('/classroomStudents/{memberId}', 'getStudentInfoFromMemberId', $tokens);
        $this->get('/teacherHasQrUsers', 'teacherHasQrUsers', $tokens);
        $this->get('/qrInfo', 'getQrInfo', $tokens);
    }
}