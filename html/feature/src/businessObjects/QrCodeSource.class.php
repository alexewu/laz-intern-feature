<?php
declare(strict_types=1);

namespace LAZ\objects\kidsaz\api\QrStudentLogin;

use Endroid\QrCode\QrCode;

class QrCodeSource {
    public $qrCodeImgSrc;
    public $studentName;
    public $studentScreenName;

    public function __construct() {
        $this->qrCodeImgSrc = "";
        $this->studentName = "";
        $this->studentScreenName = "";
    }

    public function setStudentNameTo(string $newStudentName): void {
        $this->studentName = $newStudentName;
    }

    public function setStudentScreenNameTo(string $newStudentScreenName): void {
        $this->studentScreenName = $newStudentScreenName;
    }

    public function setQrCodeImgSrcTo(string $newQrCode): void {
        $this->qrCodeImgSrc = $newQrCode;
    }

    public function getQrCodeImgSrc(): string {
        return $this->qrCodeImgSrc;
    }

    public function getStudentName(): string {
        return $this->studentName;
    }

    public function getStudentScreenName(): string {
        return $this->studentScreenName;
    }
}