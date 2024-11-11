<?php

namespace App\Enums\Attributes;

#[\Attribute]
class Description
{
    public function __construct(
        public string $description,
    ) {
    }
}
