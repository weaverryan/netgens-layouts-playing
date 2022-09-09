<?php

namespace App\Layouts\Browser;

use App\Entity\Screencast;
use Netgen\ContentBrowser\Item\ItemInterface;

class ScreencastBrowserItem implements ItemInterface
{
    public function __construct(private Screencast $screencast)
    {
    }

    public function getValue()
    {
        return $this->screencast->getId();
    }

    public function getName(): string
    {
        return $this->screencast->getTitle();
    }

    public function isVisible(): bool
    {
        return true;
    }

    public function isSelectable(): bool
    {
        return true;
    }
}
