<?php

namespace Packages\Application\Usecase\Profile;

use Illuminate\Support\Collection;
use Packages\Domain\Models\SexType;

class ShowListOutput
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly SexType $sexType,
        public readonly string $tel,
        public readonly Collection $holidays,
        public readonly null|string $comment,
    ) {
    }
}
