<?php

namespace Packages\Domain\Models;

class Holiday
{
    public function __construct(
        public readonly HolidayType $type,
    ) {
    }
}
