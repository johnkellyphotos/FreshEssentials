<?php

namespace src\lib\events;

trait Events
{
    protected EventType $eventType;

    protected static array $__appEventList = [];

    protected function dispatchEvent(EventType $eventType): void
    {
        $invoker = get_called_class() . "::" . debug_backtrace()[1]['function'] . "()" ?? null;
        /** @var Event $event */
        foreach (self::$__appEventList as $event) {
            if ($event->getType() == $eventType) {
                $event->setInvokingFunctionName($invoker);
                $event->dispatch($this);
            }
        }
    }

    protected function getEvents(): array
    {
        return self::$__appEventList;
    }

    protected function addEventListener(EventType $eventType, callable $callback): bool
    {
        $eventId = self::generateEventId();
        self::$__appEventList[$eventId] = new Event($eventType, $callback, $this);
        return $eventId;
    }

    private function generateEventId(): int
    {
        return floor(microtime(true) * 1000) . rand(10000, 99999);
    }
}