<?php

namespace App\Layouts;

use Netgen\Layouts\Item\ValueConverterInterface;

class ScreencastValueConverter implements ValueConverterInterface
{
    public function supports(object $object): bool
    {
        // TODO: Implement supports() method.
    }

    public function getValueType(object $object): string
    {
        // TODO: Implement getValueType() method.
    }

    public function getId(object $object)
    {
        // TODO: Implement getId() method.
    }

    public function getRemoteId(object $object)
    {
        // TODO: Implement getRemoteId() method.
    }

    public function getName(object $object): string
    {
        // TODO: Implement getName() method.
    }

    public function getIsVisible(object $object): bool
    {
        // TODO: Implement getIsVisible() method.
    }

    public function getObject(object $object): object
    {
        // TODO: Implement getObject() method.
    }
}
