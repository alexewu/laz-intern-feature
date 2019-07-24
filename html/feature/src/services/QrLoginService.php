<?php
declare(strict_types=1);

namespace feature\src\services;
require_once '../dataAccess/QrDbGateway.php';

use feature\src\dataAccess\QrDbGateway;

class QrLoginService {
    private $dbGateway;
    private $shardId;
//    private $logger;
//    private $qrCodeService;
//    private $pdfService;
//    private $rkTeacherHelpers;

    public function __construct(int $shardId) {
        $this->shardId = $shardId;
        $this->dbGateway = new QrDbGateway($shardId);
//        $this->logger = new Logger(__CLASS__);
//        $this->qrCodeService = new QrCodeService();
//        $this->pdfService = new PdfService($shardId);
//        $this->rkTeacherHelpers = new RKTeacherHelpers($shardId);
    }

    public function getQrCodeFromStudentId(int $studentId): ?string {
        return $this->dbGateway->getQrCodeFromStudentId($studentId);
    }

    public function regenerate(int $studentId): ?string {
        $newPassword = $this->createNewQrPassword($studentId);
        if($this->getQrCodeFromStudentId($studentId) != null) {
            $this->dbGateway->updateQRPassword($studentId, $newPassword);
        }
        else {
            $this->dbGateway->createFirstQRPassword($studentId, $newPassword);
        }
        return $newPassword;
    }

//    public function initializeQrPassword($studentId): void {
//        $this->dbGateway->createFirstQRPassword($studentId, $this->createNewQrPassword($studentId));
//    }
//
    public function createNewQrPassword(int $studentId): ?string {
        return $this->shardId . hash('sha256', $studentId . time());
    }

    public function getStudentIdFromQrPassword(string $qrPassword): ?int {
        return $this->dbGateway->getStudentIdFromQrPassword($qrPassword);
    }
//
//    public function createPdf(string $qrString): void {
//        $pdf = new LazHtmlToPdf ($this->logger);
//        $pdfOutput = $pdf->getOutputFromHtml ($qrString);
//        $pdf->sendHttp ($pdfOutput, "qr-student-login-cards.pdf", false, true);
//    }
//
//    public function getPdfHtml(array $qrCodeSources): string {
//        $filePath = $this->getPdfTemplate($qrCodeSources);
//        return $this->pdfService->getHtml ($filePath, $qrCodeSources);
//    }
//
//    public function getQrInfo(int $memberId): array {
//        return [
//                'studentQrPasswords' => $this->dbGateway->getQrInfo($memberId)
//               ];
//    }
//
//    public function generateClassroomQrLogin($memberId): void {
//        $studentIds = $this->rkTeacherHelpers->getStudentIdsForMember($memberId);
//        foreach($studentIds as $studentId) {
//           $this->regenerate($studentId);
//        }
//    }
//
//    private function getPdfTemplate(array $qrCodeSources): string {
//        return (count($qrCodeSources) == 1)?
//            $_ENV['ROOT_WWW_PATH'] . "/html/shared/content/qr-code-templates/individual-qr-login-pdf.html":
//            $_ENV['ROOT_WWW_PATH'] . "/html/shared/content/qr-code-templates/student-login-qr-pdf.html";
//    }
}