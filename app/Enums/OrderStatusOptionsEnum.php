<?php

namespace App\Enums;

use App\Enums\Attributes\Description;
use App\Traits\EnumToArrayTrait;
use App\Traits\GetsAttributesTrait;

enum OrderStatusOptionsEnum: string
{
    use EnumToArrayTrait, GetsAttributesTrait;

    #[Description('Nuovo')]
    case NEW = 'new';

    #[Description('In lavorazione')]
    case DELIVERING = 'delivering';

    #[Description('Consegnato')]
    case DELIVERED = 'delivered';
}
