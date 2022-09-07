<?php

namespace App\Layouts;

use App\Repository\ScreencastRepository;
use Netgen\Layouts\API\Values\Collection\Query;
use Netgen\Layouts\Collection\QueryType\QueryTypeHandlerInterface;
use Netgen\Layouts\Parameters\ParameterBuilderInterface;
use Netgen\Layouts\Parameters\ParameterType\TextType;

class ScreencastQueryHandlerType implements QueryTypeHandlerInterface
{
    public function __construct(
        private ScreencastRepository $screencastRepository
    )
    {
    }

    public function buildParameters(ParameterBuilderInterface $builder): void
    {
        $builder->add('title', TextType::class);
    }

    public function getValues(Query $query, int $offset = 0, ?int $limit = null): iterable
    {
        return $this->screencastRepository->search(
            $query->getParameter('title')->getValue(),
            $offset,
            $limit,
        );
    }

    public function getCount(Query $query): int
    {
        return count($this->getValues($query));
    }

    public function isContextual(Query $query): bool
    {
        return false;
    }
}
