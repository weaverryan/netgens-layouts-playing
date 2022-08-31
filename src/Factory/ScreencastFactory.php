<?php

namespace App\Factory;

use App\Entity\Screencast;
use App\Repository\ScreencastRepository;
use Symfony\Component\Filesystem\Filesystem;
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
    private static $images = [
        '1.jpeg',
        '2.jpeg'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->text(),
            'description' => self::faker()->paragraphs(2, true),
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTimeBetween('-1 year', 'now')),
            'length' => self::faker()->numberBetween(30, 90),
            'imagePath' => self::faker()->randomElement(self::$images),
        ];
    }

    protected function initialize(): self
    {
        return $this
            ->afterInstantiate(function(Screencast $screencast): void {
                $imagePath = __DIR__.'/Fixtures/'.$screencast->getImagePath();
                if (!file_exists($imagePath)) {
                    return;
                }

                $fs = new Filesystem();
                $newName = sha1(random_bytes(50)).'.jpg';
                $fs->copy($imagePath, __DIR__.'/../../public/uploads/screencasts/'.$newName);
                $screencast->setImagePath($newName);
            })
        ;
    }

    protected static function getClass(): string
    {
        return Screencast::class;
    }
}
