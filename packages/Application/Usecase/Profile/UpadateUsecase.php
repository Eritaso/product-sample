<?php

namespace Packages\Application\Usecase\Profile;

use Packages\Domain\Models\IProfileRepository;
use Illuminate\Support\Facades\DB;
use Packages\Domain\Models\SexType;
use Illuminate\Support\Collection;

class UpadateUsecase
{
    public function __construct(
        private IProfileRepository $repository
    ) {
    }

    public function __invoke(int $id, string $name, int $sexType, string $tel, Collection $holidays, null|string $comment): void
    {
        $profile = $this->repository->find($id);
        $profile->update($name, SexType::from($sexType), $tel, $holidays, $comment);
        DB::transaction(fn() =>$this->repository->update($profile));
    }
}
