<?php
declare(strict_types=1);
namespace feature\src\api;


class QrLoginApiController
{
    const PDF_DOWNLOAD_FILENAME = "student-login-qr.pdf";

    private $resource;
    private $qrService;
    private $shardId;
    private $qrCodeService;
    private $rkTeacherHelpers;
    private $kidsModuleCheck;
    private $pdfService;

    public function __construct() {
//        $this->shardId = $_SESSION['teacherAccountInfo']['shardConfigurationId'];
//        $this->qrService = new QrLoginService((int)$this->shardId);
//        $this->qrCodeService = new QrCodeService();
//        $this->rkTeacherHelpers = new RKTeacherHelpers();
//        $this->kidsModuleCheck = new KidsModuleAccessCheck();
//        $this->pdfService = new PdfService($this->shardId);
    }

//    public function setResource($resource): void {
//        $this->resource = $resource;
//    }
//
//    public function regenerate(ServerRequestInterface $request): ?string {
//        $studentId = (int)$request->getAttribute('studentId');
//        return $this->kidsModuleCheck->isTeacher()? $this->qrService->regenerate($studentId) : "Error: you are not a valid teacher for this student";
//    }
//
//    public function getQrCode(ServerRequestInterface $request): ?string {
//        return $this->qrService->getQrCodeFromStudentId((int)$request->getAttribute('studentId'));
//    }
//
//    public function getIndividualStudentQrPdf(ServerRequestInterface $request): void {
//        $studentId = (int)$request->getQueryParams()['studentId'];
//        if($this->kidsModuleCheck->isTeacher()) {
//            $inputQrString = $this->qrService->getQrCodeFromStudentId($studentId);
//            $qrCodeSource = [
//                [
//                    "qrCodeSource" => $this->qrCodeService->generateQrCode($inputQrString),
//                    "studentName" => $this->getStudentNameFromStudentId($studentId),
//                    "screenName" => $this->getStudentScreenNameFromStudentId($studentId)
//                ]
//            ];
//            $html = $this->qrService->getPdfHtml($qrCodeSource);
//            $this->pdfService->generatePdf($html, QrLoginApiController::PDF_DOWNLOAD_FILENAME);
//        }
//    }
//
//    public function getClassroomQrPdf(): void {
//        $classroomQrInfo = $this->getQrInfo()['studentQrPasswords'];
//        $qrCodeSources = [];
//        foreach($classroomQrInfo as $studentQrInfo) {
//            if($this->isQrPdfRequestValid($studentQrInfo)) {
//                $qrCodeSources[] =
//                    [
//                        "qrCodeSource" => $this->qrCodeService->generateQrCode($studentQrInfo['qr_password']),
//                        "studentName" => $studentQrInfo['student_first_name'] . " " . $studentQrInfo['student_last_name'],
//                        "screenName" => $studentQrInfo['screen_name']
//                    ];
//            }
//        }
//        $html = $this->qrService->getPdfHtml($qrCodeSources);
//        $this->pdfService->generatePdf($html, QrLoginApiController::PDF_DOWNLOAD_FILENAME);
//    }
//
//    public function getStudentInfoFromMemberId(ServerRequestInterface $request): ?array {
//        return $this->rkTeacherHelpers->getStudentIdsForMember((int)$request->getAttribute('memberId'));
//    }
//
//    public function getQrInfo(): array {
//        return $this->qrService->getQrInfo((int)$_SESSION['member']);
//    }
//
//    public function generateClassroomQrLogin(): void {
//        $this->qrService->generateClassroomQrLogin((int)$_SESSION['member']);
//    }
//
//    private function getStudentNameFromStudentId(int $studentId): ?string {
//        $basicStudentInfo = $this->rkTeacherHelpers->getBasicStudentInfo($studentId, $this->shardId);
//        return $basicStudentInfo['student_first_name'] . " " . $basicStudentInfo['student_last_name'];
//    }
//
//    private function getStudentScreenNameFromStudentId(int $studentId): ?string {
//        $basicStudentInfo = $this->rkTeacherHelpers->getBasicStudentInfo($studentId, $this->shardId);
//        return $basicStudentInfo['screen_name'];
//    }
//
//    private function isQrPdfRequestValid(array $studentQrInfo): bool {
//        return $this->kidsModuleCheck->isTeacher() && $studentQrInfo['qr_password'];
//    }

    public function test(): void {
        echo "This is a test function";
    }

}