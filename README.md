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

## Framework analysis

### Anotation

jaknaweby.eu is a tutorial web educating about web development. It contains individual articles about various compoínents of HTML, CSS, JavaScript, PHP and SQL. All the users with admin permissions can edit these articles within the application interface. Editing works on a WYSIWYG (what you see is what you get) basis - articles have various options of pre-created components, where you just insert content that then shows up in the article.

### Functions

- WYSISWG (What You See Is What You Get)
- TryIt editor
- Login system
- Articles editing

### Stack

- PHP > laravel for backend
- MySQL database for storing data
- XAMPP for running on localhost

### Milestones

- [x] Add function for managing articles > *week*
- [ ] Implement WYSIWYG > *month*
- [ ] Add administration of users in interface > *week*
- [ ] Add TryIt editor > *2 weeks*
- [ ] Add dark mode > *week*
