<?php

namespace Sp\Infrastructure\Persistence\Events;

use Sp\Domain\Events\DomainEvent;

trait EventSerialize
{

    private function strToSave(DomainEvent $aDomainEvent): String
    {
        $serializedObject = serialize($aDomainEvent);
        return base64_encode($serializedObject);
    }

    private function savedJsonToObj(String $encodedObject): DomainEvent
    {
        $serializedObject = base64_decode($encodedObject);
        return unserialize($serializedObject);
    }
}
