<?php

namespace Sp\Domain\Model\User;

use Sp\Domain\Events\DomainEvent;

class UserLoggedIn implements DomainEvent
{
    private string $userId;
    private \DateTimeImmutable $occurredOn;

    public function __construct(UserIdValueObject $aUserId, \DateTimeImmutable $aDate = null)
    {
        $this->setUserId($aUserId->uuid());
        $this->setOccurredOn($aDate ?? new \DateTimeImmutable());
        dump($aUserId, "User id created event!");
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    private function setUserId(string $aUserId): void
    {
        $this->userId = $aUserId;
    }

    private function setOccurredOn(\DateTimeImmutable $anOccurredOn): void
    {
        $this->occurredOn = $anOccurredOn;
    }

}
