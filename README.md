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
