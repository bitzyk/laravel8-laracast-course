## Learning Laravel

Php artisan most used commands:

- create a model and a migration
```
php artisan make:model Category -m
```
- create a factory for model
```
php artisan make:factory PostFactory
```
- drop all tables and re-run all migrations
```
php artisan migrate:fresh
```
- migrate & seed
```
php artisan migrate:fresh --seed
```
- shell into tinker
```
php artisan tinker
```
- Seed databse
```
php artisan db:seed
```
- Create a new controller
```
php artisan make:controller PostController
```
- Create a new component
```
php artisan make:component CategoryDropdown
```
- Vendor publish - The vendor:publish command is used to publish any assets that are available from third-party vendor packages. It provides a few options to help specifically choose which assets should be published. The following table lists and describes each of the options that are available for use:
```
php artisan vendor:publish 
```


- PHP laravel plugin support generate -> https://github.com/barryvdh/laravel-ide-helper

