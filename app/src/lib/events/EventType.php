<?php

namespace src\lib\events;

enum EventType: string
{
    case ROUTE = 'route';
    case ERROR = 'error';
}