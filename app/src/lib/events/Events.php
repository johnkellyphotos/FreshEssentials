<?php

namespace src\lib\events;

use src\controllers\AppController;

class Events
{
    protected EventType $eventType;

    protected static array $__appEventList = [];

    public static function dispatchEvent(EventType $eventType, ?AppController $environment = null): void
    {
        $invoker = get_called_class() . "::" . debug_backtrace()[1]['function'] . "()" ?? null;
        /** @var Event $event */
        foreach (self::$__appEventList as $event) {
            if ($event->getType() == $eventType) {
                $event->setInvokingFunctionName($invoker);
                $event->dispatch($environment);
            }
        }
    }

    protected static function getEvents(): array
    {
        return self::$__appEventList;
    }

    public static function addEventListener(EventType $eventType, callable $callback): bool
    {
        $eventId = self::generateEventId();
        self::$__appEventList[$eventId] = new Event($eventType, $callback);
        return $eventId;
    }

    private static function generateEventId(): int
    {
        return floor(microtime(true) * 1000) . rand(10000, 99999);
    }
}