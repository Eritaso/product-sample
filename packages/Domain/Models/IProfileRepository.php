<?php

namespace Packages\Domain\Models;

interface IProfileRepository
{
    public function find(int $id): ?Profile;
}
