<?php

namespace App\Factory;

use App\Entity\Screencast;
use App\Repository\ScreencastRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Screencast>
 *
 * @method static Screencast|Proxy createOne(array $attributes = [])
 * @method static Screencast[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Screencast|Proxy find(object|array|mixed $criteria)
 * @method static Screencast|Proxy findOrCreate(array $attributes)
 * @method static Screencast|Proxy first(string $sortedField = 'id')
 * @method static Screencast|Proxy last(string $sortedField = 'id')
 * @method static Screencast|Proxy random(array $attributes = [])
 * @method static Screencast|Proxy randomOrCreate(array $attributes = [])
 * @method static Screencast[]|Proxy[] all()
 * @method static Screencast[]|Proxy[] findBy(array $attributes)
 * @method static Screencast[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Screencast[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ScreencastRepository|RepositoryProxy repository()
 * @method Screencast|Proxy create(array|callable $attributes = [])
 */
final class ScreencastFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'title' => self::faker()->text(),
            'description' => self::faker()->text(),
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->datetime()),
            'length' => self::faker()->randomNumber(),
            'imagePath' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Screencast $screencast): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Screencast::class;
    }
}
