<?php

namespace Packages\Application\Usecase\Profile;

use Packages\Domain\Models\IProfileRepository;
use Packages\Domain\Models\SexType;
use Illuminate\Support\Collection;

class ShowListUsecase
{
    public function __construct(
        private IProfileRepository $repository
    ) {
    }

    public function __invoke(null|string $name, null|int $sexType, null|string $tel): Collection
    {
        $ProfilePaginator = $this->repository->list($name, $sexType === null ? null : SexType::from($sexType), $tel);
        return
            collect([
                'profileList' => $ProfilePaginator->map(fn($profile) => new ShowListOutput($profile->id, $profile->name, SexType::from($profile->sexType), $profile->tel, $profile->comment)),
                'currentPage' => $ProfilePaginator->currentPage(),
                'total' => $ProfilePaginator->total(),
                'count' => $ProfilePaginator->count(),
                'previousPageUrl'=> $ProfilePaginator->previousPageUrl(),
                'nextPageUrl' => $ProfilePaginator->nextPageUrl(),
                'lastPage' => $ProfilePaginator->lastPage(),
                'links' => $ProfilePaginator->links('pagination::bootstrap-4'),
            ]);
    }
}
