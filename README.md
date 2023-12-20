# jaknaweby.eu
## Frameworks instalation
### Tailwind
If you want to edit CSS using tailwind, install npm and run the code below in the root directory
```shell
npm install -D tailwindcss
npx tailwindcss -i ./resources/css/app.css -o ./public/css/style.css --watch
```

### Laravel
To make the laravel work, install npm, php and run the code below in the root directory
```shell
npm install composer
composer install
php artisan migrate
```
