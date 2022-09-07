To replicate:

git clone git@github.com:weaverryan/netgens-layouts-playing.git
cd netgens-layouts-playing
git checkout -b exception_swallow origin/exception_swallow
composer install
# configure DATABASE_URL in .env

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate --configuration=vendor/netgen/layouts-core/migrations/doctrine.yaml
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
symfony serve -d --port=9049
symfony open:local

Go to https://127.0.0.1:9049/nglayouts/admin

Login: `ryan@example.com` password `admin`

Go to "layouts", create a new layout.

Add a "List" widget to the layout.
Change to "Dynamic Collection".

The Ajax call will now fail. If you look in the web debug toolbar, you will see
2 500 error requests. If you click the first (higher up the list), you will
see the bad error:

> Warning: Undefined array key "method"

The URL for this will be something like: https://127.0.0.1:9049/nglayouts/app/api/en/blocks/cda99d56-c5e2-4009-be4c-6dd73e1f1995

Curiously, the other URL (if you open it) will have the correct error, which is
due to a bug in my code:

> iterator_count(): Argument #1 ($iterator) must be of type Traversable, array given

In this case, the URL is https://127.0.0.1:9049/nglayouts/app/api/en/blocks/cda99d56-c5e2-4009-be4c-6dd73e1f1995/collections/default/result

If you refresh the entire page, only 1 Ajax call will fail. And if you open it,
it will be the "bad" error.
