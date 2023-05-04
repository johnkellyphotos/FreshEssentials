<?php

namespace lib\model;

enum QueryType: string
{
    case DESCRIBE = 'describe';
    case FETCH = 'fetch';
    case INSERT = 'insert';
    case UPDATE = 'update';
    case DELETE = 'delete';
}