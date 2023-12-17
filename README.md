# jaknaweby.eu
## Tailwind
If you want to edit CSS using tailwind, install npm and run the code below in the root directory
```
npm install -D tailwindcss
npx tailwindcss -i ./resources/css/app.css -o ./public/css/style.css --watch
```

## Migrations
Run the command below in the root directory to make the databases work
```
php artisan migrate
```