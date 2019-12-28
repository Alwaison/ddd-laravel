<?php

namespace Sp\Infrastructure\Persistence;

use Sp\Domain\Events\EventRepository;
use Sp\Domain\Events\DomainEvent;
use Sp\Infrastructure\Persistence\Eloquent\EventEloquentModel;
use Sp\Infrastructure\Persistence\Events\EventSerialize;

class EloquentEventRepository implements EventRepository
{

    use EventSerialize;

    public function append(DomainEvent $aDomainEvent)
    {
        $eventData = [
            'event_body' => $this->strToSave($aDomainEvent),
            'type_name' => get_class($aDomainEvent),
            'occurred_on' => $aDomainEvent->occurredOn()
        ];

        $model = new EventEloquentModel($eventData);
        $model->save();
    }

    public function allStoreEventsSince(int $anEventId)
    {

        $model = new EventEloquentModel();
        $result = $model->where('id', '>=', $anEventId)
                        ->get();

        if (!$result->count()) {
            throw new EventNotFoundInDatabaseException("Event not found in system", 1);
        }

        $events = [];
        foreach ($result as $event) {
            array_push($events, $this->savedJsonToObj($event->event_body));
        }

        return $events;

    }

}
