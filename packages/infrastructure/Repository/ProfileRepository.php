<?php

namespace Packages\infrastructure\Repository;

use App\Models\ProfileEloquent;
use Packages\Domain\Models\IProfileRepository;
use Packages\Domain\Models\Profile;

class ProfileRepository implements IProfileRepository
{
    public function find(int $id): ?Profile
    {
        return ProfileEloquent::find($id)?->toDomain();
    }
}
