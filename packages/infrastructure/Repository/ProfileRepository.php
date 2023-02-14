<?php

namespace Packages\infrastructure\Repository;

use App\Models\ProfileEloquent;
use Illuminate\Pagination\LengthAwarePaginator;
use Packages\Domain\Models\IProfileRepository;
use Packages\Domain\Models\Profile;
use Packages\Domain\Models\SexType;

class ProfileRepository implements IProfileRepository
{
    public function list(null|string $name, null|SexType $sexType, null|string $phone): LengthAwarePaginator
    {
        if(!is_null($name)) {
            ProfileEloquent::where('name', 'like', "%$name%");
        }

        if(!is_null($sexType)) {
            ProfileEloquent::where('sexType', 'like', "%$sexType->value%");
        }

        if(!is_null($phone)) {
            ProfileEloquent::where('phone', 'like', "%$phone%");
        }

        return ProfileEloquent::paginate(10);
    }

    public function find(int $id): ?Profile
    {
        return ProfileEloquent::find($id)?->toDomain();
    }

    public function update(Profile $profile)
    {
        $eloquent = ProfileEloquent::find($profile->id);
        $eloquent->name = $profile->getName();
        $eloquent->sexType = $profile->getSexType()->value;
        $eloquent->tel = $profile->getTel();
        $eloquent->comment = $profile->getComment();

        $eloquent->holidays()->where('profile_id',$profile->id)->delete();
        $eloquent->holidays()->createMany(
            $profile->getHolidays()->map(fn($holiday) => [
                'holiday_type' => $holiday->type->value,
            ]),
        );

        $eloquent->save();
    }

    public function store(Profile $profile)
    {
        $eloquent = new ProfileEloquent();
        $eloquent->name = $profile->getName();
        $eloquent->sexType = $profile->getSexType()->value;
        $eloquent->tel = $profile->getTel();
        $eloquent->comment = $profile->getComment();
        $eloquent->save();

        $eloquent->holidays()->createMany(
            $profile->getHolidays()->map(fn($holiday) => [
                'holiday_type' => $holiday->type->value,
            ]),
        );

        return $eloquent->id;
    }
}
