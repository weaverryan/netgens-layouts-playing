<?php

namespace App\Layouts;

use Netgen\Layouts\API\Values\Collection\Query;
use Netgen\Layouts\Collection\QueryType\QueryTypeHandlerInterface;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;

class ScreencastQueryHandlerType implements QueryTypeHandlerInterface
{
    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        // TODO: Implement buildParameters() method.
    }

    public function getValues(Query $query, int $offset = 0, ?int $limit = null): iterable
    {
        // TODO: Implement getValues() method.
    }

    public function getCount(Query $query): int
    {
        // TODO: Implement getCount() method.
    }

    public function isContextual(Query $query): bool
    {
        // TODO: Implement isContextual() method.
    }
}
