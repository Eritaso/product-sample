<?php

namespace Packages\Application\Usecase\Profile;

use Illuminate\Support\Collection;

class ShowOutput
{
    public function __construct(
        public readonly int $profileId,
        public readonly string $name,
        public readonly int $sexType,
        public readonly string $tel,
        public readonly Collection $holidays,
        public readonly null|string $comment,
    ) {
    }
}
