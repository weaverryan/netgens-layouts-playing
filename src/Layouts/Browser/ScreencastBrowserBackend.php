<?php

namespace App\Layouts\Browser;

use Netgen\ContentBrowser\Backend\BackendInterface;
use Netgen\ContentBrowser\Item\ItemInterface;
use Netgen\ContentBrowser\Item\LocationInterface;

class ScreencastBrowserBackend implements BackendInterface
{
    public function getSections(): iterable
    {
        // TODO: Implement getSections() method.
    }

    public function loadLocation($id): LocationInterface
    {
        // TODO: Implement loadLocation() method.
    }

    public function loadItem($value): ItemInterface
    {
        // TODO: Implement loadItem() method.
    }

    public function getSubLocations(LocationInterface $location): iterable
    {
        // TODO: Implement getSubLocations() method.
    }

    public function getSubLocationsCount(LocationInterface $location): int
    {
        // TODO: Implement getSubLocationsCount() method.
    }

    public function getSubItems(LocationInterface $location, int $offset = 0, int $limit = 25): iterable
    {
        // TODO: Implement getSubItems() method.
    }

    public function getSubItemsCount(LocationInterface $location): int
    {
        // TODO: Implement getSubItemsCount() method.
    }

    public function search(string $searchText, int $offset = 0, int $limit = 25): iterable
    {
        // TODO: Implement search() method.
    }

    public function searchCount(string $searchText): int
    {
        // TODO: Implement searchCount() method.
    }
}
