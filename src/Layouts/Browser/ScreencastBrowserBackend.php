<?php

namespace App\Layouts\Browser;

use App\Entity\Screencast;
use App\Repository\ScreencastRepository;
use Netgen\ContentBrowser\Backend\BackendInterface;
use Netgen\ContentBrowser\Item\ItemInterface;
use Netgen\ContentBrowser\Item\LocationInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('netgen_content_browser.backend', [ 'item_type' => 'doctrine_screencast' ])]
class ScreencastBrowserBackend implements BackendInterface
{
    public function __construct(private ScreencastRepository $screencastRepository)
    {
    }

    public function getSections(): iterable
    {
        return [new BrowserRootLocation()];
    }

    public function loadLocation($id): LocationInterface
    {
        if ($id === '0') {
            return new BrowserRootLocation();
        }

        throw new \Exception(sprintf('Invalid location "%s"', $id));
    }

    public function loadItem($value): ItemInterface
    {
        // TODO: Implement loadItem() method.
    }

    public function getSubLocations(LocationInterface $location): iterable
    {
        return [];
    }

    public function getSubLocationsCount(LocationInterface $location): int
    {
        return 0;
    }

    public function getSubItems(LocationInterface $location, int $offset = 0, int $limit = 25): iterable
    {
        $screencasts =  $this->screencastRepository->createQueryBuilder('screencast')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return array_map(function(Screencast $screencast) {
            return new ScreencastBrowserItem($screencast);
        }, $screencasts);
    }

    public function getSubItemsCount(LocationInterface $location): int
    {
        return $this->screencastRepository->createQueryBuilder('screencast')
            ->select('count(screencast.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function search(string $searchText, int $offset = 0, int $limit = 25): iterable
    {
        $screencasts = $this->screencastRepository->createSearchQueryBuilder($searchText)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return array_map(function(Screencast $screencast) {
            return new ScreencastBrowserItem($screencast);
        }, $screencasts);
    }

    public function searchCount(string $searchText): int
    {
        return $this->screencastRepository->createSearchQueryBuilder($searchText)
            ->select('count(screencast.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
