<?php

namespace App\Layouts;

use App\Entity\Screencast;
use Netgen\Layouts\Item\ValueUrlGeneratorInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Routing\RouterInterface;

#[AutoconfigureTag('netgen_layouts.cms_value_url_generator', ['value_type' => 'doctrine_screencast'])]
class ScreencastValueUrlGenerator implements ValueUrlGeneratorInterface
{
    public function __construct(private RouterInterface $router)
    {
    }

    public function generate(object $object): ?string
    {
        assert($object instanceof Screencast);

        return $this->router->generate('app_screencast_show', [
            'id' => $object->getId()
        ]);
    }
}
