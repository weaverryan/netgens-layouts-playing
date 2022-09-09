<?php

namespace App\Layouts;

use Netgen\Layouts\Item\ValueLoaderInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('netgen_layouts.cms_value_loader', ['value_type' => 'doctrine_screencast'])]
class ScreencastValueLoader implements ValueLoaderInterface
{
    public function load($id): ?object
    {
        // TODO: Implement load() method.
    }

    public function loadByRemoteId($remoteId): ?object
    {
        // TODO: Implement loadByRemoteId() method.
    }
}
