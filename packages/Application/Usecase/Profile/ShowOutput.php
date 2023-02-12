<?php

namespace Packages\Application\Usecase\Profile;

class ShowOutput
{
    public function __construct(
        public readonly int $profileId,
        public readonly string $name,
        public readonly int $sexType,
        public readonly int $tel,
        public readonly null|string $comment,
    ) {
    }
}
