<?php

namespace App\Layouts\Browser;

use Netgen\ContentBrowser\Item\LocationInterface;

class BrowserRootLocation implements LocationInterface
{
    public function getLocationId()
    {
        return '0';
    }

    public function getName(): string
    {
        return 'All Screencasts';
    }

    public function getParentId()
    {
        return null;
    }
}
