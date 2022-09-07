<?php

namespace App\Layouts;

use App\Entity\Screencast;
use Netgen\Layouts\Item\ValueConverterInterface;

class ScreencastValueConverter implements ValueConverterInterface
{
    public function supports(object $object): bool
    {
        return $object instanceof Screencast;
    }

    public function getValueType(object $object): string
    {
        return 'doctrine_screencast';
    }

    public function getId(object $object)
    {
        return $object->getId();
    }

    public function getRemoteId(object $object)
    {
        return $this->getId($object);
    }

    public function getName(object $object): string
    {
        assert($object instanceof Screencast);

        return $object->getTitle();
    }

    public function getIsVisible(object $object): bool
    {
        return true;
    }

    public function getObject(object $object): object
    {
        return $object;
    }
}
