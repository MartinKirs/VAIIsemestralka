<?php

namespace App\Models;

use Framework\Core\Model;

class AccessRequest extends Model
{
    protected ?int $id = null;
    protected ?string $applicant_name = null;
    protected ?int $door_id = null;
    protected ?string $reason = null;
    protected ?string $status = 'Čaká na schválenie';

    protected static function getTableName(): string
    {
        return 'access_requests';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getApplicantName(): ?string
    {
        return $this->applicant_name;
    }

    public function setApplicantName(?string $applicantName): void
    {
        $this->applicant_name = $applicantName;
    }

    public function getDoorId(): ?int
    {
        return $this->door_id;
    }

    public function setDoorId(?int $doorId): void
    {
        $this->door_id = $doorId;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getDoor(): ?Door
    {
        if ($this->door_id === null) {
            return null;
        }
        return Door::getOne($this->door_id);
    }
}
