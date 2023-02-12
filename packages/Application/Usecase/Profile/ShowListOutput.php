<?php

namespace Packages\Application\Usecase\Profile;

class ShowListOutput
{
    public function __construct(
        public readonly int $profileId,
        public readonly string $name,
        public readonly int $sexType,
        public readonly int $phone,
        public readonly null|string $comment,
    ) {
    }
}
