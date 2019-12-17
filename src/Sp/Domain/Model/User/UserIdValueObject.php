<?php

namespace Sp\Domain\Model\User;

use Ramsey\Uuid\Uuid;

class UserIdValueObject
{

    protected $uuid;
    protected $employeeId;

    public static function create($uuid = null, $employeeId = null) {
        return new self($uuid, $employeeId);
    }

    private function __construct($uuid, $employeeId) {
        $this->setUuid($uuid ?? self::generateNewUuid());
        $this->setEmployeeId($employeeId ?? self::generateNewEmployeeId());
    }

    protected function generateNewUuid(): string {
        return Uuid::uuid4();
    }

    protected function generateNewEmployeeId(): string {
        return '$employeeId';
    }

    private function setUuid(string $uuid): void {
        $this->uuid = $uuid; 
    }

    private function setEmployeeId(string $employeeId): void {
        try {
            $this->employeeId = $employeeId;
        } catch(Exception $e) {
            throw new Exception("Error assigning employeeId", $employeeId);
        }
    }

    public function uuid(): string {
        return $this->uuid;
    }

    public function employeeId(): string {
        return $this->employeeId;
    }

    
    
}
