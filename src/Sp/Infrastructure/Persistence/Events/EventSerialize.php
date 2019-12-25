<?php

namespace Sp\Infrastructure\Persistence\Events;

use Sp\Domain\Events\DomainEvent;

/**
 * 
 */
trait EventSerialize
{
    private function strToSave(DomainEvent $aDomainEvent): String
    {
        $serializedObject = serialize($aDomainEvent);
        $encodedObject = base64_encode($serializedObject);
        return $encodedObject;
    }

    private function savedJsonToObj(String $encodedObject): DomainEvent
    {
        $serializedObject = base64_decode($encodedObject);
        $aDomainEvent = unserialize($serializedObject);
        return $aDomainEvent;
    }
}
