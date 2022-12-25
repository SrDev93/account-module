# account-module
srdev93/account-module is a Laravel Module for laravel websites.

# This module is made with the following package:
```php
composer require nwidart/laravel-modules
```

# requires
Install this package before installing the module:
```php
composer require joshbrw/laravel-module-installer
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
```

# Installation
To install with Composer:
```php
composer require srdev93/account-module
```

then run:
```php
php artisan module:migrate account
php artisan module:enable account
```
