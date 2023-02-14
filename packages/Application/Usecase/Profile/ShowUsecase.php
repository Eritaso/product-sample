<?php

namespace Packages\Application\Usecase\Profile;

use Packages\Domain\Models\Holiday;
use Packages\Domain\Models\IProfileRepository;
use Packages\Domain\Models\Profile;

class ShowUsecase
{
    public function __construct(
        private IProfileRepository $repository
    ) {
    }

    public function __invoke(int $id): ShowOutput
    {
        return optional(
            $this->repository->find($id),
            fn(Profile $profile) => new ShowOutput($id, $profile->getName(), $profile->getSexType()->value, $profile->getTel(), $profile->getHolidays(), $profile->getComment())
        );
    }
}
