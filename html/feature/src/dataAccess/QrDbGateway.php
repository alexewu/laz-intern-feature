<?php
declare(strict_types=1);
namespace LAZ\objects\kidsaz\dataAccess;

use LAZ\objects\data\DataManager;

class QrDbGateway {
    const MAX_QR_PASSWORD = 65;

    private $shardId;
    private $qrDm;

    public function __construct(int $shardId) {
        $this->shardId = $shardId;
        $this->qrDm = new DataManager(DataManager::DB_RK_ACTIVITY, DataManager::LOC_MASTER, $this->shardId);
    }

    public function getQrCodeFromStudentId(int $studentId): ?string {
        $sql = "SELECT qr_password
                FROM qr_student_login
                WHERE student_id = $studentId";

        $this->qrDm->query($sql);
        $result = $this->qrDm->fetch();

        return $result["qr_password"];
    }

    public function isStudentInQrTable(int $studentId): bool {
        $sql = "SELECT 1 
                FROM qr_student_login 
                WHERE student_id = $studentId";

        $this->qrDm->query($sql);
        return !!$this->qrDm->fetch();
    }

    public function createFirstQRPassword(int $studentId, string $newPassword): void {
        $sql = "INSERT INTO qr_student_login(student_id, qr_password)
                VALUES ($studentId, '$newPassword')";

        $this->qrDm->query($sql);
    }

    public function updateQRPassword(int $studentId, string $newPassword): void {
        $sql = "UPDATE qr_student_login
                SET qr_password = '$newPassword'
                WHERE student_id = $studentId";

        $this->qrDm->query($sql);
    }

    public function getStudentIdFromQrPassword(string $qrPassword): ?int {
        if (strlen($qrPassword) != QrDbGateway::MAX_QR_PASSWORD) {
            return null;
        }

        $sql = "SELECT student_id 
                FROM qr_student_login
                WHERE qr_password = '$qrPassword'";

        $this->qrDm->query($sql);
        $row = $this->qrDm->fetch();

        return (int)$row["student_id"];
    }

    public function getMemberIdFromStudentId(int $studentId): ?int {
        $sql = "SELECT homeroom_member_id
                FROM `student`
                WHERE student_id = $studentId";

        $this->qrDm->query($sql);
        $row = $this->qrDm->fetch();

        return (int)$row["homeroom_member_id"];
    }

    public function getQrInfo(int $memberId): array {
        $sql = "SELECT qr_student_login.student_id,
                        qr_student_login.qr_password,
                        student.student_first_name,
                        student.student_last_name, 
                        student.screen_name
                FROM qr_student_login JOIN student 
                ON qr_student_login.student_id = student.student_id
                WHERE homeroom_member_id=$memberId";

        $this->qrDm->query($sql);
        return $this->qrDm->fetchAll();
    }
}