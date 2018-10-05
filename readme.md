Laravel package that provides faq management facility for the Lavalite cms.

## Installation

Begin by installing this package through Composer.

    composer require litecms/faq

## Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Litecms\\FaqTableSeeder

## Publishing files

**Configuration**

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="config"

**Language**

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="lang"

### Views

Publishes to vendor folder

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="view"


Publishes admin view admin theme

    php artisan theme:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --view="admin" --theme="admin"


Publishes piblic view public theme

    php artisan theme:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --view="public" --theme="public"
