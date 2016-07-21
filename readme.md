This is a Litecms 5 package that provides faq management facility for laraval framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/faq`.

    "litecms/faq": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\Faq\Providers\FaqServiceProvider::class,

```

And also add it to alias

```php
'Faq'  => Litecms\Faq\Facades\Faq::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="view"

 Public folders

    php artisan vendor:publish --provider="Litecms\Faq\Providers\FaqServiceProvider" --tag="public"

Publish admin views only if it is necessary.

## Usage


