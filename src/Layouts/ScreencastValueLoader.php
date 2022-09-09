<?php

namespace App\Layouts;

use App\Repository\ScreencastRepository;
use Netgen\Layouts\Item\ValueLoaderInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('netgen_layouts.cms_value_loader', ['value_type' => 'doctrine_screencast'])]
class ScreencastValueLoader implements ValueLoaderInterface
{
    public function __construct(private ScreencastRepository $screencastRepository)
    {
    }

    public function load($id): ?object
    {
        return $this->screencastRepository->find($id);
    }

    public function loadByRemoteId($remoteId): ?object
    {
        return $this->load($remoteId);
    }
}
