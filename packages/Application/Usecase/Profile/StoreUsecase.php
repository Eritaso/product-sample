<?php

namespace Packages\Application\Usecase\Profile;

use Packages\Domain\Models\Holiday;
use Packages\Domain\Models\HolidayType;
use Packages\Domain\Models\IProfileRepository;
use Illuminate\Support\Facades\DB;
use Packages\Domain\Models\Profile;
use Packages\Domain\Models\SexType;
use Illuminate\Support\Collection;

class StoreUsecase
{
    public function __construct(
        private IProfileRepository $repository
    ) {
    }

    public function __invoke(string $name, int $sexType, string $tel, Collection $holidays, null|string $comment)
    {
        $profile = Profile::create($name, SexType::from($sexType), $tel, $holidays->map(fn($holiday) => new Holiday(HolidayType::from($holiday))), $comment);
        return DB::transaction(fn() => $this->repository->store($profile));
    }
}
