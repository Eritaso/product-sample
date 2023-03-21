<?php

namespace Packages\Application\Usecase\Profile;

use Packages\Domain\Models\IProfileRepository;
use Illuminate\Support\Facades\DB;

class DeleteUsecase
{
    public function __construct(
        private IProfileRepository $repository
    ) {
    }

    public function __invoke(int $id): void
    {
        $profile = $this->repository->find($id);
        DB::transaction(fn() =>$this->repository->delete($profile));
    }
}
