<?php

namespace App\Enums;

enum TicketStatus: string
{
    case OPEN = 'open';
    case RESOLVED = 'resolve';
    case REJECTED = 'reject';
}