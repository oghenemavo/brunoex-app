<?php

namespace App\Enums;

enum TransRequestStatusEnum: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';
}