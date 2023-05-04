<?php

namespace src\lib\events;

use Closure;

class Event
{
    private readonly ?string $invokingFunctionName;

    public function __construct(
        private readonly EventType $eventType,
        private readonly Closure $callback,
        private mixed $setContext,
    ) {
    }

    public function dispatch(mixed $context): void
    {
        $this->callback->bindTo($context, $context::class)($this);
    }

    public function getType(): EventType
    {
        return $this->eventType;
    }

    public function setInvokingFunctionName(?string $invokingFunctionName): void
    {
        $this->invokingFunctionName = $invokingFunctionName;
    }
}