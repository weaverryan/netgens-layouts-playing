<?php

namespace App\Layouts;

use App\Entity\Screencast;
use Netgen\Layouts\Item\ValueUrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

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
