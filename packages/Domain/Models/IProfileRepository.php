<?php

namespace Packages\Domain\Models;

use Illuminate\Pagination\LengthAwarePaginator;

interface IProfileRepository
{
    public function list(null|string $name, null|SexType $sexType, null|string $tel): LengthAwarePaginator;

    public function find(int $id): ?Profile;
}
