<?php

namespace Packages\Application\Usecase\Profile;

use Packages\Domain\Models\IProfileRepository;
use Packages\Domain\Models\Profile;

class ShowListUsecase
{
    public function __construct(
        private IProfileRepository $repository
    ) {
    }

    public function __invoke(int $id): Profile
    {
        return $this->repository->find($id);
    }
}
