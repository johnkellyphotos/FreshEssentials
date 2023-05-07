<?php

namespace src\lib\events;

use Closure;
use src\controllers\AppController;

class Event
{
    private readonly ?string $invokingFunctionName;

    public function __construct(
        private readonly EventType $eventType,
        private readonly Closure $callback,
    ) {
    }

    public function dispatch(?AppController $context): void
    {
        $context ? $this->callback->bindTo($context, $context::class)($this) : $this->callback->call(new AppController());
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