<?php

namespace Quavi\Facades;
use Illuminate\Support\Facades\Facade;

class Quavi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'quavi';
    }
}