<?php

namespace Packages\infrastructure\Repository;

use App\Models\ProfileEloquent;
use Illuminate\Pagination\LengthAwarePaginator;
use Packages\Domain\Models\IProfileRepository;
use Packages\Domain\Models\Profile;
use Packages\Domain\Models\SexType;

class ProfileRepository implements IProfileRepository
{
    public function list(null|string $name, null|SexType $sexType, null|string $phone, null|array $searchHolidays): LengthAwarePaginator
    {
        $query = ProfileEloquent::query();

        if(!is_null($name)) {
            $query->where("name", "LIKE", "%$name%");
        }

        if(!is_null($sexType)) {
            $query->where("sexType", "=", $sexType->value);
        }

        if(!is_null($phone)) {
            $query->where("tel", "like", "%$phone%");
        }

        if(!is_null($searchHolidays)) {
            $query->whereHas('holidays', fn($holidays) => $holidays->whereIn('holiday_type', $searchHolidays));
        }

        return $query->paginate(10);
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

    public function delete(Profile $profile)
    {
        $eloquent = ProfileEloquent::find($profile->id);
        $eloquent->holidays()->where('profile_id',$profile->id)->delete();
        $eloquent->delete();
    }
}
