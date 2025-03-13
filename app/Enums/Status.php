<?php

namespace App\Enums;

Enum Status: string
{
    case ACCEPTED = 'accepted';
    case IN_PROCCESS = 'in_proccess';
    case CANCELLED = 'cancelled';

    public function ToString(): ?string
    {
        return match($this)
        {
            self::ACCEPTED  => 'accepted',
            self::IN_PROCCESS => 'in_proccess',
            self::CANCELLED => 'cancelled',
        };
    }
}