<?php

namespace App\Layouts\Browser;

use App\Entity\Screencast;
use Netgen\ContentBrowser\Item\ItemInterface;
use function Symfony\Component\String\u;

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
        return u($this->screencast->getTitle())->truncate(50, '...', false);
    }

    public function isVisible(): bool
    {
        return true;
    }

    public function isSelectable(): bool
    {
        return true;
    }

    public function getScreencast(): Screencast
    {
        return $this->screencast;
    }
}
